<?php
defined('BASEPATH') or exit('No direct script access allowed');

class LayananController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        maintenance_mode();
        $this->load->model('layanan_model');
    }

    public function index($id)
    {
        if (!$id) {
            redirect('v_index');
        }
        $get_layanan = $this->layanan_model->get_layanan($id);
        $count_kategori = get_category($id)->num_rows();
        $data['layanan'] = $get_layanan->result();
        $data['judul_kategori'] = $count_kategori > 0 ? get_category($id)->row()->judul : '';
        $data['banner'] = $count_kategori > 0 ? get_category($id)->row()->banner : '';
        public_template('layanan/v_index', $data);
    }
    public function single_post($slug = '')
    {
        $get_layanan = $this->layanan_model->get_layanan_by_slug($slug);
        $data['layanan'] = $get_layanan->row();
        $data['count_layanan'] = $get_layanan->num_rows();
        public_template('layanan/single_post', $data);
    }
}
