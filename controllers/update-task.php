<?php
require_once('./helper/validation.php');

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    # code...

    $errors = [];

    $titel = htmlspecialchars(trim($_POST['titel']));
    $priority = htmlspecialchars(trim($_POST['priority']));
    $task_id =htmlspecialchars(trim($_POST['task_id']));

    //Task_title Validation

    if (requiredInput($titel)) {
        $errors[] = "Task title is required.";
    } elseif (minInput($titel, 3)) {
        $errors[] = "Task title must be at least 3 characters.";
    } elseif (maxInput($titel, 100)) {
        $errors[] = "Task title must not exceed 100 characters.";
    }
    //Priority Validation
    if (requiredInput($priority)) {
        $errors[] = "priority is required.";
    } elseif (!validPriority($priority)) {
        $errors[] = "priority must be High, Medium, or Low.";
    }



    if (!empty($errors)) {
        $_SESSION['errors'] = $errors;
        header("location: index.php?page=update_task&task_id=" . $task_id);
        exit();
    }






    $sql = "UPDATE `tasks` SET titel='$titel',priority='$priority' where id='$task_id' ";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        # code...

        $_SESSION['success'] = "task apdated successfuly";
        header("location:index.php");
    }
    die("500SERVER ERROR");
}

die("404 not supported method");
