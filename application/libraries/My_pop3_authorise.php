<?php
require("PHPMailer/class.pop3.php");
class My_pop3_authorise {
	function My_pop3_authorise()
	{
		$this->ci =& get_instance();
	}
	public function authorise_163($username , $password)
	{
		$pop = POP3::popBeforeSmtp('pop3.163.com', 110, 1, $username.'@163.com', $password, 0);
		if($pop==1){return 1;}else{return 0;}
	}
	public function authorise_126($username , $password)
	{
		$pop = POP3::popBeforeSmtp('pop3.126.com', 110, 1, $username.'@126.com', $password, 0);
		if($pop==1){return 1;}else{return 0;}
	} 
	public function authorise_yeah($username , $password)
	{
		$pop = POP3::popBeforeSmtp('pop3.yeah.net', 110, 1, $username.'@yeah.net', $password, 0);
		if($pop==1){return 1;}else{return 0;}
	}
	public function authorise_sina_cn($username , $password)
	{
		$pop = POP3::popBeforeSmtp('pop3.sina.cn', 110, 1, $username, $password, 0);
		if($pop==1){return 1;}else{return 0;}
	}
	public function authorise_sina_com($username , $password)
	{
		$pop = POP3::popBeforeSmtp('pop3.sina.com', 110, 1, $username, $password, 0);
		if($pop==1){return 1;}else{return 0;}
	}
	public function authorise_xmu($username , $password)
	{
		$pop = POP3::popBeforeSmtp('pop3.xmu.edu.cn', 110, 1, $username, $password, 0);
		if($pop==1){return 1;}else{return 0;}
	} 
}