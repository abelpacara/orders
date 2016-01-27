<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Orders extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	 public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');     
    }   

	public function index()
	{
		$this->load->view('products/welcome_message');
	}
	public function add_product()
	{
		$list_products = array(array("product_code"=>"22A","product_name"=>"DISCO DURO SAMSUNG EXTERNO","product_description"=>"lorem ipsum"));

		$view_data['list_products'] = $list_products;
		
		$this->load->view('products/add_product', $view_data);
	}
}
