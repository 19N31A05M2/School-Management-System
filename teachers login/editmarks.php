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
<head>
<!--Style sheets link-->
	
	<title></title>
	<link rel="stylesheet" href="login.css">
	<link rel="stylesheet" href="../fontawesome-free-5.15.2-web/css/all.css">

</head>
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
        
    </div>
<!--end Of Sidebar-->

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
<!--End of profile image View--> 	
	<?php
	if(isset($_POST['csubmit'])){
		$class=$_POST['class'];
		$exam=$_POST['exam'];
		$_SESSION['class']=$_POST['class'];
		$_SESSION['exam']=$exam;
	}	
	?>
<!-- Main content-->	
	<div class="main_content">
		<a href="marks.php" class="left">Marks Entry</a><br>
		<div class="first">
			<div class="marks_entry">
				<h3>MARKS</h3>
				<form method="post" style="text-align:center;">
<!--selection-->				
				<label>Class:</label>
				<select name="class" required >
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
				<label>Exam:</label>
				<select name="exam" id="selector" required >
					<option value="" selected="selected"> </option>	
					<option <?php if($_SESSION['exam']=="Formative 1") echo 'selected="selected"'; ?>>Formative 1</option>	
					<option <?php if($_SESSION['exam']=="Formative 2") echo 'selected="selected"'; ?> >Formative 2</option>
					<option <?php if($_SESSION['exam']=="Summative 1") echo 'selected="selected"'; ?> >Summative 1</option>
					<option <?php if($_SESSION['exam']=="Formative 3") echo 'selected="selected"'; ?> >Formative 3</option>	
					<option <?php if($_SESSION['exam']=="Formative 4") echo 'selected="selected"'; ?> >Formative 4</option>	
					<option <?php if($_SESSION['exam']=="Summative 2") echo 'selected="selected"'; ?> >Summative 2</option>
				</select><br><br>
				<input type="submit" value="Search" class="but" name="csubmit" style="  margin-top:5px; margin-bottom:10px;"/>
			</form>	
			
<!--class Wise -->			
			<div class="info">
				<h3 style="text-decoration:underline;">CLASS WISE RESULTS</h3>
				<h3>CLASS:<?php 
				if(isset($_POST['csubmit']))
				{ 
					$class=$_POST['class']; 
					$_SESSION['class']=$class;
				}else{
					$class=$_SESSION['class'];
				}
				echo $class;
				?>
				</h3>
				<table>
					<tr>
					<td>ADMISSION_NO</td>	  
					<td style="text-align:center;">NAME</td>        
					<td>EXAM</td>      
					<td>Telugu</td>  
					<td>Hindi</td>
					<td>English</td>       
					<td>Maths</td>   
					<td>Science</td>
					<td>Social</td>       
					<td>Total</td>       
					<td>CGPA</td>
					<td>ATTENDANCE</td>
					<td>GRADE</td>
					<td>Edit</td> 
					</tr>
					<?php

					$class=$_SESSION['class'];
					$exam=$_SESSION['exam'];
					
						$query=mysqli_query($conn,"SELECT m.* FROM marks m,studentinformation s  where m.class='$class' And m.exam='$exam' and m.id=s.id and m.class=s.class  ");
						While($row=mysqli_fetch_array($query))
						{
								?>
								<tr>
								<th><?php echo $ad=$row['id'];?> </th>
								<th><?php echo $row['name'] ?> </th>
								<th><?php echo $exam=$row['exam']; ?> </th>
								<th><?php echo  $row['telugu']?> </th>
								<th><?php echo  $row['hindi'];?> </th>
								<th><?php echo  $row['english'];?> </th>
								<th><?php echo  $row['maths'];?> </th>
								<th><?php echo  $row['science'];?> </th>
								<th><?php echo  $row['social'];?> </th>
								<th><?php echo  $row['totalmarks'];?> </th>
								<th><?php echo  $row['cgpa'];?> </th>
								<th><?php echo  $row['attendance']."%";?> </th>
								<th><?php echo  $row['overallgrade'];?> </th>
								<?php $class=$row['class'];?>
								<th><form method="POST"> 
								<input type="hidden" name="adno" value="<?php echo $ad; ?>"/> 
								<input type="hidden" name="class" value="<?php echo $class; ?>"/>
								<input type="hidden" value="<?php echo $exam; ?>" name="exam" />
								<input type="submit" name="edit" class="but" value="Edit"/></form></th>
								</tr>
								<?php
				
							
						}
						
					
					?>
				</table><br><br>
			</div> 
				
		</div> 
	</div>
<?php
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
	$popup=0;
	if(isset($_POST['edit']))
	{
		?><script>document.body.style.overflow='hidden';</script><?php
		$class=$_POST['class'];
		
		$id=$_POST['adno'];
		$exam=$_POST['exam'];

			$popup=1;	
		
		$sql = "SELECT * FROM studentinformation where id='$id'";
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
		
		$sql = "SELECT * FROM marks where id='$id' and class='$class' And exam='$exam' ";
		$query=mysqli_query($conn,$sql);
		While($row=mysqli_fetch_array($query))
		{
			$name=$row['name'];
			$telugu=$row['telugu'];
			$hindi=$row['hindi'];
			$english=$row['english'];
			$maths=$row['maths'];
			$science=$row['science'];
			$social=$row['social'];
			$year=$row['year'];
				
			
		}
		
			
	
	}
			
?>
<!--Edit Marks Form--> 
		<div class="popup">
		<div class="popup-content">
			<img class="close" src="../images/close.png" onclick="document.querySelector('.popup').style.display='none'; document.body.style.overflow='visible'; ">
			<img  src="../images/marksentry.jpg" style="width:100%; height:100px;">
			
			<form method="POST">
				
				
				
				<h3 class="h1">
					<table style="width:100%; border:2px solid none; margin-left:0px;">
					<tr><th>ADMISSION NO:</th><td><?php   if(isset($_POST['update'])){ echo $id=$_POST['adno']; }else{echo $id;}?></td><th>CLASS:</th><td><?php   if(isset($_POST['update'])){ echo $class=$_POST['class']; }else{echo $class;}?></td></tr>
					<tr><th>STUDENT NAME:</th><td><?php   if(isset($_POST['update'])){ echo $name=$_POST['name']; }else{echo $name;}?></td><th>DATE OF BIRTH:</th><td><?php   if(isset($_POST['update'])){ echo $dob=$_POST['dob']; }else{echo $dob;}?></td></tr>
					<tr><th>FATHER NAME:</th><td><?php   if(isset($_POST['update'])){ echo $father=$_POST['fathername']; }else{echo $father;}?></td><th>Academic Year:</th><td><?php   if(isset($_POST['update'])){ echo $year=$_POST['year']; }else{echo $year;}?></td></tr>
					</table>
					
					
				</h3>
				<h3 > Exam:<?php   if(isset($_POST['update'])){ echo $exam=$_POST['exam']; }else{echo $exam;}?></h3>
				<?php
				if($exam=="Summative 1" || $exam=="Summative 2"){
					$sql = "SELECT * FROM marks where id='$id' and class='$class' and exam!='$exam'";//student attendence
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
				}else{
					$sql = "SELECT * FROM marks where id='$id' and class='$class' and exam='$exam'";//student attendence
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
				$sql = "SELECT * FROM workingdays where year='$year' ";//workingdays
				
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
//formative 1 details				
				if($exam=="Formative 1")
				{
					$month1="June";
					$month2="July";
					$month3="August";
					$days1=$sjun;
					$days2=$sjul;
					$days3=$saug;
					$tdays1=$jun;
					$tdays2=$jul;
					$tdays3=$aug;
					$outof=25;
					
					
				}
//formative 2 details								
				if($exam=="Formative 2")
				{
					$month1="September";
					$month2="October";
					$month3="November";
					$days1=$ssep;
					$days2=$soct;
					$days3=$snov;
					$tdays1=$sep;
					$tdays2=$oct;
					$tdays3=$nov;
					$outof=25;
				}
//formative 3 details												
				if($exam=="Formative 3")
				{
					$month1="December";
					$month2="January";
					$month3="February";
					$days1=$sdec;
					$days2=$sjan;
					$days3=$sfeb;
					$tdays1=$dec;
					$tdays2=$jan;
					$tdays3=$feb;
					$outof=25;
				}
//formative 4 details												
				if($exam=="Formative 4")
				{
					$month1="March";
					$month2="April";
					$month3="May";
					$days1=$smar;
					$days2=$sapr;
					$days3=$smay;
					$tdays1=$mar;
					$tdays2=$apr;
					$tdays3=$may;
					$outof=25;
				}
//Summative 1 details												
				if($exam=="Summative 1"){
					$outof=100;
					$month1="June";
					$month2="July";
					$month3="August";
					$month4="September";
					$month5="October";
					$month6="November";
					$days1=$sjun;
					$days2=$sjul;
					$days3=$saug;
					$days4=$ssep;
					$days5=$soct;
					$days6=$snov;
					$tdays4=$sep;
					$tdays5=$oct;
					$tdays6=$nov;
					$tdays1=$jun;
					$tdays2=$jul;
					$tdays3=$aug;
					
				}
//summative 2 details												
				if($exam=="Summative 2"){
					$outof=100;
					$month1="December";
					$month2="January";
					$month3="February";
					$month4="March";
					$month5="April";
					$month6="May";
					$days1=$sdec;
					$days2=$sjan;
					$days3=$sfeb;
					$days4=$smar;
					$days5=$sapr;
					$days6=$smay;
					$tdays1=$dec;
					$tdays2=$jan;
					$tdays3=$feb;
					$tdays4=$mar;
					$tdays5=$apr;
					$tdays6=$may;
					
					
				}
				?>
				
				<table class="popuptable">
					<tr>
						<td>Subject</td><td>marks</td><td>Out Of</td>
					</tr>
					<tr>
						<th>Telugu</th><th><input value="<?php if(isset($_POST['update'])){ echo $_POST['telugu']; }else{echo $telugu;}?>" type="number_format" name="telugu" required></th><th><?php if(isset($_POST['update'])){ echo $_POST['outof'];}else {echo $outof; }?> </th>
					</tr>
					<tr>
						<th>Hindi</th><th><input value="<?php if(isset($_POST['update'])){ echo $_POST['hindi']; }else{ echo $hindi;}?>" type="number_format" name="hindi" required></th><th><?php if(isset($_POST['update'])){ echo $_POST['outof'];}else {echo $outof; }?> </th>
					</tr>
					<tr>
						<th>English</th><th><input value="<?php if(isset($_POST['update'])){ echo $_POST['english']; }else{ echo $english;}?>" type="number_format" name="english" required></th><th><?php if(isset($_POST['update'])){ echo $_POST['outof'];}else {echo $outof; }?> </th>
					</tr>
					<tr>
						<th>Maths</th><th><input  value="<?php if(isset($_POST['update'])){ echo $_POST['maths']; }else{ echo $maths;}?>" type="number_format" name="maths" required></th><th><?php if(isset($_POST['update'])){ echo $_POST['outof'];}else {echo $outof; }?> </th>
					</tr>
					<tr>
						<th>Science</th><th><input  value="<?php if(isset($_POST['update'])){ echo $_POST['science']; }else{ echo $science;}?>" type="number_format" name="science" required></th><th><?php if(isset($_POST['update'])){ echo $_POST['outof'];}else {echo $outof; }?> </th>
					</tr>
					<tr>
						<th>Social</th><th><input  value="<?php if(isset($_POST['update'])){ echo $_POST['social']; }else{ echo $social;}?>" type="number_format" name="social" required></th><th><?php if(isset($_POST['update'])){ echo $_POST['outof'];}else {echo $outof; }?> </th>
					</tr>
				</table>
				<div class="attendance">
				
				<table class="formative">
					<tr>
						<th>Months</td>
						<th><?php echo $month1;?></th>
						<th><?php echo $month2;?></th>
						<th><?php echo $month3;?></th>
					</tr>
					<tr>
						<th>No. of Days present</th>
						<td><input type="number_format" maxlength="2" onkeypress="isInputNumber(event)" name="month1" value="<?php if(isset($_POST['update'])){ echo $_POST['month1'];}else{echo $days1; }?>"  /> </td>
						<td><input type="number_format" maxlength="2" onkeypress="isInputNumber(event)" name="month2" value="<?php if(isset($_POST['update'])){ echo $_POST['month1'];}else{ echo $days2; }?>"  /> </td>
						<td><input type="number_format" maxlength="2" onkeypress="isInputNumber(event)" name="month3" value="<?php if(isset($_POST['update'])){ echo $_POST['month1'];}else{ echo $days3; }?>"  /> </td>
					</tr>
					<tr>
						<th>No. of Working Days </th>
						<td><?php echo $tdays1;?></td>
						<td><?php echo $tdays2;?></td>
						<td><?php echo $tdays3;?></td>
					</tr>
				</table>
				<table class="summative" >
				<tr>
					<th>Months</td>
					<th><?php echo $month1;?></th>
					<th><?php echo $month2;?></th>
					<th><?php echo $month3;?></th>
					<th><?php echo $month4;?></th>
					<th><?php echo $month5;?></th>
					<th><?php echo $month6;?></th>
				</tr>
				<tr>
					<th>No. of Days present</th>
					<td><?php echo $days1; ?> </td>
					<td><?php echo $days2; ?> </td>
					<td><?php echo $days3; ?> </td>
					<td><?php echo $days4; ?> </td>
					<td><?php echo $days5; ?> </td>
					<td><?php echo $days6; ?> </td>
				</tr>
				<tr>
					<th>No. of Working Days </th>
					<td><?php echo $tdays1; ?></td>
					<td><?php echo $tdays2; ?></td>
					<td><?php echo $tdays3; ?></td>
					<td><?php echo $tdays4; ?></td>
					<td><?php echo $tdays5; ?></td>
					<td><?php echo $tdays6; ?></td>
				</tr>
				</table>
				</div>
				<input type="hidden" name="adno" value="<?php echo $id; ?>"/> 
				<input type="hidden" name="class" value="<?php echo $class; ?>"/> 
				<input type="hidden" name="year" value="<?php echo $year; ?>"/> 
				<input type="hidden" name="name" value="<?php echo $name;?>"/> 
				<input type="hidden" name="exam" value="<?php echo $exam;?>"/> 
				<input type="hidden" name="dob" value="<?php echo $dob; ?>"/> 
				<input type="hidden" name="fathername" value="<?php echo $father; ?> "/>
				<input type="hidden" name="outof" value="<?php echo $outof; ?> "/>
				<button type="submit" class="button1" name="update">Update</button>
				
				
			</form>
		</div>
		</div>
<!--End of EditMarks Form-->		
<?php
		if(($exam=="Summative 1") || ($exam=="Summative 2") ){
			?>
				
				<script>
				document.querySelector('.summative').style.display="block";
				document.querySelector('.formative').style.display="none";
				
				</script>
				
			<?php
		}
		else{
			?>
				<script>
				document.querySelector('.summative').style.display="none";
				document.querySelector('.formative').style.display="block";
				
				</script>
			<?php
		}
			
	
?>
<?php
	if(isset($_POST['update'])){
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
		$totalmarks=0;
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
		
		if(is_numeric($telugu) && is_numeric($hindi)&& is_numeric($english)&& is_numeric($maths)&& is_numeric($science)&& is_numeric($social)){
			$totalmarks=$telugu+$hindi+$english+$maths+$science+$social;
		}
//calculation of Summative Marks		
		if(($exam=="Summative 1") || ($exam=="Summative 2")){
			
			
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
//calculation of Formative Marks			
		
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
		
		if($gra==1){
			
			if((round($cg, 1)) ==0.9 || (round($cg, 1)) ==0.1  || (round($cg, 1)) ==0.4 || (round($cg, 1)) == 0.6){
				$cpga=$cpga+0.1;
				
			}
			
			if($cpga==10){
				$grade="O";
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
		
//Formative 1 Marks	Updation	
		if($exam == "Formative 1") {
			
			$sjun=$_POST['month1'];
			$sjul=$_POST['month2'];
			$saug=$_POST['month3'];
			if($telugu<26 && $hindi<26 && $english<26 && $maths<26 && $science<26 && $social<26 && $sjun<=$jun && $sjul<=$jul && $saug<=$aug && !empty($sjun) && !empty($sjul) && !empty($saug)){
				$total=$sjun+$sjul+$saug;
				$totaldays=$jun+$jul+$aug;
				$attendance=floatval(($total/$totaldays)*100);
				$attendance=number_format($attendance,2);
				$sql ="UPDATE marks SET telugu='$telugu',hindi='$hindi',english='$english',maths='$maths',science='$science',social='$social',totalmarks='$totalmarks',cgpa='$cpga',attendance='$attendance',overallgrade='$grade',jun='$sjun',jul='$sjul',aug='$saug',totaldayspresent='$total' WHERE id='$id' And class='$class' And exam='$exam'";
				if (mysqli_query($conn, $sql)) {
//success message					
					?>
					<div id="popup2">
					<div class="alert success">
					<span class="closebtn" onclick=" ">&times;</span>  
					<strong>Success!&nbsp </strong><?php echo $exam; ?> Marks Updated Successfully.
					</div>
					</div>
					<script>
						
						setTimeout(function(){
			
							document.getElementById('popup2').style.display = 'none';
							document.body.style.overflow='visible';
							window.location.href="editmarks.php";
						}, 3000);
						
						</script>
					<?php
				}else {
					echo "Error: " . $sql . "<br>" . $conn->error;
				}
			}else{
//Marks Are Wrong error				
				?>
				<div id="popup2">
				<div class="alert warning">
				<span class="closebtn" onclick="">&times;</span>  
				<strong>warning!&nbsp </strong>Entered Marks are Wrong (Or) Present Days Exceeds Workingdays (Or) Empty Attendance.
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
//Formative 2 Marks	Updation			
		if($exam=="Formative 2") {
			$ssep=$_POST['month1'];
			$soct=$_POST['month2'];
			$snov=$_POST['month3'];
			if($telugu<26 && $hindi<26 && $english<26 && $maths<26 && $science<26 && $social<26 && $ssep<=$sep && $soct<=$oct && $snov<=$nov && !empty($ssep) && !empty($soct) && !empty($snov)){
				$total=$ssep+$soct+$snov;
				$totaldays=$sep+$oct+$nov;
				$attendance=floatval(($total/$totaldays)*100);
				$attendance=number_format($attendance,2);
				$sql ="UPDATE marks SET telugu='$telugu',hindi='$hindi',english='$english',maths='$maths',science='$science',social='$social',totalmarks='$totalmarks',cgpa='$cpga',attendance='$attendance',overallgrade='$grade',sep='$ssep',oct='$soct',nov='$snov',totaldayspresent='$total' WHERE id='$id' And class='$class' And exam='$exam'";
				if (mysqli_query($conn, $sql)) {
//success message 					
					?>
					<div id="popup2">
					<div class="alert success">
					<span class="closebtn" onclick="">&times;</span>  
					<strong>Success!&nbsp </strong><?php echo $exam; ?> Marks Updated Successfully .
					</div>
					</div>
					<script>
						
						setTimeout(function(){
			
							document.getElementById('popup2').style.display = 'none';
							document.body.style.overflow='visible';
							window.location.href="editmarks.php";
						}, 3000);
						
						</script>
					<?php
				}
			}else{
//Marks Are wrong Error				
				?>
				<div id="popup2">
				<div class="alert warning">
				<span class="closebtn" onclick="">&times;</span>  
				<strong>warning!&nbsp </strong>Entered Marks are Wrong (Or) Present Days Exceeds Workingdays (Or)Empty Attendance.
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
//Formative 3 Marks	Updation			
		if($exam=="Formative 3") {
			$sdec=$_POST['month1'];
			$sjan=$_POST['month2'];
			$sfeb=$_POST['month3'];
			if($telugu<26 && $hindi<26 && $english<26 && $maths<26 && $science<26 && $social<26 && $sdec<=$dec && $sjan<=$jan && $sfeb<=$feb && !empty($sdec) && !empty($sjan) && !empty($sfeb)){
				$total=$sjan+$sfeb+$sdec;
				$totaldays=$jan+$feb+$dec;
				$attendance=floatval(($total/$totaldays)*100);
				$attendance=number_format($attendance,2);
				$sql ="UPDATE marks SET telugu='$telugu',hindi='$hindi',english='$english',maths='$maths',science='$science',social='$social',totalmarks='$totalmarks',cgpa='$cpga',attendance='$attendance',overallgrade='$grade',dece='$sdec',jan='$sjan',feb='$sfeb',totaldayspresent='$total' WHERE id='$id' And class='$class' And exam='$exam'";
				if (mysqli_query($conn, $sql)) {
//Success Message					
					?>
					<div id="popup2">
					<div class="alert success">
					<span class="closebtn" onclick=" window.history.go(-2);">&times;</span>  
					<strong>Success!&nbsp </strong><?php echo $exam; ?> Marks Updated Successfully.
					</div>
					</div>
					<script>
						
						setTimeout(function(){
			
							document.getElementById('popup2').style.display = 'none';
							document.body.style.overflow='visible';
							window.location.href="editmarks.php";
						}, 3000);
						
						</script>
					<?php
				}
			}else{
//Marks Are Wrong				
				?>
				<div id="popup2">
				<div class="alert warning">
				<span class="closebtn" onclick="">&times;</span>  
				<strong>warning!&nbsp </strong>Entered Marks are Wrong (Or) Present Days Exceeds Workingdays (Or)Empty Attendance..
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
//Formative 4 Marks	Updation			
		if($exam=="Formative 4") {
			$smar=$_POST['month1'];
			$sapr=$_POST['month2'];
			$smay=$_POST['month3'];
			if($telugu<26 && $hindi<26 && $english<26 && $maths<26 && $science<26 && $social<26 && $smay<=$may && $sapr<=$apr && $smar<=$mar && !empty($smar) && !empty($sapr) && !empty($smay)){
				$total=$smar+$sapr+$smay;
				$totaldays=$mar+$apr+$may;
				$attendance=floatval(($total/$totaldays)*100);
				$attendance=number_format($attendance,2);
				$sql ="UPDATE marks SET telugu='$telugu',hindi='$hindi',english='$english',maths='$maths',science='$science',social='$social',totalmarks='$totalmarks',cgpa='$cpga',attendance='$attendance',overallgrade='$grade',mar='$smar',apr='$sapr',may='$smay',totaldayspresent='$total' WHERE id='$id' And class='$class' And exam='$exam'";
				if (mysqli_query($conn, $sql)) {
//success message					
					?>
					<div id="popup2">
					<div class="alert success">
					<span class="closebtn" onclick="">&times;</span>  
					<strong>Success!&nbsp </strong><?php echo $exam; ?> Marks Updated Successfully.
					</div>
					</div>
					<script>
						
						setTimeout(function(){
			
							document.getElementById('popup2').style.display = 'none';
							document.body.style.overflow='visible';
							window.location.href="editmarks.php";
						}, 3000);
						
						</script>
					<?php
				}
			}else{
//marks are wrong error				
				?>
				<div id="popup2">
				<div class="alert warning">
				<span class="closebtn" onclick=" ">&times;</span>  
				<strong>warning!&nbsp </strong>Entered Marks or Wrong (Or) Present Days Exceeds Workingdays (Or)Empty Attendance.
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
		$sql = "SELECT * FROM marks where id='$id' and class='$class' and exam!='$exam'";
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
//Summative 1 Error			
		if($exam=="Summative 1"){
									
			if($telugu<101 && $hindi<101 && $english<101 && $maths<101 && $science<101 && $social<101 ){
				$total=$sjun+$sjul+$saug+$ssep+$soct+$snov;
				$totaldays=$jun+$jul+$aug+$sep+$oct+$nov;
				
				$attendace=floatval(($total/$totaldays)*100);
				$attendance=number_format($attendace,2);
				$sql ="UPDATE marks SET telugu='$telugu',hindi='$hindi',english='$english',maths='$maths',science='$science',social='$social',totalmarks='$totalmarks',cgpa='$cpga',attendance='$attendance',overallgrade='$grade',jun='$sjun',jul='$sjul',aug='$saug',sep='$ssep',oct='$soct',nov='$snov',totaldayspresent='$total' WHERE id='$id' And class='$class' And exam='$exam'";
				if (mysqli_query($mysqli, $sql)) {
//success message					
					?>
					<div id="popup2">
					<div class="alert success">
					<span class="closebtn" onclick="">&times;</span>  
					<strong>Success!&nbsp </strong><?php echo $exam; ?> Marks Updated Successfully.
					</div>
					</div>
					<script>
						
						setTimeout(function(){
			
							document.getElementById('popup2').style.display = 'none';
							document.body.style.overflow='visible';
							window.location.href="editmarks.php";
						}, 3000);
						
						</script>
					<?php
				}
				
		
			}else{
//marks Are wrong error				
				?>
				<div id="popup2">
				<div class="alert warning">
				<span class="closebtn" onclick="">&times;</span>  
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
//summative 2 Marks Updation		
		if($exam=="Summative 2") {
									
			if($telugu<101 && $hindi<101 && $english<101 && $maths<101 && $science<101 && $social<101 ){
				$total=$sdec+$sjan+$sfeb+$smar+$sapr+$smay;
				$totaldays=$dec+$jan+$feb+$mar+$apr+$may;
				$attendace=floatval(($total/$totaldays)*100);
				$attendance=number_format($attendace,2);
				$sql ="UPDATE marks SET telugu='$telugu',hindi='$hindi',english='$english',maths='$maths',science='$science',social='$social',totalmarks='$totalmarks',cgpa='$cpga',attendance='$attendance',overallgrade='$grade',dece='$sdec',jan='$sjan',feb='$sfeb',mar='$smar',apr='$sapr',may='$smay',totaldayspresent='$total' WHERE id='$id' And class='$class' And exam='$exam'";
				if (mysqli_query($conn, $sql)) {
//success					
					?>
					<div id="popup2">
					<div class="alert success">
					<span class="closebtn" onclick="">&times;</span>  
					<strong>Success!&nbsp </strong><?php echo $exam; ?> Marks Updated Successfully.
					</div>
					</div>
					<script>
						
						setTimeout(function(){
			
							document.getElementById('popup2').style.display = 'none';
							document.body.style.overflow='visible';
							window.location.href="editmarks.php";
						}, 3000);
						
						</script>
					<?php
				}
				
		
			}else{
//marks are wrong message				
				?>
				<div id="popup2">
				<div class="alert warning">
				<span class="closebtn" onclick="">&times;</span>  
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
	
?>
</div>
<?php
if($popup==1){
	?><script>document.querySelector('.popup').style.display='flex';</script><?php
}

?>

	
</body>
<!--End Of body-->

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
</script>
</html>