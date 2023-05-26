<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ClientController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        checkSession();
        $this->load->model('admin/client_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $getClient = $this->client_model->get_client();
        $data['client'] = $getClient->result();
        admin_template('admin/v_client', $data, 'js_client');
    }

    public function simpan_client()
    {
        $input = $this->input->post(null, true);
        $config["upload_path"] = 'uploads/client';
        $config["allowed_types"] = 'gif|jpg|png|jpeg';
        $config['max_size']  = 2048;
        if ($this->input->post('gambar') != 'undefined') {
            $ext = pathinfo($_FILES['gambar']['name'], PATHINFO_EXTENSION);
            $config['file_name'] = 'DITO_ENVIRO_CLIENT' . date("d-m-Y H_i_s")  . '.' . $ext;
        }

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('gambar')) {
            $status = false;
            $msg = $this->upload->display_errors();
            $insert = false;
        } else {
            $upload = $this->upload->data();
            chmod($upload['full_path'], 0777);
            $params = array('deskripsi' => $input['deskripsi'], 'gambar' => $upload['file_name']);
            $insert = $this->db->insert('dek_client', $params);

            $status = true;
            $msg = 'Data berhasil disimpan';
        }
        echo json_encode(array('status' => $status, 'msg' => $msg, 'query' => $insert, 'token' => $this->security->get_csrf_hash()));
    }

    public function hapus_client()
    {
        $input = $this->input->post();
        $getClient = $this->db->get_where('dek_client', ['id' => $input['id']]);
        if ($getClient->num_rows() > 0) {
            $this->db->delete('dek_client', ['id' => $input['id']]);
            if ($input['filename'] != '') {
                $target = "uploads/client/" . $input['filename'];
                unlink($target);
            }

            $response = array(
                'status_code' => 200,
                'status' => 'Success',
                'messages' => 'Data berhasil dihapus',
            );
        } else {
            $response = array(
                'status_code' => 404,
                'status' => 'Success',
                'messages' => 'Data tidak ditemukan',
            );
        }
        echo json_encode($response);
    }
}
