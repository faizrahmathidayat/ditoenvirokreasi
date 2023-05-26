<?php
defined('BASEPATH') or exit('No direct script access allowed');

class TestimoniController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        checkSession();
        $this->load->model('admin/testimoni_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $getTestimoni = $this->testimoni_model->get_testimoni();
        $data['testimoni'] = $getTestimoni->result();
        admin_template('admin/v_testimoni', $data, 'js_testimoni');
    }

    public function simpan_testimoni()
    {
        $input = $this->input->post(null, true);
        $config["upload_path"] = 'uploads/testimoni';
        $config["allowed_types"] = 'gif|jpg|png|jpeg';
        $config['max_size']  = 1024;
        if ($this->input->post('avatar') != 'undefined') {
            $ext = pathinfo($_FILES['avatar']['name'], PATHINFO_EXTENSION);
            $config['file_name'] = 'DITO_ENVIRO_TESTIMONI' . date("d-m-Y H_i_s")  . '.' . $ext;
        }

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('avatar')) {
            $status = false;
            $msg = $this->upload->display_errors();
            $insert = false;
        } else {
            $upload = $this->upload->data();
            chmod($upload['full_path'], 0777);
            $params = array(
                'nama' => $input['nama'],
                'deskripsi' => $input['deskripsi'],
                'jabatan' => $input['jabatan'],
                'avatar' => $upload['file_name']
            );
            $insert = $this->db->insert('dek_testimoni', $params);

            $status = true;
            $msg = 'Data berhasil disimpan';
        }
        echo json_encode(array('status' => $status, 'msg' => $msg, 'query' => $insert, 'token' => $this->security->get_csrf_hash()));
    }

    public function hapus_testimoni()
    {
        $input = $this->input->post();
        $getTestimoni = $this->db->get_where('dek_testimoni', ['id' => $input['id']]);
        if ($getTestimoni->num_rows() > 0) {
            $this->db->delete('dek_testimoni', ['id' => $input['id']]);
            if ($input['filename'] != '') {
                $target = "uploads/testimoni/" . $input['filename'];
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
