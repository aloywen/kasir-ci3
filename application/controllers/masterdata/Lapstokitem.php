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

        $dari = date_create($tgl_dari);
        $sampai = date_create($tgl_sampai);
        $d = date_format($dari, "Y-m-d");
        $s = date_format($sampai,"Y-m-d");
        // $s = date('Y-m-d 24:00:00', strtotime($tgl_sampai));

        $this->db->select("item_penjualan.kode_item, daftar_item.nama, stok_akhir.stok, SUM(qty) as totalbarang");
        $this->db->from('item_penjualan'); 
        $this->db->join('daftar_item', 'daftar_item.kode = item_penjualan.kode_item');
        $this->db->join('stok_akhir', 'stok_akhir.kode_item = daftar_item.kode');
        $this->db->group_by('daftar_item.nama');
        $this->db->where('item_penjualan.tgl >=', $d);
        $this->db->where('item_penjualan.tgl <=', $s);
        $this->db->order_by('daftar_item.nama','ASC'); 
        $query = $this->db->get()->result_array();

        // $query = $this->db->get_where('item_penjualan', ['tgl >=' => $d, 'tgl <=' => $s])->result_array();

        // var_dump($query);
        echo json_encode($query);


        // $this->db->insert('daftar_satuan', $data);

        // $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">User Berhasil Ditambah!</div>');
        $this->session->set_flashdata('item', $query);
    
        // redirect('masterdata/lapstokitem/print');
        
    }

    public function print()
    {
        // $data['obat'] = $this->session->flashdata('item');
        // $data['obat'] = $this->db->get('jasa')->result_array();

        $tgl_dari = $this->input->post('tgl_d');
        $tgl_sampai = $this->input->post('tgl_s');

        $this->db->select("item_penjualan.kode_item, daftar_item.nama, stok_akhir.stok, SUM(qty) as totalJual");
        $this->db->from('item_penjualan'); 
        $this->db->join('daftar_item', 'daftar_item.kode = item_penjualan.kode_item');
        $this->db->join('stok_akhir', 'stok_akhir.kode_item = daftar_item.kode');
        $this->db->group_by('daftar_item.nama');
        $this->db->where('item_penjualan.tgl >=', $tgl_dari);
        $this->db->where('item_penjualan.tgl <=', $tgl_sampai);
        $this->db->order_by('daftar_item.nama','ASC'); 
        $data['item'] = $this->db->get()->result_array();

        // var_dump($query);

        $this->load->view('masterdata/lapstokitem/print', $data);
    }

}