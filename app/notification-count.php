<?php 
include "../DB_connection.php";
include "Model/Notification.php";

// Assuming you want to count notifications for a specific user, you may need to define a user ID.
// For demonstration, let's assume we are counting notifications for a user with ID 1.
// You can modify this logic based on your requirements.
$user_id = 1; // Replace with the appropriate user ID or logic to get it.

$count_notification = count_notification($conn, $user_id);
if ($count_notification) {
    echo "&nbsp;". $count_notification. "&nbsp;";
} else {
    echo "";
}
?>
