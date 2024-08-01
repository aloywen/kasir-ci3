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
                <?php $nota = preg_replace("/[^a-zA-Z0-9]/", "", $transaksi['no_nota']);
                
                ?>
                <form action="<?= base_url('kasir/penjualan/editKasir/') . $nota ?>" method="post">
                <?php
                          date_default_timezone_set('Asia/Jakarta');
                       
                     ?>
                     
                      
                      <div class="form-row gap-3">
                      
                      <div class="form-group col-md-3">
                        <label for="no_nota">No. Nota :</label>
                        <input type="text" class="form-control l" id="no_nota" value="<?= $transaksi['no_nota'];?>" name="no_nota" readonly>
                      </div>
                      
                      <div class="form-group col-md-3">
                        <label for="tgl">Tanggal :</label>
                        <?php date_default_timezone_set('Asia/Jakarta');?>
                        <input type="text" class="form-control l" id="tgl" name="tgl_nota" value="<?= $transaksi['tgl']?>" readonly>
                      </div>
                      
                      <div class="form-group col-md-3">
                        <label for="peruntukan">Untuk :</label>
                        <select class="form-control l" id="peruntukan" name="peruntukan" aria-label="Default select example">
                          <option value="pengunjung">Pengunjung</option>
                          <option value="karyawan">Karyawan</option>
                        </select>
                      </div>

                  </div>

                  <table class="table" style="width:100%">
                      <thead>
                      <tr>
                          <th style="width:220px">Nama Item</th>
                          <th style="width:140px" >Qty</th>
                          <th >Harga</th>
                          <th >Jml. Harga</th>
                        </tr>
                      </thead>
                      <tbody class="isi">
                        <?php $i = 0 ?>
                        <?php foreach ($item as $it ) : ?>
                          <?php $i++ ?>

                        <tr id="row_<?= $i ?>">
                          <!-- <td class="px-0"> -->
                            <input data-field-name="kode" type="hidden" class="l form-control col-md-12 autocomplete" value="<?= $it['kode_item'] ?>" name="kode[]" id="kode_<?= $i ?>" autocomplete="off">
                          <!-- </td> -->
                          <td class="px-0">
                            <input data-field-name="item" type="text" class="l form-control col-md-12 autocomplete" value="<?= $it['nama']; ?>" name="item[]" id="item_<?= $i ?>" autocomplete="off">
                          </td>
                          <td>
                            <input onchange="total();" type="number" class="l form-control qty" value="<?= $it['qty']; ?>" name="qty[]" id="qty_<?= $i ?>">
                          </td>
                          <td>
                            <input type="text" class="l form-control" value="<?= $it['harga']; ?>" name="harga[]" id="harga_<?= $i ?>" disabled>
                          </td>
                          <td>
                            <input type="text" class="l form-control total" value="<?= $it['total_harga']; ?>" name="total_harga[]" id="total_harga_<?= $i ?>" readonly>
                            <input type="hidden" class="l form-control" value="<?= $it['tgl']; ?>" name="tgl[]" id="tgl_<?= $i ?>" readonly>
                          </td>
                          <td class="d-flex align-items-center">
                            <div id="delete_1" class="btn btn-danger delete_row"><i class="fas fa-trash-alt"></i></div>
                          </td>
                        </tr>
                        <?php endforeach; ?>
                        
                      </tbody>
                      <tfoot>
                        <tr>
                            <td colspan="1"><button id="addFieldeditnota" class="btn btn-warning py-2">TAMBAH ITEM</button></td>
                          </tr>
                          <tr>
                            <td colspan="2"><h3>TOTAL</h3></td>
                            <td colspan="3" class="text-right"><input type="text" name="grand_total" value="<?= $transaksi['grand_total']?>" id="grand_total" class="form-control text-right g" readonly></td>
                          </tr>
                          <tr>
                            <td class=""><h3>BAYAR</h3></td>
                            <td class="text-right"><input style="width:220px" type="text" name="bayar" value="<?= $transaksi['bayar']?>" id="bayar" class="form-control text-right g kembali"></td>

                            <td ><h3>UANG KEMBALI</h3></td>
                            <td class="text-right"><input type="number" name="uang_kembali" value="<?= $transaksi['kembali']?>" id="uang_kembali" class="form-control text-right g" readonly></td>
                          
                          </tr>
                        </tfoot>
                    </table>

                    <button type="submit" class="btn btn-primary py-2">SIMPAN</button>
                    </form>
                  </div>
                  <!-- <?php var_dump($bidan); ?> -->
            </div>

          
          </div>
        </section>
      </div>
<?php $this->load->view('dist/_partials/footer'); ?>


