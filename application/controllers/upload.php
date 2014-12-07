<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Upload extends CI_Controller {

	//jquery upload 的控制器 裡面需要拉很多的css 與 javascrip進來
	//位置如下
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
	 
	 	
	
	//view的控制裡面 可以透過<!-- The template to display files available for download -->
	//裡面的javascript去處理要讓使用者看到的按鈕 返回的內容在library裡面會全部都返回 要怎麼顯示主要是去修改javascript的if else的先後順序
	public function index()
	{
		$this->load->view('upload');
	}
	public function upload_file_control()
	{
/*
 * 使用上傳控制的control有兩種狀況 一是初始化的顯示 另一種則是上傳檔案時候的情況
 * 在使用library的初始化顯示 初始化顯示主要使以一個資料庫的名稱與以陣列方式丟入該資料表的唯一值
 * 這個陣列一般可以伊需求去資料庫裡面讀取對應值出來
 * 
 * 另一種情況就是從傳檔案進來 主要是以 $_FILES['files']!="" 開始
 * $insert_database_array建議在控制器寫完投入 可以依資料表需求去做修改 陣列的名稱就是資料表名稱
 * $upload_config 上傳路徑 跟上傳資料夾名稱
 * $insert_databases 寫入的資料庫名稱 一般來講這個應該會跟$filedatabase 
 * 
 * database_control中會主要會寫入資料庫 如果檔案重複的話不會寫
 * 返回$database_status 裡面包含三個元素 
 * $database_status['database_status']資料庫狀態 (0 or 1) 可用於判斷有沒有寫入成功
 * $database_status['no'] 返回資料庫的唯一值 這是用於創造下載連結用的
 * $database_status['database'] 資料庫名稱 這是用於創造下載連結用的
 * 資料庫寫入成功後進行 檔案搬移
 * $this->my_jquery_file_upload->move_file($upload_config,$file_array,$database_status);
 *	
 * $this->my_jquery_file_upload->get_file_by_id($fileid_array ,$filedatabase)
 * 初始的函數 這個是需要自己在去查詢$fileid_array
 *
 *
 *
 */

		$fileid_array = array(2);
		$filedatabase = 'files';
		$upload_dir="../upload_dir/";
		ob_clean();
		if($_FILES['files']!="")
		{
			$upload_config = ARRAY(
			'upload_dir' => 'C:\\Program Files\\Apache Software Foundation\\Apache2.2\\htdocs\\upload_dir\\',
			'folder'=> date('Y-m-d')
			);
			$file_array = $_FILES['files'];
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
			$this->my_jquery_file_upload->get_file_by_id($fileid_array ,$filedatabase);
		}
	}
	public function download_file()
	{
		$no = $this->uri->segment(3);
		$database = $this->uri->segment(4);
		$this->my_jquery_file_upload->download_file($no,$database);
	}
	public function delete_file()
	{
		$this->my_jquery_file_upload->delete_file();
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */