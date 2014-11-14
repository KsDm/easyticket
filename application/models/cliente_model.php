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
	
	function cadastrarCliente(Cliente_model $cliente){
		if(!empty($cliente->nome) && !empty($cliente->cpf)){
				
			$data = array('nome' => $cliente->nome, 'cpf' => $cliente->cpf );
		
			$inserir = $this -> db -> insert(self::TABELA, $data);
			
			if($inserir)
				return true;
			else
				return false;
		}else{
			return false;
		}
	}
	
	function alterarCliente(Cliente_model $cliente){
		if(!empty($cliente->nome) && !empty($cliente->cpf)){
				
			$data = array('idcliente' => $cliente->idcliente, 'nome' => $cliente->nome, 'cpf' => $cliente->cpf );
			
			$this->db->where('idcliente', $cliente->idcliente);
				
			if($this->db->update(self::TABELA, $data))
				return true;
			else
				return false;
			}else{
				return false;
		}
	}
	
	function excluirCliente(Cliente_model $cliente){
		$excluir = $this->db->delete(self::TABELA, array('idcliente' => $cliente->idcliente));
		if($excluir)
			return true;
		else 
			return false;
			
	}
	
}
?>