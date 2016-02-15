<!DOCTYPE html>
<?php
$connection=mysql_connect("localhost","root","") or die(mysql_error());
$db=mysql_select_db('bikroy',$connection) or die(mysql_error());


/*if($_SESSION['email']!='user'||$_SESSION['pass']!='pass123')
{
		session_destroy();
		header('Location:Home.php');
}*/

if (isset($_POST['signup']))
	{
		$u_name=$_POST['name'];
		$u_pass=$_POST['password'];
		$u_mobile=$_POST['mobile'];
		$u_email=$_POST['email'];
		$u_cur_add=$_POST['cur_add'];
		
		if($u_name=='')
		{echo "<script>alert('Please Enter Your Name')</script>";
		exit();}
		
		if($u_pass=='')
		{echo "<script>alert('Please Enter Your Password')</script>";
		exit();}
		
		if($u_mobile=='')
		{echo "<script>alert('Please Enter Your Mobile no')</script>";
		exit();}
		
		if($u_email=='')
		{echo "<script>alert('Please Enter Your Email')</script>";
		exit();}
		
		if($u_cur_add=='')
		{echo "<script>alert('Please Enter Your Current address')</script>";
		exit();}
	
    
	$que="insert into user(username,password,email,contact,current_add)values('$u_name','$u_pass','$u_email','$u_mobile','$u_cur_add')";
	
	if(mysql_query($que))
	{
		echo "<script>alert('Registration Successful!!')</script>";
	}

	else
		echo "<script>alert('Registration UnSuccessful!!')</script>";

			if(mysql_query($que))
	{
		header('Location: log_in.php');
	}
	
}
	
	

?>


<html>
<head>
<script>
function showHint(str)
{

if (str.length==0)
  {
  document.getElementById("txtHint").innerHTML="";
  return;
  }
var xmlhttp=new XMLHttpRequest();
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","gethint.php?q="+str,true);
xmlhttp.send();
}


</script>




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
                            <h1 style="font-size:15px; color:white; float:right;"><a href="log_in.php" style="color:white;">Log in</a>&nbsp&nbsp&nbsp<a href="create_acc.php">Creat account</a></h1>

        				</div>

                            
                    </div>

                    <div id="wrt_pos">

                    <br/>
                    <img src="images/diary.jpg" alt="Templatemo Pic 1" class="img-thumbnail img-responsive img_left img_pos">

                    <h5 style="margin-top:60%;margin-left: 8%; color:#C4941D; font-size:15px;">Save your contact details to save time when posting new ads. <br/><br/>Keep your product details in your own account and add, delete, edit them as your wish. </h5>

                    </div>

                    <form action="create_acc.php" method="post" style="color:#C9C9C9; font-size:;"><div id="creat"><br/><br/><br/>&nbsp&nbsp

&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp  <b>Name</b>&nbsp&nbsp  <input  name="name"  size="40" type="text" pattern="[a-zA-Z]{1,10}"  class="textbox" onkeyup="showHint(this.value)" placeholder="username" required /><br/><p><span id="txtHint"></span></p><br/>


&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <b>Email</b>&nbsp&nbsp <input  name="email" id="j_email"  size="40" type="email" class="textbox" placeholder="example@gmail.com" required /><span id="status"></span>

<script type="text/javascript">
 document.getElementById("j_email").onblur = function() {
var xmlhttp;
var user=document.getElementById("j_email");
if (user.value != "")
{
if (window.XMLHttpRequest)
{
xmlhttp=new XMLHttpRequest();
}
else
{
xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
}
xmlhttp.onreadystatechange=function()
{
if (xmlhttp.readyState==4 && xmlhttp.status==200)
{
document.getElementById("status").innerHTML=xmlhttp.responseText;
}
};
xmlhttp.open("GET","check2.php?j_email="+encodeURIComponent(user.value),true);
xmlhttp.send();
}
};
 </script>

<br/><br/><br/>


&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <b>Mobile No</b>&nbsp&nbsp <input name="mobile"  size="30" type="text" pattern="[0-9]{1,11}" class="textbox" placeholder="01*********" required /><br/><br/><br/>


&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <b>Password</b>&nbsp&nbsp <input   minlength="5" name="password"  size="30" type="password" class="textbox" required /><br/><br/><br/>


 <!--<b>Confirm password</b>&nbsp&nbsp <input  name="password_confirmation"  size="30" type="password" class="textbox" required /><br/><br/><br/>-->
 &nbsp &nbsp&nbsp<b>Current address</b>&nbsp&nbsp <input  name="cur_add"  size="30" type="text"  pattern="[a-zA-Z0-9]{1,30}" class="textbox" placeholder="Ex:Khulna" required /><br/><br/>


<input type="submit" class="btn btn-primary" name="signup" value="Sign Up" />  <br/><br/>

 &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspDo you already have an account? <a href="log_in.php">Log in here</a>


</div>
</form>
					
                                
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
<script type='text/javascript' src='js/logging.js'></script>
</html>

