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
  <link rel="stylesheet" type="text/css" href="tarefas.css"> <!--Juncao com a pagina css-->
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>To-Do</title>
</head>

<body>

  <div class="topnav">
    <a type="button" class="active">Tarefas</a>
    <a type="button" id="btn_perfil" onClick= "location.href='perfil.php'">Perfil</a>
    <a type="button" id="btn_logout" onClick= "location.href='index.html'">Logout</a>
  </div>

  <div id="name">
    <p> Bem vindo, <?=$nome?> <?=$sobrenome?></p>
  </div>

  <form class="form" id="forma" autocomplete="off" method="post" action="tarefas.php"><!--Cria a forma-->       
    <h1>Lista To-Do</h1>
    <div id="myDIV" class="header">
      <input type="text" name="descricao" id="myInput" placeholder="Adicione aqui a sua tarefa...">
      <button type="submit" id="btn_adicionar" class="addBtn">Adicionar</button>
    </div>
    <p>Tarefa: <?=$descricao?></p>
    <ul id="myUL"></ul><!--Onde as tarefas serão guardadas-->
  </form>
        
  <script src="inicio.js"></script>

</body>
</html>

<?php
include "connection.php";
$username = "root"; 
$password = ""; 
$database = "to-do"; 
$mysqli = new mysqli("localhost", $username, $password, $database); 

$query = "SELECT * FROM tarefa WHERE id_user = $id_user " ;

if(!empty($_POST)) {


$descricao = $_POST["descricao"];

mysqli_query($conn,"INSERT INTO tarefa (descricao, id_user) values ('$descricao','$id_user')");



    
}
?>