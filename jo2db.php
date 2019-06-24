<?php
session_start();
$username=filter_input(INPUT_POST,'username');
$locations=filter_input(INPUT_POST,'locations'); 
$conn =new mysqli("localhost","root","","jo2") or die(mysqli_error($conn));

$id=0; // for update
$update=false;
$username='';
$locations='';

if(isset($_POST['save'])){
    $username=$_POST['username'];
    $locations=$_POST['locations'];

    $conn->query("INSERT INTO users(username,locations)values
    ('$username','$locations')")or
    die($conn->error);

    $_SESSION['message']="Record has been saved";
    // $_SESSION['msg_type']="success";

    header("location:jo2.php");
}

if(isset($_GET['delete'])){
    $id=$_GET['delete'];
    $conn->query("DELETE FROM users WHERE id=$id")or die(mysqli_error());
  
    $_SESSION['message']="Record has been deleted";
    // $_SESSION['msg_type']="danger";
    header("location:jo2.php");
}
if(isset($_GET['edit'])){
    $id=$_GET['edit'];
    $update=true;
    $result=$conn->query("SELECT * FROM users WHERE id=$id")or
    die($conn->error());

    if(count($result)==1){  // found data in database
        $row=$result->fetch_array();
        $username=$row['username'];
        $locations=$row['locations']; 
    }
}
if(isset($_POST['update'])){
    $id=$_POST['id'];
    $username=$_POST['username'];
    $locations=$_POST['locations'];

    $conn->query("UPDATE users SET username='$username', locations='$locations' WHERE id=$id ")or
    die($conn->error);
    $_SESSION['message']="Recored has been updated";

    header('location: jo2.php');
}

?>