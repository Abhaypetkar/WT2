<?php
require_once 'config/database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = trim($_POST['name']);
    $age = trim($_POST['age']);

    if (!empty($name) && !empty($age) && is_numeric($age)) {
        $query = "INSERT INTO students (name, age) VALUES (:name, :age)";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':age', $age);

        if ($stmt->execute()) {
            echo "Student added successfully.";
        } else {
            echo "Error adding student.";
        }
    } else {
        echo "Please provide valid name and age.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Student</title>
</head>
<body>
    <h1>Add Student</h1>
    <form method="POST" action="">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>
        <br>
        <label for="age">Age:</label>
        <input type="number" id="age" name="age" required>
        <br>
        <input type="submit" value="Add Student">
    </form>
</body>
</html>