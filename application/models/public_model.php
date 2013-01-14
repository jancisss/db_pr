<?php

class Public_model extends CI_Model {

    function __construct() {

        parent::__construct();
    }

    /* public function get_data($parent = null) {
      $query = $this->db->select('id,
      name,
      value,
      parent,
      program')->
      from('budget2012')->
      where('parent', $parent)->
      order_by('value', 'desc');
      $query = $this->db->select('nosaukums')->
      from('institutions');
      $data = $query->get()->result();
      return $data;


      }
     */

    public function product_publiced_place() {
        $query = $this->db->select('*')->
                from('produkti_reklāmas_vietās');
        //  where('parent', $parent)->
        // order_by('value', 'desc');

        $data = $query->get()->result();
        return $data;
    }


}