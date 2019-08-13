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
    height: 60%;
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


<?php
session_start();
include("db_connection.php");
if($_SESSION['login'] != true || $_SESSION['level'] != 'l2'){
    echo "<script> alert('Please login to continue'); window.location.href = 'Staff_login.php' </script>";
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>ALL HOSPITAL DETAILS</title>
	<link rel="stylesheet"  href="css2/style3.css">
	<link href="https://fonts.googleapis.com/css?family=Abel|Montserrat|Patua+One" rel="stylesheet">
</head>
<body>

	<div class="container1">
        <center><h1 class="centerheader">ALL HOSPITAL DETAILS</h1></center>
		<?php

            $sql = "select * from hospital ";
            $result = mysqli_query($conn,$sql);

            if(mysqli_num_rows($result)>0){

                 while($row = mysqli_fetch_assoc($result)) {
                    print "<div class='box1'>";
                    
                    echo "HOSPITAL ID"," ",$row["Hospital_id"],"<br>";
                    echo "HOSPITAL NAME"," ",$row["Hospital_name"],"<br>";
                    echo "CONTACT"," ",$row["Contact_no"],"<br>";
                    echo "LOCATION"," ",$row["Location"],"<br>";
                    
                    print "</div>";
                 }



            }else{
                echo "No database available";
            }


        ?>
	
    </div>


	<div id="particles-js"></div> 
	<script type="text/javascript" src="css2/particles.js"></script>
	<script type="text/javascript" src="css2/app.js"></script>



</body>
</html>



