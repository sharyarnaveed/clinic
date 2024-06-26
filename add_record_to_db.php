<?php
if($_SERVER["REQUEST_METHOD"]=="POST")
{
    include "partials/db_conn.php";

   $patient_name=$_POST['patient_name']; 
   $patient_father=$_POST['patient_father'];
   $pcnic=$_POST['patient_cnic'];
   $phone_number=$_POST['phone_number'];
   $gender=$_POST['Gender'];
   $payment=$_POST['payment'];
$pissue=$_POST['patient_issue'];

if(empty($patient_name)||empty($patient_father)||empty($pcnic)||empty($phone_number)||empty($gender)||empty($payment)||empty($pissue))
{
    echo "<script>alert('Please fill all the info')</script>";
}
else
{
  
    $insert_patient_data_into_add_patient="INSERT INTO `add_patient` (`name`,`fname`,`cnic`,`phoneno`,`gender`,`disease`,`payment`) VALUES ('$patient_name','$patient_father','$pcnic','$phone_number','$gender','$pissue','$payment')";
   
if($conn->query($insert_patient_data_into_add_patient))
{
 
    
}
else{
    echo "Error: " . $sql . "<br>" . $conn->error;
}


   $conn->close();
}
   

}
else{

}

?>