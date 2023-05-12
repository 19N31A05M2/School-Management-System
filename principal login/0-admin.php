<?php
session_start();
ob_start();
if(isset($_SESSION['username'])){
	$username=$_SESSION['username'];
	$name=$_SESSION['name'];
}else{
	header('location:../first pages/home.php');
}
$conn=mysqli_connect("localhost","root","","studentinfo");
?>
<html lang="en">
<!--head-->
<head>
	
	<title></title>
	<link rel="stylesheet" href="admin.css">
	<link rel="stylesheet" href="../fontawesome-free-5.15.2-web/css/all.css">

</head>
<!--End of head-->

<!--body-->
<body>

<div class="wrapper">
<!--Sidebar-->
	<div class="sidebar">
        <h2><span> VISHAVAI  VIDYANIKETAN HIGH SCHOOL</span></h2>
       <ul>
            <li><a href="1-academic.php"><i class="fas fa-home"></i>Academic</a></li>
            <li><a href="students.php"><i class="fas fa-user"></i>Students</a></li>
            <li><a href="collection.php"><i class="fas fa-address-card"></i>Collection</a></li>
            <li><a href="dropstudents.php"><i class="fas fa-project-diagram"></i>Left Out</a></li>
            <li><a href="feepay.php"><i class="fas fa-blog"></i>Fee Payment</a></li>
            <li><a href="fees.php"><i class="fas fa-server"></i>Fees</a></li>
            <li><a href="Bonafide.php"><i class="fas fa-certificate"></i>Bonafide</a></li>
            <li><a href="users.php"><i class="fas fa-address-book"></i>Teachers</a></li>
			<li><a href="passed.php"><i class="fas fa-search"></i>Search</a></li>
            
        </ul> 
        
    </div>
<!--End of Sidebar-->	

<!--Profile Image View-->
	<div class="navbar">
		<div class="logo">
		</div>
		<div class="nav_right">
			<ul>
				<li class="nr_li dd_main">
				
					<img  class="img" src="../images/profile.jpg";>
		
					<div class="dd_menu">
						<div class="dd_left">
							<ul>
								<li><img src="../images/profile.jpg" alt="profile_img" class="img1"></li><br>
					
								<h5>Administrator</h5>
								
								<li style="font-size:16px;"><?php echo $name;?></li>
								
							</ul>
						</div>
						
					</div>
				</li>
				<li class="nr_li">
					<a href="../first pages/home.php "><i class="fas fa-sign-out-alt"></i></a>
				</li>
			</ul>
		</div>
	</div>
<!--end of Profile image View-->	

<!--Main Content-->
	<div class="main_content">
		
		<div class="first">
			<div class="head">
			<h2>
		
				<span class="multicolortext">Welcome To Admin Login!</span>
			</h2>
				<div class="animation"></div>
				<div class="tracking-in-expand-fwd-bottom "><h1>VISHAVAI VIDYANIKETAN HIGH SCHOOL</h1><h4>ALL ROUND DEVELOPMENT OF A CHILD IS OUR MOTTO </div>
				
			</div>
			
		</div> 
	</div>
<!--End of Main content-->	
</div>	

<!--javascript-->
<script>
	var dd_main = document.querySelector(".dd_main");

	dd_main.addEventListener("click", function(){
		this.classList.toggle("active");
	})	

	
</script>
	
</body>
<!--End of body-->
</html>