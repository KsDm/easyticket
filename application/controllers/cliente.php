<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cliente extends CI_Controller {

	function __construct() {
		parent::__construct();

	}

	public function index() {
		$this -> load -> view('cliente');
	}
	
	public function cadastrarCliente(){
		$this -> load -> model('cliente_model');
		
		$nmCliente = mysql_real_escape_string($_POST ["nome"]);
		$cpf = mysql_real_escape_string($_POST ["cpf"]);
		
		$usuario = new Usuario_model(null,  $nmCliente, $cpf);
		
		$cadastrar = $this->cliente_model->cadastrarUsuario($usuario);
		
		if($cadastrar){
			redirect('usuario');
		}else{
			echo utf8_decode("<script>
									alert('Todos os campos são obrigatórios');
									location.href='".base_url('usuario')."';	
							</script>");
		}
	}
	
}
