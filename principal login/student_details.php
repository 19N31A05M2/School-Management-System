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
	<link rel="stylesheet" href="Studentwise.css">
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
            <li style="background:#3e3762;"><a href="students.php"><i class="fas fa-user"></i>Students</a></li>
            <li><a href="collection.php"><i class="fas fa-address-card"></i>Collection</a></li>
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
			<a href="#"></a>
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
<!--End of Profile Image View-->

<!--Main Content-->
	<div class="main_content">
		<div class="first">
			
						
<!--Selection-->				 
					<h3>Student Wise Details</h3>
						<a href="students.php" class="left">Students Info</a><br>
						<a href="class_details.php" style="margin-bottom:10px;" class="left">Class_Wise Details</a>
						<label style="margin-left:80px; margin-bottom:20px;">Search By:</label>
					<select name="status" id="selector" style="width:200px; font-size:16px;" onchange="toggleshared();" required >
					<option value="Admission">Admission No</option>
					<option value="Name" >Name</option>	
					
					</select><br>
				<form method="post" id='id' >
					<label style="margin-left:9%; ">Admission No</label>
					<input type="text" name="admnno" onkeypress="isInputNumber(event)" required />
					<input type="submit" value="Search" class="but" name="submit1" required />
				</form>
				<form method="post" id="name" >
					<label style="margin-left:9%; ">Name:</label>
					<input type="text" name="name" required />
					<input type="submit" value="Search" class="but" name="submit2"/>
				</form>	
				<script>
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
				</script>
				<?php
				$iderror=0;
				$nerror=0;
				echo "<script>document.getElementById('invisible').style.display=='none';</script>";
				$id=0;
				$adno="";
				$m=0;
				$image=" "; 
				$admnclass=" ";
				$admission_date="";
				$name="";
				$mother_tongue="";
				$dateofbirth="";
				$dob="";
				$caste="";
				$subcaste_name="";
				$gender="";
				$adhar_number="";
				$father_name="";
				$mother_name="";
				$foccupation="";
				$moccupation="";
							  
				$Address="";
				$living="";
							  
				$schoolname="";
				$tcno="";
				$religion="";
				$medium="";
				$firstl="";
				$secondl="";
				$handicap="";
				$mole1="";
				$mole2="";
				$class="";
				$Mobile_Number="";
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
					}
					else{
						$iderror=1;
					}
				}
				
				if(isset($_POST['submit2'])){
					echo "<script>document.getElementById('invisible').style.display=='block';</script>";
					$name=$_POST['name'];
					$query=mysqli_query($conn,"select * from studentinformation where name like '%$name%'");//fectching details
					$count=mysqli_num_rows($query);
					
					if($count>1)
					{
						
						?>
						<table width="400px" class="names" style="border:5px solid black; border-collapse:collapse; margin-left:auto; margin-right:auto; margin-bottom:20px; text-align:center;">
						<tr style="background-color:darkslateblue; color:white;" >
							<th> Admission NO </th>
							<th>Name </th>
							<th>Father Name </th>
							<th>Class </th>
							<th>SELECT</th>
						</tr>
						<?php
						while ($row=mysqli_fetch_array($query)) 
						{
							?>
								<tr class="sides">
								<td > <?php echo $ad=$row['id'];?> </td>
								<td> <?php echo $row['name'];?> </td>
								
								<td> <?php echo $row['fathername'];?> </td>
								<td> <?php echo $row['class'];?> </td>
								<th><form method="POST"> <input type="hidden" name="adno" value="<?php echo $ad; ?> "/><input type="submit" class="but" name="select" value="select"/></form></th>
								</tr>
						
							<?php
						}
						?>
						</table>
						<?php
					}
					else if($count==1){
						echo "<script>document.getElementById('invisible').style.display=='block';</script>";
						$sql = "SELECT * FROM studentinformation where name like '%$name%' ";//fectching details
						$query=mysqli_query($conn,$sql);
						While($row=mysqli_fetch_array($query))
						{
								$image=$row['image'];
								$adno=$row['id'];
								$admnclass=$row['admnclass'];
								$admission_date=date('d-m-Y',strtotime($row['admndate']));
								$name=$row['name'];
								$mother_tongue=$row['mothertongue'];
								$dateofbirth=date('d-m-Y',strtotime($row['dateofbirth']));
								
								$caste=$row['caste'];
								$subcaste_name=$row['subcastename'];
								$gender=$row['gender'];
								$adhar_number=$row['adharno'];	
								$father_name=$row['fathername'];
								$mother_name=$row['mothername'];
								$foccupation=$row['fatherocp'];
								$moccupation=$row['motherocp'];
								
								$Address=$row['address'];
								$living=$row['wlparent'];
								
								$schoolname=$row['lastschool'];
								$tcno=$row['tcno'];
								$religion=$row['religion'];
								$medium=$row['medium'];
								$firstl=$row['firstlan'];
								$secondl=$row['secondlan'];
								$handicap=$row['phd'];
								$mole1=$row['mole1'];
								$mole2=$row['mole2'];
								$class=$row['class'];
								$Mobile_Number=$row['phone'];
								$cannot=1;
								
									
								
								
						}
					}else{	
						$nerror=1;
					}
					
				}
				if(isset($_POST['select'])){
					echo "<script>document.getElementById('invisible').style.display=='block';</script>";
					$id=$_POST['adno'];
//fecthing details based on selection
					
					$sql = "SELECT * FROM studentinformation where id='$id' "; //fectching details
					$query=mysqli_query($conn,$sql);
					While($row=mysqli_fetch_array($query))
					{
							$image=$row['image'];
							$adno=$row['id'];
							$admnclass=$row['admnclass'];
							$admission_date=date('d-m-Y',strtotime($row['admndate']));
							$name=$row['name'];
							$mother_tongue=$row['mothertongue'];
							$dateofbirth=date('d-m-Y',strtotime($row['dateofbirth']));
							
							$caste=$row['caste'];
							$subcaste_name=$row['subcastename'];
							$gender=$row['gender'];
							$adhar_number=$row['adharno'];	
							$father_name=$row['fathername'];
							$mother_name=$row['mothername'];
							$foccupation=$row['fatherocp'];
							$moccupation=$row['motherocp'];
							
							$Address=$row['address'];
							$living=$row['wlparent'];
							
							$schoolname=$row['lastschool'];
							$tcno=$row['tcno'];
							$religion=$row['religion'];
							$medium=$row['medium'];
							$firstl=$row['firstlan'];
							$secondl=$row['secondlan'];
							$handicap=$row['phd'];
							$mole1=$row['mole1'];
							$mole2=$row['mole2'];
							$class=$row['class'];
							$Mobile_Number=$row['phone'];
							$cannot=1;
							
								
							
							
					}
				}
				if($m==1)
				{
//fecthing details usind id
					$query=mysqli_query($conn,$sql);//fectching details
					While($row=mysqli_fetch_array($query))  
					{
							$image=$row['image'];
							$adno=$row['id'];
							$admnclass=$row['admnclass'];
							$admission_date=date('d-m-Y',strtotime($row['admndate']));
							$name=$row['name'];
							$mother_tongue=$row['mothertongue'];
							$dateofbirth=date('d-m-Y',strtotime($row['dateofbirth']));
							
							$caste=$row['caste'];
							$subcaste_name=$row['subcastename'];
							$gender=$row['gender'];
							$adhar_number=$row['adharno'];	
							$father_name=$row['fathername'];
							$mother_name=$row['mothername'];
							$foccupation=$row['fatherocp'];
							$moccupation=$row['motherocp'];
							
							$Address=$row['address'];
							$living=$row['wlparent'];
							
							$schoolname=$row['lastschool'];
							$tcno=$row['tcno'];
							$religion=$row['religion'];
							$medium=$row['medium'];
							$firstl=$row['firstlan'];
							$secondl=$row['secondlan'];
							$handicap=$row['phd'];
							$mole1=$row['mole1'];
							$mole2=$row['mole2'];
							$class=$row['class'];
							$Mobile_Number=$row['phone'];
							$cannot=1;
							
								
							
							
					}
					
						
				}
				?>
<!--Details Form-->				
				<div class="studentinfo">
				<table>
					
					<tr>
						<th colspan="2">Admission No</th>
						<td colspan="1"> <?php echo $adno;?> </td>
						<td colspan="1" rowspan="3"> <?php echo "<img height='120px' width='140px' style='padding:10px;' src='$image' />"?> </td>
					</tr>
					<tr>
						<th colspan="2">Admitted Class</th>
						<td colspan="1"> <?php echo $admnclass;?> </td>
					
					</tr>
					<tr>
						<th colspan="2">Date Of Admission</th>
						<td colspan="1"> <?php echo $admission_date;?> </td>
						
					</tr>
					<tr>
						<th colspan="2">Name Of The Pupil</th>
						<td colspan="2"> <?php echo $name;?> </td>
					</tr>
					<tr>
						<th colspan="2">Mother Tongue</th>
						<td colspan="2"> <?php echo $mother_tongue;  ?> </td>
					</tr>
					<tr>
						<th rowspan="1" colspan="2">Date of Birth</th>
						
						<td colspan="2"> <?php echo $dateofbirth; ?> </td>
						
					</tr>
					
						<tr>
						<th colspan="1">Caste</th>
						<td colspan="1"> <?php  echo $caste; ?> </td>
						<th colspan="1">Subcaste Name </th>
						<td colspan="1"> <?php echo $subcaste_name; ?> </td>
						
					</tr>
					<tr>
						<th colspan="2">Gender</th>
						<td colspan="2"> <?php echo $gender;?> </td>
					</tr>
					<tr>
						<th colspan="2">Adhaar Card No</th>
						<td colspan="2"> <?php  echo $adhar_number;  ?> </td>
					</tr>
					<tr>
						<th colspan="2">Mother name</th>
						<td colspan="2"> <?php echo $mother_name; ?> </td>
					</tr>
					<tr>
						<th colspan="2">Father name </th>
						<td colspan="2"> <?php echo $father_name;  ?> </td>
					</tr>
					<tr>
						<th   colspan="2" rowspan="2">Occupation </th>
						<th colspan="1">Father </th>
						<td colspan="1"> <?php echo $foccupation; ?> </td>
					</tr>
					<tr>
						<th colspan="1">Mother </th>
						<td colspan="1"> <?php echo $moccupation; ?> </td>
					</tr>
					<tr>
						<th colspan="2">Nationality</th>
						<td colspan="2"> <?php echo $State="India";       ?> </td>
					</tr>
					<tr>
						<th colspan="2">Address</th>
						<td colspan="2"> <?php echo $Address; ?> </td>
					</tr>
					<tr>
						<th colspan="2">Whether Living With Parent </th>
						<td colspan="2"> <?php  echo $living;  ?> </td>
					</tr>
					<tr>
						<th colspan="2">Last school studied</th>
						<td colspan="2"> <?php    echo $schoolname; ?> </td>
					</tr>
					<tr>
						<th colspan="2">Transfer Certificate No</th>
						<td colspan="2"> <?php echo $tcno; ?> </td>
					</tr>
					<tr>
						<th colspan="2">Religion</th>
						<td colspan="2"> <?php   echo $religion; ?> </td>
					</tr>
					<tr>
						<th colspan="2">Medium Of Instruction</th>
						<td colspan="2"> <?php    echo $medium;?> </td>
					</tr>
					<tr>
						<th colspan="2">First language</th>
						<td colspan="2"> <?php   echo $secondl;  ?> </td>
					</tr>
					<tr>
						<th colspan="2">Second language</th>
						<td colspan="2"> <?php    echo $firstl; ?> </td>
					</tr>
					<tr>
						<th colspan="2">Physically Handicapped or not</th>
						<td colspan="2"> <?php echo $handicap; ?> </td>
					</tr>
					<tr>
						<th  colspan="2" rowspan="2">Personal marks of Identification</th>
						<td  colspan="2" style="text-align:left;">1. <?php echo $mole1; ?> </td>
						
						
						
					</tr>
					<tr>
						<td colspan="2" style="text-align:left;">2. <?php echo $mole2; ?> </td>
						
					</tr>
					<tr>
						<th colspan="2"><label>Studying Class:</label></th>
						<td  colspan="2"> <?php echo $class;?> </td>
					</tr>
					<tr>
						<th colspan="2">Mobile Number</th>
						<td colspan="2"> <?php   echo $Mobile_Number; ?> </td>
					</tr>
				</table>
					<form method="POST">
					<input type="hidden" name="id" value="<?php echo $adno; ?>"/>
					<input type="hidden" name="image" value="<?php echo $image; ?>"/>
					<input type="submit" name="submit" value="Edit Details" class="but" id="invisible" />
					</form>
					
				</div>
				
					
			
				
				
		</div> 
	</div>
				<?php
					if(isset($_POST['submit'])){
						
						$id=$_POST['id'];
						$image=$_POST['image'];
						$sql = "SELECT * FROM studentinformation where id='$id'";//fetching details
						$query=mysqli_query($conn,$sql);
						While($row=mysqli_fetch_array($query))
						{
								$image=$row['image'];
								$adno=$row['id'];
								$admnclass=$row['admnclass'];
								$admission_date=$row['admndate'];
								$name=$row['name'];
								$mother_tongue=$row['mothertongue'];
								$dateofbirth=$row['dateofbirth'];
								
								$caste=$row['caste'];
								$subcaste_name=$row['subcastename'];
								$gender=$row['gender'];
								$adhar_number=$row['adharno'];	
								$father_name=$row['fathername'];
								$mother_name=$row['mothername'];
								$foccupation=$row['fatherocp'];
								$moccupation=$row['motherocp'];
								
								$Address=$row['address'];
								$living=$row['wlparent'];
								
								$schoolname=$row['lastschool'];
								$tcno=$row['tcno'];
								$religion=$row['religion'];
								$medium=$row['medium'];
								$firstl=$row['firstlan'];
								$secondl=$row['secondlan'];
								$handicap=$row['phd'];
								$mole1=$row['mole1'];
								$mole2=$row['mole2'];
								$class=$row['class'];
								$Mobile_Number=$row['phone'];
								$cannot=1;
								
									
								
								
						}
					
						?>
<!--Edit Form-->						
							<div class="popup">
								<div class="popup-content">
								<img class="close" src="../images/close.png" onclick="window.location.href='student_details.php';">
									<h3>Edit Details</h3>
									<form method="POST">
									<table>
										<tr>
											<th colspan="2" style="text-align:left;">Admission No</th>
											<td colspan="1"><input width="250px" type="text"  name="id" value="<?php echo $id;?>" ></td>
											<td  rowspan="3"><?php echo "<img height='120px' width='140px' style='padding:10px;' src='$image' />"?></td>
											
										</tr>
										<tr>
											<th colspan="2"  style="text-align:left;">Admitted Class</th>
											<td colspan="1"><select name="admnclass" style="width:270px;" required >
											<option> </option>	
											<option <?php if($admnclass=="NURSERY") echo 'selected="selected"'; ?> >NURSERY</option>	
											<option <?php if($admnclass=="LKG") echo 'selected="selected"'; ?>>LKG</option>	
											<option <?php if($admnclass=="UKG") echo 'selected="selected"'; ?>>UKG</option>
											<option <?php if($admnclass==1) echo 'selected="selected"'; ?>>1</option>	
											<option <?php if($admnclass==2) echo 'selected="selected"'; ?>>2</option>	
											<option <?php if($admnclass==3) echo 'selected="selected"'; ?>>3</option>	
											<option <?php if($admnclass==4) echo 'selected="selected"'; ?>>4</option>	
											<option <?php if($admnclass==5) echo 'selected="selected"'; ?>>5</option>	
											<option <?php if($admnclass==6) echo 'selected="selected"'; ?>>6</option>	
											<option <?php if($admnclass==7) echo 'selected="selected"'; ?>>7</option>	
											<option <?php if($admnclass==8) echo 'selected="selected"'; ?>>8</option>	
											<option <?php if($admnclass==9) echo 'selected="selected"'; ?>>9</option>	
											<option <?php if($admnclass==10) echo 'selected="selected"'; ?>>10</option>
											</select> </td>
										
										</tr>
										<tr>
											<th colspan="2"  style="text-align:left;">Date Of Admission</th>
											<td colspan="1"> <input style='width:250px;'  class="input"  type="date" name="admndate" value="<?php echo $admission_date; ?>" required > </td>
											
										</tr>
										<tr>
											<td colspan="2">Name Of The Pupil<p>*</p></td>
											<td colspan="2"><input style='width:350px;' type="text" name="name" style="width:250px;" value="<?php echo $name; ?>" required /></td>
										</tr>
										<tr>
											<td colspan="2">Mother Tongue<p>*</p></td>
											<td colspan="2"><input style='width:250px;'  type="text" name="mother_tongue" value="<?php echo $mother_tongue; ?>" required /></td>
										</tr>
										<tr>
											<td rowspan="2"colspan="2" >Date of Birth<p>*</p></td>
											<td>(infigures)</td>
											<td><input style='width:250px;'   type="date" id="datepicker" name="dateofbirth" value="<?php echo $dateofbirth; ?>" required /></td>
											
										</tr>
										<tr>
											<td colspan="1">(inwords)</td>
											<td colspan="1" style="text-transform:uppercase;"><input style='width:250px; font-size:10px;'   type="text"  id="words" name="dob" style="width:250px;" value="<?php echo $dob; ?>" readOnly></td>
										</tr>
										
										<tr>
											<td>Caste<p>*</p></td>
											<td><select name="caste" id="castein" style="width:100px;" onchange="toggleshare()"   >
											<option> </option>	
											<option <?php if($caste=="OC") echo 'selected="selected"'; ?>>OC</option>	
											<option <?php if($caste=="BC-A") echo 'selected="selected"'; ?>>BC-A</option>
											<option <?php if($caste=="BC-B") echo 'selected="selected"'; ?>>BC-B</option>
											<option <?php if($caste=="BC-C") echo 'selected="selected"'; ?>>BC-C</option>
											<option <?php if($caste=="BC-D") echo 'selected="selected"'; ?>>BC-D</option>
											<option <?php if($caste=="BC-E") echo 'selected="selected"'; ?>>BC-E</option>
											<option <?php if($caste=="SC") echo 'selected="selected"'; ?>>SC</option>
											<option <?php if($caste=="ST") echo 'selected="selected"'; ?>>ST</option>
											</select></td>
											
											<td  >Subcaste Name<p>*</p> </td>
											<td  ><input style='width:250px;'  type="text" name="subcastename"  id="subcaste" value="<?php echo $subcaste_name; ?>"  readOnly=true placeholder="None" /></td>
											
										</tr>
										<tr>
											<td colspan="2">Gender<p>*</p></td>
											<td colspan="2">
											<select name="gender" required >
											<option <?php if($gender=="GIRL") echo 'selected="selected"'; ?> >GIRL</option>	
											<option <?php if($gender=="BOY") echo 'selected="selected"'; ?> >BOY</option>
											</datalist></td>
										</tr>
										<tr>
											<td colspan="2">Adhaar Card No</td>
											<td colspan="2"><input width="250px" type="text" id="tbNum" onkeyup="addHyphen(this)" onkeypress="isInputNumber(event)"
										placeholder="Type some values here" name="adharno" maxlength="14" value="<?php echo wordwrap($adhar_number,4,'-',true);  ?>" pattern="[0-9]{4}-[0-9]{4}-[0-9]{4}" />
										(12 digit number)</td>
										</tr>
										<tr>
											<td colspan="2">Mother name<p>*</p></td>
											<td colspan="2"><input style='width:250px;'  type="text" name="mothername" value="<?php echo $mother_name; ?>" required /></td>
										</tr>
										<tr>
											<td colspan="2">Father name<p>*</p></td>
											<td colspan="2"><input style='width:250px;'  type="text" name="fathername" value="<?php echo $father_name; ?>" required /></td>
										</tr>
										<tr>
											<td colspan="2" rowspan="2">Occupation </td>
											<td colspan="1">Father<p>*</p> </td>
											<td colspan="1"><input style='width:250px;'  type="text" name="foccupation" value="<?php echo $foccupation; ?>" required /></td>
										</tr>
										<tr>
											<td colspan="1">mother </td>
											<td colspan="1"><input style='width:250px;'  type="text" name="moccupation" value="<?php echo $moccupation; ?>"/></td>
										</tr>
										<tr>
											<td colspan="2">Nationality</td>
											<td colspan="2"><input style='width:250px;'   type="text" readonly="India"  value="India"/></td>
										</tr>
										<tr>
											<td colspan="2">Address<p>*</p></td>
											<td colspan="2"><textarea name="Address" rows="4" cols="60" width="300px" required style="text-transform:uppercase;"> <?php echo $Address; ?></textarea></td>
										</tr>
										<tr>
											<td colspan="2">Whether Living With Parent </td>
											<?php 
											if($living=="Yes"){
												?>
												<td colspan="2">Yes<input width="20px" type="radio" name="living" value="Yes" checked />
												No <input type="radio" name="living"  value="<?php echo $living; ?>"/></td>
												<?php
											}else{
												?>
												<td colspan="2">Yes<input width="20px" type="radio" name="living" value="Yes"  />
												No <input  type="radio" name="living"  value="No" checked /></td>
												<?php
											}
											?>	
										</tr>
										<tr>
											<td colspan="2">Last school studied</td>
											<td colspan="2"><input style='width:250px;'   type="text" name="schoolname" placeholder='none' value="<?php echo $schoolname; ?>" /></td>
										</tr>
										<tr>
											<td colspan="2">Transfer Certificate No</td>
											<td colspan="2"><input style='width:250px;'  type="number_format" name="tcno" placeholder='none' onkeypress="isInputNumber(event)" value="<?php echo $tcno; ?>" /></td>
										</tr>
										<tr>
											<td colspan="2">Religion<p>*</p></td>
											<td colspan="2"><input style='width:250px;'  type="text" name="religion" value="<?php echo $religion; ?>" required /></td>
										</tr>
										<tr>
											<td colspan="2">Medium Of Instruction<p>*</p></td>
											<td colspan="2"><input style='width:250px;'  type="text" name="medium" value="<?php echo $medium; ?>" required /></td>
										</tr>
										<tr>
											<td colspan="2">First language<p>*</p></td>
											<td colspan="2"><input style='width:250px;'  type="text" name="firstl" value="<?php echo $firstl; ?>" required /></td>
										</tr>
										<tr>
											<td colspan="2">Second language<p>*</p></td>
											<td colspan="2"><input style='width:250px;'  type="text" name="secondl" value="<?php echo $secondl; ?>" required /></td>
										</tr>
										<tr>
											<td colspan="2">Physically Handicapped or not</td>
											<?php
											if($handicap=="Yes"){
												?>
												<td colspan="2">Yes<input  type="radio" name="ph" value="Yes" checked />
												No <input  type="radio" name="ph" value="No"/></td>
												<?php
											}else{
												?>
												<td colspan="2">Yes<input width="20px" type="radio" name="ph" value="Yes" />
												No <input type="radio" name="ph" value="No" checked /></td>
												<?php
											}
											?>
										</tr>
										<tr>
											<td colspan="2" rowspan="2">Personal marks of Identification<p>*</p></td>
											<td>1.</td>
											<td><textarea name="mole1" rows="2" width="300px"  cols="60"  placeholder="not more 200 letters including spaces" style="text-transform:uppercase;"><?php echo $mole1; ?></textarea></td>
											
											
										</tr>
										<tr>
											<td>2.</td>
											<td><textarea name="mole2" rows="2" width="300px"  cols="60" placeholder="not more 200 letters including spaces" style="text-transform:uppercase;"><?php echo $mole2; ?></textarea></td>
										</tr>
										<tr>
											<td colspan="2"><label>Studying Class<p>*</p>:</label></td>
											<td colspan="2"><select name="class" class="input" style="width:200px; margin-top:10px;" id="classlist" required >
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
											</select><br><br></td>
										</tr>
										<tr>
											<td colspan="2">Mobile Number<p>*</p></td>
											<td colspan="2"><input style='width:250px;'   type="text" onkeypress="isInputNumber(event)" name="phone" maxlength="10" placeholder="1234565678" pattern="[0-9]{10}" required value="<?php echo $Mobile_Number; ?>"/></td>
										</tr>
									</table>
									<input type="hidden" name="ima" value="<?php echo $image; ?>"/>
									<input type="submit" name="update1" value="update" class="but" style=" display:block; margin-top:8px; margin-left:auto; margin-right:auto;"/>
									</form>
								</div>
							</div>
<!--End of Edit Form-->							
						<?php
					}
				?>	
</div>	
<?php
			if(isset($_POST["update1"])){
				$admission_date=$_POST['admndate'];
				$img=$_POST['ima'];
				$year1=date('Y',strtotime($admission_date));
				$classes=array("NURSERY","LKG","UKG",1,2,3,4,5,6,7,8,9,10);
				
				$image=$img;
				
				$adhar_number=$_POST['adharno'];
				$success=0;
				$error=0;
				$fail=0;
//adharno check				
				if(!empty($adhar_number)){
					$con=mysqli_connect("localhost","root","","studentinfo");
					$sql="SELECT * FROM Studentinformation where adharno='$adhar_number'";
					
					$result=mysqli_query($con,$sql);
					if(mysqli_num_rows($result) >0 || strlen($adhar_number)<14)
					{
						$fail=1;
					}	
				}else{
					$adhar_number='0000-0000-0000';
				}
				
			
				if($_POST['id']!=""  && $_POST["name"]!="" && $_POST['gender']!="" && $_POST['fathername']!="" && $_POST['mothername']!="" && $_POST['dateofbirth']!="" && $_POST['caste']!="" && $_POST['foccupation']!=""   && $_POST['religion']!="" && $_POST['mother_tongue']!="" && $_POST['admndate']!=""  && $_POST['phone']!="" && $_POST['class']!="" && $_POST['admnclass']!=" "  && $_POST['Address']!=""   && $_POST['ph']!="" && $_POST['medium']!="" && $_POST['firstl']!="" && $_POST['secondl']!=""  && $fail==0 ){ 
					
					
					
					$id=$_POST['id'];
					$admnclass=strtoupper($_POST['admnclass']);
					$admission_date=$_POST['admndate'];
					$name=strtoupper($_POST['name']);
					$mother_tongue=strtoupper($_POST['mother_tongue']);
					$dateofbirth=$_POST['dateofbirth'];
					$dob=$_POST['dob'];
					$caste=strtoupper($_POST['caste']);
					$subcaste_name=strtoupper($_POST['subcastename']);
					$gender=strtoupper($_POST['gender']);
						
					$father_name=strtoupper($_POST['fathername']);
					$mother_name=strtoupper($_POST['mothername']);
					$foccupation=strtoupper($_POST['foccupation']);
					$moccupation=strtoupper($_POST['moccupation']);
					$Address=strtoupper($_POST['Address']);
					if(isset($_POST['living']))
					{
						$living=strtoupper($_POST['living']);
						
					}
					$schoolname=strtoupper($_POST['schoolname']);
					$tcno=strtoupper($_POST['tcno']);
					$religion=strtoupper($_POST['religion']);
					$medium=strtoupper($_POST['medium']);
					$firstl=strtoupper($_POST['firstl']);
					$secondl=strtoupper($_POST['secondl']);
					if(isset($_POST['ph']))
					{
						$handicap=strtoupper($_POST['ph']);
						
					}
					$mole1=strtoupper($_POST['mole1']);
					$mole2=strtoupper($_POST['mole2']);
					$class=strtoupper($_POST['class']);
					$Mobile_Number=$_POST['phone'];
					
					$add=$Address;
					
					//-------------------total fee calculation-------------------------------
					
					$a=0;
					while($a<=13)
					{
						if($classes[$a]==$class){
							break;
						}
						$a++;			
					}
					$b=0;
					while($a<=13)
					{
						if($classes[$b]==$admnclass){
							break;
						}
						$b++;			
					}
					
					
					if($b<=$a){
						$adhar_number=preg_replace("/[^A-Za-z0-9]/",'',$adhar_number);
						
									
						$conn=mysqli_connect("localhost","root","","studentinfo");
						if(!$conn){
							die('Could not Connect My Sql:' .mysql_error());
						}
						
//updating details						
						$sql = "UPDATE studentinformation SET image='$image',id='$id',admnclass='$admnclass',admndate='$admission_date',name='$name',mothertongue='$mother_tongue',dateofbirth='$dateofbirth',caste='$caste',subcastename='$subcaste_name',gender='$gender',adharno='$adhar_number',mothername='$mother_name',fathername='$father_name',fatherocp='$foccupation',motherocp='$moccupation',address='$add',wlparent='$living',lastschool='$schoolname',tcno='$tcno',religion='$religion',medium='$medium',firstlan='$firstl',secondlan='$secondl',phd='$handicap',mole1='$mole1',mole2='$mole2',class='$class',phone='$Mobile_Number' WHERE id='$id'";
						if (mysqli_query($conn, $sql)) {
							$success=1;
						} else {
							$fail=1;
						}
	
					}
					else{
						$error=1;
					}
					if($success==1){
//sucess message						
						?>
							<script> document.body.style.overflow="hidden";</script>
							<div id="popup2">
							<div class="alert success">
							<span class="closebtn" onclick="document.getElementById('popup2').style.display='none'; document.body.style.overflow='visible'; ">&times;</span>  
							<strong>Success!</strong> Details Successfully Saved.
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
					if($fail==1){
//Adhar Number error						
						?>
							<script> document.body.style.overflow="hidden";</script>
							<div id="popup2">
							<div class="alert warning">
							<span class="closebtn" onclick='document.body.style.overflow="visible"; '>&times;</span>  
							<strong>Warning!</strong> Duplicate Adhar Number.
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
					if($error==1){
//class error						
						?>
							<script> document.body.style.overflow="hidden";</script>
							<div id="popup2">
							<div class="alert warning">
							<span class="closebtn" onclick='document.body.style.overflow="visible";'>&times;</span>  
							<strong>Warning!</strong> Admitted Class Should Be Lower than Class.
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
			}
		if($iderror==1){
//admission no not found message						
			?>
				<script> document.body.style.overflow="hidden";</script>
				<div id="popup2">
				<div class="alert">
				<span class="closebtn" onclick="document.getElementById('popup2').style.display='none');">&times;   
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
			//Name Not Found Error						
			?>
			<script> document.body.style.overflow="hidden";</script>
			<div id="popup2">
				<div class="alert">
				<span class="closebtn" onclick="document.getElementById('popup2').style.display='none');" >&times;   
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
<!--javascripts-->
<script>
function isInputNumber(evt){
                
        var ch = String.fromCharCode(evt.which);
        
        if(!(/[0-9]/.test(ch))){
            evt.preventDefault();
        }
        
    }
	function toggleshare()
	{
		var b=document.getElementById('castein').value;
		if(b!="OC"){
			document.getElementById('subcaste').placeholder="";
			document.getElementById('subcaste').readOnly= false;
		}
		else{
			document.getElementById('subcaste').readOnly= true;
			document.getElementById('subcaste').placeholder="None";
		}
	}
function addHyphen(element) {
		//----------------ADHAR FORMAT--------------------
    	let ele = document.getElementById(element.id);
        ele = ele.value.split('-').join('');    // Remove dash (-) if mistakenly entered.

        let finalVal = ele.match(/.{1,4}/g).join('-');
        document.getElementById(element.id).value = finalVal;
    }	
ones=["ZERO","ONE","TWO","THREE","FOUR","FIVE","SIX","SEVEN","EIGHT","NINE"];
months=["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
document.getElementById('datepicker').addEventListener("blur", getMyDateValue)
	var x=document.getElementById('datepicker').value;

	var arr=x.split("-");
	var year=arr[0];
	var month=arr[1];
	var date=arr[2];
	
	
	var date1=ones[date[0]];
	
	var date2=ones[date[1]];
	
	var year1=ones[year[0]];
	
	var year2=ones[year[1]];
	
	var year3=ones[year[2]];
	
	var year4=ones[year[3]];
	
	let longMonth = x.toLocaleString('en-us', { month: 'long' });
	var inwords=date1+" " +date2+"    " +months[month-1]+"    " + year1+" "  + year2+" "  +year3+" "  +year4;
	inwords=inwords.toUpperCase();
	document.getElementById('words').value=inwords;
function getMyDateValue(e) {
	var x=document.getElementById('datepicker').value;

	var arr=x.split("-");
	var year=arr[0];
	var month=arr[1];
	var date=arr[2];
	
	
	var date1=ones[date[0]];
	
	var date2=ones[date[1]];
	
	var year1=ones[year[0]];
	
	var year2=ones[year[1]];
	
	var year3=ones[year[2]];
	
	var year4=ones[year[3]];
	
	let longMonth = x.toLocaleString('en-us', { month: 'long' });
	var inwords=date1+" " +date2+"    " +months[month-1]+"    " + year1+" "  + year2+" "  +year3+" "  +year4;
	inwords=inwords.toUpperCase();
	document.getElementById('words').value=inwords;
	
}

	
</script>
<script>
	
	var dd_main = document.querySelector(".dd_main");

	dd_main.addEventListener("click", function(){
		this.classList.toggle("active");
	})	
	
	
	
	
	
	var close = document.getElementsByClassName("closebtn");
	var i;
	
	for (i = 0; i < close.length; i++) {
	close[i].onclick = function(){
		var div = this.parentElement;
		div.style.opacity = "0";
		setTimeout(function(){ history.back(); }, 600);
	}
	}
	
	  
	function change(){
		document.getElementById('inputimg').style.display="flex";
		document.querySelector('.popup').style.display="flex";
		document.querySelector('.hidden').style.display="none";
	document.getElementById('mark').addEventListener('click', closeNav);
	function closeNav() {
		
		document.getElementById("check").checked = false;
  
	}
	
	
	
	
	
</script>
	
</body>
<!--End of body-->
</html>