<style>
  label {
    font-size: 20px !important;
    margin-right: 5px
  }
  
  .l {
    height: 40px !important;
    margin-top: -10px;
    font-size: 16px !important
  }
  .k {
    height: 35px !important
  }
</style>

<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('dist/_partials/header');
?>
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Laporan Stok Barang</h1>
          </div>

          <div class="section-body">

              <form action="<?= base_url('masterdata/lapstokitem/print'); ?>" method="post">

                <div class="form-row d-flex r">
                    <div class="form-group d-flex align-items-center col-md-6 row">
                        <label for="tgl_d" class="col-md-5">Mulai tanggal</label>
                        <input type="date" id="tgl_d" name="tgl_d" class="form-control col-md-7 l">
                    </div>
                    <div class="form-group d-flex align-items-center col-md-6 row">  
                        <label for="tgl_s" class="col-md-5">Sampai Tanggal</label>
                        <input type="date" id="tgl_s" name="tgl_s" class="form-control col-md-7 l">
                    </div>
                </div>


                <button type="submit" class="btn btn-primary px-4 py-2">Print</button>
 
              </form>

          </div>

          
        </section>
      </div>
<?php $this->load->view('dist/_partials/footer'); ?>