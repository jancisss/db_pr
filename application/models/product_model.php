<?php

class Product_model extends CI_Model {

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

    public function get_all_products() {
        $query = $this->db->select('produkts_ID, nosaukums, cena, apraksts, raz_firm_ID')->
                from('Produkti');
        //  where('parent', $parent)->
        // order_by('value', 'desc');

        $data = $query->get()->result();
        return $data;
    }

    public function get_firm_by_ID($firm_ID) {
        $query = $this->db->select('firmas_ID, reg_nr, nosaukums, adrese, tel_nr')->
                where('firmas_ID', $firm_ID)->
                from('Firmas');;
        //  where('parent', $parent)->
        // order_by('value', 'desc');

        $data = $query->get()->result();
        return $data;
    }

    public function product_publiced($product_ID) {
        $query = $this->db->select('Produkti_produkts_ID')->
                where('Produkti_produkts_ID', $product_ID)->
                from('Reklamejas');

        // order_by('value', 'desc');

        $data = $query->get()->num_rows();
        return $data;
    }

    public function get_product_by_ID($product_ID) {
        $query = $this->db->select('produkts_ID, nosaukums, cena, apraksts, raz_firm_ID')->
                where('produkts_ID', $product_ID)->
                from('Produkti');
        $data = $query->get()->result();
        return $data;
    }
    public function get_product_firms($product_ID) {
        $query = $this->db->select('firmas_ID')->
                where('produkts_ID', $product_ID)->
                from('Izplat_firmas');
        $data = $query->get()->result();
        return $data;
    }
    

}