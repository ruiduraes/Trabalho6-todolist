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
    <p id="bemvindo"> Bem vindo, <?=$nome?> <?=$sobrenome?></p>
  </div>

  <h1>Dados Pessoais</h1>

  <form class="form" id="formaPerfil" autocomplete="off"><!--Cria a forma-->
  <table class = "tabela">
    <tr>
      <td>
        <p>Nome: <?=$nome?> <?=$sobrenome?></p>
        <p>Email: <?=$email?></p>
        <p>Cidade: <?=$cidade?></p>
        <p>Telefone: <?=$telefone?></p>
      </td>
      <td>
        <img src="user.png"  id="boneco">
        <div class="myImage">
          <input type="file" name="myImage" accept="do.utilizador.png" />
        </div>
    </td> 
    </tr>
  </table>       
  </form>

        
  <script src="inicio.js"></script>

</body>
</html>




