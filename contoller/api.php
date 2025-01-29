<?php
include '../model/connection.php';

if(isset($_POST['Submit'])){
    
    $name = $_POST['name'];
    $email = $_POST['email'];
    $number = $_POST['number'];
    $bio = $_POST['bio'];
    $password= md5($_POST['password']);
    $filename=basename($_FILES['image']['name']);
    $filedir='../uplodes/';
    $filepath=$filedir.$filename;
    if(move_uploaded_file($_FILES['image']['tmp_name'], $filepath)){
echo "file uploded succesfully";
    }
    else{
        echo "failed";
    }
    $sql = "insert into users (password,email,number,bio,name,imageURL)
    values
    ('$password','$email','$number','$bio','$name','$filepath')";
    $result=mysqli_query($conn,$sql);
    if($result){
        echo "added";
        header("Location: ../view/login.html");
    }
    else{
        echo "not added".mysqli_error($conn);
    }
}
?>