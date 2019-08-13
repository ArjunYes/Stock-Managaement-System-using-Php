
<!DOCTYPE html>
<html>
<head>
	<title>STAFF HOME</title>
	<link rel="stylesheet"  href="css2/style3.css">
	<link href="https://fonts.googleapis.com/css?family=Abel|Montserrat|Patua+One" rel="stylesheet">
</head>
<body>
   
<div class="container1">
	
		<div class="container2">

		



<?php 
session_start();
$Staff_id =  $_SESSION['Staff_id'];  
include("db_connection.php");

$sql = "select * from staff_details where Staff_id = '$Staff_id'";
$result = 	mysqli_query($conn,$sql);
        
 if(mysqli_num_rows($result)>0){
 	while($row = mysqli_fetch_assoc($result)) {

 	$Staff_fname = $row['f_name'];
 	$Staff_lname = $row['l_name'];


 	}
 }else{
        echo "No database available";
    }










if($_SESSION['login'] != true || $_SESSION['level'] != 'l2'){
	echo "<script> alert('Please login to continue'); window.location.href = 'Staff_login.php' </script>";
}



?>

<div class="container1">

<button class="btnlogout" onclick="window.location.href='logout.php'">LOGOUT</button>
<h1 class="heading1">Staff Operations</h1>

<b><h1  class="paragraphx">Welcome <?php echo $Staff_fname," ",$Staff_lname; ?>  </h1><b>

<p class="paragraph1">Select from the options and click save </p>


	<div class="box1"> <center class="paragraph2">HOSPITAL</center>
		<button onclick="window.location.href='Add_hospital.php'" class="btn" >ADD HOSPITAL</button>
		<button onclick="window.location.href='Delete_hospital.php'" class="btn">DELETE HOSPITAL</button>
		<button onclick="window.location.href='All_hospital_details.php'" class="btn">ALL HOSPITAL DETAILS</button>
	</div>

	<div class="box1"><center class="paragraph2">ITEM</center>
		<button onclick="window.location.href='item_add.php'" class="btn" >ADD ITEM</button>
		<button onclick="window.location.href='Delete_item.php'" class="btn">DELETE ITEM</button>
		<button onclick="window.location.href='All_item_details.php'" class="btn">ALL ITEM DETAILS</button>
	</div>

	<div class="box1"><center class="paragraph2">STOCK AT OFFICE</center>
		<button onclick="window.location.href='Add_stock_to_office.php'" class="btn" >ADD STOCK TO OFFICE</button>
		<button onclick="window.location.href='Reduce_stock_from_office.php'" class="btn" >REDUCE STOCK</button>
		<button onclick="window.location.href='All_office_stock.php'" class="btn">ALL STOCK DETAILS</button>
	</div>


	<div class="box1"><center class="paragraph2">SUPPLY STOCK TO HOSPITAL</center>
		<button onclick="window.location.href='Supply_stock_hospital.php'" class="btn">SUPPLY STOCK TO HOSPITAL</button>
		<button onclick="window.location.href='Take_back_stock.php'" class="btn">SUPPLY BACK TO OFFICE </button>
	</div>

	<div class="box1"><center class="paragraph2">STOCK AT HOSPITAL</center>
		<button onclick="window.location.href='Delete_from_hospital.php'" class="btn">DELETE STOCK AFTER USE</button>
		<button onclick="window.location.href='All_hospital_stock.php'" class="btn">ALL HOSPITAL STOCK </button>
	</div>

	

</div>
	</div>


	<div id="particles-js"></div> 
	<script type="text/javascript" src="css2/particles.js"></script>
	<script type="text/javascript" src="css2/app.js"></script>







</body>
</html>

