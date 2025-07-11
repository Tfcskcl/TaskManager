<?php 
session_start();

include "DB_connection.php";
include "app/Model/Task.php";
include "app/Model/User.php";

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

$users = get_all_users($conn);

// Get assigned user details
$assigned_user = null;
foreach ($users as $user) {
    if ($user['id'] == $task['assigned_to']) {
        $assigned_user = $user;
        break;
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Task</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <input type="checkbox" id="checkbox">
    <?php include "inc/header.php"; ?>
    <div class="body">
        <?php include "inc/nav.php"; ?>
        <section class="section-1">
            <h4 class="title">Edit Task <a href="my_task.php">Tasks</a></h4>
            <form class="form-1" method="POST" action="app/update-task-employee.php">
                
                <?php if (isset($_GET['error'])) { ?>
                    <div class="danger" role="alert">
                        <?= stripcslashes($_GET['error']); ?>
                    </div>
                <?php } ?>

                <?php if (isset($_GET['success'])) { ?>
                    <div class="success" role="alert">
                        <?= stripcslashes($_GET['success']); ?>
                    </div>
                <?php } ?>

                <div class="input-holder">
                    <label><b>Title:</b></label>
                    <p><?= $task['title'] ?></p>
                </div>

                <div class="input-holder">
                    <label><b>Description:</b></label>
                    <p><?= $task['description'] ?></p>
                </div>

                <?php if ($assigned_user) { ?>
                    <div class="input-holder">
                        <label><b>Assigned To:</b></label>
                        <p><?= $assigned_user['full_name'] ?></p>
                    </div>
                    <div class="input-holder">
                        <label><b>City:</b></label>
                        <p><?= $assigned_user['city'] ?></p>
                    </div>
                    <div class="input-holder">
                        <label><b>Department:</b></label>
                        <p><?= $assigned_user['department'] ?></p>
                    </div>
                <?php } ?>

                <div class="input-holder">
                    <label><b>Status:</b></label>
                    <select name="status" class="input-1">
                        <option value="pending" <?= $task['status'] == "pending" ? "selected" : "" ?>>Pending</option>
                        <option value="in_progress" <?= $task['status'] == "in_progress" ? "selected" : "" ?>>In Progress</option>
                        <option value="completed" <?= $task['status'] == "completed" ? "selected" : "" ?>>Completed</option>
                    </select>
                </div>

                <div class="input-holder">
                    <input type="hidden" name="id" value="<?= $task['id'] ?>">
                    <button class="edit-btn">Update</button>
                </div>
            </form>
        </section>
    </div>

    <script type="text/javascript">
        var active = document.querySelector("#navList li:nth-child(2)");
        active.classList.add("active");
    </script>
</body>
</html>
