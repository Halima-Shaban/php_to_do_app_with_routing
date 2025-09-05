<?php


//validation





//main functions
function requiredInput($input)
{
    return empty($input);
}

function minInput($input, $length)
{
    return strlen($input) < $length;
}

function maxInput($input, $length)
{
    return strlen($input) > $length;
}

function validPriority($priority)
{
    $allowed = ["high", "medium", "low"];
    return in_array(strtolower($priority), $allowed);
}
