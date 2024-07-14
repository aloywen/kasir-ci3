<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Persediaan extends CI_Controller {

    public function itemmasuk() {
		$data = array(
			'title' => "Persediaan &rsaquo; Item Masuk",
			'menu' => "Item Masuk"
		);
		$this->load->view('persediaan/itemmasuk', $data);
	}

	public function itemkeluar() {
		$data = array(
			'title' => "Persediaan &rsaquo; Item Keluar",
			'menu' => "Item Keluar"
		);
		$this->load->view('persediaan/itemkeluar', $data);
	}

	public function itemtransfer() {
		$data = array(
			'title' => "Persediaan &rsaquo; Item Transfer",
			'menu' => "Item Keluar"
		);
		$this->load->view('persediaan/itemtransfer', $data);
	}

	public function saldoawal() {
		$data = array(
			'title' => "Persediaan &rsaquo; Saldo Awal",
			'menu' => "Saldo Awal"
		);
		$this->load->view('persediaan/saldoawal', $data);
	}

	public function perbaikansaldo() {
		$data = array(
			'title' => "Persediaan &rsaquo; Perbaikan Saldo",
			'menu' => "Perbaikan Saldo"
		);
		$this->load->view('persediaan/perbaikansaldo', $data);
	}

}