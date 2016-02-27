<?php
session_start();
require_once "config.php";
if (!isset($_SESSION['user_session']) && !isset($_SESSION['pwd_session'])) {
  echo "<meta http-equiv='refresh' content ='0, url= LAH.html'>";
}else{
?>

<html>

<head>
    <meta http-equive ="Content-Type" content ="text/html, charset-utf-8">
    <link href="http://s3.amazonaws.com/codecademy-content/courses/ltp/css/shift.css" rel="stylesheet">
    
    <link rel="stylesheet" href="http://s3.amazonaws.com/codecademy-content/courses/ltp/css/bootstrap.css">
    <link rel="stylesheet" href="main.css">
    
  </head>
  <body>
  	    <div id="titulo">
      <space>
        <a href="cliente.php">Livros LAH</a>
      </space>
    </div>
    <div class="nav">
      <div class="container">
        <ul class= "pull-right">
          <li><a href="alter_usu.php"> mudar perfil</a></li>
          <li><a href="anuncio_cliente.php">seus anuncios</a></li>
          <li><a href="?vai=sair">sair</a></li>
       </ul>
        <ul class="pull-left">
          <li><a href="venda.php">Comprar</a></li>
          <li><a href="anunciar.php">Anunciar</a></li>
          <li><a href="troca.php">Trocar</a></li>
        </ul>
      </div>
    </div>
    <div id= "cadastro">
      <h3>Anunciar</h3>
      <form method="post" action="?go=anunciar">
        <table id="centro">
          <tr>
            <td>Titulo</td>
            <td><input type="text" name="titulo" id="txt"/></td>
          </tr>
          <tr>
            <td>descricao</td>
            <td><input type="text" name="descricao_anuncio" id="txt"/></td>
          </tr>
          <tr>
            <td>Categoria</td>
            <td><input type="text" name="categoria_anuncio" id="txt"/></td>
          </tr>
        </table>

        <table id="esq">
         <thead>
            <tr>
              <th colspan ="2" style="text-align:center"><h4><strong>preencha se deseja vender seu livro</strong></h4></th>
            </tr>
          </thead>

            <tr>
              <td>preco</td>
              <td><input type="text" name="preco" id="txt" /></td>
            </tr>
        </table>

        <table id="dir">
          <thead>
            <tr>
              <th colspan ="2" style="text-align:center"><h4><strong>preencha se deseja trocar seu livro por outro</strong></h4></th>
            </tr>
          </thead>
          <tr>
            <td> titulo do livro pelo qual deseja trocar</td>
            <td><input type="text" name="titulo_troca" id="txt" /></td>
          </tr>
          <tr >
            <td> categoria da troca</td>
            <td><input type="text" name="categoria_troca" id="txt" /></td>
          </tr>
          <tr>
            <td>descricao do livro pelo qual deseja trocar</td>
            <td><input type="text" name="descricao_troca" id="txt"/></td>
          </tr>
        </table>

        <table id="botao">
          <tr>
            <td colspan = "2"> <input type="submit" value="anunciar" name="cadastro"/></td>
        </table>
      </form>
    </div>
  </body>
</html>

<?php
}

if(@$_GET['go'] == 'anunciar'){
  $titulo = $_POST['titulo'];
  $descricao_anuncio = $_POST['descricao_anuncio'];
  $categoria_anuncio = $_POST['categoria_anuncio'];

  $preco = $_POST['preco'];
  $titulo_troca = $_POST['titulo_troca'];
  $categoria_troca = $_POST['categoria_troca'];
  $descricao_troca = $_POST['descricao_troca'];

  $email = $_SESSION['user_session'];
  $pwd = $_SESSION['pwd_session'];

  if(empty($titulo) ||  empty($descricao_anuncio) || empty($categoria_anuncio)){
     echo "<script>alert('preencha todos os campos para se cadastrar');history.back();</script>";
  }
  else{
    if(empty($preco)){
      if(empty($titulo_troca) || empty($categoria_troca) || empty($descricao_troca)){
        echo "<script>alert('preencha todos os campos para anunciar');history.back();</script>";
      }
      else{
         mysql_query("INSERT INTO produto (titulo_anuncio, descricao_anuncio, categoria_anuncio, email, titulo_troca, categoria_troca, descricao_troca) VALUES ('$titulo', '$descricao_anuncio', '$categoria_anuncio', '$email', '$titulo_troca', '$categoria_troca', '$descricao_troca')") or die("erro");
         echo "<script>alert('livro anunciado com sucesso');</script>";
         echo "<meta http-equiv='refresh' content ='0, url= cliente.php'>";
      }
    }
    else{
      if (empty($titulo_troca) && empty($categoria_troca) && empty($descricao_troca)) {
        mysql_query( "INSERT INTO produto (descricao_anuncio, categoria_anuncio, titulo_anuncio, email, preco) VALUES ('$descricao_anuncio', '$categoria_anuncio', '$titulo', '$email', '$preco')") or die ("erro");
        echo "<script>alert('livro anunciado com sucesso');</script>";
        echo "<meta http-equiv='refresh' content ='0, url= cliente.php'>";
        # code...
      }
      else{
         mysql_query("INSERT INTO produto (descricao_anuncio, categoria_anuncio, titulo_anuncio, email, titulo_troca, categoria_troca, descricao_troca, preco) VALUES ('$descricao_anuncio', '$categoria_anuncio', '$titulo', '$email', '$titulo_troca', '$categoria_troca', '$descricao_troca', '$preco')") or die ("erro");
         echo "<script>alert('livro anunciado com sucesso');</script>";
         echo "<meta http-equiv='refresh' content ='0, url= cliente.php'>";
      }
    }
  }
}
?>

<?php

if (@$_GET['vai']=='sair') {
  # code...
  unset($_SESSION['user_session']);
  unset($_SESSION['pwd_session']);
  header ("Location: LAH.html");
}
?>