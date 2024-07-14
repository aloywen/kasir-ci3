<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Daftaradmin extends CI_Controller {

	public function index() {
		$data = array(
			'title' => "Daftar Item",
			'menu' => "Daftar Item"
		);

		$data['admin'] = $this->db->get('admin')->result_array();

        $query = $this->db->query("SELECT MAX(kode_admin) as m_admin from admin");
        $da = $query->row();
        $data['kode'] = $da->m_admin;

		$this->load->view('masterdata/daftaradmin/index', $data);
	}


    public function store()
    {
        

            $data = [
                'kode_admin' => htmlspecialchars($this->input->post('kode_admin', true)),
                'nama_admin' => htmlspecialchars(strtoupper($this->input->post('nama_admin', true))),
                'ket' => 'b'
            ];

            // var_dump($data);


            $this->db->insert('admin', $data);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Ditambah!</div>');
            redirect('masterdata/daftaradmin/index');
        
    }

    public function editadmin($id)
    {
        
            $nama = strtoupper($this->input->post('nama_admin'));


            $this->db->set(['nama_admin' => $nama]);
            $this->db->where('id', $id);
            $this->db->update('admin');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Diedit!</div>');
            redirect('masterdata/daftaradmin/index');
        
    }

	public function hapusAdmin($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('admin');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Dihapus!</div>');
        redirect('masterdata/daftaradmin/index');
    }

}
