<style>

body{
background: #06beb6;  /* fallback for old browsers */
background: -webkit-linear-gradient(to right, #48b1bf, #06beb6);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to right, #48b1bf, #06beb6); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */


}

*{
    margin: 0;
    padding: 0;
}

.container{
    
    margin: auto;
    width: 80%;
    margin-top: 5%;
}

.butcontainer{
    padding: 2%;
    
    margin: auto;
    width: 50%;
}

.new_heading{
    font-family: 'Abel', sans-serif,bold;
    color: #FFFFFF;
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

table {  
    margin:auto;
    margin-top: 50px;
    color: #333;
    font-family: 'Abel', sans-serif;
    font-weight: bold;
    width: 640px; 
    border-collapse: 
    collapse; border-spacing: 0; 
}

td, th {  
    border: 1px solid transparent; /* No more visible border */
    height: 40px; 
    width: 200px;
    transition: all 0.3s;  /* Simple transition for hover effect */
}
th {  
    background: #DFDFDF;  /* Darken header a bit */
    font-weight: bold;
}
td {  
    background: #FAFAFA;
    text-align: center;
} 
tr:nth-child(even) td { background: #F1F1F1; }   
tr:nth-child(odd) td { background: #FEFEFE; }  
tr td:hover { background: #666; color: #FFF; }  
</style>


<!DOCTYPE html>
<html>
<head>
    <title>TABLE WITH BUTTONS</title>
     <link href="https://fonts.googleapis.com/css?family=Abel|Montserrat|Patua+One" rel="stylesheet">
</head>
<body>
    <div class="container">

        <center><h1 class= "new_heading">ALL STAFF DETAILS</h1></center>


     





        <?php 
        session_start();
        if($_SESSION['login'] != true || $_SESSION['level'] != 'l1'){
        echo "<script> alert('Please login to continue'); window.location.href = 'Admin_login.php' </script>";
        }

        include("db_connection.php");


        echo "<table >";
        echo "<tr>";
        echo "<th> STAFF ID  </th>";
        echo "<th> STAFF NAME  </th>";
        echo "<th> STAFF PHONE NO  </th>";
        echo "<th> STAFF PASSWORD  </th>";
        echo "<th> ADDRESS   </th>";
        echo "<th> EMAIL   </th>";
        echo "</tr>";

        $sql = "SELECT * from staff_details order by Staff_id";
        $result = mysqli_query($conn,$sql);

        



        if(mysqli_num_rows($result)>0){

            while($row = mysqli_fetch_assoc($result)) {

                $HID = $row['Staff_id'];
                $IC =$row['f_name'];
                $IL = $row['l_name'];
                $NOU = $row['Staff_ph'];
                $HN = $row['Staff_password'];
                $AD = $row['Staff_address'];
                $EM  = $row['email_id'];





                echo "<tr>";
                echo "<td> $HID  </td>";
                print  "<td> $IC $IL  </td>";
                 echo "<td> $NOU  </td>";

                echo "<td> $HN  </td>";
                echo "<td> $AD  </td>";
               echo "<td> $EM  </td>";
                echo "</tr>";





            }

        }




        echo "</table>";

        ?>



    </div>

</body>
</html>