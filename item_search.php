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


.btn2{
	position: relative;
    background: #ff1919;
    width: 90%;
    border: 0;
    font-family: 'Abel', sans-serif,bold;
    font-size: 20px;
    color: #FFFFFF;
    padding: 17px;
    border-top-left-radius: 3px;
    border-top-right-radius: 3px;
    border-bottom-left-radius: 3px;
    border-bottom-right-radius: 3px;
    margin-left: 1%;
    margin-top: 3%;
}


.btn1:hover,.btn2:hover{
    background: #6A1B9A;
    
}



.thumbnail{
    margin: auto;
    margin-top: 130px;
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
	<title>ITEM SEARCH</title>
    <link rel="stylesheet"  href="css2/style3.css">
    <link href="https://fonts.googleapis.com/css?family=Abel|Montserrat|Patua+One" rel="stylesheet">
</head>
<body>
	<div class="container1">

	<form action="item_search.php" method="POST">
	<input class="in1" type="text" name="search_text" id="search_text" placeholder="Search by item name">
	<input class="btn1" type="submit" name="submit" value=">>">
	</form>



<?php
session_start();
if($_SESSION['login'] != true || $_SESSION['level'] != 'l2'){
    echo "<script> alert('Please login to continue'); window.location.href = 'Staff_login.php' </script>";
}
include("db_connection.php");

if(isset($_POST['submit'])){
	
	$searchq = $_POST['search_text'];
	$searchq = preg_replace("#[^0-9a-z]#i","",$searchq);	


	$sql = "select * from item where Item_name LIKE '%$searchq%' ";

 	$result = mysqli_query($conn,$sql);

            if(mysqli_num_rows($result)>0){

                 while($row = mysqli_fetch_assoc($result)) {
                   print "<div class='box1'>";
            echo "COMPANY NAME : "," ",$row["Company_name"],"<br>";
            echo "ITEM NAME : "," ",$row["Item_name"],"<br>";
            echo "LOT NUMBER :"," ",$row["Item_code"],"<br>";
            echo "SIZE in mm : "," ",$row["Size1"],"X",$row["Size2"],"<br>";
            echo "ITEM PRICE : "," ",$row["Item_price"],"<br>";
            echo "PRICE WITH GST : "," ",$row["Item_price_with_gst"],"<br>";
            echo "EXPIRY DATE : "," ",$row["date"],"<br>";
            print "</div>";
                    
                   
                 }



            }else{
                echo "No database available";
            }











}
 


?>
</div>






<div id="particles-js"></div> 
<script type="text/javascript" src="css2/particles.js"></script>
<script type="text/javascript" src="css2/app.js"></script>
</body>
</html>