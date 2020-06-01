<!DOCTYPE html>
<html lang="en">
  <head>
      <link rel="stylesheet" type="text/css" href="login2.css"> 
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <title>To-Do</title>
  </head>

  <body>
    <form autocomplete="off" method="post" action="verificado.php">


    <div class="form" id="forma" autocomplete="off" >
      <h1>Confirmação de Email</h1>
      <input type="text" id="login_email" name="txt_email" placeholder="Endereço de E-mail">
       <input type="submit" name="submit" id="btn_aceitar"  value="Feito" onclick="validar()"> 
    </div>

   <script src="login.js" type="text/javascript"></script> 

      </form>
  </body>
</html>
<?php
// Starting Session
session_start();
include "connection.php";

if(!empty($_POST)) {
  $result = mysqli_query($conn,"SELECT Email, verificado FROM registo Where Email='" .$_POST["txt_email"] . "'");

  $count = mysqli_num_rows($result);
  $user = $result->fetch_assoc();
  $Email = $_POST["txt_email"];
  if($count==0) {
    echo  "<script>alert('Email Inválido');</script>";
  }else{
      mysqli_query($conn,"UPDATE registo SET verificado = TRUE WHERE Email = '$Email' ");
      echo  "<script>alert('Email verificado com sucesso');</script>";
      header("location: login.php");
      
  }
}






?>