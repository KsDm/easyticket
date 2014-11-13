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
		$eventos['eventos'] = $this->listar_eventos();
		$this->load->view('helper/menu', $this->sessaoUsuario);
		$this->load->view('ingressos', $eventos);
	}
	
	function listar_clientes(){
		$this -> load -> model('cliente_model');
		$clientes = $this->cliente_model->listarUsuario();
		
		$clientesArray = array();
		
		foreach ($clientes as $usuario){
			array_push($clientesArray, $usuario);
		}
			
		
		echo json_encode(array("data" => $clientesArray));
	}
	
	function comprarIngresso(){
		$this -> load -> model('compra_model');
		
		$protoco = md5(time());
		$precos = mysql_real_escape_string($_POST ["precos"]);
		$quantidade = mysql_real_escape_string($_POST ["quantidade"]);
		$cliente_idcliente = mysql_real_escape_string($_POST ["cliente_idcliente"]);
		
		$valor_total = $quantidade * $precos;
		
		$compra_model = new Compra_model(null, $protoco, $quantidade, $quantidade, $cliente_idcliente);
		
		
	}

	function listar_eventos(){
		$this -> load -> model('evento_model');
		$eventos = $this->evento_model->listarEventos();
		
		return $eventos;	
	}
		
}

?>















