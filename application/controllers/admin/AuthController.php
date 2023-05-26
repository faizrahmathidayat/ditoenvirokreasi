<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AuthController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        hasLogin();
        $this->load->view('admin/v_login');
    }

    public function login()
    {
        $user = $this->input->post('username', TRUE);
        $pass = $this->input->post('password', TRUE);

        $cek  = $this->db->get_where('dek_users', ['username' => $user]);
        if ($cek->num_rows() > 0) {
            // kita ambil isi dari record
            $users = $cek->row();
            if (password_verify($pass, $users->password)) {
                // membuat session
                $this->session->set_userdata('user', $users);

                redirect(base_url('dek-admin-login/dashboard'));
            } else {

                // jika password salah
                $this->session->set_flashdata('failed', 'Password salah !');
                redirect(base_url('dek-admin-login'));
            }
        } else {

            // jika username salah
            $this->session->set_flashdata('failed', 'Username tidak Tersedia !');
            redirect(base_url('dek-admin-login'));
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url('dek-admin-login'));
    }
}
