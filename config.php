<?php
$con = @mysql_connect("localhost", "root", "Lu14/0026711") or die("nao foi possivel acessar o servidor");
mysql_select_db("livros_lah", $con) or die("banco de dados nao localizado" );
?>