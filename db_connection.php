



<?php
$username = ""; //Specify username here. 
$password = "";//Specify pass here.
$db = "";//Specify db here.
$host = "";//Specify host here.

$conn = mysqli_connect($host, $username, $password, $db);
if($conn){
	
}else{
	echo "DID NOT CONNECT";
}

?>