<style>
  .t{
    height: 450px
  }
  th {
    width: 100px !important;
  }
  .cari {
    /* padding-top: 5px !important;
    padding-bottom: 5px !important; */
    height: 45px !important;
    width: 70px !important;
    margin-top: 23px 
  }
  .q {
    width: 1px !important;
  }
</style>


<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('dist/_partials/header');
?>
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">

          <div class="section-body">
            
            <div class="card">
              <div class="card-body">
                <?= $this->session->flashdata('message'); ?>
              

                <div class="mb-3 r">
                  <button class="btn btn-primary px-3 py-2 mr-2" data-toggle="modal" data-target="#add">TAMBAH DATA ADMIN <i class="fas fa-plus"></i></button>
                </div>

                <div class="table-responsive t">
                      <table class="table table-bordered table-hover" id="example">

                        <thead>
                          <tr class="sticky-top bg-light">
                            <th style="width: 10%"></th>
                            <th scope="col">Username</th>
                            <th scope="col">Nama Admin</th>
                          </tr>
                        </thead>

                        <tbody>
                        <?php foreach ($admin as $r) : ?>
                          <tr>
                            <td>
                              <button class="btn btn-warning px-2 py-2 mr-2" data-toggle="modal" data-target="#editRoleModal<?= $r['id'] ?>"><i class="fas fa-pencil-alt"></i></button>
                              <a href="<?= base_url('masterdata/daftaradmin/hapusAdmin/') . $r['id']; ?>" onclick="return confirm('yakin dihapus?')" class="btn btn-danger px-2 py-2 mr-2 text-white"><i class="fas fa-trash-alt"></i></a>
                            </td>
                            <td ><?= $r['username']; ?></td>
                            <td ><?= $r['nama']; ?></td>
                          </tr>
                        <?php endforeach; ?>
                        </tbody>
                        
                        
                      </table>
                </div>


              </div>
            </div>

          </div>

        </section>
      </div>

      <!-- TAMBAH DATA -->
      <div class="modal fade" tabindex="-1" role="dialog" id="add">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Tambah Data Admin</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>

              <form action="<?= base_url('masterdata/daftaradmin/store'); ?>" method="post">

              <!-- <?php
              $nourut = substr($kode, 0, 6);
              $m_record = floatval($nourut) + 1;
              
              ?> -->
                <div class="modal-body">
                    <div class="form-group col-md-12">
                      <h6 for="username">Username</h6>
                      <input type="text" class="form-control" name="username" id="username">
                    </div>
                    <div class="form-group col-md-12">
                      <h6 for="nama_admin">Nama Admin</h6>
                      <input type="text" class="form-control" name="nama" id="nama" required autocomplete="off">
                    </div>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                  <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
              </form>

            </div>
          </div>
      </div>

      <!-- EDIT DATA -->
<?php foreach ($admin as $r) : ?>
      <div class="modal fade" id="editRoleModal<?= $r['id'] ?>" tabindex="-1" role="dialog" id="add">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Edit Data Admin</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>

              <form action="<?= base_url('masterdata/daftaradmin/editadmin/') . $r['id']; ?>" method="post">
                <div class="modal-body">
                    <div class="form-group col-md-6">
                      <h6 for="kode_admin">Kode</h6>
                      <input type="text" class="form-control" name="username" id="username" value="<?= $r['username']; ?>" readonly>
                    </div>
                    <div class="form-group col-md-12">
                      <h6 for="nama_admin">Nama Admin</h6>
                      <input type="text" class="form-control" name="nama_admin" id="nama_admin" value="<?= $r['nama']; ?>" required>
                    </div>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                  <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
              </form>

            </div>
          </div>
      </div>
<?php endforeach; ?>  

<?php $this->load->view('dist/_partials/footer'); ?>