<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Products_public extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Public_model');
        $this->load->model('Product_model');
        $this->load->library('form_validation');
    }

    public function index() {

        $this->load->view('header');
        $data['publiced'] = $this->Public_model->product_publiced_place();
        //print_r( $data['products']);

        $this->load->view('public/index', $data); //galvenais skats
        $this->load->view('footer');
    }

    public function lv_publiced() {

        $this->load->view('header');
        $data['lv_publiced'] = $this->Public_model->product_lv();
        // print_r( $data['lv_publiced']);

        $this->load->view('public/lv_publiced', $data); //galvenais skats
        $this->load->view('footer');
    }

    public function firm_public() {

        $this->load->view('header');
        $data['f_publiced'] = $this->Public_model->firm_public();
        //print_r( $data['f_publiced']);

        $this->load->view('public/firm_public', $data); //galvenais skats
        $this->load->view('footer');
    }

    public function set_client_group() {


        $this->Public_model->set_group();
        redirect('/Products_public');
    }

    public function i_add() {

        $this->load->view('header');


        $data['place']->cena_diena = '';
        $data['place']->adrese = '';
        $data['place']->no = '';
        $data['place']->lidz = '';
        $data['countries'] = $this->Public_model->get_all_countries();
        $data['cities'] = $this->Public_model->get_all_cities();


        foreach ($data['cities'] as $city) {
            $city->checked = FALSE;
            $city_array[$city->pilseta_ID] = $city->pilseta;
        }
        $data['defult_city'] = 0;
        $city_array[0] = 'Izvēlieties vienu';
        $data['city_drop'] = $city_array;

        foreach ($data['countries'] as $country) {
            $country->checked = FALSE;
            $country_array[$country->valsts_ID] = $country->valsts;
        }

        $data['defult_country'] = 0;
        $country_array[0] = 'Izvēlieties vienu';
        $data['country_drop'] = $country_array;
        $this->load->view('/public/i_add', $data);
        $this->load->view('footer');
    }

    public function takeadd() {




        //svae product
        $this->Public_model->save_place($this->input->post('cena'), $this->input->post('adrese'), $this->input->post('no'), $this->input->post('lidz'), $this->input->post('country'), $this->input->post('city'));
        //save izpaltītājfirmas


        redirect("Products_public");
    }

    public function i_edit($place_ID = 0) {
        if ($place_ID == 0)
            redirect('Products_public');
        $this->load->view('header');

        $place = $this->Public_model->get_place_by_ID($place_ID);

        $data['place']->Reklam_reizes_ID = $place_ID;
        $data['place']->cena_diena = $place[0]->cena_diena;
        $data['place']->adrese = $place[0]->adrese;
        $data['place']->no = $place[0]->no;
        $data['place']->lidz = $place[0]->lidz;
        $data['countries'] = $this->Public_model->get_all_countries();
        $data['cities'] = $this->Public_model->get_all_cities();


        foreach ($data['cities'] as $city) {
            $city->checked = FALSE;
            $city_array[$city->pilseta_ID] = $city->pilseta;
        }

        $data['defult_city'] = $place[0]->pilseta_ID;
        $city_array[0] = 'Izvēlieties vienu';
        $data['city_drop'] = $city_array;

        foreach ($data['countries'] as $country) {
            $country->checked = FALSE;
            $country_array[$country->valsts_ID] = $country->valsts;
        }

        $data['defult_country'] = $place[0]->valsts_ID;
        $country_array[0] = 'Izvēlieties vienu';
        $data['country_drop'] = $country_array;
        $this->load->view('/public/i_edit', $data);
        $this->load->view('footer');
    }

    public function takei_edit() {

        $this->Public_model->update_place($this->input->post('cena'), $this->input->post('adrese'), $this->input->post('no'), $this->input->post('lidz'), $this->input->post('country'), $this->input->post('city'), $this->input->post('ID'));
        //save izpaltītājfirmas
        redirect("Products_public/places");
    }

    public function places() {

        $this->load->view('header');
        $data['places'] = $this->Public_model->get_all_places();
        //print_r( $data['places']);

        $this->load->view('public/places', $data); //galvenais skats
        $this->load->view('footer');
    }

    public function add() {

        $this->load->view('header');



        $data['public']->cena = '';
        $data['public']->produkts_ID = '';
        $data['public']->ID = '';
        //Pasūtītajs persona
        $data['persons'] = $this->Public_model->get_all_persons();
        foreach ($data['persons'] as $person) {
            $person->checked = FALSE;
            $person_array[$person->personas_ID] = $person->vards . ' ' . $person->uzvards . ' ' . $person->personas_kods;
        }

        $data['defult_person'] = 0;
        $person_array[0] = 'Izvēlieties vienu';
        $data['person_drop'] = $person_array;
        //pasūtīt'ājs firma
        $data['firms'] = $this->Public_model->get_all_firms();
        foreach ($data['firms'] as $firm) {
            $firm->checked = FALSE;
            $firm_array[$firm->firmas_ID] = $firm->nosaukums . '    ' . $firm->reg_nr;
        }

        $data['defult_firm'] = 0;
        $firm_array[0] = 'Izvēlieties vienu';
        $data['firm_drop'] = $firm_array;

        $data['places'] = $this->Public_model->get_all_places();
        foreach ($data['places'] as $place) {
            $place->checked = FALSE;
            $place_array[$place->iesp_rekl_vietas_ID] = $place->valsts . ' ' . $place->pilseta . '  ' . $place->adrese;
        }

        $data['defult_place'] = 0;
        $place_array[0] = 'Izvēlieties vienu';
        $data['place_drop'] = $place_array;


        $data['products'] = $this->Product_model->get_all_products();
        //print_r($data['products']);
        foreach ($data['products'] as $product) {
            $product->checked = FALSE;
            $product_array[$product->produkts_ID] = $product->nosaukums;
        }

        $data['defult_product'] = 0;
        $product_array[0] = 'Izvēlieties vienu';
        $data['product_drop'] = $product_array;

        $this->load->view('/public/add', $data);
        $this->load->view('footer');
    }

    public function takeplace_add() {




        //svae product
        $place_ID = $this->Public_model->save_public($this->input->post('cena'), $this->input->post('firm'), $this->input->post('person'), $this->input->post('place'));
        //save izpaltītājfirmas

        $this->Public_model->save_public_place($this->input->post('produkts_ID'), $place_ID[0]->Reklam_reizes_ID);
        $this->Public_model->save_public_site($this->input->post('produkts_ID'), $place_ID[0]->Reklam_reizes_ID);
        echo$place_ID[0]->Reklam_reizes_ID;
        //print_r($place_ID);
        redirect("Products_public");
    }
    
    
    
       public function takeplace_edit() {




        //svae product
        $this->Public_model->update_public($this->input->post('cena'), $this->input->post('firm'), $this->input->post('person'), $this->input->post('place'), $this->input->post('ID'));
        //save izpaltītājfirmas

        $this->Public_model->save_public_place($this->input->post('produkts_ID'), $this->input->post('ID'));
        $this->Public_model->upadte_public_site($this->input->post('produkts_ID'),  $this->input->post('ID'));
        //echo$place_ID[0]->Reklam_reizes_ID;
        //print_r($place_ID);
        redirect("Products_public");
    }

    

    public function edit($ID) {

        $this->load->view('header');




        $public = $this->Public_model->get_public_by_ID($ID);
        Print_r($public);
        $data['public']->cena = $public[0]->Cena;
        $data['public']->ID = $ID;
        $data['public']->produkts_ID = '';
        //Pasūtītajs persona
        $data['persons'] = $this->Public_model->get_all_persons();
        foreach ($data['persons'] as $person) {
            $person->checked = FALSE;
            $person_array[$person->personas_ID] = $person->vards . ' ' . $person->uzvards . ' ' . $person->personas_kods;
        }

        $data['defult_person'] = $public[0]->pasutitaj_per_ID;
        $person_array[0] = 'Izvēlieties vienu';
        $data['person_drop'] = $person_array;
        //pasūtīt'ājs firma
        $data['firms'] = $this->Public_model->get_all_firms();
        foreach ($data['firms'] as $firm) {
            $firm->checked = FALSE;
            $firm_array[$firm->firmas_ID] = $firm->nosaukums . '    ' . $firm->reg_nr;
        }

        $data['defult_firm'] = $public[0]->firmas_firmas_ID;
        $firm_array[0] = 'Izvēlieties vienu';
        $data['firm_drop'] = $firm_array;

        $data['places_S'] = $this->Public_model->get_all_places();
        foreach ($data['places_S'] as $place_S) {
            $place_S->checked = FALSE;
            $place_array[$place_S->iesp_rekl_vietas_ID] = $place_S->valsts . ' ' . $place_S->pilseta . '  ' . $place_S->adrese;
        }

        $data['defult_place'] = $public[0]->iesp_rekl_vietas_ID;
        $place_array[0] = 'Izvēlieties vienu';
        $data['place_drop'] = $place_array;


        $data['products'] = $this->Product_model->get_all_products();
        //print_r($data['products']);
        foreach ($data['products'] as $product) {
            $product->checked = FALSE;
            $product_array[$product->produkts_ID] = $product->nosaukums;
        }

        $data['defult_product'] = $public[0]->produkts_ID;
        $product_array[0] = 'Izvēlieties vienu';
        $data['product_drop'] = $product_array;

        $this->load->view('/public/add', $data);
        $this->load->view('footer');
    }

    public function all_persons() {

        $this->load->view('header');
        $data['persons'] = $this->Public_model->get_all_persons_ag();
        //print_r( $data['products']);

        $this->load->view('public/all_persons', $data); //galvenais skats
        $this->load->view('footer');
    }

    public function person_add() {

        $this->load->view('header');

        //print_r( $data['products']);

        $data['person']->vards = '';
        $data['person']->uzvards = '';
        $data['person']->personas_kods = '';
        $data['person']->adrese = '';

        $data['groups'] = $this->Public_model->get_all_person_groups();
        foreach ($data['groups'] as $group) {
            $group->checked = FALSE;
            $group_array[$group->grupa_ID] = $group->nosaukums;
        }

        $data['defult_group'] = 0;
        $group_array[0] = 'Izvēlieties vienu';
        $data['group_drop'] = $group_array;
        $this->load->view('public/add_person', $data); //galvenais skats
        $this->load->view('footer');
    }

    public function take_person_add() {




        //svae product
        $this->Public_model->save_person($this->input->post('vards'), $this->input->post('uzvards'), $this->input->post('per_kods'), $this->input->post('adrese'), $this->input->post('group'));
        //save izpaltītājfirmas


        redirect("/Products_public/all_persons");
    }

    public function person_edit($person_ID) {

        $this->load->view('header');




        $pesron = $this->Public_model->get_person_by_ID($person_ID);
        // print_r( $pesron);
        $data['person']->person_ID = $person_ID;
        $data['person']->vards = $pesron[0]->vards;
        $data['person']->uzvards = $pesron[0]->uzvards;
        $data['person']->personas_kods = $pesron[0]->personas_kods;
        $data['person']->adrese = $pesron[0]->adrese;

        $data['groups'] = $this->Public_model->get_all_person_groups();
        foreach ($data['groups'] as $group) {
            $group->checked = FALSE;
            $group_array[$group->grupa_ID] = $group->nosaukums;
        }

        $data['defult_group'] = $pesron[0]->pas_grupa_ID;
        $group_array[0] = 'Izvēlieties vienu';
        $data['group_drop'] = $group_array;
        $this->load->view('public/add_person', $data); //galvenais skats
        $this->load->view('footer');
    }

    public function take_person_edit() {




        //svae product
        $this->Public_model->update_person($this->input->post('vards'), $this->input->post('uzvards'), $this->input->post('per_kods'), $this->input->post('adrese'), $this->input->post('group'), $this->input->post('ID'));
        //save izpaltītājfirmas


        redirect("/Products_public/all_persons");
    }

    public function add_person_group() {

        $this->load->view('header');

        //print_r( $data['products']);

        $data['group']->nosaukums = '';


        $this->load->view('public/add_person_group', $data); //galvenais skats
        $this->load->view('footer');
    }

    public function take_add_person_group() {
        //svae product
        $this->Public_model->save_group($this->input->post('name'));
        //save izpaltītājfirmas


        redirect("/Products_public/all_persons");
    }

    public function edit_person_group($group_ID) {

        $this->load->view('header');

        $group = $this->Public_model->get_group_by_ID($group_ID);
        //print_r( $data['products']);

        $data['group']->nosaukums = $group[0]->nosaukums;
        $data['group']->ID = $group_ID;


        $this->load->view('public/edit_person_group', $data); //galvenais skats
        $this->load->view('footer');
    }

    public function take_edit_person_group() {




        //svae product
        $this->Public_model->update_group($this->input->post('name'), $this->input->post('ID'));
        //save izpaltītājfirmas


        redirect("/Products_public/all_persons");
    }

}

?>