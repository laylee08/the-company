<?php

session_start();
session_unset();
session_destroy();

header("location: ../views"); //go back to login
exit;


?>