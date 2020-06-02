<?php

include "connection.php";
$username = "root"; 
$password = ""; 
$database = "to-do"; 
$mysqli = new mysqli("localhost", $username, $password, $database); 

$id_tarefa = $_GET['id'];

$query = "SELECT * From tarefa WHERE id_tarefa = $id_tarefa";

$result = $mysqli->query($query);

$row = $result->fetch_assoc();
$selecionado = $row['selecionado'];

if ($selecionado == 0 || $selecionado == NULL){
    mysqli_query($conn,"UPDATE tarefa SET selecionado = 1 WHERE id_tarefa = $id_tarefa ");
}
else{
    mysqli_query($conn,"UPDATE tarefa SET selecionado = 0 WHERE id_tarefa = $id_tarefa ");
}

header("location: tarefas.php");
?>
