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
}
