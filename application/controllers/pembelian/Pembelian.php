<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembelian extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }
    
    public function index() {
		$data = array(
			'title' => "Item Masuk",
			'menu' => "Item Masuk"
		);

		$data['item'] = $this->db->get('transaksi_item_masuk')->result_array();

		$this->load->view('pembelian/index', $data);
	}

	public function add()
	{
		$data = array(
			'title' => "Tambah Item Masuk",
			'menu' => "Tambah Item Masuk"
		);

        $query = $this->db->query("SELECT MAX(nomor_transaksi) as m_transaksi from transaksi_item_masuk");
        $da = $query->row();
        $data['no_transaksi'] = $da->m_transaksi;


		$this->load->view('pembelian/add', $data);
	}

    public function cariitem(){
        $name=$_GET['name'];
        $fieldName=$_GET['fieldName'];


        $this->db->select('*'); 
        $this->db->from('daftar_item');
        $this->db->like('nama', $name);
        $query = $this->db->get()->result_array();
        echo json_encode($query);
    }

	public function store()
    {

            $kode = $this->input->post('kode_item');
            $qty = $this->input->post('qty');
            $temp_harga_pengunjung = $this->input->post('harga_pengunjung');
            $temp_harga_karyawan = $this->input->post('harga_karyawan');
            $harga_pengunjung = preg_replace("/[^0-9]/", "", $temp_harga_pengunjung);
            $harga_karyawan = preg_replace("/[^0-9]/", "", $temp_harga_karyawan);


            // var_dump($);
            $data = [
                'nomor_transaksi' => htmlspecialchars($this->input->post('nomor_transaksi', true)),
                'tgl_transaksi' => date('Y-m-d'),
                'kasir' => htmlspecialchars($this->userdata('user'), true)
            ];

            // TAMBAH OBAT PEMBELIAN
            $i = 0; 
            foreach($kode as $row){
                $dat = array(
                        'kode_item'=> $row,
                        'nomor_transaksi' => $this->input->post('nomor_transaksi'),
                        'jumlah'=> $qty[$i],
                        'harga_pengunjung'=> $harga_pengunjung[$i],
                        'harga_karyawan'=> $harga_karyawan[$i],
                );
                $i++;
                $this->db->insert("item_pembelian",$dat);
                // var_dump($dat);
            }

            // TAMBAH TRANSAKSI
            $this->db->insert('transaksi_item_masuk', $data);


            // UPDATE HARGA OBAT
            $index = 0;
            
            foreach($kode as $row){
                $harga = array(
                        'harga_pengunjung'=> $harga_pengunjung[$index],
                        'harga_karyawan'=> $harga_karyawan[$index]
                );
                $index++;
                $this->db->set($harga);
                $this->db->where('kode', $row);
                $this->db->update('daftar_item');
            }

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Ditambah!</div>');
            redirect('pembelian/pembelian/riwayat');
    
    }

    public function detail($no)
    {

        $data = array(
			'title' => "Detail Item Masuk",
			'menu' => "Detail Item Masuk"
		);

        $this->db->select('*');
        $this->db->from('item_pembelian');
        $this->db->join('jasa', 'jasa.kode = item_pembelian.kode_item');
        $this->db->where('item_pembelian.nomor_transaksi', $no); 
        $this->db->where('item_pembelian.nomor_transaksi', $no); 
        $data['item'] = $this->db->get()->result_array();


        $data['transaksi'] = $this->db->get_where('transaksi_item_masuk', ['nomor_transaksi' => $no])->row_array();

		$this->load->view('pembelian/detail', $data);
        
    }
     
    public function editpembelian($no)
    { 
        
            $supplier = $this->input->post('nama_supplier');
            $jumlah = $this->input->post('qty');
            $jenis = $this->input->post('jenis');
            $harga_beli = $this->input->post('hargabeli');
            $harga_jual = $this->input->post('hargajual');
            $kode = $this->input->post('kode');

            // update data pembelian
            $index = 0;
            foreach($kode as $row){
                $update = array(
                        'kode_obat'=> $row,
                        'jenis'=> strtoupper($jenis[$index]),
                        'jumlah'=> $jumlah[$index],
                        'harga_beli'=> $harga_beli[$index],
                        'harga_jual'=> $harga_jual[$index]
                );
                $index++;
                $this->db->set($update);
                $this->db->where('kode_obat', $row);
                $this->db->update('obat_pembelian');
                // var_dump($update);
            }

            // edit data transaksi
            $this->db->set(['nama_supplier' => $supplier]);
            $this->db->where('nomor_transaksi', $no);
            $this->db->update('transaksi_item_masuk');

            $i = 0;
            foreach($kode as $row){
                $harga = array(
                        'harga_beli'=> $harga_beli[$i],
                        'harga_jasa'=> $harga_jual[$i]
                );
                $i++;
                $this->db->set($harga);
                $this->db->where('kode', $row);
                $this->db->update('jasa');
            }

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Diubah!</div>');
            redirect('pembelian/pembelian/riwayat');
        
    }

    public function riwayat()
    {
        $data = array(
			'title' => "Riwayat Item Masuk",
			'menu' => "Riwayat Item Masuk"
		); 

		$data['item'] = $this->db->get('transaksi_item_masuk')->result_array();

		$this->load->view('pembelian/riwayat', $data);
    }

    public function stokobat()
    {
        $data = array(
			'title' => "Stok Item",
			'menu' => "Stok Item"
		);

		$this->db->select('*');
        $this->db->from('stok_akhir');
        $this->db->join('daftar_item', 'daftar_item.kode = stok_akhir.kode_item');
        $data['stok'] = $this->db->get()->result_array();

        // var_dump($da);

        $this->load->view('pembelian/stokobat', $data);
    }

}