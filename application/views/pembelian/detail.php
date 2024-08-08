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
                <form action="<?= base_url('pembelian/pembelian/edititemmasuk/'). $transaksi['nomor_transaksi']; ?>" method="post">
                        
                  <div class="form-row">
                      <div class="form-group d-flex col-md-5 align-items-center">
                        <label for="nomor_transaksi">Nomor Transaksi:</label>
                        <input type="text" class="form-control l col-md-5" id="nomor_transaksi" value="<?= $transaksi['nomor_transaksi']?>" name="nomor_transaksi" readonly>
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
                        <?php $i = 0 ?>
                        <?php foreach ($item as $o) : ?>
                        <tr id="row_<?= $i ?>">
                          <!-- <td class="px-0"> -->
                            <input data-field-name="kode" type="hidden" class="l form-control" value="<?= $o['kode']?>" name="kode[]" id="kode_<?= $i ?>" autocomplete="off">
                          <!-- </td>  -->
                          <td class="px-0">
                            <input data-field-name="item" type="text" class="l form-control autoBeliitemEdit" value="<?= $o['nama']?>" name="item[]" id="item_<?= $i ?>" autocomplete="off">
                          </td>
                            <td>
                                <input type="number" class="l form-control" value="<?= $o['qty']?>" name="qty[]" id="qty_<?= $i ?>">
                            </td>
                          <td>
                            <input type="text" class="l form-control" value="<?= $o['harga_karyawan']?>" name="hargakaryawan[]" id="harga_karyawan_<?= $i ?>">
                          </td>
                          <td class="">
                            <div class="d-flex align-item-center">

                              <input type="text" class="l form-control total" value="<?= $o['harga_pengunjung']?>" name="hargapengunjung[]" id="harga_pengunjung_<?= $i ?>">
                              
                              <div id="delete_<?= $i ?>" class="btn btn-danger py-2 delete_row"><i class="fas fa-trash-alt"></i></div>
                            </div>
                          </td>
                        </tr>
                        <?php $i++ ?>
                        <?php endforeach; ?>
                        
                      </tbody>
                    </table>

                    <button type="submit" class="btn btn-warning py-3 px-4 mt-5" style="font-size:20px"">Update Data</button>
                    </form>
                  </div>
            </div>

          
          </div>
        </section>
      </div>
<?php $this->load->view('dist/_partials/footer'); ?>
