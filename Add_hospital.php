<style type="text/css">
	
.in1{
   	margin-top: 3%; 
    outline: 0;
    background: #f2f2f2;
    font-family: 'Abel', sans-serif;
    width: 90%;
    border: 0;
    padding: 13px;
    border-top-left-radius: 3px;
    border-top-right-radius: 3px;
    border-bottom-left-radius: 3px;
    border-bottom-right-radius: 3px;
    font-size: 14px;
    margin-left: 5%;

}

.container2{
	width: 33%; 
    height: 90%;
    left: 0%;
    right: 0%;
    margin-left: auto;
    margin-right: auto;
    border-radius: 10px;
    background: rgba(245, 245, 220, 0.32);
   
}


.btn1{
    background: #ff1919;
    width: 90%;
    border: 0;
    font-family: 'Abel', sans-serif,bold;
    font-size: 17px;
    color: #FFFFFF;
    padding: 13px;
    border-top-left-radius: 3px;
    border-top-right-radius: 3px;
    border-bottom-left-radius: 3px;
    border-bottom-right-radius: 3px;
    margin-left: 5%;
    margin-top: 3%;
}

.btn1:hover{
	background: #6A1B9A;
	
}



.thumbnail{
	margin: auto;
	margin-top: 1=30px;
    background: #E5E8E8;
    width: 150px;
    height: 150px;
    padding: 50px 30px;
    border-top-left-radius: 100%;
    border-top-right-radius: 100%;
    border-bottom-left-radius: 100%;
    border-bottom-right-radius: 100%;
    -webkit-box-sizing: border-box;
    box-sizing: border-box;
    opacity: 0.9;
    background-image: url("css2/student.gif");
    background-size: 150px 150px;
}
</style>


<script type="text/javascript">

function validate(){

	

	var x = Hospital_add.contact_no.value;
	plen = x.toString().length;

	if(plen>10 || plen<=9){
		alert("Enter valid Phone number");
		return false;
	}

}


</script>

<!DOCTYPE html>
<html>
<head>
	<title>HOSPITAL ADDING</title>
	<link rel="stylesheet"  href="css2/style3.css">
	<link href="https://fonts.googleapis.com/css?family=Abel|Montserrat|Patua+One" rel="stylesheet">
</head>
<body>


	<div class="container1">
		<center><h1 class="centerheader">ADD HOSPITAL</h1></center>
		<div class="container2">
		<div class="thumbnail"></div>
		<form name="Hospital_add" action="" method="POST" onsubmit="return validate()">
			<input class="in1" type="text" name="hospital_name" placeholder="HOSPITAL NAME" pattern="[a-zA-Z]{3,}" title="No nos in name" required=""><br>
			<input class="in1" type="number" name="hospital_id" placeholder="HOSPITAL ID" required=""><br>
			<input class="in1" type="text" name="contact_no" placeholder="CONTACT NO" required=""><br>
			<input class="in1" type="text" name="location" placeholder="LOCATION" required="" ><br>
			<input class="btn1" type="submit" name="add_hospital" value="ADD HOSPITAL">
		</form>
		</div>
	</div>


	<div id="particles-js"></div> 
	<script type="text/javascript" src="css2/particles.js"></script>
	<script type="text/javascript" src="css2/app.js"></script>







</body>
</html>




<?php
session_start();
$Staff_id =  $_SESSION['Staff_id'];  
if($_SESSION['login'] != true || $_SESSION['level'] != 'l2'){
	echo "<script> alert('Please login to continue'); window.location.href = 'Staff_login.php' </script>";
}


include("db_connection.php");


if(isset($_POST['add_hospital'])){

	$hospital_name = $_POST['hospital_name'];
	$hospital_id = $_POST['hospital_id'];
	$contact_no = $_POST['contact_no'];
	$location = $_POST['location'];


	#echo $hospital_name;
	#echo $hospital_id;
	#echo $contact_no;
	#echo $location;

	$sql = "insert into hospital (Hospital_id,Hospital_name,Contact_no,Location) values('$hospital_id','$hospital_name',
	'$contact_no','$location')";


	if(mysqli_query($conn,$sql)){
			echo "RECORD INSERTED";
			$message = "Hospital succesfully added";
			echo "<script> window.location.href = 'Staff_home.php' </script>";

	}else{
			echo "Error inserting";
		}



}












?>