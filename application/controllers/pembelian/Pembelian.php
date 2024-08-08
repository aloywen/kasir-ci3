<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembelian extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }
    
    public function riwayatmasuk() {
		$data = array(
			'title' => "Item Masuk",
			'menu' => "Item Masuk"
		);

		$data['item'] = $this->db->get('transaksi_item_masuk')->result_array();

		$this->load->view('pembelian/riwayat', $data);
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

            $kode = $this->input->post('kode');
            $qty = $this->input->post('qty');
            $temp_harga_pengunjung = $this->input->post('hargapengunjung');
            $temp_harga_karyawan = $this->input->post('hargakaryawan');
            $harga_pengunjung = preg_replace("/[^0-9]/", "", $temp_harga_pengunjung);
            $harga_karyawan = preg_replace("/[^0-9]/", "", $temp_harga_karyawan);


            $data = [
                'nomor_transaksi' => htmlspecialchars($this->input->post('nomor_transaksi', true)),
                'tgl_transaksi' => date('Y-m-d'),
                'kasir' => htmlspecialchars($this->session->userdata('user'), true)
            ];
            // var_dump($data);
            
            // TAMBAH OBAT PEMBELIAN
            $i = 0; 
            foreach($kode as $row){
                $dat = array(
                        'kode_item'=> $row,
                        'nomor_transaksi' => $this->input->post('nomor_transaksi'),
                        'qty'=> $qty[$i],
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
            redirect('pembelian/pembelian/riwayatmasuk');
    
    }

    public function detail($no)
    {

        $data = array(
			'title' => "Detail Item Masuk",
			'menu' => "Detail Item Masuk"
		);

        $this->db->select('*');
        $this->db->from('item_pembelian');
        $this->db->join('daftar_item', 'daftar_item.kode = item_pembelian.kode_item');
        $this->db->where('item_pembelian.nomor_transaksi', $no); 
        $data['item'] = $this->db->get()->result_array();


        $data['transaksi'] = $this->db->get_where('transaksi_item_masuk', ['nomor_transaksi' => $no])->row_array();

		$this->load->view('pembelian/detail', $data);
        
    }
     
    public function edititemmasuk($no)
    { 
        
            $jumlah = $this->input->post('qty');
            $temp_harga_karyawan = $this->input->post('hargakaryawan');
            $temp_harga_pengunjung = $this->input->post('hargapengunjung');
            $kode = $this->input->post('kode');

            $harga_karyawan = preg_replace("/[^0-9]/", "", $temp_harga_karyawan);
            $harga_pengunjung = preg_replace("/[^0-9]/", "", $temp_harga_pengunjung);

            $this->db->where('nomor_transaksi', $no);
            $this->db->delete('item_pembelian');

            // update data pembelian
            $index = 0;
            foreach($kode as $row){
                $dat = array(
                        'kode_item'=> $row,
                        'nomor_transaksi' => $no,
                        'qty'=> $jumlah[$index],
                        'harga_karyawan'=> $harga_karyawan[$index],
                        'harga_pengunjung'=> $harga_pengunjung[$index]
                );
                $index++;
                $this->db->insert('item_pembelian',$dat);
                // var_dump($dat);
            }


            $i = 0;
            foreach($kode as $row){
                $harga = array(
                        'harga_karyawan'=> $harga_karyawan[$i],
                        'harga_pengunjung'=> $harga_pengunjung[$i]
                );
                $i++;
                $this->db->set($harga);
                $this->db->where('kode', $row);
                $this->db->update('daftar_item');
            }

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Diubah!</div>');
            redirect('pembelian/pembelian/history');
        
    }

    public function history()
    {
        $data = array(
			'title' => "Riwayat Item Masuk",
			'menu' => "Riwayat Item Masuk"
		); 

		$data['item'] = $this->db->get('transaksi_item_masuk')->result_array();

		$this->load->view('pembelian/riwayat', $data);
    }

    public function stokitem()
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