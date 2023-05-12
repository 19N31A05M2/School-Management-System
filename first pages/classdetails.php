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
		<link rel="stylesheet" href="Classstyle.css">
		<link rel="stylesheet" href="../fontawesome-free-5.15.2-web/css/all.css">


	</head>

<!--head-->	
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

<!--Main Content-->
		<?php $strength=0; ?>
		<div class="content" id="main" >
			<div class="location"><h4>Student Details >> Class Details</h4></div><!--Location-->
<!--class wise-->
			<div class="main">
					<h1 style="text-align:center; color:darkslateblue; text-decoration:underline;">Class Wise Details</h1>
				<form method="post" style="margin-top:60px;">
					<label style="font-weight:bold"> Class:</label>
					<select name="class" id="selector"  required>
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
					<input type="submit" id="submit" value="search" name="submit" class='but' >
				</form>
				<span style="text-align:right;  font-weight:bold; color:darkslateblue; "> &nbsp &nbsp &nbsp STRENGTH: </span><span><?php  if(isset($_POST['submit'])){ $class=$_POST['class']; $sql="SELECT * FROM Studentinformation where class='$class'";

	if ($result=mysqli_query($conn,$sql))//getting strength 
  {
  // Return the number of rows in result set
  echo $strength=mysqli_num_rows($result);
  }
				} 
				?> </span>
				
<!-- Class Wise Details-->				
				<div class="detail">
					
					<div id="myDIV">
					<?php
					date("Y/m/d");
					$months=array("June","July","August","September","October","November","December","January","February","March","April","May");
					$d=date('F');
					$a=0;
					while($a<=12)
					{
						if($months[$a]==$d){
							break;
						}
						$a++;			
					}
					if(isset($_POST['submit'])){
						
						?>	
						
							<div id="myDIV">
							<h1 style="text-align:center">CLASS: <?php $class=$_POST['class']; echo $class; ?> </h1>
							<table id="hide" align="center" >
								<tr>
								<th>CLASS</th>
								<th>ADMISSION NO</th>
								<th> NAME</th>
								<th>FATHER NAME</th>
								<th>DATE OF BIRTH</th>
								<th>PHONE</th>
								<th>MONTH DUE</th>
								<th>FEE DUE</t>
								</tr>
								
								<?php
//fetching class wise details							
								$sql = "SELECT * FROM studentinformation where class='$class'";
								$query=mysqli_query($conn,$sql);
								While($row=mysqli_fetch_array($query))
								{
									?>
										<tr>
										<td> <?php echo $class=$row['class'];?> </td>
										<td> <?php echo $id=$row['id'];?> </td>
										<td> <?php echo $row['name'];?> </td>
										<td> <?php echo $row['fathername'];?> </td> 
										<td> <?php echo date('d-m-Y',strtotime($row['dateofbirth']));?> </td>
										<td> <?php echo $row['phone'];?> </td>
										<?php
										$val=0;
										$lastdue=0;
										
										$query1=mysqli_query($conn,"select * from feestructure where class='$class'");//fee details
										While($row=mysqli_fetch_array($query1))
										{
											$monthfee=$row['fee'];
											$totalfee=$row['fee']*12;
										}
										$monthfee=$monthfee*($a+1);
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
											$pclass=$classes[$b-1];
										}
//pervious class fee										
										$query3=mysqli_query($conn,"SELECT * FROM studentfees where id='$id' And class='$pclass'");
										While($row=mysqli_fetch_array($query3))
										{
											$lastdue=$row['totalfee'];
											
										}
//details from previous paid fee										
										$query2=mysqli_query($conn,"select * from studentfees where class='$class' ");
										$totalPaid=0;
										While($row=mysqli_fetch_array($query2))
										{
											if($row['id']== $id && $row['class']==$class){
												$class=$row['class'];
												$name=$row['name'];       
												$paiddate=$row['paiddate'];
												$paidamount=$row['feepaid'];
												$totalPaid=$totalPaid+$paidamount;
												$clrdate=$row['clearedmonth'];
												$monthlydue=$row['monthdue'];
												$totalfee=$row['totalfee']; 
												$val=1;	
											}
										}
										if($val==1){
											$monthfee=$monthfee-$totalPaid;
											if($lastdue!=0){
												$monthfee=$monthfee+$lastdue;
												$totalfee=$totalfee+$lastdue;
											}
										}else{
											$monthfee=$monthfee+$lastdue;
											$totalfee=$totalfee+$lastdue;
										}
										?>
										<td><?php echo $monthfee; ?></td>
										<td><?php echo $totalfee; ?></td>
										</tr>
										
									<?php
								}	
					
							?>
						</table>
						</div>
							<input type="button" value="close" class="square_btn"  onclick="window.location='classdetails.php'">
							<input type="submit" value="print" class="square_btn" onclick="printDiv('myDIV')" />
						<?php
												
					}
					?>	
					</div>
					
								
				</div>
<!--End of class wise Details-->				
			</div>
		</div>	
<!--End of Main Content-->

<!--Login form-->
 		
		<div class="popup">
			<div class="popup-content">
			<img  class="user" src="../images/login.png">
					<img class="close" src="../images/close.png">
					<br><span class="incorrect">*incorrect username or password</span> 
					<form method="POST">
					<input type="text" name="username" autofocus placeholder="username" value="<?php if(isset($_POST['login'])) echo $_POST['username']; ?>">
					<input type="password" name="password" placeholder="password" value="<?php if(isset($_POST['login'])) echo $_POST['password']; ?>">
					<button type="submit"  class="myButton" value="login" name="login">login</button>
					</form>
						
			</div>
		</div>
<!--End Of Login form-->		
<?php
//Checking Login credientials 
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
<!--End of Body-->

<!--javascript-->
<script>

document.getElementById("clicked").addEventListener("click",function(){
		document.querySelector(".popup").style.display="flex";
		document.body.style.overflow="hidden";
	})
	document.querySelector(".close").addEventListener("click",function(){
		document.querySelector(".popup").style.display="none";
		document.body.style.overflow="visible";
	})
function printDiv(myDIV) {
	
		var printContents = document.getElementById(myDIV).innerHTML;
		var originalContents = document.body.innerHTML;
	
		document.body.innerHTML = printContents;
	
		window.print();
	
		document.body.innerHTML = originalContents;
		window.history.back();
	}
	document.getElementById('main').addEventListener('click', closeNav);
	function closeNav() {
		
		document.getElementById("check").checked = false;
  
	}
</script> 
</html>
