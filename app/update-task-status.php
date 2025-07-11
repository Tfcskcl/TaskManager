<?php 
include "../DB_connection.php";

function validate_input($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}

$redirect = isset($_POST['redirect']) ? validate_input($_POST['redirect']) : '../edit-task-employee.php';

if (isset($_POST['id']) && isset($_POST['status'])) {
    $status = validate_input($_POST['status']);
    $id = intval($_POST['id']);

    if (empty($status)) {
        $em = "Status is required";
        header("Location: $redirect?error=$em&id=$id");
        exit();
    }

    include "Model/Task.php";
    update_task_status($conn, [$status, $id]);

    $em = "Task updated successfully";
    header("Location: $redirect?success=$em&id=$id");
    exit();
} else {
    $em = "Unknown error occurred";
    header("Location: $redirect?error=$em");
    exit();
}
