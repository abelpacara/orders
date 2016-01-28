<?php
class Model_orders extends Model_template
{ 
   function __construct()
   {
       parent::__construct();              
   }
   #############################################################################
   function add_to_inventory($data)
   {
       $this->db->insert("inventory",$data);    
   }
   #############################################################################
   function get_list_inventory()
   {     
      $query = $this->db->query("(SELECT products.*, 
                                         max(inventory_register_date) AS inventory_last_date, 
                                         sum(inventory_quantity) AS inventory_quantity
                                 FROM products
                                 JOIN inventory
                                 ON id_product = product_id
                                 GROUP BY product_id
                                 )
                                 UNION
                                 (SELECT products.*, NULL AS inventory_last_date, 0 AS inventory_quantity 
                                 FROM products 
                                 WHERE id_product NOT IN (SELECT product_id FROM inventory ))");      
      return $query->result_array();
   }
   #############################################################################
   function get_list_products()
   {   	
   	$this->db->select("*");      
      $this->db->from("products");
      $query = $this->db->get();      
      return $query->result_array();
   }
	#############################################################################
   function add_product($data)
   {
      $this->db->insert("products",$data);
   }



}