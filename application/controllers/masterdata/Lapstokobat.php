<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lapstokobat extends CI_Controller {

    public function index() {
		$data = array(
			'title' => "Laporan Stok Obat",
			'menu' => "Laporan Stok Obat"
		);

		// $data['item'] = $this->db->get('pembelian')->result_array();

		$this->load->view('masterdata/lapstokobat/index', $data);
	}

	public function addObat()
	{
		$data = array(
			'title' => "Tambah Obat",
			'menu' => "Tambah Obat"
		);


		$this->load->view('pembelian/beli/add', $data);
	}

	public function store()
    {
        $tgl_dari = $this->input->post('tgl_dari');
        $tgl_sampai = $this->input->post('tgl_sampai');

        // $d = date('Y-m-d 07:00:00', strtotime($tgl_dari));
        // $s = date('Y-m-d 07:00:00', strtotime($tgl_sampai));

        $this->db->select("obat_pasien.kode_obat, jasa.nama, stok_akhir.stok, obat_pembelian.jenis, SUM(qty) as totalObat");
        $this->db->from('obat_pasien');
        $this->db->join('jasa', 'jasa.kode = obat_pasien.kode_obat', 'left');
        $this->db->join('stok_akhir', 'stok_akhir.kode_obat = jasa.kode', 'left');
        $this->db->join('obat_pembelian', 'obat_pembelian.kode_obat = stok_akhir.kode_obat', 'left');
        $this->db->group_by('jasa.nama');
        $this->db->where('obat_pasien.ket', 'O');
        $this->db->where('obat_pasien.tgl >=', $tgl_dari);
        $this->db->where('obat_pasien.tgl <=', $tgl_sampai);
        $this->db->where('obat_pasien.posting', 'belum');
        $this->db->order_by('jasa.nama','ASC'); 
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