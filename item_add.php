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

.in2{
   	margin-top: 3%; 
    outline: 0;
    background: #f2f2f2;
    font-family: 'Abel', sans-serif;
    float: left;
    width: 43.5%;
    border: 0;
    padding: 13px;
    border-top-left-radius: 3px;
    border-top-right-radius: 3px;
    border-bottom-left-radius: 3px;
    border-bottom-right-radius: 3px;
    font-size: 14px;
    margin-left: 5%;
    margin-right: -7px;

}

.container2{
	width: 33%; 
    height: 110%;
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
	<title>ITEM ADDING</title>
	<link rel="stylesheet"  href="css2/style3.css">
	<link href="https://fonts.googleapis.com/css?family=Abel|Montserrat|Patua+One" rel="stylesheet">
</head>
<body>

	<div class="container1">
        
		<div class="container2">
		<div class="thumbnail"></div>
		<form name="Item_add" action="" method="POST" onsubmit="return validate()">
			<input class="in1" type="text" name="Company_name" placeholder="COMPANY NAME" pattern="[a-zA-Z]{3,}" title="No numbers and gaps in name" required=""><br>
			<input class="in1" type="text" name="Item_name" placeholder="PRODUCT NAME" pattern="[a-zA-Z]{3,}" title="No nos and gaps in name" required=""><br>
			<input class="in1" type="text" name="Item_code" placeholder="LOT NUMBER" required=""><br>
			<input class="in2" type="text" name="Size1" placeholder="SIZE 1 in mm" required="">
			<input class="in2" type="text" name="Size2" placeholder="SIZE 2 in mm" required=""><br>
			<input class="in1" type="text" name="Item_price" placeholder="PRICE IN RUPEES" required=""><br>
            <input class="in1" type="date" name="Expiry_date" placeholder="EXPIRY DATE" required=""><br>
			<input class="btn1" type="submit" name="add_hospital" value="ADD ITEM">

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
if($_SESSION['login'] != true || $_SESSION['level'] != 'l2'){
    echo "<script> alert('Please login to continue'); window.location.href = 'Staff_login.php' </script>";
}
include("db_connection.php");

if(isset($_POST['add_hospital'])){
	$Company_name = $_POST['Company_name'];
	$Item_name = $_POST['Item_name'];
	$Item_code = $_POST['Item_code'];
	$Item_price = $_POST['Item_price'];
	$Size1 = $_POST['Size1'];
	$Size2 = $_POST['Size2'];





    
        $sql = "select * from value_for_calc ";
        $result = mysqli_query($conn,$sql);

        if(mysqli_num_rows($result)>0){

           while($row = mysqli_fetch_assoc($result)) {
     
            $gst_value = $row["GST"];
        }

    }else{
        echo "No database available";
    }
    










	$zero = 0;


	#echo $hospital_name;
	#echo $hospital_id;
	#echo $contact_no;
	#echo $location;

	$item_price_with_gst = $Item_price +  ($gst_value*$Item_price)/100;
	echo $item_price_with_gst;
    $date = $_POST['Expiry_date'];

	$sql = "insert into item (Item_name,Item_code,Item_price,Company_name,Size1,Size2,item_price_with_gst,date) values('$Item_name','$Item_code',
	'$Item_price','$Company_name','$Size1','$Size2','$item_price_with_gst','$date')";
	$sql2 = "insert into office_stock(Item_code,No_of_units) values('$Item_code','$zero')";

	if(mysqli_query($conn,$sql) && mysqli_query($conn,$sql2)){
			echo "RECORD INSERTED";
			$message = "Item succesfully added";
			echo "<script> alert('$message'); window.location.href = 'Staff_home.php' </script>";

	}else{
			echo "Error inserting";
		}
        


}












?>