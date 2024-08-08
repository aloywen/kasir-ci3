<style>
  label {
    font-size: 15px !important;
  }
  
</style>

<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('dist/_partials/header', $menu);
?>
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">

          <div class="section-body">
          <?= $this->session->flashdata('message'); ?>

            <div class="card">
                  <div class="card-body">

                    <!-- table -->
                    <div class="table-responsive t">
                      <table class="table table-bordered table-hover" id="example">

                        <thead>
                          <tr class="sticky-top bg-light">
                            <th scope="col"></th>
                            <th scope="col">Nomor Transaksi</th>
                            <th scope="col">Tanggal Transaksi</th>
                            <th scope="col">Nama Kasir</th>
                          </tr>
                        </thead>
 
                        <tbody>
                          <?php foreach ($item as $r) : ?>
                          <tr>
                            <td scope="row">
                            <a class="nav-link" href="<?php echo base_url(); ?>pembelian/pembelian/detail/<?= $r['nomor_transaksi']; ?>"><i class="fas fa-pencil-alt"></i></a>
                            </td>
                            <td><?= $r['nomor_transaksi']; ?></td>
                            <td><?= date('d-m-Y', strtotime($r["tgl_transaksi"])); ?></td>
                            <td><?= $r['kasir']; ?></td>
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
<?php $this->load->view('dist/_partials/footer'); ?>
