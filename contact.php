<?php
session_start();
if($_SESSION['id_user'] == ''){
  header("location: index.html");
}
$id_user = $_SESSION['id_user'];

$username = "root"; 
$password = ""; 
$database = "to-do"; 
$mysqli = new mysqli("localhost", $username, $password, $database); 
$query = "SELECT * FROM registo WHERE id = $id_user " ;

$to = "to-do@ismai.pt";
$subject = "Contacto";
$txt = "qlqcoisa@gmail.com";
$headers = $id_user . "\r\n" .
"CC:qqq@gmail.com";
$sendmail_from = "ze@gmail.com";

mail($to,$subject,$txt,$headers,$sendmail_from);

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" type="text/css" href="tarefas.css"> <!--Juncao com a pagina css-->
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>To-Do</title>
</head>

<body>
  
<div class="topnav">
  <a type="button" id="btn_tarefas" onClick= "location.href='Tarefas.php'">Tarefas</a>
  <a type="button" id="btn_perfil" onClick= "location.href='perfil.php'">Perfil</a>
  <a type="button" class="active">Contacte-nos</a>
  <a type="button" id="btn_logout" onClick= "location.href='index.html'">Logout</a>
</div>

<form class="form" id="forma" autocomplete="off" method="post" action="contact.php"><!--Cria a forma-->       
  <h1>Contacte-nos</h1>
    <input type="text" id="assunto" placeholder="Qual o assunto?">
    <span onclick="newElement()" type="submit" class="addBtn">Adicionar</span>
    <ul id="myUL"><!--Onde as tarefas serão guardadas--></ul>
</form>

<script src="inicio.js"></script>

</body>
</html>
