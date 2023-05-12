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
<html lang="en" dir="ltr">

<!--head-->
  <head>
    <meta charset="utf-8">
    <title>Sidebar Dashboard Template</title>
    <link rel="stylesheet" href="old_admission_style.css">
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
			<a  href="old_admission.php"><i class="fas fa-file"></i>Old_Admission</a>
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
						
					$father_name=strtoupper($_POST['fathername']);
					$mother_name=strtoupper($_POST['mothername']);
					$foccupation=strtoupper($_POST['foccupation']);
					$moccupation=strtoupper($_POST['moccupation']);
					$State=$_POST['state'];
					$religion=strtoupper($_POST['religion']);
					$medium=strtoupper($_POST['medium']);
					$firstl=strtoupper($_POST['firstl']);
					$secondl=strtoupper($_POST['secondl']);
					$success=0;
					$error=0;
					$iderror=0;
					$query=mysqli_query($conn,"select * from studentinformation where id='$id' ");//fetchng details based on id
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

					$adhar_number='0000-0000-0000';
				
				
			
				if($_POST['admission_no']!=""  && $_POST["name"]!="" && $_POST['gender']!="" && $_POST['fathername']!="" && $_POST['mothername']!="" && $_POST['dateofbirth']!="" && $_POST['caste']!="" && $_POST['foccupation']!=""   && $_POST['religion']!="" && $_POST['mother_tongue']!="" && $_POST['admndate']!=""  &&  $_POST['admnclass']!=" "  &&  $_POST['medium']!="" && $_POST['firstl']!="" && $_POST['secondl']!=""  && $fail==0 ){ 
					
					
					
					
					
					
					
					//-------------------total fee calculation-------------------------------
					
					
					
					$academicyear=date('Y');
						
//checking admitted class and Studying Class
					if($iderror==0){
						$adhar_number=preg_replace("/[^A-Za-z0-9]/",'',$adhar_number);
						?>
						
<!--A4 Page View-->						
							<div id="popup">
								<div class="popup-content" id="print1">
									<img class="close" src="../images/close.png" onclick="window.location.href='old_admission.php'">
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
												<tr>
												<td colspan="2">Religion</td>
												<td colspan="2"><span><?php   echo $religion; ?></span></td>
											</tr>
											<tr>
												<td colspan="2">Medium Of Instruction</td>
												<td colspan="2"><span><?php    echo $medium;?></span></td>
											</tr>
											<tr>
												<td colspan="2">First language</td>
												<td colspan="2"><span><?php   echo $secondl;  ?></span></td>
											</tr>
											<tr>
												<td colspan="2">Second language</td>
												<td colspan="2"><span><?php    echo $firstl; ?></span></td>
											</tr>
											
											</table>
										</div>
									</div>
									
									
									<input type="submit" value="print" class="but" style="margin-left:auto; margin-right:auto;" onclick="printDiv('print1')" />
									
									<?php
											
											$conn=mysqli_connect("localhost","root","","studentinfo");
											if(!$conn){
												die('Could not Connect My Sql:' .mysql_error());
											}
											$sql = "INSERT INTO studentinformation (image,id,admnclass,admndate,name,mothertongue,dateofbirth,caste,subcastename,gender,mothername,fathername,fatherocp,motherocp,religion,medium,firstlan,secondlan,year) VALUES ('$image','$id','$admnclass','$admission_date','$name','$mother_tongue','$dateofbirth','$caste','$subcaste_name','$gender','$mother_name','$father_name','$foccupation','$moccupation','$religion','$medium','$firstl','$secondl','$academicyear' )";
											if (mysqli_query($conn, $sql)) {
												$success=1;
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
		<div class="location"><h4>Admission >>Old Application</h4></div>
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
						<input class="input" onkeypress="isInputNumber(event)" style="width:250px;"  type="text" name="admission_no" class="admission_no" required value="<?php if(isset($_POST['save'])){ echo $id; }?>" /><br><br>
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
						<input class="input"  type="date" name="admndate" required value="<?php if(isset($_POST['save'])){ echo $admndate; } ?>" >
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
								<td colspan="1"><input type="text"  value="PVT-EMP" name="foccupation" value="<?php if(isset($_POST['save'])){ echo $foccupation; } ?>"  required /></td>
							</tr>
							<tr>
								<td colspan="1">Mother </td>
								<td colspan="1"><input type="text" value="House Wife" value="<?php if(isset($_POST['save'])){ echo $moccupation; } ?>"  name="moccupation"/></td>
							</tr>
							<tr>
								<td colspan="2">Nationality</td>
								<td colspan="2"><input type="text" readonly="India" name="state" value="India"  /></td>
							</tr>
							<tr>
								<td colspan="2">Religion<p>*</p></td>
								<td colspan="2"><input type="text" name="religion" value="<?php if(isset($_POST['save'])){ echo $religion; }else { echo "HINDU";	}?>"  required  /></td>
							</tr>
							<tr>
								<td colspan="2">Medium Of Instruction<p>*</p></td>
								<td colspan="2"><input type="text" name="medium"  required Value="English"/></td>
							</tr>
							<tr>
								<td colspan="2">First language<p>*</p></td>
								<td colspan="2"><input type="text" name="firstl" value="Telugu" required  /></td>
							</tr>
							<tr>
								<td colspan="2">Second language<p>*</p></td>
								<td colspan="2"><input type="text" name="secondl" Value="Hindi" required  /></td>
							</tr>
						</table>
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


