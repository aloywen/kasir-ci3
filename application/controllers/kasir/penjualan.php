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
        
        $data['no_nota'] = $this->db->order_by('id',"desc")
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
            $tempgrand_total = $this->input->post('grand_total');
            $tempbayar = $this->input->post('bayar');
            $tempkembali = $this->input->post('uang_kembali');

            $grand_total = preg_replace("/[^0-9]/", "", $tempgrand_total);
            $bayar = preg_replace("/[^0-9]/", "", $tempbayar);
            $kembali = preg_replace("/[^0-9]/", "", $tempkembali);
            date_default_timezone_set('Asia/Jakarta');
            $tgl = date('Y-m-d G:i:s');

            // var_dump($tgl);
            
        
            $e = [
                    'no_nota' => htmlspecialchars($this->input->post('no_nota', true)),
                    'admin' => $this->session->userdata('user'),
                    'grand_total' => htmlspecialchars($grand_total, true),
                    'label' => htmlspecialchars($this->input->post('peruntukan', true)),
                    'bayar' => htmlspecialchars($bayar, true),
                    'kembali' => htmlspecialchars($kembali, true),
 
            ];
            
            // var_dump($e);
            // INSERT TRANSAKSI PENJUALAN
            $this->db->insert('transaksi_penjualan', $e);


            
            $kode = $this->input->post('kode');
            $qty = $this->input->post('qty');
            $harga = $this->input->post('harga');
            $total = $this->input->post('totalharga');

            // var_dump($harga);
            
            date_default_timezone_set('Asia/Jakarta');
            $i = 0;
            
            // INSERT ITEM PENJUALAN
            foreach($kode as $row){
                $dat = array(
                        'kode_item'=> $row,
                        'no_nota' => $this->input->post('no_nota'),
                        'qty'=> $qty[$i],
                        'harga'=> $harga[$i],
                        'total_harga'=> $total[$i],
                        'tgl' => date('Y-m-d')
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

        // var_dump($no_nota);

        $data['transaksi'] = $this->db->get_where('transaksi_penjualan', ['no_nota' => $no_nota])->row_array();

        $this->db->select('*');
        $this->db->from('transaksi_penjualan');
        $this->db->join('item_penjualan', 'item_penjualan.no_nota = transaksi_penjualan.no_nota', 'left');
        $this->db->join('daftar_item', 'daftar_item.kode = item_penjualan.kode_item', 'left');
        $this->db->where('item_penjualan.no_nota', $no_nota); 
        $data['item_penjualan'] = $this->db->get()->result_array();

        
        $this->load->view('kasir/printulang', $data);
    }

    public function transaksiperhari()
    {
        $data = array(
			'title' => "Transaksi Hari Ini",
			'menu' => "Transaksi Hari Ini"
		);

        $datet = new DateTime('tomorrow');

        $data['besok'] = $datet->format('d-m-Y');

        date_default_timezone_set('Asia/Jakarta');

        $jamdari = date('Y-m-d 00-00-00');
        $jamsampai = date('Y-m-d 24-00-00');

        // $data['transaksi'] = $this->db->get_where('transaksi_penjualan', ['tgl' => date() ]);
        $data['transaksi'] = $this->db->get_where('transaksi_penjualan', ['tgl >=' => $jamdari , 'tgl <=' => $jamsampai])->result_array();
        
        // var_dump($dat);

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
			'title' => "Detail Transaksi",
			'menu' => "Detail Transaksi"
		);

        // $tambahgaring1 = substr_replace($no, '/', 2, 0);
        $tambahgaring = substr_replace($no, '/', 4, 0);

        // var_dump($contoh1);
        // var_dump($contoh2);

        $this->db->select('*');
        $this->db->from('item_penjualan');
        $this->db->join('transaksi_penjualan', 'transaksi_penjualan.no_nota = item_penjualan.no_nota', 'left');
        $this->db->join('daftar_item', 'daftar_item.kode = item_penjualan.kode_item', 'left');
        $this->db->where('item_penjualan.no_nota', $tambahgaring);  
        $data['item'] = $this->db->get()->result_array();

        $data['transaksi'] = $this->db->get_where('transaksi_penjualan', ['no_nota' => $tambahgaring])->row_array();

        // var_dump($tambahgaring2);
        // var_dump($data);
		$this->load->view('kasir/detailtransaksi', $data);
        
    }

    public function editKasir($no)
    {
        $tambahgaring = substr_replace($no, '/', 4, 0);

        $kode = $this->input->post('kode');
        $item = $this->input->post('nama');
        $qty = $this->input->post('qty');
        $harga = $this->input->post('harga');
        $total_harga = $this->input->post('totalharga');
        $temp_grand_total = $this->input->post('grand_total');
        $bayar = $this->input->post('bayar');
        $temp_kembali = $this->input->post('uang_kembali');


        $this->db->where('no_nota', $tambahgaring);
        $this->db->delete('item_penjualan');

        $totalHarga = preg_replace("/[^0-9]/", "", $total_harga);
        $grand_total = preg_replace("/[^0-9]/", "", $temp_grand_total);
        $kembali = preg_replace("/[^0-9]/", "", $temp_kembali);

        // var_dump($kembali);
        // var_dump($temp_kembali);
        $i = 0; 
        // INSERT OBAT PASIEN
        foreach($kode as $row){
            $dat = array(
                    'kode_item'=> $row,
                    'no_nota' => $tambahgaring,
                    'qty'=> $qty[$i],
                    'harga'=> $harga[$i],
                    'total_harga'=> $totalHarga[$i],
                    'tgl' => date('Y-m-d')
            ); 
            $i++;
            // var_dump($dat);
            
            $this->db->insert("item_penjualan",$dat);
        }

        $this->db->set(['label' => htmlspecialchars($this->input->post('peruntukan', true)), 'bayar' => htmlspecialchars($bayar, true), 'kembali' => htmlspecialchars($kembali, true),'grand_total' => $grand_total]);
        $this->db->where('no_nota', $tambahgaring);
        $this->db->update('transaksi_penjualan');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Transaksi Berhasil Diupdate!</div>');
        redirect('kasir/penjualan/transaksiperhari');
    }

    public function deleteTransaksi($no_nota)
    {
        // $fix = preg_replace("/[^0-9]/", "", $no_kwitansi);
        $tambahgaring = substr_replace($no_nota, '/', 4, 0);

        // var_dump($contoh2);
        $this->db->where('no_nota', $tambahgaring);
        $this->db->delete('item_penjualan');

        $this->db->where('no_nota', $tambahgaring);
        $this->db->delete('transaksi_penjualan');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Dihapus!</div>');
        redirect('kasir/penjualan/transaksiperhari');
    }

    public function ksjask() {
        $this->db->set(['posting' => 'belum']);
        $this->db->where('no_kwitansi >=', '08/03/017339');
        $this->db->where('no_kwitansi <=', '08/04/017381');
        $this->db->update('obat_pasien');

        $this->db->set(['posting' => 'belum']);
        $this->db->where('no_kwitansi >=', '08/03/017339');
        $this->db->where('no_kwitansi <=', '08/04/017381');
        $this->db->update('transaksi_pasien');
    }
}

