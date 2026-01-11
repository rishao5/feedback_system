<?php
// 1️⃣ Database connection
$conn = new mysqli("localhost", "root", "", "feedback_system");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// 2️⃣ Fetch all feedback data
$sql = "SELECT * FROM feedback";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>All Feedbacks</title>
    <style>
        table {
            border-collapse: collapse;
            width: 80%;
            margin: 20px auto;
        }
        th, td {
            border: 1px solid #000;
            padding: 10px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
        h2 {
            text-align: center;
        }
    </style>
</head>
<body>

<h2>All Feedbacks</h2>

<table>
<tr>
    <th>ID</th>
    <th>Name</th>
    <th>Email</th>
    <th>Department</th>
    <th>Feedback</th>
</tr>

<?php
if ($result->num_rows > 0) {
    // 3️⃣ Display each row
    while($row = $result->fetch_assoc()) {
        echo "<tr>
            <td>{$row['id']}</td>
            <td>{$row['name']}</td>
            <td>{$row['email']}</td>
            <td>{$row['department']}</td>
            <td>{$row['feedback']}</td>
        </tr>";
    }
} else {
    echo "<tr><td colspan='5'>No feedback found</td></tr>";
}
$conn->close();
?>

</table>

</body>
</html>
