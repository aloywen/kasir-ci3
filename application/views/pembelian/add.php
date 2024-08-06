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
  .g {
    height: 60px !important;
    font-size: 25px !important
  }
  .k {
    margin-top: -30px !important
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
                <form action="<?= base_url('pembelian/pembelian/store'); ?>" method="post">
                        <?php
                          date_default_timezone_set('Asia/Jakarta');
                       
                     $nourut = substr($no_transaksi, 3, 7);
                     $m_transaksi = $nourut + 1;
                     ?>
                  <div class="form-row">
                      <div class="form-group d-flex col-md-5 align-items-center">
                        <label for="nomor_transaksi">Nomor Transaksi:</label>
                        <input type="text" class="form-control l col-md-5" id="nomor_transaksi" value="MSK<?= sprintf("%07s", $m_transaksi) ?>" name="nomor_transaksi" readonly>
                      </div>


                      <div class="form-group d-flex col-md-3 align-items-center">
                        <label for="tgl_transaksi">Tanggal:</label>
                        <?php
                                date_default_timezone_set('Asia/Jakarta');
                        ?>
                        <input type="text" class="form-control l" id="tgl_transaksi" name="tgl_transaksi" value="<?= date('d-m-Y');?>" readonly>
                      </div>
                  </div>



                  <table class="table" style="width:100%">
                      <thead>
                        <tr>
                          <th >Nama Item</th>
                          <th >Qty</th>
                          <th >Harga Karyawan</th> 
                          <th >Harga Pengunjung</th>
                        </tr>
                      </thead>
                      <tbody class="isi">
                        <tr id="row_1">
                            <input data-field-name="kode" type="hidden" class="l form-control" value="" name="kode[]" id="kode_1" autocomplete="off">
                          <td class="px-0">
                            <input data-field-name="obat" type="text" class="l form-control autoItemmasuk" value="" name="obat[]" id="obat_1" autocomplete="off">
                          </td>
                            <td>
                                <input type="number" class="l form-control" value="" name="qty[]" id="qty_1">
                            </td>
                          <td>
                            <input type="text" class="l form-control" value="" name="hargakaryawan[]" id="harga_karyawan_1">
                          </td>
                          <td class="px-0">
                            <input type="text" class="l form-control total" value="" name="hargapengunjung[]" id="harga_pengunjung_1">
                          </td>
                        </tr>

                        
                      </tbody>
                      <tfoot>
                        <tr>
                          <td colspan="2"><button id="addFieldl" class="btn btn-primary py-2 px-3 mt-1" style="font-size:15px">tambah baris</button></td>
                        </tr>
                              </tfoot>
                    </table>

                    <button type="submit" class="btn btn-warning py-3 px-4 mt-5" style="font-size:20px">Simpan Data</button>
                    </form>
                  </div>
            </div>

          
          </div>
        </section>
      </div>
<?php $this->load->view('dist/_partials/footer'); ?>
