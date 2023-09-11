<?php

require "../classes/User.php";

//get data from form
$username = $_POST["username"];
$password = $_POST["password"];

// create object
$user = new User;

// call function
$user->login($username, $password);