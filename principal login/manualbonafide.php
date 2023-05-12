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
	
	<title>Repot Cards</title>
	<link rel="stylesheet" href="Manualbonafidestyle.css">
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
            <li style="background:#3e3762;"><a href="Bonafide.php"><i class="fas fa-certificate"></i>Bonafide</a></li>
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
					<img src="../images/profile.jpg" alt="profile_img" class="img">
					
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
<!--End Of Profile Image View-->	


<!--Main Content-->
	<div class="main_content">
		<div class="first">
			<a href="bonafide.php" class="left">Bonafide</a><br>
			<div class="reports">
				<div class="admissionform">
				<h1 class="head">BONAFIDE</h1>
				
<!--bonafide-->				
				<div class='bonafide' id="form">
					
					<img src="../images/Bonafide.jpg" id="bfde"/>
					<span class="sname"><p contenteditable="true"></p> </span>
					<span class="admission"><p contenteditable="true"></p> </span>
					<span class="date"><p contenteditable="true"></p></span>
					<span class="father"><p contenteditable="true"></p></span>
					<span class="admnclass"><p contenteditable="true"></p></span>
					<span class="class"><p contenteditable="true"></p></span>
					<span class="fromyear"><p contenteditable="true"></p> </span>
					<span class="toyear"><p contenteditable="true"></p> </span>
					<span class="dob"><p contenteditable="true"></p> </span>
					

				</div>
				
					 <div style="text-align:center;">
						<input type="submit" class="but" id="print" style="margin-top:10px;" value="print" />
					</div>
					<script>
					document.getElementById('print').addEventListener("click",function(){
						document.getElementById('bfde').style.display='none'; 
						for(i=1;i<10;i++){
							document.getElementsByTagName('span')[i].style.paddingTop='30px';
							document.getElementsByTagName('span')[i].style.marginLeft='-1cm';
						}							
						printDiv('form'); 
						window.location.href='manualbonafide.php';
					});
				</script>
				</div>
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
function printDiv(printpage)
{
var headstr = "<html><head><title></title></head>";
var newstr = document.all.item(printpage).innerHTML;
var oldstr = document.body.innerHTML;
document.body.innerHTML = headstr+newstr;
window.print();
document.body.innerHTML = oldstr;
return false;
}			
var text=document.querySelector('.place').innerHTML;
var text1=document.querySelector('.father').innerHTML;


if(text.length>30){
	document.querySelector('.place').style.fontSize="15px";
	document.querySelector('.place').style.top="6.1cm";
}
if(text1.length>30){
	document.querySelector('.father').style.fontSize="15px";
	document.querySelector('.father').style.top="7.06cm";
}
if(text1.length>40){
	document.querySelector('.father').style.fontSize="11px";
	document.querySelector('.father').style.top="7.1cm";
}

</script>
	
</body>
<!--End of body-->
</html>