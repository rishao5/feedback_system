<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Connect to database
$conn = new mysqli("localhost", "root", "", "feedback_system");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$name = $_POST['name'];
$email = $_POST['email'];
$department = $_POST['department'];
$feedback = $_POST['feedback'];

// Insert into table
$sql = "INSERT INTO feedback (name, email, department, feedback)
        VALUES ('$name', '$email', '$department', '$feedback')";

if ($conn->query($sql) === TRUE) {
    echo "<h3 style='text-align:center; color:green;'>✅ Feedback Submitted Successfully</h3>";
    echo "<p style='text-align:center;'><a href='index.html'>Go Back</a> | <a href='view.php'>View Feedback</a></p>";
} else {
    echo "❌ Error: " . $conn->error;
}

$conn->close();
?>

