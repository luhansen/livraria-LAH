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
     <?php
    $sql = mysql_query("SELECT * FROM produto WHERE preco IS NOT NULL");
    $i = 1;

   while ($exibe = mysql_fetch_assoc($sql)) {
    $email = $exibe['email'];

    $sql_usu = mysql_query("SELECT * FROM usuario WHERE email = '$email'");

    $exibe_usu = mysql_fetch_assoc($sql_usu);

    ?>
    <div id="anuncios">
      <?php
      echo "<h3>Anuncio $i</h3> ";
      ?>
      <form method="post" action="?go=atualizar">
        <table id="esq">
          <tr>
          <td>Nome Proprietario</td>
            <td><p id="anuncio"><?php echo $exibe_usu['nome'] . " " . $exibe_usu['sobrenome']; ?></p></td>
          </tr>
          <tr>
          <td>Cidade</td>
            <td><p id="anuncio"><?php echo $exibe_usu['cidade']; ?></p></td>
          </tr>
          <tr>
          <td>Estado</td>
            <td><p id="anuncio"><?php echo $exibe_usu['estado']; ?></p></td>
          </tr>
          <tr>
            <td>EMAIL</td>
            <td><p id="anuncio"><?php echo $exibe_usu['email']; ?></p></td>
          </tr>
          <tr>
            <td>Titulo</td>
            <td><p id="anuncio"><?php echo $exibe['titulo_anuncio']; ?></p></td>
          </tr>
          <tr>
            <td>descricao</td>
            <td><p id="anuncio"><?php echo $exibe['descricao_anuncio']; ?></p></td>
          </tr>
          <tr>
            <td>Categoria</td>
            <td><p id="anuncio"><?php echo $exibe['categoria_anuncio']; ?></p></td>
          </tr>
        </table>
        <table id = "dir">
          <tr>
            <td> preco</td>
            <td><p id="anuncio"><?php echo $exibe['preco']; ?></p></td>
          </tr>
        </table>
       </form>
     </div>
  </body>
</html>
<?php
 $i = $i+1;
    }
?>
<?php
if (@$_GET['vai']=='sair') {
  # code...
  unset($_SESSION['user_session']);
  unset($_SESSION['pwd_session']);
  header ("Location: LAH.html");
}
}
?>