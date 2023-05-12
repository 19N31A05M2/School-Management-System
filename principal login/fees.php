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
	<link rel="stylesheet" href="Fees.css">
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
            <li style="background:#3e3762;"><a href="fees.php"><i class="fas fa-server"></i>Fees</a></li>
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
<!--end of Profile image-->	
	<?php 
		
		$fees=array();
		$i=0;
		$sql = "SELECT * FROM feestructure";
		$query=mysqli_query($conn,$sql);
		While($row=mysqli_fetch_array($query))
		{
			$fees[$i]=$row['fee'];
			$i++;
			
		}
	?>
<!--Main Content-->
	<div class="main_content">
		<div class="first">
			<a  onclick="popup()" class="left">Fee Structure</a><br>
<!-- Fees Updation Form-->			
			<div class="fees">
					<form method="POST">
						<h2>New Fees</h2>
						<br><span class="required">*All Fields Are  Mandatory </span>
						<table>
							<tr>
								<td>CLASS</td><td>FEE</td>
							</tr>
							<tr>
								<th>NURSERY</th><th><input onkeypress="isInputNumber(event)" value="<?php echo $fees[11]; ?>" type="number_format" name="nursery" >rs/month</th>
							</tr>
							<tr>
								<th>LKG</th><th><input type="number_format" value="<?php echo $fees[10];  ?>" onkeypress="isInputNumber(event)" name="lkg" >rs/month</th>
							</tr>
							<tr>
								<th>UKG</th><th><input type="number_format" value="<?php echo $fees[12];  ?>" onkeypress="isInputNumber(event)" name="ukg" >rs/month</th>
							</tr>
							<tr>
								<th>1ST</th><th><input type="number_format" value="<?php echo $fees[0];  ?>" onkeypress="isInputNumber(event)" name="first" >rs/month</th>
							</tr>
							<tr>
								<th>2ND</th><th><input type="number_format" value="<?php echo $fees[2];  ?>" onkeypress="isInputNumber(event)" name="second" >rs/month</th>
							</tr>
							<tr>
								<th>3RD</th><th><input type="number_format" value="<?php echo $fees[3];  ?>" onkeypress="isInputNumber(event)" name="third" >rs/month</th>
							</tr>
							<tr>
								<th>4TH</th><th><input type="number_format" value="<?php echo $fees[4];  ?>" onkeypress="isInputNumber(event)" name="fourth" >rs/month</th>
							</tr>
							<tr>
								<th>5TH</th><th><input type="number_format" value="<?php echo $fees[5];  ?>" onkeypress="isInputNumber(event)" name="fifth" >rs/month</th>
							</tr>
							<tr>
								<th>6TH</th><th><input type="number_format" value="<?php echo $fees[6];  ?>" onkeypress="isInputNumber(event)" name="sixth" >rs/month</th>
							</tr>
							<tr>
								<th>7TH</th><th><input type="number_format" value="<?php echo $fees[7];  ?>" onkeypress="isInputNumber(event)" name="seventh" >rs/month</th>
							</tr>
							<tr>
								<th>8TH</th><th><input type="number_format" value="<?php echo $fees[8];  ?>" onkeypress="isInputNumber(event)" name="eighth" >rs/month</th>
							</tr>
							<tr>
								<th>9TH</th><th><input type="number_format" value="<?php echo $fees[9];  ?>" onkeypress="isInputNumber(event)" name="nineth" >rs/month</th>
							</tr>
							<tr>
								<th>10TH</th><th><input type="number_format" value="<?php echo $fees[1];  ?>" onkeypress="isInputNumber(event)" name="tenth" >rs/month</th>
							</tr>
						</table>
						<button type="submit" class="update" name="update" value="update">update</button>
						<br><span class="correct">Updated Sucessfully </span> 
						<br><span class="incorrect">Update Failed </span> 
					</form>
					
				
				</div>
<!--End of fees Updation form-->				
		</div> 
	</div>
	<?php
		if(isset($_POST['update'])){
		
				$nursery=$_POST['nursery'];
				$lkg=$_POST['lkg'];
				$ukg=$_POST['ukg'];
				$first=$_POST['first'];
				$second=$_POST['second'];
				$third=$_POST['third'];
				$fourth=$_POST['fourth'];
				$fifth=$_POST['fifth'];
				$sixth=$_POST['sixth'];
				$seventh=$_POST['seventh'];
				$eighth=$_POST['eighth'];
				$nineth=$_POST['nineth'];
				$tenth=$_POST['tenth'];
				$count=0;
				$conn = mysqli_connect("localhost", "root", "", "studentinfo");
				// Check connection
				if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
				}
				$sql = "UPDATE feestructure SET fee='$nursery' WHERE class='NURSERY'";
				
				if (mysqli_query($conn, $sql)) {
					$count++;
					
				}
				$sql = "UPDATE feestructure SET fee='$ukg' WHERE class='UKG'";
				
				if (mysqli_query($conn, $sql)) {
					$count++;
				}
				$sql = "UPDATE feestructure SET fee='$lkg' WHERE class='LKG'";
				
				if (mysqli_query($conn, $sql)) {
					$count++;
				}
				$sql = "UPDATE feestructure SET fee='$first' WHERE class='1'";
				
				if (mysqli_query($conn, $sql)) {
					$count++;
				}
				$sql = "UPDATE feestructure SET fee='$second' WHERE class='2'";
				
				if (mysqli_query($conn, $sql)) {
					$count++;
				}
				$sql = "UPDATE feestructure SET fee='$third' WHERE class='3'";
				
				if (mysqli_query($conn, $sql)) {
					$count++;
				}
				$sql = "UPDATE feestructure SET fee='$fourth' WHERE class='4'";
				
				if (mysqli_query($conn, $sql)) {
					$count++;
				}
				$sql = "UPDATE feestructure SET fee='$fifth' WHERE class='5'";
				
				if (mysqli_query($conn, $sql)) {
					$count++;
				}
				$sql = "UPDATE feestructure SET fee='$sixth' WHERE class='6'";
				
				if (mysqli_query($conn, $sql)) {
					$count++;
				}
				$sql = "UPDATE feestructure SET fee='$seventh' WHERE class='7'";
				
				if (mysqli_query($conn, $sql)) {
					$count++;
				}
				$sql = "UPDATE feestructure SET fee='$eighth' WHERE class='8'";
				
				if (mysqli_query($conn, $sql)) {
					$count++;
				}
				$sql = "UPDATE feestructure SET fee='$nineth' WHERE class='9'";
				
				if (mysqli_query($conn, $sql)) {
					$count++;
				}
				$sql = "UPDATE feestructure SET fee='$tenth' WHERE class='10'";
				
				if (mysqli_query($conn, $sql)) {
					$count++;
				} 
				if($count==13){
					?>
						<script>document.body.style.overflow="hidden";</script>
						<div id="popup2">
						<div class="alert success">
						<span class="closebtn" onclick="document.getElementById('popup2').style.display='none'; document.body.style.overflow='visible'; ">&times;</span>  
						<strong>Success!</strong> Fees Updated Saved.
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
				
				
				mysqli_close($conn);
			
			
	
		}
	?>
	<?php
		$mysqli = new mysqli("localhost","root","","studentinfo");
		$sql = "SELECT * FROM feestructure";
		?>
<!--fees structure-->		
		<div class="popup">
			<div class="popup-content">
				<img class="close" src="../images/close.png" onclick="document.querySelector('.popup').style.display='none'; document.body.style.overflow='';">
				<h2>Fee Struture</h2>
					<table class="dropdetails">
						<tr><td>Class</td><td>FEE</td></tr>
						<?php
						$query=mysqli_query($conn,$sql);
						While($row=mysqli_fetch_array($query))
						{
						
							?>
							<tr>
							<th><?php echo $clas=$row['class'];?> </th><th><?php echo $row['fee'];?> </th>
							</tr>
							<?php
							
						}
						?>
					</table> 
		
			</div>
		</div>
		<?php
	?>
</div>	
<!--javascript-->
<script>
	var dd_main = document.querySelector(".dd_main");

	dd_main.addEventListener("click", function(){
		this.classList.toggle("active");
	})	
	function popup()
	{
		document.querySelector(".popup").style.display="flex";
		document.body.style.overflow='hidden';
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