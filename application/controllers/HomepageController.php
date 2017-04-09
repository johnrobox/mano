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
        $this->load->view("website/contact_us/contact-us_header");
        $this->load->view("website/contact_us/contact-us");
        $this->load->view("website/contact_us/contact-us_footer");
    }

    public function aboutUs() {
    	// http://localhost/mano/index.php/HomepageController/aboutUs
        $this->load->view("website/about_us/about-us_header");
        $this->load->view("website/about_us/about-us");
        $this->load->view("website/about_us/about-us_footer");
    }

    public function paints() {
        //http://localhost/mano/index.php/HomepageController/paints
        $this->load->view("website/paints/paints_header");
        $this->load->view("website/paints/paints");
        $this->load->view("website/paints/paints_footer");
        
    }

    public function buildingmaterials() {
        //http://localhost/mano/index.php/HomepageController/buildingmaterials
        $this->load->view("website/Building Materials/buildingmaterials_header");
        $this->load->view("website/Building Materials/buildingmaterials");
        $this->load->view("website/Building Materials/buildingmaterials_footer");
        
    }

    public function plumbing() {
        //http://localhost/mano/index.php/HomepageController/plumbing
        $this->load->view("website/plumbing/plumbing_header");
        $this->load->view("website/plumbing/plumbing");
        $this->load->view("website/plumbing/plumbing_footer");
        
    }

    public function electrical() {
        //http://localhost/mano/index.php/HomepageController/electrical
        $this->load->view("website/electrical/electrical_header");
        $this->load->view("website/electrical/electrical");
        $this->load->view("website/electrical/electrical_footer");
        
    }

}
