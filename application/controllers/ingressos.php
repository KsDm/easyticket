<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ingressos extends CI_Controller {

	function __construct(){
		parent::__construct();
		
		if($this->session->userdata('logged_in')){
			$this->sessaoUsuario = $this->session->userdata('logged_in');
			if($this->sessaoUsuario['perfil'] != 'admin'){
				redirect('login');
			}	
		}else{
			redirect('login');
		}
	}
	
	public function index()
	{
		$this->load->view('helper/menu', $this->sessaoUsuario);
		$this->load->view('ingressos');
	}
	
	
}
