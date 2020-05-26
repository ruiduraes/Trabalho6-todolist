<!DOCTYPE html>
<html lang="en">
<form autocomplete="off" method="post" action="login.php">
<head>
    <link rel="stylesheet" type="text/css" href="login.css"> 
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>To-Do</title>
</head>

<body>
  <div>   
      <h1>Login</h1>
      <input type="text" id="login_email" name="txt_email" placeholder="Endereço de E-mail">
      <input type="password" id="login_password" name="txt_password" placeholder="Password">
      <input type="submit" name="submit" id="btn_aceitar"  value="Login" onclick="Validar()"> 
      <input type="button" id="btn_cancelar"  value="Voltar" onClick= "location.href='inicio.html'" ></input> 
  </div>

  <script src="login.js">
      function Validar();
  </script> 
</body>
</form>
</html>

<?php
session_start(); // Starting Session
$error = ''; // Variable To Store Error Message
if (isset($_POST['submit'])) {
if (empty($_POST['txt_email']) || empty($_POST['txt_password'])) {
  die(header("location: login.php"));
}
else{
// Define $username and $password
$Email = $_POST['txt_email'];
$Pass = $_POST['txt_password'];
// mysqli_connect() function opens a new connection to the MySQL server.
$conn = mysqli_connect("localhost", "root", "", "to-do");
// SQL query to fetch information of registerd users and finds user match.
$query = "SELECT Email, password from registo where Email=? AND password=? LIMIT 1";
// To protect MySQL injection for Security purpose
$stmt = $conn->prepare($query);
$stmt->bind_param($Email, $Pass);
$stmt->execute();
$stmt->bind_result($Email, $Pass);
$stmt->store_result();
if($stmt->fetch()) //fetching the contents of the row {
$_SESSION['txt_email'] = $Email; // Initializing Session
header("location: inicio.html"); // Redirecting To Profile Page
}

}
?>