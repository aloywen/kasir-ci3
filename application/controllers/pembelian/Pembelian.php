<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembelian extends CI_Controller {

    public function index() {
		$data = array(
			'title' => "Pembelian Obat",
			'menu' => "Pembelian Obat"
		);

		$data['item'] = $this->db->get('transaksi_pembelian_obat')->result_array();

		$this->load->view('pembelian/index', $data);
	}

	public function add()
	{
		$data = array(
			'title' => "Tambah Obat",
			'menu' => "Tambah Obat"
		);

        $query = $this->db->query("SELECT MAX(nomor_transaksi) as m_transaksi from transaksi_pembelian_obat");
        $da = $query->row();
        $data['no_transaksi'] = $da->m_transaksi;


		$this->load->view('pembelian/add', $data);
	}

    public function cariobat(){
        $name=$_GET['name'];
        $fieldName=$_GET['fieldName'];


        $this->db->select('*'); 
        $this->db->from('jasa');
        // $this->db->join('obat_pembelian', 'obat_pembelian.kode_obat = jasa.kode');
        $this->db->like('nama', $name);
        $this->db->where('ket', 'O'); 
        $query = $this->db->get()->result_array();
        echo json_encode($query);
    }

	public function store()
    {

            $kode = $this->input->post('kode');
            $obat = $this->input->post('obat');
            $j = $this->input->post('jenis');
            // $jenis = strtoupper($j);
            $qty = $this->input->post('qty');
            $harga_beli = $this->input->post('hargabeli');
            $harga_jual = $this->input->post('hargajual');
            $fix = preg_replace("/[^0-9]/", "", $harga_jual);


            // var_dump($);
            $data = [
                'nomor_transaksi' => htmlspecialchars($this->input->post('nomor_transaksi', true)),
                'tgl_transaksi' => date('Y-m-d'),
                'nama_supplier' => htmlspecialchars($this->input->post('nama_supplier', true)),
            ];

            // TAMBAH OBAT PEMBELIAN
            $i = 0; 
            foreach($kode as $row){
                $dat = array(
                        'kode_obat'=> $row,
                        'nomor_transaksi' => $this->input->post('nomor_transaksi'),
                        'jenis'=> strtoupper($j[$i]),
                        'jumlah'=> $qty[$i],
                        'harga_beli'=> $harga_beli[$i],
                        'harga_jual'=> $fix[$i],
                );
                $i++;
                $this->db->insert("obat_pembelian",$dat);
                // var_dump($dat);
            }

            // TAMBAH TRANSAKSI
            $this->db->insert('transaksi_pembelian_obat', $data);


            // UPDATE HARGA OBAT
            $index = 0;
            
            foreach($kode as $row){
                $harga = array(
                        'harga_beli'=> $harga_beli[$index],
                        'harga_jasa'=> $fix[$index]
                );
                $index++;
                $this->db->set($harga);
                $this->db->where('kode', $row);
                $this->db->update('jasa');
            }

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Ditambah!</div>');
            redirect('pembelian/pembelian/riwayat');
    
    }

    public function detail($no)
    {

        $data = array(
			'title' => "Detail Pembelian",
			'menu' => "Detail Pembelian"
		);

        $this->db->select('*');
        $this->db->from('obat_pembelian');
        $this->db->join('jasa', 'jasa.kode = obat_pembelian.kode_obat');
        $this->db->where('obat_pembelian.nomor_transaksi', $no); 
        $this->db->where('obat_pembelian.nomor_transaksi', $no); 
        $data['obat'] = $this->db->get()->result_array();


        $data['transaksi'] = $this->db->get_where('transaksi_pembelian_obat', ['nomor_transaksi' => $no])->row_array();

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
            $this->db->update('transaksi_pembelian_obat');

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
			'title' => "Riwayat Pembelian",
			'menu' => "Riwayat Pembelian"
		);

		$data['item'] = $this->db->get('transaksi_pembelian_obat')->result_array();

		$this->load->view('pembelian/riwayat', $data);
    }

    public function stokobat()
    {
        $data = array(
			'title' => "Stok Obat",
			'menu' => "Stok Obat"
		);

		$this->db->select('*');
        $this->db->from('stok_akhir');
        $this->db->join('jasa', 'jasa.kode = stok_akhir.kode_obat');
        $data['stok'] = $this->db->get()->result_array();

        // var_dump($da);

        $this->load->view('pembelian/stokobat', $data);
    }

}