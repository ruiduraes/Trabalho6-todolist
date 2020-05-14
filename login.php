<?php

$Email = $_GET["txt_email"];
$Pass = $_GET["txt_password"];

$host = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "to-do";

//Criar conexao

$conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);

//Preparar o statement

$stmt = $conn->prepare($SELECT);
$stmt->bind_param("s", $Email);
$stmt->execute();
$stmt->bind_result("s", $Email);
$stmt->store_result();
$rnum = $stmt->num_rows;



?>