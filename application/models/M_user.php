<?php
class M_user extends CI_Model{

  public function update_password($tabel,$where,$data)
  {
    $this->db->where($where);
    $this->db->update($tabel,$data);
  }

  public function insert($tabel,$data){
    $this->db->insert($tabel,$data);
  }

  public function select($tabel)
  {
    return $this->db->select()
                    ->from($tabel)
                    ->get()->result();
  }
  public function get_data_gambar($tabel,$username)
  {
    $query = $this->db->select()
                      ->from($tabel)
                      ->where('username_user',$username)
                      ->get();
    return $query->result();
  }
}

 ?>
