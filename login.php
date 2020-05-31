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
  <form autocomplete="off" method="post" action="login.php">

  <div class="topnav">
    <a id="btn_home" onClick= "location.href='index.html'">Home</a>
    <a id="btn_registo" onClick= "location.href='registo.php'">Registo</a>
    <a class="active">Login</a>
  </div>

  <div class="form" id="forma" autocomplete="off" >
    <h1>Login</h1>
    <input type="text" id="login_email" name="txt_email" placeholder="Endereço de E-mail">
      <input type="password" id="login_password" name="txt_password" placeholder="Password">
      <input type="submit" name="submit" id="btn_aceitar"  value="Login" onclick="validar()"> 
      <input type="button" id="btn_cancelar"  value="Voltar" onClick= "location.href='index.html'">
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
    $result = mysqli_query($conn,"SELECT Email, Password,id FROM registo Where Email='" .$_POST["txt_email"] . "' and Password ='" . $_POST["txt_password"]. "'");

    $count = mysqli_num_rows($result);
    $user = $result->fetch_assoc();

    if($count==0) {
      echo  "<script>alert('Credenciais Inválidas');</script>";
    }else{
        $_SESSION['user_email'] = $user['Email'];
        $_SESSION['id_user'] = $user['id'];

        //var_dump($user['Email']);
        header("location: tarefas.php");
    }
}
?>