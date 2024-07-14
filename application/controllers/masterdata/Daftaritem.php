<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Daftaritem extends CI_Controller {

	public function index() {
		$data = array(
			'title' => "Daftar Item",
			'menu' => "Daftar Item"
		);

        $this->db->select('*');
        $this->db->from('daftar_item');
        $data['daftar_item'] = $this->db->get()->result_array();

		$this->load->view('masterdata/daftaritem/index', $data);
	}


    public function store()
    {

        $namaupper = strtoupper($this->input->post('nama', true));

        $inisial = substr($namaupper, 0, 3);
        // $feedok = $fix*($fee/100);

        // $query = $this->db->query("SELECT MAX(kode) as m_kode from jasa where ket='J' order by id asc");
        // $da = $query->row();
        // $kodeTerakhir = $da->m_kode;
        $this->db->select('*');
        $this->db->from('daftar_item');
        $this->db->order_by('id','DESC');
        $this->db->limit(1);
        $query = $this->db->get()->row_array();

        // $l = $query[0];
        $kodeDB = $query['kode'];
        $nourutdb = substr($kodeDB, 0, 4);
        $init = $nourutdb +1;
        
        $nourutbaru = sprintf("%04s", $init);


            $data = [
                'kode' => $nourutbaru,
                'nama' => htmlspecialchars($namaupper)
            ];
            $this->db->insert('daftar_item', $data);
            
            $tambah = [
                'kode_item' => $nourutbaru,
                'stok' => 0
            ];
            $this->db->insert('stok_akhir', $tambah);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Item Berhasil Ditambah!</div>');
            redirect('masterdata/daftaritem');
            
        }
        
        public function editItem($id)
        {
            
            $namaupper = strtoupper($this->input->post('nama', true));
            
            
            
            $this->db->set(['nama' => $namaupper]);
            $this->db->where('id', $id);
            $this->db->update('daftar_item');
            
            $this->session->set_flashdata('message', '
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            Item Berhasil Diubah!.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');
            redirect('masterdata/daftaritem');
            
        }
        
        public function deleteItem($id)
        {
            $this->db->where('id', $id);
            $this->db->delete('daftar_item');
            
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Item Berhasil Diubah!</div>');
            redirect('masterdata/daftaritem');
        }
        
    }

    
    