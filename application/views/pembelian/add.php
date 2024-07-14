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
                        <input type="text" class="form-control l col-md-5" id="nomor_transaksi" value="BEL<?= sprintf("%07s", $m_transaksi) ?>" name="nomor_transaksi" readonly>
                      </div>


                      <div class="form-group d-flex col-md-3 align-items-center">
                        <label for="tgl_transaksi">Tanggal:</label>
                        <?php
                                date_default_timezone_set('Asia/Jakarta');
                        ?>
                        <input type="text" class="form-control l" id="tgl_transaksi" name="tgl_transaksi" value="<?= date('d-m-Y');?>" readonly>
                      </div>
                  </div>


                  <div class="form-row mt-1 r">
                      <div class="form-group d-flex align-items-center col-md-5 row">
                        <label for="nama_supplier" class="col-md-6">Nama Supplier</label>
                        <input data-field-name="supplier" type="text" name="nama_supplier" id="nama_supplier" class="form-control col-md-5 l">
                      </div>
                  </div>



                  <table class="table" style="width:100%">
                      <thead>
                        <tr>
                          <th >Kode</th>
                          <th >Nama Obat</th>
                          <th >Jenis</th>
                          <th >Qty</th>
                          <th >Harga Beli</th> 
                          <th >Harga Jual</th>
                        </tr>
                      </thead>
                      <tbody class="isi">
                        <tr id="row_1">
                          <td class="px-0">
                            <input data-field-name="kode" type="text" class="l form-control" value="" name="kode[]" id="kode_1" autocomplete="off">
                          </td>
                          <td class="px-0">
                            <input data-field-name="obat" type="text" class="l form-control autoBeliobat" value="" name="obat[]" id="obat_1" autocomplete="off">
                          </td>
                          <td>
                            <input type="text" class="l form-control" value="" name="jenis[]" id="jenis_1"> 
                        </td>
                            <td>
                                <input type="number" class="l form-control" value="" name="qty[]" id="qty_1">
                            </td>
                          <td>
                            <input type="text" class="l form-control" value="" name="hargabeli[]" id="harga_beli_1">
                          </td>
                          <td class="px-0">
                            <input type="text" class="l form-control total" value="" name="hargajual[]" id="harga_jual_1">
                          </td>
                        </tr>

                        
                      </tbody>
                      <tfoot>
                        <tr>
                          <td colspan="2"><button id="addFieldl" class="btn btn-primary">tambah baris</button></td>
                        </tr>
                              </tfoot>
                    </table>

                    <button type="submit" class="btn btn-success">Simpan Data</button>
                    </form>
                  </div>
            </div>

          
          </div>
        </section>
      </div>
<?php $this->load->view('dist/_partials/footer'); ?>
