<?php
 class Login extends CI_Controller{
     
    function __construct(){
        parent::__construct();
        
        $this->load->model('m_login');
    }

    public function index(){
        $this->load->view('v_login');
    }
    public function login_aksi(){
        $user = $this->input->post('userbame',true);
        $pass = md5($this->input->post('password', true));

        //rule validasi
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if($this->form_validation->run() != FALSE){
            $where = array(
                'username' => $user,
                'password' => $pass);
            
                $cekLogin = $this -> m_login-> cek_login($where)->num_rows();

                if($cekLogin > 0){
                    $sess_data = array(
                        'username' => $user,
                        'login' => 'OK'
                    );
                    
                    $this->session->set_userdata($sess_data);

                    redirect(base_url('index'));

                }else{
                    redirect(base_url('login'));
                }
        }else{
            $this->load->view('v_login');
        }
    }

    public function logout(){
        $this->session->session_destroy();
        redirect(base_url('login'));
   
    }
}
?>