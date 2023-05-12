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
	<link rel="stylesheet" href="left.css">
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
<!--End of Side Bar-->	

<!--Profile Image View-->
<div class="navbar">
		<div class="logo"></div>
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
<!--End of Profile Image View-->	

<!--Main Content-->
<div class="main_content">
		
		<div class="first">
			<a href="dropstudents.php" class="left">DropOut Students</a><br>
			<div class="drop">
				
				<h2>Students List</h2>
				<?php
					$con=mysqli_connect("localhost","root","","studentinfo");
					if(isset($_POST['submit2'])){
						$_SESSION['clas']=$_POST['class'];
						$class=$_POST['class'];
					
					}
				?>
<!--Class Selection-->				
				<div class="form">
				<form method="post" style="margin-top:60px; text-align:center;">
					<label> Class:</label>
					<select name="class">
					<option> </option>	
					<option <?php if(!empty($_SESSION['clas'])){ if($_SESSION['clas']=="NURSERY") echo "selected='selected'"; } ?>>NURSERY</option>	
						<option <?php if(!empty($_SESSION['clas'])){ if($_SESSION['clas']=="LKG") echo "selected='selected'"; } ?>>LKG</option>	
						<option <?php if(!empty($_SESSION['clas'])){ if($_SESSION['clas']=="UKG") echo "selected='selected'"; } ?>>UKG</option>
						<option <?php if(!empty($_SESSION['clas'])){ if($_SESSION['clas']==1) echo "selected='selected'"; } ?>>1</option>	
						<option <?php if(!empty($_SESSION['clas'])){ if($_SESSION['clas']==2) echo "selected='selected'"; } ?>>2</option>	
						<option <?php if(!empty($_SESSION['clas'])){ if($_SESSION['clas']==3) echo "selected='selected'"; } ?>>3</option>	
						<option <?php if(!empty($_SESSION['clas'])){ if($_SESSION['clas']==4) echo "selected='selected'"; } ?>>4</option>	
						<option <?php if(!empty($_SESSION['clas'])){ if($_SESSION['clas']==5) echo "selected='selected'"; } ?>>5</option>	
						<option <?php if(!empty($_SESSION['clas'])){ if($_SESSION['clas']==6) echo "selected='selected'"; } ?>>6</option>	
						<option <?php if(!empty($_SESSION['clas'])){ if($_SESSION['clas']==7) echo "selected='selected'"; } ?>>7</option>	
						<option <?php if(!empty($_SESSION['clas'])){ if($_SESSION['clas']==8) echo "selected='selected'"; } ?>>8</option>	
						<option <?php if(!empty($_SESSION['clas'])){ if($_SESSION['clas']==9) echo "selected='selected'"; } ?>>9</option>	
						<option <?php if(!empty($_SESSION['clas'])){ if($_SESSION['clas']==10) echo "selected='selected'"; } ?>>10</option>
					</select>
					<input type="submit" class="but" value="search" name="submit2" />
				</form>
<!--Strength View-->				
				<span style="text-align:right;  font-weight:bold; color:darkslateblue; "> &nbsp &nbsp &nbsp STRENGTH: </span><span><?php  if(!empty($_SESSION['clas'])){ $class=$_SESSION['clas']; $sql="SELECT * FROM Studentinformation where class='$class'";

						if ($result=mysqli_query($con,$sql))
					{
					// Return the number of rows in result set
					echo $strength=mysqli_num_rows($result);
					
					}
				}
					?>
					</span>
<!--list of a class-->					
				<table>
					<tr>
					<td>CLASS</td>
					<td>ADMISSION_NO</td>	  
					<td>NAME</td>        
					<td>GENDER</td>      
					<td>FATHER_NAME</td>  
					<td>DATE_OF_BIRTH</td>
					<td>CASTE</td>       
					<td>PHONE</td>
					<td>FEE DUE</td>
					<td>STATUS</td>
					</tr>
				<?php 
				
					if(!empty($_SESSION['clas']))
					{
						$class=$_SESSION['clas'];
						$sql = "SELECT * FROM studentinformation where class='$class'";
						$query=mysqli_query($conn,$sql);
						While($row=mysqli_fetch_array($query))
						{
								?>
								<tr>
								<th><?php echo $clas=$row['class'];?> </th>
								<th><?php echo $ad=$row['id'];?> </th>				
								<th><?php echo $name=$row['name']; ?> </th>
								<th><?php echo $row['gender']; ?> </td>
								<th><?php echo $row['fathername']; ?> </th>
								<th><?php echo date('d-m-Y',strtotime($row['dateofbirth'])); ?> </th>
								<th><?php echo $row['caste']; ?> </th>
								<th><?php echo $row['phone']; ?> </th>
								<?php
								$classes=array("Nursery","Lkg","Ukg",1,2,3,4,5,6,7,8,9,10);
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
								$totalfee=0;
								$ptotalfee=0;
								
								$query1=mysqli_query($conn,"select * from studentfees where id='$ad' ");
								While($row=mysqli_fetch_array($query1))
								{
									if($row['id']== $ad && $row['class']==$pclass){
										
										$totalfee=$row['totalfee']; 	
									}
								}
								
								$query2=mysqli_query($conn,"select * from studentfees where id='$ad'");
								While($row=mysqli_fetch_array($query2))
								{
									if($row['id']== $ad && $row['class']==$class){
										
										$ptotalfee=$row['totalfee']; 
										
									}
								}
								
								$totalfee=$ptotalfee+$totalfee;
								?>
								<th><?php echo $totalfee; ?> </th>
								<th><form method="POST">
								<input type="hidden" name="adno" value="<?php echo $ad; ?>"/>
								<input type="hidden" name="class" value="<?php echo $class; ?>"/> 
								<input type="hidden" name="name" value="<?php echo $name; ?>"/> 
								<input type="hidden" name="due" value="<?php echo $totalfee; ?>"/> 
								<input type="submit" name="entry"  class="but" value="Submit"/></form></th>
								</tr>
								<?php	  											
							
						}
						
						
						?>
						<script> 
							document.querySelector(".marks_entry").style.display="block";
							document.querySelector(".head").style.display="none";
												
						</script>
						<?php
					}
						
				?>
				</table>
				</div>
			</div>	
				
				
				

         
			
		</div> 
</div>	
<!--End Of Main Content-->	
	<?php
					
					if(isset($_POST['entry']))
					{
						$class=$_POST['class'];
						$pclass=$class;
						$id=$_POST['adno'];
						$name=$_POST['name'];
						$feedue=$_POST['due'];
						?>
<!--Leaving Student Form-->	
						<script>document.body.style.overflow='hidden'; </script>
						<div class="popup">
							<div class="popup-content">
								<img class="close" src="../images/close.png" onclick="document.querySelector('.popup').style.display='none'; document.body.style.overflow='visible'; ">
								<h2>LEFTOUT STUDENT</h2>
								<form method="POST">
									<table class="dropdetails">
										<tr><td>ADMISSION NO:</td><td><?php echo $id; ?></td></tr>
										<tr><td>STUDENT NAME:</td><td><?php echo $name; ?></td></tr>
										<tr><td>STUDYING CLASS:</td><td><select name="class" selected>
										<option> </option>	
										<option <?php if($class=="NURSERY") echo 'selected="selected"'; ?> >NURSERY</option>	
										<option <?php if($class=="LKG") echo 'selected="selected"'; ?>>LKG</option>	
										<option <?php if($class=="UKG") echo 'selected="selected"'; ?>>UKG</option>
										<option <?php if($class==1) echo 'selected="selected"'; ?>>1</option>	
										<option <?php if($class==2) echo 'selected="selected"'; ?>>2</option>	
										<option <?php if($class==3) echo 'selected="selected"'; ?>>3</option>	
										<option <?php if($class==4) echo 'selected="selected"'; ?>>4</option>	
										<option <?php if($class==5) echo 'selected="selected"'; ?>>5</option>	
										<option <?php if($class==6) echo 'selected="selected"'; ?>>6</option>	
										<option <?php if($class==7) echo 'selected="selected"'; ?>>7</option>	
										<option <?php if($class==8) echo 'selected="selected"'; ?>>8</option>	
										<option <?php if($class==9) echo 'selected="selected"'; ?>>9</option>	
										<option <?php if($class==10) echo 'selected="selected"'; ?>>10</option>
										</select></td></tr>
										
										<tr><td>LEAVING CLASS:</td><td><select name="pclass" selected>
										<option> </option>	
										<option <?php if($pclass=="NURSERY") echo 'selected="selected"'; ?> >NURSERY</option>	
										<option <?php if($pclass=="LKG") echo 'selected="selected"'; ?>>LKG</option>	
										<option <?php if($pclass=="UKG") echo 'selected="selected"'; ?>>UKG</option>
										<option <?php if($pclass==1) echo 'selected="selected"'; ?>>1</option>	
										<option <?php if($pclass==2) echo 'selected="selected"'; ?>>2</option>	
										<option <?php if($pclass==3) echo 'selected="selected"'; ?>>3</option>	
										<option <?php if($pclass==4) echo 'selected="selected"'; ?>>4</option>	
										<option <?php if($pclass==5) echo 'selected="selected"'; ?>>5</option>	
										<option <?php if($pclass==6) echo 'selected="selected"'; ?>>6</option>	
										<option <?php if($pclass==7) echo 'selected="selected"'; ?>>7</option>	
										<option <?php if($pclass==8) echo 'selected="selected"'; ?>>8</option>	
										<option <?php if($pclass==9) echo 'selected="selected"'; ?>>9</option>	
										<option <?php if($pclass==10) echo 'selected="selected"'; ?>>10</option>
										</select></td></tr>
										
										<?php $date=date('d-m-Y'); ?>
					
										<tr><td>DATE OF LEAVING:</td><td><input type="date" name="dropdate"  value="<?php echo date('Y-m-d'); ?>" ></td></tr>
										<tr><td>DATE OF PUPIL ACTUALLY LEFT:</td><td><input type="date" name="actualdate"  value="<?php echo date('Y-m-d'); ?>" ></td></tr>
										<tr><td>TC ISSUED:</td><td><select name="tcissued" selected>
										<option>NO</option>
										<option>YES</option>
										</select></td></tr>
										<tr><td>STATUS:</td><td><select name="status" selected>
										<option>PASSED</option>
										<option>DROPOUT</option>
										</select></td></tr>
										<tr><td>FEE DUE:</td><td><input type="text" name="due" value="<?php echo $feedue; ?> "  /></td></tr>
										
									</table>
									<input type="hidden" value="<?php echo $id; ?>" name="id"/>
									<input type="hidden" name="feedue" value="<?php echo $feedue; ?>"/>
									
									
									<input type="submit" class="button1" name="update" value="Drop"> 
								</form>
							</div>
						</div>		
						<script> 
							document.querySelector(".marks_entry").style.display="block";
							document.querySelector('.head').style.display="none";				
						</script>
						
						<?php
				
					}
				?>
				
			

					<?php
						if(isset($_POST['update'])){
							$id=$_POST['id'];
							$class=$_POST['class'];
							$pclass=$_POST['pclass'];
							$feedue=$_POST['feedue'];
							$date=$_POST['dropdate'];
							$tcissued=$_POST['tcissued'];
							$status=$_POST['status'];
							$actualdate=$_POST['actualdate'];
							$sql = "SELECT * FROM studentinformation WHERE id='$id'";
							$query=mysqli_query($conn,$sql);
							While($row=mysqli_fetch_array($query))
							{
									$image=$row['image'];
									$id=$row['id'];
									$admnclass=$row['admnclass'];
									$admndate=$row['admndate'];
									$name=$row['name'];
									$mothertongue=$row['mothertongue'];
									$dateofbirth=$row['dateofbirth'];
								
									$caste=$row['caste'];
									$subcastename=$row['subcastename'];
									$gender=$row['gender'];
									$adharno=$row['adharno'];
									$mothername=$row['mothername'];
									$fathername=$row['fathername'];
									$address=$row['address'];
									$religion=$row['religion'];
									$phd=$row['phd'];
									$mole1=$row['mole1'];
									$mole2=$row['mole2'];
									$phone=$row['phone'];
									$year=$row['year'];
 										
								
								$val=1;
							}
							
							$classes=array("NURSERY","LKG","UKG",1,2,3,4,5,6,7,8,9,10);
							$c=$class;
							$d=$pclass;
							
							$b=0;
							$e=0;
							while($b<=12)
							{
								if($classes[$b]==$c){
									break;
								}
								$b++;			
							}
							while($e<=12)
							{
								if($classes[$e]==$d){
									break;
								}
								$e++;			
							}
							if($c==$d){
								$pclass=$classes[$e-1];
								$year=$year-1;
							}else{
								$year=$year-1;
							}
							if($val==1 && $d<=$c){
								?>
								<script>document.body.style.overflow="hidden";</script>
								<div id="popup">
								<div class="alert success">
								<span class="closebtn"onclick="widow.location='dropout.php'">&times;</span>  
								<strong>Success!</strong> Successfully Inserted Into DROPOUT;
								</div>
								</div>
							<?php
//inserting into dropout							
								$sql = "INSERT INTO dropout (image,id,admnclass,admndate,name,mothertongue,dateofbirth,caste,subcastename,gender,adharno,fathername,mothername,address,religion,phd,mole1,mole2,leavingclass,phone,year,dateofleaving,feedue,tcissued,studyingclass,dateactuallyleft,status) VALUES ('$image','$id','$admnclass','$admndate','$name','$mothertongue','$dateofbirth','$caste','$subcastename','$gender','$adharno','$fathername','$mothername','$address','$religion','$phd','$mole1','$mole2','$pclass','$phone','$year','$date','$feedue','$tcissued','$class','$actualdate','$status')";
								if (mysqli_query($conn, $sql)) {
									$conn=mysqli_connect("localhost","root","","studentinfo");
									if ($conn->connect_error) {
										die("Connection failed: " . $conn->connect_error);
									}
									
									// sql to delete a record
									$sql = "DELETE FROM studentinformation WHERE id='$id'";
									
									if ($conn->query($sql) === TRUE) {
										echo " ";
									} else {
										echo " " . $conn->error;
									}
									
									$conn->close();
									?>
								
									<script> 
										window.location.href="leftout.php";	
									</script>
									<?php
								} else {
									echo "Error: " . $sql . "" . mysqli_error($mysqli);
								}
							}else{
								?>
								<script>document.body.style.overflow="hidden";</script>
							<div id="popup">
							<div class="alert warning">
							<span class="closebtn"onclick="window.location='dropout.php'">&times;</span>  
							<strong>warning!</strong> Drop class Should be Greater Than Present Class;
							</div>
							</div>
							<?php
							}
					
						}
					
				?>			
				
	
	
</div>
<script>
	var dd_main = document.querySelector(".dd_main");

	dd_main.addEventListener("click", function(){
		this.classList.toggle("active");
	})	

	setTimeout(function(){ 
		document.getElementById('popup').style.display = 'none';
		
	}, 3000);
</script>
	
</body><!--End of body-->
</html>