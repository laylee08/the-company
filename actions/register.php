<?php

require "../classes/User.php";

//data from the form
$f_name = $_POST['first_name'];
$l_name = $_POST['last_name'];
$username = $_POST['username'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT); //encrypts the password

// create an object
$user = new User;

// call the function
$user->createUser($f_name, $l_name, $username, $password);