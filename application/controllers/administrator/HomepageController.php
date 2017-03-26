<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HomepageController extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function index() {
        echo "this is administrator homepage";
    }
}
