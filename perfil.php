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
      <a type="button" id="btn_tarefas" onClick= "location.href='tarefas.php'">Tarefas</a>
      <a type="button" class="active">Perfil</a>
      <a type="button" id="btn_logout" onClick= "location.href='inicio.html'">Logout</a>
    </div>

    <form class="form" id="forma" autocomplete="off"><!--Cria a forma-->       
    <h1>Dados Pessoais</h1>


    <input type="file"></input>
    
  </form>
        
    <script src="inicio.js">
    </script>

  </body>
  </html>

<?php

session_start();
$username = "root"; 
$password = ""; 
$database = "to-do"; 
$mysqli = new mysqli("localhost", $username, $password, $database); 
$query = "SELECT * FROM registo WHERE Email = $name " ;
 
 
 
if ($result = $mysqli->query($query)) {
    while ($row = $result->fetch_assoc()) {
        $Email = $row['Email'];
        $id = $row["id"];
        
        echo $Email;
              
    }
    $result->free();
} 




?>



