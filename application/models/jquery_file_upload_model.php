<?php
class Jquery_file_upload_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->DB_file_server = $this->load->database('file_server',TRUE);
	}
	
	public function get_file_by_id( $fileid_array , $filedatabase )
	{
		$this->DB_file_server->where_in('no' , $fileid_array);
		$query = $this->DB_file_server->get($filedatabase);
		foreach ($query->result() as $row)
		{
			$return_array['no'][]=$row->no;
			$return_array['file_name'][]=$row->file_name;
			$return_array['raw_name'][]=$row->raw_name;
			$return_array['file_ext'][]=$row->file_ext;
			$return_array['file_size'][]=$row->file_size;
			$return_array['file_path'][]=$row->file_path;
			$return_array['upload_date'][]=$row->upload_date;
			$return_array['file_md5'][]=$row->file_md5;
		}
		return $return_array;
	}
	public function check_file_exist( $insert_array , $database)
	{
		$this->DB_file_server->select('no');
		$query = $this->DB_file_server->get_where($database , $insert_array);
		$row = $query->first_row();
		return $row->no;
	}
	public function insert_database( $insert_array , $database)
	{
		return $this->DB_file_server->insert($database , $insert_array);
	}
	public function get_file_infomation( $no , $database)
	{
		$query =  $this->DB_file_server->get_where($database , array('no'=> $no));
		return $query->first_row('array');
	}
}
?>