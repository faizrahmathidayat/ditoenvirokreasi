<?php
defined('BASEPATH') or exit('No direct script access allowed');

class KontakKamiCotroller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        maintenance_mode();
    }

    public function index()
    {
        public_template('kontak_kami/v_index');
    }

    public function post_message()
    {
        $data = $this->input->post(null, true);
        $params = array(
            'message' => $data['message'],
            'nama' => $data['name'],
            'email' => $data['email'],
            'bidang_usaha' => $data['bidang_usaha'],
            'subject' => $data['subject']
        );
        $insert = $this->db->insert('dek_pesan', $params);
        echo json_encode($insert);
    }
}
