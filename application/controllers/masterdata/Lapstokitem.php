<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lapstokitem extends CI_Controller {

    public function index() {
		$data = array(
			'title' => "Laporan Stok barang",
			'menu' => "Laporan Stok barang"
		);

		// $data['item'] = $this->db->get('pembelian')->result_array();

		$this->load->view('masterdata/lapstokitem/index', $data);
	}

	public function addObat()
	{
		$data = array(
			'title' => "Tambah Obat",
			'menu' => "Tambah Obat"
		);


		$this->load->view('pembelian/beli/add', $data);
	}

	public function caristok()
    {
        $tgl_dari = $this->input->post('tgl_dari');
        $tgl_sampai = $this->input->post('tgl_sampai');

        $d = date('Y-m-d 00:00:00', strtotime($tgl_dari));
        $s = date('Y-m-d 24:00:00', strtotime($tgl_sampai));

        $this->db->select("item_penjualan.kode, daftar_item.nama, stok_akhir.stok, obat_pembelian.jenis, SUM(qty) as totalObat");
        $this->db->from('item_penjualan');
        $this->db->join('daftar_item', 'daftar_item.kode = item_penjualan.kode', 'left');
        $this->db->join('stok_akhir', 'stok_akhir.kode = daftar_item.kode', 'left');
        $this->db->join('obat_pembelian', 'obat_pembelian.kode = stok_akhir.kode', 'left');
        $this->db->group_by('daftar_item.nama');
        $this->db->where('item_penjualan.ket', 'O');
        $this->db->where('item_penjualan.tgl >=', $d);
        $this->db->where('item_penjualan.tgl <=', $s);
        $this->db->where('item_penjualan.posting', 'belum');
        $this->db->order_by('daftar_item.nama','ASC'); 
        $query = $this->db->get()->result_array();

        

        $i = 0; 
        // INSERT OBAT PASIEN
        // foreach($query as $row){
        //     $dat = array(
        //             'kode_obat'=> $row['kode_obat'],
        //             'jual'=> $row['totalObat'],
        //             'stok'=> $row['stok'],
        //             'tgl' => date('Y-m-d G:i:s')
        //     ); 
        //     $i++;
        //     var_dump($dat);
            
        //     $this->db->insert("obat_pasien",$dat);
        // }

        var_dump($query);


        // $this->db->insert('daftar_satuan', $data);

        // $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">User Berhasil Ditambah!</div>');
        // $this->session->set_flashdata('item', $query);
    
        // redirect('masterdata/lapstokobat/print');
        
    }

    public function print()
    {
        $data['obat'] = $this->session->flashdata('item');
        // $data['obat'] = $this->db->get('jasa')->result_array();

        $this->load->view('masterdata/lapstokobat/print', $data);
    }

}