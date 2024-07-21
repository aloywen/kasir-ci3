<style>
  span {
    font-size: 15px;
    color: black;
    font-weight: 200px
  }
  .active {
    color: blue !important;
  }
</style>

<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
      <div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="<?php echo base_url(); ?>">MyPOS</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="<?php echo base_url(); ?>">MP</a>
          </div>
          <ul class="sidebar-menu">

            <!-- MASTER DATA -->
            <li class="dropdown <?php echo $this->uri->segment(2) == 'daftaradmin' || $this->uri->segment(2) == 'daftaritem' || $this->uri->segment(2) == 'lapstokitem' || $this->uri->segment(2) == 'lapomzet' ? 'active' : ''; ?>">
              <a href="#" class="nav-link has-dropdown"><i class="fas fa-th"></i> <span class="mt-2">Inventory</span></a>
              <ul class="dropdown-menu">

                <li class="<?php echo $this->uri->segment(2) == 'daftaradmin' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>masterdata/daftaradmin"><span>Daftar Admin</span></a></li>

                <li class="<?php echo $this->uri->segment(2) == 'daftaritem' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>masterdata/daftaritem"><span>Daftar Item</span></a></li>

                <li class="<?php echo $this->uri->segment(2) == 'lapomzet' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>masterdata/lapomzet"><span>Lap. Omzet</span></a></li>

                <li class="<?php echo $this->uri->segment(2) == 'lapstokitem' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>masterdata/lapstokitem"><span>Lap. Stok Barang</span></a></li>

              </ul>
            </li>
             


            <!-- KASIR -->
            <li class="dropdown <?php echo $this->uri->segment(1) == 'kasir' || $this->uri->segment(3) == 'riwayat' ? 'active' : ''; ?>">
              <a href="#" class="nav-link has-dropdown"><i class="fas fa-money-bill"></i> <span class="mt-2">Penjualan</span></a>
              <ul class="dropdown-menu">

                <li class="<?php echo $this->uri->segment(2) == 'penjualan' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>kasir/penjualan"><span>Kasir</span></a></li>
                <li class="<?php echo $this->uri->segment(3) == 'transaksiperhari' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>kasir/penjualan/transaksiperhari"><span>History Perhari</span></a></li>
                <li class="<?php echo $this->uri->segment(3) == 'historytransaksi' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>kasir/penjualan/historytransaksi"><span>History Transaksi</span></a></li>

              </ul>
            </li>


            <!-- PEMBELIAN -->
            <li class="dropdown <?php echo $this->uri->segment(2) == 'pembelian' || $this->uri->segment(2) == 'riwayatpembelian' ? 'active' : ''; ?>">
              <a href="#" class="nav-link has-dropdown"><i class="fas fa-money-bill"></i> <span class="mt-2">Pembelian</span></a>
              <ul class="dropdown-menu">

                <li class="<?php echo $this->uri->segment(3) == 'add' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>pembelian/pembelian/add"><span>Pembelian Item</span></a></li>
                <li class="<?php echo $this->uri->segment(3) == 'riwayat' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>pembelian/pembelian/riwayat"><span>Riwayat Pembelian</span></a></li>
                <li class="<?php echo $this->uri->segment(3) == 'stokitem' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>pembelian/pembelian/stokitem"><span>Stok Item</span></a></li>


              </ul>
            </li>




            <!-- PENGATURAN -->
            <!-- <li class="dropdown <?php echo $this->uri->segment(2) == 'daftaruser' || $this->uri->segment(2) == 'aksesuser' || $this->uri->segment(2) == 'pengaturanumum' || $this->uri->segment(2) == 'settingnomortransaksi' || $this->uri->segment(2) == 'logaktifitas' ? 'active' : ''; ?>">
              <a href="#" class="nav-link has-dropdown"><i class="fas fa-wrench"></i> <span class="mt-2">Pengaturan</span></a>
              <ul class="dropdown-menu">
                <li class="<?php echo $this->uri->segment(2) == 'daftaruser' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>pengaturan/daftaruser"> <span>Daftar Pasien</span> </a></li>
                <li class="<?php echo $this->uri->segment(2) == 'daftaruser' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>pengaturan/daftaruser"> <span>Daftar Pasien</span> </a></li>


              </ul>
            </li> -->
            
          </ul>

        </aside>
      </div>
