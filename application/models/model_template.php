<?php
class Model_Template extends CI_Model
{ 
   function __construct()
   {
       parent::__construct();       
       $this->db->query("SET SESSION time_zone='-4:00'");
   }
   
 
   #############################################################################
   function get_list_table_enum_column_values($table, $column)
   {
      $query = $this->db->query("show columns from ".$table." LIKE '".$column."';");
      $row = $query->row_array();
      $array_values= explode(",", str_replace("'", "", substr($row['Type'], 5, (strlen($row['Type'])-6))));      
      
      return $array_values;
   }
   #############################################################################
   function get_system_time()
   {
      $query = $this->db->query("SELECT now() AS date_ts_now;");
      $date_now = $query->row_array();

      return $date_now['date_ts_now'];
   }
   #############################################################################
   function get_id_selectable_by($table_name, $var_name, $value, $sub_group=null)
   {
      /*
      $trace_exception = new Exception();
      $trace = $trace_exception->getTrace();
      $last_call = $trace[ 1 ];
      echo "<br><pre>";
      print_r( $last_call );
      echo "</pre><BR>";
      */
      
      $this->db->select(" 
                 id,
                 value_select,
                 table_name,
                 var_name,
                 order_by");
      
      $this->db->from("selectables");
      $this->db->where("LOWER(table_name)",strtolower($table_name));      
      $this->db->where("LOWER(var_name)", strtolower($var_name));            
      $this->db->where("LOWER(value_select)",strtolower($value));      
      
      if(isset($sub_group) AND strcasecmp( $sub_group,"")!=0)
      {
         $this->db->where("LOWER(sub_group)", strtolower($sub_group));      
      }      
      $this->db->limit(1);      
      $query = $this->db->get();            
      $row = $query->row_array();      
      
      return $row['id'];
   }
   #############################################################################
   function get_selectable_by($id)
   {
      $this->db->select(" 
                 *");
      
      $this->db->from("selectables");
      $this->db->where("id", $id);      
            
      $this->db->limit(1);      
      $query = $this->db->get();            
      $row = $query->row_array();      
      
      return $row;
   }
   #############################################################################
   function get_list_selectable_by($table_name, 
                                   $var_name, 
                                   $value_select=null, 
                                   $sub_group=null, 
                                   $minus_array_values=array())
   {
      $this->db->select(" 
                 id,
                 value_select,
                 table_name,
                 var_name,
                 order_by");
      
      $this->db->from("selectables");
      $this->db->where("LOWER(table_name)", strtolower($table_name));      
      $this->db->where("LOWER(var_name)", strtolower($var_name));      
      
      if(isset($value_select))
      {
         $this->db->where("LOWER(value_select)", strtolower( $value_select) );      
      }      
      
      if(isset($sub_group))
      {
         $this->db->where("LOWER(sub_group)", strtolower($sub_group));      
      }
      
      if(!empty($minus_array_values))
      {
         for($i=0; $i<count($minus_array_values);$i++)
         {
            $this->db->where("LOWER(value_select)!=", "'".strtolower($minus_array_values[$i])."'", FALSE);
         }
      }
      
      $this->db->order_by("order_by");      
      
      $query = $this->db->get();      
      return $query->result_array();
   }

}