<?php 
include "../DB_connection.php";
include "Model/Task.php";

if (
    isset($_POST['title'], $_POST['description'], $_POST['assigned_to'], $_POST['due_date'], $_POST['city'], $_POST['department'])
) {
    function validate_input($data) {
        return htmlspecialchars(stripslashes(trim($data)));
    }

    $title = validate_input($_POST['title']);
    $description = validate_input($_POST['description']);
    $assigned_to = intval($_POST['assigned_to']);
    $due_date = $_POST['due_date'];
    $city = validate_input($_POST['city']);
    $department = validate_input($_POST['department']);

    // Check for empty fields
    if (empty($title) || empty($description) || $assigned_to == 0 || empty($due_date) || empty($city) || empty($department)) {
        $error = "All fields are required.";
        header("Location: ../create_task.php?error=" . urlencode($error));
        exit();
    }

    // Prepare data and insert
    try {
        $data = [$title, $description, $assigned_to, $due_date, $city, $department];
        insert_task($conn, $data);

        header("Location: ../create_task.php?success=" . urlencode("Task created successfully"));
        exit();
    } catch (Exception $e) {
        header("Location: ../create_task.php?error=" . urlencode("Error: " . $e->getMessage()));
        exit();
    }

} else {
    header("Location: ../create_task.php?error=" . urlencode("Invalid request"));
    exit();
}
