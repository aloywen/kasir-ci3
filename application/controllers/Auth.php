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
            redirect()->back();
        }



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
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $user = $this->db->get_where('admin', ['username' => $username])->row_array();

        
            if($user){
                // cek password
                if ($password == $user['password']) {
                    $data = [
                        'user' => $user['nama'],
                        'role_id' => $user['role']
                    ];
                    $this->session->set_userdata($data);
                    if($user['role'] == 2){
                        redirect('kasir/penjualan');
                    }
                    if($user['role'] == 1){
                        redirect('/');
                    }
                      
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Username / Password Salah!</div>');
                    redirect('auth');
                }
            } else {

                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Username / Password Salah!</div>');
                redirect('auth');
            }
        
    }



    public function logout()
    {
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('role');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Anda Telah Logout!</div>');
        redirect('auth');
    }


    public function blocked()
    {
        $this->load->view('auth/blocked');
    }
 

    


}
