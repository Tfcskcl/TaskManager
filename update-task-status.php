<?php 
include "../DB_connection.php";
include "Model/Task.php";

function validate_input($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}

// Default redirect if not specified
$redirect = '../tasks.php';

// Handle both POST and GET
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $status = isset($_POST['status']) ? validate_input($_POST['status']) : '';
    $id = isset($_POST['id']) ? intval($_POST['id']) : 0;
    if (isset($_POST['redirect'])) {
        $redirect = validate_input($_POST['redirect']);
    }
} else {
    $status = isset($_GET['status']) ? validate_input($_GET['status']) : '';
    $id = isset($_GET['id']) ? intval($_GET['id']) : 0;
    if (isset($_GET['redirect'])) {
        $redirect = validate_input($_GET['redirect']);
    }
}

// Validate input
if (empty($status) || $id <= 0) {
    $em = "Missing or invalid parameters";
    header("Location: $redirect?error=" . urlencode($em));
    exit();
}

if (!in_array($status, ['pending', 'in_progress', 'completed'])) {
    $em = "Invalid status value";
    header("Location: $redirect?error=" . urlencode($em));
    exit();
}

// Update the task status
try {
    update_task_status($conn, [$status, $id]);
    $sm = "Task status updated successfully";
    header("Location: $redirect?success=" . urlencode($sm));
    exit();
} catch (Exception $e) {
    $em = "Error updating task: " . $e->getMessage();
    header("Location: $redirect?error=" . urlencode($em));
    exit();
}
