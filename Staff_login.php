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
	width: 33%; 
    height: 72%;
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


<!DOCTYPE html>
<html>
<head>
	<title>HOSPITAL ADDING</title>
	<link rel="stylesheet"  href="css2/style3.css">
	<link href="https://fonts.googleapis.com/css?family=Abel|Montserrat|Patua+One" rel="stylesheet">
</head>
<body>


	<div class="container1">
		<center><h1 class="centerheader">STAFF LOGIN</h1></center>
		<div class="container2">
		<div class="thumbnail"></div>
		

		<form action="" method="POST" >
				
					<input class="in1" type="text" name="Staff_id" placeholder="STAFF ID" required=""><br>
					<input class="in1" type="password" name="password1" placeholder="PASSWORD" required=""><br>
					<input class="btn1" type="submit" name="btn" value="LOGIN">	
				
			</form>
		
			<?php
				$username = 'medevice';
				$password = 'abc';
				$db = 'medevice';
				include("db_connection.php");

				if(isset($_POST['btn'])){

					$Staff_id = $_POST['Staff_id'];
					$password = $_POST['password1'];

					$sql = "select * from staff_details where Staff_id ='$Staff_id' and Staff_password='$password'";
					$result = mysqli_query($conn, $sql);


					if (mysqli_num_rows($result)>0){

						session_start();
						$_SESSION['Staff_id'] = $Staff_id;
						$_SESSION['login'] = true;
						$_SESSION['level'] = "l2";


				  		echo "<script>  window.location.href = 'Staff_home.php' </script>";
					} 
					else{
						 print "<center><h1 class= 'Error_msg'>Wrong Password!</h1></center>";
					}






				}
?>


		</div>
	</div>


	<div id="particles-js"></div> 
	<script type="text/javascript" src="css2/particles.js"></script>
	<script type="text/javascript" src="css2/app.js"></script>







</body>
</html>



			





