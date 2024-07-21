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

              <!-- <form action="<?= base_url('masterdata/lapstokobat/store'); ?>" method="post"> -->

                <div class="form-row d-flex r">
                    <div class="form-group d-flex align-items-center col-md-6 row">
                        <label for="tgl_dari" class="col-md-5">Mulai tanggal</label>
                        <input type="date" id="tgl_dari" name="tgl_dari" class="form-control col-md-7 l">
                    </div>
                    <div class="form-group d-flex align-items-center col-md-6 row">  
                        <label for="tgl_sampai" class="col-md-5">Sampai Tanggal</label>
                        <input type="date" id="tgl_sampai" name="tgl_sampai" class="form-control col-md-7 l" onchange="return autofillStok();">
                    </div>
                </div>

                <!-- <div class="form-row r">
                  <div class="form-group d-flex align-items-center col-md-8 row">
                    <label for="filldokter" class="col-md-4">Kasir</label>
                    <select id="filldokter" name="filldokter" class="form-control col-md-6 l" onchange="return autofillDokter();">
                      <option selected ></option>
                      <?php foreach ($bidan as $p) : ?>
                      <option value="<?= $p['nama_bidan'] ?>"><?= $p['kode_bidan'] ?> - <?= $p['nama_bidan'] ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </div> -->

                <button type="submit" class="btn btn-primary px-4 py-2">Print</button>
 
              <!-- </form> -->

          </div>

          
        </section>
      </div>
<?php $this->load->view('dist/_partials/footer'); ?>