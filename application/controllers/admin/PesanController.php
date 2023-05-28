<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PesanController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        checkSession();
    }

    public function index()
    {
        $get_message = $this->db->order_by('id','DESC')->get('dek_pesan')->result();
        $data['message'] = $get_message;
        admin_template('admin/v_pesan', $data, 'js_pesan');
    }
}
