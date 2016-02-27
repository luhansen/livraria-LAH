<?php

session_start();
require_once "config.php"; // Selecionando o banco de dados

$id = $_GET['id']; // Recebendo o valor enviado pelo link

if(mysql_query("DELETE FROM produto WHERE numero_produto = $id")){
	echo "<script>alert('removido com sucesso');history.back();</script>";
}
else{
	echo mysql_error();
}
?>