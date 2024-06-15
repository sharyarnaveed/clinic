<?php

$servername="localhost";
$username="root";
$password="";
$dbname="clinic";

$conn=mysqli_connect($servername,$username,$password,$dbname);

if($conn)
{


}
else{
    die("error").mysqli_connect_error();
 
}

?>