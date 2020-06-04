<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" type="text/css" href="recuperacao.css"> 
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>To-Do</title>
</head>

<body>
  <form autocomplete="off" method="post" action="recuperacao.php">

  <div class="topnav">
    <a id="btn_home" onClick= "location.href='index.html'">Home</a>
    <a id="btn_registo" onClick= "location.href='registo.php'">Registo</a>
    <a class="active">Login</a>
  </div>

  <div class="form" id="forma" autocomplete="off" >
    <h1>Recuperação</h1>
    <input type="text" id="login_email" name="txt_email" placeholder="Endereço de E-mail">
      <input type="submit" name="submit" id="btn_aceitar"  value="Done" onclick="validar()"> 
      <input type="button" id="btn_cancelar"  value="Voltar" onClick= "location.href='login.php'">
  </div>


  <script src="login.js" type="text/javascript"></script> 

  </form>
</body>
</html>

<?php
// Starting Session
session_start(); 
include "connection.php";
$hash = (ROUND((RAND()* 10000),0));
if(!empty($_POST)) {
    $result = mysqli_query($conn,"UPDATE registo SET PASSWORD = '$hash' WHERE Email='" .$_POST["txt_email"] . "'");
    print_r($result);

    $Email = $_POST["txt_email"];

      $to = $Email;
      $subject = "To-Do";
      $txt = "  A sua nova password: $hash";
      $headers = "From: to-do@ismai.pt" . "\r\n" .
    "CC: to-do-team@ismai.pt";
      mail($to,$subject,$txt,$headers);
      header("Location: login.php");
    }
    $conn->close();
?>