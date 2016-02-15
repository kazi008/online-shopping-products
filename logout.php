<?php
require 'core.php';
session_destroy();
setcookie("email","",time()-3000);
setcookie("password","",time()-3000);
header('Location:log_in.php');//sending to previous page
?>

