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
	<link rel="stylesheet" href="Dropout.css">
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
            <li><a href="students.php"><i class="fas fa-user"></i>Students</a></li>
            <li><a href="collection.php"><i class="fas fa-address-card"></i>Collection</a></li>
            <li style="background:#3e3762;"><a href="dropstudents.php"><i class="fas fa-project-diagram"></i>Left Out</a></li>
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
					<a href="../first pages/home.php " ><i class="fas fa-sign-out-alt"></i></a>
				</li>
			</ul>
		</div>
	</div>
<!--End of Profile Image View-->	

<!--Main Content-->
	<div class="main_content">
		
		<div class="first">
			<a href="leftout.php" class="left">Add_DropOut</a><br>
			<div class="passed">
<!--Left-Out Students Selection-->			
				<h3>LEFT-OUT STUDENTS</h3><br>
				<form method="POST">
					<label>Search By:</label>
					<select name="status">
					<option></option>	
					<option>Passed Out</option>	
					<option >Drop Out</option>
					</select>
					
					<label>Year:</label>
					<select name="year" style="width:70px" >
					<option></option>
					<?php 
						for($i=date('Y');$i>=2000;$i--){
							echo "<option> ".$i." </option>";
						}
					?>
					</select>
					<input type="submit" name="check" value="check"  class="but" >
						
						
				</form>
				<h3 style="margin-top:30px;"><?php if(isset($_POST['check'])){ echo $_POST['year']." ".$_POST['status']; } ?></h3><br>
<!--Left -out Studets List-->	
			<div class='scroll'>
				<table style="border-collapse:collapse;">
					<tr>
					<td>ADMISSION_NO</td>	  
					<td>NAME</td>        
					<td>GENDER</td>      
					<td>FATHER_NAME</td>  
					<td>DATE_OF_BIRTH</td>
					<td>CASTE</td>         
					<td>LEAVING_DATE</td>
					<td>LEAVING_CLASS</td>
					<td>TC ISSUED/NOT</td>
					<td>FEE DUE</td>
					<td>PAY FEE</td>
					</tr>
					<?php
					if(isset($_POST['check'])){
						$select=$_POST['status'];
						$year=$_POST['year'];
						$class=10;
						
						if($select=="Passed Out"){
							$i=0;
							$sql = "SELECT * FROM dropout where leavingclass='$class' And year='$year'";
							$query=mysqli_query($conn,$sql);
							While($row=mysqli_fetch_array($query))
							{
								?>
									<tr class="color">
										<th><?php echo $ad=$row['id'];?> </th>				
										<th><?php echo $row['name']; ?> </th>
										<th><?php echo $row['gender']; ?> </th>
										<th><?php echo $row['fathername']; ?> </th>
										<th><?php echo date('d-m-Y',strtotime($row['dateofbirth'])); ?> </th>
										<th><?php echo $row['caste']; ?> </th>
										<th><?php echo $date=date('d-m-Y',strtotime($row['dateofleaving'])); ?> </th>
										<th><?php echo "Passed"; ?> </th>
										<th><?php echo $tcissued=$row['tcissued']; ?> </th>
										<th><?php echo $fee=$row['feedue']; ?> </th>
										<?php
											if($fee==0 && $tcissued=="YES")
											{
												?>
												<th>cleared</th>
												
												<?php
												echo "<script>var s=document.getElementsByClassName('color');
												s['$i'].style.background='lightgreen';
												</script>";
												
												
											}else{
												?>
												<th>
												<form Method="POST">
												<input type="number_format" name="feedue" placeholder="fee paid amount" onkeypress="isInputNumber(event)" value="<?php echo $fee;?>"> 
												<input type="hidden" name="adno" value="<?php echo $ad;?>">
												<input type="hidden" name="fee" value="<?php echo $fee;?>">
												<input type="hidden" name="class" value="<?php echo "PASSED_OUT"; ?>">
												<input type="hidden" name="date" value="<?php echo date('Y',strtotime($date)); ?>">
												<input type="submit" name="entry" class="but" value="Pay Now" >
												</form>
												</th>
												<?php
											}
										?>
									</tr>	
										
								<?php
								$i++;
							}
						}else{
							$i=0;
							$sql = "SELECT * FROM dropout where leavingclass!='$class'";
							$query=mysqli_query($conn,$sql);
							While($row=mysqli_fetch_array($query))
							{
								if(date('Y',strtotime($row['dateactuallyleft']))==$year){
									?>
									<tr class="color">
										<form Method="POST">
										<th><?php echo $ad=$row['id'];?> </th>				
										<th><?php echo $row['name']; ?> </th>
										<th><?php echo $row['gender']; ?> </th>
										<th><?php echo $row['fathername']; ?> </th>
										<th><?php echo date('d-m-Y',strtotime($row['dateofbirth'])); ?> </th>
										<th><?php echo $row['caste']; ?> </th>
										<th><?php echo $date=date('d-m-Y',strtotime($row['dateofleaving'])); ?> </th>
										<th><?php echo $row['leavingclass']; ?> </th>
										<th><?php echo $tcissued=$row['tcissued']; if($tcissued=="NO"){ echo "<br><input type='checkbox' value='YES' name='tcissued'/> Issue"; }?> </th>
										<th><?php echo $fee=$row['feedue']; ?> </th>
										<?php
											if($fee==0 && $tcissued=="YES")
											{
												?>
												<th>cleared</th>
												
												<?php
												echo "<script>var s=document.getElementsByClassName('color');
												s['$i'].style.background='lightgreen';
												</script>";
												
												
											}else{
												?>
												<th>
												
												<input type="number_format" name="feedue" placeholder="fee paid amount" onkeypress="isInputNumber(event)" value="<?php echo $fee;?>"/> 
												<input type="hidden" name="adno" value="<?php echo $ad; ?>"/>
												<input type="hidden" name="fee" value="<?php echo $fee; ?>"/>
												<input type="hidden" name="class" value="<?php echo "DROP_OUT"; ?>"/>
												<input type="hidden" name="date" value="<?php echo date('Y',strtotime($date)); ?>"/>
												<input type="submit" name="entry" class="but" value="Pay Now" />
												
												</th>
												<?php
											}
										?>
										</form>
									</tr>	
										
									<?php	
								}
								$i++;
							}
						}							
					}else{
						$i=0;
						$sql = "SELECT * FROM dropout ";
						$query=mysqli_query($conn,$sql);
						While($row=mysqli_fetch_array($query))
						{
							
							?>
								
								<tr class="color">
									<form Method="POST">
									<th><?php echo $ad=$row['id'];?> </th>				
									<th><?php echo $row['name']; ?> </th>
									<th><?php echo $row['gender']; ?> </th>
									<th><?php echo $row['fathername']; ?> </th>
									<th><?php echo date('d-m-Y',strtotime($row['dateofbirth'])); ?> </th>
									<th><?php echo $row['caste']; ?> </th>
									<th><?php echo $date=date('d-m-Y',strtotime($row['dateofleaving'])); ?> </th>
									<th><?php if($row['leavingclass']==10){echo $class="PASSED_OUT"; }else{ echo $class=$row['leavingclass'];} ?> </th>
										<th><?php echo $tcissued=$row['tcissued']; if($tcissued=="NO"){ echo "<br> <input type='checkbox' value='YES' name='tcissued' />Issue"; }?> </th>
										<th><?php echo $fee=$row['feedue']; ?> </th>
									<?php
										if($fee==0 && $tcissued=="YES")
										{
											?>
											<th>cleared</th>
											
											<?php
											echo "<script>var s=document.getElementsByClassName('color');
											s['$i'].style.background='lightgreen';
											</script>";
											
											
										}else{
											?>
											<th>
											
											<input type="number_format" name="feedue" placeholder="fee paid amount" onkeypress="isInputNumber(event)" value="<?php echo $fee;?>"/> 
											<input type="hidden" name="adno" value="<?php echo $ad; ?>"/>
											<input type="hidden" name="fee" value="<?php echo $fee; ?>"/>
											<input type="hidden" name="class" value="<?php if($class=="PASSED_OUT"){echo $class;}else{ echo "DROP_OUT"; } ?>"/>
											<input type="hidden" name="date" value="<?php echo date('Y',strtotime($date)); ?>"/>
											<input type="submit" name="entry" class="but" value="Pay Now" />
											
											</th>
											<?php
										}
									?>
									</form>
								</tr>	
									
							<?php
							$i++;
						}
					}
						
					?>
				</table>
				</div>
			</div>
			
		</div> 
	</div>
<!--End Of Main content-->	
	<?php
	if(isset($_POST['entry'])){
		
		$fee=$_POST['fee'];
		$id=$_POST['adno'];
		$year=$_POST['date'];
		$paid=$_POST['feedue'];
		
		if(isset($_POST['tcissued'])){
//DROP_OUT updation 		
		
			$sql = "UPDATE dropout SET tcissued='YES' WHERE id='$id'";
								
			if (mysqli_query($conn, $sql)) {
				echo " ";
			}
		}
		
		$feedue=$fee - $paid;
		if($feedue>=0){
		
			$sql = "UPDATE dropout SET feedue='$feedue' WHERE id='$id'";
									
			if (mysqli_query($conn, $sql)) {
				echo " ";
			}
			
			
			$query=mysqli_query($conn,"select * from dropout where id='$id'");
			While($row=mysqli_fetch_array($query))
			{
				$name=$row['name'];       	
			}
			$class=$_POST['class'];
			$feepaid=$paid;
			$clrdate=date('F');
			$monthlydue=0;
			$totaldue=$feedue;
			if($monthlydue==0){
				$date=date("Y-m-d");
				if($feepaid!=0){
//inserting fee details in studentfees					
				$sql = "INSERT INTO studentfees (id,name,class,paiddate,feepaid,clearedmonth,monthdue,totalfee) VALUES ('$id','$name','$class','$date','$fee','$clrdate','$monthlydue','$totaldue' )";
					if (mysqli_query($conn, $sql)) {
						$sql="select * from studentfees ORDER by receipt_no";
		
						if ($result=mysqli_query($conn,$sql))
						{
						// Return the number of rows in result set
						$rowcount=mysqli_num_rows($result);
						$no=$rowcount;
						} else {
						echo "Error: " . $sql . "
						" . mysqli_error($conn);
						}
					}
				
					?>	
<!--fee reciept-->		
						<script>document.body.style.overflow='hidden'; </script>
						<div class="popup1">
								<div id="myDIV1">
								
	`							<img id="close" src="../images/close.png" onclick="window.location='dropstudents.php'; document.body.style.overflow='visible';">
								<div class="print">
								<img class="pop_img" src="../images/schoollogo.png">
								<h1 style=" padding:10px;">VISHAVAI VIDYANIKETHAN<br><span class="school">HIGH SCHOOL</span></h1>
								
									<table border="none" class="h1" width="100%">
									<tr>
									<th>CLASS:</th><td><?php echo $class;?></td>
									<th>RECEIPT NO:</th><td><?php echo $no; ?></td>
									</tr>
									<tr>
									<th>TYPE:</th><td>FEE SLIP</td><th>DATE: </th><td><?php echo date("d-F-Y"); ?></td>
									</tr>
									<tr>
									<th>ADMISSION NO:</th><td><?php echo $id; ?></td>
									<th>ACADEMIC YEAR:</th><td><?php echo $year; ?></td>
									</tr>
									<tr>
									<th>STUDENT NAME:</th><td colspan="3"><?php echo $name; ?> </td>
									</tr>
									</table>
									
									
								
								<table style="width:60%; margin-left:auto; margin-right:auto; border:2px solid black; border-collapse:collapse;" class="feetable">
									<tr>
									<th colspan="2" style="border:1px solid black; border-collapse:collapse;">Particulars</th>
									<th style="border:1px solid black; border-collapse:collapse;">Amount</th> 
									
									</tr>
									<tr>
									<td colspan="2" style="padding:0; font:normal; text-align:center; border:1px solid black; border-collapse:collapse;">School fee</td>
									<td style="text-align:center; border:1px solid black; border-collapse:collapse;"><?php echo $paid.".00"; ?></td>
									</tr>
									
									<tr>
									<td colspan="2" style="text-align:center; font-weight:bold; border:1px solid black; border-collapse:collapse;">Total Amount</td>
									<td style="text-align:center; font-weight:bold; border:1px solid black; border-collapse:collapse;"><?php echo $paid.".00"; ?></td>
									</tr>
									
								</table><br>
								<span style="margin-left:10%; font-weight:bold;">Total Due:<?php echo $totaldue;?></span>
								<h3 class="sign"> Authorised Signature</h3>
								</div>
								<input type="button" id="hide" class="but" onclick="window.print();" value="print" style="display:block; margin-top:8px; margin-left:auto; margin-right:auto;"/>
								</div>
								</div>
<!--End of Fee RECEIPT-->								
								
					<?php
				}else{
					?><script> window.location.href='dropstudents.php';</script><?php
				}
			}
		}else{
			?>
			<script> document.body.style.overflow="hidden";</script>
			<div id="popup2">
			<div class="alert warning">
			<span class="closebtn" onclick="window.location.href='dropstudents.php'">&times;</span>  
			<strong>Warning!&nbsp </strong>fee paid amount is more.
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
	?>
</div>	
<!--javScript-->
<script>
	var dd_main = document.querySelector(".dd_main");

	dd_main.addEventListener("click", function(){
		this.classList.toggle("active");
	})	
	
	
	
	
		
	
function printDiv(printpage)
{
var headstr = "<html><head><title></title></head><body>";
var newstr = document.all.item(printpage).innerHTML;
var oldstr = document.body.innerHTML;
document.body.innerHTML = headstr+newstr;
window.print();
document.body.innerHTML = oldstr;
return false;
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