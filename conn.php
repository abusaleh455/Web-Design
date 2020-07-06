<?php
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$message = $_POST['message'];

//Creat database
$conn = new mysqli('localhost','root','','mydatabase');
if($conn->connect_error){
    echo "$conn->connect_error";
    die("Connection Failed : ". $conn->connect_error);
} else
    { $stmt = $conn->prepare("insert to registration(name,email,phone,message)
values(?,?,?,?)");
        $stmt->bind_param("ssis", $name, $email, $phone, $message);
        $execval = $stmt->execute();
        echo $execval;
        echo "Registration successfully...";
        $stmt->close();
        $conn->close();
}