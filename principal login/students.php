<?php
session_start();
ob_start();
if(isset($_SESSION['username'])){
	$username=$_SESSION['username'];
	$name=$_SESSION['name'];
}else{
	header('location:../first pages/home.php');
}
//database connection  
	$conn = mysqli_connect('localhost', 'root', '','Studentinfo');  
	if (! $conn) {  
		die("Connection failed" . mysqli_connect_error());  
	}  
	else {  
		mysqli_select_db($conn, 'studentinfo');  
	} 
?>
<html lang="en">
<!--head-->
<head>
	
	<title></title>
	<link rel="stylesheet" href="student.css">
	<link rel="stylesheet" href="../fontawesome-free-5.15.2-web/css/all.css">

</head>
<!--End of head-->

<!--Body-->
<body>

<div class="wrapper">
<!--sidebar-->
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
<!--profile image view-->	
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
								<li style="font-size:16px;"><?php echo $session_name="Principal"; ?></li>
								
							</ul>
						</div>
						
					</div>
				</li>
				<li class="nr_li">
					<a href="../first pages/home.php" ><i class="fas fa-sign-out-alt"></i></a>
				</li>
			</ul>
		</div>
	</div>
<!--end of profile image view-->
<!--main Content-->	
	<div class="main_content">
		<div class="first">
			<div class="reports">
				<div class="info">
						
<!--All students Info-->				 
					<h3>STUDENTS INFO</h3>
						<a href="class_details.php" class="left">Class_Wise Details</a><br>
						<a href="student_details.php" style="margin-bottom:10px;" class="left">Student_Wise Details</a>
					<table>
						<tr>
						<td>ADMISSION_NO</td>
						<td>CLASS</td>	  
						<td>NAME</td>        
						<td>GENDER</td>      
						<td>FATHER_NAME</td>  
						<td>DATE_OF_BIRTH</td>
						<td>CASTE</td>       
						  
						<td>SUBCASTE_NAME</td>
						<td>PHONE</td>       
						</tr>
						<?php  
  
								 
							
								//define total number of results you want per page  
								$results_per_page = 25;  
							
								//find the total number of results stored in the database  
								$query = "select * from studentinformation";  
								$result = mysqli_query($conn, $query);  
								$number_of_result = mysqli_num_rows($result);  
							
								//determine the total number of pages available  
								$number_of_page = ceil ($number_of_result / $results_per_page);  
							
								//determine which page number visitor is currently on  
								if (!isset ($_GET['page']) ) {  
									$page = 1;  
								} else {  
									$page = $_GET['page'];  
								}  
							
								//determine the sql LIMIT starting number for the results on the displaying page  
								$page_first_result = ($page-1) * $results_per_page;  
							
								//retrieve the selected results from database   
								$query = "SELECT * FROM studentinformation LIMIT " . $page_first_result . ',' . $results_per_page;  
								
								$result = mysqli_query($conn, $query);  
								
								//display the retrieved result on the webpage  
								while ($row = mysqli_fetch_array($result)) {  
									?>
									<tr>
									<th><?php echo $row['id'];?> </th>		
									<th><?php echo $row['class'];?> </th>		
									
									<th><?php echo $row['name']; ?> </th>
									<th><?php echo $row['gender']; ?> </td>
									<th><?php echo $row['fathername']; ?> </th>
									<th><?php echo date('d-m-Y',strtotime($row['dateofbirth'])); ?> </th>
									<th><?php echo $row['caste']; ?> </th>
									
									<th><?php echo $row['subcastename']; ?></th>
									<th><?php echo $row['phone']; ?> </th>
									</tr>
									<?php  
								}  
							
							
								 
							
						?> 
						
					</table>
					<div class="pages">
					<?php
						
//display the link of the pages in URL  
						if($page>1)
						{
							
							echo "<a href='students.php?page=".($page-1)."' class='btn-danger'>Previous</a>";
						}
		
						
						for($i = 1; $i< $number_of_page; $i++)
						{
							if($i==$page)
							echo "<a class='active'>$i</a>";
							else
							{
								
								if($i<3)
								echo "<a href='students.php?page=".$i."' class='btn-primary'>$i</a>";
								
							}
						}
						
		
						if($i>$page)
						{
							
							echo "<a href='students.php?page=".($page+1)."' class='btn-danger'>Next</a>";
						}
					?>
					</div>
				</div> 
			</div>
		</div> 
	</div>
<!--end of Main Content-->	
</div>	


	
</body>
<!--End of Body-->
<!--javascript-->
<script>
	var dd_main = document.querySelector(".dd_main");

	dd_main.addEventListener("click", function(){
		this.classList.toggle("active");
	})	


	
</script>
</html>