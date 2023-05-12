<?php
 /*login user information*/
session_start();
ob_start();
$conn=mysqli_connect("localhost","root","","studentinfo");
if(isset($_SESSION['username'])){
	$username=$_SESSION['username'];
	$id=$_SESSION['id'];
	$sql = "SELECT * FROM logins where id='$id'";
	$query=mysqli_query($conn,$sql);
	While($row=mysqli_fetch_array($query))
	{
		$lname=$row['name'];
		$classt=$row['classteacherof'];
		$password=$row['password'];
		$lsubject=$row['subject'];
		$lmobile=$row['mobile'];
		
	}
	
}else{
	header('location:../first pages/home.php');
}


?>
<html lang="en">
<!--Head-->
<head>
	
	<title></title>
	<link rel="stylesheet" href="Profile.css">
	<link rel="stylesheet" href="../fontawesome-free-5.15.2-web/css/all.css">
</head>
<!--End of Head-->
<body>

<div class="wrapper">
<!--sidebar-->
	<div class="sidebar">
        <h2>VISHAVAI <span>VIYANIKETAN</span></h2>
        <ul>
            <li><a href="new.php" id="home"><i class="fas fa-home"></i>Home</a></li>
            <li  style="background:#3e3762;"><a href="profile.php" id="profile"><i class="fas fa-user"></i>Profile</a></li>
            <li><a href="students.php" id="students"><i class="fas fa-user-friends"></i>Students</a></li>
            <li><a href="marks.php" id="marks"><i class="fas fa-address-card"></i>Marks</a></li>
            <li><a href="report.php"  id="report"><i class="fas fa-address-book"></i>Progress Cards</a></li>
            
        </ul> 
       
    </div>
<!--End of Sidebar-->

<!--Profile image View-->	
	<div class="navbar">
		<div class="logo">
		</div>
		<div class="nav_right">
			<ul>
				<li class="nr_li dd_main">
				
					<img  class="img" src="../images/profile.jpg";>
		
					<div class="dd_menu">
						<div class="dd_left">
							<ul>
								<li><img src="../images/profile.jpg" alt="profile_img" class="img1"><br>
								<h5><?php echo $lname; ?></h5>
								<a href="profile.php" id="profile" style="float:left; margin-left:40%; font-size:16px; font-weight:normal; text-decoration:underline;">Edit</a></li><br>
								<li style="font-size:16px;">Class Teacher:<?php echo $classt; ?> </li>
								
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
<!--profile image View-->

<!--MainContent-->	
	<div class="main_content">
		
		<div class="first">
			<div class="profile_edit">
				<h3>PROFILE</h3><br>
				<div class="contain">
					<img src="../images/profile.jpg " style="width:200px; height:200px; border-radius:50%; float:left; ">
					<div class="profile_details">
						<form method="POST">	
						<table>
						<tr>
							<td style="text-align:right;"><h2>Name:</h2></td><td><input type="text" class="input" name="name" readonly  value="<?php echo $lname; ?>" id="name" ><span class="edit" id="name_edit">edit</span></td>
						</tr>
						<tr>	
							<td><h2 style="text-align:right;">Class Teacher of:</h2></td><td><select name="class" id="class">
											<option> </option>	
											<option <?php if($classt=="NURSERY") echo 'selected="selected"'; ?> >NURSERY</option>	
											<option <?php if($classt=="LKG") echo 'selected="selected"'; ?>>LKG</option>	
											<option <?php if($classt=="UKG") echo 'selected="selected"'; ?>>UKG</option>
											<option <?php if($classt==1) echo 'selected="selected"'; ?>>1</option>	
											<option <?php if($classt==2) echo 'selected="selected"'; ?>>2</option>	
											<option <?php if($classt==3) echo 'selected="selected"'; ?>>3</option>	
											<option <?php if($classt==4) echo 'selected="selected"'; ?>>4</option>	
											<option <?php if($classt==5) echo 'selected="selected"'; ?>>5</option>	
											<option <?php if($classt==6) echo 'selected="selected"'; ?>>6</option>	
											<option <?php if($classt==7) echo 'selected="selected"'; ?>>7</option>	
											<option <?php if($classt==8) echo 'selected="selected"'; ?>>8</option>	
											<option <?php if($classt==9) echo 'selected="selected"'; ?>>9</option>	
											<option <?php if($classt==10) echo 'selected="selected"'; ?>>10</option>
											</select></td>
						</tr>
						<tr>	
							<td><h2 style="text-align:right;">Mobile Number:</h2></td><td><input type="number_format" maxlength="10" class="input" name="mobile" readonly value="<?php echo $lmobile; ?>" id="mobile" ><span class="edit" id="mobile_edit">edit</span></td>
						</tr>
						<tr>	
							<td><h2 style="text-align:right;">Subject:</h2></td><td><input type="text" name="subject" class="input" readonly value="<?php echo $lsubject; ?>" id="subject"  ><span  class="edit" id="subject_edit">edit</span></td>
						</tr>
						<tr>	
							<td><h2 style="text-align:right;">Username:</h2></td><td><input type="text" name="username" id="username" class="input1"  readonly value="<?php echo $username; ?>" readOnly></td>
						</tr>
						<tr>	
							<td><h2 style="text-align:right;">Password:</h2></td><td><input type="password" name="password"  class="input" readonly value="<?php echo $password;?>" id="password"  ><i class="far fa-eye" id="togglePassword"></i><span  class="edit" id="password_edit">edit</span></td>
						</tr>	
						</table>
							<input type="hidden" value="<?php echo $id;?>" name="id">
							<input type="submit" value="Update" name="update" class="save" style="margin-left:48%">
						</form>
					</div>
				</div>
			</div>
			
		</div> 
	</div>
<!--End of MainContent-->	
	<?php
		if(isset($_POST['update'])) 
				{
					$username=strtolower($_POST['username']);
					$username=$username;
					$password=$_POST['password'];
					$name=$_POST['name'];
					$subject=$_POST['subject'];
					$mobile=$_POST['mobile'];
					$class=$_POST['class'];
					$id=$_POST['id'];
					if(strlen($password)>4){
						
						$sql = "UPDATE logins SET username='$username',password='$password',name='$name',subject='$subject',mobile='$mobile',classteacherof='$class' WHERE id='$id'";
						if (mysqli_query($conn, $sql)) {
							?>
<!--success Message-->							
							<div id="popup2">
							<div class="alert success">
							<span class="closebtn" onclick="window.location.href='profile.php'">&times;</span>  
							<strong>Success!&nbsp </strong>Successfully Added.
							</div>
							</div>
							<script>document.body.style.overflow="hidden";</script>
							<?php
						}
						else{
							?>
<!--Username Error-->							
								<div id="popup2">
								<div class="alert info">
								<span class="closebtn" onclick="document.getElementById('popup2').style.display='none';">&times;</span>  
								<strong>Failed!&nbsp </strong>Username Already Exist.
								</div>
								</div>
								<script>document.body.style.overflow="hidden";</script>
							<?php
						}
					}else{
						?>
<!--Password Error-->	
						<script>document.body.style.overflow="hidden";</script>
						<div id="popup2">
						<div class="alert warning">
						<span class="closebtn" onclick="document.getElementById('popup2').style.display='none';">&times;</span>  
						<strong>Warning!&nbsp </strong>Password Must be 5 Characters.
						</div>
						</div>
						<?php
					}
				}
				?>
</div>	


</body>
<!--end of Body-->

<!--javascript-->
<script>
	setTimeout(function(){
		document.body.style.overflow='visible'; 
		document.getElementById('popup2').style.display = 'none';
	}, 3000);
	var dd_main = document.querySelector(".dd_main");

	dd_main.addEventListener("click", function(){
		this.classList.toggle("active");
	})
const togglePassword = document.querySelector('#togglePassword');
const password = document.querySelector('#password');
togglePassword.addEventListener('click', function (e) {
    // toggle the type attribute
    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
    password.setAttribute('type', type);
    // toggle the eye slash icon
    this.classList.toggle('fa-eye-slash');
})	
document.getElementById("name_edit").addEventListener('click', function (e) {	
	document.getElementById("name").readOnly = false;
	document.querySelector(".save").style.display = 'block';
})

document.getElementById("mobile_edit").addEventListener('click', function (e) {	
	document.getElementById("mobile").readOnly = false;
	document.querySelector(".save").style.display = 'block';
})
document.getElementById("subject_edit").addEventListener('click', function (e) {	
	document.getElementById("subject").readOnly = false;
	document.querySelector(".save").style.display = 'block';
})

document.getElementById("password_edit").addEventListener('click', function (e) {	
	document.getElementById("password").readOnly = false;
	document.querySelector(".save").style.display = 'block';
})

	
</script>
	
</html>