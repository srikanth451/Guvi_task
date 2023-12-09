<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "localhost";
    $usernameDB = "root";
    $passwordDB = "";
    $dbname = "practice";

    // Establish a MySQL connection
    $conn = new mysqli($servername, $usernameDB, $passwordDB, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $dob = $_POST['dob'];
    $contact = $_POST['contact'];
    $age = $_POST['age'];
    $username = $_POST['username'];
    $email = $_POST['email'];

    $stmt = $conn->prepare("INSERT INTO users (user_name, email, Date_of_Birth, Age, Contact_Number) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $username, $email, $dob, $age, $contact);

    if ($stmt->execute()) {
        echo "Successfully stored to database"; // Changed the response message
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the MySQL connection
    $stmt->close();
    $conn->close();
} else {
    echo "Invalid request";
}
?>
