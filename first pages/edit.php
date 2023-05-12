<?php
session_start(); 
ob_start();
$conn=mysqli_connect("localhost","root","","studentinfo");
?>
<html lang="en" dir="ltr">
<!-- head-->
  <head>
    <meta charset="utf-8">
    <title>Sidebar Dashboard Template</title>
    <link rel="stylesheet" href="editstyle.css">
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
			
		</nav>	
			
	
	</div>
<!--sidebar end-->

<!--main content-->

    <div class="content" id="mark" >
		<div class="location"><h4>Admission >>Edit Application</h4></div><!--location-->
		<div class="main"  >
		
<!--search forms-->
			<div style="text-align:center; margin-bottom:20px;">
			<label style=" margin-bottom:20px;">Search By:</label>
					<select name="status" id="selector" style="width:200px; font-size:16px;" onchange="toggleshared();" required >
					<option value="Admission">Admission No</option>
					<option value="Name" >Name</option>	
					
					</select>
			</div>		
				<form method="post" id="id" style="text-align:center;">
					<label  >Admission No</label>
					<input type="text" name="admnno" onkeypress="isInputNumber(event)" required />
					<input type="submit" value="Search" class="but" name="submit1" required />
				</form>
				<form method="post" id="name" style="text-align:center;">
					<label >Name:</label>
					<input type="text" name="name" required />
					<input type="submit" value="Search" class="but" name="submit2"/>
				</form>	
				<?php
				$id='';
				$m=0;
				$adno=" ";
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
				$cannot=0;
				$yesterday=date('Y-m-d',strtotime("-1 days"));
				$cannot1=0;
				if(isset($_POST['submit1'])){
					$id=$_POST['admnno'];
					$query=mysqli_query($conn,"select * from studentinformation where id='$id' ");//fetchng details based on id
					$count=mysqli_num_rows($query);
					if($count==1)
					{
						$query=mysqli_query($conn,"SELECT * FROM studentinformation where id='$id' And admndate >='$yesterday'");//fecthing details based on id and admission date
						$count=mysqli_num_rows($query);
						if($count==1)
						{
							$m=1;
						}else{
							$cannot=2;
						}
					}
					else{	
					
//Admission no error
					
						?>
							<script> document.body.style.overflow="hidden";</script>
							<div id="popup2">
							<div class="alert">
							<span class="closebtn" onclick="document.getElementById('popup2').style.display='none');">&times;</span>  
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
				}
				
				if(isset($_POST['submit2'])){
					$name=$_POST['name'];
					$query=mysqli_query($conn,"select * from studentinformation where name like '%$name%'");  //fecthing details based on name
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
						
//listing two or more similar names 
						
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
						$cannot=2;
						$sql = "SELECT * FROM studentinformation where name like '%$name%' And admndate>='$yesterday'"; //fecthing details
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
					}else{	
					
						//Name Not Found Error
						
						?>
						<script> document.body.style.overflow="hidden";</script>
						<div id="popup2">
							<div class="alert">
							<span class="closebtn" onclick="document.getElementById('popup2').style.display='none');" >&times;</span>  
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
					
				}
				if(isset($_POST['select'])){
					$cannot=2;
					$id=$_POST['adno'];
					
//fecthing details based on selection
					
					$sql = "SELECT * FROM studentinformation where id='$id' And admndate>='$yesterday'"; 
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
				}
				if($m==1)
				{
//fecthing details usind id
					
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
					
						
				}
				if($cannot==2){
					
// details cannot be modified Error
				
					?>
						<script> document.body.style.overflow="hidden";</script>
						<div id="popup2">
						<div class="alert warning">
						<span class="closebtn" onclick='document.body.style.overflow="visible";'>&times;</span>  
						<strong>Warning!</strong> You cannot modify the details.
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

<!--appilication form-->
				
			<form method="POST" enctype="multipart/form-data">

			<div class="flex1" id="myDIV" >
				<div class="fill"  >
					<div class="flex"  >
						<div class="school">
							<img src="../images/logo.png" class="logo1" alt="">
							<h4>VISHAVAI VIDYANIKETAN HIGH SCHOOL<br><nav class="normal">(Recognised by Govt. of T.S.)<br>Rajiv Gandhi Nagar, Kukatpally, HYDERABAD - 500037, Medchal Dist.</nav></h4>
						</div>
						
<!-- image box-->	

						<div class="photo">
							
							<img id="output_image" src="http://placehold.it/180"/>
							<input type="file" accept="image/*"  name="image" onchange="preview_image(event)" />
							
						</div>
					</div>
					
<!--first Box in Application-->	
				
					<div class="heading">
						<h3>APPLICATION FOR ADMISSION</h3>
					</div>
					<div class="basic">
						<label>Admission No<p>*</p>:</label>
						<input class="input" onkeypress="isInputNumber(event)" type="text" name="admission_no" class="admission_no"  value="<?php echo $adno; ?>" required readonly /><br><br>
						<label>Class Admitted<p>*</p>:</label>
						<select name="admnclass" style="width:270px;" required >
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
						</select><br><br>						
						<label>Date Of Admission<p>*</p>:</label>
						<input class="input"  type="date" name="admndate" value="<?php echo $admission_date; ?>" required >
					</div>

<!-- Application Front page-->	
				
					<div class="need">
						<table>
							<tr>
								<td colspan="2">Name Of The Pupil<p>*</p></td>
								<td colspan="2"><input type="text" name="name" style="width:250px;" value="<?php echo $name; ?>" required /></td>
							</tr>
							<tr>
								<td colspan="2">Mother Tongue<p>*</p></td>
								<td colspan="2"><input type="text" name="mother_tongue" value="<?php echo $mother_tongue; ?>" required /></td>
							</tr>
							<tr>
								<td rowspan="2"colspan="2" >Date of Birth<p>*</p></td>
								<td>(infigures)</td>
								<td><input type="date" id="datepicker" name="dateofbirth" value="<?php echo $dateofbirth; ?>" required /></td>
								
							</tr>
							<tr>
								<td colspan="1">(inwords)</td>
								<td colspan="1"><input type="text"  id="words" name="dob" style="width:250px; font-size:10px;" value="" readOnly></td>
							</tr>
								<tr>
								<td width="25%">Caste<p>*</p></td>
								<td width="25%"><select name="caste" id="castein" style="width:100px;" onchange="toggleshare()"   >
								<option> </option>	
								<option <?php if($caste=="OC") echo 'selected="selected"';?>>OC</option>	
								<option <?php if($caste=="BC-A") echo 'selected="selected"';?>>BC-A</option>
								<option <?php if($caste=="BC-B") echo 'selected="selected"';?>>BC-B</option>
								<option <?php if($caste=="BC-C") echo 'selected="selected"';?>>BC-C</option>
								<option <?php if($caste=="BC-D") echo 'selected="selected"';?>>BC-D</option>
								<option <?php if($caste=="BC-E") echo 'selected="selected"';?>>BC-E</option>
								<option <?php if($caste=="SC") echo 'selected="selected"';?>>SC</option>
								<option <?php if($caste=="ST") echo 'selected="selected"';?>>ST</option>
								</select></td>
								
								<td  width="20%">Subcaste Name<p>*</p> </td>
								<td  width="30%"><input type="text" name="subcastename"  id="subcaste" value="<?php echo $subcaste_name; ?>"  readOnly=true placeholder="None" /></td>

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
								<td colspan="2"><input type="text" id="tbNum" onkeyup="addHyphen(this)" onkeypress="isInputNumber(event)"
							placeholder="Type some values here" name="adharno" maxlength="14" value="<?php echo wordwrap($adhar_number,4,'-',true);  ?>" pattern="[0-9]{4}-[0-9]{4}-[0-9]{4}" />
							(12 digit number)</td>
							</tr>
							<tr>
								<td colspan="2">Mother name<p>*</p></td>
								<td colspan="2"><input type="text" name="mothername" value="<?php echo $mother_name; ?>" required /></td>
							</tr>
							<tr>
								<td colspan="2">Father name<p>*</p></td>
								<td colspan="2"><input type="text" name="fathername" value="<?php echo $father_name; ?>" required /></td>
							</tr>
							<tr>
								<td colspan="2" rowspan="2">Occupation </td>
								<td colspan="1">Father<p>*</p> </td>
								<td colspan="1"><input type="text" name="foccupation" value="<?php echo $foccupation; ?>" required /></td>
							</tr>
							<tr>
								<td colspan="1">Mother </td>
								<td colspan="1"><input type="text" name="moccupation" value="<?php echo $moccupation; ?>"/></td>
							</tr>
							<tr>
								<td colspan="2">Nationality</td>
								<td colspan="2"><input type="text" readonly="India"  value="India"/></td>
							</tr>
						</table>
					</div>
				</div>
				
<!-- Application Back page-->		
			
				<div class="table"  >
					<div class="need1">
						<table>
							<tr>
								<td>Address<p>*</p></td>
								<td colspan="2"><textarea name="Address" rows="4" cols="30"  required style="text-transform:uppercase;"> <?php echo $Address; ?></textarea></td>
							</tr>
							<tr>
								<td>Whether Living With Parent </td>
								<?php 
								if($living=="Yes"){
									?>
									<td colspan="2">Yes<input type="radio" name="living" value="Yes" checked />
									No <input type="radio" name="living"  value="<?php echo $living; ?>"/></td>
									<?php
								}else{
									?>
									<td colspan="2">Yes<input type="radio" name="living" value="Yes"  />
									No <input type="radio" name="living"  value="No" checked /></td>
									<?php
								}
								?>	
							</tr>
							<tr>
								<td>Last school studied</td>
								<td colspan="2"><input type="text" name="schoolname" placeholder='none' value="<?php echo $schoolname; ?>" /></td>
							</tr>
							<tr>
								<td>Transfer Certificate No</td>
								<td colspan="2"><input type="number_format" name="tcno" placeholder='none' onkeypress="isInputNumber(event)"  value="<?php echo $tcno; ?>" /></td>
							</tr>
							<tr>
								<td>Religion<p>*</p></td>
								<td colspan="2"><input type="text" name="religion" value="<?php echo $religion; ?>" required /></td>
							</tr>
							<tr>
								<td>Medium Of Instruction<p>*</p></td>
								<td colspan="2"><input type="text" name="medium" value="<?php echo $medium; ?>" required /></td>
							</tr>
							<tr>
								<td>First language<p>*</p></td>
								<td colspan="2"><input type="text" name="firstl" value="<?php echo $firstl; ?>" required /></td>
							</tr>
							<tr>
								<td>Second language<p>*</p></td>
								<td colspan="2"><input type="text" name="secondl" value="<?php echo $secondl; ?>" required /></td>
							</tr>
							<tr>
								<td>Physically Handicapped or not</td>
								<?php
								if($handicap=="Yes"){
									?>
									<td colspan="2">Yes<input type="radio" name="ph" value="Yes" checked />
									No <input type="radio" name="ph" value="No"/></td>
									<?php
								}else{
									?>
									<td colspan="2">Yes<input type="radio" name="ph" value="Yes" />
									No <input type="radio" name="ph" value="No" checked /></td>
									<?php
								}
								?>
							</tr>
							<tr>
								<td width="45%" rowspan="2">Personal marks of Identification</td>
								<td width="5%">1.</td>
								<td width="50%"><textarea name="mole1" rows="2" cols="30"  placeholder="not more 200 letters including spaces" style="text-transform:uppercase;"><?php echo $mole1; ?></textarea></td>
								
								
							</tr>
							<tr>
								<td width="5%">2.</td>
								<td width="50%"><textarea name="mole2" rows="2" cols="30" placeholder="not more 200 letters including spaces" style="text-transform:uppercase;"><?php echo $mole2; ?></textarea></td>
							</tr>
							<tr>
								<td><label>Studying Class<p>*</p>:</label></td>
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
								<td>Mobile Number<p>*</p></td>
								<td colspan="2"><input type="text" onkeypress="isInputNumber(event)" name="phone" maxlength="10" placeholder="1234565678" pattern="[0-9]{10}" required value="<?php echo $Mobile_Number; ?>"/></td>
							</tr>
							
						</table>
						<div class="declare">
							<h4>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp I declare that the statement given below is correct and that the pupil has not attended any other school beside those mentioned above.
							</h4>
							<h3 style="margin-left:0px;">Station:<br>Date:   <span class="signature">Signature of Parent<br><p style="color:black;"> or guardian</p></span></h3>						
						</div>
						<div class="headmaster">
							<span style="font-size:11; display:block; font-weight:bold;  text-align:center;" >ORDER OF THE HEAD OF THE SCHOOL</span>	
							<h3> Signature of the Head Master<br>Date:</h3>	
						</div>
					</div>
				</div>
			</div>
			<input type="submit" name="update" value="update" class="but" style=" display:block; margin-top:8px; margin-left:auto; margin-right:auto;"/>
		</form>
		
<!--End of Application Form-->		
		</div>
			
	</div>
	
<!--End of content-->	
	
		<?php
//Updating Details		
			if(isset($_POST["update"])){
				$admission_date=$_POST['admndate'];
				$year1=date('Y',strtotime($admission_date));
				$classes=array("NURSERY","LKG","UKG",1,2,3,4,5,6,7,8,9,10);
				$filename=$_FILES['image']['name'];
				$temp_dir=$_FILES['image']['tmp_name'];
				$image ="F:/".$year1."/".$filename;
				$adhar_number=$_POST['adharno'];
				$success=0;
				$error=0;
				$fail=0;
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
				
			
				if($_POST['admission_no']!=""  && $_POST["name"]!="" && $_POST['gender']!="" && $_POST['fathername']!="" && $_POST['mothername']!="" && $_POST['dateofbirth']!="" && $_POST['caste']!="" && $_POST['foccupation']!=""   && $_POST['religion']!="" && $_POST['mother_tongue']!="" && $_POST['admndate']!=""  && $_POST['phone']!="" && $_POST['class']!="" && $_POST['admnclass']!=" "  && $_POST['Address']!=""   && $_POST['ph']!="" && $_POST['medium']!="" && $_POST['firstl']!="" && $_POST['secondl']!=""  && $fail==0 ){ 
					
					
					
					$id=$_POST['admission_no'];
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
					
					//checking condition between admitted class and studying class
					if($b<=$a){
						$adhar_number=preg_replace("/[^A-Za-z0-9]/",'',$adhar_number);
						?>
						
<!--A4 page View of Application Form-->

							<div id="popup">
								<div class="popup-content" id="print1">
									<img class="close" src="../images/close.png" onclick="window.location.href='edit.php';">
									<div class="fill1"  >
										<div class="flex"  >
											<div class="school1">
												<img src="../images/logo.png" class="logo11" alt="">
												<h4>VISHAVAI VIDYANIKETAN HIGH SCHOOL<br><nav class="normal1">(Recognised by Govt. of T.S.)<br>Rajiv Gandhi Nagar, Kukatpally, HYDERABAD - 500037, Medchal Dist.</nav></h4>
											</div>
											<div class="photo1">
												
													<?php echo"<img src='{$image}' height='219' width='254' class='img'>"; ?>
											</div>
										</div>
										<div class="heading1">
											<h3 class="hed">APPLICATION FOR ADMISSION</h3>
										</div>
										<div class="basic1">
											<label>Admission No:</label>
											<span><?php  echo $id;  ?></span><br><br>
											<label>Class Admitted:</label>
											<span><?php echo $admnclass; ?></span><br><br>					
											<label>Date Of Admission:</label>
											<span><?php echo date('d-m-Y',strtotime($admission_date));?></span>
										</div>
										<div class="need12">
											<table>
												<tr>
													<td colspan="2">Name Of The Pupil</td>
													<td colspan="2"><span><?php echo $name;?></span></td>
												</tr>
												<tr>
													<td colspan="2">Mother Tongue</td>
													<td colspan="2"><span><?php echo $mother_tongue;  ?></span></td>
												</tr>
												<tr>
													<td rowspan="2"colspan="2" >Date of Birth</td>
													<td>(infigures)</td>
													<td><span><?php echo date('d-m-Y',strtotime($dateofbirth)); ?></span></td>
													
												</tr>
												<tr>
													<td colspan="1">(inwords)</td>
													<td colspan="1"><span style="font-size:10px;"><?php  echo strtoupper($dob);?></span></td>
												</tr>
													<tr>
													<td width="25%">Caste</td>
													<td width="25%"><span><?php  echo $caste; ?></span></td>
													<td  width="20%">Subcaste Name </td>
													<td  width="30%"><span><?php echo $subcaste_name; ?></span></td>
													
												</tr>
												<tr>
													<td colspan="2">Gender</td>
													<td colspan="2"><span><?php echo $gender;?></span></td>
												</tr>
												<tr>
													<td colspan="2">Adhaar Card No</td>
													<td colspan="2"><span><?php  echo $adhar_number;  ?></span></td>
												</tr>
												<tr>
													<td colspan="2">Mother name</td>
													<td colspan="2"><span><?php echo $father_name ?></span></td>
												</tr>
												<tr>
													<td colspan="2">Father name </td>
													<td colspan="2"><span><?php echo $mother_name; ?></span></td>
												</tr>
												<tr>
													<td colspan="2" rowspan="2">Occupation </td>
													<td colspan="1">Father </td>
													<td colspan="1"><span><?php echo $foccupation; ?></span></td>
												</tr>
												<tr>
													<td colspan="1">mother </td>
													<td colspan="1"><span><?php echo $moccupation; ?></span></td>
												</tr>
												<tr>
													<td colspan="2">Nationality</td>
													<td colspan="2"><span><?php echo $State="India";       ?></span></td>
												</tr>
											</table>
										</div>
									</div>
									<div class="table1">
									<div class="need11">
										<table>
											<tr>
												<td>Address</td>
												<td colspan="2"><span><?php echo $add; ?></span></td>
											</tr>
											<tr>
												<td>Whether Living With Parent </td>
												<td colspan="2"><span><?php  echo $living;  ?></span></td>
											</tr>
											<tr>
												<td>Last school studied</td>
												<td colspan="2"><span><?php    echo $schoolname; ?></span></td>
											</tr>
											<tr>
												<td>Transfer Certificate No</td>
												<td colspan="2"><span><?php echo $tcno; ?></span></td>
											</tr>
											<tr>
												<td>Religion</td>
												<td colspan="2"><span><?php   echo $religion; ?></span></td>
											</tr>
											<tr>
												<td>Medium Of Instruction</td>
												<td colspan="2"><span><?php    echo $medium;?></span></td>
											</tr>
											<tr>
												<td>First language</td>
												<td colspan="2"><span><?php   echo $secondl;  ?></span></td>
											</tr>
											<tr>
												<td>Second language</td>
												<td colspan="2"><span><?php    echo $firstl; ?></span></td>
											</tr>
											<tr>
												<td>Physically Handicapped or not</td>
												<td colspan="2"><span><?php echo $handicap; ?></span></td>
											</tr>
											<tr>
												<td width="45%" rowspan="2">Personal marks of Identification</td>
												<td width="5%">1.</td>
												<td width="50%"><span><?php echo $mole1; ?></span></td>
												
												
											</tr>
											<tr>
												<td width="5%">2.</td>
												<td width="50%"><span><?php echo $mole2; ?></span></td>
											</tr>
											<tr>
												<td><label>Studying Class:</label></td>
												<td colspan="2"><span><?php echo $class;?></span></td>
											</tr>
											<tr>
												<td>Mobile Number</td>
												<td colspan="2"><span><?php   echo $Mobile_Number; ?></span></td>
											</tr>
											
										</table>
										<div class="declare1">
											<h4>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp I declare that the statement given below is correct and that the pupil has not attended any other school beside those mentioned above.
											</h4>
											<h3 style="margin-left:opx;">Station:<br>Date:   <span class="signature" >Signature of Parent<br><p> or guardian</p></span></h3>						
										</div>
										<div class="headmaster1">
											<p style="font-size:18px; font-weight:bold; text-align:center;" >ORDER OF THE HEAD OF THE SCHOOL</p>	
											<h3 style="float:right"> Signature of the Head Master<br>Date:</h3>	
										</div>
									</div>
									</div>
									
									<input type="submit" id='bu' value="print" class="but" style=" display:block; margin-left:auto; margin-right:auto; "onclick="printDiv('print1'); document.getElementById('bu').style.display='none';" />
									
									<?php
									
											$conn=mysqli_connect("localhost","root","","studentinfo");
											if(!$conn){
												die('Could not Connect My Sql:' .mysql_error());
											}
											
//updating Details	
										
											$sql = "UPDATE studentinformation SET image='$image',id='$id',admnclass='$admnclass',admndate='$admission_date',name='$name',mothertongue='$mother_tongue',dateofbirth='$dateofbirth',caste='$caste',subcastename='$subcaste_name',gender='$gender',adharno='$adhar_number',mothername='$mother_name',fathername='$father_name',fatherocp='$foccupation',motherocp='$moccupation',address='$add',wlparent='$living',lastschool='$schoolname',tcno='$tcno',religion='$religion',medium='$medium',firstlan='$firstl',secondlan='$secondl',phd='$handicap',mole1='$mole1',mole2='$mole2',class='$class',phone='$Mobile_Number' WHERE id='$id'";
											if (mysqli_query($conn, $sql)) {
												$success=1;
											} else {
												$fail=1;
											}
										
									?>
									
									
								</div>
							</div>
<!--end of A4 page View-->
							
						<?php
						
					}
					else{
						$error=1;
					}
					if($success==1){
//details saved message						
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
						
//Adhar number Error												
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
//Class error											
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
		?>
	
	
<!--Login Form-->
		
		<div class="loginpopup">
			<div class="popup-content1">
		
			<img  class="user" src="../images/login.png">
					<img class="close" src="../images/close.png" onclick="document.querySelector('.loginpopup').style.display='none';">
					<br><span class="incorrect1">*incorrect username or password</span> 
					<form method="POST">
					<input type="text" name="username" autofocus placeholder="username" value="<?php if(isset($_POST['login'])) echo $_POST['username']; ?>">
					<input type="password" name="password" placeholder="password" value="<?php if(isset($_POST['login'])) echo $_POST['password']; ?>">
					<button type="submit"  class="myButton" value="login" name="login">login</button>
					</form>
						
			</div>
		</div>
<!--end of login form-->

		
<?php
	if(isset($_POST['login'])){
		$username=strtolower($_POST['username']);
		$password=$_POST['password'];
		$value=0;
//checking login details
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
			document.querySelector(".loginpopup").style.display="flex";
			document.querySelector(".incorrect1").style.display="flex";
			</script>
			<?php
		}
	}
?>		
  </body>
<!--End of Body-->


<!--javascript-->
  
  <script>
	

	document.getElementById('mark').addEventListener('click', closeNav);
	function closeNav() {
		
		document.getElementById("check").checked = false;
  
	}
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
		document.getElementById('words').value=inwords;
		
	}
	function preview_image(event) 
	{
	var reader = new FileReader();
	reader.onload = function()
	{
	var output = document.getElementById('output_image');
	output.src = reader.result;
	}
	reader.readAsDataURL(event.target.files[0]);
	}
	function printDiv(myDIV) {
	
		var printContents = document.getElementById(myDIV).innerHTML;
		var originalContents = document.body.innerHTML;
	
		document.body.innerHTML = printContents;
	
		window.print();
	
		document.body.innerHTML = originalContents;
		
	}
	document.getElementById("change").addEventListener("click",function(){
		document.querySelector(".uploadimg").style.display="block;";
		document.querySelector(".showimg").style.display="none;";
	})
	document.querySelector(".close").addEventListener("click",function(){
		document.querySelector(".popup").style.display="none";
		document.body.style.overflow="visible";
	})
	function addHyphen(element) {
		//----------------ADHAR FORMAT--------------------
    	let ele = document.getElementById(element.id);
        ele = ele.value.split('-').join('');    // Remove dash (-) if mistakenly entered.

        let finalVal = ele.match(/.{1,4}/g).join('-');
        document.getElementById(element.id).value = finalVal;
    }
	
	var close = document.getElementsByClassName("closebtn");
	var i;
	
	for (i = 0; i < close.length; i++) {
	close[i].onclick = function(){
		var div = this.parentElement;
		div.style.opacity = "0";
		setTimeout(function(){ history.back(); }, 600);
	}
	}
	function isInputNumber(evt){
                
        var ch = String.fromCharCode(evt.which);
        
        if(!(/[0-9]/.test(ch))){
            evt.preventDefault();
        }
        
    }
	
  </script>
</html>
