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
	<link rel="stylesheet" href="Collection.css">
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
            <li style="background:#3e3762;"><a href="collection.php"><i class="fas fa-address-card"></i>Collection</a></li>
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
<!--End of Profile image View-->	
<!--Main Content-->
	<div class="main_content">
		
		<div class="first">
			<div class="collection">
					<h3>COLLECTIONS</h3>
					<div  class="option">
<!--Selection -->					
						<label>Search By:</label>
						<select name="status" id="selector" onchange="toggleshared();" >
							
						<option value="Name" >Class Wise</option>	
						<option value="Admission">School Wise</option>
						</select><br>
					</div>
					<div class="collect" >
						<form method="POST" class="date" style="text-align:center;" ID="name1">
							<label>FROM DATE:</label>
							<input type="date" name="date1" required>
							<label style="margin-left:10px;"> TO DATE:</label>
							<input type="date" name="date2" required><br><br>
							<input type="submit" name="check1" value="check" style="display:block; margin-bottom:30px" class="button" >
							
							
						</form>
						<form method="POST" class="class" id="id">
							<label class="class">CLASS:</label>
							<select  name="class" list="class" required><br><br>
							<option></option>	
							<option>NURSERY</option>	
							<option>LKG</option>	
							<option>UKG</option>
							<option>1</option>	
							<option>2</option>	
							<option>3</option>	
							<option>4</option>	
							<option>5</option>	
							<option>6</option>	
							<option>7</option>	
							<option>8</option>	
							<option>9</option>	
							<option>10</option>
							</select><br><br>
							<label>FROM DATE:</label>
							<input type="date" name="date1" required>
							<label style="margin-left:10px;"> TO DATE:</label>
							<input type="date" name="date2" required><br><br>
							<input type="submit" name="check2" value="check" class="button">
							
							
						</form>
						<div id="print">
						<?php
							if(isset($_POST['check1'])){
								if($_POST['date1']!="" && $_POST['date2']!=" "){
									$date1=$_POST['date1'];
									$date2=$_POST['date2'];
									
									?>
<!--Fees Collection list-->									
										<table>
										<tr>
										<td>RECEIPT_NO</td>
										<td>ADMISSION_NO</td>	  
										<td>NAME</td>        
										<td>CLASS</td>      
										<td>FEE PAID DATE</td>  
										<td>FEE PAID</td>       
										<td>TOTAL DUE</td>
										</tr>
										<?php
											$total=0;
//fetching All collection											
											$sql = "SELECT * FROM studentfees where paiddate>='$date1' and paiddate<='$date2'";
											$query=mysqli_query($conn,$sql);
											While($row=mysqli_fetch_array($query))
											{
												
												?>
												<tr>
												<th><?php echo $row['receipt_no'];?> </th>				
												<th><?php echo $row['id']; ?> </th>
												<th><?php echo $row['name']; ?> </th>
												<th><?php echo $row['class']; ?> </td>
												<th><?php echo date('d-m-Y',strtotime($row['paiddate'])); ?> </th>
												<th><?php echo $row['feepaid']; ?> </th>
												<?php $total=$total+$row['feepaid'];?>
												<th><?php echo $row['totalfee']; ?> </th>
												</tr>
												<?php
													
																						
												
											}
										?>
										<tr class="total">
											<th>Total</th>
											<th> </th>
											<th> </th>
											<th> </th>
											<th> </th>
											<th><?php echo $total; ?> </th>
											<th> </th>
										</tr>
										</table>
										<script> 
											document.querySelector(".collection").style.display="block";
											document.querySelector(".head").style.display="none";
												
										</script>
									<?php
								}else{
									?>
									<script> 
										document.querySelector(".collection").style.display="block";
										document.querySelector(".head").style.display="none";
											
									</script>
									<?php
								}
									
							}
							if(isset($_POST['check2'])){
								if($_POST['class']!="" && $_POST['date1']!="" && $_POST['date2']!=""){
									$date1=$_POST['date1'];
									$date2=$_POST['date2'];
									$class=$_POST['class'];
//class by Fee collection									
									?>
										<h2> Class:<?php echo $class;?></h2>
										<table>
										<tr>
										<td>RECEIPT_NO</td>
										<td>ADMISSION_NO</td>	  
										<td>NAME</td>        
										<td>CLASS</td>      
										<td>FEE PAID DATE</td>  
										<td>FEE PAID</td>       
										<td>TOTAL DUE</td>
										</tr>
										<?php
											$total=0;
//fetching class wise collection										
										$sql = "SELECT * FROM studentfees where paiddate>='$date1' and paiddate<='$date2' and class='$class'";
											$query=mysqli_query($conn,$sql);
											While($row=mysqli_fetch_array($query))
											{
												?>
												<tr>
												<th><?php echo $row['receipt_no'];?> </th>				
												<th><?php echo $row['id']; ?> </th>
												<th><?php echo $row['name']; ?> </th>
												<th><?php echo $row['class']; ?> </td>
												<th><?php echo date('d-m-Y',strtotime($row['paiddate'])); ?> </th>
												<th><?php echo $row['feepaid']; ?> </th>
												<?php $total=$total+$row['feepaid'];?>
												<th><?php echo $row['totalfee']; ?> </th>
												</tr>
												<?php

											}
											
										?>
										<tr class="total">
											<th>Total</th>
											<th> </th>
											<th> </th>
											<th> </th>
											<th> </th>
											<th><?php echo $total; ?> </th>
											<th> </th>
										</tr>
										</table>
										<script> 
											document.querySelector(".collection").style.display="block";
											document.querySelector(".head").style.display="none";											
										</script>
										
									<?php
								}else{
									?>
									<script> 
										document.querySelector(".collection").style.display="block";
										document.querySelector(".req").style.display="block";
										document.querySelector(".head").style.display="none";
											
									</script>
									<?php
								}	
							}
						?>
						
					</div>
					</div>
					<?php
						if(isset($_POST['check1']) || isset($_POST['check2']) ){
							?><input type="button" onclick="printDiv('print');" value="print" class="button" style='margin-left:47%; margin-top:20px;'/><?php
						}
					?>
			</div>
		</div> 
	</div>
<!--End of main content-->	
</div>	
<!--javascript-->
<script>
	function toggleshared(){
        var ddlPassport = document.getElementById("selector");
        var dvPassport = document.getElementById("id");
		var dem =document.getElementById("name1");
        if(ddlPassport.value == "Name" ){
			dvPassport.style.display= "block";
			dem.style.display = "none";
		}
		else{
			dem.style.display = "block";
			dvPassport.style.display= "none";
		}
    }
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
	var dd_main = document.querySelector(".dd_main");

	dd_main.addEventListener("click", function(){
		this.classList.toggle("active");
	})	

	
</script>
	
</body>
<!--End of body-->
</html>