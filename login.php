
<?php
session_start(); // Starting Session
$error = ''; // Variable To Store Error Message
if (isset($_POST['submit'])) {
if (empty($_POST['txt_email']) || empty($_POST['txt_password'])) {
  die(header("location: login.html"));
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