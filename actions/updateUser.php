<?php

require "../classes/User.php";


//get the data from form
$user_id = $_POST['user_id'];
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$username = $_POST['username'];


//create the object
$u = new User;
$u->updateUser($user_id, $first_name, $last_name, $username);



