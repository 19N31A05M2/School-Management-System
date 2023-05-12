<?php
session_start(); 
ob_start();
$conn=mysqli_connect("localhost","root","","studentinfo");
$classes=array("N","I","II","III","IV","V","VI","VII","VIII","IX","X");
$month=date('m');
if($month==1 || $month==2 || $month==3 || $month==4 || $month==5)
{
	$year1=date('Y')-1;
}else
	$year1=date('Y');
$year=$year1."-".($year1+1);
//$year="2020-2021";
//echo "<script> alert('$year'); </script>";
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
		
?>
<html lang="en" dir="ltr">
<!-- head-->
  <head>
    <meta charset="utf-8">
    <title>Sidebar Dashboard Template</title>
    <link rel="stylesheet" href="report.css">
   <link rel="stylesheet" href="../fontawesome-free-5.15.2-web/css/all.css">
	
  </head>
  
<!--body-->
 
  <body>

    <input type="checkbox" id="check"  >
    
<!--header area start-->
    <header>
      
      <div class="left_area">
       	<h3> <span> VISHAVAI VIDYANIKETAN HIGH SCHOOL</span></h3>
      </div>
      <div class="right_area">
        <a href="#" class="login"  onclick="document.querySelector('.loginpopup').style.display='flex'; document.body.style.overflow='hidden';" ><span>Log in</span></a>
      </div>
    </header>
<!--header area end-->
    
<!--sidebar start-->
    <div class="sidebar">
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
				<a  href="#"><i id="logos" class="fa fa-info" aria-hidden="true"></i>Student details</a>
				<ul>
					<li><a href="studentdetail.php"><i id="logos" class="fas fa-user-graduate"></i>Details</a></li>
					<li><a href="classdetails.php"><i id="logos" class="fas fa-user-friends"></i>class details</a></li>
				</ul>
			</li>
			<a  href="feepayment.php"><i class="fas fa-money-bill-alt"></i>Fee Payment</a>
			<a  href="marks.php"><i class="fas fa-clipboard"></i>Marks_Entry</a>
			<a  href="old_admission.php"><i class="fas fa-file"></i>Old_Admission</a>
			<a  href="report.php"><i class="fas fa-file"></i>Progress Cards</a>
			
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
	 if($exam=="SA1" || $exam=="SA2"){
		if($exam=="SA1"){
			$pexam="FA1";
			$month1="Sep";
			$month2="Oct";
			$month3="Nov";
		}else{
			$pexam="FA2";
			
		}
		if($exam=="SA2"){
			$pexam="FA2";
			$month1="Mar";
			$month2="Apr";
			$month3="May";
		}
		
	}else{
		$month1="Sep";
	}
	
	if($class=='NURSERY' || $class=='LKG' || $class=='UKG'){
			$saoutof=50;
			$satotaloutof=300;
			$faoutof=0;
			$fatotaloutof=0;
			if($class=='NURSERY'){
				$subject=array("English Oral","English Written","Maths Oral","Maths Written","Drawing","Rhymes");
			}
			if($class=='LKG'){
				$subject=array("English Oral","English Written","Maths Oral","Maths Written","Drawing","Telugu");
			}
			if($class=='UKG'){
				$subject=array("Telugu","Hindi","English","Maths","EVS","Drawing");
			}
			
			$month1="Jun";
			$month2="Jul";
			$month3="Aug";
			$month4="Sep";
			$month5="Oct";
		}else{
			$subject=array("Telugu","Hindi","English","Maths","Science","Social");
			if($class>5){
				$faoutof=20;
				$fatotaloutof=120;
				$saoutof=80;
				$satotaloutof=480;
			}
			else{
				$faoutof=50;
				$fatotaloutof=300;
				$saoutof=50;
				$satotaloutof=300;
			}
		}
	function callpercentage($percentage){
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
		return $grade;	
	}
	function details($id){
		global $class,$exam,$year,$conn,$fatelugu,$fahindi,$faenglish,$famaths,$fascience,$fasocial,$fatotalmarks,$fatotaloutof,$satotaloutof,$pexam,$saenglish,$sahindi,$samaths,$satelugu,$sascience,$sasocial,$satotalmarks;
		$sjun=$sjul=$saug=$ssep=$soct=$snov=$sdec=$sjan=$sfeb=$smar=$sapr=$smay=0;
		if($class=='NURSERY' || $class=='LKG' || $class=='UKG'){
			$sqlinfo="SELECT * FROM ppstudentinformation where id='$id'"; //fecthing details
		}else{
			
			$sqlinfo="SELECT * FROM studentinformation where id='$id'"; //fecthing details
		}
		$queryinfo=mysqli_query($conn,$sqlinfo);
		While($rowinfo=mysqli_fetch_array($queryinfo))
		{
			$name=$rowinfo['name'];
			$father=$rowinfo['fathername'];
			$dob=$rowinfo['dateofbirth'];	
		}
		$commonsql="SELECT * FROM marks where id='$id' and class='$class' And exam='$exam' and year='$year'"; //fetching attendance
		$query=mysqli_query($conn,$commonsql);
		While($crow=mysqli_fetch_array($query))
		{
			if($crow['jan']!=0)
				$sjan=$crow['jan'];
			if($crow['feb']!=0)	
				$sfeb=$crow['feb'];
			if($crow['mar']!=0)
				$smar=$crow['mar'];
			if($crow['apr']!=0)
				$sapr=$crow['apr'];
			if($crow['may']!=0)
				$smay=$crow['may'];
			if($crow['jun']!=0)
				$sjun=$crow['jun'];
			if($crow['jul']!=0)
				$sjul=$crow['jul'];
			if($crow['aug']!=0)
				$saug=$crow['aug'];
			if($crow['sep']!=0)
				$ssep=$crow['sep'];
			if($crow['oct']!=0)
				$soct=$crow['oct'];
			if($crow['nov']!=0)
				$snov=$crow['nov'];
			if($crow['dece']!=0)
				$sdec=$crow['dece'];		
		}
		if($exam=="SA1" || $exam=="SA2"){
			
			$query=mysqli_query($conn,$commonsql);
			While($row=mysqli_fetch_array($query))
			{
				$satelugu=$row['telugu'];
				$sahindi=$row['hindi'];
				$saenglish=$row['english'];
				$samaths=$row['maths'];
				$sascience=$row['science'];
				$sasocial=$row['social'];
				$satotalmarks=$row['totalmarks'];
			}
			$sql = "SELECT * FROM marks where id='$id' and class='$class' And exam='$pexam' and year='$year' ";//fecthing Marks
			$query=mysqli_query($conn,$sql);
			$count=mysqli_num_rows($query);
			if($count>0){
				While($row=mysqli_fetch_array($query))
				{
					
					$fatelugu=$row['telugu'];
					$fahindi=$row['hindi'];
					$faenglish=$row['english'];
					$famaths=$row['maths'];
					$fascience=$row['science'];
					$fasocial=$row['social'];
					$fatotalmarks=$row['totalmarks'];
			
				}
			}else{
				$fatelugu=0;
				$fahindi=0;
				$faenglish=0;
				$famaths=0;
				$fascience=0;
				$fasocial=0;
				$fatotalmarks=0;
			}
			$telugu=$satelugu+$fatelugu;
			$hindi=$sahindi+$fahindi;
			$english=$saenglish+$faenglish;
			$maths=$samaths+$famaths;
			$science=$sascience+$fascience;
			$social=$sasocial+$fasocial;
			$totalmarks=$satotalmarks+$fatotalmarks;
			$totaloutof=$satotaloutof+$fatotaloutof;
			$percentage=floatval(($totalmarks/$totaloutof)*100);
			$grade=callpercentage($percentage);
		}
		else{
			$query=mysqli_query($conn,$commonsql);
			While($row=mysqli_fetch_array($query))
			{
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
				$totaloutof=$fatotaloutof;
			}
		}
		$info = array("name" => $name,"father" =>$father,"dob"=>$dob,"telugu"=>$telugu,"hindi"=>$hindi,"english"=>$english,"maths"=>$maths,"science"=>$science,"social"=>$social,"totalmarks"=>$totalmarks,"fatelugu"=>$fatelugu,"fahindi"=>$fahindi,"faenglish"=>$faenglish,"famaths"=>$famaths,"fascience"=>$fascience,"fasocial"=>$fasocial,"fatotalmarks"=>$fatotalmarks,"satelugu"=>$satelugu,"sahindi"=>$sahindi,"saenglish"=>$saenglish,"samaths"=>$samaths,"sascience"=>$sascience,"sasocial"=>$sasocial,"satotalmarks"=>$satotalmarks,"grade"=>$grade,"sjan"=>$sjan,"sfeb"=>$sfeb,"smar"=>$smar,"sapr"=>$sapr,"smay"=>$smay,"sjun"=>$sjun,"sjul"=>$sjul,"saug"=>$saug,"ssep"=>$ssep,"soct"=>$soct,"snov"=>$snov,"sdec"=>$sdec,"totaloutof"=>$totaloutof);
		return $info;
	}
	function finaltotal($id){
		
		global $class,$exam,$year,$conn;
		$totals=array();
		$attendance=0;
		
		$i=0;
		if($class=='NURSERY' || $class=='LKG' || $class=='UKG'){
			$sqlinfo="SELECT * FROM ppstudentinformation where id='$id'"; //fecthing details
			$exams=array("SA1","SA2");
		}else{
			
			$sqlinfo="SELECT * FROM studentinformation where id='$id'"; //fecthing detail
			$exams=array("FA1","SA1","FA2","SA2");
		}
		while($i<count($exams)){
			$totalmarks=0;
			$sql = "SELECT * FROM marks where id='$id' and class='$class' And exam='$exams[$i]' and year='$year' ";//fecthing Marks
			$query=mysqli_query($conn,$sql);
			$count=mysqli_num_rows($query);
			if($count>0){
				
				While($row=mysqli_fetch_array($query))
				{
					
					$totalmarks=$row['totalmarks'];
					$attend=$row['totaldayspresent'];
			
				}
			
			
				$attendance=$attendance+$attend;
			
			
			
			};
		array_push($totals,$totalmarks);
		
		$i++;
		}
		array_push($totals,$attendance);
		return $totals;
	}
	function finaldetails($id){
		global $class,$exam,$year,$conn;
		$vvls1=$ace1=$hpe1=$wce1=$vvls2=$ace2=$hpe2=$wce2=0;
		$sjun=$sjul=$saug=$ssep=$soct=$snov=$sdec=$sjan=$sfeb=$smar=$sapr=$smay=0;
		$marks=array();
		$months=array();
		$coactivities=array();
		if($class=='NURSERY' || $class=='LKG' || $class=='UKG'){
			$sqlinfo="SELECT * FROM ppstudentinformation where id='$id'"; //fecthing details
			$exams=array("SA1","SA2");
		}else{
			
			$sqlinfo="SELECT * FROM studentinformation where id='$id'"; //fecthing detail
			$exams=array("FA1","SA1","FA2","SA2");
		}
		$queryinfo=mysqli_query($conn,$sqlinfo);
		While($rowinfo=mysqli_fetch_array($queryinfo))
		{
			$name=$rowinfo['name'];
			$father=$rowinfo['fathername'];
			$dob=$rowinfo['dateofbirth'];	
		}
		$commonsql="SELECT * FROM marks where id='$id' and class='$class' And  year='$year'"; //fetching attendance
		$query=mysqli_query($conn,$commonsql);
		While($crow=mysqli_fetch_array($query))
		{
			if($crow['jan']!=0)
				$sjan=$crow['jan'];
			if($crow['feb']!=0)	
				$sfeb=$crow['feb'];
			if($crow['mar']!=0)
				$smar=$crow['mar'];
			if($crow['apr']!=0)
				$sapr=$crow['apr'];
			if($crow['may']!=0)
				$smay=$crow['may'];
			if($crow['jun']!=0)
				$sjun=$crow['jun'];
			if($crow['jul']!=0)
				$sjul=$crow['jul'];
			if($crow['aug']!=0)
				$saug=$crow['aug'];
			if($crow['sep']!=0)
				$ssep=$crow['sep'];
			if($crow['oct']!=0)
				$soct=$crow['oct'];
			if($crow['nov']!=0)
				$snov=$crow['nov'];
			if($crow['dece']!=0)
				$sdec=$crow['dece'];		
		}
		array_push($months,$sjun,$sjul,$saug,$ssep,$soct,$snov,$sdec,$sjan,$sfeb,$smar,$sapr,$smay);
		
		$cosql="SELECT * FROM coactivities where id='$id' and class='$class' "; //fetching attendance
		$coquery=mysqli_query($conn,$cosql);
		While($crow=mysqli_fetch_array($coquery))
		{
			$vvls1=$crow['vvls1'];
			$ace1=$crow['ace1'];
			$hpe1=$crow['hpe1'];
			$wce1=$crow['wce1'];
			$vvls2=$crow['vvls2'];
			$ace2=$crow['ace2'];
			$hpe2=$crow['hpe2'];
			$wce2=$crow['wce2'];
					
		}
		array_push($coactivities,$vvls1,$ace1,$hpe1,$wce1,$vvls2,$ace2,$hpe2,$wce2);
		$i=0;
		while($i<count($exams)){
			$telugu=$hindi=$english=$maths=$science=$social=$totalmarks=0;
			$sql = "SELECT * FROM marks where id='$id' and class='$class' And exam='$exams[$i]' and year='$year' ";//fecthing Marks
			$query=mysqli_query($conn,$sql);
			$count=mysqli_num_rows($query);
			if($count>0){
				While($row=mysqli_fetch_array($query))
				{
					
					$telugu=$row['telugu'];
					$hindi=$row['hindi'];
					$english=$row['english'];
					$maths=$row['maths'];
					$science=$row['science'];
					$social=$row['social'];
					$totalmarks=$row['totalmarks'];
			
				}
			
			
			
			
			
			
		}
		$marks[$exams[$i]]=array($telugu,$hindi,$english,$maths,$science,$social,$totalmarks);
		$i++;
		}
		return [$marks,$months,$coactivities,"name" => $name,"father" =>$father,"dob"=>$dob];
	}
	?>
<!--main content-->

    <div class="content" id="mark" >
		<div class="location"><h4>Report Cards</h4></div><!--location-->
		<div class="main">
			<div class="first">
		
<!--Selection of Class And Exam-->		
			<h3>CLASS WISE RESULTS</h3>
			<form method="post">
				<label>Class:</label>
				<select name="class" required >	
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
					
					<option value="FA1"<?php if($_SESSION['exam']=="FA1") echo 'selected="selected"'; ?>>Formative 1</option>	
					<option value="FA2"<?php if($_SESSION['exam']=="FA2") echo 'selected="selected"'; ?> >Formative 2</option>
					<option value="SA1"<?php if($_SESSION['exam']=="SA1") echo 'selected="selected"'; ?> >Summative 1</option>
					<option <?php if($_SESSION['exam']=="Formative 3") echo 'selected="selected"'; ?> >Formative 3</option>	
					<option <?php if($_SESSION['exam']=="Formative 4") echo 'selected="selected"'; ?> >Formative 4</option>	
					<option value="SA2" <?php if($_SESSION['exam']=="SA2") echo 'selected="selected"'; ?> >Summative 2</option>
					<option value="final" <?php if($_SESSION['exam']=="final") echo 'selected="selected"'; ?> >Final Report</option>
				</select><br><br>
				<input type="submit" class='but' value="Search" name="csubmit"  />
			</form><br>
<!--End Of Selecrion Form-->

<!--Class Wise table View-->			
			<h3>CLASS:<?php 
			echo $class;
			?>
			</h3>
		
			<table style="border:1px solid black; width:90%; margin-top:30px; margin-left:auto; margin-right:auto; border-collapse:collapse; text-align:center;">
				<tr>
				<td>ADMISSION_NO</td>	  
				<td>NAME</td>        
				<td>EXAM</td>  
				<?php 
				if($_SESSION['exam']=="final"){
					if($class=='NURSERY' || $class=='LKG' || $class=='UKG'){
						?>
						<td>SA1</td>
						<td>SA2</td>
						<?php
					}
					else{
						?>
						<td>FA1</td>
						<td>SA1</td>
						<td>FA2</td>
						<td>SA2</td>
						
						<?php
					}
						echo '<td>Total Days Present</td>'; 
						
				
				}else{
					?>
						<td><?php echo $subject[0]; ?></td>  
						<td><?php echo $subject[1]; ?></td>
						<td><?php echo $subject[2]; ?></td>       
						<td><?php echo $subject[3]; ?></td>   
						<td><?php echo $subject[4]; ?></td>
						<td><?php echo $subject[5]; ?></td>       
						<td>Total</td>       
						<td>Attendance Percentage</td>
						<td>Print</td>
						
					<?php
				}
				?>
				</tr>
				<?php
				
					
					$class=$_SESSION['class'];
					
					$exam=$_SESSION['exam'];
					if($exam=="final"){
						
						$sql = "SELECT DISTINCT(t1.id),t1.name FROM marks t1 ,marks t2 where t1.exam='SA1' AND t2.exam= 'SA2' AND t1.class='$class' AND t1.year='$year' Order By t1.id ASC";
						$query=mysqli_query($conn,$sql);
						While($row=mysqli_fetch_array($query))
						{
							
								$arr=finaltotal($row['id']);
								?>
								<tr>
								<th><?php echo $id=$row['id'];?> </th>				
								<th><?php echo $row['name']; ?> </th>
								<th><?php echo "Final"; ?> </th>
								
								<?php
								if($class=='NURSERY' || $class=='LKG' || $class=='UKG'){
									?>
									<th><?php echo  $arr[0];?> </th>
									<th><?php echo  $arr[1];?> </th>
									<th><?php echo  $arr[2];?> </th>
									<?php
								}else{
									?>
									<th><?php echo  $arr[0];?> </th>
									<th><?php echo  $arr[1];?> </th>
									<th><?php echo  $arr[2];?> </th>
									<th><?php echo  $arr[3];?> </th>
									<th><?php echo  $arr[4];?> </th>
									<?php
								}
								
								
									
						}
						
						
					}else{
						$sql = "SELECT * FROM marks where class='$class' And exam='$exam' and year='$year'";
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
								
								<th><?php echo  $row['totaldayspresent'];?> </th>
								<th>
								<form method="POST">
								<input type="hidden" value="<?php echo $id; ?>" name="id" />
								
								<!--Print Report  Card-->
								<input type="submit" class='but' value="Print" name="print"  />
								</form>
								</th>
								</tr>
								<?php	  											
							
						}
					}
				
				?>
			</table>
			<form method="POST"><input type="submit" name="printall" class="buttonall"   value="print" style="text-align:center;"/></form>
		</div> 	
		</div>
			
	</div>
	
<!--End of content-->	
<?php

if(isset($_POST['printall'])){
	if($exam=="final"){
		
		?>
			<div class="popupall">
			<div class="popup-contentall" id="printall">
			<img class="close" src="../images/close.png" onclick="document.querySelector('.popupall').style.display='none';">
				<?php
				$z=0;
				$sqlall = "SELECT DISTINCT(t1.id) FROM marks t1 ,marks t2 where t1.exam='SA1' AND t2.exam= 'SA2' AND t1.class='$class' AND t1.year='$year' Order By t1.id ASC ";//fecthing Marks
				$queryall=mysqli_query($conn,$sqlall);
				While($row=mysqli_fetch_array($queryall))
				{
					$id=$row['id'];
					
					$details=finaldetails($id);
					?>
					<div class="detail">
						<!--<img class="pop_img" src="logo.png">-->
						<h4>VISHAVAI VIDYANIKETAN HIGH SCHOOL<br><nav class="normal1"><span class="reg">(Recognised by Govt. of T.S.)</span><br>Rajiv Gandhi Nagar, Kukatpally, Medchal Dist.-37</nav></h4>
						<h2 ><?php echo "PROGRESS REPORT&nbsp&nbsp".$year ; ?></h2>	
						<h3 class="h">
							<table>
							<tr>
								<th style="width:150px"> STUDENT NAME</th>
								<td style="width:350px"><?php echo $details['name']; ?></td>
								<th style="width:150px">CLASS</th>
								<td><?php if($class=='NURSERY' || $class=='LKG' || $class=='UKG'){ echo $class; }else{ echo $classes[$class]; } ?></td>
								
							</tr>
							
							<tr>
								
								<th style="width:150px">FATHER NAME</th>
								<td><?php echo $details['father']; ?></td>
								<th style="width:150px">DATE OF BIRTH  </th>
								<td><?php echo date('d-m-Y',strtotime($details['dob'])); ?></td>
								</tr>
							<tr>
								<?php 
								if(!($class=='NURSERY' || $class=='LKG' || $class=='UKG')){
									?>
									<th style="width:150px">ADMISSION NO</th>
									<td><?php echo  $id; ?></td>
									<?php
								}
								?>
							</tr>	
						</table>
						</h3>
						
						<div class="container left" id="left" style="margin-left:0px; margin-top:0px;">
							<div class="fixed" style="width:70%;">
								<table  class="subjects" style="margin-top:5px;">
									<tr style="background-color:lightgrey;">
										<th style="padding:10px 10px 10px 10px;">Subject</th>
											<?php
								
											if($class=="NURSERY" || $class=="LKG" || $class=="UKG"){
												?>
													<th style="padding:10px;"> <?php echo "SA1"?></th> 
													<th style="padding:10px;"> <?php echo "SA2"?></th> 
													<th style="padding:10px;"> <?php echo "Total"?></th> 
												<?php
											}else{
												?>
													<th style="padding:10px;"> <?php echo "FA1"?></th>
													<th style="padding:10px;"> <?php echo "SA1"?></th>		
													<th style="padding:10px;"> <?php echo "Total"?></th>		
													<th style="padding:10px;"> <?php echo "FA2"?></th> 
													<th style="padding:10px;"> <?php echo "SA2"?></th> 
													<th style="padding:10px;"> <?php echo "Avg(FA's)"?></th> 
													<th style="padding:10px;"> <?php echo "Total"?></th>
													
												<?php
											}
								
											?>
							
							
							
							
									</tr>
							<tr>
							<th><p><?php echo $subject[0]; ?></p></th>
							
							<?php
								
									if($class=="NURSERY" || $class=="LKG" || $class=="UKG"){
										?>
											<td><?php if($details[0]["SA1"][0]==0)echo 'AB'; else echo $details[0]["SA1"][0]?></td>
											<td><?php if($details[0]["SA2"][0]==0)echo 'AB'; else echo $details[0]["SA2"][0]?></td>
											<td><?php if($details[0]["SA2"][0]+$details[0]["SA1"][0]==0)echo "AB";else echo $details[0]["SA2"][0]+$details[0]["SA1"][0];?></td>
										<?php              
									}else{                 
										?>                 
											<td><?php if($details[0]["FA1"][0]==0)echo "AB";else echo $details[0]["FA1"][0]?></td>
											<td><?php if($details[0]["SA1"][0]==0)echo "AB";else echo $details[0]["SA1"][0]?></td>
											<td><?php if($details[0]["SA1"][0]+$details[0]["FA1"][0]==0)echo "AB";else echo $details[0]["SA1"][0]+$details[0]["FA1"][0];?></td>
											<td><?php if($details[0]["FA2"][0]==0)echo "AB";else echo $details[0]["FA2"][0]?></td>
											<td><?php if($details[0]["SA2"][0]==0)echo "AB";else echo $details[0]["SA2"][0]?></td>
											<td><?php if($details[0]["FA1"][0]+$details[0]["FA2"][0]==0){echo "AB"; $avg1=0;}else echo $avg1=ceil(($details[0]["FA1"][0]+$details[0]["FA2"][0])/2);?></td>
											<td><?php if($avg1+$details[0]["SA2"][0]==0){echo "AB"; $total1=0;}else echo $total1=$avg1+$details[0]["SA2"][0]?></td>
											
										<?php
									}
								
							?>
							
							
							
							</tr>
							<tr>
							<th><p><?php echo $subject[1]; ?></p></th>
						
							<?php
								
									if($class=="NURSERY" || $class=="LKG" || $class=="UKG"){
										?>
											<td><?php if($details[0]["SA1"][1]==0)echo 'AB'; else echo $details[0]["SA1"][1]?></td>
											<td><?php if($details[0]["SA2"][1]==0)echo 'AB'; else echo $details[0]["SA2"][1]?></td>
											<td><?php if($details[0]["SA2"][1]+$details[0]["SA1"][1]==0)echo "AB";else echo $details[0]["SA2"][1]+$details[0]["SA1"][1];?></td>
										<?php              
									}else{                 
										?>                 
											<td><?php if($details[0]["FA1"][1]==0)echo "AB";else echo $details[0]["FA1"][1]?></td>
											<td><?php if($details[0]["SA1"][1]==0)echo "AB";else echo $details[0]["SA1"][1]?></td>
											<td><?php if(($details[0]["SA1"][1]+$details[0]["FA1"][0])==0)echo "AB";else echo $details[0]["SA1"][1]+$details[0]["FA1"][1];?></td>
											<td><?php if($details[0]["FA2"][1]==0)echo "AB";else echo $details[0]["FA2"][1]?></td>
											<td><?php if($details[0]["SA2"][1]==0)echo "AB";else echo $details[0]["SA2"][1]?></td>
											<td><?php if($details[0]["FA1"][1]+$details[0]["FA2"][0]==0){echo "AB"; $avg2=0;}else echo $avg2=ceil(($details[0]["FA1"][1]+$details[0]["FA2"][1])/2);?></td>
											<td><?php if($avg2+$details[0]["SA2"][1]==0){echo "AB"; $total2=0;}else echo $total2=$avg2+$details[0]["SA2"][1]?></td>
											
										<?php
									}
								
							?>
						
						
							</tr>
							<tr>
							<th><p><?php echo $subject[2]; ?></p></th>
							<?php
								
									if($class=="NURSERY" || $class=="LKG" || $class=="UKG"){
										?>
											<td><?php if($details[0]["SA1"][2]==0)echo 'AB'; else echo $details[0]["SA1"][2]?></td>
											<td><?php if($details[0]["SA2"][2]==0)echo 'AB'; else echo $details[0]["SA2"][2]?></td>
											<td><?php if($details[0]["SA2"][2]+$details[0]["SA1"][2]==0)echo "AB";else echo $details[0]["SA2"][2]+$details[0]["SA1"][2];?></td>
										<?php              
									}else{                 
										?>                 
											<td><?php if($details[0]["FA1"][2]==0)echo "AB";else echo $details[0]["FA1"][2]?></td>
											<td><?php if($details[0]["SA1"][2]==0)echo "AB";else echo $details[0]["SA1"][2]?></td>
											<td><?php if($details[0]["SA1"][2]+$details[0]["FA1"][2]==0)echo "AB";else echo $details[0]["SA1"][2]+$details[0]["FA1"][2];?></td>
											<td><?php if($details[0]["FA2"][2]==0)echo "AB";else echo $details[0]["FA2"][2]?></td>
											<td><?php if($details[0]["SA2"][2]==0)echo "AB";else echo $details[0]["SA2"][2]?></td>
											<td><?php if($details[0]["FA1"][2]+$details[0]["FA2"][2]==0){echo "AB"; $avg3=0;}else echo $avg3=ceil(($details[0]["FA1"][2]+$details[0]["FA2"][2])/2);?></td>
											<td><?php if($avg3+$details[0]["SA2"][2]==0){echo "AB"; $total3=0;}else echo $total3=$avg3+$details[0]["SA2"][2]?></td>
											
										<?php
									}
								
							?>
							
							
							
							</tr>
							<tr>
							<th><p><?php echo $subject[3]; ?></p></th>
							<?php
								
									if($class=="NURSERY" || $class=="LKG" || $class=="UKG"){
										?>
											<td><?php if($details[0]["SA1"][3]==0)echo 'AB'; else echo $details[0]["SA1"][3]?></td>
											<td><?php if($details[0]["SA2"][3]==0)echo 'AB'; else echo $details[0]["SA2"][3]?></td>
											<td><?php if($details[0]["SA2"][3]+$details[0]["SA1"][3]==0)echo "AB";else echo $details[0]["SA2"][3]+$details[0]["SA1"][3];?></td>
										<?php              
									}else{                 
										?>                 
											<td><?php if($details[0]["FA1"][3]==0)echo "AB";else echo $details[0]["FA1"][3]?></td>
											<td><?php if($details[0]["SA1"][3]==0)echo "AB";else echo $details[0]["SA1"][3]?></td>
											<td><?php if($details[0]["SA1"][3]+$details[0]["FA1"][3]==0)echo "AB";else echo $details[0]["SA1"][3]+$details[0]["FA1"][3];?></td>
											<td><?php if($details[0]["FA2"][3]==0)echo "AB";else echo $details[0]["FA2"][3]?></td>
											<td><?php if($details[0]["SA2"][3]==0)echo "AB";else echo $details[0]["SA2"][3]?></td>
											<td><?php if($details[0]["FA1"][3]+$details[0]["FA2"][3]==0){echo "AB"; $avg4=0;}else echo $avg4=ceil(($details[0]["FA1"][3]+$details[0]["FA2"][3])/2);?></td>
											<td><?php if($avg4+$details[0]["SA2"][3]==0){echo "AB"; $total4=0;}else echo $total4=$avg4+$details[0]["SA2"][3]?></td>
											
										<?php
									}
								
							?>
							
							
							</tr>
							<tr>
							<th><p><?php echo $subject[4]; ?></p></th>
							<?php
								
									if($class=="NURSERY" || $class=="LKG" || $class=="UKG"){
										?>
											<td><?php if($details[0]["SA1"][4]==0)echo 'AB'; else echo $details[0]["SA1"][4]?></td>
											<td><?php if($details[0]["SA2"][4]==0)echo 'AB'; else echo $details[0]["SA2"][4]?></td>
											<td><?php if($details[0]["SA2"][4]+$details[0]["SA1"][4]==0)echo "AB";else echo $details[0]["SA2"][4]+$details[0]["SA1"][4];?></td>
										<?php              
									}else{                 
										?>                 
											<td><?php if($details[0]["FA1"][4]==0)echo "AB";else echo $details[0]["FA1"][4]?></td>
											<td><?php if($details[0]["SA1"][4]==0)echo "AB";else echo $details[0]["SA1"][4]?></td>
											<td><?php if($details[0]["SA1"][4]+$details[0]["FA1"][4]==0)echo "AB";else echo $details[0]["SA1"][4]+$details[0]["FA1"][4];?></td>
											<td><?php if($details[0]["FA2"][4]==0)echo "AB";else echo $details[0]["FA2"][4]?></td>
											<td><?php if($details[0]["SA2"][4]==0)echo "AB";else echo $details[0]["SA2"][4]?></td>
											<td><?php if($details[0]["FA1"][4]+$details[0]["FA2"][4]==0){echo "AB"; $avg5=0;}else echo $avg5=ceil(($details[0]["FA1"][4]+$details[0]["FA2"][4])/2);?></td>
											<td><?php if($avg5+$details[0]["SA2"][4]==0){echo "AB"; $total5=0;}else echo $total5=$avg5+$details[0]["SA2"][4]?></td>
											
										<?php
									}
								
							?>
							
							
							</tr>
							<tr>
							<th><p><?php echo $subject[5]; ?></p></th>
							<?php
								
									if($class=="NURSERY" || $class=="LKG" || $class=="UKG"){
										?>
											<td><?php if($details[0]["SA1"][5]==0)echo 'AB'; else echo $details[0]["SA1"][5]?></td>
											<td><?php if($details[0]["SA2"][5]==0)echo 'AB'; else echo $details[0]["SA2"][5]?></td>
											<td><?php if($details[0]["SA2"][5]+$details[0]["SA1"][5]==0)echo "AB";else echo $details[0]["SA2"][5]+$details[0]["SA1"][5];?></td>
										<?php              
									}else{                 
										?>                 
											<td><?php if($details[0]["FA1"][5]==0)echo "AB";else echo $details[0]["FA1"][5]?></td>
											<td><?php if($details[0]["SA1"][5]==0)echo "AB";else echo $details[0]["SA1"][5]?></td>
											<td><?php if($details[0]["SA1"][5]+$details[0]["FA1"][5]==0)echo "AB";else echo $details[0]["SA1"][5]+$details[0]["FA1"][5];?></td>
											<td><?php if($details[0]["FA2"][5]==0)echo "AB";else echo $details[0]["FA2"][5]?></td>
											<td><?php if($details[0]["SA2"][5]==0)echo "AB";else echo $details[0]["SA2"][5]?></td>
											<td><?php if($details[0]["FA1"][5]+$details[0]["FA2"][5]==0){echo "AB"; $avg6=0;}else echo $avg6=ceil(($details[0]["FA1"][5]+$details[0]["FA2"][5])/2);?></td>
											<td><?php if($avg6+$details[0]["SA2"][5]==0){echo "AB"; $total6=0;}else echo $total6=$avg6+$details[0]["SA2"][5]?></td>
											
										<?php
									}
								
							?>
							
							
							</tr>
							<tr>
							<th><p>Total</p></th>
							<?php
								
									if($class=="NURSERY" || $class=="LKG" || $class=="UKG"){
										?>
											<td><?php if($details[0]["SA1"][6]==0){echo "AB"; $total1=0;}else echo $total1=$details[0]["SA1"][6]?></td>
											<td><?php if($details[0]["SA2"][6]==0){echo "AB";$total1=0;}else echo $total2=$details[0]["SA2"][6]?></td>
											<td><?php if($total1+$total2==0)echo "AB";else echo $total=$total1+$total2;?></td>
										<?php
									}else{
										?>
											<td><?php if($details[0]["FA1"][6]==0)echo 'AB';else echo $details[0]["FA1"][6]?></td>
											<td><?php if($details[0]["SA1"][6]==0)echo 'AB';else echo $details[0]["SA1"][6]?></td>
											<td><?php if($details[0]["SA1"][6]+$details[0]["FA1"][6]==0)echo 'AB';else echo $details[0]["SA1"][6]+$details[0]["FA1"][6];?></td>
											<td><?php if($details[0]["FA2"][6]==0)echo 'AB';else echo $details[0]["FA2"][6]?></td>
											<td><?php if($details[0]["SA2"][6]==0)echo 'AB';else echo $details[0]["SA2"][6]?></td>
											<td><?php $avg=$avg1+$avg2+$avg3+$avg4+$avg5+$avg6; if(!$avg)echo 'AB'; else echo $avg;?></td>
											<td><?php $total=$total1+$total2+$total3+$total4+$total5+$total6; if(!$total)echo 'AB'; else echo $total; ?></td>
										<?php
									}
								
							?>
							
							
							
							</tr>
							
						</table>
						
						</div>
						<?php
						if($class!="NURSERY" && $class!="LKG" && $class!="UKG" ){
							?>
								<div class="flex-item">
									<table class="attend1"  >
										<tr>
											<th>Co-Currcular Activites</th>
											<th>SA1</th>
											<th>SA2</th>
											
										</tr>
										<tr>
											<td>Value Education & Life Skills</td>
											<td><?php echo $details[2][0];?></td>
											<td><?php echo $details[2][4];?></td>
											
										</tr>
										<tr>
											<td>Arts & Cultural Education</td>
											<td><?php echo $details[2][1];?></td>
											<td><?php echo $details[2][5];?></td>
											
										</tr>
										<tr>
											<td>Health & Physical Education</td>
											<td><?php echo $details[2][2];?></td>
											<td><?php echo $details[2][6];?></td>
											
										</tr>
										<tr>
											<td>Work & Computer Education</td>
											<td><?php echo $details[2][3];?></td>
											<td><?php echo $details[2][7];?></td>
											
										</tr>
										
									</table>
							
								</div>
							<?php
						}else{
							?>
								<div>
								<div style="margin-left:0%; margin-top:10px;">
							<div class="fixed" style="margin-right:10px; width:100%; ?>">
								<table class="attend" style="margin-top:30px;">
									<tr style="background-color:lightgrey;">
										<th style="<?php if($class=="NURSERY" || $class=="LKG" || $class=="UKG") echo 'padding:5px 5px 5px 5px;'; else 'padding:5px 0px 5px 0px;'; ?>">Overall Grade</th>
										
										
									</tr>
											<tr>
										
												<td>
												<?php
													
													$percentage=floatval(($total/600)*100);
													$grade=callpercentage($percentage);
													echo $grade;
												?>
												</td>
									
											</tr>
								</table>
							</div>
							<BR>
							<div class="flex-item" style="width:100%">
								<table class="attend" style="margin-top:0px;">
									<tr style="background-color:lightgrey; ">
										<th style="padding:5px 0px 5px 0px;">Result:</th>
									</tr>
									<tr>
										<td style="padding:12px 3px 0px 3px">Passed <span style="font-size:22px">/</span> Promoted</td>
									</tr>	
								</table>
							</div>
							</div>
							</div>
							<?php
							echo "<script> document.querySelectorAll('#left')['$z'].style.marginLeft='20%';</script>";
						}
					?>
					</div>
					<div class="container" style="margin-top:10px; margin-left:0%">
					<div class="fixed" style="margin-right:10px; <?php if($class=="NURSERY" || $class=="LKG" || $class=="UKG") echo 'margin-left:auto; margin-right:auto; width:80%;';else echo 'width:65%;';  ?>" >
						<table class="subjects" style="margin-top:0px;">							
							<tr style="background-color:lightgrey;">
								<th colspan="13" style="padding: 5px 2px 5px 2px;">Attendance Particulars</th>
								
								
							</tr>
							<tr style="background-color:lightgrey;">
								<th>Month</th>
								<th>Jun</th>
								<th>Jul</th>
								<th>Aug</th>
								<th>Sep</th>
								<th>Oct</th>
								<th>Nov</th>
								<th>Dec</th>
								<th>Jan</th>
								<th>Feb</th>
								<th>Mar</th>
								<th>Apr</th>
								<th>Total</th>
							</tr>
							<tr>
								<th>Working Days </th>
								<th><?php echo $jun; ?></th>
								<th><?php echo $jul; ?></th>
								<th><?php echo $aug; ?></th>
								<th><?php echo $sep; ?></th>
								<th><?php echo $oct; ?></th>
								<th><?php echo $nov; ?></th>
								<th><?php echo $dec; ?></th>
								<th><?php echo $jan; ?></th>
								<th><?php echo $feb; ?></th>
								<th><?php echo $mar; ?></th>
								<th><?php echo $apr; ?></th>
								<th><?php echo $jun+$jul+$aug+$sep+$oct+$nov+$dec+$jan+$feb+$mar+$apr; ?></th>
								
							</tr>
							<tr>
								<th>Days Attended</th>
								<th><?php echo $details[1][0]; ?></th>
								<th><?php echo $details[1][1]; ?></th>
								<th><?php echo $details[1][2]; ?></th>
								<th><?php echo $details[1][3]; ?></th>
								<th><?php echo $details[1][4]; ?></th>
								<th><?php echo $details[1][5]; ?></th>
								<th><?php echo $details[1][6]; ?></th>
								<th><?php echo $details[1][7]; ?></th>
								<th><?php echo $details[1][8]; ?></th>
								<th><?php echo $details[1][9]; ?></th>
								<th><?php echo $details[1][10]; ?></th>
								<th><?php echo $details[1][0]+$details[1][1]+$details[1][2]+$details[1][3]+$details[1][4]+$details[1][5]+$details[1][6]+$details[1][7]+$details[1][8]+$details[1][9]+$details[1][10]; ?></th>
								
							</tr>
						</table>
						</div>
						<?php
						if($class!="NURSERY" && $class!="LKG" && $class!="UKG" ){
							?>
						<div class="flex-item">
							<div class="container" style="margin-left:0%; margin-top:10px;">
							
							<div class="fixed" style="margin-right:10px;">
								<table class="attend" style="margin-top:0px;">
									<tr style="background-color:lightgrey;">
										<th style="padding:5px 0px 5px 0px;">Overall Grade</th>
										
										
									</tr>
											<tr>
										
												<td>
												<?php
													
													$percentage=floatval(($total/600)*100);
													$grade=callpercentage($percentage);
													echo $grade;
												?>
												</td>
									
											</tr>
								</table>
							</div>
							
							<div class="flex-item" style="width:70%">
								<table class="attend" style="margin-top:0px;">
									<tr style="background-color:lightgrey; ">
										<th style="padding:5px 0px 5px 0px;">Result:</th>
									</tr>
									<tr>
										<td style="padding:12px 3px 0px 3px">Passed <span style="font-size:22px">/</span> Promoted</td>
									</tr>	
								</table>
							</div>
							
							</div>
						</div>
							<?php
						}
						?>
						</div>
						<div style="text-align:center; margin-top:10px">
								<span style="font-style:italic;  font-family: cursive; font-size:20px; " >**School Re-Opens on: <span style="text-decoration:underline">12/06/2023</span>**</span>
							</div>
						<img src="../images/psign.png" style="margin-top:0px; margin-right:40px; float:right; height:40px; width:60px; transform:rotate(-5deg);"/>
						<div class="sign" style="margin-top:40px;">
							<span style="float:left;">Parent Sign</span>				
							<span style="text-align:center; ">Teacher Sign </span>
							<span style="float:right;" class="ps">Principal Sign </span>
						</div>
					</div>
					<?php
					$z++;
				}
				?>
				<input type="submit"  class="buttonall" onclick="printDivall('printall')" value="printAll" style="text-align:center; float:left;"/>
			</div>
			</div>
		<?php
		
	}
	else{
	?>
	<div class="popupall">
		<div class="popup-contentall" id="printall">
		<img class="close" src="../images/close.png" onclick="document.querySelector('.popupall').style.display='none';">
			<?php
			$sqlall = "SELECT * FROM marks where class='$class' And exam='$exam' and year='$year' ";//fecthing Marks
			$queryall=mysqli_query($conn,$sqlall);
			While($row=mysqli_fetch_array($queryall))
			{
				
				$id=$row['id'];
				?>
				<div class="detail">
					<!--<img class="pop_img" src="logo.png">-->
					<h4>VISHAVAI VIDYANIKETAN HIGH SCHOOL<br><nav class="normal1"><span class="reg">(Recognised by Govt. of T.S.)</span><br>Rajiv Gandhi Nagar, Kukatpally, Medchal Dist.-37</nav></h4>
					<?php 
					$sdetails=details($id); 
					?>
					<h2 ><?php echo "PROGRESS REPORT&nbsp&nbsp".$year ; ?></h2>	
					<h3 class="h">
						<table>
						<tr>
							<th style="width:150px"> STUDENT NAME</th>
							<td style="width:350px"><?php echo $sdetails['name']; ?></td>
							<th style="width:150px">CLASS</th>
							<td><?php if($class=='NURSERY' || $class=='LKG' || $class=='UKG'){ echo $class; }else{ echo $classes[$class]; } ?></td>
							
						</tr>
						
						<tr>
							
							<th style="width:150px">FATHER NAME</th>
							<td><?php echo $sdetails['father']; ?></td>
							<th style="width:150px">DATE OF BIRTH  </th>
							<td><?php echo date('d-m-Y',strtotime($sdetails['dob'])); ?></td>
							</tr>
						<tr>
							<?php 
							if(!($class=='NURSERY' || $class=='LKG' || $class=='UKG')){
								?>
								<th style="width:150px">ADMISSION NO</th>
								<td><?php echo  $id; ?></td>
								<?php
							}
							?>
						</tr>	
					</table>
					</h3>
					<div class="container">
						<div class="fixed">
							<table class="subjects">
						<tr style="background-color:lightgrey;">
						<th style="padding:10px 30px 10px 30px;">Subject</th>
						<?php
							if($exam=="SA1" || $exam=="SA2"){
								if($class=="NURSERY" || $class=="LKG" || $class=="UKG"){
									?>
										<th style="padding:10px;"> <?php echo $exam."(".$saoutof.")"; ?></th> 
									<?php
								}else{
									?>
										<th style="padding:10px;"><?php echo $pexam."(".$faoutof.")"; ?></th> 
										<th style="padding:10px;"><?php echo $exam."(".$saoutof.")"; ?></th> 
										<th style="padding:10px;">Total(<?php echo 100; ?>)</th> 
									<?php
								}
							}else{
								?>
									<th style="padding:10px;">Marks (<?php echo $faoutof; ?>)</th> 
								<?php
							}
						?>
						
						
						
						
						</tr>
						<tr>
						<th><p><?php echo $subject[0]; ?></p></th>
						
						<?php
							if($exam=="SA1" || $exam=="SA2"){
								if($class=="NURSERY" || $class=="LKG" || $class=="UKG"){
									?>
										<td><?php if($sdetails['telugu']==0){echo "AB";}else{ echo $sdetails['telugu']; }?></td>
									<?php
								}else{
									?>
										<td><?php if($sdetails['fatelugu']==0){echo "AB";}else{echo $sdetails['fatelugu']; }?></td>
										<td><?php if($sdetails['satelugu']==0){echo "AB";}else{echo $sdetails['satelugu']; } ?></td>
										<td><?php echo $sdetails['telugu']; ?></td>
									<?php
								}
							}else{
								?>
									<td><?php if($sdetails['telugu']==0){echo "AB";}else{ echo $sdetails['telugu']; } ?></td> 
								<?php
							}
						?>
						
						
						
						</tr>
						<tr>
						<th><p><?php echo $subject[1]; ?></p></th>
					
						<?php
							if($exam=="SA1" || $exam=="SA2"){
								if($class=="NURSERY" || $class=="LKG" || $class=="UKG"){
									?>
										<td><?php if($sdetails['hindi']==0){ echo "AB"; }else{ echo $sdetails['hindi']; }?></td>
									<?php
								}else{
									?>
										<td><?php if($sdetails['fahindi']==0){ echo "AB"; }else{ echo $sdetails['fahindi']; } ?></td>
										<td><?php if($sdetails['sahindi']==0){ echo "AB"; }else{ echo $sdetails['sahindi']; } ?></td>
										<td><?php echo $sdetails['hindi']; ?></td>
									<?php
								}
							}else{
								?>
									<td><?php if($sdetails['hindi']==0){ echo "AB"; }else{ echo $sdetails['hindi']; } ?></td> 
								<?php
							}
						?>
					
					
						</tr>
						<tr>
						<th><p><?php echo $subject[2]; ?></p></th>
						<?php
							if($exam=="SA1" || $exam=="SA2"){
								if($class=="NURSERY" || $class=="LKG" || $class=="UKG"){
									?>
										<td><?php if($sdetails['english']==0){ echo "AB"; }else{ echo $sdetails['english'];} ?></td>
									<?php
								}else{
									?>
										<td><?php if($sdetails['faenglish']==0){ echo "AB"; }else{ echo $sdetails['faenglish']; } ?></td>
										<td><?php if($sdetails['saenglish']==0){ echo "AB"; }else{ echo $sdetails['saenglish']; } ?></td>
										<td><?php echo $sdetails['english']; ?></td>
									<?php
								}
							}else{
								?>
									<td><?php if($sdetails['english']==0){ echo "AB"; }else{ echo $sdetails['english'];}  ?></td> 
								<?php
							}
						?>
						
						
						
						</tr>
						<tr>
						<th><p><?php echo $subject[3]; ?></p></th>
						<?php
							if($exam=="SA1" || $exam=="SA2"){
								if($class=="NURSERY" || $class=="LKG" || $class=="UKG"){
									?>
										<td><?php if($sdetails['maths']==0){ echo "AB"; }else{ echo $sdetails['maths']; } ?></td>
									<?php
								}else{
									?>
										<td><?php if($sdetails['famaths']==0){ echo "AB"; }else{  echo $sdetails['famaths'];} ?></td>
										<td><?php if($sdetails['samaths']==0){ echo "AB"; }else{  echo $sdetails['samaths']; }?></td>
										<td><?php echo $sdetails['maths']; ?></td>
									<?php
								}
							}else{
								?>
									<td><?php if($sdetails['maths']==0){ echo "AB"; }else{ echo $sdetails['maths']; } ?></td> 
								<?php
							}
						?>
						
						
						</tr>
						<tr>
						<th><p><?php echo $subject[4]; ?></p></th>
						<?php
							if($exam=="SA1" || $exam=="SA2"){
								if($class=="NURSERY" || $class=="LKG" || $class=="UKG"){
									?>
										<td><?php if($sdetails['science']==0){ echo "AB"; }else{ echo $sdetails['science']; } ?></td>
									<?php
								}else{
									?>
										<td><?php if($sdetails['fascience']==0){ echo "AB"; }else{ echo $sdetails['fascience']; } ?></td>
										<td><?php if($sdetails['sascience']==0){ echo "AB"; }else{ echo $sdetails['sascience']; } ?></td>
										<td><?php echo $sdetails['science']; ?></td>
									<?php
								}
							}else{
								?>
									<td><?php if($sdetails['science']==0){ echo "AB"; }else{ echo $sdetails['science']; } ?></td> 
								<?php
							}
						?>
						
						
						</tr>
						<tr>
						<th><p><?php echo $subject[5]; ?></p></th>
						<?php
							if($exam=="SA1" || $exam=="SA2"){
								if($class=="NURSERY" || $class=="LKG" || $class=="UKG"){
									?>
										<td><?php if($sdetails['social']==0){ echo "AB"; }else{ echo $sdetails['social']; } ?></td>
									<?php
								}else{
									?>
										<td><?php if($sdetails['fasocial']==0){ echo "AB"; }else{ echo $sdetails['fasocial']; } ?></td>
										<td><?php if($sdetails['sasocial']==0){ echo "AB"; }else{ echo $sdetails['sasocial']; } ?></td>
										<td><?php echo $sdetails['social']; ?></td>
									<?php
								}
							}else{
								?>
									<td><?php if($sdetails['social']==0){ echo "AB"; }else{ echo $sdetails['social']; } ?></td> 
								<?php
							}
						?>
						
						
						</tr>
						<tr>
						<th><p>Total</p></th>
						<?php
							if($exam=="SA1" || $exam=="SA2"){
								if($class=="NURSERY" || $class=="LKG" || $class=="UKG"){
									?>
										<td style="font-weight:bold; padding:8px;"><?php echo $sdetails['totalmarks']; ?></td>
									<?php
								}else{
									?>
										<td style="font-weight:bold; padding:8px;"><?php echo $sdetails['fatotalmarks']; ?></td>
										<td style="font-weight:bold; padding:8px;"><?php echo $sdetails['satotalmarks']; ?></td>
										<td style="font-weight:bold; padding:8px;"><?php echo $sdetails['totalmarks']; ?></td>
										
									<?php
								}
							}else{
								?>
									<td style="font-weight:bold; padding:8px;"><?php echo $sdetails['totalmarks']; ?></td> 
								<?php
							}
						?>
						
						
						
						</tr>
						
					</table>
					<br>
						</div>
						<div class="flex-item">
							<table class="attend"  >
						<tr style="background-color:lightgrey;">
							<th colspan="6">Attendance Particulars</th>
							
							
						</tr>
						<tr style="background-color:lightgrey;">
							<th>Month</th>
							<?php
								if($exam=="SA1" || $exam=="SA2"){
									?>
									<td><?php echo $month1;?></td>
									<td><?php echo $month2;?></td>
									<td><?php echo $month3;?></td>
									<td><?php echo $month4;?></td>
									<td><?php echo $month5;?></td>
									<?php
								}else{
									?>
									<td><?php echo $month1;?></td>
									<?php
								}
							?>
							
						</tr>
						<tr>
							<th>Working Days </th>
							<?php
								if($exam=="SA1" || $exam=="SA2"){
									?>
									<td><?php if($exam=="SA1") echo $jun; else echo $feb;?></td>
									<td><?php if($exam=="SA1") echo $jul; else echo $mar;?></td>
									<td><?php if($exam=="SA1") echo $aug; else echo $apr;?></td>
									<td><?php if($exam=="SA1") echo $sep; else echo $apr;?></td>
									<td><?php if($exam=="SA1") echo $oct; else echo $apr;?></td>
									<?php
								}else{
									?>
									<td><?php if($exam=="FA1") echo $sep; else echo $dec;?></td>
									<?php
								}
							?>
						</tr>
						<tr>
							<th>Days Attended</th>
							<?php
								if($exam=="SA1" || $exam=="SA2"){
									?>
									<td><?php echo $sdetails['sjun'];?></td>
									<td><?php echo $sdetails['sjul'];?></td>
									<td><?php echo $sdetails['saug'];?></td>
									<td><?php echo $sdetails['ssep'];?></td>
									<td><?php echo $sdetails['soct'];?></td>
									<?php
								}else{
									?>
									<td><?php echo $sdetails['ssep'];?></td>
									<?php
								}
							?>
							
						</tr>
					</table>
					<table class="grade">
						<tr style="background-color:lightgrey;">
							<th>Overall Grade</td>
							
							
						</tr>
								<tr>
							
									<td><?php echo $sdetails['grade'];?></td>
						
								</tr>
							</table>
						</div>
					</div>
					
					
						
				
					
					<div style="text-align:center; margin-top:10px">
						<span class="wishes"></span>
					</div>
					
					
					<img src="../images/psign.png" style="margin-top:20px; margin-right:40px; float:right; height:40px; width:60px; transform:rotate(-5deg);"/>
					<div class="sign">
						<span style="float:left;">Parent Sign</span>				
						<span style="text-align:center; ">Teacher Sign </span>
						<span style="float:right;" class="ps">Principal Sign </span>
					</div>
				</div>
				<?php
			}
			?>
			<input type="submit"  class="buttonall" onclick="printDivall('printall')" value="printAll" style="text-align:center; float:left;"/>
		</div>
	</div>
	<?php
	}
}
?>
<?php
		if(isset($_POST['print'])){
			$id=$_POST['id'];
			echo "<script>document.body.style.overflow='hidden';</script>";
		
				?>
<!--Report Card View-->		
			<div class="popup">
			<div class="popup-content" id="print">
			<img class="close" src="../images/close.png" onclick="document.querySelector('.popup').style.display='none'; document.body.style.overflow='visible';">
			<div class="detail">
						
				<div id="myDIV">
					<!--<img class="pop_img" src="logo.png">-->
					<h4>VISHAVAI VIDYANIKETAN HIGH SCHOOL<br><nav class="normal1"><span class="reg">(Recognised by Govt. of T.S.)</span><br>Rajiv Gandhi Nagar, Kukatpally, Medchal Dist.-37</nav></h4>
					<?php 
					$sdetails=details($id); 
					?>
					<h2 ><?php echo "PROGRESS REPORT&nbsp&nbsp".$year ; ?></h2>	
					<h3 class="h">
						<table>
						<tr>
							<th style="width:150px"> STUDENT NAME</th>
							<td style="width:350px"><?php echo $sdetails['name']; ?></td>
							<th style="width:150px">CLASS</th>
							<td><?php if($class=='NURSERY' || $class=='LKG' || $class=='UKG'){ echo $class; }else{ echo $classes[$class]; } ?></td>
							
						</tr>
						
						<tr>
							
							<th style="width:150px">FATHER NAME</th>
							<td><?php echo $sdetails['father']; ?></td>
							<th style="width:150px">DATE OF BIRTH  </th>
							<td><?php echo date('d-m-Y',strtotime($sdetails['dob'])); ?></td>
							</tr>
						<tr>
							<?php 
							if(!($class=='NURSERY' || $class=='LKG' || $class=='UKG')){
								?>
								<th style="width:150px">ADMISSION NO</th>
								<td><?php echo  $id; ?></td>
								<?php
							}
							?>
						</tr>	
					</table>
					</h3>
					<div class="container">
						<div class="fixed">
							<table class="subjects">
						<tr style="background-color:lightgrey;">
						<th style="padding:10px 30px 10px 30px;">Subject</th>
						<?php
							if($exam=="SA1" || $exam=="SA2"){
								if($class=="NURSERY" || $class=="LKG" || $class=="UKG"){
									?>
										<th style="padding:10px;"> <?php echo $exam."(".$saoutof.")"; ?></th> 
									<?php
								}else{
									?>
										<th style="padding:10px;"><?php echo $pexam."(".$faoutof.")"; ?></th> 
										<th style="padding:10px;"><?php echo $exam."(".$saoutof.")"; ?></th> 
										<th style="padding:10px;">Total(<?php echo 100; ?>)</th> 
									<?php
								}
							}else{
								?>
									<th style="padding:10px;">Marks (<?php echo $faoutof; ?>)</th> 
								<?php
							}
						?>
						
						
						
						
						</tr>
						<tr>
						<th><p><?php echo $subject[0]; ?></p></th>
						
						<?php
							if($exam=="SA1" || $exam=="SA2"){
								if($class=="NURSERY" || $class=="LKG" || $class=="UKG"){
									?>
										<td><?php if($sdetails['telugu']==0){echo "AB";}else{ echo $sdetails['telugu']; }?></td>
									<?php
								}else{
									?>
										<td><?php if($sdetails['fatelugu']==0){echo "AB";}else{echo $sdetails['fatelugu']; }?></td>
										<td><?php if($sdetails['satelugu']==0){echo "AB";}else{echo $sdetails['satelugu']; } ?></td>
										<td><?php echo $sdetails['telugu']; ?></td>
									<?php
								}
							}else{
								?>
									<td><?php if($sdetails['telugu']==0){echo "AB";}else{ echo $sdetails['telugu']; } ?></td> 
								<?php
							}
						?>
						
						
						
						</tr>
						<tr>
						<th><p><?php echo $subject[1]; ?></p></th>
					
						<?php
							if($exam=="SA1" || $exam=="SA2"){
								if($class=="NURSERY" || $class=="LKG" || $class=="UKG"){
									?>
										<td><?php if($sdetails['hindi']==0){ echo "AB"; }else{ echo $sdetails['hindi']; }?></td>
									<?php
								}else{
									?>
										<td><?php if($sdetails['fahindi']==0){ echo "AB"; }else{ echo $sdetails['fahindi']; } ?></td>
										<td><?php if($sdetails['sahindi']==0){ echo "AB"; }else{ echo $sdetails['sahindi']; } ?></td>
										<td><?php echo $sdetails['hindi']; ?></td>
									<?php
								}
							}else{
								?>
									<td><?php if($sdetails['hindi']==0){ echo "AB"; }else{ echo $sdetails['hindi']; } ?></td> 
								<?php
							}
						?>
					
					
						</tr>
						<tr>
						<th><p><?php echo $subject[2]; ?></p></th>
						<?php
							if($exam=="SA1" || $exam=="SA2"){
								if($class=="NURSERY" || $class=="LKG" || $class=="UKG"){
									?>
										<td><?php if($sdetails['english']==0){ echo "AB"; }else{ echo $sdetails['english'];} ?></td>
									<?php
								}else{
									?>
										<td><?php if($sdetails['faenglish']==0){ echo "AB"; }else{ echo $sdetails['faenglish']; } ?></td>
										<td><?php if($sdetails['saenglish']==0){ echo "AB"; }else{ echo $sdetails['saenglish']; } ?></td>
										<td><?php echo $sdetails['english']; ?></td>
									<?php
								}
							}else{
								?>
									<td><?php if($sdetails['english']==0){ echo "AB"; }else{ echo $sdetails['english'];}  ?></td> 
								<?php
							}
						?>
						
						
						
						</tr>
						<tr>
						<th><p><?php echo $subject[3]; ?></p></th>
						<?php
							if($exam=="SA1" || $exam=="SA2"){
								if($class=="NURSERY" || $class=="LKG" || $class=="UKG"){
									?>
										<td><?php if($sdetails['maths']==0){ echo "AB"; }else{ echo $sdetails['maths']; } ?></td>
									<?php
								}else{
									?>
										<td><?php if($sdetails['famaths']==0){ echo "AB"; }else{  echo $sdetails['famaths'];} ?></td>
										<td><?php if($sdetails['samaths']==0){ echo "AB"; }else{  echo $sdetails['samaths']; }?></td>
										<td><?php echo $sdetails['maths']; ?></td>
									<?php
								}
							}else{
								?>
									<td><?php if($sdetails['maths']==0){ echo "AB"; }else{ echo $sdetails['maths']; } ?></td> 
								<?php
							}
						?>
						
						
						</tr>
						<tr>
						<th><p><?php echo $subject[4]; ?></p></th>
						<?php
							if($exam=="SA1" || $exam=="SA2"){
								if($class=="NURSERY" || $class=="LKG" || $class=="UKG"){
									?>
										<td><?php if($sdetails['science']==0){ echo "AB"; }else{ echo $sdetails['science']; } ?></td>
									<?php
								}else{
									?>
										<td><?php if($sdetails['fascience']==0){ echo "AB"; }else{ echo $sdetails['fascience']; } ?></td>
										<td><?php if($sdetails['sascience']==0){ echo "AB"; }else{ echo $sdetails['sascience']; } ?></td>
										<td><?php echo $sdetails['science']; ?></td>
									<?php
								}
							}else{
								?>
									<td><?php if($sdetails['science']==0){ echo "AB"; }else{ echo $sdetails['science']; } ?></td> 
								<?php
							}
						?>
						
						
						</tr>
						<tr>
						<th><p><?php echo $subject[5]; ?></p></th>
						<?php
							if($exam=="SA1" || $exam=="SA2"){
								if($class=="NURSERY" || $class=="LKG" || $class=="UKG"){
									?>
										<td><?php if($sdetails['social']==0){ echo "AB"; }else{ echo $sdetails['social']; } ?></td>
									<?php
								}else{
									?>
										<td><?php if($sdetails['fasocial']==0){ echo "AB"; }else{ echo $sdetails['fasocial']; } ?></td>
										<td><?php if($sdetails['sasocial']==0){ echo "AB"; }else{ echo $sdetails['sasocial']; } ?></td>
										<td><?php echo $sdetails['social']; ?></td>
									<?php
								}
							}else{
								?>
									<td><?php if($sdetails['social']==0){ echo "AB"; }else{ echo $sdetails['social']; } ?></td> 
								<?php
							}
						?>
						
						
						</tr>
						<tr>
						<th><p>Total</p></th>
						<?php
							if($exam=="SA1" || $exam=="SA2"){
								if($class=="NURSERY" || $class=="LKG" || $class=="UKG"){
									?>
										<td style="font-weight:bold; padding:8px;"><?php echo $sdetails['totalmarks']; ?></td>
									<?php
								}else{
									?>
										<td style="font-weight:bold; padding:8px;"><?php echo $sdetails['fatotalmarks']; ?></td>
										<td style="font-weight:bold; padding:8px;"><?php echo $sdetails['satotalmarks']; ?></td>
										<td style="font-weight:bold; padding:8px;"><?php echo $sdetails['totalmarks']; ?></td>
										
									<?php
								}
							}else{
								?>
									<td style="font-weight:bold; padding:8px;"><?php echo $sdetails['totalmarks']; ?></td> 
								<?php
							}
						?>
						
						
						
						</tr>
						
					</table>
					<br>
						</div>
						<div class="flex-item">
							<table class="attend"  >
						<tr style="background-color:lightgrey;">
							<th colspan="6">Attendance Particulars</th>
							
							
						</tr>
						<tr style="background-color:lightgrey;">
							<th>Month</th>
							<?php
								if($exam=="SA1" || $exam=="SA2"){
									?>
									<td><?php echo $month1;?></td>
									<td><?php echo $month2;?></td>
									<td><?php echo $month3;?></td>
									<td><?php echo $month4;?></td>
									<td><?php echo $month5;?></td>
									<?php
								}else{
									?>
									<td><?php echo $month1;?></td>
									<?php
								}
							?>
							
						</tr>
						<tr>
							<th>Working Days </th>
							<?php
								if($exam=="SA1" || $exam=="SA2"){
									?>
									<td><?php if($exam=="SA1") echo $jun; else echo $feb;?></td>
									<td><?php if($exam=="SA1") echo $jul; else echo $mar;?></td>
									<td><?php if($exam=="SA1") echo $aug; else echo $apr;?></td>
									<td><?php if($exam=="SA1") echo $sep; else echo $apr;?></td>
									<td><?php if($exam=="SA1") echo $oct; else echo $apr;?></td>
									<?php
								}else{
									?>
									<td><?php if($exam=="FA1") echo $sep; else echo $dec;?></td>
									<?php
								}
							?>
						</tr>
						<tr>
							<th>Days Attended</th>
							<?php
								if($exam=="SA1" || $exam=="SA2"){
									?>
									<td><?php echo $sdetails['sjun'];?></td>
									<td><?php echo $sdetails['sjul'];?></td>
									<td><?php echo $sdetails['saug'];?></td>
									<td><?php echo $sdetails['ssep'];?></td>
									<td><?php echo $sdetails['soct'];?></td>
									<?php
								}else{
									?>
									<td><?php echo $sdetails['ssep'];?></td>
									<?php
								}
							?>
							
						</tr>
					</table>
					<table class="grade">
						<tr style="background-color:lightgrey;">
							<th>Overall Grade</td>
							
							
						</tr>
								<tr>
							
									<td><?php echo $sdetails['grade'];?></td>
						
								</tr>
							</table>
						</div>
					</div>
					
					
						
				
					
					<div style="text-align:center; margin-top:10px">
						<span class="wishes"></span>
					</div>
					
					
					<img src="../images/psign.png" style="margin-top:20px; margin-right:40px; float:right; height:40px; width:60px; transform:rotate(-5deg);"/>
					<div class="sign">
						<span style="float:left;">Parent Sign</span>				
						<span style="text-align:center; ">Teacher Sign </span>
						<span style="float:right;" class="ps">Principal Sign </span>
					</div>
					
					<input type="button" class="square_btn" onclick="printDiv('print')" value="print" style="margin-top:-50px"/>
				</div>
						
									
			</div>
				
			</div>
				
			</div>
<!--End of Report Card View-->	

	
		<?php
		
	}
	
?>
  </body>
<!--End of Body-->


<!--javascript-->
  
  <!--Javascript-->
<script>
	
	
	function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}	
	function printDivall(divName) {
		 
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}	
</script>	
</html>

