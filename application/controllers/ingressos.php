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
	
	function listar_ingressos_comprados(){
		$this -> load -> model('compra_model');
		$ingressoComprados = $this->compra_model->buscarIngressosComprados();
		
		$ingressosArray = array();
		
		foreach ($ingressoComprados as $ingressoComprado){
			array_push($ingressosArray, $ingressoComprado);
		}
			
		
		echo json_encode(array("data" => $ingressosArray));
	}
	
	function comprarIngresso(){
		$this -> load -> model('compra_model');
		
		$protocolo = time();
		$quantidade = mysql_real_escape_string($_POST ["quantidade"]);
		$precos = mysql_real_escape_string($_POST ["valor"]);
		$cliente_idcliente = mysql_real_escape_string($_POST ["idcliente"]);
		$evento_idevento = mysql_real_escape_string($_POST ["evento_idevento"]);
		
		$valor_total = $quantidade * $precos;
		
		$compra_model = new Compra_model(null, $protocolo, $quantidade, $valor_total, $cliente_idcliente, $evento_idevento);
		
		$compra = $this->compra_model->cadastrarCompra($compra_model);
		
		if($compra){
				redirect('ingressos');
		}else{
			echo utf8_decode("<script>
									alert('Erro);
									location.href='".base_url('eventos')."';	
							</script>");
			
		}
		
	}

	function listar_eventos(){
		$this -> load -> model('evento_model');
		$eventos = $this->evento_model->listarEventos();
		
		return $eventos;	
	}
		
	function cadastrarCliente(){
		$this -> load -> model('cliente_model');
		
		$nome = mysql_real_escape_string($_POST ["nome"]);
		$cpf = mysql_real_escape_string($_POST ["cpf"]);

		$cliente_model = new Cliente_model(null, $nome, $cpf);
		
		$cadastrar = $this->cliente_model->cadastrarCliente($cliente_model);		
		
		if($cadastrar){
				redirect('ingressos');
		}else{
			echo utf8_decode("<script>
									alert('Todos os campos são obrigatórios');
									location.href='".base_url('ingressos')."';	
							</script>");
			
		}
	}
	
	function alterarCliente(){
		$this -> load -> model('cliente_model');
		
		$idcliente= mysql_real_escape_string($_POST ["idcliente"]);
		$nome = mysql_real_escape_string($_POST ["nome"]);
		$cpf = mysql_real_escape_string($_POST ["cpf"]);

		$cliente_model = new Cliente_model($idcliente, $nome, $cpf);
		
		$alterar = $this->cliente_model->alterarCliente($cliente_model);		
		
		if($alterar){
				redirect('ingressos');
		}else{
			echo utf8_decode("<script>
									alert('Todos os campos são obrigatórios');
									location.href='".base_url('ingressos')."';	
							</script>");
			
		}
	}
	
	function excluirCliente(){
		$this->load->model('cliente_model');
		
		$idevento = mysql_real_escape_string($_POST ["idcliente"]);
		
		$cliente_model = new Cliente_model($idevento, null, null);
		
		$excluir = $this->cliente_model->excluirCliente($cliente_model);
		
		if($excluir){
			redirect('ingressos');
		}else{
			echo "<script> alert('ERRO')</scritp>";
		}
	}
	
	function listarPrecoPorId($id){
		$this->load->model('evento_model');
		
		$busca = $this->evento_model->listarEventosPorId($id);
		
		$arrayMensagem = array();
		
		if($busca){
			foreach ($busca as $row) {
				$arrayMensagem = array(
										"tipo" => "success",
										"preco" => $row->preco									
											);
			}
			
		}else{
			$arrayMensagem = array("tipo" => "success");
		}
		echo json_encode($arrayMensagem);
	}
	
}

?>















