<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menulaporan extends CI_Controller {

    public function index() {
		$data = array(
			'title' => "Menu Laporan",
			'menu' => "Menu Laporan"
		);
		$this->load->view('laporan/index', $data);
	}

	public function lap_daftaritem() {
		$data = array(
			'title' => "Pengaturan &rsaquo; Akses User"
		);
		$this->load->view('laporan/lap_daftaritem', $data);
	}

	public function lapdaftarsupplier() {
		$data = array(
			'title' => "Pengaturan &rsaquo; Pengaturan Umum"
		);
		$this->load->view('laporan/features-posts', $data);
	}

	public function lappembelian() {
		$data = array(
			'title' => "Pengaturan &rsaquo; Setting Nomor"
		);
		$this->load->view('laporan/features-profile', $data);
	}

	public function lapreturpembelian() {
		$data = array(
			'title' => "Pengaturan &rsaquo; Log Aktifitas"
		);
		$this->load->view('laporan/features-settings', $data);
	}

	public function lappembelianitem() {
		$data = array(
			'title' => "Pengaturan &rsaquo; Pengaturan Umum"
		);
		$this->load->view('laporan/features-posts', $data);
	}

	public function lappenjualan() {
		$data = array(
			'title' => "Pengaturan &rsaquo; Setting Nomor"
		);
		$this->load->view('laporan/features-profile', $data);
	}

	public function lappenjualanitem() {
		$data = array(
			'title' => "Pengaturan &rsaquo; Log Aktifitas"
		);
		$this->load->view('laporan/features-settings', $data);
	}

}