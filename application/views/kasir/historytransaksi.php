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
                      <table class="table table-bordered table-hover" style="width: 100%" id="example">

                        <thead>
                          <tr class="sticky-top bg-light">
                            <th scope="col"></th>
                            <th scope="col">Nomor Nota</th>
                            <th scope="col">Tanggal Nota</th>
                            <th scope="col">Nominal</th>
                          </tr>
                        </thead>
 
                        <tbody>
                          <?php foreach ($item as $r) : ?>
                            <?php $e = preg_replace("/[^a-zA-Z0-9]/", "", $r['no_nota']); ?>
                          <tr>
                            <td scope="row" class="d-flex">
                            <a class="nav-link" href="<?php echo base_url(); ?>kasir/penjualan/printulang/<?= $e ?>"><button class="btn btn-primary">Print</button></a>
                            </td>
                            <td><?= $r['no_nota']; ?></td>
                            <td><?= $r["tgl"]; ?></td>
                            <td><?= $r['grand_total']; ?></td>
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

<script> 
          $(document).ready(function () {
            table = $('#history').DataTable({
                "responsive": true,
                "destroy": true,
                "processing": true,
                "serverSide": true,
                "order": [],
        
                "ajax": {
                    "url": "<?= base_url()?>kasir/pasien/getHistory",
                    "type": "POST"
                },
        
        
                "columnDefs": [{
                    "targets": [0],
                    "orderable": false,
                    "width": 5
                }],
        
            });
          })
      </script>
