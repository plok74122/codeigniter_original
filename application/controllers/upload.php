<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Upload extends CI_Controller {

	//jquery upload ����� �̭��ݭn�ԫܦh��css �P javascrip�i��
	//��m�p�U
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
	 
	 	
	
	//view������̭� �i�H�z�L<!-- The template to display files available for download -->
	//�̭���javascript�h�B�z�n���ϥΪ̬ݨ쪺���s ��^�����e�blibrary�̭��|��������^ �n�����ܥD�n�O�h�ק�javascript��if else�����ᶶ��
	public function index()
	{
		$this->load->view('upload');
	}
	public function upload_file_control()
	{
/*
 * �ϥΤW�Ǳ��control����ت��p �@�O��l�ƪ���� �t�@�ثh�O�W���ɮ׮ɭԪ����p
 * �b�ϥ�library����l����� ��l����ܥD�n�ϥH�@�Ӹ�Ʈw���W�ٻP�H�}�C�覡��J�Ӹ�ƪ��ߤ@��
 * �o�Ӱ}�C�@��i�H��ݨD�h��Ʈw�̭�Ū�������ȥX��
 * 
 * �t�@�ر��p�N�O�q���ɮ׶i�� �D�n�O�H $_FILES['files']!="" �}�l
 * $insert_database_array��ĳ�b����g����J �i�H�̸�ƪ�ݨD�h���ק� �}�C���W�ٴN�O��ƪ�W��
 * $upload_config �W�Ǹ��| ��W�Ǹ�Ƨ��W��
 * $insert_databases �g�J����Ʈw�W�� �@������o�����ӷ|��$filedatabase 
 * 
 * database_control���|�D�n�|�g�J��Ʈw �p�G�ɮ׭��ƪ��ܤ��|�g
 * ��^$database_status �̭��]�t�T�Ӥ��� 
 * $database_status['database_status']��Ʈw���A (0 or 1) �i�Ω�P�_���S���g�J���\
 * $database_status['no'] ��^��Ʈw���ߤ@�� �o�O�Ω�гy�U���s���Ϊ�
 * $database_status['database'] ��Ʈw�W�� �o�O�Ω�гy�U���s���Ϊ�
 * ��Ʈw�g�J���\��i�� �ɮ׷h��
 * $this->my_jquery_file_upload->move_file($upload_config,$file_array,$database_status);
 *	
 * $this->my_jquery_file_upload->get_file_by_id($fileid_array ,$filedatabase)
 * ��l����� �o�ӬO�ݭn�ۤv�b�h�d��$fileid_array
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