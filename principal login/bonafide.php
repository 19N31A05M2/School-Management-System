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
	<link rel="stylesheet" href="bonafidestyle.css">
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
            <li style="background:#3e3762;"><a href="Bonafide.php"><i class="fas fa-certificate"></i>Bonafide</a></li>
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
								
								<li style="font-size:16px;"><?php echo $name;?></li>
							</ul>
						</div>
						
					</div>
				</li>
				<li class="nr_li">
					<a href="../first pages/home.php "><i class="fas fa-sign-out-alt"></i></a>
				</li>
			</ul>
		</div>
	</div>
<!--End Of Profile Image View-->	
	
<!--Main Content-->
	<div class="main_content">
		<div class="first">
			<a href="manualbonafide.php" class="left" >Manual Bonafide</a><br>
			<div class="reports">
				<div class="admissionform">
				<h1 class="head">BONAFIDE</h1>
				<form method="POST" class="form">
					<label>Class Status:</label>
					<select name="status">
					<option>Studying</option>
					<option>Studied</option>
					</select><br><br>
					<label>Admission No:</label>
					<input class="name" type="number_format" onkeypress="isInputNumber(event)" name="id" required />
					<label>Date:</label>
					<input class="name" type="date" name="date" id='show_date' required />
					<input type="submit" name="get" class="but" value="submit"/>
				</form>
				<script>
					var d = new Date();
					var strDate =d.getFullYear()+"-"+(d.getMonth()+1)+"-"+("0" +d.getDate()).slice(-2);
					document.getElementById('show_date').value=strDate;
				</script>
				<?php
					$admnclasserror=0;
					$roll=" ";
					$name=" ";
					$father=" ";
					$admnclass=" ";
					$dropclass=" ";
					$class=" ";
					$fromyear=" ";
					$year=" ";
					$dob=" ";
					$status=" ";
					$status1=" ";
					$dobwords=" ";
					$x=1;
					$y=0;
					$z=0;
					$ones=array("ZERO","ONE","TWO","THREE","FOUR","FIVE","SIX","SEVEN","EIGHT","NINE");
					$classes=array("NURSERY","LKG","UKG",1,2,3,4,5,6,7,8,9,10,11);
					$rclass=array("NURSERY","LKG","UKG",'I','II','III','IV','V','VI','VII','VIII','IX','X');
					$kclass=array(" "," "," ",'FIRST','SECOND','THIRD','FOURTH','FIFTH','SIXTH','SEVENTH','EIGHTH','NINTH','TENTH');
					if(isset($_POST['get'])){
						$x=0;
						$id=$_POST['id'];
						$show_date=$_POST['date'];
						if($_POST['status']=="Studying"){
//fetching Studying Student Details							
							$sql = "SELECT * FROM studentinformation where id='$id'";
							$query=mysqli_query($conn,$sql);
							While($row=mysqli_fetch_array($query))
							{
								if($row['id']==$id){
									$roll=$row['id'];
									$name=$row['name'];
									$father=$row['fathername'];
									$admnclass=$row['class'];
									$dropclass="-";
									$class=$dropclass;
									$fromyear=$row['year'];
									$lasttwo=substr($fromyear, -2);
									$fromyear=$fromyear."-".($lasttwo+1);
									$year="-";
									$dob=date('d-m-Y',strtotime($row['dateofbirth']));
									
									$status="(Studying)";
									$status1=" ";
									$x=1;
									$y=1;
								}
								
							}
							
						}else{
//fetching details from Dropout							
							$sql = "SELECT * FROM dropout where id='$id'";
							$query=mysqli_query($conn,$sql);
							While($row=mysqli_fetch_array($query))
							{
								if($row['id']==$id){
									$roll=$row['id'];
									$name=$row['name'];
									$father=$row['fathername'];
									$admnclass=$row['admnclass'];
									$dropclass=$row['leavingclass'];
									
									$c=$dropclass;
									$b=0;
									while($b<=12)
									{
										if($classes[$b]==$c){
											break;
										}
										$b++;			
									}
									$class=$classes[$b];
									$fromyear=date('Y',strtotime($row['admndate']));
									$lasttwo=substr($fromyear, -2);
									$fromyear=$fromyear."-".($lasttwo+1);
									$year=$row['year'];
									$lasttwo=substr($year, -2);
									$year=($year-1)."-".$lasttwo;
									$dob=date('d-m-Y',strtotime($row['dateofbirth']));
									
									$status="";
									$dropped=$row['status'];
									$x=1;
									$y=1;
									$z=1;
									
								}
								
							}
							
							$sql = "SELECT * FROM studentinformation where id='$id'";
							$query=mysqli_query($conn,$sql);
							While($row=mysqli_fetch_array($query))
							{
								if($row['id']==$id){
									$roll=$row['id'];
									$name=$row['name'];
									$father=$row['fathername'];
									$admnclass=$row['admnclass'];
									
									$class=$row['class'];
									$fromyear=date('Y',strtotime($row[3]));
									$lasttwo=substr($fromyear, -2);
									$fromyear=$fromyear."-".($lasttwo+1);
									$year=$row['year'];
									$lasttwo=substr($year, -2);
									$year=($year-1)."-".$lasttwo;
									$dob=date('d-m-Y',strtotime($row['dateofbirth']));
									
									$status="(Studying)";
									$x=1;
									$y=1;
									$z=1;
									$f=$class;
									$h=0;
									while($h<=12)
									{
										if($classes[$h]==$f){
											break;
										}
										$h++;			
									}
									$class=$classes[$h-1];
								}
								
							}
							
							$c=$admnclass;
							$g=0;
							while($g<=12)
							{
								if($classes[$g]==$c){
									break;
								}
								$g++;			
							}
							$f=$class;
							$h=0;
							while($h<=12)
							{
								if($classes[$h]==$f){
									break;
								}
								$h++;			
							}
							if($z==1 && $g<=($h-1)){
						
								
								
								$c=$class;
								$b=0;
								while($b<=12)
								{
									if($classes[$b]==$c){
										break;
									}
									$b++;			
								}
								$status=" (".$kclass[$b].")";
								$status1=" (".$kclass[$b].")";
							}else{
								$admnclasserror=1;
								
								$status1=" ";
							}
						}
						
						
					}
					
					if($y==1){
						
						
						$c=$admnclass;
						$b=0;
						while($b<=12)
						{
							if($classes[$b]==$c){
								break;
							}
							$b++;			
						}
						$status=" (".$kclass[$b].")";	
						$c=$admnclass;
						$b=0;
						if($c==11){
							$admnclass=$rclass[12];
						}else{
							while($b<=12)
							{
								if($classes[$b]==$c){
									break;
								}
								$b++;			
							}
							$admnclass=$rclass[$b];
						}
						
						if($class!=" "){
							$c=$class;
							$b=0;
							
							while($b<=12)
							{
								if($classes[$b]==$c){
									break;
								}
								$b++;			
							}
							if($b<13){
								$class=$rclass[$b];
							}
							
						}
												
						
						if($class==$admnclass){
							$class="-";
							$year="-";
						}
					$date=date('d',strtotime($dob));
					$date1=$date[0];
					$date2=$date[1];
					$month=date('F',strtotime($dob));
					$dobyear=date('Y',strtotime($dob));
					$year1=$dobyear[0];
					$year2=$dobyear[1];
					$year3=$dobyear[2];
					$year4=$dobyear[3];
					$dobwords=$ones[$date1]." ".$ones[$date2]." ".$month." ".$ones[$year1]." ".$ones[$year2]." ".$ones[$year3]." ".$ones[$year4];
					$dobwords="(".$dobwords.")";
					
						
					}
					

				
				?>
				
				
<!--bonafide-->				
				<div class='bonafide' id='form'>
					
					<img src="../images/Bonafide.jpg" id="bfde"/>
					<span class="sname"><?php if(isset($_POST['get'])){ echo strtoupper($name); } ?></span>
					<span class="admission"><?php if(isset($_POST['get'])){ echo $roll; } ?></span>
					<span class="date"><?php if(isset($_POST['get'])){ echo date('d-m-Y',strtotime($show_date)); } ?></span>
					<span class="father"><?php if(isset($_POST['get'])){ echo strtoupper($father); } ?></span>
					<span class="admnclass"><?php if(isset($_POST['get'])){ echo $admnclass."".$status; } ?></span>
					<span class="class"><?php if(isset($_POST['get'])){ echo $class."".$status1; } ?></span>
					<span class="fromyear"><?php if(isset($_POST['get'])){ echo $fromyear; } ?></span>
					<span class="toyear"><?php if(isset($_POST['get'])){ echo $year; } ?></span>
					<span class="dob" id="words"><?php if(isset($_POST['get'])){ echo $dob." ".strtoupper($dobwords).""; } ?></span>
					<span class="dob" id="words1"><?php if(isset($_POST['get'])){ echo $dob; } ?></span>

				</div>
				
					 <div style="text-align:center;">
					<input type="button" onclick="printDiv('form');" class="but" value="print" style="margin-top:20px;  margin:auto;"/>
					<input type="button"  class="but" id="rrprint" value="RRprint" style="margin-top:8px; display:inline; margin-left:8px;"/>
					<input type="button"  class="but" id="mdclprint" value="MDCLprint" style="margin-top:8px; display:inline; margin-left:8px;"/>
					
					</div>
				</div>
				<script>
					document.getElementById('rrprint').addEventListener("click",function(){
						document.getElementById('bfde').style.display='none'; 
						document.getElementById('words').style.display='none'; 
						document.getElementById('words1').style.display='flex';
						for(i=1;i<11;i++){
							document.getElementsByTagName('span')[i].style.paddingTop='10px';
							document.getElementsByTagName('span')[i].style.marginLeft='-2cm';
						}							
						printDiv('form'); 
						window.location.href='bonafide.php';
					});
				</script>
				<script>
					document.getElementById('mdclprint').addEventListener("click",function(){
						document.getElementById('bfde').style.display='none'; 
						document.getElementById('words').style.display='none'; 
						document.getElementById('words1').style.display='flex';
						for(i=1;i<11;i++){
							document.getElementsByTagName('span')[i].style.paddingTop='10px';
							document.getElementsByTagName('span')[i].style.marginLeft='0px';
						}							
						printDiv('form'); 
						window.location.href='bonafide.php';
					});
				</script>
				
				
			</div>
		</div> 
	</div>
<!--End of Main content-->	
</div>	
<?php
if($x==0){
//details not found message	
	?>
	<script>document.body.style.overflow="hidden";</script>
	<div id="popup2">
	<div class="alert info">
	<span class="closebtn" onclick=" document.body.style.overflow='visible'; window.location.href='bonafide.php'">&times;</span>  
	<strong>Error!&nbsp </strong>Details Not Found.
	</div>
	<?php
	
}
if($admnclasserror==1){
//Wrong Selection  message
	?>
	<script>document.body.style.overflow="hidden";</script>
	<div id="popup2">
	<div class="alert info">
	<span class="closebtn" onclick=" document.body.style.overflow='visible'; window.location.href='bonafide.php'">&times;</span>  
	<strong>Error!&nbsp </strong>Please select Class Status as Studying for this Admission no: <?php echo $id; ?>.
	</div>
	<?php
}
?>
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
function printDiv(printpage)
{
var headstr = "<html><head><title></title></head>";
var newstr = document.all.item(printpage).innerHTML;
var oldstr = document.body.innerHTML;
document.body.innerHTML = headstr+newstr;
window.print();
document.body.innerHTML = oldstr;
return false;
}			
var text=document.querySelector('.place').innerHTML;
var text1=document.querySelector('.father').innerHTML;


if(text.length>30){
	document.querySelector('.place').style.fontSize="15px";
	document.querySelector('.place').style.top="6.1cm";
}
if(text1.length>30){
	document.querySelector('.father').style.fontSize="15px";
	document.querySelector('.father').style.top="7.06cm";
}
if(text1.length>40){
	document.querySelector('.father').style.fontSize="11px";
	document.querySelector('.father').style.top="7.1cm";
}

</script>
	
</body>
<!--End of body-->
</html>