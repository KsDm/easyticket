<?php
class Compra_model extends CI_Model {

	const TABELA = 'compra';
	
	var $idcompra;
	var $protocolo; 
	var $preco; 
	var $quantidade; 
	var $cliente_idcliente;
	
	function __construct($idcompra = "", $protocolo = "", $preco = "", $quantidade = "", $cliente_idcliente = ""){
		$this->idcompra = $idcompra;
		$this->protocolo = $protocolo;
		$this->preco = $preco;
		$this->quantidade = $quantidade;
		$this->cliente_idcliente = $cliente_idcliente;
	}
	
	function cadastrarEvento(Compra_model $compra) {
		if(!empty($compra->idcompra) && !empty($compra->protocolo) && !empty($compra->preco) && !empty($compra->quantidade) ){
			
			$data = array('protocolo' => $compra->protocolo, 'preco' => $compra->preco, 'quantidade' => $compra->quantidade, 'cliente_idcliente' => $compra->cliente_idcliente);

			$inserir = $this -> db -> insert(self::TABELA, $data);
			
			if($inserir)
				return true;
			else
				return false;
		}else{
			return false;
		}
		
	}
	
}
?>