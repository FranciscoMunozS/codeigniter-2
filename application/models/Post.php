<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

class Post extends CI_Model {

  function getRows($id = "") {
    if (!empty($id)) {
      $query = $this->db->get_where('posts', array('id'));
      return $query->row_array();
    } else {
      $query = $this->db->get('posts');
      return $query->result_array();
    }
  }

  public function insert($data = array()) {
    $insert = $this->db->insert('posts', $data);
    if ($insert) {
      return $this->db->insert_id();
    } else {
      return false;
    }
  }

  public function update($data, $id) {
    if (!empty($data) && !empty($id)) {
      $update = $this->db->update('posts', $data, array('id' => $id));
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
