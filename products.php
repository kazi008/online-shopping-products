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

    
</tr>

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
	<div id="main_container" >
		<div class="container" id="home" style="height:2000px;">
			<div class="row col-wrap">			 
				<div id="left_container" class="col col-md-3 col-sm-12">
                	<div class="templatemo_logo" style="height:2000px;">
						<a rel="nofollow" href="index.php"><img src="images/Picture2.png" alt="Botany Theme"></a>
					
					<nav id="main_nav">
						<ul class="nav">
							<li class="active"><a href="home2.php">Home</a></li>
							<li><a href="insert_ad.php">Insert Ad</a></li>
							<li><a href="products.php">Products</a></li>
							<li><a href="user_notification.php">Notifications</a></li>
							<li><a href="user_delete.php">Delete Item</a></li>
							
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
                        
                    		<h2>Your Adds!!</h2> 

                            <hr/>
         <h1 style="font-size:15px; color:white; float:right;"><a href="logout.php" style="color:white;">Log out</a>&nbsp&nbsp&nbsp</h1>

        				</div>
							
                            
                    </div>

                                        <div class="intro">
                                        <table width="800" align="center" style="padading:20px; color:white;">
                            <?php

                            while($row=mysql_fetch_array($run))
{
	
	$tname=$row['it_name'];
	$tprice=$row['it_price'];
	$category=$row['category'];
	$descrip=$row['description'];
	$region=$row['region'];
	$image=$row['image'];
	$name=$row['username'];
	$email=$row['user_email'];
	$mobile=$row['mobile'];

?>
<tr >
      <td width="300"><br/><br/><?php echo "<img src=\"files/". $row['image'] . "\" alt=\"\" />"; ?></td>
   <td><dl>
  <br/><br/>
      <dd><?php echo "<br/><br/><b><i>Item name:  </i></b>".$tname; ?></dd>
      <dd><?php echo "<b><i>Item price:  </i></b>".$tprice; ?></dd>
      <dd><?php echo "<b><i>Category:  </i></b>".$category; ?></dd>
      <dd><?php echo "<b><i>Description:  </i></b>".$descrip; ?></dd>
      <dd><?php echo "<b><i>Region: </i></b>". $region; ?></dd>
      <dd><?php echo "<br/><b><i>Contact details: <br/> Name: </i></b>". $name; ?></dd>
      <dd><?php echo "<b><i>Email address: </i></b>". $email; ?></dd>
      <dd><?php echo "<b><i>Mobile no: </i></b>". $mobile; ?></dd>
   </dl></td>

<?php } ?>      
</tr>

					</table>

                               
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