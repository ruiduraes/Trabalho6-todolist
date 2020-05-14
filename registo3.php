<?php
$Nome = $_POST["txt_nome"];
$Sobrenome = $_POST["txt_apelido"];
$Cidade = $_POST["txt_cidade"];
$Telefone = $_POST["txt_telf"];
$Email = $_POST["txt_email"];
$Pass = $_POST["txt_password"];

if (!empty($Nome)) or !empty($Sobrenome) or !empty($Email) or !empty($Password))
{
    $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbName = "to-do";

    //Criar conexao

    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);

    if (mysqli_connect_error()){
        die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
    }
    else {
        $SELECT = "SELECT Email FROM registo WHERE Email = ? Limit 1";
        $INSERT = "INSERT Into registo (Nome, Sobrenome, Cidade, Telefone, Email, Pass) values(?, ?, ?, ?, ?, ?)";
    }

    //Preparar o statement

    $stmt = $conn->prepare($SELECT);
    $stmt->bind_param("s", $Email);
    $stmt->execute();
    $stmt->bind_result("s", $Email);
    $stmt->store_result();
    $rnum = $stmt->num_rows;

    if ($rnum==0) 
    {
        $stmt->close();

        $stmt = $conn->prepare($INSERT);
        $stmt->bind_param("sssiss", $Nome, $Sobrenome, $Cidade, $Telefone, $Email, $Password);
        $stmt->execute();
        echo "Registo concluido com sucesso";
    }
    else{
        echo "O email que introduziu já se encontra registado"
    }
    $stmt->close();
    $conn->close();
}

    else{
        echo "Todos os campos foram preenchidos";
        die();
    }
?>