<?php

function maintenance_mode()
{
    $ci = get_instance();
    $query = $ci->db->get('dek_settings');
    if(!empty($query->result())) {
        if ($query->result()[0]->status == 1) {
            if (!$ci->session->userdata("user")) {
                include(APPPATH . 'views/maintenance.php');
                exit;
            }
        }
    }
}

function status_maintenance()
{
    $ci = get_instance();
    $query = $ci->db->get('dek_settings');
    return $query->result()[0]->status;
}

function public_template($view, $data = null, $js = null)
{
    $ci = get_instance();
    $dataJS['js'] = $js;
    $ci->load->view('templates/header');
    $ci->load->view($view, $data);
    $ci->load->view('templates/footer', $dataJS);
}

function admin_template($view, $data = null, $js = null)
{
    $ci = get_instance();
    $dataJS['js'] = $js;
    $ci->load->view('admin/templates/header');
    $ci->load->view('admin/templates/sidebar');
    $ci->load->view($view, $data);
    $ci->load->view('admin/templates/footer', $dataJS);
}

function get_perusahaan()
{
    $ci = get_instance();
    $query = $ci->db->get('dek_perusahaan');
    return $query->row();
}

function get_logo()
{
    // $ci = get_instance();
    $logo = '#';
    if(!empty(get_perusahaan())) {
        if (get_perusahaan()->logo != null || get_perusahaan()->logo != '') {
            if (file_exists('uploads/logo/' . get_perusahaan()->logo)) {
                $logo = base_url('uploads/logo/' . get_perusahaan()->logo);
            } else {
                $logo = base_url('assets/img/default_image.png');
            }
        } else {
            $logo = base_url('assets/img/default_image.png');
        }
    }
    
    return $logo;
}

function get_category($id = null)
{
    $ci = get_instance();

    if ($id == null) {
        return $ci->db->get('dek_kategori_layanan');
    } else {
        $query = $ci->db->get_where('dek_kategori_layanan', ['id' => $id]);
        return $query;
    }
}

function get_banner()
{
    $ci = get_instance();
    $query = $ci->db->get('dek_banner');
    return $query->row();
}

function get_main_popup()
{
    $ci = get_instance();
    $query = $ci->db->get('dek_main_popup');
    return $query->row();
}

function userdata()
{
    $ci = get_instance();

    $user = $ci->session->userdata("user");
    $userdata = $ci->db->get_where("dek_users", ["id" => $user->id]);

    return $userdata;
}

function checkSession()
{
    $ci = get_instance();
    if (!$ci->session->userdata("user")) {
        $ci->session->set_flashdata('failed', 'Anda Belum login, silahkan login terlebih dahulu !');
        redirect(base_url('dek-admin-login'));
    }
}

function hasLogin()
{
    $ci = get_instance();
    if ($ci->session->userdata("user")) {
        redirect(base_url('dek-admin-login/dashboard'));
    }
}
