<?php 
session_start();

include "DB_connection.php";
include "app/Model/User.php";

if (!isset($_GET['id'])) {
    header("Location: user.php");
    exit();
}

$id = $_GET['id'];
$user = get_user_by_id($conn, $id);

if ($user == 0) {
    header("Location: user.php");
    exit();
}

$data = array($id, "employee");
delete_user($conn, $data);
$sm = "Deleted Successfully";
header("Location: user.php?success=$sm");
exit();
?>
