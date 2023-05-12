<?php
session_start(); 
ob_start();
$conn=mysqli_connect("localhost","root","","studentinfo");
$result =mysqli_query($conn, "SELECT  MAX(id) as max FROM studentinformation");

//fetching Highest Admission
 while($res = mysqli_fetch_array($result)) { 

    $max = $res['max'];
	$no=$max+1;
			
 }
$query =mysqli_query($conn, "SELECT  id  FROM dropout where id='$no'");
While($row=mysqli_fetch_array($query))
{
	 $no=$no+1;
}
 
?>
<html lang="en">

<!--head-->
  <head>
    <meta charset="utf-8">
    <title>Sidebar Dashboard Template</title>
    <link rel="stylesheet" href="indexstyle.css">
    <link rel="stylesheet" href="../fontawesome-free-5.15.2-web/css/all.css">

  </head>
<!--End of Head-->

<!--body--> 
  <body>

    <input type="checkbox" id="check" >
 
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
			<img src="../images/schoollogo.png" class="profile_image" alt="">
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
		<?php
			if(isset($_POST["save"])){
				$admission_date=$_POST['admndate'];
				$year1=date('Y',strtotime($admission_date));
				$classes=array("NURSERY","LKG","UKG",1,2,3,4,5,6,7,8,9,10);
				$filename=$_FILES['image']['name'];
				$temp_dir=$_FILES['image']['tmp_name'];
				$image ="c:/".$year1."/".$filename;
				$fail=0;
				$id=$_POST['admission_no'];
					$admnclass=strtoupper($_POST['admnclass']);
					$admndate=$_POST['admndate'];
					$name=strtoupper($_POST['name']);
					$mother_tongue=strtoupper($_POST['mother_tongue']);
					$dateofbirth=$_POST['dateofbirth'];
					$dob=$_POST['dob'];
					$caste=strtoupper($_POST['caste']);
					$subcaste_name=strtoupper($_POST['subcastename']);
					
					$gender=strtoupper($_POST['gender']);
					$adhar_number=$_POST['adharno'];	
					$father_name=strtoupper($_POST['fathername']);
					$mother_name=strtoupper($_POST['mothername']);
					$foccupation=strtoupper($_POST['foccupation']);
					$moccupation=strtoupper($_POST['moccupation']);
					$State=$_POST['state'];
					$Address=strtoupper($_POST['Address']);
					if(isset($_POST['living']))
					{
						$living=strtoupper($_POST['living']);
						
					}
					$schoolname=strtoupper($_POST['schoolname']);
					$tcno=$_POST['tcno'];
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
					$success=0;
					$error=0;
					$iderror=0;
					if($class=='NURSERY' || $class=='UKG' || $class=='LKG'){
						$query=mysqli_query($conn,"select * from ppstudentinformation where id='$id' ");//fetchng details based on id
					}else{
						$query=mysqli_query($conn,"select * from studentinformation where id='$id' ");//fetchng details based on id
					}
					$count=mysqli_num_rows($query);
					if($count>0)
					{
						$iderror=1;
					}
					$query=mysqli_query($conn,"select * from dropout where id='$id' ");//fetchng details based on id
					$count=mysqli_num_rows($query);
					if($count>0)
					{
						$iderror=1;
					}
//Adhar Number Checking					
				if(!empty($adhar_number)){
					$con=mysqli_connect("localhost","root","","studentinfo");
					if($class=='NURSERY' || $class=='UKG' || $class=='LKG'){
						$sql="SELECT * FROM ppStudentinformation where adharno='$adhar_number'";
					}else{
						$sql="SELECT * FROM Studentinformation where adharno='$adhar_number'";
					}
					
					$result=mysqli_query($con,$sql);
					if(mysqli_num_rows($result) >0 || strlen($adhar_number)<14)
					{
						$fail=1;
					}	
				}else{
					$adhar_number='0000-0000-0000';
				}
				
			
				if($_POST['admission_no']!=""  && $_POST["name"]!="" && $_POST['gender']!="" && $_POST['fathername']!="" && $_POST['mothername']!="" && $_POST['dateofbirth']!="" && $_POST['caste']!="" && $_POST['foccupation']!=""   && $_POST['religion']!="" && $_POST['mother_tongue']!="" && $_POST['admndate']!=""  && $_POST['phone']!="" && $_POST['class']!="" && $_POST['admnclass']!=" "  && $_POST['Address']!=""   && $_POST['ph']!="" && $_POST['medium']!="" && $_POST['firstl']!="" && $_POST['secondl']!=""  && $fail==0 ){ 
					
					
					
					
					
					$add=$Address.",".$State;
					
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
					
					$academicyear=date('Y');
						
//checking admitted class and Studying Class
					if($b<=$a && $iderror==0){
						$adhar_number=preg_replace("/[^A-Za-z0-9]/",'',$adhar_number);
						?>
						
<!--A4 Page View-->						
							<div id="popup">
								<div class="popup-content" id="print1">
									<img class="close" src="../images/close.png" onclick="window.location.href='index.php'">
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
													<td>(inwords)</td>
													<td><span><?php  echo strtoupper($dob);?></span></td>
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
													<td colspan="1">Mother </td>
													<td colspan="1"><span><?php echo $moccupation; ?></span></td>
												</tr>
												<tr>
													<td colspan="2">Nationality</td>
													<td colspan="2"><span><?php echo $State;       ?></span></td>
												</tr>
											</table>
										</div>
									</div>
									<div class="table1">
									<div class="need11">
										<table>
											<tr>
												<td>Address</td>
												<td colspan="2"><span><?php echo $add=$Address.",".$State; ?></span></td>
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
												<td width="50%"><span><?php echo $mole2; ?></span></textarea></td>
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
											<h4>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp I declare that the statement given below is correct and that the pupil has not attended any other school beside those mentioned above.
											</h4>
											<h3 style="margin-left:0px; float:left;">Station:<br>Date:</h3><h3>   <span class="signature" style="padding-top:30px;">Signature of Parent<br><p style="color:black;"> or guardian</p></span></h3>						
										</div>
										<div class="headmaster1">
											<span style="font-size:18px; display:block; font-weight:bold;  text-align:center;" >ORDER OF THE HEAD OF THE SCHOOL</span>	
											<h3 style="float:right;"> Signature of the Head Master<br>Date:</h3>	
										</div>
									</div>
									</div>
									
									<input type="submit" value="print" class="but" style="margin-left:auto; margin-right:auto;" onclick="printDiv('print1')" />
									
									<?php
											
											$conn=mysqli_connect("localhost","root","","studentinfo");
											if(!$conn){
												die('Could not Connect My Sql:' .mysql_error());
											}
											if($class=='NURSERY' || $class=='UKG' || $class=='LKG'){
												$sql = "INSERT INTO ppstudentinformation(image,id,admnclass,admndate,name,mothertongue,dateofbirth,caste,subcastename,gender,adharno,mothername,fathername,fatherocp,motherocp,address,wlparent,lastschool,tcno,religion,medium,firstlan,secondlan,phd,mole1,mole2,class,phone,year) VALUES ('$image','$id','$admnclass','$admission_date','$name','$mother_tongue','$dateofbirth','$caste','$subcaste_name','$gender','$adhar_number'	,'$mother_name','$father_name','$foccupation','$moccupation','$add','$living','$schoolname','$tcno','$religion','$medium','$firstl','$secondl','$handicap','$mole1','$mole2','$class','$Mobile_Number','$academicyear' )";
											}else{
												$sql = "INSERT INTO studentinformation (image,id,admnclass,admndate,name,mothertongue,dateofbirth,caste,subcastename,gender,adharno,mothername,fathername,fatherocp,motherocp,address,wlparent,lastschool,tcno,religion,medium,firstlan,secondlan,phd,mole1,mole2,class,phone,year) VALUES ('$image','$id','$admnclass','$admission_date','$name','$mother_tongue','$dateofbirth','$caste','$subcaste_name','$gender','$adhar_number'	,'$mother_name','$father_name','$foccupation','$moccupation','$add','$living','$schoolname','$tcno','$religion','$medium','$firstl','$secondl','$handicap','$mole1','$mole2','$class','$Mobile_Number','$academicyear' )";
											}
											if (mysqli_query($conn, $sql)) {
												$success=1;
											}else{
												echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
											}
										
									?>
									
									
								</div>
							</div>
<!--End of A4 Page View-->							
						<?php
						
					}
					else{
						if($iderror==0){
							$error=1;
						}
					}
					
				}
					if($success==1){
						?>
<!--Successfully Saved-->						
							<script> document.body.style.overflow="hidden";</script>
							<div id="popup1">
							<div class="alert success">
							<span class="closebtn" onclick="document.getElementById('popup1').style.display='none'; ">&times;</span>  
							<strong>Success!</strong> Details Successfully Saved.
							</div>
							</div>
							<script>
							setTimeout(function(){
								document.body.style.overflow='visible'; 
								document.getElementById('popup1').style.display = 'none';
							}, 3000);
						</script>
						<?php
					}
					
					if($fail==1){
						?>
						
<!--Duplicate Adhar Number Error-->						
						<script> document.body.style.overflow="hidden"; </script>
							<div id="popup1">
							<div class="alert warning">
							<span class="closebtn" onclick='document.body.style.overflow="visible"; document.getElementById("popup1").style.display="none";'>&times;</span>  
							<strong>Warning!</strong> Duplicate Adhar Number.
							</div>
							</div>
						<script>
							setTimeout(function(){
								document.body.style.overflow='visible'; 
								document.getElementById('popup1').style.display = 'none';
							}, 3000);
						</script>
						
						<?php
					}

					if($error==1){
//Class Error						
						?>
						
							<script> document.body.style.overflow="hidden";</script>
							<div id="popup1">
							<div class="alert warning">
							<span class="closebtn" onclick='document.body.style.overflow="visible"; document.getElementById("popup1").style.display="none";'>&times;</span>  
							<strong>Warning!</strong> Admitted Class Should Be Lower than Class.
							</div>
							</div>
							<script>
							setTimeout(function(){
								document.body.style.overflow='visible'; 
								document.getElementById('popup1').style.display = 'none';
							}, 3000);
						</script>
						<?php
					}
					if($iderror==1){
//admission_no Error						
						?>
						
							<script> document.body.style.overflow="hidden";</script>
							<div id="popup1">
							<div class="alert warning">
							<span class="closebtn" onclick='document.body.style.overflow="visible"; document.getElementById("popup1").style.display="none";'>&times;</span>  
							<strong>Warning!</strong> Admission number already exist.
							</div>
							</div>
							<script>
							setTimeout(function(){
								document.body.style.overflow='visible'; 
								document.getElementById('popup1').style.display = 'none';
							}, 3000);
							</script>
						<?php
					}
			}
		?>
<!--Main Content--> 		
    <div class="content" id="main" >
		<div class="location"><h4>Admission >> Application</h4></div>
		<div class="main"  >
		<form method="POST" enctype="multipart/form-data">
			
			<div class="flex1" id="myDIV" >
<!--Logo And School Details-->				
				<div class="fill"  >
					<div class="flex"  >
						<div class="school">
							<img src="../images/logo.png" class="logo1" alt="">
							<h4>VISHAVAI VIDYANIKETAN HIGH SCHOOL<br><nav class="normal">(Recognised by Govt. of T.S.)<br>Rajiv Gandhi Nagar, Kukatpally, HYDERABAD - 500037, Medchal Dist.</nav></h4>
						</div>
<!--photo-->						
						<div class="photo">
							<img id="output_image" src="http://placehold.it/180"/>
							<input type="file" accept="image/*"  name="image" onchange="preview_image(event)" />
	
						</div>
					</div>
<!--Application Starting-->					
					<div class="heading">
						<h3>APPLICATION FOR ADMISSION</h3>
					</div>
					<div class="basic">
						<label>Admission No<p>*</p>:</label>
						<input class="input" onkeypress="isInputNumber(event)" style="width:250px;"  type="text" name="admission_no" class="admission_no" required value="<?php if(isset($_POST['save'])){ echo $id; }else{ echo $no;} ?>" /><br><br>
						<label>Class Admitted<p>*</p>:</label>
						<select name="admnclass"  required   >
						<option> </option>	
						<option <?php if(isset($_POST['save'])){ if($admnclass=="NURSERY") echo 'selected="selected"'; } ?> >NURSERY</option>	
						<option <?php if(isset($_POST['save'])){ if($admnclass=="LKG") echo 'selected="selected"'; } ?> >LKG</option>	
						<option <?php if(isset($_POST['save'])){ if($admnclass=="UKG") echo 'selected="selected"' ; }?>>UKG</option>
						<option <?php if(isset($_POST['save'])){ if($admnclass==1) echo 'selected="selected"'; } ?>>1</option>	
						<option <?php if(isset($_POST['save'])){ if($admnclass==2) echo 'selected="selected"'; } ?>>2</option>	
						<option <?php if(isset($_POST['save'])){ if($admnclass==3) echo 'selected="selected"'; } ?>>3</option>	
						<option <?php if(isset($_POST['save'])){ if($admnclass==4) echo 'selected="selected"'; } ?>>4</option>	
						<option <?php if(isset($_POST['save'])){ if($admnclass==5) echo 'selected="selected"'; } ?>>5</option>	
						<option <?php if(isset($_POST['save'])){ if($admnclass==6) echo 'selected="selected"'; } ?>>6</option>	
						<option <?php if(isset($_POST['save'])){ if($admnclass==7) echo 'selected="selected"'; } ?>>7</option>	
						<option <?php if(isset($_POST['save'])){ if($admnclass==8) echo 'selected="selected"'; } ?>>8</option>	
						<option <?php if(isset($_POST['save'])){ if($admnclass==9) echo 'selected="selected"'; } ?>>9</option>	
						<option <?php if(isset($_POST['save'])){ if($admnclass==10) echo 'selected="selected"';}  ?>>10</option>
						</select><br><br>						
						<label>Date Of Admission<p>*</p>:</label>
						<input class="input"  type="date" name="admndate" required value="<?php if(isset($_POST['save'])){ echo $admndate; }else{ echo date('Y-m-d');} ?>" >
					</div>
<!--Application Front Side Details-->					
					<div class="need" >
						<table>
							<tr>
								<td colspan="2">Name Of The Pupil<p>*</p></td>
								<td colspan="2"><input type="text" name="name" style="width:250px;" value="<?php if(isset($_POST['save'])){ echo $name; } ?>" required /></td>
							</tr>
							<tr>
								<td colspan="2">Mother Tongue<p>*</p></td>
								<td colspan="2"><input type="text" name="mother_tongue" Value="Telugu" value="<?php if(isset($_POST['save'])){ echo $mother_tongue; } ?>"  required /></td>
							</tr>
							<tr>
								<td rowspan="2"colspan="2" >Date of Birth<p>*</p></td>
								<td>(infigures)</td>
								<td><input type="date" name="dateofbirth" id="datepicker"  onselect="getMyDateValue()" value="<?php if(isset($_POST['save'])){ echo $dateofbirth; } ?>"   required /></td>
								
							</tr>
							<tr>
								<td>(inwords)</td>
								<td  ><input type="text" name="dob"/  id="words" style="width:250px; font-size:10px; font-weight:bold;" value="<?php if(isset($_POST['save'])){ echo $dob; } ?>" readonly ></td>
							</tr>
								<tr>
								<td width="25%">Caste<p>*</p></td>
								<td width="25%">
								<select name="caste" id="selector" style="width:100px;" onchange="toggleshared();"  required >
								<option> </option>	
								<option <?php if(isset($_POST['save'])){if($caste=="OC") echo 'selected="selected"'; }?>>OC</option>	
								<option <?php if(isset($_POST['save'])){if($caste=="BC-A") echo 'selected="selected"'; }?>>BC-A</option>
								<option <?php if(isset($_POST['save'])){if($caste=="BC-B") echo 'selected="selected"'; }?>>BC-B</option>
								<option <?php if(isset($_POST['save'])){if($caste=="BC-C") echo 'selected="selected"'; }?>>BC-C</option>
								<option <?php if(isset($_POST['save'])){if($caste=="BC-D") echo 'selected="selected"'; }?>>BC-D</option>
								<option <?php if(isset($_POST['save'])){if($caste=="BC-E") echo 'selected="selected"'; }?>>BC-E</option>
								<option <?php if(isset($_POST['save'])){if($caste=="SC") echo 'selected="selected"'; }?>>SC</option>
								<option <?php if(isset($_POST['save'])){if($caste=="ST") echo 'selected="selected"'; }?>>ST</option>
								</select></td>
								<td  width="20%">Subcaste Name </td>
								<td  width="30%"><input type="text" name="subcastename" value="<?php if(isset($_POST['save'])){ if($subcaste_name!=""){echo $subcaste_name;}	} ?>"  id="subcaste" /></td>
								
							</tr>
							<tr>
								<td colspan="2">Gender<p>*</p></td>
								<td colspan="2">
								<select name="gender"   required >
								<option <?php if(isset($_POST['save'])){if($gender=="GIRL") echo 'selected="selected"'; }?>>GIRL</option>	
								<option <?php if(isset($_POST['save'])){if($gender=="BOY") echo 'selected="selected"'; }?>>BOY</option>
								</select></td>
							</tr>
							<tr>
								<td colspan="2">Adhaar Card No</td>
								<td colspan="2"><input type="text" id="tbNum" onkeyup="addHyphen(this)" onkeypress="isInputNumber(event)"
							placeholder="0000-0000-0000" name="adharno" maxlength="14" pattern="[0-9]{4}-[0-9]{4}-[0-9]{4}" value="<?php if(isset($_POST['save'])){ echo $adhar_number; } ?>"  />
							(12 digit number)
							</td>
							</tr>
							<tr>
								<td colspan="2">Mother name<p>*</p></td>
								<td colspan="2"><input type="text" name="mothername" value="<?php if(isset($_POST['save'])){ echo $mother_name; } ?>"  required /></td>
							</tr>
							<tr>
								<td colspan="2">Father name<p>*</p> </td>
								<td colspan="2"><input type="text" name="fathername" value="<?php if(isset($_POST['save'])){ echo $father_name; } ?>"  required /></td>
							</tr>
							<tr>
								<td colspan="2" rowspan="2">Occupation<p>*</p> </td>
								<td colspan="1">Father </td>
								<td colspan="1"><input type="text" name="foccupation" value="<?php if(isset($_POST['save'])){ echo $foccupation; } ?>"  required /></td>
							</tr>
							<tr>
								<td colspan="1">Mother </td>
								<td colspan="1"><input type="text" value="House Wife" value="<?php if(isset($_POST['save'])){ echo $moccupation; } ?>"  name="moccupation"/></td>
							</tr>
							<tr>
								<td colspan="2">Nationality</td>
								<td colspan="2"><input type="text" readonly="India" name="state" value="India"  /></td>
							</tr>
							
						</table>
					</div>
				</div>
				
<!--Application	 Back Page-->			
				<div class="table"  >
				
					<div class="need1">
						<table>
							<tr>
								<td>Address<p>*</p></td>
								<td colspan="2"><textarea name="Address" rows="4" cols="30"  style="text-transform:uppercase;"  placeholder="Not more 250 letters including spaces" required ><?php if(isset($_POST['save'])){ echo $Address; } ?></textarea></td>
							</tr>
							<tr>
								<td>Whether Living With Parent<p>*</p> </td>
								<td colspan="2">Yes<input type="radio" name="living" value="Yes"  checked required />
								No <input type="radio" name="living" value="No" /></td>
							</tr>
							<tr>
								<td>Last school studied</td>
								<td colspan="2"><input type="text" name="schoolname" value="<?php if(isset($_POST['save'])){ echo $schoolname; } ?>" placeholder="None" /></td>
							</tr>
							<tr>
								<td>Transfer Certificate No</td>
								<td colspan="2"><input type="number_format" name="tcno" value="<?php if(isset($_POST['save'])){ echo $tcno; } ?>"placeholder="None" /></td>
							</tr>
							<tr>
								<td>Religion<p>*</p></td>
								<td colspan="2"><input type="text" name="religion" value="<?php if(isset($_POST['save'])){ echo $religion; }else { echo "HINDU";	}?>"  required  /></td>
							</tr>
							<tr>
								<td>Medium Of Instruction<p>*</p></td>
								<td colspan="2"><input type="text" name="medium"  required Value="English"/></td>
							</tr>
							<tr>
								<td>First language<p>*</p></td>
								<td colspan="2"><input type="text" name="firstl" value="Telugu" required  /></td>
							</tr>
							<tr>
								<td>Second language<p>*</p></td>
								<td colspan="2"><input type="text" name="secondl" Value="Hindi" required  /></td>
							</tr>
							<tr>
								<td>Physically Handicapped or not<p>*</p></td>
								<td colspan="2">Yes<input type="radio" name="ph" value="Yes" <?php if(isset($_POST['save'])){if($handicap=="Yes"){ echo 'checked';	}}?> required />
								No <input type="radio" name="ph" value="No" checked /></td>
							</tr>
							<tr>
								<td width="45%" rowspan="2">Personal marks of Identification</td>
								<td width="5%">1.</td>
								<td width="50%"><textarea name="mole1" rows="2" cols="30"   style="text-transform:uppercase;" placeholder="Not more 200 letters including spaces" ><?php if(isset($_POST['save'])){ echo $mole1; } ?></textarea></td>
								
								
							</tr>
							<tr>
								<td width="5%">2.</td>
								<td width="50%"><textarea name="mole2" rows="2" cols="30" style="text-transform:uppercase;" placeholder="Not more 200 letters including spaces"><?php if(isset($_POST['save'])){ echo $mole2; } ?></textarea></td>
							</tr>
							
							<tr>
								<td>Studying Class<p>*</p></td>
								<td colspan="2"><select name="class" class="input" style="width:200px; margin-top:10px; " id="classlist" required >
								<option> </option>	
								<option <?php if(isset($_POST['save'])){if($class=="NURSERY") echo 'selected="selected"'; } ?> >NURSERY</option>	
								<option <?php if(isset($_POST['save'])){if($class=="LKG") echo 'selected="selected"'; } ?>>LKG</option>	
								<option <?php if(isset($_POST['save'])){if($class=="UKG") echo 'selected="selected"'; }?>>UKG</option>
								<option <?php if(isset($_POST['save'])){if($class==1) echo 'selected="selected"'; }?>>1</option>	
								<option <?php if(isset($_POST['save'])){if($class==2) echo 'selected="selected"'; }?>>2</option>	
								<option <?php if(isset($_POST['save'])){if($class==3) echo 'selected="selected"'; }?>>3</option>	
								<option <?php if(isset($_POST['save'])){if($class==4) echo 'selected="selected"'; }?>>4</option>	
								<option <?php if(isset($_POST['save'])){if($class==5) echo 'selected="selected"'; }?>>5</option>	
								<option <?php if(isset($_POST['save'])){if($class==6) echo 'selected="selected"'; }?>>6</option>	
								<option <?php if(isset($_POST['save'])){if($class==7) echo 'selected="selected"'; }?>>7</option>	
								<option <?php if(isset($_POST['save'])){if($class==8) echo 'selected="selected"'; }?>>8</option>	
								<option <?php if(isset($_POST['save'])){if($class==9) echo 'selected="selected"'; }?>>9</option>	
								<option <?php if(isset($_POST['save'])){if($class==10) echo 'selected="selected"';}  ?>>10</option>
								</select><br><br></td>
							</tr>
							<tr>
								<td>Mobile Number<p>*</p></td>
								<td colspan="2"><input type="tel" name="phone" onkeypress="isInputNumber(event)"  maxlength="10" placeholder="1234565678" pattern="[0-9]{10}" required value="<?php if(isset($_POST['save'])){ echo $Mobile_Number; } ?>" /></td>
							</tr>
						</table>
						<div class="declare">
							<h4>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp I declare that the statement given below is correct and that the pupil has not attended any other school beside those mentioned above.
							</h4>
							<h3 style="margin-left:opx;">Station:<br>Date:   <span class="signature">Signature of Parent<br><p style="color:black;"> or guardian</p></span></h3>						
						</div>
						<div class="headmaster">
							<span style="font-size:11; display:block; font-weight:bold;  text-align:center" >ORDER OF THE HEAD OF THE SCHOOL</span>	
							<h3> Signature of the Head Master<br>Date:</h3>	
						</div>
					</div>
				</div>
<!--End of Application-->				
			</div>
				<input type="submit" name="save" value="save"  class="but" style=" display:block; margin-top:8px; margin-left:auto; margin-right:auto; margin-bottom:30px;"/>
			</form>
		</div>
		
			
			
	</div>
<!--End of Main Content-->		

<!--Login form-->	
		
		<div class="loginpopup">
			<div class="popup-content1">
			
			<img  class="user" src="../images/login.png">
					<img class="close" src="../images/close.png" onclick="document.querySelector('.loginpopup').style.display='none'; document.body.style.overflow='visible';">
					<br><span class="incorrect1">*Incorrect Username/Password</span> 
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
		$sql = "SELECT * FROM logins where username='$username' And password='$password'";
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
	ones=["ZERO","ONE","TWO","THREE","FOUR","FIVE","SIX","SEVEN","EIGHT","NINE"];
	months=["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
	document.getElementById('datepicker').addEventListener("blur", getMyDateValue)
	
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
		var inwords=date1+" " +date2+" " +months[month-1]+" " + year1+" "  + year2+" "  +year3+" "  +year4;
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
	function addHyphen (element) {
		//----------------ADHAR FORMAT--------------------
    	let ele = document.getElementById(element.id);
        ele = ele.value.split('-').join('');    // Remove dash (-) if mistakenly entered.

        let finalVal = ele.match(/.{1,4}/g).join('-');
        document.getElementById(element.id).value = finalVal;
    }
	
	var b=document.getElementById('selector').value;
	if(b=="OC"){
		document.getElementById('subcaste').readOnly= true;
		document.getElementById('subcaste').placeholder="None";
	}
	function toggleshared()
	{
		var b=document.getElementById('selector').value;
		if(b!="OC"){
			document.getElementById('subcaste').placeholder="";
			document.getElementById('subcaste').readOnly= false;
		}else{
			document.getElementById('subcaste').readOnly= true;
			document.getElementById('subcaste').placeholder="None";
		}
	}
	function close(){
		
		 
	}
	function isInputNumber(evt){
                
        var ch = String.fromCharCode(evt.which);
        
        if(!(/[0-9]/.test(ch))){
            evt.preventDefault();
        }
        
    }
	document.getElementById('main').addEventListener('click', closeNav);
	function closeNav() {
		
		document.getElementById("check").checked = false;
  
	}	
	
  </script>
</html>


