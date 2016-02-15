<?php
require 'core.php';
session_destroy();
setcookie("admin_name","",time()-3000);
setcookie("admin_password","",time()-3000);
header('Location:log_in.php');//sending to previous page
?>
