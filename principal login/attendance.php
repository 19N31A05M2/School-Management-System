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
if(empty($_SESSION['year'])){
	$year=date('Y')-1 ."-". date('Y'); 
}

?>
<html lang="en">
<!--head-->
<head>
	
	<title>Repot Cards</title>
	<link rel="stylesheet" href="attendancestyle.css">
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
								
								<li style="font-size:16px;"><?php echo $session_name="Principal";?></li>
							</ul>
						</div>
						
					</div>
				</li>
				<li class="nr_li">
					<a href="../first pages/home.php "  ><i class="fas fa-sign-out-alt"></i></a>
				</li>
			</ul>
		</div>
	</div>
<!--End of Profile Image View-->	

<!--Main Content-->
	<div class="main_content">
		
		<div class="first">
			<a  onclick="window.location.href='1-academic.php'" class="left">Academic Update</a><br>
			<form method="POST">
						<h2>ATTENDENCE UPDATION</h2>
						<label style="margin-left:40%;">Academic Year:</label>
						<select name="year" style="width:100px;">	
							<option><?php echo (date('Y')-1)."-". date('Y'); ?></option>
							<?php $date1=date('Y')+1; ?>
							<option><?php echo date('Y')."-".$date1;?></option>		
						</select>
						<button type="submit"  name="get" class="update" >Get</button>
					</form>
			<div class="attendance">
					
					<?php 
						
						$year=date('Y')-1 ."-". date('Y'); 
						if(isset($_POST['get'])){
							$year=$_POST['year'];
							$_SESSION['year']=$year;
							
						}
						$sql = "SELECT * FROM workingdays where year='$year'";
						$query=mysqli_query($conn,$sql);
						While($row=mysqli_fetch_array($query))
						{
							$jan=$row['jan'];
							$feb=$row['feb'];
							$mar=$row['mar'];
							$apr=$row['apr'];
							$may=$row['may'];
							$jun=$row['jun'];
							$jul=$row['jul'];
							$aug=$row['aug'];
							$sep=$row['sep'];
							$oct=$row['oct'];
							$nov=$row['nov'];
							$dec=$row['dece'];
							
						}
					?>
<!--Attendence Updation Form-->					
					<form method="POST">
						<h2><label>Academic Year:</label><span><?php if(isset($_POST['get'])){ echo $year; } if(isset($_POST['update'])){ echo $_POST['year1']; } ?></span></h2>
						<table>
							<tr>
								<td>MONTH</td><td>NO.OF WORKING DAYS</td>
							</tr>
							<tr>
								<th>June</th><th><input type="number_format" name="jun" maxlength="2" onkeypress="isInputNumber(event)" value="<?php if(isset($_POST['update'])){ echo $_POST['jun'];}else{echo $jun;} ?>">days</th>
							</tr>
							<tr>
								<th>July</th><th><input type="number_format" name="jul" maxlength="2"  onkeypress="isInputNumber(event)"value="<?php if(isset($_POST['update'])){ echo $_POST['jul'];}else{ echo $jul; }?>">days</th>
							</tr>
							<tr>
								<th>August</th><th><input type="number_format" name="aug" maxlength="2"  onkeypress="isInputNumber(event)" value="<?php if(isset($_POST['update'])){ echo $_POST['aug'];}else{ echo $aug; }?>">days</th>
							</tr>
							<tr>
								<th>September</th><th><input type="number_format" name="sep" maxlength="2"  onkeypress="isInputNumber(event)" value="<?php if(isset($_POST['update'])){ echo $_POST['sep'];}else{ echo $sep; }?>">days</th>
							</tr>
							<tr>
								<th>October</th><th><input type="number_format" name="oct" maxlength="2"  onkeypress="isInputNumber(event)" value="<?php if(isset($_POST['update'])){ echo $_POST['oct'];}else{ echo $oct; }?>">days</th>
							</tr>
							<tr>
								<th>November</th><th><input type="number_format" name="nov" maxlength="2"  onkeypress="isInputNumber(event)" value="<?php if(isset($_POST['update'])){ echo $_POST['nov'];}else{ echo $nov; }?>">days</th>
							</tr>
							<tr>
								<th>December</th><th><input type="number_format" name="dec" maxlength="2"  onkeypress="isInputNumber(event)" value="<?php if(isset($_POST['update'])){ echo $_POST['dec'];}else{echo $dec; }?>">days</th>
							</tr>
							<tr>
								<th>January</th><th><input type="number_format" name="jan" maxlength="2"  onkeypress="isInputNumber(event)" value="<?php if(isset($_POST['update'])){ echo $_POST['jan'];}else{echo $jan; }?>">days</th>
							</tr>
							<tr>
								<th>February</th><th><input type="number_format" name="feb" maxlength="2"  onkeypress="isInputNumber(event)" value="<?php if(isset($_POST['update'])){ echo $_POST['feb'];}else{ echo $feb; }?>">days</th>
							</tr>
							<tr>
								<th>March</th><th><input type="number_format" name="mar" maxlength="2"  onkeypress="isInputNumber(event)" value="<?php  if(isset($_POST['update'])){ echo $_POST['mar'];}else{ echo $mar; }?>">days</th>
							</tr>
							<tr>
								<th>April</th><th><input type="number_format" name="apr" maxlength="2"  onkeypress="isInputNumber(event)" value="<?php  if(isset($_POST['update'])){ echo $_POST['apr'];}else{ echo $apr; }?>">days</th>
							</tr>
							<tr>
								<th>May</th><th><input type="number_format" name="may" maxlength="2"  onkeypress="isInputNumber(event)" value="<?php if(isset($_POST['update'])){ echo $_POST['may'];}else{ echo $may; }?>">days</th>
							</tr>
							
						</table>
						<input type="hidden" name="year1" value="<?php echo $_SESSION['year']; ?>">
						<button type="submit" class="update" name="update" value="update">update</button>
						<br><span class="correct">Updated Sucessfully </span> 
						<br><span class="incorrect">Update Failed </span> 
					</form>
					
				
				</div>
		</div> 
	</div>
<!--End of Main Content-->	
	<?php
						if(isset($_POST['update'])){
								$jan=$_POST['jan'];
								$feb=$_POST['feb'];
								$mar=$_POST['mar'];
								$apr=$_POST['apr'];
								$may=$_POST['may'];
								$jun=$_POST['jun'];
								$jul=$_POST['jul'];
								$aug=$_POST['aug'];
								$sep=$_POST['sep'];
								$oct=$_POST['oct'];
								$nov=$_POST['nov'];
								$dec=$_POST['dec'];
								$year=$_POST['year1'];
								if($feb<29 && $jan<29 && $mar<29 && $apr<29 && $may<29 && $jun<29 && $jul<29 && $aug<29 && $sep<29 && $oct<29 && $nov<29 && $dec<29){ 
									$total=$feb+$jan+$mar+$apr+$may+$jun+$jul+$aug+$sep+$oct+$nov+$dec;
									
									$conn = mysqli_connect("localhost", "root", "", "studentinfo");
									// Check connection
									if ($conn->connect_error) {
									die("Connection failed: " . $conn->connect_error);
									}
//updation of working days									
									$sql = "UPDATE workingdays SET jun='$jun',jul='$jul',aug='$aug',sep='$sep',oct='$oct',nov='$nov',dece='$dec',jan='$jan',feb='$feb',mar='$mar',apr='$apr',may='$may',totaldays='$total' WHERE year='$year'";
									
									if (mysqli_query($conn, $sql)) {
//success message										
										?>
										<script>document.body.style.overflow='hidden'; </script>
										<div id="popup2">
										<div class="alert success">
										<span class="closebtn" onclick="">&times;</span>  
										<strong>Success!&nbsp </strong>Successfully Upated.
										</div>
										</div>
										<script>
										setTimeout(function(){
											document.body.style.overflow='visible'; 
											document.getElementById('popup2').style.display = 'none';
										}, 3000);
										</script>
										<?php
									}
								}
								else{
//Working days Exceeds 									
									?>
									<script>document.body.style.overflow='hidden'; </script>
									<div id="popup2">
									<div class="alert warning">
									<span class="closebtn" onclick="">&times;</span>  
									<strong>Warning!&nbsp </strong>No of Working days exceeds.
									</div>
									<script>
										setTimeout(function(){
											document.body.style.overflow='visible'; 
											document.getElementById('popup2').style.display = 'none';
										}, 3000);
										</script>
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
	function popup()
	{
		document.querySelector(".popup").style.display="flex";
		document.body.style.overflow='hidden';
	}
	function isInputNumber(evt){
                
        var ch = String.fromCharCode(evt.which);
        
        if(!(/[0-9]/.test(ch))){
            evt.preventDefault();
        }
        
    }
</script>

</body>
<!--End of body-->
</html>