<?php
require_once "config.php";
?>


<html>
<head>
	<title>Cadstro do usuario</title>
</head>

<body>
	<html>

  <head>
    <meta charset="UTF-8">
    <link href="http://s3.amazonaws.com/codecademy-content/courses/ltp/css/shift.css" rel="stylesheet">
    
    <link rel="stylesheet" href="http://s3.amazonaws.com/codecademy-content/courses/ltp/css/bootstrap.css">
    <link rel="stylesheet" href="main.css">
    
  </head>

  <body>
    <div id="titulo">
      <space>
        <a href="LAH.html">Livros LAH</a>
      </space>
    </div>
    <div class="nav">
      <div class="container">
        <ul class= "pull-right">
          <li><a href="cadastros.php">cadastrar</a></li>
          <li><a href="index.php">Entrar</a></li>
        </ul>
        <ul class="pull-left">
          <li><a href="venda_usu.php">Comprar</a></li>
          <li><a href="index.php">Anunciar</a></li>
          <li><a href="troca_usu.php">Trocar</a></li>
        </ul>
      </div>
    </div>

    <div id= "cadastro">
      <h3>Cadastro</h3>
      <form method="post" action="?go=cadastrar">
        <table id="centro">
          <tr>
            <td>Nome</td>
            <td><input type="text" name="nome" id="txt"/></td>
          </tr>
          <tr>
            <td>Sobrenome</td>
            <td><input type="text" name="sobrenome" id="txt"/></td>
          </tr>
          <tr>
            <td>Cidade</td>
            <td><input type="text" name="cidade" id="txt"/></td>
          </tr>
          <tr>
            <td>estado</td>
            <td><input type="text" name="estado" id="txt" /></td>
          </tr>
          <tr>
            <td>email</td>
            <td><input type="text" name="email" id="txt" /></td>
          </tr>
          <tr>
            <td>Senha</td>
            <td><input type="password" name="senha" maxlength ="15" id="txt"/></td>
          </tr>
          <tr>
          	<td claspan ="2"><input type="submit" value="cadastrar" id="button" /></td>
        	</tr>
        </table>
      </form>
    </div>
  </body>
</html>

<?php
if(@$_GET['go'] == 'cadastrar'){
  $nome = $_POST['nome'];
  $sobrenome = $_POST['sobrenome'];
  $cidade = $_POST['cidade'];
  $estado = $_POST['estado'];
  $email = $_POST['email'];
  $pwd = $_POST['senha'];

  if(empty($nome)|| empty($sobrenome)||empty($cidade)||empty($estado)||empty($email)||empty($pwd)){
    echo "<script>alert('preencha todos os campos para se cadastrar');history.back();</script>";
  }
  else{
    $query1 = mysql_num_rows(mysql_query("SELECT * FROM USUARIO WHERE email = '$email'"));
    if ($query1 == 1) {
      echo "<script>alert('usuario já existe'); history.back();</script>";
      # code...
    }else{
      mysql_query("insert into usuario(nome, sobrenome, cidade, estado, email, senha) VALUES ('$nome', '$sobrenome', '$cidade', '$estado', '$email', '$pwd')");
      echo "<script>alert('usuario cadastrado com sucesso)</script>";
      echo "<meta http-equiv='refresh' content ='0, url= index.php'>";

    }
  }

}

?>

