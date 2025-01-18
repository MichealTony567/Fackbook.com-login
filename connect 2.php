<?php
$email = $_POST['email'];
$password = $_POST['password'];

// connect to the database
$conn = new mysqli('localhost','root','','project');
if($conn->connect_error){
    die("Connection Failed : ". $conn->connect_error);
}else{
    $stmt = $conn->prepare("insert into registration(email, password)
    values(?, ?)");
    $stmt->blind_param("ss",$email, $password);
    $stmt->execute();
    echo "Successfully Login...";
    $stmt->close();
    $conn->close();
}

?>