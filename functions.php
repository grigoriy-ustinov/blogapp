<?php
session_start();
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
$basedir = __DIR__;

function sendError(){
    if(isset($_SESSION['error_message'])){
        echo '<div class="alert alert-danger" role="alert">'.$_SESSION['error_message'].'</div>';
        unset($_SESSION['error_message']);
        die();
    }
}