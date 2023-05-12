<?php
 /*login user information*/
session_start();
ob_start();
$conn=mysqli_connect("localhost","root","","studentinfo");
/*if(isset($_SESSION['username'])){
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
}*/
$lname="demo";
		$classt="";
		$password="";
		$lsubject="";
		$lmobile="";
if(empty($_SESSION['exam'])){
	$_SESSION['exam']="Formative 1";
}

?>
<html lang="en">
<!--Head-->
<head>
	
	<title></title>
	<link rel="stylesheet" href="Report.css">
	<link rel="stylesheet" href="../fontawesome-free-5.15.2-web/css/all.css">

</head>
<!--end of head-->

<!--Body-->
<body>

<div class="wrapper">

<!--sidebar-->
	<div class="sidebar">
        <h2>VISHAVAI <span>VIYANIKETAN</span></h2>
        <ul>
            <li><a href="new.php" id="home"><i class="fas fa-home"></i>Home</a></li>
            <li><a href="profile.php" id="profile"><i class="fas fa-user"></i>Profile</a></li>
            <li><a href="students.php" id="students"><i class="fas fa-user-friends"></i>Students</a></li>
            <li><a href="marks.php" id="marks"><i class="fas fa-address-card"></i>Marks</a></li>
            <li style="background:#3e3762;"><a href="report.php"  id="report"><i class="fas fa-address-book"></i>Progress Cards</a></li>
            
        </ul> 
        
    </div>
<!--Sidebar Ends here-->
	
<!--profile image view-->	
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
<!--End of Profile Image view-->	
	<?php
		if(isset($_POST['csubmit'])){
			$class=$_POST['class'];
			$exam=$_POST['exam'];
			$_SESSION['class']=$_POST['class'];
			$_SESSION['exam']=$exam;
		}
	?>

<!--Main Content-->	
	<div class="main_content">
		
		<div class="first">
		
<!--Selection of Class And Exam-->		
			<h3>CLASS WISE RESULTS</h3>
			<form method="post">
				<label>Class:</label>
				<select name="class" required >
				<option> </option>	
						
					<option <?php if($_SESSION['class']=="") echo 'selected="selected"'; ?> ></option>	
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
					<option value="Formative 1"<?php if($_SESSION['exam']=="Formative 1") echo 'selected="selected"'; ?>>Formative 1</option>	
					<option <?php if($_SESSION['exam']=="Formative 2") echo 'selected="selected"'; ?> >Formative 2</option>
					<option <?php if($_SESSION['exam']=="Summative 1") echo 'selected="selected"'; ?> >Summative 1</option>
					<option <?php if($_SESSION['exam']=="Formative 3") echo 'selected="selected"'; ?> >Formative 3</option>	
					<option <?php if($_SESSION['exam']=="Formative 4") echo 'selected="selected"'; ?> >Formative 4</option>	
					<option <?php if($_SESSION['exam']=="Summative 2") echo 'selected="selected"'; ?> >Summative 2</option>
				</select><br><br>
				<input type="submit" class='but' value="Search" name="csubmit"  />
			</form>
<!--End Of Selecrion Form-->

<!--Class Wise table View-->			
			<h3>CLASS:<?php 
			if(isset($_POST['csubmit']))
			{ 
				$class=$_POST['class'];
				$_SESSION['class']=$class;	
				$exam=$_POST['exam'];
			}else{
				$class=$_SESSION['class'];
			}
			echo $class;
			?>
			</h3>
			<table style="border:1px solid black; width:90%; margin-top:30px; margin-left:auto; margin-right:auto; border-collapse:collapse; text-align:center;">
				<tr>
				<td>ADMISSION_NO</td>	  
				<td>NAME</td>        
				<td>EXAM</td>      
				<td>Telugu</td>  
				<td>Hindi</td>
				<td>English</td>       
				<td>Maths</td>   
				<td>Science</td>
				<td>Social</td>       
				<td>Total</td>       
				<td>Attendance Percentage</td>
				<td>PRINT</td> 
				</tr>
				<?php
				
					
					$class=$_SESSION['class'];
					$exam=$_SESSION['exam'];
					$sql = "SELECT * FROM marks where class='$class' And exam='$exam'";
					$query=mysqli_query($conn,$sql);
					While($row=mysqli_fetch_array($query))
					{
							?>
							<tr>
							<th><?php echo $id=$row['id'];?> </th>				
							<th><?php echo $row['name']; ?> </th>
							<th><?php echo $exam=$row['exam']; ?> </th>
							<th><?php echo  $row['telugu']?> </th>
							<th><?php echo  $row['hindi'];?> </th>
							<th><?php echo  $row['english'];?> </th>
							<th><?php echo  $row['maths'];?> </th>
							<th><?php echo  $row['science'];?> </th>
							<th><?php echo  $row['social'];?> </th>
							<th><?php echo  $row['totalmarks'];?> </th>
							
							<th><?php echo  $row['attendance']."%";?> </th>
							<th>
							<form method="POST">
							<input type="hidden" value="<?php echo $id; ?>" name="id" />
							<input type="hidden" value="<?php echo $exam; ?>" name="exam" />
							<input type="hidden" value="<?php echo $class; ?>" name="class" />
							<!--Print Report  Card-->
							<input type="submit" class='but' value="Print" name="print" />
							</form>
							</th>
							</tr>
							<?php	  											
						
					}
				
				?>
			</table>
		</div> 
	</div>
	<?php
		if(isset($_POST['print'])){
			$id=$_POST['id'];
			$exam=$_POST['exam'];
			$class=$_POST['class'];
			if($exam=="Summative 1" || $exam=="Summative 2"){
				$outof=100;
			}
			else{
				$outof=25;
			}
			$sql = "SELECT * FROM studentinformation where id='$id'"; //fecthing details
			$query=mysqli_query($conn,$sql);
			While($row=mysqli_fetch_array($query))
			{
				$name=$row['name'];
				$father=$row['fathername'];
				$class=$row['class'];
				$phone=$row['phone'];
				$dob=$row['dateofbirth'];
				$year1=$row['year'];
				$year2=$year1+1;
				
			}
			$year=$year1."-".$year2;
			$sql = "SELECT * FROM workingdays where year='$year' "; //fecthing Working Days
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
			$sql = "SELECT * FROM marks where id='$id' and class='$class' And exam='$exam' ";//fecthing Marks
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
				$totalmarks=$row['totalmarks'];
				$cgpa=$row['cgpa'];
				$attendance=$row['attendance'];
				$grade=$row['overallgrade'];
				$year=$row['year'];
				if($row['jan']!=0)
					$sjan=$row['jan'];
				if($row['feb']!=0)
					$sfeb=$row['feb'];
				if($row['mar']!=0)
					$smar=$row['mar'];
				if($row['apr']!=0)
					$sapr=$row['apr'];
				if($row['may']!=0)
					$smay=$row['may'];
				if($row['jun']!=0)
					$sjun=$row['jun'];
				else
					$sjun=0;
				if($row['jul']!=0)
					$sjul=$row['jul'];
				else
					$sjul=0;
				if($row['aug']!=0)
					$saug=$row['aug'];
				else
					$saug=0;
				if($row['sep']!=0)
					$ssep=$row['sep'];
				if($row['oct']!=0)
					$soct=$row['oct'];
				if($row['nov']!=0)
					$snov=$row['nov'];
				if($row['dece']!=0)
					$sdec=$row['dece'];
				
				
			}
			if($grade=="O"){
				$remarks="Outstanding!.. Maintain Same Marks";
			}
			if($grade=="A+"){
				$remarks="Very Good Try To Get Outoff Marks";
			}
			if($grade=="A"){
				$remarks="Good Try To Get Outoff Marks";
			}
			if($grade=="B+"){
				$remarks=" Try To Get Better Marks";
			}
			if($grade=="B"){
				$remarks="Work Hard To Get Outoff Marks";
			}
			if($grade=="C"){
				$remarks="Word Hard To Get Better Marks";
			}
			if($grade=="F"){
				$remarks="You Need Work More And More To Pass ";
				$totalmarks="-";
				$cgpa="FAIL";
			}
			
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
<!--Report Card View-->		
			<div class="popup">
			<div class="popup-content" id="print">
			<img class="close" src="../images/close.png" onclick="document.querySelector('.popup').style.display='none';">
			<div class="detail">
						
				<div id="myDIV">
					<img class="pop_img" src="../images/logo.png">
					
					<h4>VISHAVAI VIDYANIKETAN HIGH SCHOOL<br><nav class="normal1"><span class="reg">(Recognised by Govt. of T.S.)</span><br>Rajiv Gandhi Nagar, Kukatpally, HYDERABAD - 500037, Medchal Dist.</nav></h4>
					<h2 style="margin-top:30px; text-align:center; background-color:lightgreen;"><?php echo $exam; ?></h2>
					<h3 class="h">
						<table>
						<tr>
							<th>ADMISSION NO:</th>
							<td><?php echo $id; ?></td>
							<th>CLASS:</td>
							<td><?php echo $class; ?></td>
							
						</tr>
						<tr>
							<th> STUDENT NAME:</th>
							<td colspan="3"><?php echo $name; ?></td>
							
						</tr>
						<tr>
							
							<th>DATE OF BIRTH:  </th>
							<td><?php echo date('d-m-Y',strtotime($dob)); ?></td>
							<th>YEAR:</th>
							<td><?php echo $year; ?> </td>
						</tr>	
					</table>
					</h3>
					<table class="subjects">
						<tr>
						<th>Subjects</th>
						<th>Marks</th> 
						<th>Out of</th> 
						<th>CGPA</th> 
						
						</tr>
						<tr>
						<th>Telugu</th>
						<td><?php echo $telugu; ?></td>
						<td><?php echo $outof; ?></td>
						<td><?php 
						$cgp1=floatval(($telugu/$outof)*10); 
						$cpga1=number_format($cgp1, 1);
						$cg=$cpga1-floor($cpga1);
						if((round($cg, 1)) ==0.9 || (round($cg, 1)) ==0.1  || (round($cg, 1)) ==0.4 || (round($cg, 1)) == 0.6){
							$cpga1=$cpga1+0.1;
							
						}
						echo $cpga1;
						?></td>
						</tr>
						<tr>
						<th>Hindi</th>
						<td><?php echo $hindi; ?></td>
						<td><?php echo $outof; ?></td>
						<td><?php  $cgp2=floatval(($hindi/$outof)*10); 
						$cpga2=number_format($cgp2, 1);
						$cg=$cpga2-floor($cpga2);
						if((round($cg, 1)) ==0.9 || (round($cg, 1)) ==0.1  || (round($cg, 1)) ==0.4 || (round($cg, 1)) == 0.6){
							$cpga2=$cpga2+0.1;
							
						}
						echo $cpga2;
						?></td>
						</tr>
						<tr>
						<th>English</th>
						<td><?php echo $english; ?></td>
						<td><?php echo $outof; ?></td>
						<td><?php $cgp3=floatval(($english/$outof)*10); 
						$cpga3=number_format($cgp3, 1);
						$cg=$cpga3-floor($cpga3);
						if((round($cg, 1)) ==0.9 || (round($cg, 1)) ==0.1  || (round($cg, 1)) ==0.4 || (round($cg, 1)) == 0.6){
							$cpga3=$cpga3+0.1;
							
						}
						echo $cpga3;
						?></td>
						</tr>
						<tr>
						<th>Maths</th>
						<td><?php echo $maths; ?></td>
						<td><?php echo $outof; ?></td>
						<td><?php  $cgp4=floatval(($maths/$outof)*10);  
						$cpga4=number_format($cgp4, 1);
						$cg=$cpga4-floor($cpga4);
						if((round($cg, 1)) ==0.9 || (round($cg, 1)) ==0.1  || (round($cg, 1)) ==0.4 || (round($cg, 1)) == 0.6){
							$cpga4=$cpga4+0.1;
							
						}
						echo $cpga4;
						?></td>
						</tr>
						<tr>
						<th>Science</th>
						<td><?php echo $science; ?></td>
						<td><?php echo $outof; ?></td>
						<td><?php  $cgp5=floatval(($science/$outof)*10); 
						$cpga5=number_format($cgp5, 1);
						$cg=$cpga5-floor($cpga5);
						if((round($cg, 1)) ==0.9 || (round($cg, 1)) ==0.1  || (round($cg, 1)) ==0.4 || (round($cg, 1)) == 0.6){
							$cpga5=$cpga5+0.1;
							
						}
						echo $cpga5;
						?></td>
						</tr>
						<tr>
						<th>Social</th>
						<td><?php echo $social; ?></td>
						<td><?php echo $outof; ?></td>
						<td><?php $cgp6=floatval(($social/$outof)*10);  
						$cpga6=number_format($cgp6, 1);
						$cg=$cpga6-floor($cpga6);
						if((round($cg, 1)) ==0.9 || (round($cg, 1)) ==0.1  || (round($cg, 1)) ==0.4 || (round($cg, 1)) == 0.6){
							$cpga6=$cpga6+0.1;
							
						}
						echo $cpga6;
						?></td>
						</tr>
						
					</table>
					<div id="mid">
					<table style="border:2px solid black; margin-top:30px; margin-left:auto; margin-right:auto; border-collapse:collapse; text-align:center;" >
						<tr>
							<th>Months</td>
							<th><?php echo $month1;?></th>
							<th><?php echo $month2;?></th>
							<th><?php echo $month3;?></th>
						</tr>
						<tr>
							<th>No. of Days present</th>
							<td><?php echo $days1; ?></td>
							<td><?php echo $days2; ?></td>
							<td><?php echo $days3; ?></td>
						</tr>
						<tr>
							<th>No. of Working Days </th>
							<td><?php echo $tdays1;?></td>
							<td><?php echo $tdays2;?></td>
							<td><?php echo $tdays3;?></td>
						</tr>
					</table>
					</div>
					<div id="sem">
					<table style="border:2px solid black; width:80%; margin-top:30px; margin-left:auto; margin-right:auto; border-collapse:collapse; text-align:center;">
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
							<td><?php echo $days1; ?></td>
							<td><?php echo $days2; ?></td>
							<td><?php echo $days3; ?></td>
							<td><?php echo $days4; ?></td>
							<td><?php echo $days5; ?></td>
							<td><?php echo $days6; ?></td>
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
					<h4 style="margin-left:9%; margin-top:20px; ">Remarks:
					<span class="remark"style="border:2px solid black; boder-radius:5px; display:inline-flex; font-weight:normal; width:550px; padding-bottom:20px; font-size:14px;"><?php echo $remarks; ?></span>
					</h4>
					<table style="margin-top:20px; margin-left:auto; margin-right:auto; border:2px solid black; border-collapse:collapse;">
						<tr>
						<th>TOTAL MARKS</th>	  
						<th>CGPA</th>        
						<th>ATTENDANCE PERCENTAGE</th> 											
						<th>Overall Grade</th> 											
						</tr>
						
						<tr>
						<th><?php echo $totalmarks;?> </th>				
						<th><?php echo $cgpa; ?> </th>
						<th><?php echo $attendance; ?></th>
						<th><?php echo $grade; ?></th>
						</tr>
						
					</table>
					<div class="sign">
					<span style="float:left;">Parent Sign</span>				
					<span style="text-align:center; ">Teacher Sign </span>
					<span style="float:right;" class="ps">Principal Sign </span>
					</div>
				</div>
						
									
			</div>
				<input type="button" class="square_btn" onclick="printDiv('print')" value="print" style="margin-top:8px"/>
			</div>
				
			</div>
<!--End of Report Card View-->	

	
		<?php
		if($exam=="Summative 1" || $exam=="Summative 2"){
			?><script> document.getElementById('mid').style.display='none'; </script><?php
			?><script> document.getElementById('sem').style.display='block'; </script><?php
		}
		else
		{
			?><script> document.getElementById('mid').style.display='block'; </script><?php
			?><script> document.getElementById('sem').style.display='none'; </script><?php
			
		}
	}
	
?>
</div>	


	
</body>
<!--End of Body-->

<!--Javascript-->
<script>
	var dd_main = document.querySelector(".dd_main");

	dd_main.addEventListener("click", function(){
		this.classList.toggle("active");
	})	
	
	function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}		
	
</script>
</html>