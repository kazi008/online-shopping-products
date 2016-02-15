<?php
require 'core.php';
if((!isset($_SESSION['f_email']) && empty($_SESSION['f_email'])) && (!isset($_SESSION['f_passwd']) && empty($_SESSION['f_passwd'])) && ( !isset($_COOKIE['email']) && empty($_COOKIE['email'])) )
{

     header('Location:log_in.php');
}

$connection=mysql_connect("localhost","root","") or die(mysql_error());
$db=mysql_select_db('bikroy',$connection) or die(mysql_error());

$info=$_SESSION['f_email'];
$query1= "SELECT * FROM admin WHERE status='1' AND remove_it='0' AND user_email='$info' ";
$run=mysql_query($query1);

?>


<html>
<head>
	<title>Bikroy @KUET</title>

	<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="templatemo_style.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="flexslider.css" type="text/css" media="screen" />

	<!-- Modernizr -->

	<!-- HTML 5 shim for IE backwards compatibility -->
		<!-- [if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js">
		</script>
		<![endif]-->
	<!-- 
	Credits
	Equal Height Columns http://www.hongkiat.com/blog/css-equal-height/ -->
	
</head>
<body class="templatemo_juice_bg" >
	<div id="main_container" >
		<div class="container" id="home" >
			<div class="row col-wrap" >			 
				<div id="left_container" class="col col-md-3 col-sm-12" >
                	<div class="templatemo_logo" style="height:2000px;">
						<a rel="nofollow" href="index.php"><img src="images/Picture2.png" alt="Botany Theme"></a>
					
                     <nav id="main_nav" >
						<ul class="nav" >
							<li class="active"><a href="home2.php">Home</a></li>
							<li><a href="insert_ad.php">Insert Ad</a></li>
							<li><a href="products.php">Products</a></li>
							<li><a href="user_notification.php">Notifications</a></li>
							<li><a href="user_delete.php">Delete Item</a></li>
							
						</ul>
					</nav> <!-- nav -->	</div>	


				</div>
				<div id="right_container" class="col col-md-9 col-sm-12">
                
					<div class="row">
                    	<div class="col col-md-12">
                        
                    		<h2>Your Items</h2> 

                            <hr/>
                            <h1 style="font-size:15px; color:white; float:right;"><a href="logout_admin.php" style="color:white;">Log out</a>&nbsp&nbsp&nbsp</h1>

        				</div>
							
                            
                    </div>
                    <div class="intro">
					
                        <h3 style="color:white;">Items:</h3> 
           <?php

                           
                   if($run)
	                     {
			echo '<form method="POST" action style="color:white;">';
			while($row=mysql_fetch_assoc($run))
			{
				    
				    $user=$row['it_id'];
				    $tid=$row['it_id'];
					$tname=$row['it_name'];
	                $tprice=$row['it_price'];
	                $category=$row['category'];
	                $descrip=$row['description'];
	                $region=$row['region'];
	                $name=$row['username'];
	                $email=$row['user_email'];


                     echo "<br/><br/><br/>";               
					 echo '<input type="checkbox" name="name[]" value="'.$row['it_id'].'" >';

					 echo "<br/><b><i>user name: </i></b>".$name; 
					 echo "<br/><b><i>Item name: </i></b>".$tname; 
					 echo "<br/><b><i>Item price: </i></b>".$tprice; 
					 echo "<br/><b><i>Item category: </i></b>".$category;
					 echo "<br/><b><i>Item description: </i></b>".$descrip; 
					 echo "<br/><b><i>user region: </i></b>".$region;
					 echo "<br/><b><i>user email: </i>".$email; 
					 

			}

           echo '<br/><br/><input type="submit" name="delete" value="Delete Item"> </form>';
}


			
			
			if(isset($_POST['delete'])&&!empty($_POST['delete']))
			{
			{
				if(isset($_POST['name']))
				{
					
					   foreach($_POST['name'] as $check)
                        {
                           mysql_query("UPDATE admin SET remove_it = 1 WHERE it_id = '" . mysql_real_escape_string($check) . "'");
      
                        }
				}
			}
	}
                  ?>           
                   
				</div>
			</div>
			
		</div>		
	</div>
    
  <!-- jQuery -->
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
  <script>window.jQuery || document.write('<script src="js/libs/jquery-1.7.min.js">\x3C/script>')</script>

  <!-- FlexSlider -->
  <script defer src="slider/jquery.flexslider.js"></script>

  <script type="text/javascript">
    $(function(){
      SyntaxHighlighter.all();
    });
    $(window).load(function(){
      $('.flexslider').flexslider({
        animation: "slide",
        start: function(slider){
          $('body').removeClass('loading');
        }
      });
    });
  </script>
  
</body>
<script type='text/javascript' src='js/logging.js'></script>
</html>