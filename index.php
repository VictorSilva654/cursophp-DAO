<?php

require_once("config.php");

$sql = new DBPrepare();

$user = $sql->select('Select * from tb_usuario');

echo json_encode($user);
?>