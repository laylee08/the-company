<?php

require "../classes/User.php";
session_start();

$file_name = $_FILES['photo']['name']; //duck.jpg  //same profile.php 32 "name="photo"
$temp_path= $_FILES['photo']['tmp_name']; //C:/temp/filename.jpg
$user_id = $_SESSION['user_id'];

$u = new User;
$u->uploadPhoto($user_id, $file_name, $temp_path); //uploadPhoto.php 96  "public function uploadPhoto($id, $file_name, $tmp_path){

