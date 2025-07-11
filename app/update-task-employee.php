<?php 
include "../DB_connection.php";

function validate_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if (isset($_POST['id']) && isset($_POST['status'])) {
    $status = validate_input($_POST['status']);
    $id = validate_input($_POST['id']);

    if (empty($status)) {
        $em = "Status is required";
        header("Location: ../edit-task-employee.php?error=$em&id=$id");
        exit();
    } else {
        include "Model/Task.php";

        $data = array($status, $id);
        update_task_status($conn, $data);

        $em = "Task updated successfully";
        header("Location: ../edit-task-employee.php?success=$em&id=$id");
        exit();
    }
} else {
    $em = "Unknown error occurred";
    header("Location: ../edit-task-employee.php?error=$em");
    exit();
}
?>
