<?php

include "connection.php";
$username = "root"; 
$password = ""; 
$database = "to-do"; 
$mysqli = new mysqli("localhost", $username, $password, $database); 

$id_tarefa = $_GET['id'];

mysqli_query($conn,"SELECT * From tarefa WHERE id_tarefa = $id_tarefa ");

$result = $mysqli->query($query);

//mysqli_query($conn,"UPDATE registo SET selecionado = 1 WHERE id = $id_user ");

//header("location: tarefas.php");

print_r($result)
?>
