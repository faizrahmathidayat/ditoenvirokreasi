<?php
defined('BASEPATH') or exit('No direct script access allowed');

class TentangKamiController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        maintenance_mode();
        $this->load->model('layanan_model');
    }

    public function index()
    {
        public_template('tentang_kami/v_index');
    }
}
