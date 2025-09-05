<?php

function showMessage($sessionKey){

    if (isset($_SESSION[$sessionKey])) {
        # code...
        $alert_status = $sessionKey == 'success' ? "success" : "danger";

        echo "<div class='alert alert-".$alert_status."' > $_SESSION[$sessionKey] </div>";
        unset($_SESSION[$sessionKey]);
    }

}




function getPriorityColor($Priority){
    switch ($Priority) {
        case "high":
            # code...
            return "danger"; 
            break;
        case "medium":
            # code...
            return "warning"; 
            break;
        case "low":
            # code...
            return "success"; 
            break;
        
        default:
            # code...
            return "primary"; 

            break;
    }
}