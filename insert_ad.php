<?php
require 'core.php';

if((!isset($_SESSION['f_email']) && empty($_SESSION['f_email'])) && (!isset($_SESSION['f_passwd']) && empty($_SESSION['f_passwd'])) && ( !isset($_COOKIE['email']) && empty($_COOKIE['email'])) )
{

     header('Location:log_in.php');
}

$connection=mysql_connect("localhost","root","") or die(mysql_error());
$db=mysql_select_db('bikroy',$connection) or die(mysql_error());

$date=date("Y-m-d");


if (isset($_POST['continue']))
  {
    $u_category=$_POST['category'];
    $u_region=$_POST['region'];
    $u_title=$_POST['title'];
    $u_price=$_POST['price'];
    $u_comment=$_POST['userinput'];
    $u_date=$date;
    $u_name=$_SESSION['f_name'];
    $u_email=$_SESSION['f_email'];
    $u_mobile=$_SESSION['f_mobile'];
    $u_image=$_FILES['image']['name'];
    $tmp=$_FILES['image']['tmp_name'];
    $t_path="";


    
    if($u_category=='')
    {echo "<script>alert('Please Enter Your Category')</script>";
    exit();}
    
    if($u_region=='')
    {echo "<script>alert('Please Enter Your Region')</script>";
    exit();}
    
    if($u_title=='')
    {echo "<script>alert('Please Enter Your item Title')</script>";
    exit();}
    
    if($u_price=='')
    {echo "<script>alert('Please Enter Your item Price')</script>";
    exit();}
    
    if($u_comment=='')
    {echo "<script>alert('Please write Your item description')</script>";
    exit();}

    /*if($u_user=='')
    {echo "<script>alert('Please Enter Your Name')</script>";
    exit();}

    if($u_mobile=='')
    {echo "<script>alert('Please Enter Your Mobile no.')</script>";
    exit();}*/

   if($_FILES['image']['error']>0)
    {echo "Error in uploading. Pleasing try again.";}
    
    else
    {
      
      move_uploaded_file($tmp,"files/$u_image");
      $t_path= "http://localhost/project/files".$_FILES["image"]["name"];
    

  $que="insert into item_id(item_name,item_price,category,description,region,image,username,user_email,mobile) values('$u_title','$u_price','$u_category','$u_comment','$u_region','$u_image','$u_name','$u_email','$u_mobile')";
  $request="insert into admin(it_name,it_price,category,description,region,image,date_it,user_email,username,mobile,status) values ('$u_title','$u_price','$u_category','$u_comment','$u_region','$u_image','$u_date','$u_email','$u_name','$u_mobile','0')";
  if(mysql_query($request))
  {
    echo "<script>alert('Request Sent')</script>";
  }

  else
    echo "<script>alert('Please complete all field')</script>";
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
							<li class="active"><a href="home2.php">Home</a></li>
							<li><a href="insert_ad.php">Insert Ad</a></li>
              <li><a href="products.php">Products</a></li>
							<li><a href="user_notification.php">Notifications</a></li>
              <li><a href="user_delete.php">Delete Item</a></li>
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
                        
                    		<h2>Buy and Sell <a href="#"
                    		  class="right_container_title"  target="_blank">at</a> your choice</h2> 

                            <hr/>
                            <h1 style="font-size:15px; color:white; float:right;"><a href="logout.php" style="color:white;">Log out</a>&nbsp&nbsp&nbsp</h1>

        				</div>
							
                            
                    </div>

                    <div id="add">

                    <form action="insert_ad.php" method="post" enctype="multipart/form-data"  >
<b>Category:</b>
&nbsp&nbsp          <select name="category"  >
                    <option value="laptop">Laptop</option>
                    <option value="mobile">Mobile</option>
                    <option value="speaker">Speaker</option>
                    <option value="modem">Modem</option>
                    <option value="electric">electrical</option>
                    <option value="choose" selected>Chose category</option>
                    </select>
                    <br/><br/>
&nbsp&nbsp
<b>Region:</b>
&nbsp&nbsp           <select name="region" >
                    <option value="dhaka">Dhaka</option>
                    <option value="khulna">Khulna</option>
                    <option value="chittagong">Chittagong</option>
                    <option value="shylet">Shylet</option><option value="rajshahi">Rajshahi</option>
                    <option value="dhaka" selected>Dhaka</option>
                    </select><br/><br/><br/><br/>

&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
<b>Title:</b
>&nbsp&nbsp&nbsp
                    <input type="text" name="title" class ="in_textbox" required><br/><br/>


&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
<b>Price:</b>
&nbsp&nbsp
                   <input type="number" name="price" class ="in_textbox" required>&nbsp&nbspTaka<br/><br/>

&nbsp&nbsp&nbsp&nbsp
<b>Ad text:</b>
&nbsp&nbsp
                   <textarea name="userinput" cols="36" rows="5" wrap="off"   required></textarea><br/><br/>
                  Upload image<input type="file" name="image" style="position:relative;margin-left:280px;" >
                 

                   

                     <br/><br/>
                    <input type="submit" name="continue" class="btn btn-primary" value="ADD Product"><br><br/><br/>

                    </form>
                    
                    </div>
                    	
                    </div>
                             
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