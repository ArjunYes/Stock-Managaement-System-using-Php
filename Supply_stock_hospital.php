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
   <title>SUPPLY STOCK TO  HOSPITAL</title>
    <link rel="stylesheet"  href="css2/style3.css">
    <link href="https://fonts.googleapis.com/css?family=Abel|Montserrat|Patua+One" rel="stylesheet">
</head>
<body>
    <div class="container1">
        <div class="container2">
        <div class="thumbnail"></div>



<?php  
session_start();
if($_SESSION['login'] != true || $_SESSION['level'] != 'l2'){
    echo "<script> alert('Please login to continue'); window.location.href = 'Staff_login.php' </script>";
}
include("db_connection.php");
?>


<form method="POST" >

        
        <select class="in1" name="selectbox1" required="">
            <option  value="">Select Product </option>
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

        <select class="in1" name="selectbox2" required="">
            <option  value="">Select Hospital </option>
                <?php
                $sql = "Select Hospital_id,Hospital_name from hospital";

                /*SELECT item.Item_code,item.Item_name,office_stock.No_of_units FROM item INNER JOIN office_stock ON item.Item_code = office_stock.Item_code;*/

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

        <input class="in1" type="number" placeholder="Enter quantity" name="no_of_items" >
        <input class="btn1" type="submit" name="sub1" value="ADD QUANTITY">

    </form>
     </div>
    </div>
    <div id="particles-js"></div> 
    <script type="text/javascript" src="css2/particles.js"></script>
    <script type="text/javascript" src="css2/app.js"></script>

    


    <?php  
    if(isset($_POST['sub1'])){

        $IC = $_POST['selectbox1'];
        $HID = $_POST['selectbox2'];
        $NOI = $_POST['no_of_items'];

        #echo "Product ID : ",$_POST['selectbox1'],"<br>";
        #echo "Hospital_id : ",$_POST['selectbox2'],"<br>";
        #echo "New no entered = ",$_POST['no_of_items'];
    

        $sql1 = "select * from hospital_stock where Item_code ='$IC' and Hospital_id = '$HID' ";
        $result = mysqli_query($conn,$sql1);
        #print mysqli_num_rows($result);

        if(mysqli_num_rows($result)==0){ #no stock with given hospital details
 
            $sql2 = "insert into hospital_stock (Hospital_id,Item_code,No_of_units) VALUES ('$HID','$IC','$NOI') ";
            if(mysqli_query($conn,$sql2)){
            echo "Record updated succesfully";
            }else{
            echo "Record insertion failed ";
            }

            #UPDATION IN OFFICE STOCK CODE BELOW

            $sql3 = "select * from office_stock where Item_code ='$IC'";
            $result = mysqli_query($conn,$sql3);
            echo "ITEMCODE GOT HERE = ",$IC;

            if(mysqli_num_rows($result)>0){
                while ($row = mysqli_fetch_assoc($result)) {
                    $units_at_office = $row['No_of_units'];
                }
            }

            echo "First no of units",$units_at_office,"<br>";
            $units_at_office = $units_at_office - $NOI;
            echo "Second  no of units",$units_at_office;

            $sql4 = "update office_stock SET No_of_units = '$units_at_office' where Item_code ='$IC'  ";
             if(mysqli_query($conn,$sql4)){
            echo "Record updated succesfully";

            echo "<script> alert('Stocks supplied to hospital succesfull'); window.location.href = 'Staff_home.php' </script>";
            //code here
            }else{
            echo "Record insertion failed ";
            }
        }
        else{  #already exists


            $sql5 = "select * from hospital_stock where Item_code ='$IC'  and Hospital_id = '$HID'";
            $result = mysqli_query($conn,$sql5);
         

            if(mysqli_num_rows($result)>0){
                while ($row = mysqli_fetch_assoc($result)) {
                    $units_at_hospital = $row['No_of_units'];
                    #echo $units_at_hospital;
                }
            }

            $new_units_at_hospital = $units_at_hospital + $NOI;
            echo "new units = ",$new_units_at_hospital;

            $sql6 = "update hospital_stock SET No_of_units = '$new_units_at_hospital' where Item_code ='$IC'  ";
             if(mysqli_query($conn,$sql6)){
            echo "Record updated succesfully";
            }else{
            echo "Record insertion failed ";
            }

            $sql7 = "select * from office_stock where Item_code ='$IC'";
            $result = mysqli_query($conn,$sql7);
            echo "ITEMCODE GOT HERE = ",$IC;

            if(mysqli_num_rows($result)>0){
                while ($row = mysqli_fetch_assoc($result)) {
                    $units_at_office = $row['No_of_units'];
                }
            }
            $units_at_office = $units_at_office - $NOI;
            $sql8 = "update office_stock SET No_of_units = '$units_at_office' where Item_code ='$IC'  ";
             if(mysqli_query($conn,$sql8)){
            echo "Record updated succesfully";

            echo "<script> alert('Stocks supplied to hospital succesfull'); window.location.href = 'Staff_home.php' </script>";
            //code here
            }else{
            echo "Record insertion failed ";
            }










        }































    }


    ?>






</body>
</html>