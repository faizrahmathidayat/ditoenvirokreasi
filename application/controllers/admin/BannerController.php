<?php
defined('BASEPATH') or exit('No direct script access allowed');

class BannerController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        checkSession();
    }

    public function index()
    {
        $bannerUtama = empty(get_banner()) || get_banner()->halaman_utama == null || get_banner()->halaman_utama == '' ? base_url('uploads/default-image.png') : base_url('uploads/banner/' . (!empty(get_banner()) ? get_banner()->halaman_utama:''));
        $bannerGaleri = empty(get_banner()) || get_banner()->galeri == null || get_banner()->galeri == '' ? base_url('uploads/default-image.png') : base_url('uploads/banner/' . (!empty(get_banner()) ? get_banner()->galeri:''));
        $bannerTentangKami = empty(get_banner()) || get_banner()->tentang_kami == null || get_banner()->tentang_kami == '' ? base_url('uploads/default-image.png') : base_url('uploads/banner/' . (!empty(get_banner()) ? get_banner()->tentang_kami:''));
        $bannerKontak = empty(get_banner()) || get_banner()->kontak == null || get_banner()->kontak == '' ? base_url('uploads/default-image.png') : base_url('uploads/banner/' . (!empty(get_banner()) ? get_banner()->kontak:''));

        $data['banner_halaman_utama'] = $bannerUtama;
        $data['banner_galeri'] = $bannerGaleri;
        $data['banner_tentang_kami'] = $bannerTentangKami;
        $data['banner_kontak'] = $bannerKontak;

        admin_template('admin/v_banner', $data, 'js_banner');
    }

    public function simpan_banner()
    {
        $input = $this->input->post();
        $config["upload_path"] = 'uploads/banner';
        $config["allowed_types"] = 'gif|jpg|png|jpeg';
        $config['max_size']  = 2048;
        if ($this->input->post('gambar') != 'undefined') {
            $ext = pathinfo($_FILES['gambar']['name'], PATHINFO_EXTENSION);
            $config['file_name'] = 'DITO_ENVIRO_' . $input['basefilename'] . '' . date("d-m-Y H_i_s")  . '.' . $ext;
        }

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('gambar')) {
            $status = 'error';
            $msg = $this->upload->display_errors();
            $update = false;
        } else {
            $target = "uploads/banner/" . $input['bannerexisting'];
            if ($input['bannerexisting'] != null || $input['bannerexisting'] != '') {
                if (file_exists($target)) {
                    $unlink = unlink($target);
                } else {
                    $unlink = true;
                }
            } else {
                $unlink = true;
            }

            if ($unlink) {
                $upload = $this->upload->data();
                chmod($upload['full_path'], 0777);
                $filename = array($input['paramsName'] => $upload['file_name']);

                $this->db->where('id', get_banner()->id);
                $update = $this->db->update('dek_banner', $filename);
                if ($update) {
                    $status = 'success';
                    $update = true;
                    $msg = $_FILES['gambar']['name'] . " berhasil diupload";
                } else {
                    $status = 'error';
                    $update = false;
                    $msg = 'Gagal merubah banner.';
                }
            } else {
                $status = 'error';
                $update = false;
                $msg = 'Gagal menghapus banner yang tersedia';
            }
        }


        echo json_encode(array('status' => $status, 'msg' => $msg, 'query' => $update, 'token' => $this->security->get_csrf_hash()));
    }
}
