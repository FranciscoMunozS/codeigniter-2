<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Product extends CI_Model {

  function getRows($id = "") {
    if (!empty($id)) {
      $query = $this->db->get_where('products', array('id'));
      return $query->row_array();
    } else {
      $query = $this->db->get('products');
      return $query->result_array();
    }
  }

  public function insert($data = array()) {
    $insert = $this->db->insert('products', $data);
    if ($insert) {
      return $this->db->insert_id();
    } else {
      return false;
    }
  }

  public funcion update($data, $id) {
    if (!empty($data) && !empty($id)) {
      $update = $this->db->update('products', $data, array('id' => $id));
      return $update?true:false;
    } else {
      return false;
    }
  }

  public function delete($id) {
    $delete = $this->db->delete('posts', array('id' => $id));
    return $delete?true:false;
  }
}
