<?php
include '../model/connection.php';
if(isset($_GET['username'])){
    $name=$_GET['username'];
    $sql="SELECT * FROM users where name like '%$name%'";
    $result = mysqli_query($conn,$sql);
    if($result){
        $user=[];
        while($row = mysqli_fetch_assoc($result)){
            $user[]= $row;
        }
        $response['data']=$user;
        echo json_encode($response);
    }
}
else{
   echo json_encode("not found"); 
}

?>