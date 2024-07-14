<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dokter extends CI_Controller {

    public function index() {
		$data = array(
			'title' => "Fee Dokter",
			'menu' => "Fee Dokter"
		);

        $data['dokter'] = $this->db->get('dokter')->result_array();
        // $data['jasa'] = $this->db->get_where('jasa', ['ket' => 'J'])->result_array();


		$this->load->view('kasir/dokter', $data);
	}
 
    public function cari() 
    { 
        $kode=$_GET['kode'];
        $tgl_dari=$_GET['tgl_dari'];
        $tgl_sampai=$_GET['tgl_sampai'];

        // $d = date('Y-m-d 07:00:00', strtotime($tgl_dari));
        // $s = date('Y-m-d 07:00:00', strtotime($tgl_sampai));

        $quer = $this->db->get_where('jasa', ['kode' => 'ZAAN0011'])->row_array();
 
        $this->db->select("obat_pasien.kode_obat, jasa.nama, jasa.induk, SUM(obat_pasien.fee) as total");
        $this->db->from('obat_pasien');
        $this->db->join('jasa', 'jasa.kode = obat_pasien.kode_obat');
        $this->db->where('obat_pasien.tgl >=', $tgl_dari);
        $this->db->where('obat_pasien.tgl <=', $tgl_sampai);
        $this->db->where('obat_pasien.dokter', $kode);
        $this->db->where('obat_pasien.ket', 'J');
        $this->db->where('obat_pasien.posting', 'belum');
        $this->db->where('obat_pasien.kode_obat !=', 'ZADM0001');
        $this->db->group_by('jasa.induk');
        $query = $this->db->get()->result_array();

        $konsul = $this->db->get_where('jasa', ['kode' => 'ZKON0002'])->row_array();

        $data = [
            'jaga' => [$quer],
            'jasa' => [$query],
            'konsul' => [$konsul],
        ];

        echo json_encode($data, JSON_PRETTY_PRINT);
    }

	public function store()
    {

        $kodeJasa = $this->input->post('jasa');
        $tgl_dari = $this->input->post('tgl_dari');
        $tgl_sampai = $this->input->post('tgl_sampai');
        $dokter = $this->input->post('filldokter');
        $fee = $this->input->post('fee');
        $grand_total = $this->input->post('grand_total');
        
        $caritgl = $this->db->get_where('fee_dokter', ['tgl' => $tgl_dari])->row_array();
        
        // AMBIL TOTAL FEE
        // $this->db->select("SUM(fee) as total");
        // $this->db->from('fee_dokter');
        // $this->db->where('tgl >=', $tgl_dari);
        // $this->db->where('tgl <=', $tgl_sampai);
        // $totalperhari = $this->db->get()->row_array();

        // var_dump($totalperhari);
        // var_dump($caritgl['tgl']);
        
        if($caritgl['tgl'] === NULL){
                $tambah = [
                    'kode_jasa' => $this->input->post('jagafee'),
                    'dokter' => $this->input->post('filldokter'),
                    'fee' => $this->input->post('feejaga'),
                    'tgl' => $tgl_dari,
                ];
                // var_dump($tambah);
                $this->db->insert('fee_dokter', $tambah);
    
                $in = 0;
                foreach($kodeJasa as $r){
                    $feedok = array(
                        'kode_jasa'=> $r,
                        'dokter' => $this->input->post('filldokter'),
                        'fee'=> $fee[$in],
                        'tgl' => $tgl_dari,
                    );
                    $in++;
                    $this->db->insert('fee_dokter', $feedok);
                    // var_dump($feedok);
                }
                $data = [
                    'dokter' => $dokter,
                    'tgl' => $this->input->post('tgl_dari'),
                    'tgl_s' => $this->input->post('tgl_sampai'),
                ];
                
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">User Berhasil Ditambah!</div>');
                $this->session->set_flashdata('item', $data);
                redirect('kasir/dokter/print/');
        } 
        // else if ($totalperhari['total'] === $grand_total) {

        //     $data = [
        //         'dokter' => $dokter,
        //         'tgl' => $this->input->post('tgl_dari'),
        //         'tgl_s' => $this->input->post('tgl_sampai'),
        //     ];
            
        //     // $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">User Berhasil Ditambah!</div>');
        //     // $this->session->set_flashdata('item', $data);
        //     // redirect('kasir/dokter/print/');

        // }
        else if ($totalperhari['total'] !== $grand_total) {

            // $index = 0;
            // foreach($kodeJasa as $row){
            //     $update = array(
            //             'kode_jasa'=> $row,
            //             'fee'=> $fee[$index]
            //     );
            //     $index++;
            //     $this->db->set($update);
            //     $this->db->where('kode_jasa', $row);
            //     $this->db->where('tgl', date($tgl_dari));
            //     $this->db->update('fee_dokter');
            //     // var_dump($update);
            // }

            $this->db->where('tgl', $tgl_dari);
            $this->db->delete('fee_dokter');

            $tambah = [
                'kode_jasa' => $this->input->post('jagafee'),
                'dokter' => $this->input->post('filldokter'),
                'fee' => $this->input->post('feejaga'),
                'tgl' => $tgl_dari,
            ];
            // var_dump($tambah);
            $this->db->insert('fee_dokter', $tambah);

            $in = 0;
            foreach($kodeJasa as $r){
                $feedok = array(
                    'kode_jasa'=> $r,
                    'dokter' => $this->input->post('filldokter'),
                    'fee'=> $fee[$in],
                    'tgl' => $tgl_dari,
                );
                $in++;
                $this->db->insert('fee_dokter', $feedok);
                // var_dump($feedok);
            }

            $data = [
                'dokter' => $dokter,
                'tgl' => $this->input->post('tgl_dari'),
                'tgl_s' => $this->input->post('tgl_sampai'),
            ];
            
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">User Berhasil Ditambah!</div>');
            $this->session->set_flashdata('item', $data);
            redirect('kasir/dokter/print/');

        } 
        else if ($caritgl['tgl'] === $tgl_dari) {

            $data = [
                'dokter' => $dokter,
                'tgl' => $this->input->post('tgl_dari'),
                'tgl_s' => $this->input->post('tgl_sampai'),
            ];
            
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">User Berhasil Ditambah!</div>');
            $this->session->set_flashdata('item', $data);
            redirect('kasir/dokter/print/');

        }
        

        
    }

    public function print()    
    {
        $dataa = $this->session->flashdata('item');

        // var_dump($dataa);

        $data['datajasa'] = $this->db->get_where('fee_dokter', ['tgl' => $dataa['tgl']])->result_array();

        // $kode = $this->input->post('kode_dokter');
        $data['tgl_dari'] = $dataa['tgl'];
        $data['tgl_sampai'] = $this->input->post('tgl_sampai');
        // $kode_dokter = $this->input->post('filldokter');
        // $fee = $this->input->post('fee');
        // $jasa = $this->input->post('jasa');
        // $data['grand_total'] = $this->input->post('grand_total');

        // $data['dokter'] = $this->db->get_where('dokter', ['kode_dokter' => $kode_dokter])->row_array();


        $d = date('Y-m-d 07:00:00', strtotime($dataa['tgl']));
        $s = date('Y-m-d 07:00:00', strtotime($dataa['tgl_s']));


        // AMBIL NAMA DOKTER
        $this->db->select('*');
        $this->db->from('fee_dokter');
        $this->db->join('dokter', 'dokter.kode_dokter = fee_dokter.dokter');
        $this->db->where('fee_dokter.dokter', $dataa['dokter']); 
        $data['dokter'] = $this->db->get()->row_array();

        // $data['dokter'] = $this->db->get_where('fee_dokter', ['tgl' => $tgl_dari])->row_array();


        // AMBIL NAMA JASA & FEE
        // $this->db->select('*');
        // $this->db->from('dokter');
        // $this->db->join('fee_dokter', 'fee_dokter.dokter = dokter.kode_dokter', 'left');
        // $this->db->join('jasa', 'jasa.kode = fee_dokter.kode_jasa', 'left');
        // $this->db->where('fee_dokter.dokter', $dataa['dokter']); 
        // $this->db->where('fee_dokter.tgl', $dataa['tgl']); 
        // $this->db->order_by('fee_dokter.kode_jasa','ASC');
        // $data['jasa'] = $this->db->get()->result_array();

        // $this->db->select('*');
        // $this->db->from('dokter');
        // $this->db->join('obat_pasien', 'obat_pasien.dokter = dokter.kode_dokter', 'left');
        // $this->db->join('jasa', 'jasa.kode = fee_dokter.kode_jasa', 'left');
        // $this->db->where('fee_dokter.dokter', $dataa['dokter']); 
        // $this->db->where('fee_dokter.tgl', $dataa['tgl']); 
        // $this->db->order_by('fee_dokter.kode_jasa','ASC');
        // $data['jasa'] = $this->db->get()->result_array();



        // AMBIL TOTAL FEE
        $this->db->select("SUM(fee) as total");
        $this->db->from('fee_dokter');
        $this->db->where('tgl >=', $dataa['tgl']);
        $this->db->where('tgl <=', $dataa['tgl_s']);
        $data['hasil'] = $this->db->get()->row_array();

        // AMBIL TOTAL PASIEN
        $data['total_pasien'] = $this->db->get_where('transaksi_pasien', ['dokter' => $dataa['dokter'], 'tgl_kwitansi >=' => $dataa['tgl'], 'tgl_kwitansi <=' => $dataa['tgl_s']])->num_rows();



        // var_dump($dataaa);
        
        $this->load->view('kasir/d_print', $data);
    }

}