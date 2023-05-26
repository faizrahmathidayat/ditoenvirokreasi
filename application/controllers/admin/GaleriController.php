<?php
defined('BASEPATH') or exit('No direct script access allowed');

class GaleriController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        checkSession();
        $this->load->model('admin/galeri_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $getGaleri = $this->galeri_model->get_galeri();
        $data['galeri'] = $getGaleri->result();
        admin_template('admin/v_galeri', $data, 'js_galeri');
    }

    public function simpan_galeri()
    {
        $input = $this->input->post(null, true);
        $config["upload_path"] = 'uploads/galeri';
        $config["allowed_types"] = 'gif|jpg|png|jpeg';
        $config['max_size']  = 2048;
        if ($this->input->post('gambar') != 'undefined') {
            $ext = pathinfo($_FILES['gambar']['name'], PATHINFO_EXTENSION);
            $config['file_name'] = 'DITO_ENVIRO_GALERI' . date("d-m-Y H_i_s")  . '.' . $ext;
        }

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('gambar')) {
            $status = false;
            $msg = $this->upload->display_errors();
            $update = false;
        } else {
            $upload = $this->upload->data();
            chmod($upload['full_path'], 0777);
            $params = array('deskripsi' => $input['deskripsi'], 'gambar' => $upload['file_name']);
            $update = $this->db->insert('dek_galeri', $params);

            $status = true;
            $msg = 'Data berhasil disimpan';
            $update = $update;
        }
        echo json_encode(array('status' => $status, 'msg' => $msg, 'query' => $update, 'token' => $this->security->get_csrf_hash()));
    }

    public function hapus_galeri()
    {
        $input = $this->input->post();
        $getGaleri = $this->db->get_where('dek_galeri', ['id' => $input['id']]);
        if ($getGaleri->num_rows() > 0) {
            $this->db->delete('dek_galeri', ['id' => $input['id']]);
            if ($input['filename'] != '') {
                $target = "uploads/galeri/" . $input['filename'];
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
