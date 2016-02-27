<?php
session_start();
require_once "config.php";
if (!isset($_SESSION['user_session']) && !isset($_SESSION['pwd_session'])) {
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
          <li><a href="cadastro.php">cadastrar</a></li>
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
      <h3>Bem vindo a sua biblioteca vitual</h3>
      <h5>insera os dados para entrar em sua conta</h5>
      <form method="post" action="?go=entrar">
        <table id="centro">
          <tr>
            <td>email</td>
            <td><input type="text" name="email" id="txt" /></td>
          </tr>
          <tr>
            <td>Senha</td>
            <td><input type="password" name="senha" maxlength ="15" id="txt"/></td>
          </tr>
          <tr>
          	<td claspan ="2"><input type="submit" value="entrar" id="button" /></td>
        	</tr>
        </table>
      </form>
    </div>
  </body>
</html>
</body>
</html>


<?php
}else{
  echo "<meta http-equiv = 'refresh' content = '0, cliente.php'>";
  # code...
}
?>

<?php
if(@$_GET['go'] == 'entrar'){
  $email = $_POST['email'];
  $pwd = $_POST['senha'];

  if(empty($email)||empty($pwd)){
    echo "<script>alert('preencha todos os campos para entrar na sua conta');history.back();</script>";
  }
  else{
    $query1 = mysql_num_rows(mysql_query("SELECT * FROM USUARIO WHERE email = '$email' AND senha = '$pwd'"));
    if ($query1 == 1) {
      $_SESSION['user_session'] = $email;
      $_SESSION['pwd_session'] = $pwd;
      echo "<script>alert('usuario logado com sucesso');</script>";
      echo "<meta http-equiv='refresh' content ='0, cliente.php'>";
      # code...*/
    }else{
       echo "<script>alert('usuario e/ou senha incorretos'); history.back();</script>";
    }
  }

}

?>