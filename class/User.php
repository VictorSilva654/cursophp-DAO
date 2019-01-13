<?php

class User {
	private $id_user;
	private $login;
	private $senha;
	private $dtcadastro;
	
	public function getIdUser(){
		return $this->id_user;
	}
		
	public function setIdUser ($id_user){
		$this->id_user = $id_user;
	}
	
	public function getLogin(){
		return $this->login;
	}
		
	public function setLogin ($login){
		$this->login = $login;
	}
	
	public function getSenha(){
		return $this->senha;
	}
		
	public function setSenha ($senha){
		$this->senha = $senha;
	}
	
	public function getDtcadastro(){
		return $this->dtcadastro;
	}
		
	public function setDtcadastro ($dtcadastro){
		$this->dtcadastro = $dtcadastro;
	}
	
	public function loadById($id){
		$sql = new DBPrepare();
		$resultado = $sql->select("select * from tb_usuario where id_user = :id", array(
			":id" => $id
		));
		
		if (count($resultado) > 0){
			$linha = $resultado[0];
			
			$this->setIdUser($linha['id_user']);
			$this->setLogin($linha['login']);
			$this->setSenha($linha['senha']);
			$this->setDtcadastro(new DateTime($linha['dtcadastro']));
		}
	}
	
	public function __toString(){
		return json_encode(array(
			"id_user" => $this->getIdUser(),
			"login" => $this->getLogin(),
			"senha" => $this->getSenha(),
			"dtcadastro" => $this->getDtcadastro()->format("d-m-Y H:i")
		));
	}
	
}

?>