<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dist extends CI_Controller {

	public function index() {
		$data = array(
			'title' => "Ecommerce Dashboard",
			'menu' => "Dashboard"
		);
		$this->load->view('dist/index', $data);
	}

	public function blank() {
		$data = array(
			'title' => "Dashboard",
			'menu' => "Dashboard"
		);
		$this->load->view('dist/blank', $data);
	}

	public function laporan() {
		$data = array(
			'title' => "Laporan",
			'menu' => "Laporan"
		);
		$this->load->view('dist/blank', $data);
	}

}
