<?php

class DBPrepare extends PDO{
	
	private $connection; //atributo privado para conexão com o banco
	
	public function __construct()
	{
		$this->connection = new PDO("mysql:host=localhost;dbname=dbVictor", "root", ""); 
		//quando a classe é chamada, já se conecta com o banco de dados
	}
	
	private function setParam ($stmt, $key, $value)
	//é um preparador de parametros, onde ele recebe o statement e os parametros, como array
	{
		$stmt->bindParam($key, $value);
	}//para caso a query ter um parametro só, também teremos uma função específica
	
	private function setParams($statement, $parameters = array())
	{
		foreach ($parameters as $key => $value ){
			$this->setParam($key, $value);
		}//essa função é para caso a query tenha mais de um parametro
	}
	
	public function query($rawQuery, $params = array())
	//rawQuery é uma query bruta, que vai ser tratada. e params vão ser os parametros da query, que vão ser tratados como uma array
	{
		$statem = $this->connection->prepare($rawQuery);
		$this->setParams($statem, $params);
		$statem->execute();
		return $statem;
	}//essa função vai fazer uma query diretamente no banco de dados
	
	public function select ($rawQuery, $params = array()):array 
	{
		$stmt = $this->query($rawQuery, $params);
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	} //essa função retornará os dados da query como uma array
		
}

?>