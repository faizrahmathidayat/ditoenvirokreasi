<?php
defined('BASEPATH') or exit('No direct script access allowed');

class HomeController extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		maintenance_mode();
		$this->load->model('layanan_model');
		$this->load->model('admin/client_model');
		$this->load->model('admin/testimoni_model');
	}

	public function index()
	{
		$getKategori = $this->layanan_model->get_kategori_layanan();
		$getClient = $this->client_model->get_client();
		$getTestimoni = $this->testimoni_model->get_testimoni();

		$data['main_popup'] = empty(get_main_popup()) || get_main_popup()->gambar == null || get_main_popup()->gambar == '' ? base_url('uploads/default-image.png') : base_url('uploads/main_popup/' . get_main_popup()->gambar);
		$data['kategori'] = $getKategori->result();
		$data['client'] = $getClient->result();
		$data['testimoni'] = $getTestimoni->result();
		public_template('v_index', $data, 'js_home');
	}
}
