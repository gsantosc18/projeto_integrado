<?php
/**
 * @autor Gedalias dos Santos Caldas
 */
Interface Mirror{
  public function get_all();
  public function insert($data);
  public function delete($id);
  public function update($id,$data);
}

 ?>
