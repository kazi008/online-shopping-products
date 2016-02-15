<?php
require 'core.php';

if((!isset($_SESSION['ad_name']) && empty($_SESSION['ad_name'])) && (!isset($_SESSION['ad_password']) && empty($_SESSION['ad_password'])) && ( !isset($_COOKIE['admin_name']) && empty($_COOKIE['admin_name'])) &&( !isset($_COOKIE['admin_password']) && empty($_COOKIE['admin_password'])))
{

     header('Location:admin.php');
}

$connection=mysql_connect("localhost","root","") or die(mysql_error());
$db=mysql_select_db('bikroy',$connection) or die(mysql_error());

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
<body class="templatemo_juice_bg">
	<div id="main_container">
		<div class="container" id="home" >
			<div class="row col-wrap">			 
				<div id="left_container" class="col col-md-3 col-sm-12">
                	<div class="templatemo_logo" style="height:2000px;">
						<a rel="nofollow" href="index.php"><img src="images/Picture2.png" alt="Botany Theme"></a>
						<nav id="main_nav">
						<ul class="nav">
							
						</ul>
					</nav> <!-- nav -->	
										<div>
						<a rel="nofollow" href="#"><img src="images/facebook.png" alt="Like us on Facebook"></a>
						<a href="#"><img src="images/twitter.png" alt="Follow us on Twitter"></a>
						<a href="#"><img src="images/rss.png" alt="RSS feeds"></a>
					</div>
					</div>
					<form  action="#" method="get" class="navbar-form" role="search">
						<div class="form-group">
							<!--<input type="text" class="form-control" placeholder="Search" id="keyword" name="keyword">-->
						</div>
						<!--<button type="submit" class="btn btn-primary" name="Search">Go</button>-->
					</form>

				</div>
				<div id="right_container" class="col col-md-9 col-sm-12">
                
					<div class="row">
                    	<div class="col col-md-12">
                        
                    		<h2>Welcome To Admin-panel </h2> 

                            <hr/>
                            <h1 style="font-size:15px; color:white; float:right;"><a href="logout_admin.php" style="color:white;">Log out</a>&nbsp&nbsp&nbsp</h1>

        				</div>
							
                            
                    </div>
                    <div class="intro">
					
                        <h3 style="color:white;">Requests:</h3> 
           <?php

                           $ad_request="select * from admin where status='0' and delete_it='0' and remove_it='0' ";
                           $run=mysql_query($ad_request);

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

           echo '<br/><br/><input type="submit" class="btn btn-primary" name="accept" value="Accept Request">&nbsp&nbsp<input type="submit" class="btn btn-primary" name="delete" value="Delete Request"> </form>';
}


			
			
			if(isset($_POST['accept'])&&!empty($_POST['accept']))
			{
			{
				if(isset($_POST['name']))
				{
					
					   foreach($_POST['name'] as $check)
                        {
                           mysql_query("UPDATE admin SET status = 1 WHERE it_id = '" . mysql_real_escape_string($check) . "'");
      
                        }
				}
			}
	}

				if(isset($_POST['delete'])&&!empty($_POST['delete']))
			{
			{
				if(isset($_POST['name']))
				{
					
					   foreach($_POST['name'] as $check)
                        {
                           mysql_query("UPDATE admin SET delete_it = 1 WHERE it_id = '" . mysql_real_escape_string($check) . "'");
      
                        }
				}
			}
	}

  //$que="insert into item_id(item_name,item_price,category,description,region,image,username,user_email,mobile) values('$u_title','$u_price','$u_category','$u_comment','$u_region','$u_image','$u_name','$u_email','$u_mobile')";




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