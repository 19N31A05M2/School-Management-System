<?php
session_start(); 
ob_start();
$conn=mysqli_connect("localhost","root","","studentinfo");
?>
<html lang="en">
<!--head-->
	<head>
		<meta charset="utf-8">
		<title>Sidebar Dashboard Template</title>
		<link rel="stylesheet" href="studentdetail.css">
		<link rel="stylesheet" href="../fontawesome-free-5.15.2-web/css/all.css">


	</head>
<!--End Of head-->

<!--body-->	
	<body>

		<input type="checkbox" id="check"  onclick="move();">

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
			
		</nav>	
				
		
		</div>
<!--sidebar end-->
	
<!--maincontent-->	
		<div class="content" id="main">
			<div class="location"><h4>Student Details >> Details</h4></div><!--Location-->
			<div class="main">
<!--Search By-->	
				<div style="text-align:center; margin-bottom:0px;">
					<label >Search By:</label>
					<select name="status" id="selector" style="width:200px; font-size:16px;" onchange="toggleshared();" required >
					<option value="Admission">Admission No</option>
					<option value="Name" >Name</option>	
					
					</select>
				</div>	
				<form method="post" id="id" style="text-align:center;">
					<label >Admission No</label>
					<input type="text" name="admnno" onkeypress="isInputNumber(event)" required />
					<input type="submit" value="Search" class="but" name="submit1" required />
				</form>
				<form method="post" id="name" style="text-align:center;">
					<label >Name:</label>
					<input type="text" name="name" required />
					<input type="submit" value="Search" class="but" name="submit2"/>
				</form>	
				<?php
				$m=0;
				$image=" ";
				$id="";
				$name="";
				$name1="";
				$dateofbirth="";
				$gender="";	
				$father_name="";
				$class="";
				$Mobile_Number="";
				$year=" ";
				$iderror=0;
				$nerror=0;
				if(isset($_POST['submit1'])){
					$id=$_POST['admnno'];
					$query=mysqli_query($conn,"select * from studentinformation where id='$id'");
					$count=mysqli_num_rows($query);
					
					if($count==1)
					{
						$sql = "SELECT * FROM studentinformation where id='$id'";
						if($conn -> query($sql)){
							$m=1;
						}
					}else{
						$iderror=1;
					}
				}
				if(isset($_POST['submit2'])){
					$name=$_POST['name'];
					$query=mysqli_query($conn,"select * from studentinformation where name like'%$name%'");
					$count=mysqli_num_rows($query);
					
					if($count>1)
					{
						?>
						<table width="400px" class="names" style="border:5px solid black; border-collapse:collapse; margin-top:20px; margin-left:auto; margin-right:auto; margin-bottom:20px; text-align:center; padding:0px;">
						<tr style="background-color:darkslateblue; color:white;" >
							<th> Admission No </th>
							<th>Name </th>
							<th>Father Name </th>
							<th>Class </th>
							<th>SELECT</th>
						</tr>
						<?php
						while ($row=mysqli_fetch_array($query)) 
						{
// Selection From two Or More Students							
							?>
								<tr class="sides">
								<td style="padding:0px;"> <?php echo $ad=$row['id'];?> </td>
								<td style="padding:0px;"> <?php echo $row['name'];?> </td>
								
								<td style="padding:0px;"> <?php echo $row['fathername'];?> </td>
								<td style="padding:0px;"> <?php echo $row['class'];?> </td>
								<td><form method="POST"> <input type="hidden" name="adno" value="<?php echo $ad; ?> "/><input type="submit" class="but" name="select" value="select"/></form></td>
								</tr>
						
							<?php
						}
						?>
						</table>
						<?php
					}
					else if($count==1){
//fetching details by name						
						$sql = "SELECT * FROM studentinformation where name like '%$name%'";
						$query=mysqli_query($conn,$sql);
						While($row=mysqli_fetch_array($query))
						{
								
							$image=$row['image'];
							$id=$row['id'];;
							$name1=$row['name'];
							$dateofbirth=date('d-m-Y',strtotime($row['dateofbirth']));
							$gender=$row['gender'];	
							$father_name=$row['fathername'];
							$class=$row['class'];
							$Mobile_Number=$row['phone'];
							$year1=$row['year'];
							$year2=$row['year']+1;
							$year=$year1."-".$year2;
							$m=1;
							
							
						}
					}else{
						
//Student Name not Found error						
						$nerror=1;
					}
					
				}
				if(isset($_POST['select'])){
					$id=$_POST['adno'];
					$sql = "SELECT * FROM studentinformation where id='$id'";
					$query=mysqli_query($conn,$sql);
					While($row=mysqli_fetch_array($query))
					{
							
						$image=$row['image'];
						$id=$row['id'];;
						$name1=$row['name'];
						$dateofbirth=date('d-m-Y',strtotime($row['dateofbirth']));
						$gender=$row['gender'];	
						$father_name=$row['fathername'];
						$class=$row['class'];
						$Mobile_Number=$row['phone'];
						$year1=$row['year'];
						$year2=$row['year']+1;
						$year=$year1."-".$year2;
						$m=1;
						
						
					}
				}
				$paiddate=0;
				$paidamount=0;
				$totalpaid=0;
				$monthfee=0;
				$totaldue=0;
				$lastdue=0;
				$totalfee=0;
				$a=0;
				if($m==1)
				{
					$query=mysqli_query($conn,$sql);
					While($row=mysqli_fetch_array($query))
					{
							
						$image=$row['image'];
						$id=$row['id'];;
						$name1=$row['name'];
						$dateofbirth=date('d-m-Y',strtotime($row['dateofbirth']));
						$gender=$row['gender'];	
						$father_name=$row['fathername'];
						$class=$row['class'];
						$Mobile_Number=$row['phone'];
						$year1=$row['year'];
						$year2=$row['year']+1;
						$year=$year1."-".$year2;
						
					}
					
						
				}
					
					$classes=array("NURSERY","LKG","UKG",1,2,3,4,5,6,7,8,9,10);
					$c=$class;
					$b=0;
					while($b<=12)
					{
						if($classes[$b]==$c){
							break;
						}
						$b++;			
					}
					if($b==0){
						$pclass="Nursery";
					}else{
						$pclass=$classes[$b-1]; //pervious class
					}
					
//pervious class due					
					$sql = "SELECT * FROM studentfees where id='$id' And class='$pclass'";
					$query=mysqli_query($conn,$sql);
					While($row=mysqli_fetch_array($query))
					{
							
						$lastdue=$row['totalfee'];
						
					}
					
//details from previous fee					
					$sql = "SELECT * FROM studentfees where id='$id' And class='$class'";
					$query=mysqli_query($conn,$sql);
					While($row=mysqli_fetch_array($query))
					{
						$paiddate=$row['paiddate'];
						$paidamount=$row['feepaid'];
						$totalpaid=$totalpaid+$paidamount;
						$totaldue=$row['totalfee'];
							
					}
					$months=array("June","July","August","September","October","November","December","January","February","March","April","May");
					$d=date('F');
					
					while($a<=12)
					{
						if($months[$a]==$d){
							$a++;
							break;
						}
						$a++;			
					}
					$sql = "SELECT * FROM feestructure where class='$class'";
					$query=mysqli_query($conn,$sql);
					While($row=mysqli_fetch_array($query))
					{
						$monthfee=$row['fee'];
						$totalfee=$row['fee']*12; 
							
					}
					
					
					
						
				
				$monthdue=($monthfee*$a)-$totalpaid;
				$totaldue=$totalfee-$totalpaid;
				?>
<!--showing Details Of Student-->				
				<div class="detail">
					
					<div id="myDIV">
						<img class="pop_img" src="../images/logo.png">
						<h1 style="margin-top:30px">VISHAVAI VIDYANIKETAN<br><span class="school">HIGH SCHOOL</span></h1>
						<img src="<?php echo $image; ?>" width="140px" height="140px" style="float:right; margin-right:20px; margin-top:-10px;" class="photo"/>
						<h3 class="h">
						<table class="details">
							<tr>
							<td>CLASS:</td><th style="text-align:left;"><?php echo $class;?></th>
							<td>ADMISSION NO:</td><th style="text-align:left;"><?php echo $id;?> </th>
							</tr>
							<tr>
							<td>STUDENT NAME:</td><th style="text-align:left;"><?php echo $name1;?></th>
							<td></td><th></th>
							</tr>
							<tr>
							<td>FATHER NAME:</td><th style="text-align:left;"><?php echo $father_name;?> </th>
							<td>DATE OF BIRTH:</td><th style="text-align:left;"><?php echo $dateofbirth;?> </th>
							</tr>
							<tr>
							<td>PHONE:</td><th style="text-align:left;"><?php echo $Mobile_Number;?> </th>
							<td>ACADEMIC YEAR:</td><th style="text-align:left;"><?php echo $year?></th>
							</tr>
						</table>	
						</h3>
						<table style="width:60%" class="feedetails">
							<tr>
							<th colspan="2">Last Fee Paid Date</th>
							<th>Amount</th> 
							
							</tr>
							<tr>
							<td colspan="2" style="padding:0; font-weight:bold;"><?php echo $paiddate; ?></td>
							<td style="text-align:center"><?php echo $paidamount; ?></td>
							</tr>
						</table><br>
						<table style="width:60%" class="feedetails">
							<tr>
							<th colspan="1" style="padding-right:60px; padding-left:20px;">Fee Due</th>
							<th>Amount</th> 
							
							</tr>
							<tr>
							<td colspan="1" style="padding:0; font-weight:bold;">Fee Due Upto Current Month</td>
							<td style="text-align:center"><?php echo $monthdue; ?></td>
							</tr>
						</table><br>
						<?php 
						if($lastdue!=0){
							?>
							<span class="balance" style="padding:0; font-weight:bold;">Last Due:<?php echo $lastdue; ?></span>
							<?php
						}
						?>
						<span class="balance" style="padding:0; font-weight:bold;">Total Due:<?php echo $totaldue+$lastdue; ?></span><br>
						<form method="POST"><input type='hidden' name='id' value='<?php echo $id; ?>' required />
						<input type='hidden' name='class' value='<?php echo $class; ?>' required />
						<input type='hidden' name='name' value='<?php echo $name; ?>'required />
						<input type='hidden' name='text' value='<?php echo $image; ?>'required />
						<input type="submit" value="View Progress" href="#" class='but' name="progress" style="margin-left:48%"/>
						</form>
					</div>
					
								
				</div>
<!-- End of Details-->
				
			</div>
		</div>
<!--End of Main Content-->
		
		<?php
					if(isset($_POST['progress']))
					{
						$id=$_POST['id'];
						$class=$_POST['class'];
						$name=$_POST['name'];
						$image=$_POST['text'];
						header('studentdetail.php?result=success');
						?>
<!-- marks Details-->						
						<script>document.body.style.overflow="hidden";</script>
						<div class="popup1">
							<div class="popup-content1">
								<img class="close" src="../images/close.png" onclick="window.location='studentdetail.php'">
								<img class="pop_img" src="../images/schoollogo.png">
								<h1 style="margin-top:0px">VISHAVAI VIDYANIKETAN<br><span class="school">HIGH SCHOOL</span></h1>
								<img src="<?php echo $image; ?>" width="140px" height="140px" style="float:right; margin-right:20px; margin-top:-10px;" class="photo"/>
								<h3 class="h">
									<table  width="80%" class="details">
										<tr>
										<td style="text-align:right;">CLASS:</td><th style="text-align:left;"><?php echo $class;?></th>
										<td style="text-align:right;">ADMISSION NO:</td><th style="text-align:left;"><?php echo $id;?> </th>
										</tr>
										<tr>
										<td style="text-align:right;">STUDENT NAME:</td><th style="text-align:left;"><?php echo $name;?></th>
										<td></td><th></th>
										</tr>
									</table>	
								</h3>
								<table class="studystatus">
									<tr>
										<th>Admission NO</th>
										<th>Name</th>
										<th>Class</th>
										<th>Exam</th>
										<th>Telugu</th>
										<th>Hindi</th>
										<th>English</th>
										<th>Maths</th>
										<th>Science</th>
										<th>Social</th>
										<th>Total</th>
										<th>Out of</th>
										<th>GPA</th>
										<th>Attendance percentage</th>
										
									</tr>
									<?php
														
									$sql = "SELECT * FROM marks where class='$class' And id='$id'";
									$query=mysqli_query($conn,$sql);
									While($row=mysqli_fetch_array($query))
									{
											?>
											<tr>
											<td><?php echo $id=$row['id'];?> </td>				
											<td><?php echo $row['name'] ?> </td>
											<td><?php echo $row['class'] ?> </td>
											<td><?php echo $exam=$row['exam']; ?> </td>
											<td><?php echo  $row['telugu']?> </td>
											<td><?php echo  $row['hindi'];?> </td>
											<td><?php echo  $row['english'];?> </td>
											<td><?php echo  $row['maths'];?> </td>
											<td><?php echo  $row['science'];?> </td>
											<td><?php echo  $row['social'];?> </td>
											<td><?php echo  $row['totalmarks'];?> </th>
											<td>
											<?php
											if($exam=="Summative 1" || $exam=="Summative 2"){
												echo "600";
											}else{
												echo "150";
											}
											
											?>
											</td>
											<td><?php echo  $row['cgpa'];?> </td>
											<td><?php echo  $row['attendance'].'%';?> </td>
											
											
											</tr>
											<?php	  											
										
									}
									
									?>
								</table>
							</div>
						</div>	
<!--End of marks Details-->						
						<?php
					}
				?>

<!--Login form-->				
		<div class="popup">
			<div class="popup-content">
			<img  class="user" src="../images/login.png">
					<img class="close1" src="../images/close.png">
					<br><span class="incorrect">*incorrect username or password</span> 
					<form method="POST">
					<input type="text" name="username" autofocus placeholder="username" value="<?php if(isset($_POST['login'])) echo $_POST['username']; ?>">
					<input type="password" name="password" placeholder="password" value="<?php if(isset($_POST['login'])) echo $_POST['password']; ?>">
					<button type="submit"  class="myButton" value="login" name="login">login</button>
					</form>
						
			</div>
		</div>
	
<!--End of Login Form-->		
<?php
	if(isset($_POST['login'])){
		$username=strtolower($_POST['username']);
		$password=$_POST['password'];
		$value=0;
//checking login credientials
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
			document.querySelector(".popup").style.display="flex";
			document.querySelector(".incorrect").style.display="flex";
			</script>
			<?php
		}
	}
	
?>		
	
</body>
<!--End of Body-->
<?php
if($iderror==1){
		?> 
			<div id="popup2">
			<div class="alert">
			<span class="closebtn" onclick="window.location.href='studentdetail.php';">&times;</span>  
			<strong>Error!</strong>Entered admission_no:<?php echo $_POST['admnno']; ?> Details Not Found.
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
	if($nerror==1){
		?>
						
			<script>document.body.style.overflow='hidden';</script>
			<div id="popup2">
			<div class="alert">
			<span class="closebtn" onclick="window.location.href='studentdetail.php';" >&times;</span>  
			<strong>Error!</strong>Entered Name:<?php echo $_POST['name']; ?> Details Not Found.
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
?>
<!--javascript-->	
  <script>
	function isInputNumber(evt){
                
        var ch = String.fromCharCode(evt.which);
        
        if(!(/[0-9]/.test(ch))){
            evt.preventDefault();
        }
        
    }
  document.getElementById("clicked").addEventListener("click",function(){
		document.querySelector(".popup").style.display="flex";
		document.body.style.overflow="hidden";
		
	})
	document.querySelector(".close1").addEventListener("click",function(){
		document.querySelector(".popup").style.display="none";
		document.body.style.overflow="visible";
	})
	function toggleshared(){
        var ddlPassport = document.getElementById("selector");
        var dvPassport = document.getElementById("id");
		var dem =document.getElementById("name");
        if(ddlPassport.value == "Admission" ){
			dvPassport.style.display= "block";
			dem.style.display = "none";
		}
		else{
			dem.style.display = "block";
			dvPassport.style.display= "none";
		}
    }

		

	document.getElementById('main').addEventListener('click', closeNav);
	function closeNav() {
		
		document.getElementById("check").checked = false;
  
	}		
  </script>
</html>
