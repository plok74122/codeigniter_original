<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class My_jquery_file_upload {
		
    public function __construct()
    {
//				parent::__construct();
        $this->CI =& get_instance();
				$this->CI->load->model('jquery_file_upload_model');
        $this->CI->load->helper(array('security','file','download'));
        
//       	$this->CI->DB_file_server = $CI->load->database('file_server',TRUE);
    }
   
    public function get_file_by_id( $fileid_array , $filedatabase )
    {
    	$download_url="http://127.0.0.1/jquery-file-upload-helper/htdocs/index.php/upload/";
			$files = $this->CI->jquery_file_upload_model->get_file_by_id('2','2');
			for($i=0 ; $i < count($files['no']);$i++)
			{
				$files_object['files'][$i] = (object) array(
				'name' => $files['file_name'][$i],
				'size' => $files['file_size'][$i],
				'url' => $download_url."/download_file/".do_hash($files['no'][$i]),
				'deleteUrl' => 'test',
				'deleteType' => 'DELETE'
				);
			}
			ob_clean();
			echo json_encode($files_object);
    }
    public function database_control( $insert_array , $database)
    {
    	$file_no = $this->CI->jquery_file_upload_model->check_file_exist($insert_array , $database);
    	if($file_no=="")
    	{
    		if(! $this->CI->jquery_file_upload_model->insert_database($insert_array , $database))
    		{
    			$return_array=array(
    			'database_status' => false,
    			'no' => ''
    			);
    		}
    		else
    		{
    			$file_no = $this->CI->jquery_file_upload_model->check_file_exist($insert_array , $database);
    			$return_array=array(
    			'database_status' => true,
    			'no' => $file_no
    			);
    		}
    	}
    	else
    	{
				$return_array=array(
				'database_status' => true,
				'no' => $file_no
				);
    	}
    	return $return_array;
    }
    
		public function move_file($upload_config,$file_array,$database_status)
		{
			mkdir($upload_config['upload_dir'].$upload_config['folder']."\\");
			if(move_uploaded_file($file_array['tmp_name'][0],$upload_config['upload_dir'].$upload_config['folder']."\\".md5_file($file_array['tmp_name'][0])))
			{
				$files_object['files'][0] = (object) array(
				'name' => $file_array['name'][0],
				'size' => $file_array['size'][0],
				'url' => $download_url."/download_file/".do_hash($database_status['no']),
				'deleteUrl' => 'test',
				'deleteType' => 'DELETE'
				);
//				print_r($files_object);
				ob_clean();
				echo json_encode($files_object);
			}
			else
			{
				echo "move fail";
			}
		}
		public function download_file($no , $database)
		{
			$file_information = $this->CI->jquery_file_upload_model->get_file_infomation('2','files');
//			print_r($file_information);
			$data = file_get_contents($file_information['file_path'].$file_information['upload_date']."\\".$file_information['file_md5']);
			$filename = $file_information['file_name'];
			ob_clean();
			force_download($filename,$data);
		}		
}

?>