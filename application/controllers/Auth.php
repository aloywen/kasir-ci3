<?php
defined('BASEPATH') or exit('No direct script access allowed');
 
class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        if ($this->session->userdata('username')) {
            redirect('user');
        }

        // $data['barang'] = $this->db->get_where('barang', ['status' => ''] )->result_array();


        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Login Page';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/login', $data);
            $this->load->view('templates/auth_footer');
        } else {
            // validasinya success
            $this->_login();
        }
    }


    private function _login()
    {
        $username = 'admin';
        $password = 'password';

        // $user = $this->db->get_where('user', ['username' => $username])->row_array();

        
                // cek password
                if ($password == $user['password']) {
                    $data = [
                        'username' => $user['username'],
                        'role_id' => $user['role_id']
                    ];
                    $this->session->set_userdata($data);
                    redirect('admin');
                      
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password Salah!</div>');
                    redirect('auth');
                }
             
        
    }



    public function logout()
    {
        $this->session->unset_userdata('username');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Anda Telah Logout!</div>');
        redirect('auth');
    }


    public function blocked()
    {
        $this->load->view('auth/blocked');
    }
 

    


}
