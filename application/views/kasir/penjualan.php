<style>
  label {
    font-size: 20px !important;
    margin-right: 5px
  }
  .r {
    margin-top: -20px
  }
  .l {
    height: 45px !important;
    margin-top: -7px;
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
          <?= $this->session->flashdata('message'); ?>

            <div class="card">
              <div class="card-body">
                <form action="<?= base_url('kasir/penjualan/store'); ?>" method="post">
                        <?php
                        
                     $dat = $no_kwitansi['no_nota'];
                     $nourut = substr($dat, 0, 2);
                     $m_record = $nourut + 1;

                    //  echo $nourut;
                    
                     ?>
                  <div class="form-row gap-3">
                      
                      <div class="form-group col-md-3">
                        <label for="no_nota">No. Nota :</label>
                        <input type="text" class="form-control l" id="no_nota" value="<?= date('my');?>/<?= sprintf("%04s", $m_record) ?>" name="no_nota" readonly>
                      </div>
                      
                      <div class="form-group col-md-3">
                        <label for="tgl">Tanggal :</label>
                        <?php date_default_timezone_set('Asia/Jakarta');?>
                        <input type="text" class="form-control l" id="tgl" name="tgl_nota" value="<?php date_default_timezone_set('Asia/Jakarta'); echo date('d-m-Y H:i:s');?>" readonly>
                      </div>
                      
                      <div class="form-group col-md-3">
                        <label for="peruntukan">Untuk :</label>
                        <select class="form-control l" id="peruntukan" name="peruntukan" aria-label="Default select example">
                          <option value="pengunjung">Pengunjung</option>
                          <option value="karyawan">Karyawan</option>
                        </select>
                        <!-- <input type="option" class="form-control l" id="peruntukan" value="<?= sprintf("%03s", $m_record) ?>/<?= date('my');?>" name="peruntukan" readonly> -->
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
                        <tr id="row_1">
                          <!-- <td class="px-0"> -->
                            <input data-field-name="kode" type="hidden" class="l form-control col-md-12 autocomplete" value="" name="kode[]" id="kode_1" autocomplete="off">
                          <!-- </td> -->
                          <td class="px-0">
                            <input data-field-name="item" type="text" class="l form-control col-md-12 autocomplete" value="" name="item[]" id="item_1" autocomplete="off">
                          </td>
                          <td>
                            <input onchange="total();" type="number" class="l form-control qty" value="" name="qty[]" id="qty_1">
                          </td>
                          <td>
                            <input type="text" class="l form-control" value="" name="harga[]" id="harga_1" disabled>
                          </td>
                          <td>
                            <input type="text" class="l form-control total" value="" name="total_harga[]" id="total_harga_1" readonly>
                          </td>
                          <td class="d-flex align-items-center">
                            <div id="delete_1" class="btn btn-danger delete_row"><i class="fas fa-trash-alt"></i></div>
                          </td>
                        </tr>

                        
                      </tbody>
                      <tfoot>
                        <tr>
                          <td colspan="1"><button id="addField" class="btn btn-warning py-2">TAMBAH ITEM</button></td>
                        </tr>
                        <tr>
                          <td colspan="2"><h3>TOTAL</h3></td>
                          <td colspan="3" class="text-right"><input type="text" name="grand_total" id="grand_total" class="form-control text-right g" readonly></td>
                        </tr>
                        <tr>
                          <td class=""><h3>BAYAR</h3></td>
                          <td class="text-right"><input style="width:220px" type="number" name="bayar" id="bayar" class="form-control text-right g kembali"></td>

                          <td ><h3>UANG KEMBALI</h3></td>
                          <td class="text-right"><input type="number" name="uang_kembali" id="uang_kembali" class="form-control text-right g" readonly></td>
                        
                        </tr>
                      </tfoot>
                    </table>

                    <button type="submit" class="btn btn-primary py-2">SIMPAN TRANSAKSI</button>
                    </form>
                  </div>
            </div>

          
          </div>
        </section>
      </div>
<?php $this->load->view('dist/_partials/footer'); ?>
