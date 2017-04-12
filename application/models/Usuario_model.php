<?php
require_once('Mirror.php');
/**
 * @autor Gedalias dos Santos Caldas
 */
class Usuario_model extends CI_Model implements Mirror
{
  private $table = 'sa_usuario';

  function __construct()
  {
    parent::__construct();
  }
  
  public function get_all(){
    return $this->db->get($this->table)->result();
  }

  public function get_usuario($data,$unique = FALSE){
    $this->db->where($data);

    if($unique)
      return $this->db->get($this->table)->first_row();

    return $this->db->get($this->table)->result();
  }

  public function insert($data){
    return $this->db->insert($data);
  }

  public function delete($id){
    $this->db->where('id_usuario',$id);
    return $this->db->delete($this->table);
  }

  public function update($id,$data){
    $this->db->where('id_usuario',$id);
    $this->db->set($data);
    return $this->db->update($this->table);
  }
}


 ?>
