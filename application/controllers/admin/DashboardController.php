<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DashboardController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        checkSession();
    }

    public function index()
    {
        $data['main_popup'] = empty(get_main_popup()) || get_main_popup()->gambar == null || get_main_popup()->gambar == '' ? base_url('uploads/default-image.png') : base_url('uploads/main_popup/' .get_main_popup()->gambar);
        $data['is_active_popup'] = !empty(get_main_popup()) && get_main_popup()->is_active ? 'checked' : '';
        admin_template('admin/v_dashboard', $data, 'js_dashboard');
    }

    public function send_email()
    {
        die();
        $config = array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.zoho.com',
            'smtp_port' => 465,
            'smtp_user' => 'faizrahmat.hidayat06@gmail.com',
            'smtp_pass' => 'CeGPasHSN9ZB',
            'mailtype'  => 'html',
            'charset'   => 'utf-8',
            'newline' => "\r\n",
        );
        $this->load->library('email', $config);
        // $this->email->set_newline("\r\n");
        $this->email->initialize($config);
        $this->email->from('faizrahmat.hidayat06@gmail.com', 'Faiz Rahmat Hidayat');
        $this->email->to('faizrahmat58@gmail.com');
        $this->email->subject('Email Test');
        $this->email->message('Testing the email class.');

        if ($this->email->send()) {
            echo 'Email berhasil dikirim.';
        } else {
            echo $this->email->print_debugger();
        }
    }

    public function simpan_popup()
    {
        $config["upload_path"] = 'uploads/main_popup';
        $config["allowed_types"] = 'gif|jpg|png|jpeg';
        $is_active = $this->input->post('is_active');
        $config['max_size']  = 2048;
        if ($this->input->post('gambar') != 'undefined') {
            $ext = pathinfo($_FILES['gambar']['name'], PATHINFO_EXTENSION);
            $config['file_name'] = 'DITO_ENVIRO_POPUP' . date("d-m-Y H_i_s")  . '.' . $ext;
        }

        $this->load->library('upload', $config);

        if ($_FILES and $_FILES['gambar']['name']) {
            if (!$this->upload->do_upload('gambar')) {
                $status = 'error';
                $msg = $this->upload->display_errors();
                $update = false;
            } else {
                $upload = $this->upload->data();
                chmod($upload['full_path'], 0777);
                $params = array('gambar' => $upload['file_name'], 'is_active' => $is_active);

                if (!empty(get_main_popup()) || !is_null(get_main_popup())) {
                    $target = "uploads/main_popup/" . get_main_popup()->gambar;
                    $unlink = unlink($target);
                    if ($unlink) {
                        $this->db->where('id', get_main_popup()->id);
                        $update = $this->db->update('dek_main_popup', $params);
                        if ($update) {
                            $status = 'success';
                            $update = true;
                            $msg = $_FILES['gambar']['name'] . " berhasil diupload";
                        } else {
                            $status = 'error';
                            $update = false;
                            $msg = 'Gagal Menyimpan data';
                        }
                    } else {
                        $status = 'error';
                        $update = false;
                        $msg = 'Gagal menghapus gambar yang tersedia';
                    }
                } else {
                    $insert = $this->db->insert('dek_main_popup', $params);
                    if ($insert) {
                        $status = 'success';
                        $update = true;
                        $msg = $_FILES['gambar']['name'] . " berhasil diupload";
                    } else {
                        $status = 'error';
                        $update = false;
                        $msg = 'Gagal Menyimpan data';
                    }
                }
            }
        } else {
            $params = array('is_active' => $is_active);
            $this->db->where('id', get_main_popup()->id);
            $update = $this->db->update('dek_main_popup', $params);
            if ($update) {
                $status = 'success';
                $update = true;
                $msg = 'Data berhasil disimpan';
            } else {
                $status = 'error';
                $update = false;
                $msg = 'Gagal Menyimpan data';
            }
        }

        echo json_encode(array('status' => $status, 'msg' => $msg, 'query' => $update, 'token' => $this->security->get_csrf_hash()));
    }

    public function simpan_maintenance()
    {
        $is_active = $this->input->post('status', true);
        $this->db->where('id', 1);
        $update = $this->db->update('dek_settings', ['status' => $is_active]);
        if ($update) {
            $status = 'success';
            $query = $update;
            $msg = 'Berhasil merubah mode maintenance.';
        } else {
            $status = 'error';
            $query = 'false';
            $msg = 'Terjadi kesalahan, gagal merubah mode maintenance.';
        }
        echo json_encode(array('status' => $status, 'msg' => $msg, 'query' => $query, 'token' => $this->security->get_csrf_hash()));
    }
}
