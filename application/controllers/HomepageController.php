<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HomepageController extends CI_Controller {
    
    public function __construct() {
        parent::__construct();

    }
    
    public function index() {
    	$this->load->view("website/default/header");
        $this->load->view("website/index");
        $this->load->view("website/default/footer");
    }

    public function contactUs() {
    	// http://localhost/mano/index.php/HomepageController/contactUs
    	$this->load->view("website/contact_us/contact-us");
        $this->load->view("website/contact_us/contact-us_header");
        $this->load->view("website/contact_us/contact-us_footer");
    }

    public function aboutUs() {
    	// http://localhost/mano/index.php/HomepageController/aboutUs
    	echo "hehehe";
    }

}
