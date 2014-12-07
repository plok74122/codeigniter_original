<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Upload extends CI_Controller {

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
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct()
	{
		parent::__construct();
		$this->load->model('clpsg_model');
		$this->load->helper(array('html','url','file'));
		$this->load->library(array('parser','session','My_jquery_file_upload'));
		echo doctype();
		$meta = array(
		        array('name' => 'Content-type', 'content' => 'text/html; charset=utf-8', 'type' => 'equiv')
		);
		echo meta($meta);
		echo link_tag(array('href'=>'assets/css/bootstrap.min.css', 'rel' => 'stylesheet','type' => 'text/css','media'=>'screen,projection,print'));
		echo link_tag(array('href'=>'assets/css/style.css', 'rel' => 'stylesheet','type' => 'text/css','media'=>'screen,projection,print'));
		echo link_tag(array('href'=>'assets/css/jquery.fileupload.css', 'rel' => 'stylesheet','type' => 'text/css','media'=>'screen,projection,print'));
		echo link_tag(array('href'=>'assets/css/jquery.fileupload-ui.css', 'rel' => 'stylesheet','type' => 'text/css','media'=>'screen,projection,print'));
		echo link_tag(array('href'=>'assets/css/jquery.fileupload-noscript.css', 'rel' => 'stylesheet','type' => 'text/css','media'=>'screen,projection,print'));
		echo link_tag(array('href'=>'assets/css/jquery.fileupload-ui-noscript.css', 'rel' => 'stylesheet','type' => 'text/css','media'=>'screen,projection,print'));
		echo script_tag('assets/js/jquery.min.js');
		echo script_tag('assets/js/vendor/jquery.ui.widget.js');
		echo script_tag('assets/js/tmpl.min.js');
		echo script_tag('assets/js/load-image.all.min.js');
		echo script_tag('assets/js/canvas-to-blob.min.js');
		echo script_tag('assets/js/bootstrap.min.js');
		echo script_tag('assets/js/jquery.iframe-transport.js');
		echo script_tag('assets/js/jquery.fileupload.js');
		echo script_tag('assets/js/jquery.fileupload-process.js');
		echo script_tag('assets/js/jquery.fileupload-image.js');
		echo script_tag('assets/js/jquery.fileupload-validate.js');
		echo script_tag('assets/js/jquery.fileupload-ui.js');
		echo script_tag('assets/js/main.js');
	}
	 
	 	

	public function index()
	{
		$this->load->view('upload');
	}
	public function upload_file_control()
	{
		$upload_dir="../upload_dir/";
		ob_clean();
		if($_FILES['files']!="")
		{
			$upload_config = ARRAY(
			'upload_dir' => 'C:\\Program Files\\Apache Software Foundation\\Apache2.2\\htdocs\\upload_dir\\',
			'folder'=> date('Y-m-d')
			);
			print_r($upload_config);
			$file_array = $_FILES['files'];
//			echo pathinfo($_FILES['files']['name'][0],PATHINFO_EXTENSION);
			$insert_database_array = array(
				'file_name'=> $_FILES['files']['name'][0],
				'raw_name'=> str_replace(".".pathinfo($_FILES['files']['name'][0],PATHINFO_EXTENSION),'',$_FILES['files']['name'][0]),
				'file_ext'=> pathinfo($_FILES['files']['name'][0],PATHINFO_EXTENSION),
				'file_size'=> $_FILES['files']['size'][0],
				'file_path'=> $upload_config['upload_dir'],
				'upload_date'=> $upload_config['folder'],
				'file_md5'=> md5_file($_FILES['files']['tmp_name'][0]),
				'user'=> 24
			);
			$insert_databases = "files";
			$database_status = $this->my_jquery_file_upload->database_control($insert_database_array,$insert_databases);
			print_r($database_status);
			if($database_status['database_status'])
			{
				$this->my_jquery_file_upload->move_file($upload_config,$file_array,$database_status);
			}
			else
			{
				echo "fail";
			}
		}
		else
		{
			$this->my_jquery_file_upload->get_file_by_id("1","2");
		}
	}
	public function download_file()
	{
		$this->my_jquery_file_upload->download_file();
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */