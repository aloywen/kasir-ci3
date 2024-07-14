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

                    <!-- table -->
                    <div class="table-responsive t">
                      <table class="table table-bordered table-hover" id="example">

                        <thead>
                          <tr class="sticky-top bg-light">
                            <th scope="col">Nama Obat</th>
                            <th scope="col">Stok</th>
                          </tr>
                        </thead>
 
                        <tbody>
                          <?php foreach ($stok as $r) : ?>
                          <tr>
                            <td><?= $r['nama']; ?></td>
                            <td><?= $r['stok']; ?></td>
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
