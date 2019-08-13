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
    height: 65%;
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
    if($_SESSION['login'] != true || $_SESSION['level'] != 'l1'){
        echo "<script> alert('Please login to continue'); window.location.href = 'Admin_login.php' </script>";
}
include("db_connection.php");
?>

<!DOCTYPE html>
<html>
<head>
    <title>GST VALUE CHANGE</title>
    <link rel="stylesheet"  href="css2/style3.css">
    <link href="https://fonts.googleapis.com/css?family=Abel|Montserrat|Patua+One" rel="stylesheet">
</head>
<body>

    <div class="container1">
    	<center><h1 class="centerheader">GST VALUE CHANGE</h1></center>
        <div class="container2">
        <div class="thumbnail"></div>

    <form method="POST" >

       
            
                <?php
                $sql = "select * from value_for_calc";
                $result = mysqli_query($conn,$sql);
                while ($row = mysqli_fetch_assoc($result)){
                    $current_gst =  $row['GST'];
                    
                ?>
               
                <?php
            }
            ?>
        </select>
        <br>
        <center><h1 class="paragraph1">CURRENT GST VALUE  =  <?php  echo $current_gst  ?></h1></center>
        <input class = "in1" type="text" name="new_gst" placeholder="NEW GST VALUE">
        <input class="btn1" type="submit" name="sub1" value="CHANGE GST VALUE">

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

    $new_gst_value = $_POST['new_gst'];
    
    $sql2 = "UPDATE value_for_calc SET GST = '$new_gst_value'";
   
    

    if(mysqli_query($conn,$sql2)){
            $message = "GST value changed";
            echo "<script> alert('$message'); window.location.href = 'Admin_panel.php' </script>";

    }else{
            echo "Error deleting";
        }





}

?>