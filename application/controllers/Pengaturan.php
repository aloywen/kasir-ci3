<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengaturan extends CI_Controller {

    public function daftaruser() {
		$data = array(
			'title' => "Pengaturan &rsaquo; Daftar User",
			'menu' => "Daftar User"
		);
		$this->load->view('pengaturan/daftaruser', $data);
	}

	public function aksesuser() {
		$data = array(
			'title' => "Pengaturan &rsaquo; Akses User",
			'menu' => "Akses User"
		);
		$this->load->view('pengaturan/aksesuser', $data);
	}

	public function pengaturanumum() {
		$data = array(
			'title' => "Pengaturan &rsaquo; Pengaturan Umum",
			'menu' => "Pengaturan Umum"
		);
		$this->load->view('pengaturan/pengaturanumum', $data);
	}

	public function settingnomortransaksi() {
		$data = array(
			'title' => "Pengaturan &rsaquo; Setting Nomor",
			'menu' => "Setting Nomor"
		);
		$this->load->view('pengaturan/settingnomor', $data);
	}

	public function logaktifitas() {
		$data = array(
			'title' => "Pengaturan &rsaquo; Log Aktifitas",
			'menu' => "Log Aktifitas"
		);
		$this->load->view('pengaturan/logaktifitas', $data);
	}

}