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
       <input type="submit" name="submit" id="btn_aceitar"  value="Login" onclick="validar()"> 
    </div>

   <script src="login.js" type="text/javascript"></script> 

      </form>
  </body>
</html>
<?php
// Starting Session
session_start(); 

$username = "root"; 
$password = ""; 
$database = "to-do"; 
$mysqli = new mysqli("localhost", $username, $password, $database); 
$query = "UPDATE registo SET verificado = True WHERE Email = $; " ;




        //var_dump($user['Email']);
        header("location: login.php");


?>