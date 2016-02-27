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
          <li><a href="?go=sair">sair</a></li>
       </ul>
        <ul class="pull-left">
          <li><a href="venda.php">Comprar</a></li>
          <li><a href="anunciar.php">Anunciar</a></li>
          <li><a href="troca.php">Trocar</a></li>
        </ul>
      </div>
    </div>
<div class="jumbotron">
      <div class="container">
        <h1>Livros LAH.</h1>
        <p>De um destino melhor para seus livros.</p>
      </div>
    </div> 

    <div class="learn-more">
	  <div class="container">
		<div class ="row">
	      <div class= "col-md-4">
			<h3>Comprar</h3>
			<p>Aquele livro que voce tanto deseja esta aqui</p>
			<p><a href="venda.php">ache seu livro</a></p>
	      </div>
		  <div class ="col-md-4">
			<h3>Anunciar</h3>
			<p>Nao quer mais um livro? Precisa de espaco na estante? Aproveite e ganhe dinheiro com isso</p>
			<p><a href="anunciar.php">anuncie seu livro aqui</a></p>
		  </div>
		  <div class = "col-md-4">
			<h3>Trocar</h3>
			<p>Nao quer mais seu livro e esta louco para saber o final de uma outra historia? Troque seu livro com usuarios, e saiam os dois ganhando.</p>
			<p><a href="troca.php">Troque e saia ganhando</a></p>
		  </div>
	    </div>
	  </div>
	</div>
  </body>
</html>
<?php
}

if (@$_GET['go']=='sair') {
  # code...
  unset($_SESSION['user_session']);
  unset($_SESSION['pwd_session']);

  header ("Location: LAH.html");
}
?>