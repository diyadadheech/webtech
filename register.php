<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the form data
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];

    // Simple validation
    if (empty($username) || empty($email) || empty($password)) {
        echo 'All fields are required!';
        exit;
    }

    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Database connection (replace with your own)
    $servername = "localhost";
    $username_db = "root"; // your db username
    $password_db = ""; // your db password
    $dbname = "your_database_name";

    // Create connection
    $conn = new mysqli($servername, $username_db, $password_db, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Insert data into the database
    $sql = "INSERT INTO users (username, email, password, phone) VALUES ('$username', '$email', '$hashedPassword', '$phone')";

    if ($conn->query($sql) === TRUE) {
        echo 'success';
    } else {
        echo 'Error: ' . $conn->error;
    }

    // Close connection
    $conn->close();
}
?>
