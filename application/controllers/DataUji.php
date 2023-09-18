<?php 
class DataUji extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Uji_Model');
		$this->load->model('Training_Model');
		$this->load->library('form_validation');
	}

	function index()
	{

		$data['training'] = $this->Training_Model->getAllData();
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('uji/index', $data);
		$this->load->view('templates/footer');
	}

	public function hapus($id)
	{
		$this->Uji_Model->hapus_data($id);
		$this->session->set_flashdata('flash_uji', 'Dihapus');
		redirect('DataUji');
	}

	public function ubah($id)
	{

		$this->form_validation->set_rules("nama", "Nama", "required");
		$this->form_validation->set_rules("nilai", "Nilai", "required");
		$this->form_validation->set_rules("jml_tanggungan", "Jumlah Tanggungan", "required");
		$this->form_validation->set_rules("kepala_rt", "Kepala Rumah Tangga", "required");
		$this->form_validation->set_rules("pbb", "PBB", "required");
		$this->form_validation->set_rules("jml_penghasilan", "Jumlah Penghasilan", "required");
		$this->form_validation->set_rules("status_rumah", "Status Rumah", "required");


		if ($this->form_validation->run() == FALSE)
		{
			$data['ubah']= $this->Uji_Model->detail_data($id);
			$this->load->view('templates/header');
			$this->load->view('templates/sidebar');
			$this->load->view('uji/ubah', $data);
			$this->load->view('templates/footer');
		}
		else
		{
			$this->Uji_Model->ubah_data();
			$this->session->set_flashdata('flash_uji', 'DiUbah');
			redirect('DataUji');
		} 
	}

	function hitung(){
		$output = "";
		$this->form_validation->set_rules("nama", "Nama", "required");
		$this->form_validation->set_rules("nilai", "Nilai", "required");
		$this->form_validation->set_rules("jml_tanggungan", "Jumlah Tanggungan", "required");
		$this->form_validation->set_rules("kepala_rt", "Kepala Rumah Tangga", "required");
		$this->form_validation->set_rules("pbb", "PBB", "required");
		$this->form_validation->set_rules("jml_penghasilan", "Jumlah Penghasilan", "required");
		$this->form_validation->set_rules("status_rumah", "Status Rumah", "required");
		if ($this->form_validation->run() == FALSE)
		{
			$data['ubah']= $this->Uji_Model->detail_data();
			$this->load->view('templates/header');
			$this->load->view('templates/sidebar');
			$this->load->view('uji/ubah', $data);
			$this->load->view('templates/footer');
		}
		else
		{
			$rata_nilai = array();
			$jumlah_tanggungan = array();
			$kepala_rt = array();
			$pbb = array();
			$jml_penghasilan = array();
			$status_rumah = array();

			$jumlah_layak = $this->Training_Model->count_layak();
			$jumlah_tidak_layak = $this->Training_Model->count_tidaklayak();
			$total_training = $jumlah_layak+$jumlah_tidak_layak;
			$rata_nilai = $this->Training_Model->rata_nilai($this->input->post('nilai'));
			$jumlah_tanggungan = $this->Training_Model->jumlah_tanggungan($this->input->post('jml_tanggungan'));
			$kepala_rt = $this->Training_Model->kepala_rt($this->input->post('kepala_rt'));
			$pbb = $this->Training_Model->pbb($this->input->post('pbb'));
			$jml_penghasilan = $this->Training_Model->jml_penghasilan($this->input->post('jml_penghasilan'));
			$status_rumah = $this->Training_Model->status_rumah($this->input->post('status_rumah'));

  //perhitungan //Step 1
			
			$output .= "
			<table id='example1' class='table table-bordered table-striped'>
			<thead>
			<tr>
			<th>Jumlah Data</th>
			<th>Kelas PC1(Layak)</th>
			<th>Kelas PC0(Tidak Layak)</th>
			</tr>
			<tr>
			<td>" .$total_training. "</td>
			<td>" .$jumlah_layak. "</td>
			<td>" .$jumlah_tidak_layak. "</td>
			</tr>
			</thead>
			</table>";



   //Step 2

			$PC1 = round($jumlah_layak/($jumlah_tidak_layak+$jumlah_layak), 2);
			$PC0 = round($jumlah_tidak_layak/($jumlah_tidak_layak+$jumlah_layak), 2);

			$kelas_layak = round($rata_nilai['layak'],2)*round($jumlah_tanggungan['layak'], 2)*round($kepala_rt['layak'], 2)*round($pbb['layak'], 2)*round($jml_penghasilan['layak'], 2)*round($status_rumah['layak'], 2)*$PC1;

			$kelas_tidak_layak = round($rata_nilai['tidaklayak'],2)*round($jumlah_tanggungan['tidaklayak'], 2)*round($kepala_rt['tidaklayak'], 2)*round($pbb['tidaklayak'], 2)*round($jml_penghasilan['tidaklayak'], 2)*round($status_rumah['tidaklayak'], 2)*$PC0;

			$output .= "----Probabilitas Prior----<br>";
			$output .= "
			<table id='example1' class='table table-bordered table-striped'>
			<thead>
			<tr>
			<th>Kelas PC1(Layak)</th>
			<th>Kelas PC0(Tidak Layak)</th>
			</tr>
			<tr>
			<td>" .$PC1. "</td>
			<td>" .$PC0. "</td>
			</tr>
			</thead>
			</table>";



   //step 3
			$output .= "----Probabilitas Data Uji----<br>";
			$output .= "
			<table id='example1' class='table table-bordered table-striped'>
			<thead>
			<tr>
			<th> </th>
			<th>Nilai</th>
			<th>Jml Tanggu ngan</th>
			<th>Kepala Rumah Tangga</th>
			<th>PBB</th>
			<th>Jml Pengha silan</th>
			<th>Stts Pemilik Rumah</th>
			<th>Hasil Proba bilitas</th>
			</tr>
			<tr>
			<td>PC1 (Layak)</th>
			<td>" .round($rata_nilai['layak'],2). "</td>
			<td>" .round($jumlah_tanggungan['layak'], 2). "</td>
			<td>" .round($kepala_rt['layak'], 2). "</td>
			<td>" .round($pbb['layak'], 2). "</td>
			<td>".round($jml_penghasilan['layak'], 2). "</td>
			<td>".round($status_rumah['layak'], 2). "</td>
			
			<td>".$kelas_layak."</td>
			</tr>

			<tr>
			<td>PC0 (Tidak Layak)</th>
			<td>" .round($rata_nilai['tidaklayak'],2). "</td>
			<td>" .round($jumlah_tanggungan['tidaklayak'], 2). "</td>
			<td>" .round($kepala_rt['tidaklayak'], 2). "</td>
			<td>" .round($pbb['tidaklayak'], 2). "</td>
			<td>".round($jml_penghasilan['tidaklayak'], 2). "</td>
			<td>".round($status_rumah['tidaklayak'], 2). "</td>

			<td>".$kelas_tidak_layak."</td>
			</tr>
			</thead>
			</table>";


			
			$kesimpulan = "";
			$operator="";

			echo "kelas layak".$kelas_layak."<br>";
			echo "kelas tidak layak".$kelas_tidak_layak."<br>";

			echo "<br>";
			if ($kelas_layak >= $kelas_tidak_layak) {
				$kesimpulan = "LAYAK";
				$operator = ">=";
			}else{
				$kesimpulan = "TIDAK LAYAK";
				$operator = "<=";
			}


			$output .= "<br>Dapat disimpulkan Bahwa Data Uji tersebut <b><u>".$kesimpulan."</u></b> Untuk menerima Beasiswa";

      // masukan hasil kesimpulan dalam parameter untuk di save
			$this->Uji_Model->tambah_data($kesimpulan);
			$this->session->set_flashdata('flash_uji','dihitung' );
			$this->session->set_flashdata('flash_hitung', $output );
			redirect('DataUji');
			echo $output;
		} 
	}




}
