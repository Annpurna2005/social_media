<?php
include '../model/connection.php';
session_start();

if(isset($_POST['login']))  {
    $password = md5($_POST['password']);
    $email = $_POST['email'];

    // Use prepared statements to prevent SQL injection
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ? AND password = ?");
    $stmt->bind_param("ss", $email, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && $result->num_rows > 0) {
        // Fetch user data
        $user = $result->fetch_assoc();

        // Save user data to the session
        $_SESSION['user_id'] = $user['userID'];
       
        $response['message'] = "Login successful";
        $response['user'] = [
            'id' => $user['userID'],
            'email' => $user['email'],
            'name' => $user['name']
        ];
        header("Location: ../view/home.html");
    } else {
        // Handle invalid credentials
        $response['message'] = "Login not successful: Invalid credentials";
    }
} else {
    $response['message'] = "Invalid request";
}

// Return the response as JSON
echo json_encode($response);

?>
