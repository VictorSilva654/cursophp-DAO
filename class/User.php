<?php

class User {
		
	private $id_user;
	private $login;
	private $senha;
	private $dtcadastro;
	
	public function __construct($login = "", $senha = ""){
		$this->setLogin($login);
		$this->setSenha($senha);
	}
	
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
			
			$this->setData($resultado[0]);
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
	
	public function setData($linha){
		$this->setIdUser($linha['id_user']);
		$this->setLogin($linha['login']);
		$this->setSenha($linha['senha']);
		$this->setDtcadastro(new DateTime($linha['dtcadastro']));
	}
	
	public static function getListOfUsers(){
		$sql = new DBPrepare();
		return $sql->select("select * from tb_usuario order by id_user");
		
	}
	
	public function insert(){
		$sql = new DBPrepare();
		return $sql->select("call users_insert(:login, :senha)", array(
			":login" => $this->getLogin(),
			":senha" => $this->getSenha()
		));
		if (count($resultado) > 0){
			$this->setData($resultado[0]);
		}
	}
	
	public function update($login, $senha){
		$this->setLogin($login);
		$this->setSenha($senha);
		
		$sql = new DBPrepare();
		
		$sql->query("update tb_usuario set login = :login, senha = :senha where id_user = :id", array(
			":login"=>$this->getLogin(),
			":senha"=>$this->getSenha(),
			":id"=>$this->getIdUser()
		));
		
	}
	
	public static function searchByLogin($nome){
		$sql = new DBPrepare();
		return $sql->select("select * from tb_usuario where login like :nome order by id_user", array(
			":nome" => "%".$nome."%"
		));
	}
	
	public function loginTester($login, $senha){
		$sql = new DBPrepare();
		$resultado = $sql->select("select * from tb_usuario where login = :login and senha = :senha", array(
			":login" => $login,
			":senha" => $senha
		));
		
		if (count($resultado) > 0){
			$this->setData($resultado[0]);
		} else {
			throw new Exception ("Login ou senha invalidos");
		}
	}
	
	
}

?>