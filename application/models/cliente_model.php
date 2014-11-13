<?php
class Cliente_model extends CI_Model {

	const TABELA = 'cliente';
	
	var $idcliente;
	var $nome;
	var $cpf;

	function __construct($idcliente = "", $nome = "", $cpf = "") {
		$this->idcliente = $idcliente;
		$this->nome = $nome;
		$this->cpf = $cpf;
	}

	function listarUsuario(){
		$query = $this->db->get(self::TABELA);
		return $query->result();
	}
	
}
?>