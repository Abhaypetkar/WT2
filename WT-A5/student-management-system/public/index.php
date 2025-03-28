<?php
require_once '../src/config/database.php';
require_once '../src/models/Student.php';

$action = $_GET['action'] ?? '';

switch ($action) {
    case 'add':
        require_once '../src/add_student.php';
        break;
    case 'delete':
        require_once '../src/delete_student.php';
        break;
    case 'update':
        require_once '../src/update_student.php';
        break;
    case 'display':
    default:
        require_once '../src/display_students.php';
        break;
}
?>