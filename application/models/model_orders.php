<?php
class Model_orders extends Model_template
{ 
   function __construct()
   {
       parent::__construct();              
   }
   #############################################################################
   function get_list_clients()
   {    
    $this->db->select("*");      
      $this->db->from("clients");
      $query = $this->db->get();      
      return $query->result_array();
   }
   #############################################################################
   function add_to_order_item($data)
   {
       $this->db->insert("order_items",$data);    
   }
   #############################################################################
   function add_to_order($data)
   {
       $this->db->insert("orders",$data);
       return $this->db->insert_id();    
   }
   #############################################################################
   function get_list_order_items()
   {     
      $query =$this->db->query("SELECT id_order, order_date, product_name, order_item_quantity, order_item_price 
                                FROM order_items 
                                JOIN orders ON id_order = order_id 
                                JOIN products ON id_product = product_id
                                ORDER BY id_order DESC, product_name ASC
                              ");      
      return $query->result_array();
   }
   #############################################################################
   function add_to_inventory($data)
   {
       $this->db->insert("inventories",$data);    
   }
   #############################################################################
   function get_list_inventories()
   {     
      $query = $this->db->query("(SELECT products.*, 
                                         max(inventory_date) AS inventory_last_date, 
                                         sum(inventory_quantity) AS inventory_quantity
                                 FROM products
                                 JOIN inventories
                                 ON id_product = product_id
                                 GROUP BY product_id
                                 )
                                 UNION
                                 (SELECT products.*, NULL AS inventory_last_date, 0 AS inventory_quantity 
                                 FROM products 
                                 WHERE id_product NOT IN (SELECT product_id FROM inventories ))");      
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