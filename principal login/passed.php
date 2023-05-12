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
	
	<title>Repot Cards</title>
	<link rel="stylesheet" href="search.css">
	<link rel="stylesheet" href="../fontawesome-free-5.15.2-web/css/all.css">

</head>
<!--head-->

<!--body-->
<body>

<div class="wrapper">
<!--sidebar-->
	<div class="sidebar">
        <h2><span> VISHAVAI  VIDYANIKETAN HIGH SCHOOL</span></h2>
       <ul>
             <li><a href="1-academic.php"><i class="fas fa-home"></i>Academic</a></li>
            <li><a href="students.php"><i class="fas fa-user"></i>Students</a></li>
            <li><a href="collection.php"><i class="fas fa-address-card"></i>Collection</a></li>
            <li><a href="dropstudents.php"><i class="fas fa-project-diagram"></i>Left Out</a></li>
             <li><a href="feepay.php"><i class="fas fa-blog"></i>Fee Payment</a></li>
			<li><a href="fees.php"><i class="fas fa-server"></i>Fees</a></li>
            <li><a href="Bonafide.php"><i class="fas fa-certificate"></i>Bonafide</a></li>
            <li><a href="users.php"><i class="fas fa-address-book"></i>Teachers</a></li>
			<li style="background:#3e3762;"><a href="passed.php"><i class="fas fa-search"></i>Search</a></li>
            
        </ul> 
	</div>	
<!--end of Sidebar-->
		
        <!--<div class="social_media">
          <a href="#"><i class="fab fa-facebook-f"></i></a>
          <a href="#"><i class="fab fa-twitter"></i></a>
          <a href="#"><i class="fab fa-instagram"></i></a>
		</div>-->
    
<!--profile image view-->	
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
<!--End of Profile image View-->

<!--main Content-->	
	<div class="main_content">
		
		<div class="first">
			<div class="passed">
					<form method="POST" style="text-align:center; margin-top:20px;">
						<label>Father Name:</label>
						<input type="text" name="father" />
						<input type="submit" value="Search" class="but" name="submit"/> 
					</form>
<!--Students List-->					
					<h3>STUDENTS</h3>
					<table>
						<tr style="color:white; background:darkslateblue;">
						<td>FATHER_NAME</td>  
						<td>MOTHER_NAME</td>
						<td>CLASS</td>
						<td>ADMISSION_NO</td>	  
						<td>NAME</td>        
						<td>GENDER</td>      
						<td>DATE_OF_BIRTH</td>
						<td>CASTE</td>         
						<td>PHONE</td>
						<td>FEE DUE</td>
						</tr>
					<?php
						if(isset($_POST['submit'])){
							$fname=$_POST['father'];
							$sql = "SELECT * FROM studentinformation where fathername like '%$fname%' ";
							$query=mysqli_query($conn,$sql);
							While($row=mysqli_fetch_array($query))
							{
									echo "<tr>";
									echo "<td>".$father_name=$row['fathername']."</td>";
									echo "<td>".$mother_name=$row['mothername']."</td>";
									?> <td> <?php echo $class=$row['class']; ?> </td> <?php
									echo "<td>".$id=$row['id']."</td>";
									echo "<td>".$name=$row['name']."</td>";
									echo "<td>".$gender=$row['gender']."</td>";
									echo "<td>".$dateofbirth=date('d-m-Y',strtotime($row['dateofbirth']))."</td>";
									echo "<td>".$caste=$row['caste']."</td>";
									echo "<td>".$Mobile_Number=$row['phone']."</td>";
									$val=0;
									$lastdue=0;
									$sql = "SELECT * FROM feestructure where class='$class'";
									$query4=mysqli_query($conn,$sql);
									While($row=mysqli_fetch_array($query4))
									{
										$totalfee=$row['fee']*12;
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
										$pclass=$classes[$b-1];
									}
									
									$query5=mysqli_query($conn,"SELECT * FROM studentfees where id='$id' And class='$pclass'");
									While($row=mysqli_fetch_array($query5))
									{
										$lastdue=$row['totalfee'];
										
									}
									
									$query6=mysqli_query($conn,"select * from studentfees where id='$id' ");
									$totalPaid=0;
									While($row=mysqli_fetch_array($query6))
									{
										
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
									if($val==1){
										if($lastdue!=0){
											
											$totalfee=$totalfee+$lastdue;
										}
									}else{
										$totalfee=$totalfee+$lastdue;
									}
									echo "<td>".$totalfee."</td></tr>";									
								}	
							
							$sql = "SELECT * FROM dropout where fathername like '%$fname%' ";
							$query7=mysqli_query($conn,$sql);
							While($row=mysqli_fetch_array($query7))
							{
									echo "<tr>";
									echo "<td>".$father_name=$row['fathername']."</td>";
									echo "<td>".$mother_name=$row['mothername']."</td>";
									?><td><?php if($row['leavingclass']==11){ echo '10(PASSED)'; $class=10;}else{ echo $row['leavingclass']."(DROP_OUT)"; $class=$row[19];}?></td><?php
									echo "<td>".$id=$row['id']."</td>";
									echo "<td>".$name=$row['name']."</td>";
									echo "<td>".$gender=$row['gender']."</td>";
									echo "<td>".$dateofbirth=date('d-m-Y',strtotime($row['dateofbirth']))."</td>";
									echo "<td>".$caste=$row['caste']."</td>";
									echo "<td>".$Mobile_Number=$row['phone']."</td>";
									$val=0;
									$lastdue=0;
								
									$query2=mysqli_query($conn,"select * from feestructure where class='$class'");
									While($row=mysqli_fetch_array($query2))
									{
										$totalfee=$row['fee']*12;
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
										$pclass=$classes[$b-1];
									}
									
									$query8=mysqli_query($conn,"SELECT * FROM studentfees where id='$id' And class='$pclass'");
									While($row=mysqli_fetch_array($query8))
									{
										$lastdue=$row['totalfee'];
										
									}
									$query1=mysqli_query($conn,"select * from studentfees where id='$id' ");
									$totalPaid=0;
									While($row=mysqli_fetch_array($query1))
									{
										
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
									if($val==1){
										if($lastdue!=0){
											
											$totalfee=$totalfee+$lastdue;
										}
									}else{
										$totalfee=$totalfee+$lastdue;
									}
									echo "<td>".$totalfee."</td></tr>";	
									
							}
						}
					?>
					</table><br><br>
			</div>
		</div> 
	</div>
</div>
<!--end of Main Content-->	
	
<!--javascript-->
<script>
	var dd_main = document.querySelector(".dd_main");

	dd_main.addEventListener("click", function(){
		this.classList.toggle("active");
	})	

	
</script>
	
</body>
<!--end of Body-->
</html>