<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('dist/_partials/header');
?>
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>LAPORAN</h1>
          </div>

          <div class="section-body">

          <div class="row sortable-card">
              <div class="col-12 col-md-6 col-lg-4">
                <div class="card card-primary py-5 dropdown text-center" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <h6>LAPORAN MASTER DATA</h6>
                      <div class="dropdown-menu">
                        <a class="dropdown-item" href="#">Daftar Item</a>
                        <a class="dropdown-item" href="#">Daftar Supplier</a>
                        <a class="dropdown-item" href="#">Daftar Pelanggan</a>
                      </div>
                </div>
              </div>

              <div class="col-12 col-md-6 col-lg-4">
                <div class="card card-warning py-5 dropdown text-center" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <h6>LAPORAN PEMBELIAN</h6>
                      <div class="dropdown-menu">
                        <a class="dropdown-item" href="#">Laporan Pembelian</a>
                        <a class="dropdown-item" href="#">Laporan Retur Pembelian</a>
                        <a class="dropdown-item" href="#">Laporan Pembelian Per Item</a>
                      </div>
                </div>
              </div>

              <div class="col-12 col-md-6 col-lg-4">
                <div class="card card-success py-5 dropdown text-center" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <h6>LAPORAN PENJUALAN</h6>
                      <div class="dropdown-menu">
                        <a class="dropdown-item" href="#">Laporan Penjualan</a>
                        <a class="dropdown-item" href="#">Laporan Penjualan Per Item</a>
                        <a class="dropdown-item" href="#">Laporan Retur Penjualan</a>
                      </div>
                </div>
              </div>

              <div class="col-12 col-md-6 col-lg-4">
                <div class="card card-success py-5 dropdown text-center" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <h6>LAPORAN PERSEDIAAN</h6>
                      <div class="dropdown-menu">
                        <a class="dropdown-item" href="#">Laporan Item Masuk</a>
                        <a class="dropdown-item" href="#">Laporan Item Keluar</a>
                        <a class="dropdown-item" href="#">Laporan Item Tidak Laku</a>
                      </div>
                </div>
              </div>

              
            </div>

          </div>
        </section>
      </div>
<?php $this->load->view('dist/_partials/footer'); ?>