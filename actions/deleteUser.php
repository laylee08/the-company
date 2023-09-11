<?php

require "../classes/User.php";

$user_id = $_POST['user']; // same w dashboard of 49"name="user""

$u = new User;
$u->deleteUser($user_id);

?>