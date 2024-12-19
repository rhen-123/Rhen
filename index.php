<?php
include 'config.php';

$query = "SELECT * FROM resume WHERE id=1";
$result = $conn->query($query);
$data = $result->fetch_assoc();
$error="wrong";
?>

<!DOCTYPE html>
<html>
<head>
    <title>My Resume</title>
 <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1><?php echo $data['name']; ?></h1>
    <p>Email: <?php echo $data['email']; ?></p>
    <p>Phone: <?php echo $data['phone']; ?></p>
    <h2>Education</h2>
    <p><?php echo ($data['education']); ?></p>
    <h2>Experience</h2>
    <p><?php echo ($data['experience']); ?></p>
    <h2>Skills</h2>
    <p><?php echo ($data['skills']); ?></p>
</body>
</html>