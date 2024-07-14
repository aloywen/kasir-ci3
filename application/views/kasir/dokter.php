<style>
  label {
    font-size: 20px !important;
    margin-right: 5px
  }
  .r {
    margin-top: -20px
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
            <h1>Kasir Dokter</h1>
          </div>

          <div class="section-body">

            <form action="<?= base_url('kasir/dokter/store'); ?>" method="post">

              <div class="form-row d-flex r">
                  <div class="form-group d-flex align-items-center col-md-5 row">
                    <label for="tgl_dari" class="col-md-6">Mulai tanggal</label>
                    <input type="date" id="tgl_dari" name="tgl_dari" class="form-control col-md-5 l">
                  </div>
                  <div class="form-group d-flex align-items-center col-md-5  row">  
                    <label for="tgl_sampai" class="col-md-6">Sampai Tanggal</label>
                    <input type="date" id="tgl_sampai" name="tgl_sampai" class="form-control col-md-5 l">
                  </div>
              </div> 
 
              <div class="form-row r">
                  <div class="form-group d-flex align-items-center col-md-8 row">
                    <label for="filldokter" class="col-md-4">Nama Dokter</label>
                    <select id="filldokter" name="filldokter" class="form-control col-md-6 l" onchange="return autofillDokter();">
                      <option selected ></option>
                      <?php foreach ($dokter as $p) : ?>
                      <option value="<?= $p['kode_dokter'] ?>"><?= $p['kode_dokter'] ?> - <?= $p['nama_dokter'] ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
              </div>
 


               <div class="row">
                <h5 class="col-md-2">NO</h5>
                <h5 class="col-md-6">KETERANGAN</h5>
                <h5 class="col-md-4">NILAI(Rp) </h5>
              </div>

              <div class="row">
                <h5 class="col-md-2 mt-2">1</h5>
                <div class="col-md-6">
                  <input class="form-control" name="jagafee" id="jagafee">
                </div>
                <div class="col-md-2">
                  <input type="text" class="form-control k" name="feejaga" id="feejaga" readonly></input>
                </div>
                <div class="col-md-2">
                  <input type="hidden" class="form-control k" name="kode_jaga" id="kode_jaga" readonly></input>
                </div>
              </div>

              <div class="row" id="jasaa">
                <div class="col-md-2" id="nomor">
                    <input type="hidden" class="form-control" id="nomor" readonly></input>
                </div>
                <div class="col-md-6" id="tees">
                    <input type="hidden" class="form-control" id="nama_jasa" readonly></input>
                </div>
                <div class="col-md-2" id="feeD">
                    <input type="hidden" class="form-control" id="fee_dokter" readonly></input>
                </div>
                <div class="col-md-2" id="kod">
                    <input type="hidden" class="form-control" id="kodeJa" readonly></input>
                </div>
              </div>
                
                <div class="row">
                  <h5 class="col-md-8">TOTAL</h5>
                  <input type="text" class="col-md-2 form-control k" name="grand_total" id="grand_total_dok" readonly></input>
                </div>
                <button type="submit" class="btn btn-primary">Print</button>
              </form>

          </div>

          
        </section>
      </div>
<?php $this->load->view('dist/_partials/footer'); ?>