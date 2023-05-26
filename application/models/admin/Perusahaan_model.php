<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Perusahaan_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    function simpan_logo_perusahaan($data)
    {
        $this->db->where('id', get_perusahaan()->id);
        $query = $this->db->update('dek_perusahaan', $data);
        return $query;
    }

    public function simpan_perusahaan($data)
    {
        if(!empty(get_perusahaan())) {
            $this->db->where('id', get_perusahaan()->id);
            $query = $this->db->update('dek_perusahaan', $data);
        } else {
            $query = $this->db->insert('dek_perusahaan', $data);
        }
        
        return $query;
    }
}
