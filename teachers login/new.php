<?php
 /*login user information*/
session_start();
ob_start();
$conn=mysqli_connect("localhost","root","","studentinfo");
if(isset($_SESSION['username'])){
	$username=$_SESSION['username'];
	$id=$_SESSION['id'];
	$sql = "SELECT * FROM logins where id='$id'";
	$query=mysqli_query($conn,$sql);
	While($row=mysqli_fetch_array($query))
	{
		$lname=$row['name'];
		$classt=$row['classteacherof'];
		$password=$row['password'];
		$lsubject=$row['subject'];
		$lmobile=$row['mobile'];
		
	}
	
}else{
	header('location:../first pages/home.php');
}


?>
<html lang="en">
<!--head-->
<head>
	
	<title></title>
	<link rel="stylesheet" href="New.css">
	<link rel="stylesheet" href="../fontawesome-free-5.15.2-web/css/all.css">
</head>
<!--End of Head-->

<!--body-->
<body>

<div class="wrapper">
<!--sidebar-->
	<div class="sidebar">
        <h2>VISHAVAI <span>VIYANIKETAN</span></h2>
        <ul>
            <li style="background:#3e3762;"><a href="new.php" id="home"><i class="fas fa-home"></i>Home</a></li>
            <li><a href="profile.php" id="profile"><i class="fas fa-user"></i>Profile</a></li>
            <li><a href="students.php" id="students"><i class="fas fa-user-friends"></i>Students</a></li>
            <li><a href="marks.php" id="marks"><i class="fas fa-address-card"></i>Marks</a></li>
            <li><a href="report.php"  id="report"><i class="fas fa-address-book"></i>Progress Cards</a></li>
            
        </ul> 
        
    </div>
<!--End of Sidebar-->

<!--profile image View-->	
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
								<li><img src="../images/profile.jpg" alt="profile_img" class="img1"><br>
								<h5><?php echo $lname; ?></h5>
								<a href="profile.php" id="profile" style="float:left; margin-left:40%; font-size:16px; font-weight:normal; text-decoration:underline;">Edit</a></li><br>
								<li style="font-size:16px;">Class Teacher:<?php echo $classt; ?> </li>
								
							</ul>
						</div>
						
					</div>
				</li>
				<li class="nr_li">
					<a href="../first pages/home.php " ><i class="fas fa-sign-out-alt"></i></a>
				</li>
			</ul>
		</div>
	</div>
<!--End Of profile Image View-->

<!--Main content-->	
	<div class="main_content">
		
		<div class="first">
			<div class="head">
			<h2>
		
				<span class="multicolortext">Welcome To Teachers Login!</span>
			</h2>
				<div class="animation"></div>
				<div class="tracking-in-expand-fwd-bottom "><h1>VISHAVAI VIDYANIKETAN HIGH SCHOOL</h1><h4>ALL ROUND DEVELOPMENT OF A CHILD IS OUR MOTTO </div>
				
			
			</div>
			
		</div> 
	</div>	
</div>	
<!--End Of Main Content-->

	
</body>
<!--End of Body-->

<!--Javascript-->
<script>
	var dd_main = document.querySelector(".dd_main");

	dd_main.addEventListener("click", function(){
		this.classList.toggle("active");
	})	

	
</script>
</html>