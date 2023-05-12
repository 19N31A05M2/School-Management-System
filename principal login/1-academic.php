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
	<meta name="viewreport" content="min-width=1000"/>
	<link rel="stylesheet" href="Academicstyle.css">
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
            <li style="background:#3e3762;"><a href="1-academic.php"><i class="fas fa-home"></i>Academic</a></li>
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
<!--end of Sidebar-->	

<!--Profile Image View-->
	<div class="navbar">
		<div class="logo">
			<a href="#"></a>
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
					<a href="../first pages/home.php"><i class="fas fa-sign-out-alt"></i></a>
				</li>
			</ul>
		</div>
	</div>
<!--End of Profile Image View-->	

<!--Main Content-->
	<div class="main_content">
		
		<div class="first">
			<a href="attendance.php" class="left">Attendence Update</a><br>
			<div class="reports">
				<h1 class="head1">New Academic Year</h1>
				<marquee width="60%"  height="100px">Welcome To New Academic Year Of <?php echo date('Y'); ?></marquee>
				<div class="acadmic">
				
					<h3>Academic Update</h3>
					<form method="POST">
						<button type="submit" name="update1" class="update1">update</button>
					</form><br>
					<span class="success">successfully Updated</span>
					
				</div>
				
			</div>
		</div> 
	</div>
<!--End of Main Content-->	
	<?php
		if(isset($_POST['update1'])){
//confirmation of update			
			?>
			<div id="popup">
			<div class="alert"> 
			<strong>Confirm!</strong> Are you Sure to Update?<br>
			<form method="POST">
			<input  class="closebtn" type="submit" name="none" value="cancel"/>
			<input class="update" type="submit" name="update" value="update"/>
			</form>
			</div>
			</div>
			<?php
		}
		if(isset($_POST['update'])){
			$year=date('Y')-1 ."-".date('Y');
			$sql = "SELECT * FROM studentinformation";
			$query=mysqli_query($conn,$sql);
			While($row=mysqli_fetch_array($query))
			{
				$id=$row['id'];
				$class=$row['class'];
				$present=$row['year'];
				$year1=$present+1;
				$classes=array("NURSERY","LKG","UKG",1,2,3,4,5,6,7,8,9,10,11);
				$a=0;
				while($a<13)
				{
					if($classes[$a]==$class){
						$class=$classes[$a+1];
						break;
					}
					$a++;			
				}
				if($present<date('Y')){
//updation for next Academic year					
					$sql = "UPDATE studentinformation SET class='$class',year='$year1' WHERE id='$id'";
					if (mysqli_query($conn, $sql)) {
						echo " ";
						
					} else {
						echo "Error updating record: " . mysqli_error($conn);
					}
					$val=1;
				}else{
					$val=0;
				}
				
				
			}
			if($val==1){
				
				?> 
				<script> 
					document.querySelector(".success").style.display="block";									
				</script>	
				<?php
				$year=date("Y");
				$date=date('Y-m-d');
				$fee=0;
			
				$academic=date('Y')."-".(date('Y')+1);
				$jan=0;
//inserting into working days of new Academic Year		
				$sql = "INSERT INTO workingdays (year,jan,feb,mar,apr,may,jun,jul,aug,sep,oct,nov,dece,totaldays) VALUES ('$academic','$jan','$jan','$jan','$jan','$jan','$jan','$jan','$jan','$jan','$jan','$jan','$jan','$jan')";
				if (mysqli_query($conn, $sql)){
					echo " ";
				}
				$sql = "SELECT * FROM studentinformation";
				$query=mysqli_query($conn,$sql);
				While($row=mysqli_fetch_array($query))
				{
					$image=$row['image'];
					$id=$row['id'];
					$admnclass=$row['admnclass'];
					$admndate=$row['admndate'];
					$name=$row['name'];
					$mothertongue=$row['mothertongue'];
					$dateofbirth=$row['dateofbirth'];
					$caste=$row['caste'];
					$subcastename=$row['subcastename'];
					$gender=$row['gender'];
					$adharno=$row['adharno'];
					$fathername=$row['fathername'];
					$mothername=$row['mothername'];
					$address=$row['address'];
					$religion=$row['religion'];
					$phd=$row['phd'];
					$mole1=$row['mole1'];
					$mole2=$row['mole2'];
					$class=$row['class'];
					$phone=$row['phone'];
					$tcissued="YES";
					if($row['class']==11){
						$feedue=0;
						$status="PASSED";
						$actualdate=$date;
						$class=10;
						$pclass=10;
						$query1=mysqli_query($conn,"select * from studentfees where id='$id'");
						While($row=mysqli_fetch_array($query1))
						{
							if(($row['id']== $id) && ($row['class']=10)){
							
								$feedue=$row['totalfee']; 	
							}
		
						}
//insertion in dropout						
						$sql = "INSERT INTO dropout (image,id,admnclass,admndate,name,mothertongue,dateofbirth,caste,subcastename,gender,adharno,fathername,mothername,address,religion,phd,mole1,mole2,leavingclass,phone,year,dateofleaving,feedue,tcissued,studyingclass,dateactuallyleft,status) VALUES ('$image','$id','$admnclass','$admndate','$name','$mothertongue','$dateofbirth','$caste','$subcastename','$gender','$adharno','$fathername','$mothername','$address','$religion','$phd','$mole1','$mole2','$pclass','$phone','$year','$date','$feedue','$tcissued','$class','$actualdate','$status')";
						if (mysqli_query($conn, $sql)){
							if ($conn->connect_error) {
								die("Connection failed: " . $conn->connect_error);
							}
							
							// sql to delete a record
							$sql = "DELETE  FROM studentinformation WHERE id='$id'";
							
							if ($conn->query($sql) === TRUE) {
								echo "";
								?> 
								<script> 
									document.querySelector(".success").style.display="block";									
								</script>	
								<?php
							} else {
								echo "Error deleting record: " . $conn->error;
								?> 
								<script> 
									document.querySelector(".success").style.display="none";									
								</script>	
								<?php
							}
						}
								
					}
					
					
				}
				
			}
			if($val==0){
//cannot update message				
				?>
				<script>document.body.style.overflow='hidden';</script>
				<div id="popup2">
				<div class="alert1 warning">
				<span class="closebtn1" onclick="document.getElementById('popup2').style.display='none';">&times;</span>  
				<strong>Warning!&nbsp </strong>Cannot Update 2 Times In a Year.
				</div>
				<?php
			}
		}
	?>
</div>	
<!--javascript-->
<script>
	var dd_main = document.querySelector(".dd_main");

	dd_main.addEventListener("click", function(){
		this.classList.toggle("active");
	})	
	setTimeout(function(){
		document.body.style.overflow='visible'; 
		document.getElementById('popup2').style.display = 'none';
	}, 3000);

	
</script>
	
</body>
<!--End of body-->
</html>