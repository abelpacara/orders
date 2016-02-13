<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Orders extends CI_Controller 
{
	 public function __construct()
    {
        parent::__construct();
        
        $this->load->helper(array('form', 'url'));

        $this->load->model('model_orders');  
        $this->load->library('session');  
    }   




   #############################################################################
	public function add_product_json()
	{

			$product_data ['product_code'] = $_REQUEST['product_code'];
			$product_data ['product_name'] = $_REQUEST['product_name'];
			$product_data ['product_description'] = $_REQUEST['product_description'];


	/*		$product_data ['product_code'] = "44ADF";
			$product_data ['product_name'] = "CONTROLLER";
			$product_data ['product_description'] = "LOCALHOST LOREM IPSUM";
*/

			$path = getcwd()."/PRODUTS.txt";

			echo $path;

			print_r($product_data);

			file_put_contents($path, $product_data, FILE_APPEND);
	}


   #############################################################################
	public function index()
	{
		$this->load->view('products/welcome_message');
	}
   #############################################################################
	public function test_bootstrap()
	{
		$this->load->view('products/test_bootstrap');
	}
	#############################################################################
	public function view_orders_service()
	{
		$list_order_items = $this->model_orders->get_list_order_items();
		echo json_encode($list_order_items);		
	}
	#############################################################################
	public function show_orders()
	{
		$view_data['list_order_items'] = $this->model_orders->get_list_order_items();
		$this->load->view('products/show_orders', $view_data);
	}
	#############################################################################
	public function add_to_order()
	{
		$id_order = NULL;
		if(isset($_REQUEST['btn_save']))
		{
			if(isset($_REQUEST["id_order"]) AND strcasecmp($_REQUEST["id_order"],"")!=0)
			{				
				$id_order = $this->session->userdata("id_order");			
			}
			else
			{
				$order_data['client_id'] = NULL;
				$id_order = $this->model_orders->add_to_order($order_data);
				$this->session->set_userdata("id_order", $id_order);	
			}	
		}		

		$view_data['id_order'] = $id_order;

		if(isset($_REQUEST["availables_maximum"])>0)
		{
			for($i=0; $i<$_REQUEST["availables_maximum"]; $i++)
			{				
				if(isset($_REQUEST['order_item_quantity_'.$i]) AND $_REQUEST['order_item_quantity_'.$i]>0)
				{
					echo "**** ".$_REQUEST['order_item_quantity_'.$i]." <br>";

					$order_item_data['product_id'] = $_REQUEST['product_id_'.$i];
					$order_item_data['order_item_quantity'] = $_REQUEST['order_item_quantity_'.$i];
					$order_item_data['order_id'] = $id_order;

					$this->model_orders->add_to_order_item($order_item_data);					
				}
			}
		}

		$view_data['list_clients'] = $this->model_orders->get_list_clients();		
		$view_data['list_inventories'] = $this->model_orders->get_list_inventories();

		$this->load->view('products/add_to_order', $view_data);
	}
	#############################################################################
	public function add_to_inventory()
	{
		if(isset($_REQUEST["availables_maximum"])>0)
		{
			for($i=0; $i<$_REQUEST["availables_maximum"]; $i++)
			{		

				echo "VALUE product_id= ".$_REQUEST['product_id_'.$i]." inventory_quantity = ".$_REQUEST['inventory_quantity_'.$i];

				if(isset($_REQUEST['inventory_quantity_'.$i]) AND $_REQUEST['inventory_quantity_'.$i]>0)
				{
					$inventory_data['product_id'] = $_REQUEST['product_id_'.$i];
					$inventory_data['inventory_quantity'] = $_REQUEST['inventory_quantity_'.$i];
					$this->model_orders->add_to_inventory($inventory_data);	


				}
			}
		}

		$view_data['list_inventories'] = $this->model_orders->get_list_inventories();
		$this->load->view('products/add_to_inventory', $view_data);
	}
	#############################################################################
	public function add_product()
	{

		if(isset($_REQUEST["product_code"]))
		{
			$product_data ['product_code'] = $_REQUEST['product_code'];
			$product_data ['product_name'] = $_REQUEST['product_name'];
			$product_data ['product_description'] = $_REQUEST['product_description'];

			$this->model_orders->add_product($product_data);
		}

	}

	#############################################################################
	public function add_product_web()
	{
		$this->add_product();

		$view_data['list_products'] = $this->model_orders->get_list_products();
		$this->load->view('template/header');
		$this->load->view('products/add_product', $view_data);
		$this->load->view('template/footer');
	}
}
