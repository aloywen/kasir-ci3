<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lapomzet extends CI_Controller {

    public function index() {
		$data = array(
			'title' => "Laporan Omzet",
			'menu' => "Laporan Omzet"
		);

		$data['admin'] = $this->db->get('admin')->result_array();

		$this->load->view('masterdata/lapomzet/index', $data);
	} 

	public function store()
    {
        $tgl_dari = $this->input->post('tgl_dari');
        $tgl_sampai = $this->input->post('tgl_sampai');

        // $d = date('Y-m-d 07:00:00', strtotime($tgl_dari));
        // $s = date('Y-m-d 07:00:00', strtotime($tgl_sampai));

        // CARI GRAND TOTAL
        $this->db->select_sum('grand_total');
        $this->db->where('tgl_kwitansi >=', $tgl_dari);
        $this->db->where('tgl_kwitansi <=', $tgl_sampai);
        $this->db->where('posting', 'belum');
        $query = $this->db->get('transaksi_pasien')->result_array();

        // CARI GRAND TOTAL MCU
        $num = $this->db->get_where('jasa_pasien', ['kodejasa' => 'ZMED0010', 'tgl >=' => $tgl_dari, 'tgl <=' => $tgl_sampai])->num_rows();
        $harg = $this->db->get_where('jasa', ['kode' => 'ZMED0010'])->row_array();
        $hargaJ = $harg['harga_jasa'];


        $cariTgl = $this->db->get_where('omzet', ['tgl' => $tgl_dari])->row_array();

        // var_dump($cariTgl);
        // JUMLAH NOMINAL MCU
        $totalHarga = $hargaJ*$num;

        // NOMINAL GRAND TRANSAKSI
        $l = $query[0]; 

        if($cariTgl['tgl'] === $tgl_dari){
            $data = [
                'tgl' => $tgl_dari
            ];

            $this->session->set_flashdata('item', $data);
            redirect('masterdata/lapomzet/print');
        } else if ($cariTgl === null) {
            // INSERT OMZET
            $data = [
                'mcu' => $totalHarga,
                'total' => $l['grand_total'],
                'kasir' => htmlspecialchars($this->input->post('kasir', true)),
                'tgl' => $tgl_dari
            ];

            // var_dump($data);
            $this->db->insert('omzet', $data);
            
            // CARI DATA UTK DI UPDATE POSTING
            $this->db->select('*');
            $this->db->from('transaksi_pasien');
            $this->db->where('posting', 'belum');
            $this->db->where('tgl_kwitansi >=', $tgl_dari);
            $this->db->where('tgl_kwitansi <=', $tgl_sampai);
            $transaksi = $this->db->get()->result_array();
            // var_dump('<br/>');
            // var_dump($transaksi);
            
            // UPDATE SUDAH DIPOSTING
            foreach ($transaksi as $p) :
                $update = array(
                    'posting'=> 'sudah'
                );
                $this->db->set($update);
                $this->db->where('dokter', $p['dokter']);
                $this->db->update('transaksi_pasien');
            endforeach;

            $this->db->select('*');
            $this->db->from('obat_pasien');
            $this->db->where('posting', 'belum');
            $this->db->where('tgl >=', $tgl_dari);
            $this->db->where('tgl <=', $tgl_sampai);
            $obat = $this->db->get()->result_array();

            foreach ($obat as $p) :
                $update = array(
                    'posting'=> 'sudah'
                );
                $this->db->set($update);
                $this->db->where('dokter', $p['dokter']);
                $this->db->update('obat_pasien');
            endforeach;

            $kwi = [
                'no_kwitansi' => 'T0'
            ];

            // var_dump($data);
            $this->db->insert('transaksi_pasien', $kwi);

            // var_dump('<br/>');
            // var_dump($obat);

            $this->session->set_flashdata('item', $data);
            redirect('masterdata/lapomzet/print');
        }

        
    }

    public function cariomzet()
    {
        $tgl_dari=$_GET['tgl_dari'];
        $tgl_sampai=$_GET['tgl_sampai'];

        // $d = date('Y-m-d 07:00:00', strtotime($tgl_dari));
        // $s = date('Y-m-d 07:00:00', strtotime($tgl_sampai));

        $this->db->select_sum('grand_total');
        $this->db->where('tgl_nota >=', $tgl_dari);
        $this->db->where('tgl_nota <=', $tgl_sampai);
        $query = $this->db->get('transaksi_penjualan')->row_array();

        // $query = $this->db->get_where('transaksi_pasien', ['posting' => 'belum'])->result_array();

        echo json_encode($query);
    }

    public function print()
    {
        $dat = $this->session->flashdata('item');

        // var_dump($dat['tgl']);

        $data['transaksi'] = $this->db->get_where('omzet', ['tgl' => $dat['tgl']])->row_array();


        $this->load->view('masterdata/lapomzet/print', $data);
    }

}