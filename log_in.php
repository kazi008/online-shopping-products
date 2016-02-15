<?php
require 'core.php';
$con=mysql_connect("localhost","root","") or die(mysql_error());
$db=mysql_select_db('bikroy',$con) or die(mysql_error());

if( (isset($_COOKIE['email'])) && !empty($_COOKIE['email']) )
{
	header('Location: products.php');
}

if((isset($_SESSION['f_email'])&&!empty($_SESSION['f_email']))&&(isset($_SESSION['f_passwd'])&&!empty($_SESSION['f_passwd'])))
{
		header('Location:products.php');
}

		

if((isset($_POST['login'])) && (!empty($_POST['login'])))
{
	$u_email=$_POST['f_email'];
	$u_pass=$_POST['f_passwd'];
	
	if($u_email=='')
	{echo "<script>alert('Please Enter Your email')</script>";
	exit();}
	
			
	if($u_pass=='')
	{echo "<script>alert('Please Enter Your Password')</script>";
	exit();}
	else
	{
	$query="select * from user where email='$u_email' AND password='$u_pass'";
	$run=mysql_query($query) or die (mysql_error());

	while($row = mysql_fetch_array($run))
	{
		$_SESSION['f_mobile'] = $row['contact'];
		$_SESSION['f_name'] = $row['username'];
	}
	
	if(mysql_num_rows($run)>0)
	{
        		if(isset($_POST['remember'])&&!empty($_POST['remember']))
				{
					setcookie("email",$u_email,time()+3600);
					setcookie("password",$u_pass,time()+3600);//setting cookie
				}
				$_SESSION['f_email']=$u_email;
				$_SESSION['f_passwd']=$u_pass;

		header('Location: products.php');
	}
	else
		echo "<script>alert('Wrong Email or Password!')</script>";
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
                            <h1  style="font-size:15px; color:white; float:right;"><a href="log_in.php" style="color:white;">Log in</a>&nbsp&nbsp&nbsp<a href="create_acc.php">Creat account</a></h1>

        				</div>

                            
                    </div>
                    
                    <div id="crac">

                    <br/>
                    <img src="images/Capture.jpg" alt="Templatemo Pic 1" class="img-thumbnail img-responsive img_left img_pos">

                    <h5 style="margin-top:60%;margin-left: 3%; color:#C4941D; font-size:15px;">Log in to your account from any computer and access your saved searches and ads.<br/><br/> Post new ads, even easier and faster!<br/><br/> Add pictures, change description, price etc on your existing ads.</h5>
                   
                    </div>



                    <div id="log" style="color:white;">		<form method="post" action="log_in.php" style="color:#C9C9C9;" >
                    <br/>&nbsp&nbsp <p style="color: #C9C9C9;">&nbsp&nbsp Log in to your account</p>
		<br/>
		&nbsp&nbsp&nbsp<label>E-mail:</label><br/>
		&nbsp&nbsp&nbsp<input name="f_email" type="email" id="email" size="30"  maxlength="60" value="" required /><br/><br/>
		
		
		&nbsp&nbsp&nbsp<label>Password:</label><br/>
		&nbsp&nbsp&nbsp<input type="password" name="f_passwd" id="passwd" maxlength="70" size="30" autocomplete="off" required /><br/><br/>
		
		

		
		&nbsp&nbsp&nbsp<input id="remember" name="remember" value="1"  type="checkbox" />
		&nbsp&nbsp&nbsp<label for="remember">Remember me</label><br/>

		&nbsp&nbsp&nbsp<input type="hidden" id="csrf_token" name="csrf_token" value="f815ddb7b11124873a1163226416332ba0cc5f7e70720d4fc009eea8344160d6" />

		
		<input id="login" class="btn btn-primary" name="login" type="submit" value="Log in" />
		<br/><br/><br/><br/>Don't have an account yet?&nbsp <a href="create_acc.php" style="color:green;"> create account</a>
		<br/><br/>Log in as <a href="admin.php" style="color:#C4941D; font-size:17px;">admin</a>
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