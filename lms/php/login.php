<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "practice";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $loginUsername = $_POST['username'];
    $loginPassword = $_POST['password'];

    // Perform a query to check if the user exists in the database
    $sql = "SELECT * FROM registration_1 WHERE (username = ? OR email = ?) AND password = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $loginUsername, $loginUsername, $loginPassword);
    $stmt->execute();
    $result = $stmt->get_result();
    //echo "$result->num_rows";
    if ($result->num_rows >= 1) {
        // Successful login
        $_SESSION['loggedin'] = true;
        echo 'success';
    } else {
        // Invalid login
        echo 'failure';
    }

    $stmt->close();
    $conn->close();
}
?>
