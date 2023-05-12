<?php
session_start(); 
ob_start();

$conn=mysqli_connect("localhost","root","","studentinfo");
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
				if(isset($_POST['csubmit']))
				{
					$class=$_POST['class'];
					$exam=$_POST['exam'];
					$_SESSION['class']=$_POST['class'];
					$_SESSION['exam']=$_POST['exam'];
				}else{
					$class=$_SESSION['class'];
					$exam=$_SESSION['exam'];
							
				}
				
				
				
		?>			
<!--Main Content-->	

<div class="main_content">
<!--../teachers login/report.php-->
		<a href="editmarks.php" class="left">Edit Marks</a><br>
		
		<div class="first">
			<div class="marks_entry">
				
<!--Selection -->				
				<form method="post" style="margin-top:50px; text-align:center;">
					<label>Class:</label>
				<select name="class" id="selector" onchange="toggleshared();" required >
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
				<select name="exam"  required >
					<option value="" selected="selected"> </option>	
					<option class="fo" <?php if($_SESSION['exam']=="FA1") echo 'selected="selected"'; ?> value="FA1" >Formative 1</option>	
					<option class="fo" <?php if($_SESSION['exam']=="FA2") echo 'selected="selected"'; ?> value="FA2">Formative 2</option>
					<option class="sa" <?php if($_SESSION['exam']=="SA1") echo 'selected="selected"'; ?> value="SA1">Summative 1</option>
					<option class="fo" <?php if($_SESSION['exam']=="FA3") echo 'selected="selected"'; ?>>Formative 3</option>	
					<option class="fo" <?php if($_SESSION['exam']=="FA4") echo 'selected="selected"'; ?>>Formative 4</option>	
					<option class="sa" <?php if($_SESSION['exam']=="SA2") echo 'selected="selected"'; ?> value="SA2">Summative 2</option>
				</select>
				<br><br>
				<input type="submit" value="Search" class="but" name="csubmit" style="  margin-top:5px; margin-bottom:10px;"/>
			
				</form>
				<h3 style="text-align:left; color: #4b4276; margin-left:5%;" >Strength:<span id="strength">0</span> </h3>
				<script>
				/*function toggleshared(){
						var ddlPassport = document.getElementById("selector");
						if(ddlPassport.value=="NURSERY" || ddlPassport.value=="LKG" || ddlPassport.value=="UKG"){
							for(i=0;i<4;i++){
									document.getElementsByClassName("fo")[i].disabled=true;
							}
							for(i=0;i<2;i++){
									document.getElementsByClassName("sa")[i].disabled=false;
							}
						}else{
							
							for(i=0;i<4;i++){
									document.getElementsByClassName("fo")[i].disabled=false;
							}
							for(i=0;i<2;i++){
									document.getElementsByClassName("sa")[i].disabled=false;
							}
						}
				}*/
							
							
				</script>
				
<!--table View of Class-->				
				<table>
					<tr>
					<td>CLASS</td>
					<td>ADMISSION_NO</td>	  
					<td>NAME</td>        
					<td>GENDER</td>       
					<td>DATE_OF_BIRTH</td>      
					
					<td>Entry</td>
					</tr>
					
				<?php
					$strength=0;
					if($_SESSION['class']=='NURSERY' || $_SESSION['class']=='LKG' || $_SESSION['class']=='UKG'){
						$sql = "SELECT * FROM ppstudentinformation where class='" . $_SESSION['class'] . "'";
					}else{
						$sql = "SELECT * FROM studentinformation where class='" . $_SESSION['class'] . "'";
					}
					$query=mysqli_query($conn,$sql);
					While($row=mysqli_fetch_array($query))
					{
						$ad=$row['id'];
						$querycheck=mysqli_query($conn,"SELECT * FROM marks where id='$ad' And class='$class' And exam='$exam' ");
						$count=mysqli_num_rows($querycheck);
						if($count==0){
						?>
							<tr>
							<th><?php echo $clas=$row['class'];?> </th>
							<th><?php echo $ad=$row['id'];?> </th>				
							<th><?php echo $row['name'];?> </th>
							<th><?php echo $row['gender']; ?> </td>
							<th><?php echo date('d-m-Y',strtotime($row['dateofbirth'])); ?> </th>
							
							<th><form method="POST"> 
							<input type="hidden" name="adno" value="<?php echo $ad; ?>"/> 
							<input type="hidden" name="class" value="<?php echo $clas; ?>"/>
							<input type="hidden" name="year" value="<?php echo $yr=$row['year']; ?>"/>
							<input type="submit" name="entry"  value="Enter Marks" class="but"/></form></th>
							<?php
							/*if(mysqli_num_rows($query1)>0){
								echo '<input type="submit" name="entry"  value="Enter Marks" disabled/></form></th>';
							}else{
								echo '<input type="submit" name="entry" class="but" value="Enter Marks"/></form></th>';
							}*/
							?>
							</tr>
						<?php
						$strength++;
						}						
						
					}
					
					echo '<script> document.getElementById("strength").innerHTML = '.$strength.'; </script>';	
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
		if($class=='NURSERY' || $class=='UKG' || $class=='LKG'){
			$soutof=50;
			$toutof=300;
			$sql = "SELECT * FROM ppstudentinformation where id='$id'";//fecthing Student Information
			if($class=='NURSERY'){
				$subject=array("English Oral","English Written","Maths Oral","Maths Written","Drawing","Rhymes");
			}
			if($class=='LKG'){
				$subject=array("English Oral","English Written","Maths Oral","Maths Written","Drawing","Telugu");
			}
			if($class=='UKG'){
				$subject=array("Telugu","Hindi","English","Maths","EVS","Drawing");
			}
			if($exam=="SA1"){
				$month_1='June';
				$month_2='July';
				$month_3='August';
				$month_4='September';
				$month_5='October';
				//$month_6='November';
				
			}
			if($exam=="SA2"){
				$month_1='November';
				$month_2='December';
				$month_3='January';
				$month_4='February';
				$month_5='March';
				$month_6='April';
				
			}
		}else{		
			$sql = "SELECT * FROM studentinformation where id='$id'";//fecthing Student Information
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
			if($exam=="SA2"){
				$month_1="March";
				$month_2="April";
				$month_3="May";
				
			}
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
<?php
if(isset($_POST['update'])){
	if($exam=="SA2" && !($class=='NURSERY' || $class=='UKG' || $class=='LKG')){
			echo "<script> document.querySelector('.popup').style.overflowy = 'scroll'; </script>";
		}
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
			if($exam=="SA1"){
				$month_1='June';
				$month_2='July';
				$month_3='August';
				$month_4='September';
				$month_5='October';
			}
			if($exam=="SA2"){
				
				$month_1='November';
				$month_2='December';
				$month_3='January';
				$month_4='February';
				$month_5='March';
				$month_6='April';
				
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
				$month_1="September";
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
			if($exam=="SA2"){
				$month_1="March";
				$month_2="April";
				$month_3="May";
				
			}
			
}
?>

<!--MARKS ENTRY FORM-->
		<div class="popup" id='scrl'>
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
				<label style="margin-bottom:20px; font-weight:bold"> Exam:</label>
				<span><?php echo $_SESSION['exam']; ?></span>
				
				
				
				
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
						<th><?php echo $subject[0]; ?></th><th><input  type="number_format" maxlength="5" name="telugu" onfocusout="Focus_Out(event)" id="telugu" value="<?php if(isset($_POST['update'])){ echo $_POST['telugu']; } ?>" required></th><th><span><?php echo $soutof; ?> </span></th>
					</tr>
					<tr>
						<th><?php echo $subject[1]; ?></th><th><input type="number_format" maxlength="5" name="hindi" id="hindi" value="<?php if(isset($_POST['update'])){ echo $_POST['hindi']; } ?>" onfocusout="Focus_Out(event)" required></th><th><span><?php echo $soutof; ?></span></th>
					</tr>
					<tr>
						<th><?php echo $subject[2]; ?></th><th><input type="number_format" maxlength="5" name="english" id="english" value="<?php if(isset($_POST['update'])){ echo $_POST['english']; } ?>" onfocusout="Focus_Out(event)" required></th><th><span><?php echo $soutof;?> </span></th>
					</tr>
					<tr>
						<th><?php echo $subject[3]; ?></th><th><input type="number_format" maxlength="5" name="maths" id="maths" value="<?php if(isset($_POST['update'])){ echo $_POST['maths']; } ?>" onfocusout="Focus_Out(event)" required></th><th><span><?php  echo $soutof; ?></span></th>
					</tr>
					<tr>
						<th><?php echo $subject[4]; ?></th><th><input type="number_format" maxlength="5" name="science" id="science" value="<?php if(isset($_POST['update'])){ echo $_POST['science']; } ?>" onfocusout="Focus_Out(event)" required></th><th><span><?php  echo $soutof; ?></span></th>
					</tr>
					<tr>
						<th><?php echo $subject[5]; ?></th><th><input type="number_format" maxlength="5" name="social" id="social" value="<?php if(isset($_POST['update'])){ echo $_POST['social']; } ?>" onfocusout="Focus_Out(event)" required></th><th><span><?php  echo $soutof; ?></span></th>
					</tr>
					<tr>
						<th>Total Marks</th><th class="total_marks"><?php if(isset($_POST['update'])){ echo $_POST['telugu']+$_POST['hindi']+$_POST['english']+$_POST['maths']+$_POST['science']+$_POST['social']; } ?></th><th><span><?php  echo $toutof; ?></span></th>
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
						<td><input type="number_format" maxlength="2" name="f_month1" value="<?php if(isset($_POST['update'])){ echo $_POST['f_month1']; } ?>" onkeypress="isInputNumber(event)" /> </td>
						<td><input type="number_format" maxlength="2" name="f_month2" value="<?php if(isset($_POST['update'])){ echo $_POST['f_month2']; } ?>" onkeypress="isInputNumber(event)" /> </td>
						<td><input type="number_format" maxlength="2" name="f_month3" value="<?php if(isset($_POST['update'])){ echo $_POST['f_month3']; } ?>" onkeypress="isInputNumber(event)" /> </td>
						<?php
							/*if($_SESSION['exam']=="FA2"){
								?>
								<td><input type="number_format" maxlength="2" name="f_month2" value="<?php if(isset($_POST['update'])){ echo $_POST['f_month2']; } ?>" onkeypress="isInputNumber(event)" /> </td>
								<td><input type="number_format" maxlength="2" name="f_month3" value="<?php if(isset($_POST['update'])){ echo $_POST['f_month3']; } ?>" onkeypress="isInputNumber(event)" /> </td>
								<?php
							}*/
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
						if($exam=="SA2" && ($class=='NURSERY' || $class=='UKG' || $class=='LKG')){
							echo "<th><span class='month1'>$month_1</span></th>";
							echo "<th><span class='month4'>$month_2</span></th>";
							echo "<th><span class='month5'>$month_3</span></th>";
							echo "<th><span class='month6'>$month_4</span></th>";
							echo "<th><span class='month6'>$month_5</span></th>";
							echo "<th><span class='month6'>$month_6</span></th>";
							echo "<script> document.querySelector('.summative').style.width='100%'; </script>";
						}
						if($exam=="SA1" && ($class=='NURSERY' || $class=='UKG' || $class=='LKG')){
							echo "<th><span class='month1'>$month_1</span></th>";
							echo "<th><span class='month2'>$month_2</span></th>";
							echo "<th><span class='month3'>$month_3</span></th>";
							echo "<th><span class='month4'>$month_4</span></th>";
							echo "<th><span class='month5'>$month_5</span></th>";
						}
						if($exam=="SA2" && !($class=='NURSERY' || $class=='UKG' || $class=='LKG')){
							echo "<th><span class='month1'>$month_1</span></th>";
							echo "<th><span class='month2'>$month_2</span></th>";
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
						if($exam=="SA2" && ($class=='NURSERY' || $class=='UKG' || $class=='LKG')){
							?><td><input type="number_format" maxlength="2" name="s_month1" style='width:100%' value="<?php if(isset($_POST['update'])){ echo $_POST['s_month1']; } ?>" onkeypress="isInputNumber(event)" /> </td><?php
							?><td><input type="number_format" maxlength="2" name="s_month2" style='width:100%' value="<?php if(isset($_POST['update'])){ echo $_POST['s_month2']; } ?>" onkeypress="isInputNumber(event)" /> </td><?php
							?><td><input type="number_format" maxlength="2" name="s_month3" style='width:100%' value="<?php if(isset($_POST['update'])){ echo $_POST['s_month3']; } ?>" onkeypress="isInputNumber(event)" /> </td><?php
							?><td><input type="number_format" maxlength="2" name="s_month4" style='width:100%' value="<?php if(isset($_POST['update'])){ echo $_POST['s_month4']; } ?>" onkeypress="isInputNumber(event)" /> </td><?php
							?><td><input type="number_format" maxlength="2" name="s_month5" style='width:100%' value="<?php if(isset($_POST['update'])){ echo $_POST['s_month5']; } ?>" onkeypress="isInputNumber(event)" /> </td><?php
							?><td><input type="number_format" maxlength="2" name="s_month6" style='width:100%' value="<?php if(isset($_POST['update'])){ echo $_POST['s_month6']; } ?>" onkeypress="isInputNumber(event)" /> </td><?php
						}
						if($exam=="SA1" && ($class=='NURSERY' || $class=='UKG' || $class=='LKG')){
							?><td><input type="number_format" maxlength="2" name="s_month1" value="<?php if(isset($_POST['update'])){ echo $_POST['s_month1']; } ?>" onkeypress="isInputNumber(event)" /> </td><?php
							?><td><input type="number_format" maxlength="2" name="s_month2" value="<?php if(isset($_POST['update'])){ echo $_POST['s_month2']; } ?>" onkeypress="isInputNumber(event)" /> </td><?php
							?><td><input type="number_format" maxlength="2" name="s_month3" value="<?php if(isset($_POST['update'])){ echo $_POST['s_month3']; } ?>" onkeypress="isInputNumber(event)" /> </td><?php
							?><td><input type="number_format" maxlength="2" name="s_month4" value="<?php if(isset($_POST['update'])){ echo $_POST['s_month4']; } ?>" onkeypress="isInputNumber(event)" /> </td><?php
							?><td><input type="number_format" maxlength="2" name="s_month5" value="<?php if(isset($_POST['update'])){ echo $_POST['s_month5']; } ?>" onkeypress="isInputNumber(event)" /> </td><?php
						}
						if($exam=="SA2" && !($class=='NURSERY' || $class=='UKG' || $class=='LKG')){
							?><td><input type="number_format" maxlength="2" name="s_month4" value="<?php if(isset($_POST['update'])){ echo $_POST['s_month4']; } ?>" onkeypress="isInputNumber(event)" /> </td><?php
							?><td><input type="number_format" maxlength="2" name="s_month5" value="<?php if(isset($_POST['update'])){ echo $_POST['s_month5']; } ?>" onkeypress="isInputNumber(event)" /> </td><?php
						}
						if($exam=="SA1" && !($class=='NURSERY' || $class=='UKG' || $class=='LKG')){
							?><td><input type="number_format" maxlength="2" name="s_month1" value="<?php if(isset($_POST['update'])){ echo $_POST['s_month1']; } ?>" onkeypress="isInputNumber(event)" /> </td><?php
							?><td><input type="number_format" maxlength="2" name="s_month2" value="<?php if(isset($_POST['update'])){ echo $_POST['s_month2']; } ?>" onkeypress="isInputNumber(event)" /> </td><?php
							?><td><input type="number_format" maxlength="2" name="s_month3" value="<?php if(isset($_POST['update'])){ echo $_POST['s_month3']; } ?>" onkeypress="isInputNumber(event)" /> </td><?php
						}
						
						?>

						</tr>
				
				</table>
				<?php
					if($exam=="SA2" && !($class=='NURSERY' || $class=='UKG' || $class=='LKG')){
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
								
								<td><input type="number_format" maxlength="2" name="vvls1" value="<?php if(isset($_POST['update'])){ echo $_POST['vvls1']; } ?>" onkeypress="isInputNumber(event)" /> </td>
								<td><input type="number_format" maxlength="2" name="ace1" value="<?php if(isset($_POST['update'])){ echo $_POST['ace1']; } ?>" onkeypress="isInputNumber(event)" /> </td>
								<td><input type="number_format" maxlength="2" name="hpe1" value="<?php if(isset($_POST['update'])){ echo $_POST['hpe1']; } ?>" onkeypress="isInputNumber(event)" /> </td>
								<td><input type="number_format" maxlength="2" name="wce1" value="<?php if(isset($_POST['update'])){ echo $_POST['wce1']; } ?>" onkeypress="isInputNumber(event)" /> </td>
								</tr>
								<th>SA-2</th>
								
								<td><input type="number_format" maxlength="2" name="vvls2" value="<?php if(isset($_POST['update'])){ echo $_POST['vvls2']; } ?>" onkeypress="isInputNumber(event)" /> </td>
								<td><input type="number_format" maxlength="2" name="ace2" value="<?php if(isset($_POST['update'])){ echo $_POST['ace2']; } ?>" onkeypress="isInputNumber(event)" /> </td>
								<td><input type="number_format" maxlength="2" name="hpe2" value="<?php if(isset($_POST['update'])){ echo $_POST['hpe2']; } ?>" onkeypress="isInputNumber(event)" /> </td>
								<td><input type="number_format" maxlength="2" name="wce2" value="<?php if(isset($_POST['update'])){ echo $_POST['wce2']; } ?>" onkeypress="isInputNumber(event)" /> </td>
								</tr>
				
						</table>
						<?php
					}
				?>
				</div>
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
		$exam=$_SESSION['exam'];
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
			if($exam=="FA1") {
				$sjun=$_POST['f_month1'];
				$sjul=$_POST['f_month2'];
				$saug=$_POST['f_month3'];
				if($class>5){
					$outof=20;
					$totaloutof=120;
					
				}else{
					$outof=50;
					$totaloutof=300;
				}
				
				if($telugu<=$outof && $hindi<=$outof && $english<=$outof && $maths<=$outof && $science<=$outof && $social<=$outof  ){
					$total=$ssep;
					$totaldays=$sep;
					$percentage=floatval(($totalmarks/$totaloutof)*100);
					$attendance=floatval(($total/$totaldays)*100);
					$attendance=number_format($attendance,2);
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
					$exam="FA1";
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
				$_SESSION['exam']="FA1";
			}
//Summative 1 Marks Insertion
			if($exam=="SA1") {
				if($class=='NURSERY' || $class=='UKG' || $class=='LKG'){
					$month1=$_POST['s_month1'];
					$month2=$_POST['s_month2'];
					$month3=$_POST['s_month3'];
					$month4=$_POST['s_month4'];
					$month5=$_POST['s_month5'];
					$month6=0;
					$outof=50;
					$totaloutof=300;
				}else{
					$month1=$sjun;
					$month2=$sjul;
					$month3=$saug;
					$month4=$_POST['s_month1'];
					$month5=$_POST['s_month2'];
					$month6=$_POST['s_month3'];
					if($class>5){
						$outof=80;
						$totaloutof=480;
					
					}else{
						$outof=50;
						$totaloutof=300;
					}
				}
				
				
				
				
				if($telugu<=$outof && $hindi<=$outof && $english<=$outof && $maths<=$outof && $science<=$outof && $social<=$outof   ){
					$total=$month1+$month2+$month3;
					$totaldays=$sep+$oct+$nov;
					$percentage=floatval(($totalmarks/$totaloutof)*100);
					$attendance=floatval(($total/$totaldays)*100);
					$attendance=number_format($attendance,2);
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
					$sql ="INSERT INTO marks (class,id,name,exam,telugu,hindi,english,maths,science,social,totalmarks,cgpa,attendance,overallgrade,year,jun,jul,aug,sep,oct,nov,dece,jan,feb,mar,apr,may,totaldayspresent) VALUES('$class','$id','$name','$exam','$telugu','$hindi','$english','$maths','$science','$social','$totalmarks','$cpga','$attendance','$grade','$year','$month1','$month2','$month3','$month4','$month5','$month6','$x','$x','$x','$x','$x','$x','$total')";
					if (mysqli_query($conn, $sql)) {
						$_SESSION['exam']="SA1";
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
				
				if($telugu<=$outof && $hindi<=$outof && $english<=$outof && $maths<=$outof && $science<=$outof && $social<=$outof  ){
					$total=$sdec+$sjan+$sfeb;
					$totaldays=$dec+$jan+$feb;
					$percentage=floatval(($totalmarks/$totaloutof)*100);
					$attendance=floatval(($total/$totaldays)*100);
					$attendance=number_format($attendance,2);
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
					$exam="FA2";
					$sql ="INSERT INTO marks (class,id,name,exam,telugu,hindi,english,maths,science,social,totalmarks,cgpa,attendance,overallgrade,year,jan,feb,mar,apr,may,jun,jul,aug,sep,oct,nov,dece,totaldayspresent) VALUES('$class','$id','$name','$exam','$telugu','$hindi','$english','$maths','$science','$social','$totalmarks','$cpga','$attendance','$grade','$year','$sjan','$sfeb','$x','$x','$x','$x','$x','$x','$x','$x','$x','$sdec','$total')";
					if (mysqli_query($conn, $sql)) {
						$_SESSION['exam']="Formative 2";
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
				$_SESSION['exam']="FA2";
			}

//Summative 2 marks Updation
		if($exam=="SA2") {
				if($class!='NURSERY' || $class!='UKG' || $class!='LKG'){
							$vvls1=$_POST['vvls1'];
							$ace1=$_POST['ace1'];
							$hpe1=$_POST['hpe1'];
							$wce1=$_POST['wce1'];
							$vvls2=$_POST['vvls2'];
							$ace2=$_POST['ace2'];
							$hpe2=$_POST['hpe2'];
							$wce2=$_POST['wce2'];
				}
				if($class=='NURSERY' || $class=='UKG' || $class=='LKG'){
					$month1=$_POST['s_month1'];
					$month2=$_POST['s_month2'];
					$month3=$_POST['s_month3'];
					$month4=$_POST['s_month4'];
					$month5=$_POST['s_month5'];
					$month6=$_POST['s_month6'];
					$outof=50;
					$totaloutof=300;
				}else{
					$month1=0;
					$month2=0;
					$month3=0;
					$month4=$_POST['s_month4'];
					$month5=$_POST['s_month5'];
					if($class>5){
						$outof=80;
						$totaloutof=480;
					
					}else{
						$outof=50;
						$totaloutof=300;
					}
				}
				
				
				
				
				if($telugu<=$outof && $hindi<=$outof && $english<=$outof && $maths<=$outof && $science<=$outof && $social<=$outof  ){
					if($class=='NURSERY' || $class=='UKG' || $class=='LKG'){
						$total=$month1+$month2+$month3+$month4+$month5+$month6;
						$totaldays=$nov+$dec+$jan+$feb+$mar+$apr;
					}else{
						$total=$month4+$month5;
						$totaldays=$mar+$apr;
					}
					$percentage=floatval(($totalmarks/$totaloutof)*100);
					$attendance=floatval(($total/$totaldays)*100);
					$attendance=number_format($attendance,2);
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
					
					$sql ="INSERT INTO marks (class,id,name,exam,telugu,hindi,english,maths,science,social,totalmarks,cgpa,attendance,overallgrade,year,jan,feb,mar,apr,may,jun,jul,aug,sep,oct,nov,dece,totaldayspresent) VALUES('$class','$id','$name','$exam','$telugu','$hindi','$english','$maths','$science','$social','$totalmarks','$cpga','$attendance','$grade','$year','$month3','$month4','$month5','$month6','$x','$x','$x','$x','$x','$x','$month1','$month2','$total')";
					if (mysqli_query($conn, $sql)) {
						
						if($class!='NURSERY' && $class!='UKG' && $class!='LKG'){
							
							$cosql ="INSERT INTO coactivities (id,name,class,vvls1,ace1,hpe1,wce1,vvls2,ace2,hpe2,wce2) VALUES('$id','$name','$class','$vvls1','$ace1','$hpe1','$wce1','$vvls2','$ace2','$hpe2','$wce2')";
							if (mysqli_query($conn, $cosql)) {
								$_SESSION['exam']="SA2";
							}else{
								echo "Error: " . $cosql . "<br>" . $conn->error;
							}
						}
						
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
			//fomartive-2
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
