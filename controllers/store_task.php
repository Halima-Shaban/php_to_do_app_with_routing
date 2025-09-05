<?php
require_once('./helper/validation.php');

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $errors=[];


    $task_title = htmlspecialchars(trim($_POST['titel']));
    $Priority = htmlspecialchars(trim($_POST['Priority']));

    //Task_title Validation

    if (requiredInput($task_title)) {
        $errors[] = "Task title is required.";
    } elseif (minInput($task_title, 3)) {
        $errors[] = "Task title must be at least 3 characters.";
    } elseif (maxInput($task_title, 100)) {
        $errors[] = "Task title must not exceed 100 characters.";
    }
//Priority Validation
    if (requiredInput($Priority)) {
        $errors[] = "Priority is required.";
    } elseif (!validPriority($Priority)) {
        $errors[] = "Priority must be High, Medium, or Low.";
    }



    if (!empty($errors)) {
        $_SESSION['errors'] = $errors;
        header("location: index.php?page=create_task");
        exit();
    }




    $sql = "insert into `tasks` (titel,priority) values ('$task_title','$Priority') ";
    $result = mysqli_query($conn,$sql);


    if ($result) {
        $_SESSION['success'] = "task is created successfully ";
        header("location:index.php");
    }

    die("500 SERVER ERROR");
}

    die("404 PAGE NOT FOUND ");
