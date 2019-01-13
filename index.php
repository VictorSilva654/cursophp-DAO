<?php

require_once("config.php");

//chamando um usuário só
//$user = new User();
//$user->loadById(3);
//echo $user;


//chamando todos os usuários
//$lista = User::getList();
//echo json_encode($lista);

//chamando um usuario pelo login
//$nome = User::searchByLogin('e');
//echo json_encode($nome);

//perguntando se um usuario ou senha existe
$user = new User();
$user->loginTester("eu","mesmo");
echo $user;
?>