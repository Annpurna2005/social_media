<?php
include '../model/connection.php';
session_start();
if($_SESSION['user_id']){
    $sql = "select post.postImageurl ,post.postID, post.postCaption , users.name , users.imageURL from post inner join
users on post.userID=users.userID;";
    $result = mysqli_query($conn,$sql);
    $data=[];
    if($result){
        while($row = mysqli_fetch_assoc($result)){
            $data[]= $row;
        }
        $response['posts']= $data;
        echo json_encode($response);

    }
    else{
       $response['message']= "something went wrong";
       echo json_encode($response);
    }
}
else{
   $response['message'] ="user not loggedin" ;
   echo json_encode($response);
}
?>