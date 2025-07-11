<?php 
include "../DB_connection.php";
include "Model/Notification.php";

if (isset($_GET['notification_id'])) {
    $notification_id = $_GET['notification_id'];
    
    // Assuming you want to mark the notification as read for a specific user.
    // You may need to define a user ID or modify this logic based on your requirements.
    $user_id = 1; // Replace with the appropriate user ID or logic to get it.

    notification_make_read($conn, $user_id, $notification_id);
    header("Location: ../notifications.php");
    exit();
} else {
    header("Location: index.php");
    exit();
}
?>
