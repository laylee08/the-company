<?php

require "../classes/User.php";
session_start();

//get the id of logged-in user
$user_id = $_SESSION['user_id'];

$u = new User;
$u->deleteProfile($user_id);
?>