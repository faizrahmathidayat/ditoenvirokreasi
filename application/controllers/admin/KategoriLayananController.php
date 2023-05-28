<?php
defined('BASEPATH') or exit('No direct script access allowed');

class KategoriLayananController extends CI_Controller
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
                'deskripsi_error' => form_error('deskripsi'),
                'banner_error' => form_error('banner'),
            );
        }

        return $array;
    }

    public function rules_ubah()
    {
        $this->form_validation->set_rules(
            'judul_ubah',
            'Judul',
            'required',
            array(
                'required' => 'Judul Tidak boleh kosong.',
            )
        );
        $this->form_validation->set_rules(
            'deskripsi_ubah',
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
                'judul_ubah_error' => form_error('judul_ubah'),
                'deskripsi_ubah_error' => form_error('deskripsi_ubah'),
            );
        }

        return $array;
    }

    public function index()
    {
        $get_kategori_layanan = $this->layanan_model->get_kategori_layanan();
        $data['kategori'] = $get_kategori_layanan->result();
        admin_template('admin/v_kategori_layanan', $data, 'js_kategori_layanan');
    }

    public function simpan_kategori()
    {
        $config["upload_path"] = 'uploads/kategori_layanan';
        $config["allowed_types"] = 'gif|jpg|png|jpeg';
        $config['max_size']  = 2048;
        if ($this->input->post('banner') != 'undefined') {
            $ext = pathinfo($_FILES['banner']['name'], PATHINFO_EXTENSION);
            $config['file_name'] = 'DITO_ENVIRO_KREASI_KATEGORI_LAYANAN' . date("d-m-Y H_i_s")  . '.' . $ext;
        }

        $this->load->library('upload', $config);

        $validate = $this->rules();
        if (!$validate['success']) {
            if (!$this->upload->do_upload('banner')) {
                $msg = $this->upload->display_errors();
                $response = array('status_image' => true, 'messages' => $msg, 'validate' => $validate, 'token' => $this->security->get_csrf_hash());
                echo json_encode($response);
                exit();
            } else {
                $input = $this->input->post();
                $upload = $this->upload->data();
                chmod($upload['full_path'], 0777);
                $params = array(
                    'judul' => $input['judul'],
                    'deskripsi' => $input['deskripsi'],
                    'banner' => $upload['file_name'],
                );

                $this->db->insert('dek_kategori_layanan', $params);
                $response = array('status_image' => false, 'success' => true, 'messages' => 'berhasil menyimpan data', 'validate' => $validate);
            }
        } else {
            $response = array('status_image' => false, 'success' => false, 'validate' => $validate, 'token' => $this->security->get_csrf_hash());
        }

        echo json_encode($response);
    }

    public function ubah_kategori()
    {
        $input = $this->input->post(null, true);
        $params = array(
            'judul' => $input['judul_ubah'],
            'deskripsi' => $input['deskripsi_ubah']
        );
        $validate = $this->rules_ubah();
        if (!$validate['success']) {
            $this->db->where('id', $input['id_kategori']);
            $this->db->update('dek_kategori_layanan', $params);
            $response = array('success' => true, 'messages' => 'berhasil menyimpan data', 'validate' => $validate);
        } else {
            $response = array('success' => false, 'validate' => $validate, 'token' => $this->security->get_csrf_hash());
        }

        echo json_encode($response);
    }

    public function upload_banner_kategori()
    {
        $id = $this->input->post('id', true);
        $config["upload_path"] = 'uploads/kategori_layanan';
        $config["allowed_types"] = 'gif|jpg|png|jpeg';
        $config['max_size']  = 2048;
        if ($this->input->post('banner') != 'undefined') {
            $ext = pathinfo($_FILES['banner']['name'], PATHINFO_EXTENSION);
            $config['file_name'] = 'DITO_ENVIRO_KREASI_KATEGORI_LAYANAN' . date("d-m-Y H_i_s")  . '.' . $ext;
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
            $update = $this->db->update('dek_kategori_layanan', $filename);
            $msg = $_FILES['banner']['name'] . " berhasil diupload";
        }


        echo json_encode(array('status' => $status, 'msg' => $msg, 'query' => $update, 'token' => $this->security->get_csrf_hash()));
    }

    public function hapus_kategori_layanan()
    {
        $id = $this->input->post('id', true);
        $banner_filename = $this->input->post('banner_filename', true);
        $getLayanan = $this->db->get_where('dek_kategori_layanan', ['id' => $id]);
        if ($getLayanan->num_rows() > 0) {
            $this->db->delete('dek_kategori_layanan', ['id' => $id]);
            if ($banner_filename != '') {
                $target = "uploads/kategori_layanan/" . $banner_filename;
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

    public function hapus_banner_kategori()
    {
        $id = $this->input->post('id', true);
        $banner_filename = $this->input->post('banner_filename', true);
        $getLayanan = $this->db->get_where('dek_kategori_layanan', ['id' => $id]);
        if ($getLayanan->num_rows() > 0) {
            $this->db->where('id', $id);
            $this->db->update('dek_kategori_layanan', ['banner' => null]);
            $target = "uploads/kategori_layanan/" . $banner_filename;
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
