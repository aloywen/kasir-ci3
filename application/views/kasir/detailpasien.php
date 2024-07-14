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
                <form action="<?= base_url('kasir/pasien/editKasir/') . $transaksi['tgl_kwitansi']; ?>" method="post">
                <?php
                          date_default_timezone_set('Asia/Jakarta');
                       
                     ?>
                      
                  <!-- REGISTER, KWITANSI, TGLa -->
                  <div class="form-row">
                      <div class="form-group d-flex col-md-4 align-items-center">
                        <label for="register">Register:</label>
                        <input type="text" class="form-control l" id="register" value="<?= $transaksi['register'] ?>" name="register" readonly>
                      </div>

                      <div class="form-group d-flex col-md-4 align-items-center">
                        <label for="no_kwitansi">Kwitansi:</label>
                        <input type="text" class="form-control l" id="no_kwitansi" value="<?= $transaksi['no_kwitansi'] ?>" name="no_kwitansi" readonly>
                      </div>
 
                      <div class="form-group d-flex col-md-4 align-items-center">
                        <label for="tgl">Tanggal:</label>
                        
                        <input type="text" class="form-control l" id="tgl" name="tgl_kwitansi" value="<?= $transaksi['tgl_kwitansi'] ?>" readonly>
                      </div>
                  </div>

                  <!-- NAMA PASIEN, STATUS, JENIS PASIEN -->
                  <div class="form-row px-0 r">
                      <div class="form-group d-flex align-items-center col-md-6 row">
                        <label for="pasien" class="col-md-4 px-0">Nama Pasien :</label>
                        <input type="text" class="form-control l col-md-3" name="kode_pasien" id="kode_pasien" value="<?= $transaksi['medical_record'] ?>" readonly>
                        <input data-field-name="pasien" type="text" name="pasien" value="<?= $transaksi['nama_pasien'] ?>" id="pasien" class="form-control col-md-4 l" readonly>
                      </div>
                      <div class="form-group d-flex align-items-center col-md-3">
                        <label for="status">Status</label>
                        <input type="text" class="form-control l" value="<?= $transaksi['status'] ?>" name="status" id="status" autocomplete="off">
                      </div>
                      <div class="form-group d-flex align-items-center col-md-3 row">
                        <label style="font-size:18px!important" for="jns_pasien" class="col px-0 ml-3">Jenis Pasien</label>
                        <input type="text" class="form-control l col-md-6" value="<?= $transaksi['jns_pasien'] ?>" name="jns_pasien" id="jns_pasien" autocomplete="off">
                      </div>
                  </div>

                  <!-- NM. PENANGGUNG, PERUSAHAAN, ASURANSI -->
                  <div class="form-row r">
                      <div class="form-group d-flex align-items-center col-md-4">
                        <label for="penanggung">Nm. Penanggung</label>
                        <input type="text" class="form-control l" value="<?= $transaksi['penanggung'] ?>" name="penanggung" id="penanggung" autocomplete="off">
                      </div>

                      <div class="form-group d-flex align-items-center col-md-4">
                        <label for="perusahaan">Perusahaan</label>
                        <input type="text" class="form-control l" value="<?= $transaksi['perusahaan'] ?>" name="perusahaan" id="perusahaan" autocomplete="off">
                      </div>

                      <div class="form-group d-flex align-items-center col-md-4">
                        <label for="asuransi">Asuransi</label>
                        <input type="text" class="form-control l" value="<?= $transaksi['asuransi'] ?>" name="asuransi" id="asuransi" autocomplete="off">
                      </div>
                  </div>
 
                  <!-- DOKTER, DIAGNOSA, ICD -->
                  <div class="form-row r">
                      <div class="form-group d-flex align-items-center col-md-4">
                        <label for="dokter">Dokter</label>
                        <input type="hidden" class="form-control l" value="<?= $transaksi['kode_dokter'] ?>" name="kode_dokter" id="kode_dokter" autocomplete="off">
                        <select id="dokter" name="dokter" class="form-control l">
                                <option selected><?= $transaksi['kode_dokter'] ?> - <?= $transaksi['nama_dokter'] ?></option>
                                <?php foreach ($dokter as $d) : ?>
                                <option value="<?= $d['kode_dokter'] ?>"><?= $d['nama_dokter'] ?></option>
                                <?php endforeach ?>
                        </select>
                      </div>

                      <div class="form-group d-flex align-items-center col-md-4">
                        <label for="diagnosa">Diagnosa</label>
                        <input type="text" class="form-control l" value="<?= $transaksi['diagnosa'] ?>" name="diagnosa" id="diagnosa" autocomplete="off">
                      </div>

                      <div class="form-group d-flex align-items-center col-md-4">
                        <label for="icd">ICD</label>
                        <input type="text" class="form-control l" value="<?= $transaksi['icd'] ?>" name="icd" id="icd" autocomplete="off">
                      </div>
                  </div>

                  <div class="form-row r">
                    <div class="form-group d-flex align-items-center col-md-4">
                        <label for="bidan">Bidan / Perawat</label>
                        <input type="hidden" class="form-control l" value="<?= $transaksi['kode_bidan'] ?>" name="kode_bidan" id="dokter" autocomplete="off">
                        <select id="bidan" name="bidan" class="form-control l">
                                <option selected ><?= $transaksi['kode_bidan'] ?> - <?= $transaksi['nama_bidan'] ?></option>
                                <?php foreach ($bidan as $d) : ?>
                                <option value="<?= $d['kode_bidan'] ?>"><?= $d['kode_bidan'] ?> - <?= $d['nama_bidan'] ?></option>
                                <?php endforeach ?>
                        </select>
                    </div>
                  </div>

                  <table class="table" style="width:100%">
                      <thead>
                        <tr>
                          <th style="width:120px">Kode</th>
                          <th style="width:220px">Nama Obat/Jasa</th>
                          <th style="width:140px" >Qty</th>
                          <th >Harga</th>
                          <th >Jml. Harga</th>
                        </tr>
                      </thead>
                      <tbody class="isi">
                        <?php $i = 0 ?>
                        <?php foreach ($obat as $o ) : ?>
                          <?php $i++ ?>
                        <tr id="row_<?= $i ?>">
                          <td class="px-0">
                            <input data-field-name="kode" type="text" class="l form-control col-md-12 autocomplete" value="<?= $o['kode_obat'] ?>" name="kode[]" id="kode_<?= $i ?>" autocomplete="off">
                          </td>
                          <td class="px-0">
                            <input data-field-name="obat" type="text" class="l form-control col-md-12 autocomplete" value="<?= $o['nama'] ?>" name="obat[]" id="obat_<?= $i ?>" autocomplete="off">
                          </td>
                          <td>
                            <input onchange="total();" type="number" class="l form-control qty" value="<?= $o['qty'] ?>" name="qty[]" id="qty_<?= $i ?>">
                          </td>
                          <td>
                            <input type="text" class="l form-control" value="<?= $o['harga_jasa'] ?>" name="harga[]" id="harga_<?= $i ?>">
                          </td>
                            <input type="hidden" class="l form-control" value="<?= $o['fee'] ?>" name="fee[]" id="fee_<?= $i ?>" readonly>
                            <input type="hidden" class="l form-control" value="<?= $o['induk'] ?>" name="induk[]" id="induk_<?= $i ?>" readonly>
                          <td class="d-flex align-items-center">
                            <input type="text" class="l form-control total" value="<?= $o['total_harga'] ?>" name="total_harga[]" id="total_harga_<?= $i ?>" readonly>
                          </td>
                          <td >
                            <div id="delete_<?= $i ?>" class="btn btn-danger delete_row py-2"><i class="fas fa-trash-alt"></i></div>
                            <input type="hidden" class="l form-control total" value="<?= $o['ket'] ?>" name="ket[]" id="ket_<?= $i ?>" readonly>
                          </td>
                        </tr>
                        <?php endforeach; ?>
                        
                      </tbody>
                      <tfoot>
                        <tr>
                          <td colspan="2"><button id="addFieldeditnota" class="btn btn-primary">TAMBAH BARIS</button></td>
                        </tr>
                        <tr>
                          <td colspan="2"><h3>TOTAL</h3></td>
                          <td colspan="3" class="text-right"><input type="text" name="grand_total" id="grand_total" class="form-control text-right g" value="<?= $transaksi['grand_total'] ?>" readonly></td>
                        </tr>
                              </tfoot>
                    </table>

                    <button type="submit" class="btn btn-success">SIMPAN</button>
                    </form>
                  </div>
                  <!-- <?php var_dump($bidan); ?> -->
            </div>

          
          </div>
        </section>
      </div>
<?php $this->load->view('dist/_partials/footer'); ?>
