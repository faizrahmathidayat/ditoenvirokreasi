<?php
defined('BASEPATH') or exit('No direct script access allowed');

class GaleriController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        maintenance_mode();
        $this->load->model('admin/galeri_model');
    }

    public function index()
    {
        $getGaleri = $this->galeri_model->get_galeri();
        $data['galeri'] = $getGaleri->result();
        public_template('galeri/v_index', $data, 'js_galeri.php');
    }
}
