<?php
session_start();
include 'config.php';

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $education = $_POST['education'];
    $experience = $_POST['experience'];
    $skills = $_POST['skills'];

    $query = "UPDATE resume SET name='$name', email='$email', phone='$phone', education='$education', experience='$experience', skills='$skills' WHERE id=1";
    $conn->query($query);
}

$query = "SELECT * FROM resume WHERE id=1";
$result = $conn->query($query);
$data = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
 <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>Admin Dashboard</h1>
    <form method="POST">
        <input type="text" name="name" value="<?php echo $data['name']; ?>" required>
        <input type="email" name="email" value="<?php echo $data['email']; ?>" required>
        <input type="text" name="phone" value="<?php echo $data['phone']; ?>">
        <textarea name="education"><?php echo $data['education']; ?></textarea>
        <textarea name="experience"><?php echo $data['experience']; ?></textarea>
        <textarea name="skills"><?php echo $data['skills']; ?></textarea>
        <button type="submit">Update</button>
    </form>
    <a href="logout.php">Logout</a>
</body>
</html>