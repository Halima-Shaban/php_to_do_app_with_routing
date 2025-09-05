<?php

session_start();

require_once("./database/connection.php"); 
require_once("./helper/helper.php"); 


$page = $_GET['page'] ?? "home";
switch ($page) {
    case 'home':
      include_once("./views/home.php");
        break;
    case 'create_task':
      include_once("./views/create_task.php");
        break;
    case 'update_task':
      include_once("./views/update_task.php");
        break;
    case 'store_task':
      include_once("./controllers/store_task.php");
        break;
    case 'edit_task':
      include_once("./views/update_task.php");
        break;
    case 'update-task':
      include_once("./controllers/update-task.php");
        break;
    case 'delete-task':
      include_once("./controllers/delete-task.php");
        break;
    
    default:
        break;
} 