<?php

require_once("config.php");

//chamando um usuário só
//$user = new User();
//$user->loadById(3);
//echo $user;


//chamando todos os usuários
//$lista = User::getListOfUsers();
//echo json_encode($lista);

//chamando um usuario pelo login
//$nome = User::searchByLogin('e');
//echo json_encode($nome);

//perguntando se um usuario ou senha existe;
//$user->loginTester("eu","mesmo");
//echo $user;

//inserindo os dados na tabela
//$user = new User('fabricio','goncalves123');
//$user->insert();
//echo $user;

//alterar um usuario
//$user = new User();
//$user->loadById(10);
//$user->update('rodolfo', '123488');
//echo $user;

$user = new User();
$user = new User();
$user->loadById(1);
$user->delete();
echo $user;


?>