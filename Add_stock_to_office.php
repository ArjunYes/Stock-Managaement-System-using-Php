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
    height: 70%;
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
	<title>DELETE HOSPITAL</title>
	<link rel="stylesheet"  href="css2/style3.css">
	<link href="https://fonts.googleapis.com/css?family=Abel|Montserrat|Patua+One" rel="stylesheet">
</head>
<body>

	<div class="container1">
		<div class="container2">
		<div class="thumbnail"></div>

	<form method="POST" >

		
        <select class="in1" name="selectbox1" required="">
            <option  value="">Select Item </option>
                <?php
                $sql = "Select item.Item_code,item.Item_name,office_stock.No_of_units FROM item INNER JOIN office_stock ON item.Item_code = office_stock.Item_code";

                /*SELECT item.Item_code,item.Item_name,office_stock.No_of_units FROM item INNER JOIN office_stock ON item.Item_code = office_stock.Item_code;*/

                $result = mysqli_query($conn,$sql);
              
                while ($row = mysqli_fetch_assoc($result)){
                    $IN =  $row['Item_name'];
                    $IC = $row['Item_code'];
                    $NUM = $row['No_of_units'];
                ?>
                <option value="<?php echo $IC ?>"><?php echo $IN," - ",$IC," - ",$NUM ?></option>
                <?php
            }
            ?>
        </select>
        <input class="in1" type="number" placeholder="Enter quantity" name="no_of_items" >
		<input class="btn1" type="submit" name="sub1" value="ADD QUANTITY">

	</form>
		</div>
	</div>


	<div id="particles-js"></div> 
	<script type="text/javascript" src="css2/particles.js"></script>
	<script type="text/javascript" src="css2/app.js"></script>



</body>
</html>



<?php



if(isset($_POST['sub1'])){

    $temp = $_POST['selectbox1'];

    $new_quantity = $_POST['no_of_items'];
    $sql = "select No_of_units from office_stock where item_code = '$temp' ";
    $result = mysqli_query($conn,$sql);

    if(mysqli_num_rows($result)>0){
                 while($row = mysqli_fetch_assoc($result)) {                                       
                    $existing_units = $row["No_of_units"];                                   
                 }
    }else{
         echo "No database available";
         }


    $quantity = $existing_units + $new_quantity;
    echo $quantity;

    $sql2 = "update office_stock SET No_of_units = '$quantity' WHERE item_code = '$temp'";



    if(mysqli_query($conn,$sql2)){
            echo "RECORD INSERTED";
            $message = "Stocks added";
            echo "<script> alert('$message'); window.location.href = 'Staff_home.php' </script>";

    }else{
            echo "Error inserting";
        }



}

?>