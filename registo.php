<!DOCTYPE html>
<html lang="en">
  <head>
      <link rel="stylesheet" type="text/css" href="registo.css"> 
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <title>Registo</title>
  </head>

  <body>
    <form autocomplete="off" method="post" action="registo.php" >

    <div class="topnav">
      <a id="btn_home" onClick= "location.href='index.html'">Home</a>
      <a class="active">Registo</a>
      <a id="btn_login" onClick= "location.href='login.php'">Login</a>
    </div>
    
    <div class="form" id="forma" autocomplete="off" >
        <h1>Registo</h1>
        <h5>* Opcional</h5>     
        <input type="text" id="txt_nome" name="txt_nome" half placeholder="Nome" onkeypress="letras(event)" maxlength="20">
        <input type="text" id="txt_apelido" name="txt_apelido" half placeholder="Sobrenome" onkeypress="letras(event)" maxlength="20">
        <input type="text" id="txt_cidade" name="txt_cidade" half placeholder="* Cidade"> 
        <input type="text" id="txt_telf" name="txt_telf" half placeholder="* Telefone" onkeypress="numeros(event)" minlenght="9" maxlength="9">
        <input type="text" id="txt_email" name="txt_email" placeholder="Endereço de E-mail">
        <input type="password" id="txt_password" name="txt_password" half placeholder="Password"> 
        <input type="password" id="txt_password_2" name="txt_password2" half placeholder="Repita a Password">
        <input type="submit" id="btn_aceitar" name="baseDados" value="Feito" onclick="validar()"> 
        <input type="button" id="btn_limpar" value="Limpar" onClick = "Limpar()"> 
        <input type="button" id="btn_cancelar" value="Voltar" onClick= "location.href='index.html'" ></input> 
    </div>

    <script src="registo.js" type="text/javascript"></script> 

    </form>
  </body>
</html>


<?php

$Nome = filter_input(INPUT_POST, 'txt_nome');
$Sobrenome = filter_input(INPUT_POST, 'txt_apelido');
$Cidade = filter_input(INPUT_POST, 'txt_cidade');
$Telefone = filter_input(INPUT_POST, 'txt_telf');
$Email = filter_input(INPUT_POST, 'txt_email');
$Pass = filter_input(INPUT_POST, 'txt_password');
$Pass2 = filter_input(INPUT_POST, 'txt_password2');

if (!empty($Pass)){
if (!empty($Email)){
if (!empty($Nome)){
if (!empty($Sobrenome)){
if ($Pass == $Pass2){
$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "to-do";
// Cria conexao
$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);

if (mysqli_connect_error()){
  die('Connect Error ('. mysqli_connect_errno() .') '
. mysqli_connect_error());
} else{
$sql = "INSERT INTO registo (Nome, Sobrenome, Cidade, Telefone, Email, Password)
values ('$Nome','$Sobrenome', '$Cidade', '$Telefone', '$Email', '$Pass')";

if ($conn->query($sql)){
  $to = $Email;
  $subject = "To-Do";
  $txt = "$Nome $Sobrenome obrigado por se ter registado!";
  $headers = "From: to-do@ismai.pt" . "\r\n" .
"CC: to-do-team@ismai.pt";

  mail($to,$subject,$txt,$headers);
  header("Location: login.php");
} else{
echo "Error: ". $sql ."
". $conn->error;
}
$conn->close();
}
}
else{
die();
}
}
else{
die();
}
}
else{
die();
}
}
else{
die();
}
}
else{
die();
}
?>