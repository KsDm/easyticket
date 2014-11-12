<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ingresso extends CI_Controller {

	function __construct() {
		parent::__construct();

	}

	public function index() {
		$this -> load -> view('index', $result);
	}
	
	/* 
	 * Listar Categorias
	 * 
	 * Teste = OK
	 */
	function listar_ingresso($id) {
		$this -> load -> model('evento_model');
		$ingressos['ingressos'] = $this->evento_model->listarEventosPorId($id);
		
		$this -> load -> view('ingresso', $ingressos);
	}
	
	function comprarIngressos(){
		$dateTime = time();
		$protocolo = md5($dateTime);
		
		// Passando usuário de forma estatica para exibir funcionamento
		$idCliente = 1;
		
		$this -> load -> model('compra_model');
		//ENIOS LIMA
	}
}
