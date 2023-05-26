<?php
defined('BASEPATH') or exit('No direct script access allowed');

class LayananController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        checkSession();
        $this->load->model('layanan_model');
        $this->load->library('form_validation');
    }

    public function rules()
    {
        $this->form_validation->set_rules(
            'judul',
            'Judul',
            'required',
            array(
                'required' => 'Judul Tidak boleh kosong.',
            )
        );
        $this->form_validation->set_rules(
            'deskripsi',
            'Deskripsi',
            'required',
            array('required' => 'Deskripsi Tidak boleh kosong.')
        );
        if ($this->form_validation->run()) {
            $array = array(
                'success' => false
            );
        } else {
            $array = array(
                'success'   => true,
                'judul_error' => form_error('judul'),
                'deskripsi_error' => form_error('deskripsi')
            );
        }

        return $array;
    }

    public function rules_ubah()
    {
        $this->form_validation->set_rules(
            'ubah_kategori',
            'kategori',
            'required',
            array(
                'required' => 'Kategori Tidak boleh kosong.',
            )
        );
        $this->form_validation->set_rules(
            'ubah_judul',
            'Judul',
            'required',
            array(
                'required' => 'Judul Tidak boleh kosong.',
            )
        );
        $this->form_validation->set_rules(
            'ubah_deskripsi',
            'Deskripsi',
            'required',
            array('required' => 'Deskripsi Tidak boleh kosong.')
        );
        $this->form_validation->set_rules(
            'ubah_layanan_body',
            'Deskripsi Lengkap',
            'required',
            array('required' => 'Deskripsi Lengkap Tidak boleh kosong.')
        );
        if ($this->form_validation->run()) {
            $array = array(
                'success' => false
            );
        } else {
            $array = array(
                'success'   => true,
                'ubah_judul_error' => form_error('ubah_judul'),
                'ubah_deskripsi_error' => form_error('ubah_deskripsi'),
                'ubah_layanan_body_error' => form_error('ubah_layanan_body')
            );
        }

        return $array;
    }

    public function index()
    {
        $get_layanan = $this->layanan_model->get_layanan();
        $get_kategori = $this->layanan_model->get_kategori_layanan();
        $data['layanan'] = $get_layanan->result();
        $data['kategori'] = $get_kategori->result();
        admin_template('admin/v_layanan', $data, 'js_layanan');
    }

    public function simpan_layanan()
    {
        $input = $this->input->post();
        $slug = $this->layanan_model->create_slug($input['deskripsi']);
        $params = array(
            'judul' => $input['judul'],
            'deskripsi' => $input['deskripsi'],
            'layanan_body' => $input['layanan_body'],
            'slug' => $slug,
            'id_kategori_layanan' => $input['kategori'],
        );
        $validate = $this->rules();
        if (!$validate['success']) {
            $this->db->insert('dek_layanan', $params);
            $response = array('success' => true, 'messages' => 'berhasil menyimpan data', 'validate' => $validate);
        } else {
            $response = array('success' => false, 'validate' => $validate, 'token' => $this->security->get_csrf_hash());
        }
        echo json_encode($response);
    }

    public function show_layanan()
    {
        $id = $this->input->get('id', true);
        $get_layanan = $this->layanan_model->get_layanan_by_kategori($id);
        echo json_encode($get_layanan->row());
    }

    public function ubah_layanan()
    {
        $input = $this->input->post();
        $slug = $this->layanan_model->create_slug($input['ubah_deskripsi']);
        $params = array(
            'judul' => $input['ubah_judul'],
            'deskripsi' => $input['ubah_deskripsi'],
            'layanan_body' => $input['ubah_layanan_body'],
            'id_kategori_layanan' => $input['ubah_kategori'],
            'slug' => $slug
        );
        $validate = $this->rules_ubah();
        if (!$validate['success']) {
            $this->db->where('id', $input['id_layanan']);
            $this->db->update('dek_layanan', $params);
            $response = array('success' => true, 'messages' => 'berhasil menyimpan data', 'validate' => $validate);
        } else {
            $response = array('success' => false, 'validate' => $validate, 'token' => $this->security->get_csrf_hash());
        }
        echo json_encode($response);
    }

    public function hapus_layanan()
    {
        $id = $this->input->post('id', true);
        $banner_filename = $this->input->post('banner_filename', true);
        $getLayanan = $this->db->get_where('dek_layanan', ['id' => $id]);
        if ($getLayanan->num_rows() > 0) {
            $this->db->delete('dek_layanan', ['id' => $id]);
            if ($banner_filename != '') {
                $target = "uploads/layanan/" . $banner_filename;
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

    public function upload_banner_layanan()
    {
        $id = $this->input->post('id', true);
        $config["upload_path"] = 'uploads/layanan';
        $config["allowed_types"] = 'gif|jpg|png|jpeg';
        $config['max_size']  = 2048;
        if ($this->input->post('banner') != 'undefined') {
            $ext = pathinfo($_FILES['banner']['name'], PATHINFO_EXTENSION);
            $config['file_name'] = 'DITO_ENVIRO_KREASI_LAYANAN' . date("d-m-Y H_i_s")  . '.' . $ext;
        }

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('banner')) {
            $status = false;
            $msg = $this->upload->display_errors();
            $update = false;
        } else {
            $upload = $this->upload->data();
            chmod($upload['full_path'], 0777);
            $filename = array('banner' => $upload['file_name']);
            $status = true;
            $this->db->where('id', $id);
            $update = $this->db->update('dek_layanan', $filename);
            $msg = $_FILES['banner']['name'] . " berhasil diupload";
        }


        echo json_encode(array('status' => $status, 'msg' => $msg, 'query' => $update, 'token' => $this->security->get_csrf_hash()));
    }

    public function hapus_banner_layanan()
    {
        $id = $this->input->post('id', true);
        $banner_filename = $this->input->post('banner_filename', true);
        $getLayanan = $this->db->get_where('dek_layanan', ['id' => $id]);
        if ($getLayanan->num_rows() > 0) {
            $this->db->where('id', $id);
            $this->db->update('dek_layanan', ['banner' => null]);
            $target = "uploads/layanan/" . $banner_filename;
            unlink($target);
            $response = array(
                'status_code' => 200,
                'status' => 'Success',
                'messages' => 'Banner berhasil dihapus',
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
