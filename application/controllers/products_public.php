<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Products_public extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Public_model');
        $this->load->library('form_validation');
    }

    public function index() {

        $this->load->view('header');
        $data['publiced'] = $this->Public_model->product_publiced_place();
       //print_r( $data['products']);

        $this->load->view('public/index', $data); //galvenais skats
        $this->load->view('footer');
    }

  
    

}

?>