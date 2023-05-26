<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Layanan_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function get_kategori_layanan($id = null)
    {
        $this->db->select('*');
        $this->db->from('dek_kategori_layanan');
        if ($id != null)
            $this->db->where('id', $id);
        $query = $this->db->get();
        return $query;
    }

    public function get_layanan($id = null)
    {
        if ($id == null) {
            $this->db->select('b.id, a.judul as kategori, b.judul, b.deskripsi, b.slug, b.banner');
            $this->db->from('dek_kategori_layanan a');
            $this->db->join('dek_layanan b', 'a.id = b.id_kategori_layanan');
            $query = $this->db->get();
        } else {
            $query = $this->db->get_where('dek_layanan', ['id_kategori_layanan' => $id]);
        }
        return $query;
    }

    public function get_layanan_by_kategori($id = null)
    {
        $query = $this->db->get_where('dek_layanan', ['id' => $id]);

        return $query;
    }

    public function get_layanan_by_slug($slug)
    {
        $query = $this->db->get_where('dek_layanan', ['slug' => $slug]);
        return $query;
    }

    public function create_slug($title)
    {
        $extract = explode(" ", $title, 6);
        unset($extract[5]);
        $combine = implode(" ", $extract);
        $lowercase = strtolower($combine);
        $preslug = url_title($lowercase);

        $slug = $preslug;

        $this->db->like('slug', $preslug, 'after');
        $checkslug = $this->db->get('dek_layanan');
        if ($checkslug->num_rows() > 0) {
            $num = (int)$checkslug->num_rows() + 1;
            $slug = $preslug . "-" . $num;
        }

        return $slug;
    }
}
