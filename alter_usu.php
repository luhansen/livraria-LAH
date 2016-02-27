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
          <li><a href="aler_usu.php"> mudar perfil</a></li>
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

<?php
  $email = $_SESSION['user_session'];
  $pwd = $_SESSION['pwd_session'];

  $sql = mysql_query("SELECT * FROM usuario WHERE email = '$email'");
  $exibe = mysql_fetch_assoc($sql);

?>

    <div id = "cadastro">
      <h3>ALTERE SEUS DADOS</h3>
      <form method="post" action="?go=atualizar">
        <table id="centro">
          <tr>
            <td><input type="hidden" name="email" id="txt" value = "<?php echo $exibe['email']; ?>"/></td>
          </tr>
          <tr>
            <td>Nome</td>
            <td><input type="text" name="nome" id="txt" value = "<?php echo $exibe['nome']; ?>"/></td>
          </tr>
          <tr>
            <td>Sobrenome</td>
            <td><input type="text" name="sobrenome" id="txt" value = "<?php echo $exibe['sobrenome']; ?>"/></td>
          </tr>
          <tr>
            <td>Cidade</td>
            <td><input type="text" name="cidade" id="txt" value = "<?php echo $exibe['cidade']; ?>"/></td>
          </tr>
          <tr>
            <td>estado</td>
            <td><input type="text" name="estado" id="txt" value = "<?php echo $exibe['estado']; ?>"/></td>
          </tr>
          <tr>
            <td>Senha</td>
            <td><input type="text" name="senha" id="txt" value = "<?php echo $exibe['senha']; ?>"/></td>
          </tr>
          <tr>
            <td claspan ="2"><input type="submit" value="atualizar" id="button" /></td>
          </tr>
        </table>
      </form>
    </div>
  </body>
</html>

<?php
}
?>

<?php
if(@$_GET['go'] == 'atualizar'){
  $nome = $_POST['nome'];
  $sobrenome = $_POST['sobrenome'];
  $cidade = $_POST['cidade'];
  $estado = $_POST['estado'];
  $email = $_POST['email'];
  $pwd = $_POST['senha'];

  if(empty($nome)|| empty($sobrenome)||empty($cidade)||empty($estado)||empty($email)||empty($pwd)){
    echo "<script>alert('preencha todos os campos para se cadastrar');history.back();</script>";
  }
  elseif(mysql_query("UPDATE usuario SET nome ='$nome', sobrenome = '$sobrenome', cidade = '$cidade', estado = '$estado', senha ='$pwd' WHERE email = '$email' ")){
    echo "<script>alert('usuario alterado com sucesso');</script>";
    echo "<meta http-equiv='refresh' content ='0, url= cliente.php'>";

  }
  else{
    echo "<script>alert('erro ao alterar usuario');history.back();</script>";
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