<?php
session_start(); 
ob_start(); 

$conn=mysqli_connect("localhost","root","","studentinfo");
if (mysqli_connect_errno()) {
	echo "<script>document.body.style.display='none';</script>";
}

?>
<html lang="en" dir="ltr">
<!--head-->
	<head>
		<meta charset="utf-8">
		<title>Sidebar Dashboard Template</title>
		<link rel="stylesheet" href="marks_style.css">
		<link rel="stylesheet" href="../fontawesome-free-5.15.2-web/css/all.css">
		
 

<!--End of Graph Scripts-->
	</head>
<!--End of Head-->	

<!--body-->	
<body>

		<input type="checkbox" id="check" >

<!--header area start-->
		<header>
		
		<div class="left_area">
			<h3> <span> VISHAVAI VIDYANIKETAN HIGH SCHOOL</span></h3>
		</div>
		<div class="right_area">
			<a href="#" class="login"   id="clicked" ><span>Log in</span></a>
		</div>
		</header>
<!--header area end-->


<!--sidebar start-->
	<div class="sidebar" id="side" >
		<label for="check">
			<i class="fas fa-bars" id="sidebar_btn" ></i>
		</label>
		<center>
			<img src="../images/logo1.jpg" class="profile_image" alt="">
			<h4>VVN HIGH SCHOOL <br><span class="vid"></span></h4>
		</center>
		<nav class="sidebar1">
				<a  href="home.php"><i class="fas fa-home"></i>HOME</a>
			<li>
				<a  href="#"><i id="logos" class="fas fa-file-alt"></i>ADMISSION </a>
				<ul>
					<li><a href="index.php"><i id="logos" class="fas fa-file"></i>Application</a></li>
					<li><a href="edit.php"><i id="logos" class="fas fa-edit"></i>Edit</a></li>
				</ul>
			</li>
			<li>
				<a  href="#"><i id="logos" class="fas fa-info" aria-hidden="true"></i>Student details</a>
				<ul>
					<li><a href="studentdetail.php"><i id="logos" class="fas fa-user-graduate"></i>Details</a></li>
					<li><a href="classdetails.php"><i id="logos" class="fas fa-user-friends"></i>class details</a></li>
				</ul>
			</li>
			<a  href="feepayment.php"><i class="fas fa-money-bill-alt"></i>Fee Payment</a>
			<a  href="marks.php"><i class="fas fa-clipboard"></i>Marks_Entry</a>
			 
		</nav>		
			
	
	</div>
<!--sidebar end-->
	<?php
	if(isset($_POST['csubmit'])){
		$class=$_POST['class'];
		$exam=$_POST['exam'];
		$_SESSION['class']=$_POST['class'];
		$_SESSION['exam']=$_POST['exam'];
	}else{
					$class=$_SESSION['class'];
					$exam=$_SESSION['exam'];
				
				}
	if($class=='NURSERY' || $class=='UKG' || $class=='LKG'){			
		if($class=='NURSERY'){
			$subject=array("English Oral","English Written","Maths Oral","Maths Written","Drawing","Rhymes");
		}
		if($class=='LKG'){
			$subject=array("English Oral","English Written","Maths Oral","Maths Written","Drawing","Telugu");
		}
		if($class=='UKG'){
			$subject=array("Telugu","Hindi","English","Maths","EVS","Drawing");
		}
	}else{
		$subject=array("Telugu","Hindi","English","Maths","Science","Social");
	}
	?>
<!--Main Content-->	

<div class="main_content">
		<a href="marks.php" class="left">Marks</a><br>
		
		<div class="first">
			<div class="marks_entry">
				
<!--Selection -->				
				<form method="post" style="margin-top:50px; text-align:center;">
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
					<option <?php if($_SESSION['exam']=="FA1") echo 'selected="selected"'; ?> value="FA1">Formative 1</option>	
					<option <?php if($_SESSION['exam']=="FA2") echo 'selected="selected"'; ?> value="FA2">Formative 2</option>
					<option <?php if($_SESSION['exam']=="SA1") echo 'selected="selected"'; ?> value="SA1" >Summative 1</option>
					<option <?php if($_SESSION['exam']=="FA3") echo 'selected="selected"'; ?> >Formative 3</option>	
					<option <?php if($_SESSION['exam']=="FA4") echo 'selected="selected"'; ?> >Formative 4</option>	
					<option <?php if($_SESSION['exam']=="SA2") echo 'selected="selected"'; ?> value="SA2">Summative 2</option>
				</select><br><br>
				<input type="submit" value="Search" class="but" name="csubmit" style="  margin-top:5px; margin-bottom:10px;"/>
			
				</form>
<!--table View of Class-->
				<div class="info">
				<h3 style="text-decoration:underline; text-align:center;">CLASS WISE RESULTS</h3>
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
				</div>
				<table class="editmarks_table" style="margin-left:auto; margin-right:auto; margin-top:20px;">
					<tr>
					<td>ADMISSION_NO</td>	  
					<td style="text-align:center;">NAME</td>        
					<td>EXAM</td>      
					<td><?php echo $subject[0]; ?></td>  
					<td><?php echo $subject[1]; ?></td>
					<td><?php echo $subject[2]; ?></td>       
					<td><?php echo $subject[3]; ?></td>   
					<td><?php echo $subject[4]; ?></td>
					<td><?php echo $subject[5]; ?></td>       
					<td>Total</td>       
					<?php
						if($class=='NURSERY' || $class=='UKG' || $class=='LKG'){
							if($exam=="SA1"){
								echo '<td>June</td><td>July</td><td>August</td><td>September</td><td>October</td>';
							}
							if($exam=="SA2"){
								echo '<td>Dece</td><td>Jan</td><td>Feb</td><td>Mar</td><td>Apr</td>';
							}
						}else{
							if($exam=="SA1"){
								echo '<td>Sep</td><td>Oct</td><td>Nov</td>';
							}
							if($exam=="FA1")
								echo '<td>Sep</td>';
							if($exam=="FA2")
								echo '<td>Dec</td><td>Jan</td><td>Feb</td>';
							if($exam=="SA2")
								echo '<td>Mar</td><td>Apr</td>';
							
						}
								
								
							
					?>
					
					
					<td>Edit</td> 
					</tr>
					<?php
						$class=$_SESSION['class'];
						$exam=$_SESSION['exam'];
					
						if($class=='NURSERY' || $class=='UKG' || $class=='LKG'){
							$query=mysqli_query($conn,"SELECT m.* FROM marks m,ppstudentinformation s  where m.class='$class' And m.exam='$exam' and m.id=s.id and m.class=s.class  ");
						}else{
							$query=mysqli_query($conn,"SELECT m.* FROM marks m,studentinformation s  where m.class='$class' And m.exam='$exam' and m.id=s.id and m.class=s.class  ");
						}
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
								<?php
									if($class=='NURSERY' || $class=='UKG' || $class=='LKG'){
										if($exam=="SA1"){
											?>
											<th><?php echo  $row['jun'];?> </th>
											<th><?php echo  $row['jul'];?> </th>
											<th><?php echo  $row['aug'];?> </th>
											<th><?php echo  $row['sep'];?> </th>
											<th><?php echo  $row['oct'];?> </th>
											<?php
										}
										if($exam=="SA2"){
											?>
											<th><?php echo  $row['dece'];?> </th>
											<th><?php echo  $row['jan'];?> </th>
											<th><?php echo  $row['feb'];?> </th>
											<th><?php echo  $row['mar'];?> </th>
											<th><?php echo  $row['apr'];?> </th>
											
											<?php
										}
									}else{
										if($exam=="SA1"){
											?>
											<th><?php echo  $row['sep'];?> </th>
											<th><?php echo  $row['oct'];?> </th>
											<th><?php echo  $row['nov'];?> </th>
											<?php
										}
										if($exam=="SA2"){
											?>
											<th><?php echo  $row['mar'];?> </th>
											<th><?php echo  $row['apr'];?> </th>
											
											<?php
										}
										if($exam=="FA1"){
											?>
											<th><?php echo  $row['sep'];?> </th>
											<?php
										}
										if($exam=="FA2"){
											?>
											<th><?php echo  $row['dece'];?> </th>
											<th><?php echo  $row['jan'];?> </th>
											<th><?php echo  $row['feb'];?> </th>
											<?php
										}
									}
								?>
								
								
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
		if($class=='NURSERY' || $class=='UKG' || $class=='LKG'){
			$sql = "SELECT * FROM ppstudentinformation where id='$id'";
		}else{
			$sql = "SELECT * FROM studentinformation where id='$id'";
		}
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
		$total=$telugu+$hindi+$english+$maths+$science+$social;
		if($exam=="SA2"){
			$vvls1=$ace1=$hpe1=$wce1=$vvls2=$ace2=$hpe2=$wce2=0;
			$cosql = "SELECT * FROM coactivities where id='$id' and class='$class' ";
			$coquery=mysqli_query($conn,$cosql);
			While($row=mysqli_fetch_array($coquery))
			{
				$vvls1=$row['vvls1'];
				$ace1=$row['ace1'];
				$hpe1=$row['hpe1'];
				$wce1=$row['wce1'];
				$vvls2=$row['vvls2'];
				$ace2=$row['ace2'];
				$hpe2=$row['hpe2'];
				$wce2=$row['wce2'];	
				
			}
		}
		
			
	
	}
			
?>
<?php
if(isset($_POST['edit']) || isset($_POST['update'])){
	if($class=='NURSERY' || $class=='UKG' || $class=='LKG'){
			$soutof=50;
			$toutof=300;
			if($class=='NURSERY'){
				$subject=array("English Oral","English Written","Maths Oral","Maths Written","Drawing","Rhymes");
			}
			if($class=='LKG'){
				$subject=array("English Oral","English Written","Maths Oral","Maths Written","Drawing","Telugu");
			}
			if($class=='UKG'){
				$subject=array("Telugu","Hindi","English","Maths","EVS","Drawing");
			}
		}else{		
			
			$subject=array("Telugu","Hindi","English","Maths","Science","Social");
			if($class>5){
				if($_SESSION['exam']=="SA1" || $_SESSION['exam']=="SA2"){
					$soutof=80;
					$toutof=480;
				}else{
					$soutof=20;
					$toutof=120;
				}
			}else{
				
				$soutof=50;
				$toutof=300;
			}
		}
		if($exam=="FA1"){
				$month_1="June";
				$month_2="July";
				$month_3="August";
			}
			if($exam=="SA1"){
				$month_1='September';
				$month_2='October';
				$month_3='November';
			}
			if($exam=="FA2"){
				$month_1="December";
				$month_2="January";
				$month_3="February";
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
				<h3 > Exam:<?php   if(isset($_POST['update'])){ echo $exam=$_POST['exam']; }else{echo $exam;}?></h3>
				<?php
				if($exam=="SA1" || $exam=="SA2"){
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
							$_SESSION['month1']=$ssep;
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
							$_SESSION['month1']=$ssep;
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
				if($exam=="FA1")
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
					if($class>5){
						$outof=20;
						$totaloutof=120;
					}else{
						$outof=50;
						$totaloutof=300;
					}
				
				}
//formative 2 details								
				if($exam=="FA2")
				{
					
					$month_1="December";
					$month_2="January";
					$month_3="February";
			
					$days1=$sdec;
					$days2=$sjan;
					$days3=$sfeb;
					$tdays1=$dec;
					$tdays2=$jan;
					$tdays3=$feb;
					if($class>5){
						$outof=20;
						$totaloutof=120;
					}else{
						$outof=50;
						$totaloutof=300;
					}
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
				if($exam=="SA1"){
					if($class=='NURSERY' || $class=='UKG' || $class=='LKG'){
						$soutof=50;
						$toutof=300;
						if($class=='NURSERY'){
							$subject=array("English Oral","English Written","Maths Oral","Maths Written","Drawing","Rhymes");
						}
						if($class=='LKG'){
							$subject=array("English Oral","English Written","Maths Oral","Maths Written","Drawing","Rhymes");
						}
						if($class=='UKG'){
							$subject=array("Telugu","Hindi","English","Maths","EVS","Drawing");
						}
						$month_1="June";
						$month_2="July";
						$month_3="August";
						$month_4="September";
						$month_5="October";
						
						$days1=$sjun;
						$days2=$sjul;
						$days3=$saug;
						$days4=$ssep;
						$days5=$soct;
					}else{
						$subject=array("Telugu","Hindi","English","Maths","Science","Social");
						if($class>5){
							
							$soutof=80;
							$toutof=480;
						}else{
							$soutof=50;
							$toutof=300;
						}
						$month1="September";
						$month2="October";
						$month3="November";
						
						
						$days1=$ssep;
						$days2=$soct;
						$days3=$snov;
						
					}
					
					
					
					
					
					
				}
//summative 2 details												
				if($exam=="SA2"){
					if($class=='NURSERY' || $class=='UKG' || $class=='LKG'){
						$month1="December";
						$month2="January";
						$month3="Febuary";
						$month4="March";
						$month5="April";
						$month6="May";
						
						$days1=$sdec;
						$days2=$sjan;
						$days3=$sfeb;
						$days4=$smar;
						$days5=$sapr;
						$days6=$smay;
						$soutof=50;
						$toutof=300;
						if($class=='NURSERY'){
							$subject=array("English Oral","English Written","Maths Oral","Maths Written","Drawing","Rhymes");
						}
						if($class=='LKG'){
							$subject=array("English Oral","English Written","Maths Oral","Maths Written","Drawing","Rhymes");
						}
						if($class=='UKG'){
							$subject=array("Telugu","Hindi","English","Maths","EVS","Drawing");
						}
					}else{
						$month1="March";
						$month2="April";
						$month3="May";
						
						$days1=$smar;
						$days2=$sapr;
						$days3=$smay;
						$subject=array("Telugu","Hindi","English","Maths","Science","Social");
						if($class>5){
							
							$soutof=80;
							$toutof=480;
							
						}else{
							$soutof=50;
							$toutof=300;
						}
					}
					
					
					
					
					
					
				}
				?>
<!--javascript for Marks Entry Form-->				
				<script>
					
					   function Focus_Out(event) {  
							var telugu_marks=document.getElementById("telugu").value;
							var hindi_marks=document.getElementById("hindi").value;
							var english_marks=document.getElementById("english").value;
							var maths_marks=document.getElementById("maths").value;
							var science_marks=document.getElementById("science").value;
							var social_marks=document.getElementById("social").value;
							if(telugu_marks!="" && hindi_marks!="" && english_marks!="" && maths_marks!="" && science_marks!="" && social_marks!="")
							{
								var total=Number(telugu_marks)+Number(hindi_marks)+Number(english_marks)+Number(maths_marks)+Number(science_marks)+Number(social_marks);
								document.querySelector('.total_marks').innerText = total;
							}
							
						}  
				</script>
<!--End of Javascript Of Marks Entry Form-->				
				<table class="popuptable">
					<tr>
						<td>Subject</td><td>marks</td><td>Out Of</td>
					</tr>
					<tr>
						<th><?php echo $subject[0]; ?></th><th><input  type="number_format" maxlength="5" name="telugu" onfocusout="Focus_Out(event)" id="telugu" value="<?php if(isset($_POST['update'])){ echo $_POST['telugu']; }else { echo $telugu; } ?>" required></th><th><span><?php echo $soutof; ?> </span></th>
					</tr>
					<tr>
						<th><?php echo $subject[1]; ?></th><th><input type="number_format" maxlength="5" name="hindi" id="hindi" value="<?php if(isset($_POST['update'])){ echo $_POST['hindi']; }else { echo $hindi; } ?>" onfocusout="Focus_Out(event)" required></th><th><span><?php echo $soutof; ?></span></th>
					</tr>
					<tr>
						<th><?php echo $subject[2]; ?></th><th><input type="number_format" maxlength="5" name="english" id="english" value="<?php if(isset($_POST['update'])){ echo $_POST['english']; }else { echo $english; } ?>" onfocusout="Focus_Out(event)" required></th><th><span><?php echo $soutof;?> </span></th>
					</tr>
					<tr>
						<th><?php echo $subject[3]; ?></th><th><input type="number_format" maxlength="5" name="maths" id="maths" value="<?php if(isset($_POST['update'])){ echo $_POST['maths']; }else { echo $maths; } ?>" onfocusout="Focus_Out(event)" required></th><th><span><?php  echo $soutof; ?></span></th>
					</tr>
					<tr>
						<th><?php echo $subject[4]; ?></th><th><input type="number_format" maxlength="5" name="science" id="science" value="<?php if(isset($_POST['update'])){ echo $_POST['science']; }else { echo $science; } ?>" onfocusout="Focus_Out(event)" required></th><th><span><?php  echo $soutof; ?></span></th>
					</tr>
					<tr>
						<th><?php echo $subject[5]; ?></th><th><input type="number_format" maxlength="5" name="social" id="social" value="<?php if(isset($_POST['update'])){ echo $_POST['social']; }else { echo $social; } ?>" onfocusout="Focus_Out(event)" required></th><th><span><?php  echo $soutof; ?></span></th>
					</tr>
					<tr>
						<th>Total Marks</th><th class="total_marks"><?php if(isset($_POST['update'])){ echo $_POST['telugu']+$_POST['hindi']+$_POST['english']+$_POST['maths']+$_POST['science']+$_POST['social']; }else{ echo $total; } ?></th><th><span><?php  echo $toutof; ?></span></th>
					</tr>
				</table>
				<div class="attendance">
				<table class="formative">
					<tr>
						<th>Months</td>
						<th><span class="month1"><?php echo $month_1; ?></span></th>
						<th><span class="month2"><?php echo $month_2; ?></span></th>
					    <th><span class="month3"><?php echo $month_3; ?></span></th>
						<?php
							/*if($_SESSION['exam']=="FA2"){
								echo '<th><span class="month2">'. $month_2.'</span></th>
									  <th><span class="month3">'.$month_3.'</span></th>';
							}*/
						?>
						</tr>
					<tr>
						<th>No. of Days present</th>
						<td><input type="number_format" maxlength="2" name="f_month1" value="<?php if(isset($_POST['update'])){ echo $_POST['f_month1']; }else{ echo $days1; } ?>" onkeypress="isInputNumber(event)" /> </td>
						<td><input type="number_format" maxlength="2" name="f_month2" value="<?php if(isset($_POST['update'])){ echo $_POST['f_month2']; }else{ echo $days2; } ?>" onkeypress="isInputNumber(event)" /> </td>
						<td><input type="number_format" maxlength="2" name="f_month3" value="<?php if(isset($_POST['update'])){ echo $_POST['f_month3']; }else{ echo $days3; } ?>" onkeypress="isInputNumber(event)" /> </td>
								
						<?php
							if($_SESSION['exam']=="FA2"){
								/*?>
								<td><input type="number_format" maxlength="2" name="f_month2" value="<?php if(isset($_POST['update'])){ echo $_POST['f_month2']; }else{ echo $days2; } ?>" onkeypress="isInputNumber(event)" /> </td>
								<td><input type="number_format" maxlength="2" name="f_month3" value="<?php if(isset($_POST['update'])){ echo $_POST['f_month3']; }else{ echo $days3; } ?>" onkeypress="isInputNumber(event)" /> </td>
								<?php*/
							}
						?>
					</tr>
					<?php
						//if(isset($_SESSION['year'])){
							//$year=$_SESSION['year'];
						//}
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
					
				</table>
				<table class="summative" >
					<tr>
						<th>Months</td>
						<?php
						if(!($class=='NURSERY' || $class=='UKG' || $class=='LKG')){
							echo "<th><span class='month1'>$month1</span></th>";
							echo "<th><span class='month1'>$month2</span></th>";
							echo "<th><span class='month1'>$month3</span></th>";
							echo "<th><span class='month1'>$month4</span></th>";
							echo "<th><span class='month1'>$month5</span></th>";
							echo "<script> document.querySelector('.summative').style.width='100%';</script>";
						
						}
						if($exam=="SA1" && ($class=='NURSERY' || $class=='UKG' || $class=='LKG')){
							echo "<th><span class='month1'>$month_1</span></th>";
							echo "<th><span class='month2'>$month_2</span></th>";
							echo "<th><span class='month3'>$month_3</span></th>";
							echo "<th><span class='month4'>$month_4</span></th>";
							echo "<th><span class='month5'>$month_5</span></th>";
						}
						if($exam=="SA2" && !($class=='NURSERY' || $class=='UKG' || $class=='LKG') ){
							echo "<th><span class='month1'>$month1</span></th>";
							echo "<th><span class='month2'>$month2;</span></th>";
						}
						if($exam=="SA1" && !($class=='NURSERY' || $class=='UKG' || $class=='LKG')){
							echo "<th><span class='month1'>$month_1</span></th>";
							echo "<th><span class='month2'>$month_2</span></th>";
							echo "<th><span class='month2'>$month_3</span></th>";
						}
						
						?>
						
						
						</tr>
					<tr>
						<th>No. of Days present</th>
						<?php
						if($exam=='SA2' && ($class=='NURSERY' || $class=='UKG' || $class=='LKG')){
							?><td><input type="number_format" maxlength="2" name="s_month1" value="<?php if(isset($_POST['update'])){ echo $_POST['month1']; }else{ echo $days1; } ?>" onkeypress="isInputNumber(event)" /> </td><?php
							?><td><input type="number_format" maxlength="2" name="s_month2" value="<?php if(isset($_POST['update'])){ echo $_POST['month2']; }else{ echo $days2; } ?>" onkeypress="isInputNumber(event)" /> </td><?php
							?><td><input type="number_format" maxlength="2" name="s_month3" value="<?php if(isset($_POST['update'])){ echo $_POST['month3']; }else{ echo $days3; } ?>" onkeypress="isInputNumber(event)" /> </td><?php
							?><td><input type="number_format" maxlength="2" name="s_month4" value="<?php if(isset($_POST['update'])){ echo $_POST['month4']; }else{ echo $days4; } ?>" onkeypress="isInputNumber(event)" /> </td><?php
							?><td><input type="number_format" maxlength="2" name="s_month5" value="<?php if(isset($_POST['update'])){ echo $_POST['month5']; }else{ echo $days5; } ?>" onkeypress="isInputNumber(event)" /> </td><?php
						}
						if($exam=='SA1' && ($class=='NURSERY' || $class=='UKG' || $class=='LKG')){
							?><td><input type="number_format" maxlength="2" name="s_month1" value="<?php if(isset($_POST['update'])){ echo $_POST['s_month1']; }else{ echo $days1; } ?>" onkeypress="isInputNumber(event)" /> </td><?php
							?><td><input type="number_format" maxlength="2" name="s_month2" value="<?php if(isset($_POST['update'])){ echo $_POST['s_month2']; }else{ echo $days2; } ?>" onkeypress="isInputNumber(event)" /> </td><?php
							?><td><input type="number_format" maxlength="2" name="s_month3" value="<?php if(isset($_POST['update'])){ echo $_POST['s_month3']; }else{ echo $days3; } ?>" onkeypress="isInputNumber(event)" /> </td><?php
							?><td><input type="number_format" maxlength="2" name="s_month4" value="<?php if(isset($_POST['update'])){ echo $_POST['s_month4']; }else{ echo $days4; } ?>" onkeypress="isInputNumber(event)" /> </td><?php
							?><td><input type="number_format" maxlength="2" name="s_month5" value="<?php if(isset($_POST['update'])){ echo $_POST['s_month5']; }else{ echo $days5; } ?>" onkeypress="isInputNumber(event)" /> </td><?php
						}
						if($exam=="SA2" && !($class=='NURSERY' || $class=='UKG' || $class=='LKG') ){
							?><td><input type="number_format" maxlength="2" name="s_month1" value="<?php if(isset($_POST['update'])){ echo $_POST['s_month1']; }else{ echo $days1; } ?>" onkeypress="isInputNumber(event)" /> </td><?php
							?><td><input type="number_format" maxlength="2" name="s_month2" value="<?php if(isset($_POST['update'])){ echo $_POST['s_month2']; }else{ echo $days2; } ?>" onkeypress="isInputNumber(event)" /> </td><?php
						}
						if($exam=="SA1" && !($class=='NURSERY' || $class=='UKG' || $class=='LKG') ){
							?><td><input type="number_format" maxlength="2" name="s_month1" value="<?php if(isset($_POST['update'])){ echo $_POST['s_month1']; }else{ echo $days1; } ?>" onkeypress="isInputNumber(event)" /> </td><?php
							?><td><input type="number_format" maxlength="2" name="s_month2" value="<?php if(isset($_POST['update'])){ echo $_POST['s_month2']; }else{ echo $days2; } ?>" onkeypress="isInputNumber(event)" /> </td><?php
							?><td><input type="number_format" maxlength="2" name="s_month3" value="<?php if(isset($_POST['update'])){ echo $_POST['s_month3']; }else{ echo $days3; } ?>" onkeypress="isInputNumber(event)" /> </td><?php
						}
						?>
						
						</tr>
				
				</table>
				<?php
					if($exam=="SA2" && !($class=='NURSERY' || $class=='UKG' || $class=='LKG') && $class>5){
						?>
						<table style="width:100%" >
							<tr>
								<th>Co-Currcular Activities</td>
								
								<th>Value Education & Life Skills</th>
								<th>Art & Cultural Education</th>
								<th>Health & Physical Education</th>
								<th>Work & Computer Education</th>
								
								</tr>
								<tr>
								<th>SA-1</th>
								
								<td><input type="number_format" maxlength="2" name="vvls1" value="<?php if(isset($_POST['update'])){ echo $_POST['vvls1']; }else echo $vvls1; ?>" onkeypress="isInputNumber(event)" /> </td>
								<td><input type="number_format" maxlength="2" name="ace1" value="<?php if(isset($_POST['update'])){ echo $_POST['ace1']; }else echo $ace1; ?>" onkeypress="isInputNumber(event)" /> </td>
								<td><input type="number_format" maxlength="2" name="hpe1" value="<?php if(isset($_POST['update'])){ echo $_POST['hpe1']; }else echo $hpe1; ?>" onkeypress="isInputNumber(event)" /> </td>
								<td><input type="number_format" maxlength="2" name="wce1" value="<?php if(isset($_POST['update'])){ echo $_POST['wce1']; }else echo $wce1; ?>" onkeypress="isInputNumber(event)" /> </td>
								</tr>
								<th>SA-2</th>
								
								<td><input type="number_format" maxlength="2" name="vvls2" value="<?php if(isset($_POST['update'])){ echo $_POST['vvls2']; }else echo $vvls2; ?>" onkeypress="isInputNumber(event)" /> </td>
								<td><input type="number_format" maxlength="2" name="ace2" value="<?php if(isset($_POST['update'])){ echo $_POST['ace2']; }else echo $ace2; ?>" onkeypress="isInputNumber(event)" /> </td>
								<td><input type="number_format" maxlength="2" name="hpe2" value="<?php if(isset($_POST['update'])){ echo $_POST['hpe2']; }else echo $hpe2; ?>" onkeypress="isInputNumber(event)" /> </td>
								<td><input type="number_format" maxlength="2" name="wce2" value="<?php if(isset($_POST['update'])){ echo $_POST['wce2']; }else echo $wce2; ?>" onkeypress="isInputNumber(event)" /> </td>
								</tr>
				
						</table>
						<?php
					}
				?>
				<?php
				if($exam=="FA1" || $exam=="FA2" || $exam=="FA3" || $exam=="FA4"){
			
					echo '<script> document.querySelector(".formative").style.display="block"; </script>';
					echo '<script> document.querySelector(".summative").style.display="none"; </script>';
				}else{
					echo '<script> document.querySelector(".summative").style.display="block"; </script>';
					echo '<script> document.querySelector(".formative").style.display="none"; </script>';
					if($exam=="SA2"){
						?>
							<script> 
								document.getElementById('sa2month').style.display='none';
								document.getElementById('sa2hide').style.display='none';
							</script>
						<?php
					}
				}
				
					
				?>
				
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
			
			/*
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
		}*/
		
	}
//Formative 1 Marks	Updation	
		if($exam == "FA1") {
			
			$ssep=$_POST['f_month1'];
			if($class>5){
					$outof=20;
					$totaloutof=120;
					
				}else{
					$outof=50;
					$totaloutof=300;
				}
			if($telugu<=$outof && $hindi<=$outof && $english<=$outof && $maths<=$outof && $science<=$outof && $social<=$outof && $ssep<=$sep/*&& $sjun<=$jun && $sjul<=$jul && $saug<=$aug && !empty($sjun) && !empty($sjul) && !empty($saug)*/){
				$total=/*$sjun+$sjul+$saug*/$ssep;
				$totaldays=$sep/*$jun+$jul+$aug*/;
				$attendance=floatval(($total/$totaldays)*100);
				$attendance=number_format($attendance,2);
				$percentage=floatval(($totalmarks/$totaloutof)*100);
					
					if($percentage>90){
						$grade="A+";
					}
					if($percentage>70 && $percentage<=90){
						$grade="A";
					}
					if($percentage>50 && $percentage<=70){
						$grade="B+";
					}
					if($percentage>40 && $percentage<=50){
						$grade="B";
					}
					if($percentage<=40){
						$grade="C";
					}
				$sql ="UPDATE marks SET telugu='$telugu',hindi='$hindi',english='$english',maths='$maths',science='$science',social='$social',totalmarks='$totalmarks',attendance='$attendance',overallgrade='$grade',sep='$ssep',totaldayspresent='$total' WHERE id='$id' And class='$class' And exam='$exam'";
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
							$_SESSION['month1']=$ssep;
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
				
//Summative 1 Marks	Updation	
		if($exam == "SA1") {
			if($class=='NURSERY' || $class=='UKG' || $class=='LKG'){
					$sjun=$_POST['s_month1'];
					$sjul=$_POST['s_month2'];
					$saug=$_POST['s_month3'];
					$ssep=$_POST['s_month4'];
					$soct=$_POST['s_month5'];
					$outof=50;
					$totaloutof=300;
				}else{
					
					$ssep=$_POST['s_month1'];
					$soct=$_POST['s_month2'];
					$snov=$_POST['s_month3'];
					if($class>5){
						$outof=80;
						$totaloutof=480;
					
					}else{
						$outof=50;
						$totaloutof=300;
					}
				}
			
			
			if($class=='NURSERY' || $class=='UKG' || $class=='LKG'){
				$outof=50;
				$totaloutof=300;
			}else{
				if($class>5){
					$outof=80;
					$totaloutof=480;
					
				}else{
					$outof=50;
					$totaloutof=300;
				}
			}
			if($telugu<=$outof && $hindi<=$outof && $english<=$outof && $maths<=$outof && $science<=$outof && $social<=$outof /*&& $sjun<=$jun && $sjul<=$jul && $saug<=$aug && !empty($sjun) && !empty($sjul) && !empty($saug)*/){
				$total=/*$sjun+$sjul+$saug*/$sjun+$sjul+$saug+$ssep+$soct;
				$totaldays=$jun+$jul+$aug+$sep+$oct/*$jun+$jul+$aug*/;
				$attendance=floatval(($total/$totaldays)*100);
				$attendance=number_format($attendance,2);
				$percentage=floatval(($totalmarks/$totaloutof)*100);
					
					if($percentage>90){
						$grade="A+";
					}
					if($percentage>70 && $percentage<=90){
						$grade="A";
					}
					if($percentage>50 && $percentage<=70){
						$grade="B+";
					}
					if($percentage>40 && $percentage<=50){
						$grade="B";
					}
					if($percentage<=40){
						$grade="C";
					}
				$sql ="UPDATE marks SET telugu='$telugu',hindi='$hindi',english='$english',maths='$maths',science='$science',social='$social',totalmarks='$totalmarks',cgpa='$cpga',attendance='$attendance',overallgrade='$grade',jun='$sjun',jul='$sjul',aug='$saug',sep='$ssep',oct='$soct',totaldayspresent='$total' WHERE id='$id' And class='$class' And exam='$exam'";
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
		if($exam=="FA2") {
			
			$sdec=$_POST['f_month1'];
			$sjan=$_POST['f_month2'];
			$sfeb=$_POST['f_month3'];
			
			if($class>5){
					$outof=20;
					$totaloutof=120;
					
				}else{
					$outof=50;
					$totaloutof=300;
				}
			if($telugu<=$outof && $hindi<=$outof && $english<=$outof && $maths<=$outof && $science<=$outof && $social<=$outof /*&& $sjun<=$jun && $sjul<=$jul && $saug<=$aug && !empty($sjun) && !empty($sjul) && !empty($saug)*/){
				$total=/*$sjun+$sjul+$saug*/$sdec+$sjan+$sfeb;
				$totaldays=$dec+$jan+$feb/*$jun+$jul+$aug*/;
				$attendance=floatval(($total/$totaldays)*100);
				$attendance=number_format($attendance,2);
				$percentage=floatval(($totalmarks/$totaloutof)*100);
					
					if($percentage>90){
						$grade="A+";
					}
					if($percentage>70 && $percentage<=90){
						$grade="A";
					}
					if($percentage>50 && $percentage<=70){
						$grade="B+";
					}
					if($percentage>40 && $percentage<=50){
						$grade="B";
					}
					if($percentage<=40){
						$grade="C";
					}
				$sql ="UPDATE marks SET telugu='$telugu',hindi='$hindi',english='$english',maths='$maths',science='$science',social='$social',totalmarks='$totalmarks',attendance='$attendance',overallgrade='$grade',dece='$sdec',jan='$sjan',feb='$sfeb',totaldayspresent='$total' WHERE id='$id' And class='$class' And exam='$exam'";
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
//Summative 2 marks Updation
			if($exam == "SA2") {
				
			
			if($class=='NURSERY' || $class=='UKG' || $class=='LKG'){
				$month1=$_POST['s_month1'];
				$month2=$_POST['s_month2'];
				$month3=$_POST['s_month3'];
				$month4=$_POST['s_month4'];
				$month5=$_POST['s_month5'];
				$outof=50;
				$totaloutof=300;
			}else{
				$month1=0;
				$month2=0;
				$month3=0;
				$month4=$_POST['s_month1'];
				$month5=$_POST['s_month2'];
				if($class>5){
					$outof=80;
					$totaloutof=480;
					
				}else{
					$outof=50;
					$totaloutof=300;
				}
			}
			if($telugu<=$outof && $hindi<=$outof && $english<=$outof && $maths<=$outof && $science<=$outof && $social<=$outof /*&& $sjun<=$jun && $sjul<=$jul && $saug<=$aug && !empty($sjun) && !empty($sjul) && !empty($saug)*/){
				if($class=='NURSERY' || $class=='UKG' || $class=='LKG'){
						$total=$month1+$month2+$month3+$month4+$month5;
						$totaldays=$dec+$jan+$feb+$mar+$apr;
					}else{
						$total=$month1+$month2;
						$totaldays=$mar+$apr;
					}
				$attendance=floatval(($total/$totaldays)*100);
				$attendance=number_format($attendance,2);
				$percentage=floatval(($totalmarks/$totaloutof)*100);
					
					if($percentage>90){
						$grade="A+";
					}
					if($percentage>70 && $percentage<=90){
						$grade="A";
					}
					if($percentage>50 && $percentage<=70){
						$grade="B+";
					}
					if($percentage>40 && $percentage<=50){
						$grade="B";
					}
					if($percentage<=40){
						$grade="C";
					}
				$sql ="UPDATE marks SET telugu='$telugu',hindi='$hindi',english='$english',maths='$maths',science='$science',social='$social',totalmarks='$totalmarks',cgpa='$cpga',attendance='$attendance',overallgrade='$grade',dece='$month1',jan='$month2',feb='$month3',mar='$month4',apr='$month5',totaldayspresent='$total' WHERE id='$id' And class='$class' And exam='$exam'";
				if (mysqli_query($conn, $sql)) {
				  if($class!='NURSERY' && $class!='UKG' && $class!='LKG'){
					$vvls1=$_POST['vvls1'];
					$ace1=$_POST['ace1'];
					$hpe1=$_POST['hpe1'];
					$wce1=$_POST['wce1'];
					$vvls2=$_POST['vvls2'];
					$ace2=$_POST['ace2'];
					$hpe2=$_POST['hpe2'];
					$wce2=$_POST['wce2'];
					$querycheck=mysqli_query($conn,"SELECT * FROM coactivities where id='$id' And class='$class' ");
					$count=mysqli_num_rows($querycheck);
					if($count==0){
						
						$cosql ="INSERT INTO coactivities (id,name,class,vvls1,ace1,hpe1,wce1,vvls2,ace2,hpe2,wce2) VALUES('$id','$name','$class','$vvls1','$ace1','$hpe1','$wce1','$vvls2','$ace2','$hpe2','$wce2')";
					}else{
						$cosql ="UPDATE coactivities SET vvls1='$vvls1',ace1='$ace1',hpe1='$hpe1',wce1='$wce1',vvls2='$vvls2',ace2='$ace2',hpe2='$hpe2',wce2='$wce2' where id='$id' and class='$class'";
					}
					if (mysqli_query($conn, $cosql)) {
						echo "";
					}
				  }
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

	

<?php
	if(isset($_POST['login'])){
		$username=strtolower($_POST['username']);
		$password=$_POST['password'];
		$value=0;
		$sql = "SELECT * FROM logins where username='$username'";
		$query=mysqli_query($conn,$sql);
		While($row=mysqli_fetch_array($query))
		{
			if(($row['username']==$username) && ($row['password']==$password)){
				
				$_SESSION['username']=$username;
				$_SESSION['name']=$row['name'];
				$_SESSION['password']=$row['password'];
				$_SESSION['subject']=$row['subject'];
				$_SESSION['mobile']=$row['mobile'];
				$_SESSION['class']=$row['classteacherof'];
				$_SESSION['id']=$row['id'];
				$value=1;
			}
			
		}
		if($value==1){
			if($_SESSION['id']==1){
				header("location:../principal login/0-admin.php");
			}
			else{
				header("location:../teachers login/new.php");
			}
		}
		else{
			?>
			<script>
			document.body.style.overflow="hidden";
			document.querySelector(".popup").style.display="flex";
			document.querySelector(".incorrect").style.display="flex";
			</script>
			<?php
		}
	}
?>	
	</body>
<!--End of body	-->

<!--Script-->	
  <script>

	document.getElementById("clicked").addEventListener("click",function(){
		document.querySelector(".popup").style.display="flex";
		document.body.style.overflow="hidden";
	})
	document.querySelector(".close").addEventListener("click",function(){
		document.querySelector(".popup").style.display="none";
		document.body.style.overflow="visible";
	})

  </script>

</html>
