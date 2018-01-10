<?php 

require_once("config.php");

$root = new usuario();

$root->laodById(1);


echo $root;
















/*$sql= new Sql();
$usuario = $sql->select("SELECT * FROM tb_usuario ORDER BY deslogin");
echo json_encode($usuario);
*/
 ?>