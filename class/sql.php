<?php 

class Sql extends PDO{

	private $conn;



	public function __construct(){

		$this->conn = new PDO("mysql:host=localhost;dbname=dbphp7", "root", "root");	//sem o sifrão, pois é um atributo substitui por $this  **não esquecer**	       
	}


	private function setParams($statement, $parameters = array()){

		foreach ($parameters as $key => $value) {
			
			$this->setParam($statement, $key, $value);
		}
	}


	private function setParam($statement, $key, $value){

		$statment->bindParam($key, $value);
	}



	public function query($rawQuery, $params = array()){

		$stmt= $this->conn->prepare($rawQuery);

		$this->setParams($stmt, $params);	

		$stmt->execute();

		return $stmt;
	}


	public function select($rawQuery, $params = array()){

		$stmt= $this->query($rawQuery, $params);

		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}


}// fim da classe Sql
?>