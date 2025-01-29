<?php
include '../model/connection.php';
session_start();
if(isset($_POST['create_post'])){
    if($_SESSION['user_id']){
        $userid=$_SESSION['user_id'];
    $caption = $_POST['caption'];
$filename=basename($_FILES['image']['name']);
    $filedir='../uplodes/';
    $filepath=$filedir.$filename;
    if(move_uploaded_file($_FILES['image']['tmp_name'], $filepath)){
echo "file uploded succesfully";
    }
    else{
        echo "failed";
    exit();
}
    
    $sql = "insert into post (postImageurl ,postCaption,userID)
    values
    ('$filepath','$caption','$userid')";
    $result=mysqli_query($conn,$sql);
    if($result){
        echo "added";
        header('Location: ../view/home.html');
    }
    else{
        echo "not added".mysqli_error($conn);
    }}
}
    else{
        echo "user not logged in";
    }
    ?>