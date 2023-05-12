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
	
	<title></title>
	<link rel="stylesheet" href="userstyle.css">
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
            <li><a href="dropstudents.php"><i class="fas fa-project-diagram"></i>Left Out</a></li>
            <li><a href="feepay.php"><i class="fas fa-blog"></i>Fee Payment</a></li>
            <li><a href="fees.php"><i class="fas fa-server"></i>Fees</a></li>
            <li><a href="Bonafide.php"><i class="fas fa-certificate"></i>Bonafide</a></li>
            <li style="background:#3e3762;"><a href="users.php"><i class="fas fa-address-book"></i>Teachers</a></li>
            <li><a href="passed.php"><i class="fas fa-search"></i>Search</a></li>
            
        </ul> 
        
    </div>
<!--end Od Sidebar-->	

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
<!--End of Sidebar-->
	
<!--Main Content-->
	<div class="main_content">
		
		<div class="first">
				<h1 class="head">TEACHER LOGINS</h1>
				<div class="divblock">
				<form method="POST">
<!--List of Users-->				
					<table>
						<tr>
						<th>sno</th>
						<th>User Name</th>
						<th>Password</th>
						<th>Name</th>
						<th>Subject</th>
						<th>Mobile</th>
						<th>Class Teacher</th>
						</tr>
						<?php
						
						$sql = "SELECT * FROM logins ";
						$i=0;
						$query=mysqli_query($conn,$sql);
						While($row=mysqli_fetch_array($query))
						{
								$i++;
								?>
								<tr>
								<td><?php echo $i; ?> </td>
								<td><?php echo $username=$row['username'];?> </td>
								<td><?php echo $password=$row['password'];?> </td>
								<td><?php echo $name=$row['name'];?> </td>
								<td><?php echo $subject=$row['subject'];?> </td>
								<td><?php echo $mobile=$row['mobile'];?> </td>
								<td><?php echo $classteacher=$row['classteacherof'];?> </td>
								<td class="edit">
								<form method="POST">
								<input type="hidden" name="username" value="<?php echo $row['id']; ?>">
								<input type="submit"  class="button" name="edit" value="edit">
								<input type="submit" class="button" name="delete" value="delete">
								</form>
								</td>
								</tr>
								<?php
								
							
						}
						?>						
						<tbody id="tbody"></tbody>
					</table>
				
					<a onclick="addItem();" class="left">Add Item</a>
					<input type="submit" name="submit" value="save" class="save">
				</form>
				</div>
				
				
		</div> 
	</div>
	<?php
 
				
			
				if (isset($_POST["submit"]))
				{
					$username=strtolower($_POST['username']);
						$password=$_POST['password'];
						$name=$_POST['name'];
						$subject=$_POST['subject'];
						$mobile=$_POST['mobile'];
						$class=$_POST['class'];
					if($username!="" && $password!="" && $name!="" && $subject!="" && $mobile!="" && $class!=""){
						
						if(strlen($password)>4){
//inserting into logins						
							$sql ="INSERT INTO logins (username,password,name,subject,mobile,classteacherof) VALUES('$username','$password','$name','$subject','$mobile','$class')";
							if (mysqli_query($conn, $sql)) {
//success message								
								?>
								<script>document.body.style.overflow="hidden";</script>
								<div id="popup2">
								<div class="alert success">
								<span class="closebtn" onclick="window.location.href='users.php'">&times;</span>  
								<strong>Success!&nbsp </strong>Successfully Added.
								</div>
								<?php
							}
							else{
//username error								
								?>
									<script>document.body.style.overflow="hidden";</script>
									<div id="popup2">
									<div class="alert info">
									<span class="closebtn" onclick="document.getElementById('popup2').style.display='none';">&times;</span>  
									<strong>Failed!&nbsp </strong>Username Already Exist.
									</div>
								<?php
							}
						}else{
//password must be 5 characters message						
							?>
							<script>document.body.style.overflow="hidden";</script>
							<div id="popup2">
							<div class="alert warning">
							<span class="closebtn" onclick="document.getElementById('popup2').style.display='none';">&times;</span>  
							<strong>Warning!&nbsp </strong>Password Must be 5 Characters.
							</div>
							<?php
						}
					}else{
//required messages						
						?>
						<script>document.body.style.overflow="hidden";</script>
						<div id="popup2">
						<div class="alert warning">
						<span class="closebtn" onclick="document.getElementById('popup2').style.display='none';">&times;</span>  
						<strong>Warning! &nbsp *</strong>Should Not be Empty.
						</div>
						<?php
					}
				}
				if(isset($_POST['edit'])){	
					$username=$_POST['username'];
					$sql = "SELECT * FROM logins where id='$username'";
					$query=mysqli_query($conn,$sql);
					While($row=mysqli_fetch_array($query))
					{
							$username=$row['username'];
							$password=$row['password'];
							$name=$row['name'];
							$subject=$row['subject'];
							$mobile=$row['mobile'];
							$class=$row['classteacherof'];
							$id=$row['id'];
						
					}
					?>
<!--Edit crendentials form-->					
					<div id="popup">
						<div class="popup-content">
						<img class="close" src="../images/close.png" onclick="window.location.href='users.php';">
							<h1 style="text-align:center; margin-top:20px; margin-bottom:50px;">Edit details</h1>
							<form method="POST">
								<table>
									<tr><td>USERNAME:</td><th><input type="text" name="username" value="<?php echo $username; ?>"></th></tr>
									<tr><td>PASSWORD:</td><th><input type="text" name="password" value="<?php echo $password; ?>"></th></tr>
									<tr><td>NAME:</td><th><input type="text" name="name" value="<?php echo $name; ?>"></th></tr>
									<tr><td>SUBJECT:</td><th><select name="subject">
											<option> </option>	
											<option <?php if($subject=="Telugu") echo 'selected="selected"'; ?> >Telugu</option>	
											<option <?php if($subject=="Hindi") echo 'selected="selected"'; ?>>Hindi</option>	
											<option <?php if($subject=="English") echo 'selected="selected"'; ?>>English</option>
											<option <?php if($subject=="Maths") echo 'selected="selected"'; ?>>Maths</option>	
											<option <?php if($subject=="Science") echo 'selected="selected"'; ?>>Science</option>	
											<option <?php if($subject=="Social") echo 'selected="selected"'; ?>>Social</option>	
											
											</select></th></tr>
									<tr><td>MOBILE NUMBER:</td><th><input type="text" name="mobile" maxlength="10" value="<?php echo $mobile; ?>"></th></tr>
									<tr><td>CLASS TEACHER:</td><th><select name="class">
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
											</select></th></tr>
									
								</table>
								<input type="hidden" name="id" value="<?php echo $id; ?>">
								<input type="submit" class="save" style="display:block;" name="update" value="Update"> 
							</form>
						</div>
					</div>
					<?php
					
				}
				if(isset($_POST['update']))
				{
					$username=strtolower($_POST['username']);
					$password=$_POST['password'];
					$name=$_POST['name'];
					$subject=$_POST['subject'];
					$mobile=$_POST['mobile'];
					$class=$_POST['class'];
					$id=$_POST['id'];
					if(strlen($password)>4){
//updation of logins					
						$sql = "UPDATE logins SET username='$username',password='$password',name='$name',subject='$subject',mobile='$mobile',classteacherof='$class' WHERE id='$id'";
						if (mysqli_query($conn, $sql)) {
//success							
							?>
							<script>document.body.style.overflow="hidden";</script>
							<div id="popup2">
							<div class="alert success">
							<span class="closebtn" onclick="window.location.href='users.php'">&times;</span>  
							<strong>Success!&nbsp </strong>Successfully Added.
							</div>
							</div>
							<script>
							setTimeout(function(){
								window.location.href = 'users.php';
							}, 2000);
							</script>
							<?php
						}
						else{
//username error							
							?>
								<script>document.body.style.overflow="hidden";</script>
								<div id="popup2">
								<div class="alert info">
								<span class="closebtn" onclick="document.getElementById('popup2').style.display='none';">&times;</span>  
								<strong>Failed!&nbsp </strong>Username Already Exist.
								</div>
								</div>
							<?php
						}
					}else{
//password error message					
						?>
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
				if(isset($_POST['delete'])){
//deletion of user					
					$username=$_POST['username'];
					$sql = "DELETE  FROM logins where username='$username'";
					if (mysqli_query($conn, $sql)) {
//Deleted message						
						?>
							<script>document.body.style.overflow="hidden";</script>
							<div id="popup2">
							<div class="alert success">
							<span class="closebtn" onclick="window.location.href='users.php'">&times;</span>  
							<strong>Success!&nbsp </strong>Successfully DELETED.
							
							</div>
							</div>
							<script>
							setTimeout(function(){
								window.location.href = 'users.php';
							}, 2000);
							</script>
						<?php
					}
				}
			?>
</div>	
<!--javascript-->
<script>
	var dd_main = document.querySelector(".dd_main");

	dd_main.addEventListener("click", function(){
		this.classList.toggle("active");
	})	
	setTimeout(function(){
		document.body.style.overflow='visible'; 
		document.getElementById('popup2').style.display = 'none';
	}, 3000);
	var items = 0;
    function addItem() {
	items=<?php echo $i+1; ?> ;
        var html = "<tr>";
            html += "<td>" + items + "</td>";
            html += "<td><p>*</p><input type='text' name='username' Placeholder='Username'></td>";
            html += "<td><p>*</p><input type='password' name='password' Placeholder='Password'></td>";
            html += "<td><p>*</p><input type='text' name='name' Placeholder='Name'></td>";
            html += "<td><p>*</p><select name='subject' list='subject' ><option></option>	<option>Telugu</option><option>Hindi</option>	<option>English</option><option>Maths</option>	<option>Science</option>	<option>Social</option>	</select></td>";
            html += "<td><p>*</p><input type='text' name='mobile' maxlength='10' Placeholder='Mobile'></td>";
            html += "<td><p>*</p><select  name='class' list='class'><option></option>	<option>NURSERY</option><option>LKG</option>	<option>UKG</option><option>1</option>	<option>2</option>	<option>3</option>	<option>4</option>	<option>5</option>	<option>6</option>	<option>7</option>	<option>8</option>	<option>9</option>	<option>10</option></select></td>";
        html += "</tr>";
 
        var row = document.getElementById("tbody").insertRow();
        row.innerHTML = html;
		document.querySelector('.save').style.display="inline-block";
    }
	
	
	
</script>
	
</body>
<!--End of body-->
</html>