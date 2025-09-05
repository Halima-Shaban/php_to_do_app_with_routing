<?php

require_once("./config/env.php");

$conn = mysqli_connect(DB_Host, DB_USERNAME, DB_PASSWORD, DB_Name);

if (!$conn) {
    die("connectio faild:" .mysqli_connect_error());
}



