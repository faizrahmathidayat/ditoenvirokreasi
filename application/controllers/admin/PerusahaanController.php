<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PerusahaanController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        checkSession();
        $this->load->model('admin/perusahaan_model');
        $this->load->library('form_validation');
    }

    public function rules_identitas()
    {
        $this->form_validation->set_rules(
            'nama_perusahaan',
            'Nama Perusahaan',
            'required',
            array(
                'required' => 'Nama Perusahaan Tidak boleh kosong.',
            )
        );
        $this->form_validation->set_rules(
            'telepon',
            'Telepon',
            'required|integer|min_length[10]|max_length[13]',
            array(
                'required' => 'Deskripsi Tidak boleh kosong.',
                'min_length' => 'Telpon tidak boleh kurang dari 10 angka.',
                'max_length' => 'Telpon tidak boleh lebih dari 13 angka.',
                'integer' => 'Telpon harus berupa angka.',
            )
        );

        $this->form_validation->set_rules(
            'email',
            'Email',
            'required|valid_email',
            array(
                'required' => 'Email Tidak boleh kosong.',
                'valid_email' => 'Email tidak valid.',
            )
        );
        $this->form_validation->set_rules(
            'alamat_kantor',
            'Alamat kantor',
            'required',
            array(
                'required' => 'Alamat kantor Tidak boleh kosong.',
            )
        );
        $this->form_validation->set_rules(
            'alamat_workshop',
            'Alamat kantor',
            'required',
            array(
                'required' => 'Alamat workshop Tidak boleh kosong.',
            )
        );
        if ($this->form_validation->run()) {
            $array = array(
                'success' => false
            );
        } else {
            $array = array(
                'success'   => true,
                'nama_perusahaan_error' => form_error('nama_perusahaan'),
                'telepon_error' => form_error('telepon'),
                'email_error' => form_error('email'),
                'alamat_kantor_error' => form_error('alamat_kantor'),
                'alamat_workshop_error' => form_error('alamat_workshop'),
            );
        }

        return $array;
    }

    public function rules_profile()
    {
        $this->form_validation->set_rules(
            'profile',
            'Profile',
            'required',
            array(
                'required' => 'Profile Perusahaan Tidak boleh kosong.',
            )
        );
        $this->form_validation->set_rules(
            'visi_misi',
            'Visi Misi',
            'required',
            array(
                'required' => 'Visi dan Misi Tidak boleh kosong.',
            )
        );
        if ($this->form_validation->run()) {
            $array = array(
                'success' => false
            );
        } else {
            $array = array(
                'success'   => true,
                'profile_error' => form_error('profile'),
                'visi_misi_error' => form_error('visi_misi'),
            );
        }

        return $array;
    }

    public function index()
    {
        admin_template('admin/v_perusahaan', null, 'js_perusahaan');
    }

    public function simpan_logo_perusahaan()
    {
        $config["upload_path"] = 'uploads/logo';
        $config["allowed_types"] = 'gif|jpg|png|jpeg';
        $config['max_size']  = 2048;
        if ($this->input->post('logo') != 'undefined') {
            $ext = pathinfo($_FILES['logo']['name'], PATHINFO_EXTENSION);
            $config['file_name'] = 'DITO_ENVIRO_LOGO' . date("d-m-Y H_i_s")  . '.' . $ext;
        }

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('logo')) {
            $status = 'error';
            $msg = $this->upload->display_errors();
            $update = false;
        } else {
            $upload = $this->upload->data();
            chmod($upload['full_path'], 0777);
            $filename = array('logo' => $upload['file_name']);
            $target = "uploads/logo/" . (!empty(get_perusahaan()) ? get_perusahaan()->logo:'');
            if(!is_dir($target)) {
                $unlink = unlink($target);
                if ($unlink) {
                    $update = $this->perusahaan_model->simpan_logo_perusahaan($filename);
                    if ($update) {
                        $status = 'success';
                        $update = true;
                        $msg = $_FILES['logo']['name'] . " berhasil diupload";
                    } else {
                        $status = 'error';
                        $update = false;
                        $msg = 'Gagal merubah logo.';
                    }
                } else {
                    $status = 'error';
                    $update = false;
                    $msg = 'Gagal menghapus logo yang tersedia';
                }
            } else {
                if(!empty(get_perusahaan())) {
                    $update = $this->perusahaan_model->simpan_logo_perusahaan($filename);
                    if ($update) {
                        $status = 'success';
                        $update = true;
                        $msg = $_FILES['logo']['name'] . " berhasil diupload";
                    } else {
                        $status = 'error';
                        $update = false;
                        $msg = 'Gagal merubah logo.';
                    }
                } else {
                    $status = 'error';
                    $update = false;
                    $msg = 'Gagal merubah logo, data perusahaan belum diisi.';
                }
            }
        }


        echo json_encode(array('status' => $status, 'msg' => $msg, 'query' => $update, 'token' => $this->security->get_csrf_hash()));
    }

    public function simpan_identitas_perusahaan()
    {
        $input = $this->input->post(null, true);
        $validate = $this->rules_identitas();
        if (!$validate['success']) {
            $this->perusahaan_model->simpan_perusahaan($input);
            $response = array('success' => true, 'messages' => 'berhasil menyimpan data', 'validate' => $validate, 'token' => $this->security->get_csrf_hash());
        } else {
            $response = array('success' => false, 'validate' => $validate, 'token' => $this->security->get_csrf_hash());
        }
        echo json_encode($response);
    }

    public function simpan_profile_perusahaan()
    {
        $input = $this->input->post();
        $validate = $this->rules_profile();
        if (!$validate['success']) {
            $this->perusahaan_model->simpan_perusahaan($input);
            $response = array('success' => true, 'messages' => 'berhasil menyimpan data', 'validate' => $validate, 'token' => $this->security->get_csrf_hash());
        } else {
            $response = array('success' => false, 'validate' => $validate, 'token' => $this->security->get_csrf_hash());
        }
        echo json_encode($response);
    }
}
