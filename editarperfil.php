

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="editarperfil.css"> <!--Juncao com a pagina css-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>To-Do</title>
</head>

<body>

  <div class="topnav">
    <a type="button" id="btn_tarefas" onClick= "location.href='tarefas.php'">Tarefas</a>
    <a type="button" id="btn_perfil" class="active">Perfil</a>
    <a type="button" id="btn_logout" onClick= "location.href='logout.php'">Logout</a>
  </div>


  <h1>Alterar Dados Pessoais</h1>

  <form class="form" id="formaPerfil" autocomplete="off" method="POST" action="editarperfil.php"><!--Cria a forma-->
  <table class = "tabela">

    <input type="text" name="editar_nome"  placeholder="Nome" onkeypress="letras(event)" maxlength="40">
    <input type="text" name="editar_sobrenome"  placeholder="Sobrenome" onkeypress="letras(event)" maxlength="40">
    <input type="text" name="editar_cidade"  placeholder="Cidade" onkeypress="letras(event)" maxlength="40">
    <input type="text" name="editar_telefone"  placeholder="Telefone" onkeypress="numeros(event)" minlenght="9" maxlength="9">
    <input type="password" name="editar_password"  placeholder="Password">
    <input type="password" name="editar_password2"  placeholder="Repita a Password">
    <input type="submit" name="submit" id="btn_aceitar" value="Alterar"> 
  </table>       
  </form>

        
  <script src="registo.js"></script>

</body>
</html>

<?php
//ini_set('display_errors', 0);
session_start();
include "connection.php";

$id_user = $_SESSION['id_user'];

$username = "root"; 
$password = ""; 
$database = "to-do"; 
$mysqli = new mysqli("localhost", $username, $password, $database); 
$query = "SELECT * FROM registo WHERE id = $id_user " ;

if ($result = $mysqli->query($query)) {
    while ($row = $result->fetch_assoc()) {
        $nome = $row['Nome'];
        $sobrenome = $row["Sobrenome"];
        $cidade = $row['Cidade'];
        $telefone = $row['Telefone'];
        $password = $row['PASSWORD'];
    }
    $result->free();
} 

if(!empty($_POST['editar_nome'])){
    $editar_nome = $_POST['editar_nome'];
}else{
    $editar_nome = $nome;
}

if(!empty($_POST['editar_sobrenome'])){
    $editar_sobrenome = $_POST['editar_sobrenome'];
}else{
    $editar_sobrenome = $sobrenome;
}

if(!empty($_POST['editar_cidade'])){
    $editar_cidade = $_POST['editar_cidade'];
}else{
    $editar_cidade = $cidade;
}

if(!empty($_POST['editar_telefone'])){
    $editar_telefone = $_POST['editar_telefone'];
}else{
    $editar_telefone = $telefone;
}

if(!empty($_POST['editar_password']) && $_POST['editar_password'] == $_POST['editar_password2']){
    $editar_password = $_POST['editar_password'];
}else{
    $editar_password = $password;
}



mysqli_query($conn,"UPDATE registo SET nome = '$editar_nome', sobrenome='$editar_sobrenome', cidade='$editar_cidade', telefone='$editar_telefone', password='$editar_password' WHERE id = $id_user ");

if(mysqli_affected_rows($conn)!= 0){
    header("location: perfil.php");
}

    
      



?>




