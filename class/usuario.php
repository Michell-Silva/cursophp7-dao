<?php 

class Usuario{

	private $idusuario;
	private $deslogin;
	private $dessenha;
	private $dtcadastro;



	public function getIdusuario(){
		return $this->idusuario;
	}

	public function getDeslogin(){
		return $this->deslogin;
	}

	public function getDessenha(){
		return $this->dessenha;		
	}

	public function getDtcadastro(){
		return $this->dtcadastro;
	}



	public function setIdusuario($idusuario){

		$this->idusuario = $idusuario;
	}

	public function setDeslogin($login){
		$this->deslogin = $login;
	}

	public function setDessenha($senha){
		$this->dessenha = $senha;
	}

	public function setDtcadastro($data){
		$this->dtcadastro = $data;
	}

	public function laodById($id){

		$sql = new Sql();

		$results = $sql->select("SELECT * FROM tb_usuario WHERE idusuario = :ID ", array(":ID"=>$id));

		if(count($results) > 0){

			$row = $results[0];

			$this->setIdusuario($row['idusuario']);
			$this->setDeslogin($row['deslogin']);
			$this->setDessenha($row['dessenha']);
			$this->setDtcadastro(new DateTime($row['dtcadastro']));
		}
	}

	public function __toString(){

		return json_encode(array(

			"idusuario"=>$this->getIdusuario(),
			"deslogin"=>$this->getDeslogin(),
			"dessenha"=>$this->getDessenha(),
			"dtcadastro"=>$this->getDtcadastro()->format("d/m/y H:i:s")

		));
	}

}


?>