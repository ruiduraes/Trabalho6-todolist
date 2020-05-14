<?php

$Email = $_POST['txt_email'];
$Pass = $_POST['txt_password'];

    $host = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "to-do";
    // Criar conexao
    $conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);
 
    
    $result = mysqli_query("SELECT Email, Password FROM registo WHERE txt_email = '$Email' and txt_password = '$Pass'") 
    or die("Falhou a conexão");
    $row = mysqli_fetch_array($result);
    if ($row['txt_email'] == $Email && $row['txt_password'] == $Pass) {  
        echo "Bem vindo".$row['txt_email'];
    }
    else{
        echo "Não se encontra registado.";
    }


?>