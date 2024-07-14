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

            <div class="card">
                  <div class="card-body">

                  <!-- <?= $besok ?> -->
                  <?= $this->session->flashdata('message'); ?>
 
                    <!-- table -->
                    <div class="table-responsive t">
                      <table class="table table-bordered table-hover" id="example">

                        <thead> 
                          <tr class="sticky-top bg-light">
                            <th scope="col">Nomor Nota</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Nominal</th>
                            <th scope="col"></th>
                          </tr>
                        </thead>
 
                        <tbody>
                          <?php foreach ($transaksi as $r) : ?>
                            <?php $e = preg_replace("/[^a-zA-Z0-9]/", "", $r['no_nota']); ?>
                          <tr>
                            <td><?= $r['no_nota']; ?></td>
                            <td><?= $r['tgl'];?></td>
                            <td><?= $r['grand_total']; ?></td>
                            <td class="d-flex align-items-center">
                            <a class="nav-link" href="<?php echo base_url(); ?>kasir/penjualan/detail/<?= $e ?>"><button class="btn btn-warning px-3 py-1">Edit </button></a>
                            <a class="nav-link" href="<?php echo base_url(); ?>kasir/penjualan/printulang/<?= $e ?>"><button class="btn btn-primary px-2 py-1">Print </button></a>
                            <a href="<?= base_url('kasir/penjualan/deleteTransaksi/') . $e ?>" onclick="return confirm('yakin dihapus?')">
                              <button class="btn btn-danger px-2 py-1"> Hapus</button></a>
                            </td>
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
