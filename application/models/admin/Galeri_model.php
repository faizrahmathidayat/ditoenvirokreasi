<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Galeri_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function get_galeri($id = null)
    {
        if ($id != null)
            $this->db->where('id', $id);

        $query = $this->db->get('dek_galeri');
        return $query;
    }
}
