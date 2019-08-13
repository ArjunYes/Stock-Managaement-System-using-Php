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
	<title>DELETE HOSPITAL</title>
	<link rel="stylesheet"  href="css2/style3.css">
	<link href="https://fonts.googleapis.com/css?family=Abel|Montserrat|Patua+One" rel="stylesheet">
</head>
<body>

	<div class="container1">
        <center><h1 class="centerheader">DELETE HOSPITAL</h1></center>
		<div class="container2">
          <div class="thumbnail"></div>

          <form  method="POST" >

              <select class="in1" name="selectbox1" required="">
                 <option  value="">Select Hospital </option>
                 <?php
                 $sql = "select * from hospital";
                 $result = mysqli_query($conn,$sql);
                 while ($row = mysqli_fetch_assoc($result)){
                   $HN =  $row['Hospital_name'];
                   $HID = $row['Hospital_id'];
                   ?>
                   <option value="<?php echo $HID ?>"><?php echo $HID," - ",$HN ?></option>
                   <?php
               }
               ?>
              </select>


           <input class="btn1" type="submit" name="sub1" value="DELETE HOSPITAL ">

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
    $temp = $_POST["selectbox1"];
	
	$sql2 = "DELETE FROM hospital WHERE Hospital_id = '$temp'";
	

	if(mysqli_query($conn,$sql2)){
     echo "HOSPITAL DELETED";
     $message = "Hospital succesfully deleted";
     echo "<script> alert('$message'); window.location.href = 'Staff_home.php' </script>";

 }
 else{
     echo "Error deleting";
 }





}

?>