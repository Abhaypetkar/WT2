<?php
require_once 'config/database.php';
require_once 'models/Student.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $age = $_POST['age'];

    $student = new Student($id, $name, $age);
    $student->update();

    header("Location: display_students.php");
    exit();
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $student = new Student($id);
    $studentData = $student->find();
} else {
    header("Location: display_students.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Student</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <h1>Update Student</h1>
    <form action="update_student.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $studentData['id']; ?>">
        <label for="name">Name:</label>
        <input type="text" name="name" value="<?php echo $studentData['name']; ?>" required>
        <label for="age">Age:</label>
        <input type="number" name="age" value="<?php echo $studentData['age']; ?>" required>
        <button type="submit">Update</button>
    </form>
    <a href="display_students.php">Back to Student List</a>
</body>
</html>