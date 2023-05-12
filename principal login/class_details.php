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
	
	<title>Report Cards</title>
	<link rel="stylesheet" href="student.css">
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
            <li style="background:#3e3762;"><a href="students.php"><i class="fas fa-user"></i>Students</a></li>
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
					<a href="../first pages/home.php" ><i class="fas fa-sign-out-alt"></i></a>
				</li>
			</ul>
		</div>
	</div>
<!--end of Profile Image view-->
	
<!--Main Content-->
<div class="main_content">
		<div class="first">
			<div class="reports">
				<div class="info">
						
<!--Class Selection-->				 
					<h3>Class Wise Details</h3>
						<a href="students.php" class="left">Students Info</a><br>
						<a href="student_details.php" style="margin-bottom:10px;" class="left">Student_Wise Details</a>
						<form method="POST" style="tex-align:center;">
						<label style="margin-left:100px;">CLASS:</label>
							<select  name="class" list="class" required><br><br>
							<option></option>	
							<option <?php if(isset($_POST['submit'])){ if($_POST['class']=="NURSERY") echo 'selected="selected"'; }?> >NURSERY</option>	
							<option <?php if(isset($_POST['submit'])){ if($_POST['class']=="LKG") echo 'selected="selected"'; }?>>LKG</option>	
							<option <?php if(isset($_POST['submit'])){ if($_POST['class']=="UKG") echo 'selected="selected"'; }?>>UKG</option>
							<option <?php if(isset($_POST['submit'])){ if($_POST['class']==1) echo 'selected="selected"'; }?>>1</option>	
							<option <?php if(isset($_POST['submit'])){ if($_POST['class']==2) echo 'selected="selected"'; }?>>2</option>	
							<option <?php if(isset($_POST['submit'])){ if($_POST['class']==3) echo 'selected="selected"'; }?>>3</option>	
							<option <?php if(isset($_POST['submit'])){ if($_POST['class']==4) echo 'selected="selected"'; }?>>4</option>	
							<option <?php if(isset($_POST['submit'])){ if($_POST['class']==5) echo 'selected="selected"'; }?>>5</option>	
							<option <?php if(isset($_POST['submit'])){ if($_POST['class']==6) echo 'selected="selected"'; }?>>6</option>	
							<option <?php if(isset($_POST['submit'])){ if($_POST['class']==7) echo 'selected="selected"'; }?>>7</option>	
							<option <?php if(isset($_POST['submit'])){ if($_POST['class']==8) echo 'selected="selected"'; }?>>8</option>	
							<option <?php if(isset($_POST['submit'])){ if($_POST['class']==9) echo 'selected="selected"'; }?>>9</option>	
							<option <?php if(isset($_POST['submit'])){ if($_POST['class']==10) echo 'selected="selected"';} ?>>10</option>
							</select>
							<button type="submit"  value="search" class="but" name="submit" >submit</button>
						</form>
<!--Strength view-->						
						<span style="text-align:right;  font-weight:bold; color:darkslateblue; "> &nbsp &nbsp &nbsp STRENGTH: </span><span><?php  if(isset($_POST['submit'])){ $class=$_POST['class']; $sql="SELECT * FROM Studentinformation where class='$class'";
						
								if ($result=mysqli_query($conn,$sql))
							{
							// Return the number of rows in result set
							echo $strength=mysqli_num_rows($result);
							
							}
						}
					?>
					</span>
<!--list of Class -->					
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
						<td>PHONE</td>       
						<td>IMAGE</td>       
						</tr>
						<?php  
							if(isset($_POST['submit'])){
								$class=$_POST['class'];
								$sql = "SELECT * FROM studentinformation WHERE class='$class'";
								$m=0;
								$query=mysqli_query($conn,$sql);
								While($row=mysqli_fetch_array($query))
								{
									?>
									<tr>
										<th><?php echo $row['id'];?> </th>		
										<th><?php echo $row['class'];?> </th>		
										
										<th><?php echo $row['name']; ?> </th>
										<th><?php echo $row['gender']; ?> </td>
										<th><?php echo $row['fathername']; ?> </th>
										<?php $newDate = date("d-m-Y", strtotime($row['dateofbirth'])); ?>
										<th><?php echo $newDate; ?> </th>
										<th><?php echo $row['caste']; ?> </th>
										
										<th><?php echo $row['subcastename']; ?></th>
										<th><?php echo $row['phone']; ?> </th>
										<th style="text-align:center;"><input type="button" class="but" id="hide" onclick="document.getElementsByClassName('zoom')[<?php echo $m; ?>].style.display='flex'; document.getElementById('hide').style.display='none'; document.getElementById('close').style.display='flex';" value="image"/>
										<input type="button" class="but" style="display:none;" class="button" id="close" onclick="document.getElementsByClassName('zoom')[<?php echo $m; ?>].style.display='none'; document.getElementById('hide').style.display='flex'; document.getElementById('close').style.display='none';" value="close"/>
										<?php echo "<img src='$row[0]' class='zoom'  style='height:80px; width:80px; padding:10px; display:none;'/>"; ?> </th>
									</tr>
									
									<?php
									$m++;
									
								}
								
								
							
							}	 
							
						?> 
						</table>
						
					
					
				</div> 
			</div>
		</div> 
	</div>
<!--End of Main Content-->	
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