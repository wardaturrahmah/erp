<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

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
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$data['form_action']=site_url('welcome/login');
		
		//$this->session->unset_userdata('nama_dua'); 
		//$this->session->unset_userdata('login_dua'); 
		$data['nama']=$this->session->userdata('nama_dua');
		$this->load->view('login',$data);
		/*$this->load->view('welcome_message');
		 $data = array('nama_dua' => 'dua',
						'login_dua' => TRUE);
		$this->session->set_userdata($data); 
		if(($this->session->userdata('login_dua')==TRUE) )//ganti
		{
			//echo "login ".$this->session->userdata('nama_dua');
			print_r($this->session->userdata());
		}
		*/
	}
	public function login()
	{
		$username=$this->input->post('username');
		$data = array('nama_sweet' => $username, //ganti
						'login_sweet' => TRUE, //ganti
					);
		$this->session->set_userdata($data);
		redirect('welcome/a');
	}
	public function a()
	{
		echo $this->session->userdata('nama_sweet');
		redirect()->back(); 
		if(($this->session->userdata('login_sweet')!=TRUE) )//ganti
		{
			redirect();
		}
	}
}
