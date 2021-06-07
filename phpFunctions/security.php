<?php
include 'databaseConnection.php';

function escape_sanitize_input($conn, $value, $type){
    $trimmed = trim($value);
    $escaped = mysqli_real_escape_string($conn, $trimmed);

    if($type == "email"){
        $sanitized = filter_var($escaped, FILTER_SANITIZE_EMAIL);
        return $sanitized;
    } else if($type == "string"){
        $sanitized = filter_var($escaped, FILTER_SANITIZE_STRING);
        return $sanitized;
    }
}

function escape_sanitize_output($value){
    $trimmed = trim($value);
    $sanitized = htmlspecialchars($trimmed, ENT_QUOTES, 'UTF-8');
    return $sanitized;
}
