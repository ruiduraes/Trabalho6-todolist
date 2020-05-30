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

//print_r($query);
 
 
if ($result = $mysqli->query($query)) {
    while ($row = $result->fetch_assoc()) {
        $nome = $row['Nome'];
        $sobrenome = $row["Sobrenome"];
        $email = $row['Email'];
        $cidade = $row['Cidade'];
        $telefone = $row['Telefone'];
        //echo $Email;
        //echo '<br>';
        //echo $row['id'];
        //echo '<br>';
        //echo $row['Nome'];
              
    }
    $result->free();
} 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="perfil.css"> <!--Juncao com a pagina css-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>To-Do</title>
</head>

<body>

  <div class="topnav">
    <a type="button" id="btn_tarefas" onClick= "location.href='tarefas.php'">Tarefas</a>
    <a type="button" class="active">Perfil</a>
    <a type="button" id="btn_logout" onClick= "location.href='logout.php'">Logout</a>
  </div>

  <div id="name">
    <p> Bem vindo, <?=$nome?> <?=$sobrenome?></p>
  </div>
    
  <form class="form" id="formaPerfil" autocomplete="off"><!--Cria a forma-->       
    <h1>Dados Pessoais</h1>
    <h2>Nome: <?=$nome?> <?=$sobrenome?></h2>
    <h2>Email: <?=$email?></h2>
    <h2>Cidade: <?=$cidade?></h2>
    <h2>Telefone: <?=$telefone?></h2>

    <input type="file" name="myImage" accept="do.utilizador.png" />
        
  <script src="inicio.js"></script>

</body>
</html>




