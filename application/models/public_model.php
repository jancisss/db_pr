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

    public function product_lv() {
        $query = $this->db->select('*')->
                from('produkti_lv');
        //  where('parent', $parent)->
        // order_by('value', 'desc');

        $data = $query->get()->result();
        return $data;
    }

    public function firm_public() {
        $query = $this->db->select('*')->
                from('firmas_reklam_reizes');
        //  where('parent', $parent)->
        // order_by('value', 'desc');

        $data = $query->get()->result();
        return $data;
    }

    public function set_group() {
        $query = " CALL set_izdevigie_clients() ";
        $result = $this->db->query($query);
        $result->result();
        return 0;
    }

    public function get_all_countries() {
        $query = $this->db->select('valsts_ID, valsts')->
                from('Valsts');
        //  where('parent', $parent)->
        // order_by('value', 'desc');

        $data = $query->get()->result();
        return $data;
    }

    public function get_all_cities() {
        $query = $this->db->select('pilseta_ID, pilseta')->
                from('Pilseta');
        //  where('parent', $parent)->
        // order_by('value', 'desc');

        $data = $query->get()->result();
        return $data;
    }

    public function save_place($cena, $adrese, $no, $lidz, $country, $city) {
        $data = array(
            'cena_diena' => $cena,
            'adrese' => $adrese,
            'no' => $no,
            'lidz' => $lidz,
            'pilseta_ID' => $country,
            'valsts_ID' => $city,
        );
        $this->db->insert('iesp_rekl_vietas', $data);
        $this->id = $this->db->insert_id();
        return $this;
    }

    public function get_place_by_ID($place_ID) {
        $query = $this->db->select('cena_diena, adrese, no, lidz, pilseta_ID, valsts_ID')->
                where('iesp_rekl_vietas_ID', $place_ID)->
                from('Iesp_rekl_vietas');

        //  where('parent', $parent)->
        // order_by('value', 'desc');

        $data = $query->get()->result();
        return $data;
    }

    public function update_place($cena, $adrese, $no, $lidz, $country, $city, $ID) {
        $data = array(
            'cena_diena' => $cena,
            'adrese' => $adrese,
            'no' => $no,
            'lidz' => $lidz,
            'pilseta_ID' => $country,
            'valsts_ID' => $city,
        );
        $this->db->where('iesp_rekl_vietas_ID', $ID);
        $this->db->update('Iesp_rekl_vietas', $data);
        // $this->id = $this->db->insert_id();
        return $this;
    }

    public function get_all_places() {
        $query = $this->db->select('I.iesp_rekl_vietas_ID, I.cena_diena, I.adrese, I.no, I.lidz, Pilseta.pilseta, Valsts.valsts, I.Reklam_reizes_ID')->
                where('Valsts.valsts_ID = I.valsts_ID')->
                where('Pilseta.pilseta_ID = I.pilseta_ID')->
                where('I.Reklam_reizes_ID IS NULL')->
                from('Iesp_rekl_vietas AS I, Pilseta, Valsts');

        $data = $query->get()->result();
        return $data;
    }
    
    

    public function get_all_persons() {
        $query = $this->db->select('personas_ID, vards, uzvards, personas_kods')->
                from('Personas');

        $data = $query->get()->result();
        return $data;
    }

    public function get_all_firms() {
        $query = $this->db->select('firmas_ID, reg_nr, nosaukums, adrese, tel_nr')->
                from('Firmas');

        $data = $query->get()->result();
        return $data;
    }

    public function save_public($cena, $firmas_firmas_ID, $pasutitaj_per_ID) {
        $data = array(
            'cena' => $cena,
            'pasutitaj_per_ID' => $pasutitaj_per_ID,
            'firmas_firmas_ID' => $firmas_firmas_ID
        );
        $this->db->insert('Reklam_reizes', $data);
        $this->id = $this->db->insert_id();
        return $this;
    }

    public function save_public_place($place_ID, $Reklam_reize) {
        $data = array(
            'Reklam_reizes_ID' => $Reklam_reize
            );

        $this->db->where('iesp_rekl_vietas_ID', $place_ID);
        $this->db->update('Iesp_rekl_vietas', $data);
        // $this->id = $this->db->insert_id();
        return $this;
    }

    public function save_public_site($Produkti_produkts_ID, $reklam_reizes_ID) {
        $data = array(
            'Produkti_produkts_ID' => $Produkti_produkts_ID,
            'reklam_reizes_ID' => $reklam_reizes_ID
        );
        $this->db->insert('Reklamejas', $data);
        $this->id = $this->db->insert_id();
        return $this;
    }
    
    
    public function get_all_persons_ag() {
        $query = $this->db->select('p.personas_ID, p.vards, p.uzvards, p.personas_kods, p.adrese, g.nosaukums')->
                from('Personas AS P, Per_grupa AS G')->
        //  where('parent', $parent)->
        // order_by('value', 'desc');
         where('P.pas_grupa_ID = G.grupa_ID');
        $data = $query->get()->result();
        return $data;
    }
    
    public function get_all_person_groups() {
        $query = $this->db->select('grupa_ID, nosaukums')->
        //  where('parent', $parent)->
        // order_by('value', 'desc');
        from('Per_grupa');
        $data = $query->get()->result();
        return $data;
    }
    
    
    
     public function save_person($vards, $uzvards, $personas_kods, $adrese, $pas_grupa_ID) {
        $data = array(
            'vards' => $vards,
            'uzvards' => $uzvards,
            'personas_kods' => $personas_kods,
            'adrese' => $adrese,
            'pas_grupa_ID' => $pas_grupa_ID
            
        );
        $this->db->insert('Personas', $data);
        $this->id = $this->db->insert_id();
        return $this;
    }
    
    
     public function get_person_by_ID($person_ID) {
        $query = $this->db->select('vards, uzvards, personas_kods, adrese, pas_grupa_ID')->
               
                where('personas_ID', $person_ID)->
                 from('Personas');

        //  where('parent', $parent)->
        // order_by('value', 'desc');

        $data = $query->get()->result();
        return $data;
    }
    
    
    
    
     public function update_person($vards, $uzvards, $personas_kods, $adrese, $pas_grupa_ID, $ID) {
        $data = array(
            'vards' => $vards,
            'uzvards' => $uzvards,
            'personas_kods' => $personas_kods,
            'adrese' => $adrese,
            'pas_grupa_ID' => $pas_grupa_ID
            
        );
        $this->db->where('paersonas_ID', $ID);
        $this->db->update('Personas', $data);
        // $this->id = $this->db->insert_id();
        return $this;
    }
    
    public function save_group($name) {
        $data = array(
            'nosaukums' => $name
           
            
        );
        $this->db->insert('Per_grupa', $data);
        $this->id = $this->db->insert_id();
        return $this;
    }
    
    
    public function get_group_by_ID($group_ID) {
        $query = $this->db->select('nosaukums')->
               
                where('grupa_ID', $group_ID)->
                 from('Per_grupa');

        //  where('parent', $parent)->
        // order_by('value', 'desc');

        $data = $query->get()->result();
        return $data;
    }
    
    
    

    
     
     public function update_group($name, $ID) {
        $data = array(
            'nosaukums' => $name
            
        );
        $this->db->where('grupa_ID', $ID);
        $this->db->update('Per_grupa', $data);
        // $this->id = $this->db->insert_id();
        return $this;
    }
}