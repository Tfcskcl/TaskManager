<?php 
include "../DB_connection.php";
include "Model/Notification.php";

// Assuming you want to display notifications for a specific user.
// You may need to define a user ID or modify this logic based on your requirements.
$user_id = 1; // Replace with the appropriate user ID or logic to get it.

$notifications = get_all_my_notifications($conn, $user_id);
if ($notifications == 0) { ?>
    <li>
        <a href="#">
            You have zero notifications
        </a>
    </li>
<?php } else {
    foreach ($notifications as $notification) {
?>
    <li>
        <a href="app/notification-read.php?notification_id=<?=$notification['id']?>">
            <?php if ($notification['is_read'] == 0) {
                echo "<mark>".$notification['type']."</mark>: ";
            } else {
                echo $notification['type'].": ";
            } ?>
            <?=$notification['message']?>
            &nbsp;&nbsp;<small><?=$notification['date']?></small>
        </a>
    </li>
<?php
    }
}
?>
