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
	<link rel="stylesheet" href="pass.css">
	<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>

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
            <li style="background:#3e3762;"><a href="feepay.php"><i class="fas fa-blog"></i>Fee Payment</a></li>
           <li><a href="fees.php"><i class="fas fa-server"></i>Fees</a></li>
            <li><a href="Bonafide.php"><i class="fas fa-certificate"></i>Bonafide</a></li>
            <li><a href="users.php"><i class="fas fa-address-book"></i>Teachers</a></li>
			<li><a href="passed.php"><i class="fas fa-search"></i>Search</a></li>
            
        </ul> 
        
    </div>
<!--End of Side bar-->	
	
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
<!--end of Profile Image View--> 	

<!--Main Content-->
<div class="main_content">
		
		<div class="first">
				<label style=" margin-left:43%; margin-top:30px;">Search By:</label>
					<select name="status" id="selector" onchange="toggleshared();" >
					<option value="Admission">Admission No:</option>
					<option value="Name" >Name</option>	
					
					</select><br>
				<form method="post" id="id" style="text-align:center; margin-top:20px;" >
					<label>Admission No:</label>
					<input type="text" name="admnno" onkeypress="isInputNumber(event)"/>
					<input type="submit" value="Search" CLASS="but" name="submit1"/>
				</form>
				<form method="post" id="name" style="text-align:center; margin-top:20px;" >
					<label >Name:</label>
					<input type="text" name="name"/>
					<input type="submit" value="Search" class="but" name="submit2"/>
				</form>	
<!--end of search forms-->
				<?php
				
				$error=0;
				$id=0;
				$m=0;
				$image=" "; 
				
				$name="";
				$sname="";
				$dateofbirth="";
				
				$father_name="";
				
				$class="";
				$Mobile_Number="";
				$monthlydue=0;
				$totaldue=0;
				$ad="";
				if(isset($_POST['submit1'])){
					$id=$_POST['admnno'];
					$query=mysqli_query($conn,"SELECT * FROM studentinformation where id='$id'"); //query for fecthing results from database using id
					$count=mysqli_num_rows($query);
					if($count==1)
					{
						$sql = "SELECT * FROM studentinformation where id='$id'";
						$m=1;
					}else{
						$error=1;
					}
				}
				if(isset($_POST['submit2'])){
					$name=$_POST['name'];
					$query=mysqli_query($conn,"select * from studentinformation where name like '%$name%'"); //query for fecthing results from database using name
					$count=mysqli_num_rows($query);
					
					if($count>1)
					{
						?>
						<!-- selection from two or more results-->
						<table width="400px" class="names" style="border:5px solid black; border-collapse:collapse; margin-top:20px; margin-left:auto; margin-right:auto; margin-bottom:20px; text-align:center;">
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
								<th><form method="POST"> <input type="hidden" name="adno" value="<?php echo $ad; ?> "/><input type="submit" name="select" class="but" value="select"/></form></th>
								</tr>
						
							<?php
						}
						?>
						</table>
						<?php
					}
					else if($count==1){
						
						$sql = "SELECT * FROM studentinformation where name like '%$name%'"; //query for fecthing results from database using name
						$query=mysqli_query($conn,$sql);
						While($row=mysqli_fetch_array($query))
						{
							$image=$row['image'];
							$ad=$row['id'];
							$sname=$row['name'];
							$dateofbirth=date('d-m-Y',strtotime($row['dateofbirth']));
							$gender=$row['gender'];	
							$father_name=$row['fathername'];
							$class=$row['class'];
							$Mobile_Number=$row['phone'];
							$year1=$row['year'];
							$year2=$row['year']+1;
							$year=$year1."-".$year2;
							$m=1;

						}
							
					}else{	
						$error=1;
					}
					
				}
				if(isset($_POST['select'])){
					$id=$_POST['adno'];
					$sql = "SELECT * FROM studentinformation where id='$id'"; //query for fecthing results from database using id
					$query=mysqli_query($conn,$sql);
					While($row=mysqli_fetch_array($query))
					{
							$image=$row['image'];
							$ad=$row['id'];
							$sname=$row['name'];
							$dateofbirth=date('d-m-Y',strtotime($row['dateofbirth']));
							$gender=$row['gender'];	
							$father_name=$row['fathername'];
							$class=$row['class'];
							$Mobile_Number=$row['phone'];
							$year1=$row['year'];
							$year2=$row['year']+1;
							$year=$year1."-".$year2;
							$m=1;
							
						
						
					}
				}
				$vale=0;
				$tab=0;
				$lastdue=0;
				$totalpaid=0;
				if($m==1)
				{
					$query=mysqli_query($conn,$sql);
					While($row=mysqli_fetch_array($query))
					{
						if(($row['id']==$id) || ($row['name']==$name)){ //query for fecthing results from database 
							$image=$row['image'];
							$ad=$row['id'];
							$sname=$row['name'];
							$dateofbirth=date('d-m-Y',strtotime($row['dateofbirth']));
							$gender=$row['gender'];	
							$father_name=$row['fathername'];
							$class=$row['class'];
							$Mobile_Number=$row['phone'];
							$year1=$row['year'];
							$year2=$row['year']+1;
							$year=$year1."-".$year2;
						}
						
					}
					$months=array("June","July","August","September","October","November","December","January","February","March","April","May");
					$d=date('F');
					$a=0;
					while($a<=12)
					{
						if($months[$a]==$d){
							break;
						}
						$a++;			
					}
					$sql = "SELECT * FROM feestructure where class='$class'"; //query for fecthing fee of a class
					$query=mysqli_query($conn,$sql);
					While($row=mysqli_fetch_array($query))
					{
							$monthfee=$row['fee'];
							$totalfee=$row['fee']*12; 
							
						
					}
				
					$sql = "SELECT * FROM studentfees where id='$ad' And class='$class'"; //query for fecthing results from pervious fees
					$query=mysqli_query($conn,$sql);
					While($row=mysqli_fetch_array($query))
					{
							$paiddate=$row['paiddate'];
							$clrdates=$row['clearedmonth'];
							$paidamount=$row['feepaid'];
							$totalpaid=$totalpaid+$paidamount;
							$totaldue=$row['totalfee'];
							$tab=1;
							
						
					}
					if($tab==1){
						$totaldue=$totalfee-$totalpaid;
						$monthlydue=$monthfee*($a+1)-$totalpaid; //calculating monthlydue
						if($monthlydue<0){
							$monthlydue=0;
						}
					}
					if($tab==0){
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
						$sql = "SELECT * FROM studentfees where id='$ad' And class='$pclass'"; //query for fecthing pervious class dues
						$query=mysqli_query($conn,$sql);
						While($row=mysqli_fetch_array($query))
						{
								
								$lastdue=$row['totalfee'];
								
							
						}
						
						
						$totaldue=$totalfee;
						$monthlydue=$monthfee*($a+1);
					}
					
					
				}
				?>
				<!-- display all details-->
					<div class="detail">
						
						<div id="myDIV">
							<img class="pop_img"  src="../images/logo.png">
							<h1 style="padding-top:10px">VISHAVAI VIDYANIKETHAN<br><span class="school">HIGH SCHOOL</span></h1>
							<img src="<?php echo $image; ?>" width="140px" height="140px" style="float:right; margin-right:20px; margin-top:-10px;" class="photo"/>
							<h3 class="h">
								<table class="details" style="text-align:center;">
									<tr>
									<td>CLASS:</td><th><?php echo $class;?></th>
									<td>ADMISSION NO:</td><th><?php echo $ad;?> </th>
									</tr>
									<tr>
									<td>STUDENT NAME:</td><th><?php echo $sname;?></th>
									<td></td><th></th>
									</tr>
									<tr>
									<td>FATHER NAME:</td><th><?php echo $father_name;?> </th>
									<td>DATE OF BIRTH:</td><th><?php echo $dateofbirth;?> </th>
									</tr>
									<tr>
									<td>PHONE:</td><th><?php echo $Mobile_Number;?> </th>
									<td>ACADEMIC YEAR:</td><th><?php if($m==1){echo $year;}?></th>
									</tr>
								</table>
							</h3>
							<table style="width:60%; " class="monthwise">
								<tr>
								<th>Sno</th>
								<th>Paid date</th>
								<th>paid amount</th>
								<th>totaldue</th>
								
								</tr>
								<?php
								if($tab==1){
									$ta=1;
									$query=mysqli_query($conn,"select * from studentfees where id='$ad' and class='$class'");//query for fecthing results from database using id
									While($row=mysqli_fetch_array($query))
									{
										
										echo "<tr><td>".$ta."</td>";
										echo "<td>".$row['paiddate']."</td>";
										echo "<td>".$row['feepaid']."</td>";
										echo "<td>".$row['totalfee']."</td></tr>"; 
										
										$ta++;
									}
									$vale=1;
								}
								
								?>
							</table>
							<?php if($lastdue>0){
								echo "<h3>Last Year Due:".$lastdue."</h3>";
							}
							?>
							<table style="width:60%" class="monthwise" style="border-collapse:collapse; margin-top:20px;">
								<tr>
								<th>Months</th>
								<th>June</th>
								<th>July</th>
								<th>August</th>
								<th>September</th>
								<th>October</th>
								<th>November</th>
								<th>December</th>
								<th>January</th>
								<th>February</th>
								<th>March</th>
								<th>April</th>
								<th>May</th>
								</tr>
								<tr>
									
										<th>Cleared/not</th>
										<?php 
										//displaying cleared months
										$rows=array("pending","pending","pending","pending","pending","pending","pending","pending","pending","pending","pending","pending");
										if($vale==1)
										{
											$months=array("June","July","August","September","October","November","December","January","February","March","April","May");
											$day=$clrdates;
											$a=0;
											
											while($a<12)
											{
												if($months[$a]==$day){
													break;
												}
												$a++;			
											}
											if($a==12){
												$a=-1;
											}else{
											$u=0;
											while($u<=$a){
												$rows[$u]="cleared";
												$u++;
											}
											}
											
											$vale=2;
										}
										?>
										<td	class="check"><?php echo $rows[0]; ?></td>
										<td	class="check"><?php echo $rows[1]; ?></td>
										<td	class="check"><?php echo $rows[2]; ?></td>
										<td	class="check"><?php echo $rows[3]; ?></td>
										<td	class="check"><?php echo $rows[4]; ?></td>
										<td	class="check"><?php echo $rows[5]; ?></td>
										<td	class="check"><?php echo $rows[6]; ?></td>
										<td	class="check"><?php echo $rows[7]; ?></td>
										<td	class="check"><?php echo $rows[8]; ?></td>
										<td	class="check"><?php echo $rows[9]; ?></td>
										<td	class="check"><?php echo $rows[10]; ?></td>
										<td	class="check"><?php echo $rows[11]; ?></td>
									
								</tr>
								<tr>
										<script>
										var x=<?php echo $u; ?>;
										
										for(i=0;i<x;i++){
											var ddlPassport=document.getElementsByClassName("check")[i];
											
											if(ddlPassport.innerHTML == "cleared") {
												document.getElementsByClassName("check")[i].style.backgroundColor="lightgreen";
											}
											
										}
										</script>
										<th>paidamount</th>
										<?php 
										//calculating current monthdue and totaldue
										$paid=array(0,0,0,0,0,0,0,0,0,0,0,0);
										if($vale==2)
										{
											$months=array("June","July","August","September","October","November","December","January","February","March","April","May");
											$totalpaid=0;
											$query=mysqli_query($conn,"select * from studentfees where id='$ad' and class='$class'");//query for fecthing results from database using id
											While($row=mysqli_fetch_array($query))
											{
												
													
												$clrdates=$row['clearedmonth'];
												$monthdue=$row['monthdue'];
												$totalpaid=$totalpaid+$row['feepaid'];
												
											}
											$sql = "SELECT * FROM feestructure where class='$class'";//query for fecthing results from database using class
											$query=mysqli_query($conn,$sql);
											While($row=mysqli_fetch_array($query))
											{
													$monthfee=$row['fee'];
													$totalfee=$row['fee']*12; 
													
												
											}
											$b=0;
											while($b<12)
											{
												if($months[$b]==$clrdates){
													break;
												}
												$b++;			
											}
											if($b==12){
												$b=-1;
											}
											$u=0;
											while($u<=$b){
												$paid[$u]=$monthfee;
												$u++;
											}
											$v=0;
											while($v<12)
											{
												if($totalpaid<($monthfee*($v+1))){
													break;
												}
												$v++;
											}
											$check=$monthfee*($v+1)-$totalpaid;
											if($check<$monthfee){
												$rem=$monthfee*($v+1)-$totalpaid;
												$paid[$v]=$monthfee-$rem;
											}
											else{
												$paid[$v]=0;
											}
											if($monthlydue<0)
											{
												$monthlydue=0;
											}
										}
										?>
										<td><?php echo $paid[0]; ?></td>
										<td><?php echo $paid[1]; ?></td>
										<td><?php echo $paid[2]; ?></td>
										<td><?php echo $paid[3]; ?></td>
										<td><?php echo $paid[4]; ?></td>
										<td><?php echo $paid[5]; ?></td>
										<td><?php echo $paid[6]; ?></td>
										<td><?php echo $paid[7]; ?></td>
										<td><?php echo $paid[8]; ?></td>
										<td><?php echo $paid[9]; ?></td>
										<td><?php echo $paid[10]; ?></td>
										<td><?php echo $paid[11]; ?></td>
									
								</tr>
							</table><br>
							<table style="width:60%; text-align='center'" >
								<tr>
								<th colspan="1" style="padding-right:60px; padding-left:20px;">Fee Due</th>
								<th>Amount</th> 
								
								</tr>
								<tr>
								<td colspan="1" style="padding:0; font-weight:bold; text-align:center;">Until Current Month Due</td>
								<td style="text-align:center;"><?php echo $monthlydue; ?></td>
								</tr>
							</table><br>
							<span class="balance" style="padding:0; font-weight:bold;">Year Due:<?php echo $totaldue; ?> &nbsp Total Due:<?php echo $totaldue+$lastdue; ?></span><br>
							<input type="submit" id="pay" value="Pay Now" class="but" name="progress" style="margin-left:48%"/>
							
						</div>
						
									
					</div>
				<!-- end of display all details-->	
			</div>
		</div>	
<!--End main content-->
	
	
		<!-- Payment popup-->
			<div class="payment">
				<div class="pay-content">
				
					<img class="clos"  src="../images/close.png">
					<img  src="../images/feelogo1.png" width="100%" style="margin-top:0px;">
						<form method="POST">
						<h3>
						<span>Admission No:<?php echo $ad;?></span><br>
						<span>Name:<?php echo $sname;?></span><br>
						<span>Class:<?php echo $class;?></span><br>
						</h3>
						<label style="align:center; font-weight:bold;">Fee Paid</label>
						<input type="number_format"  name="feepaid" onkeypress="isInputNumber(event)"  class="amount" style="font-size:20px" ><br>
						<input type="hidden"  name="admnno" value="<?php echo $ad;?>"><br>
						<input type="hidden"  name="lastdue" value="<?php echo $lastdue;?>"><br>
						<input type="submit" name="pay" value="PAY NOW" class="button1" >
						</form>
								
				</div>
			</div>	
		<!--end of payment popup-->	
		<?php
				if(isset($_POST['pay'])){
					?><script> window.scrollTo(0,0);
						document.body.style.overflow="hidden";</script><?php
						
					$months=array("June","July","August","September","October","November","December","January","February","March","April","May");
					$d=date('F');
					$a=0;
					while($a<=12)
					{
						if($months[$a]==$d){
							break;
						}
						$a++;			
					}
					$id=$_POST['admnno'];
					$fee=$_POST['feepaid'];
					$lastdue=$_POST['lastdue'];
					$val=0;
					$value=0;
					$extra=0;
					
					$sql = "SELECT * FROM studentinformation where id='$id'";//fecthing details using id
				
					$query=mysqli_query($conn,$sql);
					While($row=mysqli_fetch_array($query))
					{
							$name=$row['name'];
							$class=$row['class'];
							$year=$row['year'];
							
						
					}
					
					$sql = "SELECT * FROM feestructure where class='$class'";//fecthing fee using class
					$query=mysqli_query($conn,$sql);
					While($row=mysqli_fetch_array($query))
					{
							$monthfee=$row['fee'];
							$totalfee=$row['fee']*12; 
							
						
					}
					$monthlydue=$monthfee*($a+1);
					$totalpaid=0;
					$paid=$fee;
					$fee=$lastdue-$fee;
					if($fee<0){
							$fee=0-$fee;
							$extra=$lastdue;
						$query=mysqli_query($conn,"select * from studentfees where id='$id'");//fecthing details using id
						While($row=mysqli_fetch_array($query))
						{
							if($row['id']== $id && $row['class']==$class){
								$class=$row['class'];
								$name=$row['name'];       
								$paiddate=$row['paiddate'];
								$paidamount=$row['feepaid'];
								$clrdates=$row['clearedmonth'];
								$monthdue=$row['monthdue'];
								$totaldue=$row['totalfee']; 
								$totalpaid=$totalpaid+$row[5];
								$val=1;	
							}
						}
						if($val==1){
							if($totalpaid==($monthfee*12))
							{
								$value=1;
							}else{
								$fees=$fee+$totalpaid;
								$i=0;
								while($i<12){
									if($fees<($monthfee*($i+1)))
									{
										$i=$i-1;
										break;
									}
									if($fees==($monthfee*($i+1)))
									{
										break;
									}
									$i++;
								}
								if($i==12){
									$clrdate="Null";
								}else{
									$clrdate=$months[$i];
								}
								if($i<0)
								{
									$clrdate="Null";
								}
								$monthlydue=$monthlydue-$fees;
								if($monthlydue<0){
									$monthlydue=0;
								}
								$totaldue=$totalfee-$fees;
							}
							
							
						}
						else{
							
							$b=1;
							while($b<12){
								if($fee<($monthfee*$b))
								{
									$b--;
									break;
								}
								if($fee==($monthfee*$b))
								{
									break;
								}
								$b++;
							}
							
							if($b==0)
							{
								$clrdate="Nll";
							}else{
								$clrdate=$months[$b-1];
							}
							
							$monthlydue=$monthlydue-$fee;
							$totaldue=$totalfee-$fee;
							if($extra!=0){
								?><script>document.querySelector('.extra').style.display="block"; </script> <?php
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
								$date=date("Y-m-d");
								$totaldue1=0;
								$clrdate1="May";
								$fee1=$extra;
								$monthlydue1=0;
								$sql = "INSERT INTO studentfees (id,name,class,paiddate,feepaid,clearedmonth,monthdue,totalfee) VALUES ('$id','$name','$pclass','$date','$fee1','$clrdate1','$monthlydue1','$totaldue1' )";
								if (mysqli_query($conn, $sql)) {
									echo " ";
								}
							}
						}
					}else{
						$totaldue=$fee;
						$clrdate="May";
						$fee=$paid;
						$monthlydue=0;
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
							$pclass=$classes[$b-1];//pervious class
						}
						$class=$pclass;
					}
					if($totaldue<0){
						//totaldue due error
						?>
							<script> document.body.style.overflow="hidden";
							setTimeout(function(){
								document.body.style.overflow='visible'; 
								document.getElementById('popup').style.display = 'none';
							}, 3000);
							</script>
							<div id="popup">
							<div class="alert warning">
							<span class="closebtn" onclick="window.location='feepayment.php';">&times;</span>  
							<strong>Warning!</strong>Exceeding Total FEE.
							</div>
							</div>
						<?php
					}
					else if($value==1)
					{
						//fee completed error
						?>
							<script> document.body.style.overflow="hidden";
							setTimeout(function(){
								document.body.style.overflow='visible'; 
								document.getElementById('popup').style.display = 'none';
							}, 3000);
							</script>
							<div id="popup">
							<div class="alert success">
							<span class="closebtn" onclick="window.location='feepayment.php';">&times;</span>  
							<strong>Message!</strong> Total FEE Already Paid;
							</div>
							</div>
						<?php
					}
					else{	
						$date=date("Y-m-d");
						$conn=mysqli_connect("localhost","root","","studentinfo");
						$sql = "INSERT INTO studentfees (id,name,class,paiddate,feepaid,clearedmonth,monthdue,totalfee) VALUES ('$id','$name','$class','$date','$fee','$clrdate','$monthlydue','$totaldue' )";//inserting into studentfees
						if (mysqli_query($conn, $sql)) {
							$sql="select * from studentfees ORDER by receipt_no";

							if ($result=mysqli_query($conn,$sql))
							{
							// Return the number of rows in result set
							$rowcount=mysqli_num_rows($result);
							$no=$rowcount;
						
							}
						} else {
							echo "Error: " . $sql . "" . mysqli_error($conn);
						}
						

						?>
						<!-- fee receipt-->	
						
							<div class="popup1">
							<div id="myDIV1">
	`						<img id="close" src="../images/close.png" onclick="window.location='feepay.php'; document.body.style.overflow='visible';">
							<div class="print">
							<img class="pop_img" src="../images/schoollogo.png">
							<h1 style=" padding:10px;">VISHAVAI VIDYANIKETHAN<br><span class="school">HIGH SCHOOL</span></h1>
							<h3 class="h1">
								<table border="none" width="100%">
								<tr>
								<th>CLASS:</th><td><?php echo $class;?></td>
								<th>RECEIPT NO:</th><td><?php echo $no; ?></td>
								</tr>
								<tr>
								<th>TYPE:</th><td>FEE SLIP</td><th>DATE: </th><td><?php echo date("d-F-Y"); ?></td>
								</tr>
								<tr>
								<th>ADMISSION NO:</th><td><?php echo $id; ?></td>
								<th>ACADEMIC YEAR:</th><td><?php echo $year,"-",($year+1); ?></td>
								</tr>
								<tr>
								<th>STUDENT NAME:</th><td colspan="3"><?php echo $name; ?> </td>
								</tr>
								</table>
								
								
							</h3>
							<table style="width:60%" class="feetable">
								<tr>
								<th colspan="2">Particulars</th>
								<th>Amount</th> 
								
								</tr>
								<tr>
								<td colspan="2" style="padding:0; font:normal; text-align:center">School fee</td>
								<td style="text-align:center"><?php echo $fee.".00"; ?></td>
								</tr>
								<?php 
								if($extra!=0){
									?>
									<tr>
									<td colspan="2" style="padding:0; font:normal; text-align:center;">Pervious Class Fee</td>
									<td style="text-align:center;"><?php echo $extra.".00"; ?></td>
									</tr>
									<?php
								}
								?>
								<tr>
								<td colspan="2" style="text-align:center; font-weight:bold;">Total Amount</td>
								<td style="text-align:center; font-weight:bold;"><?php echo $fee+$extra.".00"; ?></td>
								</tr>
								
							</table><br>
							<span style="margin-left:10%; font-weight:bold;">Total Due:<?php echo $totaldue;?></span>
							<h3 class="sign"> Authorised Signature</h3>
							</div>
							<input type="button" id="hide" class="but" onclick="window.print();" value="print" style="margin-top:8px"/>
							</div>
							</div>
							
						<!-- End of fee receipt-->
						
							<script> document.body.style.overflow="hidden";</script>
						<?php
					}
					
					
				
				}
				if($error==1){
					//details not found error
					?>
						<script> 
						document.body.style.overflow="hidden";
						setTimeout(function(){
							document.body.style.overflow='visible'; 
							document.getElementById('popup').style.display = 'none';
						}, 3000);
						</script>
							<div id="popup">
							<div class="alert warning">
							<span class="closebtn" onclick="window.location='feepayment.php';">&times;</span>  
							<strong>warning!</strong> Details Not Found;
							</div>
							</div>
						<?php
				}
					
					
//checking login credentials 
	if(isset($_POST['login'])){
		$username=strtolower($_POST['username']);
		$password=$_POST['password'];
		$value=0;
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
				header("location:../principal login/0-admin.php");//redirect
			}
			else{
				header("location:../teachers login/new.php");//redirect
			}
		}
		else{
			//password/username error
			?>
			<script>
			document.body.style.overflow="hidden";
			document.querySelector(".popup").style.display="flex";
			document.querySelector(".incorrect").style.display="flex";
			</script>
			<?php
		}
	}
?>						
	</body>
	
<!--End of body-->

<!--javascript-->	
  <script>
	document.getElementById("pay").addEventListener("click",function(){
		document.querySelector(".payment").style.display="flex";
		window.scrollTo(0,0);
		document.body.style.overflow="hidden";
	})
	document.querySelector(".clos").addEventListener("click",function(){
		document.querySelector(".payment").style.display="none";
		document.body.style.overflow="visible";
	})
	
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
	document.getElementById("clicked").addEventListener("click",function(){
		document.querySelector(".popup").style.display="flex";
		document.body.style.overflow="hidden";
	})
	document.querySelector(".close").addEventListener("click",function(){
		document.querySelector(".popup").style.display="none";
		document.body.style.overflow="visible";
	})
	
	function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
	}
	document.querySelector(".popup1").style.display=window.innerHeight;
	document.querySelector(".payment").style.display=window.innerHeight;
	
	
	function isInputNumber(evt){
                
        var ch = String.fromCharCode(evt.which);
        
        if(!(/[0-9]/.test(ch))){
            evt.preventDefault();
        }
        
    }
		
  </script>
 <!--End of javascript--> 
</html>																						