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

    public function add_product() {

        $this->load->view('header');


        $data['product']->nosaukums = '';
        $data['product']->cena = '';
        $data['product']->apraksts = '';
        $data['firms'] = $this->Product_model->get_all_firms();
        foreach ($data['firms'] as $firm) {
            $firm->checked = FALSE;
        }
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

            //regard_ID->id norÄ�da uz tikko sagalbÄ�to ierastu
            $product_ID = $this->Product_model->save_product($this->input->post('nosaukums'), $this->input->post('cena'), nl2br($this->input->post('apraksts')), 3);

            foreach ($data['firms'] as $firm) {
                if ($firm->checked == TRUE) {
                    
                } //Visas atzÄ«mÄ“tÄ�s kategorijas
                $this->Product_model->save_izplat_firm($product_ID->id, $firm->firmas_ID); //SaglabÄ�ju atzÄ«mÄ“tÄ�s kategorijas
            }
        }
        redirect("Product");
    }

}

?>