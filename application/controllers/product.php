<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class product extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Product_model');
    }

    public function index() {

        $this->load->view('header');
        $data['products'] = $this->Product_model->get_all_products();
        foreach ($data['products']as $product) {
            $firm = $this->Product_model->get_firm_by_ID($product->raz_firm_ID);
            $product->raz_firm_nos = $firm[0]->nosaukums;
            $product->publiced = $this->Product_model->product_publiced($product->raz_firm_ID);
        }
        print_r($data);
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
    
    

}

?>