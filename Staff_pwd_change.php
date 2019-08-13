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
    height: 80%;
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


  if(emp_regform.password1.value != emp_regform.password2.value){
    alert("Password dosnt match")
    return false;
  }

}


</script>




<?php
 session_start();
    if($_SESSION['login'] != true || $_SESSION['level'] != 'l1'){
        echo "<script> alert('Please login to continue'); window.location.href = 'Admin_login.php' </script>";
}
include("db_connection.php");
?>

<!DOCTYPE html>
<html>
<head>
	<title>PASSWORD CHANGE</title>
	<link rel="stylesheet"  href="css2/style3.css">
	<link href="https://fonts.googleapis.com/css?family=Abel|Montserrat|Patua+One" rel="stylesheet">
</head>
<body>

	<div class="container1">
        <center><h1 class="centerheader">STAFF PASSWORD CHANGE</h1></center>
		<div class="container2">
          <div class="thumbnail"></div>

          <form  method="POST"  name="emp_regform" action=""  onsubmit="return validate()" >

              <select class="in1" name="selectbox1" required="">
                 <option  value="">Select Staff </option>
                 <?php
                 $sql = "select * from staff_details";
                 $result = mysqli_query($conn,$sql);
                 while ($row = mysqli_fetch_assoc($result)){
                   $HN =  $row['f_name'];
                   $LN = $row['l_name'];
                   $HID = $row['Staff_id'];
                   ?>
                   <option value="<?php echo $HID ?>"><?php echo $HID," - ",$HN," ",$LN ?></option>
                   <?php
               }
               ?>
              </select>

            <input type="text" name="password1" placeholder="NEW PASSWORD" class="in1">
            <input type="text" name="password2" placeholder="RE ENTER PASSWORD" class="in1">
           <input class="btn1" type="submit" name="sub1" value="CHANGE PASSWORD ">

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
    $new_password = $_POST['password2'];

	
	$sql2 = "UPDATE staff_details SET Staff_password = '$new_password' where Staff_id = '$temp'";
	

	if(mysqli_query($conn,$sql2)){
     echo "STAFF DELETED";
     $message = "Staff Password Changed";
     echo "<script> alert('$message'); window.location.href = 'admin_panel.php' </script>";

 }
 else{
     echo "Error deleting";
 }





}

?>