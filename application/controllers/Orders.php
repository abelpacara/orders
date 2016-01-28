<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Orders extends CI_Controller 
{
	 public function __construct()
    {
        parent::__construct();
        $this->load->helper('form'); 
        $this->load->model('model_orders');    
    }   

	public function index()
	{
		$this->load->view('products/welcome_message');
	}
	public function add_product()
	{

		if(isset($_REQUEST["product_code"]))
		{
			$product_data ['product_code'] = $_REQUEST['product_code'];
			$product_data ['product_name'] = $_REQUEST['product_name'];
			$product_data ['product_description'] = $_REQUEST['product_description'];

			$this->model_orders->add_product($product_data);
		}

		$view_data['list_products'] = $this->model_orders->get_list_products();
		$this->load->view('products/add_product', $view_data);
	}
	public function add_to_inventory()
	{
		if(isset($_REQUEST["availables_maximum"])>0)
		{
			for($i=0; $i<$_REQUEST["availables_maximum"]; $i++)
			{				
				if(isset($_REQUEST['inventory_quantity_'.$i]) AND $_REQUEST['inventory_quantity_'.$i]>0)
				{
					$inventory_data['product_id'] = $_REQUEST['id_product_'.$i];
					$inventory_data['inventory_quantity'] = $_REQUEST['inventory_quantity_'.$i];
					$this->model_orders->add_to_inventory($inventory_data);					
				}
			}
		}

		$view_data['list_inventory'] = $this->model_orders->get_list_inventory();
		$this->load->view('products/add_to_inventory', $view_data);
	}

}
