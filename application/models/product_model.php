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

    public function get_all_firms() {
        $query = $this->db->select('firmas_ID, reg_nr, nosaukums, adrese, tel_nr')->
                from('Firmas');
        //  where('parent', $parent)->
        // order_by('value', 'desc');

        $data = $query->get()->result();
        return $data;
    }

    public function get_firm_by_ID($firm_ID) {
        $query = $this->db->select('firmas_ID, reg_nr, nosaukums, adrese, tel_nr')->
                where('firmas_ID', $firm_ID)->
                from('Firmas');
        ;
        //  where('parent', $parent)->
        // order_by('value', 'desc');

        $data = $query->get()->result();
        return $data;
    }

    public function product_publiced($product_ID) {
        $query = $this->db->select('count(RR.Reklam_reizes_ID)')->
                where('produkts_ID', $product_ID)->
                where('R.Produkti_produkts_ID = R.reklam_reizes_ID')->
                where('R.reklam_reizes_ID = RR.Reklam_reizes_ID')->
                group_by('RR.Reklam_reizes_ID')->
                from('Reklam_reizes as RR, Reklamejas AS R, Produkti AS P');


        //  where('parent', $parent)->
        // order_by('value', 'desc');

        $data = $query->get()->result();
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

    public function publiceted($product_ID) {
        $query = $this->db->select('RR.reklam_reizes_ID, RR.Cena, RR.pasutitaj_per_ID, RR.firmas_firmas_ID, IRV.no, IRV.lidz, Pilseta.pilseta, Valsts.valsts')->
                from('Reklam_reizes AS RR, Reklamejas AS R, Iesp_rekl_vietas AS IRV, Valsts, Pilseta')->
                where('R.Produkti_produkts_ID', $product_ID)->
                where('RR.reklam_reizes_ID = R.reklam_reizes_ID')->
                where('Valsts.valsts_ID = IRV.valsts_ID')->
                where('Pilseta.pilseta_ID = IRV.pilseta_ID')->
                where('IRV.Reklam_reizes_ID = RR.Reklam_reizes_ID');
        $data = $query->get()->result();

        return $data;
    }

    public function save_product($nosaukums, $cena, $aparksts, $raz_firm) {
        $data = array(
            'nosaukums' => $nosaukums,
            'apraksts' => $aparksts,
            'raz_firm_ID' => $raz_firm,
            'cena' => $cena
        );
        $this->db->insert('Produkti', $data);
        $this->id = $this->db->insert_id();
        return $this;
    }

    public function save_izplat_firm($product_ID, $firm_ID) {
        $data = array(
            'produkts_ID' => $product_ID,
            'firmas_ID' => $firm_ID
        );
        $this->db->insert('Izplat_firmas', $data);
    }

    public function update_product($nosaukums, $cena, $aparksts, $raz_firm, $ID) {
        $data = array(
            'nosaukums' => $nosaukums,
            'apraksts' => $aparksts,
            'raz_firm_ID' => $raz_firm,
            'cena' => $cena
        );
        $this->db->where('produkts_ID', $ID);
        $this->db->update('Produkti', $data);
        // $this->id = $this->db->insert_id();
        return $this;
    }

    public function check_site($product_ID, $firmas_ID) {
        $query = $this->db->select('firmas_ID')->
                where('produkts_ID', $product_ID)->
                where('firmas_ID', $firmas_ID)->
                from('Izplat_firmas');
        $data = $query->get()->result();
        return $data;
    }

    public function save_firm($reg_nr, $nosaukums, $adrese, $tel_nr) {
        $data = array(
            'reg_nr' => $reg_nr,
            'nosaukums' => $nosaukums,
            'adrese' => $adrese,
            'tel_nr' => $tel_nr
        );
        $this->db->insert('Firmas', $data);
        $this->id = $this->db->insert_id();
        return $this;
    }

    public function update_firm($reg_nr, $nosaukums, $adrese, $tel_nr, $ID) {
        $data = array(
            'reg_nr' => $reg_nr,
            'nosaukums' => $nosaukums,
            'adrese' => $adrese,
            'tel_nr' => $tel_nr
        );
        $this->db->where('firmas_ID', $ID);
        $this->db->update('Firmas', $data);
        // $this->id = $this->db->insert_id();
        return $this;
    }

    public function delete_person($person_ID = 0) {
        $this->db->delete('Personas', array('personas_ID' => $person_ID));
    }
    
    public function delete_product($product_ID = 0) {
        $this->db->delete('Produkti', array('produkts_ID' => $product_ID));
    }
    
     public function delete_firm($firm_ID = 0) {
        $this->db->delete('Firmas', array('firmas_ID' => $firm_ID));
    }
    
     public function delete_group($group_ID = 0) {
        $this->db->delete('Per_grupa', array('grupa_ID' => $group_ID));
    }

}