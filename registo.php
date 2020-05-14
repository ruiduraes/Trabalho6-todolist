<!DOCTYPE html>
<html lang="en">
<form autocomplete="off" method="post" action="registo.php">
<head>
    <link rel="stylesheet" type="text/css" href="registo.css"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registo</title>
</head>

<body>
  <div>   
      <h1>Registo</h1>
      <h2>* Opcional</h2>     
      <input type="text" id="txt_nome" name="txt_nome" half placeholder="Nome" onkeypress="Letras(event)" maxlength="20">
      <input type="text" id="txt_apelido" name="txt_apelido" half placeholder="Sobrenome" onkeypress="Letras(event)" maxlength="20">
      <input type="text" id="txt_cidade" name="txt_cidade" half placeholder="* Cidade"> 
      <input type="text" id="txt_telf" name="txt_telf" half placeholder="* Telefone" onkeypress="Numeros(event)" minlenght="9" maxlength="9">
      <input type="text" id="txt_email" name="txt_email" placeholder="Endereço de E-mail">
      <input type="password" id="txt_password" name="txt_password" half placeholder="Password"> 
      <input type="password" id="txt_password_2" name="txt_password2" half placeholder="Repita a Password">
      <input type="submit" id="btn_aceitar" name="baseDados" value="Feito" onclick="Validar()" > 
      <input type="button" id="btn_limpar" value="Limpar" onClick = "Limpar()"> 
      <input type="button" id="btn_cancelar" value="Voltar" onClick= "location.href='inicio.html'" ></input> 
  </div>

  <script src="registo.js">
    function Numeros();
    function Letras();
    function Limpar();
    function Validar();
  </script> 
</body>
</form>
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
}
else{
$sql = "INSERT INTO registo (Nome, Sobrenome, Cidade, Telefone, Email, Password)
values ('$Nome','$Sobrenome', '$Cidade', '$Telefone', '$Email', '$Pass')";
if ($conn->query($sql)){

    header("Location: login.html");
}
else{
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
