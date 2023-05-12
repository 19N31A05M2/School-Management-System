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
	$_SESSION['exam']="Formative 1";
	
}else{
	header('location:../first pages/home.php');
}


?>
<html lang="en">
<!--Head-->
<head>
	
	<title></title>
	<link rel="stylesheet" href="marksstyle.css">
	<link rel="stylesheet" href="../fontawesome-free-5.15.2-web/css/all.css">
	

</head>
<!--End of Head-->
<script>
document.body.style.overflow='visible';
</script>

<!--Body-->
<body>

<div class="wrapper">
<!--Sidebar-->
	<div class="sidebar">
        <h2>VISHAVAI <span>VIYANIKETAN</span></h2>
        <ul>
            <li><a href="new.php" id="home"><i class="fas fa-home"></i>Home</a></li>
            <li><a href="profile.php" id="profile"><i class="fas fa-user"></i>Profile</a></li>
            <li><a href="students.php" id="students"><i class="fas fa-user-friends"></i>Students</a></li>
            <li style="background:#3e3762;"><a href="marks.php" id="marks"><i class="fas fa-address-card"></i>Marks</a></li>
            <li><a href="report.php"  id="report"><i class="fas fa-address-book"></i>Progress Cards</a></li>
            
        </ul> 
        <div class="social_media">
          
		</div>
    </div>
<!--End Of Sidebar-->

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
<!--End of profile 	View-->

<!--Main content-->
	<div class="main_content">
		<a href="editmarks.php" class="left">Edit Marks</a><br>
		<div class="first">
			<div class="marks_entry">
				<h3>MARKS</h3>
<!--Selection -->				
				<form method="post" style="margin-top:30px; text-align:center;">
					<label> Class:</label>
					<select name="class" id="selector"  >
					<option> </option>	
						
					<option <?php if($_SESSION['class']=="NURSERY") echo 'selected="selected"'; ?> >NURSERY</option>	
					<option <?php if($_SESSION['class']=="LKG") echo 'selected="selected"'; ?>>LKG</option>	
					<option <?php if($_SESSION['class']=="UKG") echo 'selected="selected"'; ?>>UKG</option>
					<option <?php if($_SESSION['class']==1) echo 'selected="selected"'; ?>>1</option>	
					<option <?php if($_SESSION['class']==2) echo 'selected="selected"'; ?>>2</option>	
					<option <?php if($_SESSION['class']==3) echo 'selected="selected"'; ?>>3</option>	
					<option <?php if($_SESSION['class']==4) echo 'selected="selected"'; ?>>4</option>	
					<option <?php if($_SESSION['class']==5) echo 'selected="selected"'; ?>>5</option>	
					<option <?php if($_SESSION['class']==6) echo 'selected="selected"'; ?>>6</option>	
					<option <?php if($_SESSION['class']==7) echo 'selected="selected"'; ?>>7</option>	
					<option <?php if($_SESSION['class']==8) echo 'selected="selected"'; ?>>8</option>	
					<option <?php if($_SESSION['class']==9) echo 'selected="selected"'; ?>>9</option>	
					<option <?php if($_SESSION['class']==10) echo 'selected="selected"'; ?>>10</option>
					</select>
					
					<input type="submit" class='but' value="search" name="submit2" />
				</form>
<!--table View of Class-->				
				<table>
					<tr>
					<td>CLASS</td>
					<td>ADMISSION_NO</td>	  
					<td>NAME</td>        
					<td>GENDER</td>       
					<td>DATE_OF_BIRTH</td>      
					<td>EXAM_WRITTEN</td>
					<td>Entry</td>
					</tr>
				<?php
				
					if(isset($_POST['submit2']))
					{
						$class=$_POST['class'];
						$_SESSION['class']=$class;
						$class=$_SESSION['class'];
					}
					$class=$_SESSION['class'];
					
					$sql = "SELECT * FROM studentinformation where class='$class'";
					$query=mysqli_query($conn,$sql);
					While($row=mysqli_fetch_array($query))
					{	
						?>
							<tr>
							<th><?php echo $clas=$row['class'];?> </th>
							<th><?php echo $ad=$row['id'];?> </th>				
							<th><?php echo $row['name'];?> </th>
							<th><?php echo $row['gender']; ?> </td>
							<th><?php echo date('d-m-Y',strtotime($row['dateofbirth'])); ?> </th>
							<th>
							<?php
							$yr=$row[28];
							$query1=mysqli_query($conn,"SELECT * FROM marks where id='$ad' And class='$clas'");
							While($row=mysqli_fetch_array($query1))
							{
								echo $exam=$row['exam']."  ";
								
							}
							?>
							</th>
							<th><form method="POST"> 
							<input type="hidden" name="adno" value="<?php echo $ad; ?>"/> 
							<input type="hidden" name="class" value="<?php echo $clas; ?>"/>
							<input type="hidden" name="year" value="<?php echo $yr; ?>"/>
							<input type="submit" name="entry" class="but" value="Enter Marks"/></form></th>
							</tr>
						<?php	  											
						
					}
					
						
				?>
				</table><br><br>
			</div>
		</div> 
	</div>
<?php
	$popup=0;
	$sjan=0;
	$sfeb=0;
	$smar=0;
	$sapr=0;
	$smay=0;
	$sjun=0;
	$sjul=0;
	$saug=0;
	$ssep=0;
	$soct=0;
	$snov=0;
	$sdec=0;
	if(isset($_POST['entry']))	
	{
		
		?><script>document.body.style.overflow='hidden';</script><?php
		$class=$_POST['class'];
		$id=$_POST['adno'];
		$year1=$_POST['year'];
		$year=$year1."-".($year1+1);
		
		$query=mysqli_query($conn,"select * from workingdays where year='$year'");//fectching Working days
		$count=mysqli_num_rows($query);
		
		if($count==0)
		{
			$popup=2;
		}else{
			$popup=1;	
		}
			
		$sql = "SELECT * FROM studentinformation where id='$id'";//fecthing Student Information
		$query=mysqli_query($conn,$sql);
		While($row=mysqli_fetch_array($query))
		{
			$name=$row['name'];
			$father=$row['fathername'];
			$class=$row['class'];
			$phone=$row['phone'];
			$dob=date('d-m-Y',strtotime($row['dateofbirth']));
			$year1=$row['year'];
			$year2=$year1+1;
			
		}
		
		
		$year=$year1."-".$year2;
		
		$sql = "SELECT * FROM marks where id='$id' and class='$class'";//Fecthing Attendence Of A Student
			$query=mysqli_query($conn,$sql);
				While($row=mysqli_fetch_array($query))
				{
					if($row['jan']!=0){
						$sjan=$row['jan'];
					}
					if($row['feb']!=0){
						$sfeb=$row['feb'];
					}
					if($row['mar']!=0){
						$smar=$row['mar'];
					}
					if($row['apr']!=0){
						$sapr=$row['apr'];
					}
					if($row['may']!=0){
						$smay=$row['may'];
					}
					if($row['jun']!=0){
						$sjun=$row['jun'];
					}
					if($row['jul']!=0){
						$sjul=$row['jul'];
					}
					if($row['aug']!=0){
						$saug=$row['aug'];
					}
					if($row['sep']!=0){
						$ssep=$row['sep'];
					}
					if($row['oct']!=0){
						$soct=$row['oct'];
					}
					if($row['nov']!=0){
						$snov=$row['nov'];
					}
					if($row['dece']!=0){
						$sdec=$row['dece'];
					}
				}
			
		
	}
	
?>


<!--MARKS ENTRY FORM-->
		<div class="popup">
		<div class="popup-content">
			
			<img class="close" src="../images/close.png" onclick="document.querySelector('.popup').style.display='none'; document.body.style.overflow='visible';  ">
			<img  src="../images/marksentry.jpg" style="width:100%; height:100px;">
			
			<form method="POST">
				
				
				
				<h3 class="h1">
					<table style="width:100%; border:2px solid none; margin-left:0px;">
					<tr><th>ADMISSION NO:</th><td><?php   if(isset($_POST['update'])){ echo $id=$_POST['adno']; }else{echo $id;}?></td><th>CLASS:</th><td><?php   if(isset($_POST['update'])){ echo $class=$_POST['class']; }else{echo $class;}?></td></tr>
					<tr><th>STUDENT NAME:</th><td><?php   if(isset($_POST['update'])){ echo $name=$_POST['name']; }else{echo $name;}?></td><th>DATE OF BIRTH:</th><td><?php   if(isset($_POST['update'])){ echo $dob=$_POST['dob']; }else{echo $dob;}?></td></tr>
					<tr><th>FATHER NAME:</th><td><?php   if(isset($_POST['update'])){ echo $father=$_POST['fathername']; }else{echo $father;}?></td><th>Academic Year:</th><td><?php   if(isset($_POST['update'])){ echo $year=$_POST['year']; }else{echo $year;}?></td></tr>
					</table>
					
					
				</h3>
				<label> Exam:</label>
				<select name="exam" id="selection" onchange="toggleshared();" >
				<option> </option>	
					<option <?php if(isset($_POST['update'])){ if($_POST['exam']=="Formative 1"){ echo 'selected="selected"'; }}?> >Formative 1</option>	
					<option <?php if(isset($_POST['update'])){ if($_POST['exam']=="Formative 2"){ echo 'selected="selected"'; }}?> >Formative 2</option>	
					<option <?php if(isset($_POST['update'])){ if($_POST['exam']=="Summative 1"){ echo 'selected="selected"'; }}?> >Summative 1</option>
					<option <?php if(isset($_POST['update'])){ if($_POST['exam']=="Formative 3"){ echo 'selected="selected"'; }}?> >Formative 3</option>	
					<option <?php if(isset($_POST['update'])){ if($_POST['exam']=="Formative 4"){ echo 'selected="selected"'; }}?>>Formative 4</option>	
					<option <?php if(isset($_POST['update'])){ if($_POST['exam']=="Summative 2"){ echo 'selected="selected"'; }}?> >Summative 2</option>	
				</select>
<!--javascript for Marks Entry Form-->				
				<script>
					function toggleshared(){
						var ddlPassport = document.getElementById("selection");
						if((ddlPassport.value == "Summative 1") || (ddlPassport.value == "Summative 2")){
								for(i=0;i<6;i++){
									document.getElementsByClassName("twe")[i].style.display="none";
									document.getElementsByClassName("hun")[i].style.display="block";
								}
							}
							else{
								for(i=0;i<6;i++){
									document.getElementsByClassName("twe")[i].style.display="block";
									document.getElementsByClassName("hun")[i].style.display="none";
								}
							}
							if(ddlPassport.value == "Formative 1"){
								document.querySelector(".formative").style.display="block";
								document.querySelector(".summative").style.display="none";
								for(i=0;i<6;i++){
									document.getElementsByClassName("formative1")[i].style.display="block";
									document.getElementsByClassName("formative2")[i].style.display="none";
									document.getElementsByClassName("formative3")[i].style.display="none";
									document.getElementsByClassName("formative4")[i].style.display="none";
								}
							}
							if(ddlPassport.value == "Formative 2"){
								document.querySelector(".formative").style.display="block";
								document.querySelector(".summative").style.display="none";
								for(i=0;i<6;i++){
									document.getElementsByClassName("formative1")[i].style.display="none";
									document.getElementsByClassName("formative2")[i].style.display="block";
									document.getElementsByClassName("formative3")[i].style.display="none";
									document.getElementsByClassName("formative4")[i].style.display="none";
								}
							}
							if(ddlPassport.value == "Formative 3"){
								document.querySelector(".formative").style.display="block";
								document.querySelector(".summative").style.display="none";
								for(i=0;i<6;i++){
									document.getElementsByClassName("formative2")[i].style.display="none";
									document.getElementsByClassName("formative3")[i].style.display="block";
									document.getElementsByClassName("formative1")[i].style.display="none";
									document.getElementsByClassName("formative4")[i].style.display="none";
								}
							}
							if(ddlPassport.value == "Formative 4"){
								document.querySelector(".formative").style.display="block";
								document.querySelector(".summative").style.display="none";
								for(i=0;i<6;i++){
									document.getElementsByClassName("formative2")[i].style.display="none";
									document.getElementsByClassName("formative4")[i].style.display="block";
									document.getElementsByClassName("formative3")[i].style.display="none";
									document.getElementsByClassName("formative1")[i].style.display="none";
								}
							}
							if(ddlPassport.value == "Summative 1"){
								document.querySelector(".formative").style.display="none";
								document.querySelector(".summative").style.display="block";
								for(i=0;i<18;i++){
									document.getElementsByClassName("summative2")[i].style.display="none";
									document.getElementsByClassName("summative1")[i].style.display="block";
								}
							}
							if(ddlPassport.value == "Summative 2"){
								document.querySelector(".formative").style.display="none";
								document.querySelector(".summative").style.display="block";
								for(i=0;i<18;i++){
									document.getElementsByClassName("summative1")[i].style.display="none";
									document.getElementsByClassName("summative2")[i].style.display="block";
								}
							}
					}
				</script>
<!--End of Javascript Of Marks Entry Form-->				
				<table class="popuptable">
					<tr>
						<td>Subject</td><td>marks</td><td>Out Of</td>
					</tr>
					<tr>
						<th>Telugu</th><th><input type="number_format" maxlength="3" name="telugu" value="<?php if(isset($_POST['update'])){ echo $_POST['telugu']; } ?>" required></th><th><span class="hun">/100 </span><span class="twe">/25</span></th>
					</tr>
					<tr>
						<th>Hindi</th><th><input type="number_format" maxlength="3" name="hindi" value="<?php if(isset($_POST['update'])){ echo $_POST['hindi']; } ?>" required></th><th><span class="hun">/100 </span><span class="twe">/25</span></th>
					</tr>
					<tr>
						<th>English</th><th><input type="number_format" maxlength="3" name="english" value="<?php if(isset($_POST['update'])){ echo $_POST['english']; } ?>" required></th><th><span class="hun">/100 </span><span class="twe">/25</span></th>
					</tr>
					<tr>
						<th>Maths</th><th><input type="number_format" maxlength="3" name="maths" value="<?php if(isset($_POST['update'])){ echo $_POST['maths']; } ?>" required></th><th><span class="hun">/100 </span><span class="twe">/25</span></th>
					</tr>
					<tr>
						<th>Science</th><th><input type="number_format" maxlength="3" name="science" value="<?php if(isset($_POST['update'])){ echo $_POST['science']; } ?>" required></th><th><span class="hun">/100 </span><span class="twe">/25</span></th>
					</tr>
					<tr>
						<th>Social</th><th><input type="number_format" maxlength="3" name="social" value="<?php if(isset($_POST['update'])){ echo $_POST['social']; } ?>" required></th><th><span class="hun">/100 </span><span class="twe">/25</span></th>
					</tr>
				</table>
				<div class="attendance">
				<table class="formative">
					<tr>
						<th>Months</td>
						<th><span class="formative1">June</span><span class="formative2">September</span><span class="formative3">December</span><span class="formative4">March</span></th>
						<th><span class="formative1">July</span><span class="formative2">October</span><span class="formative3">January</span><span class="formative4">April</span></th>
						<th><span class="formative1">August</span><span class="formative2">November</span><span class="formative3">February</span><span class="formative4">May</span></th>
					</tr>
					<tr>
						<th>No. of Days present</th>
						<td><input type="number_format" maxlength="2" name="month1" value="<?php if(isset($_POST['update'])){ echo $_POST['month1']; } ?>" onkeypress="isInputNumber(event)" /> </td>
						<td><input type="number_format" maxlength="2" name="month2" value="<?php if(isset($_POST['update'])){ echo $_POST['month2']; } ?>" onkeypress="isInputNumber(event)" /> </td>
						<td><input type="number_format" maxlength="2" name="month3" value="<?php if(isset($_POST['update'])){ echo $_POST['month3']; } ?>" onkeypress="isInputNumber(event)" /> </td>
					</tr>
					<?php
						if(isset($_SESSION['year'])){
							$year=$_SESSION['year'];
						}
						$sql = "SELECT * FROM workingdays where year='$year' ";//fecthing Working days
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
					<tr>
						<th>No. of Working Days </th>
						<td><span class="formative1"><?php echo $jun; ?></span><span class="formative2"><?php echo $sep; ?> </span><span class="formative3"><?php echo $dec; ?> </span><span class="formative4"><?php echo $mar; ?> </span></td>
						<td><span class="formative1"><?php echo $jul; ?> </span><span class="formative2"><?php echo $oct; ?> </span><span class="formative3"><?php echo $jan; ?> </span><span class="formative4"><?php echo $apr; ?> </span></td>
						<td><span class="formative1"><?php echo $aug; ?> </span><span class="formative2"><?php echo $nov; ?> </span><span class="formative3"><?php echo $feb; ?> </span><span class="formative4"><?php echo $may; ?> </span> </td>
					</tr>
				</table>
				<table class="summative" >
				<tr>
					<th>Months</td>
					<th><span class="summative1">June</span><span class="summative2">December</span></th>
					<th><span class="summative1">July</span><span class="summative2">January</span></th>
					<th><span class="summative1">August</span><span class="summative2">February</span></th>
					<th><span class="summative1">September</span><span class="summative2">March</span></th>
					<th><span class="summative1">October</span><span class="summative2">April</span></th>
					<th><span class="summative1">November</span><span class="summative2">May</span></th>
				</tr>
				<?php
					$sql = "SELECT * FROM marks where id='$id' and class='$class'";//fecthing Student Attendence
					$query=mysqli_query($conn,$sql);
					While($row=mysqli_fetch_array($query))
					{
						if($row['jan']!=0){
							$sjan=$row['jan'];
						}
						if($row['feb']!=0){
							$sfeb=$row['feb'];
						}
						if($row['mar']!=0){
							$smar=$row['mar'];
						}
						if($row['apr']!=0){
							$sapr=$row['apr'];
						}
						if($row['may']!=0){
							$smay=$row['may'];
						}
						if($row['jun']!=0){
							$sjun=$row['jun'];
						}
						if($row['jul']!=0){
							$sjul=$row['jul'];
						}
						if($row['aug']!=0){
							$saug=$row['aug'];
						}
						if($row['sep']!=0){
							$ssep=$row['sep'];
						}
						if($row['oct']!=0){
							$soct=$row['oct'];
						}
						if($row['nov']!=0){
							$snov=$row['nov'];
						}
						if($row['dece']!=0){
							$sdec=$row['dece'];
						}
					}
				?>
				<tr>	
				
					<th>No. of Days present</th>
					<td><span class="summative1"><?php echo $sjun; ?></span><span class="summative2"><?php echo $sdec; ?></span></td>
					<td><span class="summative1"><?php echo $sjul; ?></span><span class="summative2"><?php echo $sjan; ?></span></td>
					<td><span class="summative1"><?php echo $saug; ?></span><span class="summative2"><?php echo $sfeb; ?></span></td>
					<td><span class="summative1"><?php echo $ssep; ?></span><span class="summative2"><?php echo $smar; ?></span></td>
					<td><span class="summative1"><?php echo $soct; ?></span><span class="summative2"><?php echo $sapr; ?></span></td>
					<td><span class="summative1"><?php echo $snov; ?></span><span class="summative2"><?php echo $smay; ?></span></td>
				</tr>
				<tr>
					
					<th>No. of Working Days </th>
					<td><span class="summative1"><?php echo $jun;?></span><span class="summative2"><?php echo $dec;?></span></td>
					<td><span class="summative1"><?php echo $jul;?></span><span class="summative2"><?php echo $jan;?></span></td>
					<td><span class="summative1"><?php echo $aug;?></span><span class="summative2"><?php echo $feb;?></span></td>
					<td><span class="summative1"><?php echo $sep;?></span><span class="summative2"><?php echo $mar;?></span></td>
					<td><span class="summative1"><?php echo $oct;?></span><span class="summative2"><?php echo $apr;?></span></td>
					<td><span class="summative1"><?php echo $nov;?></span><span class="summative2"><?php echo $may;?></span></td>
				</tr>
				</table>
				</div>
				<input type="hidden" name="adno" value="<?php echo $id; ?>"/> 
				<input type="hidden" name="class" value="<?php echo $class; ?>"/> 
				<input type="hidden" name="year" value="<?php echo $year; ?>"/> 
				<input type="hidden" name="name" value="<?php echo $name; ?>"/> 
				<input type="hidden" name="dob" value="<?php echo $dob; ?>"/> 
				<input type="hidden" name="fathername" value="<?php echo $father; ?>"/> 
				<button type="submit" class="button1"  name="update">Submit</button>
				
				
			</form>
		</div>
		</div>	
<!--End Of Marks Entry Form-->
<?php
	if(isset($_POST['update'])){
		?><script>document.body.style.overflow='hidden';</script><?php
		$insert=0;
		$dulipate=0;
		$year=$_POST['year'];
		$id=$_POST['adno'];
		$name=$_POST['name'];
		$class=$_POST['class'];
		$exam=$_POST['exam'];
		$telugu=$_POST['telugu'];
		$hindi=$_POST['hindi'];
		$english=$_POST['english'];
		$maths=$_POST['maths'];
		$science=$_POST['science'];
		$social=$_POST['social'];
		
		$sql = "SELECT * FROM marks where id='$id' and exam='$exam' and class='$class'";
		if ($result = $conn -> query($sql))
		{
			while ($row = $result -> fetch_row()) 
			{
				$dulipate=1;
			}
		}
		if($dulipate==1){
			?>
<!--Already Marks Entered Message-->			
			<div id="popup2">
			<div class="alert warning">
			<span class="closebtn" onclick="document.getElementById('popup').style.display='none';">&times;</span>  
			<strong>warning!&nbsp </strong><?php echo $exam; ?> Already Submited.
			</div>
			</div>
			<script>
					
			setTimeout(function(){
		
				document.getElementById('popup2').style.display = 'none';
			}, 3000);
			document.querySelector('.popup').style.display="flex";
			document.body.style.overflow='hidden';
			</script>
			<?php
		}else{
		
			$sql = "SELECT * FROM workingdays where year='$year' ";
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
			$x=0;
			$gra=0;
			$check=0;
			$cpga=0;
			$totalmarks=0;
			if(($exam=="Summative 1") || ($exam=="Summative 2")){
			/*
			$sql = "SELECT * FROM marks where id='$id' and class='$class' and exam='Formative 1'";
			if ($result = $conn -> query($sql))
			{
				while ($row = $result -> fetch_row()) 
				{
					$telugu1=$row[4];
					$hindi1=$row[5];
					$english1=$row[6];
					$maths1=$row[7];
					$science1=$row[8];
					$social1=$row[9];
					$check++;
				}
			}
			$sql = "SELECT * FROM marks where id='$id' and class='$class' and exam='Formative 2'";
			if ($result = $conn -> query($sql))
			{
				while ($row = $result -> fetch_row()) 
				{
					$telugu2=$row[4];
					$hindi2=$row[5];
					$english2=$row[6];
					$maths2=$row[7];
					$science2=$row[8];
					$social2=$row[9];
					$check++;
				}
			}
			$sql = "SELECT * FROM marks where id='$id' and class='$class' and exam='Formative 1'";
			if ($result = $conn -> query($sql))
			{
				while ($row = $result -> fetch_row()) 
				{
					$telugu3=$row[4];
					$hindi3=$row[5];
					$english3=$row[6];
					$maths3=$row[7];
					$science3=$row[8];
					$social3=$row[9];
					$check++;
				}
			}
			$sql = "SELECT * FROM marks where id='$id' and class='$class' and exam='Formative 1'";
			if ($result = $conn -> query($sql))
			{
				while ($row = $result -> fetch_row()) 
				{
					$telugu4=$row[4];
					$hindi4=$row[5];
					$english4=$row[6];
					$maths4=$row[7];
					$science4=$row[8];
					$social4=$row[9];
					$check++;
				}
			}
			if($exam=='Summative 1' && $check==2){
				$telugu=$telugu+(($telugu1+$telugu2)/2);
				$hindi=$hindi+(($hindi1+$hindi2)/2);
				$english=$english+(($english1+$english2)/2);
				$maths=$maths+(($maths1+$maths2)/2);
				$science=$science+(($science1+$science2)/2);
				$social=$social+(($social1+$social2)/2);
				$totalmarks=$telugu+$hindi+$english+$maths+$science+$social;
			}
			if($exam=='Summative 2' && $check==4){
				$telugu=$telugu+(($telugu1+$telugu2+$telugu3+$telugu4)/4);
				$hindi=$hindi+(($hindi1+$hindi2+$hindi3+$hindi4)/4);
				$english=$english+(($english1+$english2+$english3+$english4)/4);
				$maths=$maths+(($maths1+$maths2+$maths3+$maths4)/4);
				$science=$science+(($science1+$science2+$science3+$science4)/4);
				$social=$social+(($social1+$social2+$social3+$social4)/4);
				$totalmarks=$telugu+$hindi+$english+$maths+$science+$social;
			}
				
				
			*/
			
//claculation of Summative Marks And Grades			
				if(is_numeric($telugu) && is_numeric($hindi)&& is_numeric($english)&& is_numeric($maths)&& is_numeric($science)&& is_numeric($social)){
					$totalmarks=$telugu+$hindi+$english+$maths+$science+$social;
				}
				$cgpa=floatval($totalmarks/60);
				
				$cpga=number_format($cgpa, 1);
				$cg=$cpga-floor($cpga);
				if(($telugu<35) || ($hindi<35) || ($english<35) || ($maths<35) ||($science<35) || ($social<35)){
					$grade="F";
					if((round($cg, 1)) ==0.9 || (round($cg, 1)) ==0.1  || (round($cg, 1)) ==0.4 || (round($cg, 1)) == 0.6){
						$cpga=$cpga+0.1;
						
					}
				}else{
					$gra=1;
				}
			}else{
				
//Calculation of formative Marks				
				if(is_numeric($telugu) && is_numeric($hindi)&& is_numeric($english)&& is_numeric($maths)&& is_numeric($science)&& is_numeric($social)){
					$totalmarks=$telugu+$hindi+$english+$maths+$science+$social;
				}
				$cgpa=floatval($totalmarks/15);
				$cpga=number_format($cgpa, 1);
				$cg=$cpga-floor($cpga);
				if(($telugu<10) || ($hindi<10) || ($english<10) || ($maths<10) ||($science<10) || ($social<10)){
					$grade="F";
					if((round($cg, 1)) ==0.9 || (round($cg, 1)) ==0.1  || (round($cg, 1)) ==0.4 || (round($cg, 1)) == 0.6){
						$cpga=$cpga+0.1;
						
					}
				}else{
					$gra=1;
				}
			}
			
//Calculation of Grade		
			if($gra==1){
			
				if((round($cg, 1)) ==0.9 || (round($cg, 1)) ==0.1  || (round($cg, 1)) ==0.4 || (round($cg, 1)) == 0.6){
					$cpga=$cpga+0.1;
				
				}
				
				if($cpga>=9.0 && $cpga<10)
				{
					$grade="A+";
				}
				if($cpga>=8.0 && $cpga<9.0)
				{
					$grade="A";
				}
				if($cpga>=7 && $cpga<8)
				{
					$grade="B+";
				}
				if($cpga>=6 && $cpga<7)
				{
					$grade="B";
				}
				if($cpga>=3.5 && $cpga<6)
				{
					$grade="C";
				}
				if($cpga<3.5)
				{
					$grade="F";
				}
			}
//Formative 1 Marks Insertion			
			if($exam=="Formative 1") {
				$sjun=$_POST['month1'];
				$sjul=$_POST['month2'];
				$saug=$_POST['month3'];
				
				if($telugu<26 && $hindi<26 && $english<26 && $maths<26 && $science<26 && $social<26 && $sjun<=$jun && $sjul<=$jul && $saug<=$aug ){
					$total=$sjun+$sjul+$saug;
					$totaldays=$jun+$jul+$aug;
					$attendance=floatval(($total/$totaldays)*100);
					$attendance=number_format($attendance,2);
					$sql ="INSERT INTO marks (class,id,name,exam,telugu,hindi,english,maths,science,social,totalmarks,cgpa,attendance,overallgrade,year,jan,feb,mar,apr,may,jun,jul,aug,sep,oct,nov,dece,totaldayspresent) VALUES('$class','$id','$name','$exam','$telugu','$hindi','$english','$maths','$science','$social','$totalmarks','$cpga','$attendance','$grade','$year','$x','$x','$x','$x','$x','$sjun','$sjul','$saug','$x','$x','$x','$x','$total')";
					if (mysqli_query($conn, $sql)) {
						$_SESSION['exam']="Formative 1";
//success message						
						?>						
						<div id="popup2">
						<div class="alert success">
						<span class="closebtn" onclick="document.getElementById('popup2').style.display='none';">&times;</span>  
						<strong>Success!&nbsp </strong><?php echo $exam; ?> Marks Entered Successfully.
						</div>
						</div>
						<script>
						
						setTimeout(function(){
			
							document.getElementById('popup2').style.display = 'none';
							document.body.style.overflow='visible';
							window.location.href="marks.php";
						}, 3000);
						
						</script>
					
						<?php
					}else {
						echo "Error: " . $sql . "<br>" . $conn->error;
					}
				}else{
					
//Entered Marks Are Wrong Message					
					?>
					<div id="popup2">
					<div class="alert warning">
					<span class="closebtn" onclick="document.getElementById('popup2').style.display='none';">&times;</span>  
					<strong>warning!&nbsp </strong>Entered Marks are Wrong (Or) Present Days Exceeds Workingdays.
					</div>
					</div>
					<script>
					
					setTimeout(function(){
		
						document.getElementById('popup2').style.display = 'none';
					}, 3000);
					document.body.style.overflow='hidden';
					document.querySelector('.popup').style.display="flex";
					</script>
					<?php
				}
			}
//Formative 2 Marks Insertion				
			if($exam=="Formative 2") {
				$ssep=$_POST['month1'];
				$soct=$_POST['month2'];
				$snov=$_POST['month3'];
				if($telugu<26 && $hindi<26 && $english<26 && $maths<26 && $science<26 && $social<26 && $ssep<=$sep && $soct<=$oct && $snov<=$nov ){
					$total=$ssep+$soct+$snov;
					$totaldays=$sep+$oct+$nov;
					$attendance=floatval(($total/$totaldays)*100);
					$attendance=number_format($attendance,2);
					$sql ="INSERT INTO marks (class,id,name,exam,telugu,hindi,english,maths,science,social,totalmarks,cgpa,attendance,overallgrade,year,jan,feb,mar,apr,may,jun,jul,aug,sep,oct,nov,dece,totaldayspresent) VALUES('$class','$id','$name','$exam','$telugu','$hindi','$english','$maths','$science','$social','$totalmarks','$cpga','$attendance','$grade','$year','$x','$x','$x','$x','$x','$x','$sx','$x','$ssep','$soct','$snov','$x','$total')";
					if (mysqli_query($conn, $sql)) {
						$_SESSION['exam']="Formative 2";
//Success Message						
						?>
						<div id="popup2">
						<div class="alert success">
						<span class="closebtn" onclick="document.getElementById('popup2').style.display='none';">&times;</span>  
						<strong>Success!&nbsp </strong><?php echo $exam; ?> Marks Entered Successfully .
						</div>
						</div>
						<script>
					
						setTimeout(function(){
			
							document.getElementById('popup2').style.display = 'none';
							document.body.style.overflow='visible';
							window.location.href="marks.php";
						}, 3000);
						
						</script>
					
						<?php
					}
				}else{
//entered Marks are Wrong Message					
					?>
					<div id="popup2">
					<div class="alert warning">
					<span class="closebtn" onclick="document.getElementById('popup2').style.display='none';">&times;</span>  
					<strong>warning!&nbsp </strong>Entered Marks are Wrong (Or) Present Days Exceeds Workingdays.
					</div>
					</div>
					<script>
					
					setTimeout(function(){
		
						document.getElementById('popup2').style.display = 'none';
					}, 3000);
					document.body.style.overflow='hidden';
					document.querySelector('.popup').style.display="flex";
	
					</script>
					<?php
				}
			}
//Formative 3 marks	insertion		
			if($exam=="Formative 3") {
				$sdec=$_POST['month1'];
				$sjan=$_POST['month2'];
				$sfeb=$_POST['month3'];
				if($telugu<26 && $hindi<26 && $english<26 && $maths<26 && $science<26 && $social<26 && $sdec<=$dec && $sjan<=$jan && $sfeb<=$feb ){
					$total=$sjan+$sfeb+$sdec;
					$totaldays=$jan+$feb+$dec;
					$attendance=floatval(($total/$totaldays)*100);
					$attendance=number_format($attendance,2);
					$sql ="INSERT INTO marks (class,id,name,exam,telugu,hindi,english,maths,science,social,totalmarks,cgpa,attendance,overallgrade,year,jan,feb,mar,apr,may,jun,jul,aug,sep,oct,nov,dece,totaldayspresent) VALUES('$class','$id','$name','$exam','$telugu','$hindi','$english','$maths','$science','$social','$totalmarks','$cpga','$attendance','$grade','$year','$sjan','$sfeb','$x','$x','$x','$x','$x','$x','$x','$x','$x','$sdec','$total')";
					if (mysqli_query($conn, $sql)) {
						$_SESSION['exam']="Formative 3";
//Success message						
						?>
						<div id="popup2">
						<div class="alert success">
						<span class="closebtn" onclick="document.getElementById('popup2').style.display='none';">&times;</span>  
						<strong>Success!&nbsp </strong><?php echo $exam; ?> Marks Entered Successfully.
						</div>
						</div>
						<script>
			
						setTimeout(function(){
			
							document.getElementById('popup2').style.display = 'none';
							document.body.style.overflow='visible';
							
						}, 3000);
						
						</script>
						<?php
					}
				}else{
//Marks Are Wrong Message					
					?>
					<div id="popup2">
					<div class="alert warning">
					<span class="closebtn" onclick="document.getElementById('popup2').style.display='none';">&times;</span>  
					<strong>warning!&nbsp </strong>Entered Marks are Wrong (Or) Present Days Exceeds Workingdays .
					</div>
					</div>
					<script>
					
					setTimeout(function(){
		 
						document.getElementById('popup2').style.display = 'none';
					}, 3000);
					document.body.style.overflow='hidden';
					document.querySelector('.popup').style.display="flex";
					
				
					</script>
					<?php
				}
			}
//formative $ marks Insertion			
			if($exam=="Formative 4") {
				$smar=$_POST['month1'];
				$sapr=$_POST['month2'];
				$smay=$_POST['month3'];
				if($telugu<26 && $hindi<26 && $english<26 && $maths<26 && $science<26 && $social<26 && $smay<=$may && $sapr<=$apr && $smar<=$mar ){
					$total=$smar+$sapr+$smay;
					$totaldays=$mar+$apr+$may;
					$attendance=floatval(($total/$totaldays)*100);
					$attendance=number_format($attendance,2);
					$sql ="INSERT INTO marks (class,id,name,exam,telugu,hindi,english,maths,science,social,totalmarks,cgpa,attendance,overallgrade,year,jan,feb,mar,apr,may,jun,jul,aug,sep,oct,nov,dece,totaldayspresent) VALUES('$class','$id','$name','$exam','$telugu','$hindi','$english','$maths','$science','$social','$totalmarks','$cpga','$attendance','$grade','$year','$x','$x','$smar','$sapr','$smay','$x','$x','$x','$x','$x','$x','$x','$total')";
					if (mysqli_query($conn, $sql)) {
						$_SESSION['exam']="Formative 4";
//success message						
						?>
						<div id="popup2">
						<div class="alert success">
						<span class="closebtn" onclick="document.getElementById('popup2').style.display='none';">&times;</span>  
						<strong>Success!&nbsp </strong><?php echo $exam; ?> Marks Entered Successfully.
						</div>
						</div>
						<script>
				
						setTimeout(function(){
			
							 
							document.getElementById('popup2').style.display = 'none';
							document.body.style.overflow='visible';
							window.location.href="marks.php";
						}, 3000);
						
						</script>
						<?php
					}
				}else{
//Marks Are Wrong Message					
					?>
					<div id="popup2">
					<div class="alert warning">
					<span class="closebtn" onclick="document.getElementById('popup2').style.display='none';">&times;</span>  
					<strong>warning!&nbsp </strong>Entered Marks or Wrong (Or) Present Days Exceeds Workingdays .
					</div>
					</div>
					<script>
					
					setTimeout(function(){
		
						document.getElementById('popup2').style.display = 'none';
					}, 3000);
					document.body.style.overflow='hidden';
					document.querySelector('.popup').style.display="flex";
				
					</script>
					<?php
				}
			}
			$sql = "SELECT * FROM marks where id='$id' and class='$class'";//student Attendence
			$query=mysqli_query($conn,$sql);
			While($row=mysqli_fetch_array($query))
			{
				if($row['jan']!=0){
					$sjan=$row['jan'];
				}
				if($row['feb']!=0){
					$sfeb=$row['feb'];
				}
				if($row['mar']!=0){
					$smar=$row['mar'];
				}
				if($row['apr']!=0){
					$sapr=$row['apr'];
				}
				if($row['may']!=0){
					$smay=$row['may'];
				}
				if($row['jun']!=0){
					$sjun=$row['jun'];
				}
				if($row['jul']!=0){
					$sjul=$row['jul'];
				}
				if($row['aug']!=0){
					$saug=$row['aug'];
				}
				if($row['sep']!=0){
					$ssep=$row['sep'];
				}
				if($row['oct']!=0){
					$soct=$row['oct'];
				}
				if($row['nov']!=0){
					$snov=$row['nov'];
				}
				if($row['dece']!=0){
					$sdec=$row['dece'];
				}
			}
//Summative 1 Marks Insertion			
			if($exam=="Summative 1"){
										
				if($telugu<101 && $hindi<101 && $english<101 && $maths<101 && $science<101 && $social<101 ){
					$total=$sjun+$sjul+$saug+$ssep+$soct+$snov;
					$totaldays=$jun+$jul+$aug+$sep+$oct+$nov;
					
					$attendace=floatval(($total/$totaldays)*100);
					$attendance=number_format($attendace,2);
					$sql ="INSERT INTO marks (class,id,name,exam,telugu,hindi,english,maths,science,social,totalmarks,cgpa,attendance,overallgrade,year,jan,feb,mar,apr,may,jun,jul,aug,sep,oct,nov,dece,totaldayspresent) VALUES('$class','$id','$name','$exam','$telugu','$hindi','$english','$maths','$science','$social','$totalmarks','$cpga','$attendance','$grade','$year','$x','$x','$x','$x','$x','$sjun','$sjul','$saug','$ssep','$soct','$snov','$x','$total')";
					if (mysqli_query($conn, $sql)) {
						$_SESSION['exam']="Summative 1";
//Success Message						
						?>
						<div id="popup2">
						<div class="alert success">
						<span class="closebtn" onclick="document.getElementById('popup2').style.display='none';">&times;</span>  
						<strong>Success!&nbsp </strong><?php echo $exam; ?> Marks Entered Successfully.
						</div>
						</div>
						<script>
				
						setTimeout(function(){
			
							
							document.getElementById('popup2').style.display = 'none';
							document.body.style.overflow='visible';
							window.location.href="marks.php";
						}, 3000);
						
						</script>
						<?php
					}
					
			
				}else{
//Marks are Wrong Message					
					?>
					<div id="popup2">
					<div class="alert warning">
					<span class="closebtn" onclick="document.getElementById('popup2').style.display='none';">&times;</span>  
					<strong>warning!&nbsp </strong>Entered Marks are Wrong .
					</div>
					</div>
					<script>
					
					setTimeout(function(){
						document.getElementById('popup2').style.display = 'none';
					}, 3000);
					document.body.style.overflow='hidden';
					document.querySelector('.popup').style.display="flex";
			
					</script>
					<?php
				}
			}

//Summative 2 Marks Insertion			
			if($exam=="Summative 2") {
										
				if($telugu<101 && $hindi<101 && $english<101 && $maths<101 && $science<101 && $social<101 ){
					$total=$sdec+$sjan+$sfeb+$smar+$sapr+$smay;
					$totaldays=$dec+$jan+$feb+$mar+$apr+$may;
					$attendace=floatval(($total/$totaldays)*100);
					$attendance=number_format($attendace,2);
					$sql ="INSERT INTO marks (class,id,name,exam,telugu,hindi,english,maths,science,social,totalmarks,cgpa,attendance,overallgrade,year,jan,feb,mar,apr,may,jun,jul,aug,sep,oct,nov,dece,totaldayspresent) VALUES('$class','$id','$name','$exam','$telugu','$hindi','$english','$maths','$science','$social','$totalmarks','$cpga','$attendance','$grade','$year','$sjan','$sfeb','$smar','$sapr','$smay','$x','$x','$x','$x','$x','$x','$sdec','$total')";
					if (mysqli_query($conn, $sql)) {
						$_SESSION['exam']="Summative 2";
//success Message						
						?>
						<div id="popup2">
						<div class="alert success">
						<span class="closebtn" onclick="document.getElementById('popup2').style.display='none';">&times;</span>  
						<strong>Success!&nbsp </strong><?php echo $exam; ?> Marks Entered Successfully.
						</div>
						</div>
						<script>
		
						setTimeout(function(){
							document.getElementById('popup2').style.display = 'none';
							document.body.style.overflow='visible';
							window.location.href="marks.php";
						}, 3000);
						
						</script>
						<?php
					}
					
			
				}else{
//Marks are Wrong Message					
					?>
					<div id="popup2">
					<div class="alert warning">
					<span class="closebtn" onclick="document.getElementById('popup2').style.display='none';">&times;</span>  
					<strong>warning!&nbsp </strong>Entered Marks are Wrong .
					</div>
					</div>
					<script>
					
					setTimeout(function(){
						document.getElementById('popup2').style.display = 'none';
					}, 3000);
					document.body.style.overflow='hidden';
					document.querySelector('.popup').style.display="flex";
					
					</script>
					<?php
				}
			}
		}
	}
	
					
	
	
?>
</div>
<?php
if($popup==1){
	?><script>document.querySelector('.popup').style.display='flex';

	</script><?php
}
if($popup==2){
//Attendence Not Updated Message	
	?>
	<div id="popup2">
	<div class="alert warning">
	<span class="closebtn" onclick="document.getElementById('popup2').style.display='none';">&times;</span>  
	<strong>warning!&nbsp </strong>Attendance List not Updated.
	</div>
	</div>
	<script>
	
	setTimeout(function(){
		document.body.style.overflow='hidden';
		document.getElementById('popup2').style.display = 'none';
	}, 3000);
	
	
	
	</script>
	<?php
}
?>

	
</body>
<!--End of Body-->
<!--javascript-->
<script>
	var dd_main = document.querySelector(".dd_main");

	dd_main.addEventListener("click", function(){
		this.classList.toggle("active");
	})	
	
	function isInputNumber(evt){
                
        var ch = String.fromCharCode(evt.which);
        
        if(!(/[0-9]/.test(ch))){
            evt.preventDefault();
        }
        
    }
	var ddlPassport = document.getElementById("selection");
	if((ddlPassport.value == "Summative 1") || (ddlPassport.value == "Summative 2")){
			for(i=0;i<6;i++){
				document.getElementsByClassName("twe")[i].style.display="none";
				document.getElementsByClassName("hun")[i].style.display="block";
			}
		}
		else{
			for(i=0;i<6;i++){
				document.getElementsByClassName("twe")[i].style.display="block";
				document.getElementsByClassName("hun")[i].style.display="none";
			}
		}
		if(ddlPassport.value == "Formative 1"){
			document.querySelector(".formative").style.display="block";
			document.querySelector(".summative").style.display="none";
			for(i=0;i<6;i++){
				document.getElementsByClassName("formative1")[i].style.display="block";
				document.getElementsByClassName("formative2")[i].style.display="none";
				document.getElementsByClassName("formative3")[i].style.display="none";
				document.getElementsByClassName("formative4")[i].style.display="none";
			}
		}
		if(ddlPassport.value == "Formative 2"){
			document.querySelector(".formative").style.display="block";
			document.querySelector(".summative").style.display="none";
			for(i=0;i<6;i++){
				document.getElementsByClassName("formative1")[i].style.display="none";
				document.getElementsByClassName("formative2")[i].style.display="block";
				document.getElementsByClassName("formative3")[i].style.display="none";
				document.getElementsByClassName("formative4")[i].style.display="none";
			}
		}
		if(ddlPassport.value == "Formative 3"){
			document.querySelector(".formative").style.display="block";
			document.querySelector(".summative").style.display="none";
			for(i=0;i<6;i++){
				document.getElementsByClassName("formative2")[i].style.display="none";
				document.getElementsByClassName("formative3")[i].style.display="block";
				document.getElementsByClassName("formative1")[i].style.display="none";
				document.getElementsByClassName("formative4")[i].style.display="none";
			}
		}
		if(ddlPassport.value == "Formative 4"){
			document.querySelector(".formative").style.display="block";
			document.querySelector(".summative").style.display="none";
			for(i=0;i<6;i++){
				document.getElementsByClassName("formative2")[i].style.display="none";
				document.getElementsByClassName("formative4")[i].style.display="block";
				document.getElementsByClassName("formative3")[i].style.display="none";
				document.getElementsByClassName("formative1")[i].style.display="none";
			}
		}
		if(ddlPassport.value == "Summative 1"){
			document.querySelector(".formative").style.display="none";
			document.querySelector(".summative").style.display="block";
			for(i=0;i<18;i++){
				document.getElementsByClassName("summative2")[i].style.display="none";
				document.getElementsByClassName("summative1")[i].style.display="block";
			}
		}
		if(ddlPassport.value == "Summative 2"){
			document.querySelector(".formative").style.display="none";
			document.querySelector(".summative").style.display="block";
			for(i=0;i<18;i++){
				document.getElementsByClassName("summative1")[i].style.display="none";
				document.getElementsByClassName("summative2")[i].style.display="block";
			}
		}
		
</script>
</html>