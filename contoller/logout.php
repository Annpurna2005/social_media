<?php
include '../model/connection.php';

    session_unset();
    session_destroy();
    $response['message'] = "Logout successful";
    echo json_encode($response);
    header('Location: http://localhost/social_media/view/login.html');
?>