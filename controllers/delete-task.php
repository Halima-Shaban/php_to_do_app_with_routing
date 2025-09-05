<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    # code...
    $task_id =htmlspecialchars(trim($_POST['task_id']));

    // var_dump($task_id);
    // die;

    $sql="DELETE FROM `tasks` WHERE `id`='$task_id'";

    $result = mysqli_query($conn,$sql);

        if ($result) {
        # code...

        $_SESSION['success'] = "task deleted successfuly";
        header("location:index.php");
    }
    die( "500 SERVER ERROR");


}

die( "404 not supported method");