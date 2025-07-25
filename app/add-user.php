<?php 
include "../DB_connection.php";

function validate_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if (isset($_POST['user_name']) && isset($_POST['password']) && isset($_POST['full_name'])) {
    $user_name = validate_input($_POST['user_name']);
    $password = validate_input($_POST['password']);
    $full_name = validate_input($_POST['full_name']);

    if (empty($user_name)) {
        $em = "User  name is required";
        header("Location: ../add-user.php?error=$em");
        exit();
    } else if (empty($password)) {
        $em = "Password is required";
        header("Location: ../add-user.php?error=$em");
        exit();
    } else if (empty($full_name)) {
        $em = "Full name is required";
        header("Location: ../add-user.php?error=$em");
        exit();
    } else {
        include "Model/User.php";
        $password = password_hash($password, PASSWORD_DEFAULT);

        $data = array($full_name, $user_name, $password, "employee");
        insert_user($conn, $data);

        $em = "User  created successfully";
        header("Location: ../add-user.php?success=$em");
        exit();
    }
} else {
    $em = "Unknown error occurred";
    header("Location: ../add-user.php?error=$em");
    exit();
}
