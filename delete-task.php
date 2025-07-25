<?php 
session_start();

include "DB_connection.php";
include "app/Model/Task.php";

if (!isset($_GET['id'])) {
    header("Location: tasks.php");
    exit();
}

$id = $_GET['id'];
$task = get_task_by_id($conn, $id);

if ($task == 0) {
    header("Location: tasks.php");
    exit();
}

$data = array($id);
delete_task($conn, $data);
$sm = "Deleted Successfully";
header("Location: tasks.php?success=$sm");
exit();
?>
