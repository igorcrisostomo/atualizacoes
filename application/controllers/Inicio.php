<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio extends CI_Controller {

	public function index()
	{

		$data_header = $data_view = $data_footer = [];
		$data_header['title'] = 'Início';

		$this->load->view('template/cabecalho', $data_header);
		$this->load->view('inicio', $data_view);
		$this->load->view('template/rodape', $data_footer);
	}
}
