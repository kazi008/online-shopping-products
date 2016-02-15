<?php
$con=mysql_connect("localhost","root","") or die(mysql_error());
$db=mysql_select_db('bikroy',$con) or die(mysql_error());
$sql="UPDATE admin SET status='0' WHERE it_price<10024";
mysql_query($sql);
?>