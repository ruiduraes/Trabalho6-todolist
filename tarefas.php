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

if($mysqli->connect_errno > 0){
  die('Unable to connect to database [' . $mysqli->connect_error . ']');
  }
  
$query ="SELECT * FROM tarefa WHERE id_user = $id_user";

if(!$result = $mysqli->query($query)){
    die('There was an error running the query [' . $mysqli->error . ']');
}
$t = $result -> fetch_all(PDO::FETCH_ASSOC);
while($row = $result->fetch_assoc()){
  $tarefas = $row['descricao'];
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
    <ul id="myUL">
    <?php foreach ($t as $tarefa)
      {
      echo '<a href="selecionar.php?id='.$tarefa[0].'" id="btn_selecionar" style="float:left">Selecionar</a>';
      echo '<li>'. $tarefa[1];
      echo '<a href="eliminar.php?id='.$tarefa[0].'" id="btn_eliminar" style="float:right">Eliminar</a>';
      echo '</li>';
      echo '<br>';
      }
    ?>
    </ul  ><!--Onde as tarefas serão guardadas-->
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



if(!empty($_POST)) {
  $descricao = $_POST["descricao"];
  mysqli_query($conn,"INSERT INTO tarefa (descricao, id_user) values ('$descricao','$id_user')");
  header("Location: landing.php");
}

  
?>