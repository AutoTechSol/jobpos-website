<?php
// submit-job.php

// Database connection details
$servername = "localhost";
$username = "yourusername";
$password = "yourpassword";
$dbname = "yourdatabase";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data
$jobTitle = $_POST['jobTitle'];
$jobDescription = $_POST['jobDescription'];

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO jobs (title, description) VALUES (?, ?)");
$stmt->bind_param("ss", $jobTitle, $jobDescription);

// Execute statement
if ($stmt->execute()) {
    echo "New job submitted successfully";
} else {
    echo "Error: " . $stmt->error;
}

// Close statement and connection
$stmt->close();
$conn->close();
?>

