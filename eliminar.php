<?php
include "connection.php";
$username = "root"; 
$password = ""; 
$database = "to-do"; 
$mysqli = new mysqli("localhost", $username, $password, $database); 

$id_tarefa = $_GET['id'];

mysqli_query($conn,"DELETE FROM tarefa WHERE id_tarefa = $id_tarefa");

header("location: tarefas.php");
?>