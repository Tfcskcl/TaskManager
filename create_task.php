<?php 
include "DB_connection.php";
include "app/Model/User.php"; // Assuming you need this for user-related functions

// Fetch all users for the dropdown
$users = get_all_users($conn);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Create Task</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <input type="checkbox" id="checkbox">
    <?php include "inc/header.php"; ?>
    <div class="body">
        <?php include "inc/nav.php"; ?>
        <section class="section-1">
            <h4 class="title">Create Task</h4>
            <form class="form-1" method="POST" action="app/add-task.php">
                <?php if (isset($_GET['error'])) { ?>
                    <div class="danger" role="alert">
                        <?php echo stripcslashes($_GET['error']); ?>
                    </div>
                <?php } ?>

                <?php if (isset($_GET['success'])) { ?>
                    <div class="success" role="alert">
                        <?php echo stripcslashes($_GET['success']); ?>
                    </div>
                <?php } ?>

                <div class="input-holder">
                    <label>Title</label>
                    <input type="text" name="title" class="input-1" placeholder="Title" required><br>
                </div>

                <div class="input-holder">
                    <label>Description</label>
                    <textarea name="description" class="input-1" placeholder="Description" required></textarea><br>
                </div>

                <div class="input-holder">
                    <label>Due Date</label>
                    <input type="date" name="due_date" class="input-1" required><br>
                </div>

                <div class="input-holder">
                    <label>Assigned to</label>
                    <select name="assigned_to" class="input-1" required>
                        <option value="0">Select employee</option>
                        <?php if ($users != 0) { 
                            foreach ($users as $user) { ?>
                                <option value="<?= $user['id'] ?>"><?= $user['full_name'] ?></option>
                        <?php } } ?>
                    </select><br>
                </div>

                <div class="input-holder">
                    <label>City</label>
                    <input type="text" name="city" class="input-1" placeholder="City" required><br>
                </div>

                <div class="input-holder">
                    <label>Department</label>
                    <select name="department" class="input-1" required>
                        <option value="">Select Department</option>
                        <option value="Sales">Sales</option>
                        <option value="Operations">Operations</option>
                        <option value="Training">Training</option>
                        <option value="Backend">Backend</option>
                        <option value="Finances">Finances</option>
                        <option value="Accounts">Accounts</option>
                        <option value="Marketing">Marketing</option>
                    </select><br>
                </div>

                <button class="edit-btn">Create Task</button>
            </form>
        </section>
    </div>

    <script type="text/javascript">
        var active = document.querySelector("#navList li:nth-child(3)");
        active.classList.add("active");
    </script>
</body>
</html>
