<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class product extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Product_model');
        $this->load->library('form_validation');
    }

    public function index() {

        $this->load->view('header');
        $data['products'] = $this->Product_model->get_all_products();
        foreach ($data['products']as $product) {
            $firm = $this->Product_model->get_firm_by_ID($product->raz_firm_ID);
            $product->raz_firm_nos = $firm[0]->nosaukums;
            $product->publiced = $this->Product_model->product_publiced($product->raz_firm_ID);
        }

        $this->load->view('product/index', $data); //galvenais skats
        $this->load->view('footer');
    }

    public function product($product_ID = 0) {
        if ($product_ID == 0)
            redirect('/index');
        $this->load->view('header');
        $data['product'] = $this->Product_model->get_product_by_ID($product_ID);
        $firm = $this->Product_model->get_firm_by_ID($data['product'][0]->raz_firm_ID);
        $data['product'][0]->firm_name = $firm[0]->nosaukums;
        $data['firms'] = $this->Product_model->get_product_firms($product_ID);
        $data['publiced'] = $this->Product_model->publiceted($product_ID);
        //print_r( $data['publiced']);
        foreach ($data['firms'] as $firm) {
            $firm_name = $this->Product_model->get_firm_by_ID($firm->firmas_ID);
            $firm->nosaukums = $firm_name[0]->nosaukums;
        }
        $this->load->view('product/product', $data); //galvenais skats
        $this->load->view('footer');
    }

    public function firm($firm_ID) {
        if ($firm_ID == 0)
            redirect('/index');
        $this->load->view('header');
        $data['firm'] = $this->Product_model->get_firm_by_ID($firm_ID);
        $this->load->view('firm/index', $data); //galvenais skats
        $this->load->view('footer');
    }
    
       public function all_firms() {

        $this->load->view('header');
        $data['firms'] = $this->Product_model->get_all_firms();
       

        $this->load->view('product/all_firms', $data); //galvenais skats
        $this->load->view('footer');
    }

    public function add_firm() {

        $this->load->view('header');


        $data['firm']->reg_nr = '';
        $data['firm']->nosaukums = '';
        $data['firm']->adrese = '';
        $data['firm']->tel_nr = '';

        $this->load->view('/product/add_firm', $data);
        $this->load->view('footer');
    }

    public function take_add_firm() {

        //svae product
        $ID = $this->Product_model->save_firm($this->input->post('reg_nr'), $this->input->post('nosaukums'), $this->input->post('adrese'), $this->input->post('tel_nr'));
        //save izpaltītājfirmas


        redirect("/Product/firm/$ID->id");
    }

    public function edit_firm($firm_ID) {

        $this->load->view('header');

        $firm = $this->Product_model->get_firm_by_ID($firm_ID);
        $data['firm']->reg_nr = $firm[0]->reg_nr;
        $data['firm']->nosaukums = $firm[0]->nosaukums;
        $data['firm']->adrese = $firm[0]->adrese;
        $data['firm']->tel_nr = $firm[0]->tel_nr;
        $data['firm']->ID = $firm_ID;

        $this->load->view('/product/edit_firm', $data);
        $this->load->view('footer');
    }

    public function take_edit_firm() {

        //svae product
        $this->Product_model->update_firm($this->input->post('reg_nr'), $this->input->post('nosaukums'), $this->input->post('adrese'), $this->input->post('tel_nr'), $this->input->post('ID'));
        //save izpaltītājfirmas
        $ID = $this->input->post('ID');

        redirect("/Product/firm/$ID");
    }

    public function add_product() {

        $this->load->view('header');


        $data['product']->nosaukums = '';
        $data['product']->cena = '';
        $data['product']->apraksts = '';
        $data['firms'] = $this->Product_model->get_all_firms();
        foreach ($data['firms'] as $firm) {
            $firm->checked = FALSE;
            $firm_array[$firm->firmas_ID] = $firm->nosaukums;
        }
        $data['defult_firm'] = 0;
        $categories_array[0] = 'Izvēlieties vienu';
        $data['firm_drop'] = $firm_array;
        $this->load->view('/product/add', $data);
        $this->load->view('footer');
    }

    public function takeadd() {


        //Ievadlauku nosacÄ«jumi
        $this->form_validation->set_rules('nosaukums', 'Nosaukums', 'trim|required|min_length[5]|max_length[255]|xss_clean');
        $this->form_validation->set_rules('apraksts', 'Raksts', 'trim|required|xss_clean');
        //Visas kategorijas
        $data['firms'] = $this->Product_model->get_all_firms();
        print_r($data['firms']);
        $data['yes_firms'] = FALSE; //KarodziÅ†Å�, ka nav neviena atzÄ«mÄ“ta
        foreach ($data['firms'] as $firm) {
            if ($this->input->post('firm_' . $firm->firmas_ID)) {//ja atzÄ«mÄ“ta kÄ�da kategorija
                $data['yes_category'] = TRUE; //pazÄ«me ka kÄ�da no kategorijÄ�m ir atdzÄ«mÄ“ta          
                $firm->checked = TRUE; //AtzÄ«me, ka Å�Ä« kategorija bija atÄ·eksÄ“ta
            }
            else
                $firm->checked = FALSE; //AtzÄ«me, ka Å�Ä« kategorija nebija atÄ·eksÄ“ta
        }


        //Ja nav izpildÄ«juÅ�ies ievadlauku nosacÄ«jumu , atzÄ«mÄ“ta kaut viena kategorija
        if ($this->form_validation->run() == FALSE || $data['yes_category'] == FALSE) {



            $this->load->view('header');


            $data['product']->nosaukums = $this->input->post('nosaukums');
            $data['product']->apraksts = $this->input->post('apraksts');
            $data['product']->cena = $this->input->post('cena');

            $this->load->view('/product/add', $data);
            $this->load->view('footer');
        } else {

            //svae product
            $product_ID = $this->Product_model->save_product($this->input->post('nosaukums'), $this->input->post('cena'), nl2br($this->input->post('apraksts')), $this->input->post('r_firm'));
            //save izpaltītājfirmas
            foreach ($data['firms'] as $firm) {
                if ($firm->checked == TRUE) {
                    $this->Product_model->save_izplat_firm($product_ID->id, $firm->firmas_ID); //SaglabÄ�ju atzÄ«mÄ“tÄ�s kategorijas
                } //Visas atzÄ«mÄ“tÄ�s kategorijas
            }
        }
        redirect("Product");
    }

    public function edit_p($product_ID = 0) {
        if ($product_ID == 0)
            redirect('Products');
        $data['product_i'] = $this->Product_model->get_product_by_ID($product_ID);
        $this->load->view('header');
        //print_r($data['product_i']);
        $data['product']->product_ID = $data['product_i'][0]->produkts_ID;
        $data['product']->nosaukums = $data['product_i'][0]->nosaukums;
        $data['product']->cena = $data['product_i'][0]->cena;
        $data['product']->apraksts = $data['product_i'][0]->apraksts;
        $data['firms'] = $this->Product_model->get_all_firms();
        foreach ($data['firms'] as $firm) {
            $firm->checked = FALSE;
            $firm_array[$firm->firmas_ID] = $firm->nosaukums;
        }

        $data['defult_firm'] = $data['product_i'][0]->raz_firm_ID;
        $categories_array[0] = 'Izvēlieties vienu';
        $data['firm_drop'] = $firm_array;
        $this->load->view('/product/edit_p', $data);
        $this->load->view('footer');
    }

    public function takeedit() {


        //Ievadlauku nosacÄ«jumi
        $this->form_validation->set_rules('nosaukums', 'Nosaukums', 'trim|required|min_length[5]|max_length[255]|xss_clean');
        $this->form_validation->set_rules('apraksts', 'Raksts', 'trim|required|xss_clean');
        //Visas kategorijas
        $data['firms'] = $this->Product_model->get_all_firms();
        print_r($data['firms']);
        $data['yes_firms'] = FALSE; //KarodziÅ†Å�, ka nav neviena atzÄ«mÄ“ta
        foreach ($data['firms'] as $firm) {
            if ($this->input->post('firm_' . $firm->firmas_ID)) {//ja atzÄ«mÄ“ta kÄ�da kategorija
                $data['yes_category'] = TRUE; //pazÄ«me ka kÄ�da no kategorijÄ�m ir atdzÄ«mÄ“ta          
                $firm->checked = TRUE; //AtzÄ«me, ka Å�Ä« kategorija bija atÄ·eksÄ“ta
            }
            else
                $firm->checked = FALSE; //AtzÄ«me, ka Å�Ä« kategorija nebija atÄ·eksÄ“ta
        }


        //Ja nav izpildÄ«juÅ�ies ievadlauku nosacÄ«jumu , atzÄ«mÄ“ta kaut viena kategorija
        if ($this->form_validation->run() == FALSE || $data['yes_category'] == FALSE) {



            $this->load->view('header');


            $data['product']->nosaukums = $this->input->post('nosaukums');
            $data['product']->apraksts = $this->input->post('apraksts');
            $data['product']->cena = $this->input->post('cena');

            $this->load->view('/product/add', $data);
            $this->load->view('footer');
        } else {

            //update product
            $this->Product_model->update_product($this->input->post('nosaukums'), $this->input->post('cena'), nl2br($this->input->post('apraksts')), $this->input->post('r_firm'), $this->input->post('product_ID'));
            //save izpaltītājfirmas
            foreach ($data['firms'] as $firm) {
                if ($firm->checked == TRUE) {
                    if ($this->Product_model->check_site($this->input->post('product_ID'), $firm->firmas_ID) == null)
                        $this->Product_model->save_izplat_firm($this->input->post('product_ID'), $firm->firmas_ID); //SaglabÄ�ju atzÄ«mÄ“tÄ�s kategorijas
                } //Visas atzÄ«mÄ“tÄ�s kategorijas
            }
        }
        redirect("Product");
    }
    
    
    public function delete_person($ID){
         $this->Product_model->delete_person($ID);
         redirect("/Products_public/all_persons");
    }
    
     public function delete_product($ID){
         $this->Product_model->delete_product($ID);
         redirect("/product");
    }
    
     public function delete_firm($ID){
         $this->Product_model->delete_firm($ID);
         redirect("/Product/all_firms");
    }
    
     public function delete_group($ID){
         $this->Product_model->delete_group($ID);
         redirect("/Product/all_firms");
    }

}

?>