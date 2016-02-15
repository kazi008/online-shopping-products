<?php
$text2=$_REQUEST['j_email'];
/*if(preg_match("/[^a-z0-9]/",$user))
{
print "<span style=\"color:red;\">Username contains illegal charaters.</span>";
exit;
}*/
$connection = mysql_connect('localhost','root','') or die(mysql_error());
$database = mysql_select_db("bikroy",$connection);
$data=mysql_query("SELECT * FROM user where email='$text2'");
if(mysql_num_rows($data)>0)
{
print "<span style=\"color:yellow;\"><h4>Email address already exists</h4></span>";
}

?>
