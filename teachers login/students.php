<?php
session_start();
ob_start();
$conn = new mysqli("localhost","root","","studentinfo");
if(isset($_SESSION['username'])){
	$user=explode("@",$_SESSION['username']);
	$username=$user[0];
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
if(empty($_SESSION['class'])){
	$_SESSION['class']=$classt;
}
?>
<html lang="en">
<!--head-->
<head>
	
	<title></title>
	<link rel="stylesheet" href="Students.css">
	<link rel="stylesheet" href="../fontawesome-free-5.15.2-web/css/all.css">

</head>
<!--end Of Head-->

<!--Body-->
<body>

<div class="wrapper">
<!--Sidebar-->
	<div class="sidebar">
        <h2>VISHAVAI <span>VIYANIKETAN</span></h2>
        <ul>
            <li><a href="new.php" id="home"><i class="fas fa-home"></i>Home</a></li>
            <li><a href="profile.php" id="profile"><i class="fas fa-user"></i>Profile</a></li>
            <li style="background:#3e3762;"><a href="students.php" id="students"><i class="fas fa-user-friends"></i>Students</a></li>
            <li><a href="marks.php" id="marks"><i class="fas fa-address-card"></i>Marks</a></li>
            <li><a href="report.php"  id="report"><i class="fas fa-address-book"></i>Progress Cards</a></li>
            
        </ul> 
        
    </div>
<!--end Of Sidebar-->

<!--profile Image View-->	
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
<!--end Of Profile image View-->

<!--main content-->	
	<div class="main_content">
		
		<div class="first">
			<div class="info">
				<h3>STUDENTS INFO</h3>
				<form method="post" style="margin-top:60px; text-align:center;">
<!--Selection of Class-->				
					<label> Class:</label>
					<select name="class" id="selector" required>
					<option></option>	
					<option <?php if(!empty($_SESSION['cls'])){ if($_SESSION['cls']=="NURSERY") echo 'selected="selected"'; }?> >NURSERY</option>	
					<option <?php if(!empty($_SESSION['cls'])){ if($_SESSION['cls']=="LKG") echo 'selected="selected"'; }?>>LKG</option>	
					<option <?php if(!empty($_SESSION['cls'])){ if($_SESSION['cls']=="UKG") echo 'selected="selected"'; }?>>UKG</option>
					<option <?php if(!empty($_SESSION['cls'])){ if($_SESSION['cls']==1) echo 'selected="selected"'; }?>>1</option>	
					<option <?php if(!empty($_SESSION['cls'])){ if($_SESSION['cls']==2) echo 'selected="selected"'; }?>>2</option>	
					<option <?php if(!empty($_SESSION['cls'])){ if($_SESSION['cls']==3) echo 'selected="selected"'; }?>>3</option>	
					<option <?php if(!empty($_SESSION['cls'])){ if($_SESSION['cls']==4) echo 'selected="selected"'; }?>>4</option>	
					<option <?php if(!empty($_SESSION['cls'])){ if($_SESSION['cls']==5) echo 'selected="selected"'; }?>>5</option>	
					<option <?php if(!empty($_SESSION['cls'])){ if($_SESSION['cls']==6) echo 'selected="selected"'; }?>>6</option>	
					<option <?php if(!empty($_SESSION['cls'])){ if($_SESSION['cls']==7) echo 'selected="selected"'; }?>>7</option>	
					<option <?php if(!empty($_SESSION['cls'])){ if($_SESSION['cls']==8) echo 'selected="selected"'; }?>>8</option>	
					<option <?php if(!empty($_SESSION['cls'])){ if($_SESSION['cls']==9) echo 'selected="selected"'; }?>>9</option>	
					<option <?php if(!empty($_SESSION['cls'])){ if($_SESSION['cls']==10) echo 'selected="selected"';} ?>>10</option>
					</select>
					<input type="submit"  value="search" class="but" name="submit1" />
				</form>
				<?php
					$_SESSION['cls']=$_SESSION['class'];
					if(isset($_POST['submit1']))
					{
						$class=$_POST['class'];
						$_SESSION['cls']=$class;
						?>
						<script> 
							document.querySelector(".info").style.display="block";
							document.querySelector(".head").style.display="none";
												
						</script>
						<?php
					}
					$class=$_SESSION['cls'];
				?>

<!--list of Students --> 				
				<table>
					<tr>
					<td>ADMISSION_NO</td>
					<td>CLASS</td>	  
					<td>NAME</td>        
					<td>GENDER</td>      
					<td>FATHER_NAME</td>  
					<td>DATE_OF_BIRTH</td>
					<td>CASTE</td>       
					   
					<td>SUBCASTE_NAME</td>
					<td>ADHAR_NUMBER</td>
					<td>PHONE</td>       
					</tr>
					<?php
						
						$sql = "SELECT * FROM studentinformation where class='$class'";
						$query=mysqli_query($conn,$sql);
						While($row=mysqli_fetch_array($query))
						{
								?>
								<tr>
								<th><?php echo $row['id'];?> </th>		
								<th><?php echo $row['class'];?> </th>		
								<th><?php echo $row['name']; ?> </th>
								<th><?php echo $row['gender']; ?> </th>
								<th><?php echo $row['fathername']; ?> </td>
								<th><?php echo $row['dateofbirth']; ?> </th>
								<th><?php echo $row['caste']; ?> </th>
								<th><?php echo $row['subcastename']; ?> </th>
								<th><?php echo $row['adharno']; ?> </th>
								<th><?php echo $row['phone']; ?> </th>
								
								</tr>
								<?php	  											
							
						}
					?>
				</table><BR><BR>
			</div> 
			
		</div> 
	</div>	
<!--End Of Main content-->
</div>	


	
</body>
<!--End of Body-->

<!--javascript-->
<script>
	var dd_main = document.querySelector(".dd_main");

	dd_main.addEventListener("click", function(){
		this.classList.toggle("active");
	})	

	
</script>
</html>