# Student Management System

This project is a simple Student Management System built with PHP. It allows users to manage student records by providing functionality to add, delete, update, and display student information.

## Features

- **Add Student**: Users can add new student records to the database.
- **Delete Student**: Users can delete existing student records based on student ID.
- **Update Student**: Users can update the details of existing students.
- **Display Students**: Users can view all student records in a structured format.

## Project Structure

```
student-management-system
├── src
│   ├── add_student.php       // Logic to add a new student
│   ├── delete_student.php    // Logic to delete a student
│   ├── update_student.php    // Logic to update student details
│   ├── display_students.php   // Logic to display all students
│   ├── config
│   │   └── database.php      // Database connection settings
│   └── models
│       └── Student.php       // Student model class
├── public
│   ├── index.php             // Entry point for the application
│   └── css
│       └── styles.css        // CSS styles for the application
├── composer.json             // Composer dependencies
└── README.md                 // Project documentation
```

## Setup Instructions

1. Clone the repository to your local machine.
2. Navigate to the project directory.
3. Install dependencies using Composer:
   ```
   composer install
   ```
4. Configure the database connection in `src/config/database.php`.
5. Run the application by accessing `public/index.php` in your web browser.

## Usage Guidelines

- To add a student, navigate to the add student page and fill out the form.
- To delete a student, provide the student ID on the delete student page.
- To update a student, retrieve the student record and modify the necessary fields.
- To view all students, go to the display students page.

## License

This project is open-source and available under the MIT License.