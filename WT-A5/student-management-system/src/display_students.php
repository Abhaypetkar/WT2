<?php
require_once 'config/database.php';

function displayStudents($conn) {
    $query = "SELECT * FROM students";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    
    $students = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    if (count($students) > 0) {
        echo "<table border='1'>";
        echo "<tr><th>ID</th><th>Name</th><th>Age</th><th>Actions</th></tr>";
        foreach ($students as $student) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($student['id']) . "</td>";
            echo "<td>" . htmlspecialchars($student['name']) . "</td>";
            echo "<td>" . htmlspecialchars($student['age']) . "</td>";
            echo "<td>
                    <a href='update_student.php?id=" . htmlspecialchars($student['id']) . "'>Edit</a>
                    <a href='delete_student.php?id=" . htmlspecialchars($student['id']) . "'>Delete</a>
                  </td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No students found.";
    }
}

$conn = getConnection(); // Assuming getConnection() is a function defined in database.php
displayStudents($conn);
?>