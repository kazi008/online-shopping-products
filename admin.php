<?php
require 'core.php';

if(isset($_COOKIE['admin_name']) && !empty($_COOKIE['admin_name']) ) 
{
       header('Location: admin_panel.php');
}

if((isset($_SESSION['ad_name']) && !empty($_SESSION['ad_name'])) && (isset($_SESSION['ad_password'])  && !empty($_SESSION['ad_password'])))
{
		header('Location:admin_panel.php');
}


if((isset($_POST['alogin'])) && (!empty($_POST['alogin'])))
{
		$u_name='sazid';
	    $u_pass='admin';

if((isset($_POST['ad_name']) && !empty($_POST['ad_name'])) && (isset($_POST['ad_password'])  && !empty($_POST['ad_password'])))
{
	if($_POST['ad_name']==$u_name && $_POST['ad_password']==$u_pass)
	{
		$_SESSION['ad_name']=$_POST['ad_name'];
		$_SESSION['ad_password']=$_POST['ad_password'];

		if(isset($_POST['ad_remember'])&&!empty($_POST['ad_remember']))
		{
			setcookie("admin_name",$_POST['ad_name'],time()+3600*24*7);//set expire duration
			setcookie("admin_password",$_POST['ad_password'],time()+3600*24*7);	//set expire duration
		}
		header('Location:admin_panel.php');
		
	}
	else
    echo "<script>alert('Wrong username or password!!')</script>";
	
}
}

?>

<html>
<head>
	<title>Bikroy @KUET</title>

	<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="templatemo_style.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="flexslider.css" type="text/css" media="screen" />

	<!-- Modernizr -->
  	<script src="slider/modernizr.js"></script>

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
		<div class="container" id="home">
			<div class="row col-wrap">			 
				<div id="left_container" class="col col-md-3 col-sm-12">
                	<div class="templatemo_logo">
						<a rel="nofollow" href="index.php"><img src="images/Picture2.png" alt="Botany Theme"></a>
					</div>
					<nav id="main_nav">
						<ul class="nav">

						</ul>
					</nav> <!-- nav -->	
					<form  action="#" method="get" class="navbar-form" role="search">
						<div class="form-group">
							<!--<input type="text" class="form-control" placeholder="Search" id="keyword" name="keyword">-->
						</div>
						<!--<button type="submit" class="btn btn-primary" name="Search">Go</button>-->
					</form>
					<div>
						<a rel="nofollow" href="#"><img src="images/facebook.png" alt="Like us on Facebook"></a>
						<a href="#"><img src="images/twitter.png" alt="Follow us on Twitter"></a>
						<a href="#"><img src="images/rss.png" alt="RSS feeds"></a>
					</div>
				</div>
				<div id="right_container" class="col col-md-9 col-sm-12">
                
					<div class="row">
                    	<div class="col col-md-12">
                        
                    		<h2>All your ads and favourites in one place, <span style="color:#008B8B">for free!</span></h2> 

                            <hr/>
                            <h1 style="font-size:15px; color:white; float:right;"><a href="log_in.php" style="color:white;">Log in</a>&nbsp&nbsp</h1>

        				</div>

                            
                    </div>
                    
                    <div id="crac">

                    <br/>
                    <img src="images/Capture.jpg" alt="Templatemo Pic 1" class="img-thumbnail img-responsive img_left img_pos">

                    <h5 style="margin-top:60%;margin-left: 3%; color:#C4941D; font-size:15px;">Log in to your account from any computer and access your saved searches and ads.<br/><br/> Post new ads, even easier and faster!<br/><br/> Add pictures, change description, price etc on your existing ads.</h5>
                   
                    </div>



                    <div id="log" style="color:white;">		<form method="post" action="admin.php" style="color:#C9C9C9;" >
                    <br/>&nbsp&nbsp <p style="color: #008B8B; font-size:19px;">&nbsp&nbsp Log in as admin</p>
		<br/>
		&nbsp&nbsp&nbsp<label>Username:</label><br/>
		&nbsp&nbsp&nbsp<input name="ad_name" type="text"  size="30"  maxlength="60" value="" required /><br/><br/>
		
		
		&nbsp&nbsp&nbsp<label>Password:</label><br/>
		&nbsp&nbsp&nbsp<input type="password" name="ad_password" id="ad_password" maxlength="70" size="30" autocomplete="off" required /><br/><br/>
		
		

		
		&nbsp&nbsp&nbsp<input id="ad_remember" name="ad_remember" value="1"  type="checkbox" />
		&nbsp&nbsp&nbsp<label for="remember">Remember me</label><br/>

		&nbsp&nbsp&nbsp<input type="hidden" id="csrf_token" name="csrf_token" value="f815ddb7b11124873a1163226416332ba0cc5f7e70720d4fc009eea8344160d6" />

		
		<input id="alogin" class="btn btn-primary" name="alogin" type="submit" value="Log in" />
	</form></div>
					
                                
				</div>
			</div>
			<footer class="row credit">
				<div class="col col-md-12">
					<div id="templatemo_footer">
						Designed by <a href="#">Kazi Sazid</a>
					</div>
				</div>
			</footer>
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
<!--<script type='text/javascript' src='js/logging.js'></script>-->
</html>