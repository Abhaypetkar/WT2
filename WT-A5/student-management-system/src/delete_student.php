<?php
require_once 'config/database.php';

if (isset($_POST['delete'])) {
    $studentId = $_POST['student_id'];

    if (!empty($studentId)) {
        $query = "DELETE FROM students WHERE id = :id";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':id', $studentId);

        if ($stmt->execute()) {
            echo "Student record deleted successfully.";
        } else {
            echo "Error deleting student record.";
        }
    } else {
        echo "Student ID cannot be empty.";
    }
}
?>

<form method="post" action="">
    <label for="student_id">Enter Student ID to Delete:</label>
    <input type="text" name="student_id" id="student_id" required>
    <button type="submit" name="delete">Delete Student</button>
</form>