<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penjualan extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        is_logged_in();

    }

    public function index() {
		$data = array(
			'title' => "Kasir Penjualan",
			'menu' => "Kasir Penjualan"
		);
        
        $data['no_kwitansi'] = $this->db->order_by('id',"desc")
        ->limit(1)
        ->get('transaksi_penjualan')
        ->row_array();

        // $data['no_kwitansi'] = substr($no_k, 12, 9);
        // $m_register = $nourut + 1; 
        
		$this->load->view('kasir/penjualan', $data);
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
            $grand_total = $this->input->post('grand_total');
            $fix = preg_replace("/[^0-9]/", "", $grand_total);
            date_default_timezone_set('Asia/Jakarta');
            $tgl = date('Y-m-d G:i:s');

            // var_dump($tgl);
            
        
            $e = [
                    'no_nota' => htmlspecialchars($this->input->post('no_nota', true)),
                    'admin' => 'admin',
                    'grand_total' => $fix,
                    'label' => htmlspecialchars($this->input->post('peruntukan', true)),
                    'bayar' => htmlspecialchars($this->input->post('bayar', true)),
                    'kembali' => htmlspecialchars($this->input->post('uang_kembali', true)),
 
            ];
            
            // INSERT TRANSAKSI PENJUALAN
            $this->db->insert('transaksi_penjualan', $e);


            $i = 0;

            $a = $this->input->post('kode');
            $b = $this->input->post('nama_item');
            $c = $this->input->post('qty');
            $d = $this->input->post('total_harga');
            $keterangan = $this->input->post('ket');

            date_default_timezone_set('Asia/Jakarta');
            
            // INSERT ITEM PENJUALAN
            foreach($a as $row){
                $dat = array(
                        'kode_item'=> $row,
                        'no_nota' => $this->input->post('no_nota'),
                        'qty'=> $c[$i],
                        'total_harga'=> $d[$i],
                ); 
                $i++;
                // var_dump($dat);
                
                $this->db->insert("item_penjualan",$dat);
            }
            
             
            // $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Transaksi Berhasil!</div>');
            $this->session->set_flashdata('item', $dat);
            $this->session->set_flashdata('items', $e);
            redirect('kasir/penjualan/print', $data);
        
    }

    public function print()
    {

        $dat = $this->session->flashdata('item');
        $t_penjualan = $this->session->flashdata('items');

        // $t_penjualan = "0724/0001";

        // $this->db->select('*');
        // $this->db->from('transaksi_penjualan');
        // $this->db->join('item_penjualan', 'item_penjualan.no_nota = transaksi_penjualan.no_nota', 'left');
        // $this->db->join('daftar_item', 'daftar_item.kode = item_penjualan.kode_item', 'left');
        // $this->db->where('item_penjualan.no_nota', $t_penjualan['no_nota']); 
        // $data['data_penjualan'] = $this->db->get()->result_array();

        $data['transaksi'] = $this->db->get_where('transaksi_penjualan', ['no_nota' => $t_penjualan['no_nota']])->row_array();

        // $this->db->select('*');
        // $this->db->from('transaksi_penjualan');
        // $this->db->join('item_penjualan', 'item_penjualan.no_nota = transaksi_penjualan.no_nota', 'left');
        // $this->db->join('daftar_item', 'daftar_item.kode = item_penjualan.kode_item', 'left');
        // $this->db->where('item_penjualan.no_nota', $t_penjualan); 
        // $data['item_penjulan'] = $this->db->get()->result_array();
        $this->db->select('*');
        $this->db->from('item_penjualan');
        $this->db->join('transaksi_penjualan', 'transaksi_penjualan.no_nota = item_penjualan.no_nota');
        $this->db->join('daftar_item', 'daftar_item.kode = item_penjualan.kode_item', 'left');
        $this->db->where('item_penjualan.no_nota', $t_penjualan['no_nota']); 
        $data['item_penjualan'] = $this->db->get()->result_array();

        // $this->db->select_sum('total_harga');
        // $this->db->where('no_kwitansi', $t_penjualan['no_kwitansi']);
        // $query = $this->db->get('item_penjualan')->result_array();
        // $data['total_obat'] = $query[0];
        

        // $this->db->select('*');
        // $this->db->from('jasa');
        // $this->db->join('jasa_pasien', 'jasa_pasien.kodejasa = jasa.kode');
        // $this->db->where('jasa_pasien.no_kwitansi', $t_pasien['no_kwitansi']); 
        // $data['jasa'] = $this->db->get()->result_array();

        // $this->db->select('*');
        // $this->db->from('transaksi_pasien');
        // $this->db->join('bidan', 'bidan.kode_bidan = transaksi_pasien.bidan');
        // $this->db->where('transaksi_pasien.no_kwitansi', $t_pasien['no_kwitansi']); 
        // $data['bidan'] = $this->db->get()->row_array();


        // var_dump($l);
        
        $this->load->view('kasir/print', $data);
    }

    public function printulang($no)
    {

        $no_nota = substr_replace($no, '/', 4, 0);

        var_dump($no_nota);

        $data['transaksi'] = $this->db->get_where('transaksi_penjualan', ['no_nota' => $no_nota])->row_array();

        $this->db->select('*');
        $this->db->from('transaksi_penjualan');
        $this->db->join('item_penjualan', 'item_penjualan.no_nota = transaksi_penjualan.no_nota', 'left');
        $this->db->join('daftar_item', 'daftar_item.kode = item_penjualan.kode_item', 'left');
        $this->db->where('item_penjualan.no_nota', $no_nota); 
        $data['daftar_item'] = $this->db->get()->result_array();

        $this->db->select_sum('total_harga');
        $this->db->where('ket', 'O');
        $this->db->where('no_kwitansi', $no_nota);
        $query = $this->db->get('obat_pasien')->row_array();
        $data['total_obat'] = $query['total_harga'];
        

        $this->db->select('*');
        $this->db->from('transaksi_penjualan');
        $this->db->join('admin', 'admin.kode_admin = transaksi_penjualan.admin');
        $this->db->where('transaksi_penjualan.no_nota', $no_nota); 
        $data['admin'] = $this->db->get()->row_array();

        
        // $this->db->select('*'); 
        // $this->db->from('jasa');
        // $this->db->join('jasa_pasien', 'jasa_pasien.kodejasa = jasa.kode');
        // $this->db->where('jasa_pasien.no_kwitansi', $contoh2); 
        // $data['jasa'] = $this->db->get()->result_array();

        // var_dump($jasa);
        // var_dump('<br/>');
        // var_dump($dataaa);
        
        // $this->load->view('kasir/printulang', $data);
    }

    public function transaksiperhari()
    {
        $data = array(
			'title' => "Transaksi Hari Ini",
			'menu' => "Transaksi Hari Ini"
		);

        $datet = new DateTime('tomorrow');

        $data['besok'] = $datet->format('d-m-Y');

        $jamdari = date('y-m-d 00-00-00');
        $jamsampai = date('y-m-d 24-00-00');

        // $data['transaksi'] = $this->db->get_where('transaksi_penjualan', ['tgl' => date() ]);
        $data['transaksi'] = $this->db->get_where('transaksi_penjualan', ['tgl >=' => $jamdari , 'tgl <=' => $jamsampai])->result_array();
        
        // var_dump($dat);

		// $this->db->select('*');
        // $this->db->from('transaksi_pasien');
        // $this->db->join('obat_pasien', 'obat_pasien.no_kwitansi = transaksi_pasien.no_kwitansi');
        // $this->db->where('transaksi_pasien.posting', 'belum');
        // $cariO = $this->db->get()->result_array();

        // var_dump($cariO);

		$this->load->view('kasir/transaksiperhari', $data);
    
    }

    public function historytransaksi()
    {
        $data = array(
			'title' => "History Semua Transaksi",
			'menu' => "History Semua Transaksi"
		);

		// $this->db->select('*');
        // $this->db->from('transaksi_penjualan');
        // $this->db->join('pasien', 'pasien.medical_record = transaksi_pasien.medical_record');
        // $this->db->where('transaksi_pasien.posting', 'sudah');
        $data['item'] = $this->db->get('transaksi_penjualan')->result_array();
        
		$this->load->view('kasir/historytransaksi', $data);
        
    }
    
    public function getHistory()
    {
        if ($this->input->is_ajax_request() == true) {
            $this->load->model('HistoryTransaksi', 'history');
            $list = $this->history->get_datatables();
            $data = array();
            $no = $_POST['start'];
            foreach ($list as $field) {
                
                // $no++;
                $row = array();

                $e = preg_replace("/[^a-zA-Z0-9]/", "", $field->no_kwitansi);
               
                $btnPrint = "<td scope='row' class='d-flex'>
                            <a class='nav-link' href='kasir/pasien/printulang/$e/$field->medical_record'><button class='btn btn-primary'>Print</button></a>
                            </td>";
                // $row[] = $no;
                $row[] = $btnPrint;
                $row[] = $field->no_kwitansi;
                $row[] = $field->tgl_kwitansi;
                $row[] = $field->nama_pasien;
                $data[] = $row;
            }
 
            $output = array(
                "draw" => $_POST['draw'],
                "recordsTotal" => $this->history->count_all(),
                "recordsFiltered" => $this->history->count_filtered(),
                "data" => $data,
            );
            //output dalam format JSON
            echo json_encode($output);
        } else {
            exit('Maaf data tidak bisa ditampilkan');
        }    
        
    }

    public function detail($no)
    {

        $data = array(
			'title' => "Detail Transaksi pasien",
			'menu' => "Detail Transaksi pasien"
		);

        $contoh1 = substr_replace($no, '/', 2, 0);
        $contoh2 = substr_replace($contoh1, '/', 5, 0);

        $this->db->select('*');
        $this->db->from('obat_pasien');
        $this->db->join('transaksi_pasien', 'transaksi_pasien.no_kwitansi = obat_pasien.no_kwitansi', 'left');
        $this->db->join('jasa', 'jasa.kode = obat_pasien.kode_obat', 'left');
        // $this->db->join('jasa_pasien', 'jasa_pasien.no_kwitansi = transaksi_pasien.no_kwitansi', 'left');
        $this->db->where('obat_pasien.no_kwitansi', $contoh2);  
        $data['obat'] = $this->db->get()->result_array();
        // $this->db->select('*');
        // $this->db->from('obat_pasien');
        // $this->db->join('jasa', 'jasa.kode = obat_pasien.kode_obat', 'left');
        // $this->db->join('jasa_pasien', 'jasa_pasien.kodejasa = jasa.kode', 'left');
        // $this->db->where('obat_pasien.no_kwitansi', $contoh2);  
        // $data['obat'] = $this->db->get()->result_array();
 
        $this->db->select('*');
        $this->db->from('transaksi_pasien');
        $this->db->join('pasien', 'pasien.medical_record = transaksi_pasien.medical_record', 'left');
        $this->db->join('dokter', 'dokter.kode_dokter = transaksi_pasien.dokter', 'left');
        $this->db->join('bidan', 'bidan.kode_bidan = transaksi_pasien.bidan', 'left');
        $this->db->where('transaksi_pasien.no_kwitansi', $contoh2); 
        $data['transaksi'] = $this->db->get()->row_array();

        $data['dokter'] = $this->db->get('dokter')->result_array();
        $data['bidan'] = $this->db->get('bidan')->result_array();

        // $data['transaksi'] = $this->db->get_where('transaksi_pasien', ['no_kwitansi' => $contoh2])->row_array();

        // var_dump($obat);
		$this->load->view('kasir/detailpasien', $data);
        
    }

    public function editKasir($no)
    {
        $no_kwitansi = $this->input->post('no_kwitansi');
        $a = $this->input->post('kode');
        $b = $this->input->post('obat');
        $c = $this->input->post('qty');
        $d = $this->input->post('total_harga');
        $fee = $this->input->post('fee');
        $keterangan = $this->input->post('ket');
        $status = $this->input->post('status');
        $jns_pasien = $this->input->post('jns_pasien');
        $penanggung = $this->input->post('penanggung');
        $perusahaan = $this->input->post('perusahaan');
        $asuransi = $this->input->post('asuransi');
        $diagnosa = $this->input->post('diagnosa');
        $ics = $this->input->post('ics');
        $grand_total = $this->input->post('grand_total');
        $induk = $this->input->post('induk');
        $tempDokter = $this->input->post('kode_dokter');
        $newDokter = $this->input->post('dokter');
        $idDokter = substr($newDokter, 0, 6);
        $tempBidan = $this->input->post('kode_bidan');
        $newBidan = $this->input->post('bidan');
        $idBidan = substr($newBidan, 0, 6);

        $dokter = '';
        if($tempDokter == $newDokter){
            $dokter = $tempDokter;
        } else if ( $tempDokter !== $newDokter){
            $dokter = $idDokter;
        }
        $bidan = '';
        if($tempBidan == $newBidan){
            $bidan = $tempBidan;
        } else if ( $tempBidan !== $newBidan){
            $bidan = $idBidan;
        }

        $this->db->where('no_kwitansi', $no_kwitansi);
        $this->db->delete('obat_pasien');

        $totalHargaa = preg_replace("/[^0-9]/", "", $d);
        $fix = preg_replace("/[^0-9]/", "", $grand_total);

        $i = 0; 
        // INSERT OBAT PASIEN
        foreach($a as $row){
            $dat = array(
                    'kode_obat'=> $row,
                    'no_kwitansi' => $this->input->post('no_kwitansi'),
                    'rm_pasien' => $this->input->post('kode_pasien'),
                    'dokter' => $dokter,
                    'qty'=> $c[$i],
                    'total_harga'=> $totalHargaa[$i],
                    'fee'=> $fee[$i]*$c[$i],
                    'tgl' => date('Y-m-d G:i:s'),
                    'ket'=> $keterangan[$i],
                    'induk'=> $induk[$i],
                    'posting'=> 'belum',
            ); 
            $i++;
            // var_dump($dat);
            
            $this->db->insert("obat_pasien",$dat);
        }

        $this->db->set(['medical_record' => $this->input->post('kode_pasien'), 'status' => $status, 'jns_pasien' => $jns_pasien, 'penanggung' => $penanggung, 'perusahaan' => $perusahaan, 'asuransi' => $asuransi, 'dokter' => $dokter, 'bidan' => $bidan, 'diagnosa' => $diagnosa, 'icd' => $icd, 'grand_total' => $fix]);
        $this->db->where('no_kwitansi', $no_kwitansi);
        $this->db->update('transaksi_pasien');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Transaksi Berhasil Diupdate!</div>');
        redirect('kasir/pasien/riwayatpasien');
    }

    public function deleteTransaksi($no_kwitansi)
    {
        // $fix = preg_replace("/[^0-9]/", "", $no_kwitansi);

        $tambahgaring1 = substr_replace($no_kwitansi, '/', 2, 0);
        $fix_kwitansi = substr_replace($tambahgaring1, '/', 5, 0);
        // var_dump($contoh2);
        $this->db->where('no_kwitansi', $fix_kwitansi);
        $this->db->delete('obat_pasien');

        $this->db->where('no_kwitansi', $fix_kwitansi);
        $this->db->delete('transaksi_pasien');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Dihapus!</div>');
        redirect('kasir/pasien/riwayatpasien');
    }

    public function ksjask() {
        $this->db->set(['posting' => 'belum']);
        $this->db->where('no_kwitansi >=', '10/27/325');
        $this->db->where('no_kwitansi <=', '10/27/365');
        $this->db->update('obat_pasien');

        $this->db->set(['posting' => 'belum']);
        $this->db->where('no_kwitansi >=', '10/27/325');
        $this->db->where('no_kwitansi <=', '10/27/365');
        $this->db->update('transaksi_pasien');
    }
}

