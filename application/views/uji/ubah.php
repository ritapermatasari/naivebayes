Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1> Ubah Data Training</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item">Dashboard</li>
            <li class="breadcrumb-item">Data Training</li>
            <li class="breadcrumb-item active">Ubah Data Training</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <!-- Main content -->
  <section class="content">
    <!-- tambah data -->
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h5 class="card-title">Ubah Data</h5>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">
              <div class="col-md-8">
                <?= validation_errors(); ?>
                <form action="" method="post" accept-charset="utf-8">
                  <div class="card-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">id Training</label>
                      <input type="text" class="form-control disabled" name="id_training" value="<?= $ubah['id_training'] ?>" readonly>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Nama</label>
                      <input type="text" class="form-control"name="nama" value="<?= $ubah['nama'] ?>">
                    </div>
                    <!-- <div class="form-group">
                      <label>Nilai</label>
                      <select class="form-control" name="nilai">
                      <option value="7.00-8.00">7.00-8.00</option>
                        <option value="8.10-9.00">8.10-9.00</option>
                      </select>
                    </div> -->
                    <div class="form-group">
                      <label for="exampleInputPassword1">Nilai</label>
                      <input type="text" class="form-control"name="nilai" value="<?= $ubah['nilai'] ?>">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Jumlah Tanggungan</label>
                      <input type="text" class="form-control"name="jml_tanggungan" value="<?= $ubah['jml_tanggungan'] ?>">
                    </div>
                    <div class="form-group">
                      <label>Kepala Rumah Tangga</label>
                      <select class="form-control" name="kepala_rt">
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>PBB</label>
                      <select class="form-control" name="pbb">
                      <option value="0-50.000">0-50.000</option>
                        <option value="51.000-100.000">51.000-100.000</option>
                        <option value="Lebih dari 100.000">Lebih dari 100.000</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Jumlah Penghasilan</label>
                      <input type="text" class="form-control"name="jml_penghasilan" value="<?= $ubah['jml_penghasilan'] ?>">
                    </div>
                    <div class="form-group">
                      <label>Status Pemilik Rumah</label>
                      <select class="form-control" name="status_rumah">
                        <option value="Milik Sendiri">Milik Sendiri</option>
                        <option value="Sewa">Sewa</option>
                        <option value="Menumpang">Menumpang</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Status Kelayakan</label>
                      <select class="form-control" name="status_kelayakan">
                        <option value="Layak">Layak</option>
                        <option value="Tidak Layak">Tidak Layak</option>
                      </select>
                    </div>


                    <input type="submit" name="save" class="btn btn-primary" value="Save">
                  </div>
                  <!-- /.card-body -->
                </form>
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
          <!-- ./card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper