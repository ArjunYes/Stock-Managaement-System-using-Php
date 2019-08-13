<style type="text/css">
	
.Error_msg{
    font-family: 'Abel', sans-serif,bold;
    font-size: 15px;
    color: red;

}
   

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

	width: 23%; 
    height: 80%;
    left: 0%;
    right: 0%;
    margin-left: auto;
    margin-right: auto;
    border-radius: 10px;
    background: rgba(245, 245, 220, 0.32);
    float: left;
    margin-bottom: 5%;
    margin-right: 8%;
    margin-left: 2%;
   
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
    margin-top: 7%;
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

<?php  
    session_start();
    if($_SESSION['login'] != true || $_SESSION['level'] != 'l1'){
        echo "<script> alert('Please login to continue'); window.location.href = 'Admin_login.php' </script>";
}


?>



<!DOCTYPE html>
<html>
<head>
	<title>ADMIN PANEL</title>
	<link rel="stylesheet"  href="css2/style3.css">
	<link href="https://fonts.googleapis.com/css?family=Abel|Montserrat|Patua+One" rel="stylesheet">
</head>
<body>


	<div class="container1">
        <center><h1 class="centerheader">ADMIN PANEL</h1></center>
        <button class="btnlogout" onclick="window.location.href='logout.php'">LOGOUT</button>
		
		<div class="container2">
			<br>
			<center><h1 class="paragraph2">STAFF</h1></center>
			<button onclick="window.location.href='Staff_add.php'" class="btn1">ADD NEW STAFF</button>
			<button onclick="window.location.href='Staff_delete.php'" class="btn1">DELETE STAFF</button>
			<button onclick="window.location.href='Staff_pwd_change.php'" class="btn1">STAFF PASSWORD CHANGE</button>
			<button onclick="window.location.href='	All_staff_details.php'" class="btn1">ALL STAFF DETAILS</button>
		</div>

		

		<div class="container2">
			<br>
			<center><h1 class="paragraph2">OPERATIONS</h1></center>
			<button onclick="window.location.href='gst_value.php'" class="btn1">CHANGE GST VALUE</button>
		</div>



	</div>


	<div id="particles-js"></div> 
	<script type="text/javascript" src="css2/particles.js"></script>
	<script type="text/javascript" src="css2/app.js"></script>







</body>
</html>



			





