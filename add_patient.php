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
    echo $pcnic;
    $insert_patient_data=$conn->prepare("INSERT INTO `add_patient` (`name`,`fname`,`cnic`,`phoneno`,`gender`,`disease`,`payment`) VALUES (?,?,?,?,?,?,?) ");
    $insert_patient_data->bind_param("sssssss",$patient_name,$patient_father,$pcnic,$phone_number,$gender,$pissue,$payment);

    if($insert_patient_data->execute())
    {
        echo "<script>alert('Record Added')</script>";
    }
    else{
        $conn->error;
    }
   $insert_patient_data->close();
   $conn->close();
}
   

}
else{

}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/addpatient.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400&display=swap" rel="stylesheet">
    <title>Add Patient</title>
    <!-- <link rel="stylesheet" href="css/the_main_.css"> -->
</head>
<body>
<main>
    <section class="add_patient">
    <div class="logo">
    <h2>Your Clinic</h2>
    <div class="logo_img">
    <img src="images/logo-removebg-preview.png" alt="">
    </div>
</div>

<div class="add_patient_form">
    <h2>Add Patient</h2>
    <form class="patient_form" method="post" action="">
        <input type="text" name="patient_name" placeholder="Name">
        <input type="text" name="patient_father" placeholder="Father Name">
<input type="text" name="patient_cnic" placeholder="CNIC" >
<input type="text" name="phone_number" placeholder="Phone Number">
<label for="">Gender</label>
<select name="Gender" id="">
    <option value="Male">Male</option>
    <option value="Female">Female</option>
</select>
<input type="text" name="patient_issue" placeholder="Disease">
<input type="text" name="payment" placeholder="Payment">
<input type="submit" name="submit" id="button" style="  width: 18%;
    height: 10%;
    font-size: 18px;
    margin: 30px 50px; background-color: white; color: black;  border-radius:2px ; " value="Submit">
    </form>
</div>

    </section>
    <aside class="options" >
    <div class="clocktime">
        <div class="time_mention">
        <h6>Hours</h6>
        <h6>Min</h6>
        <h6>Sec</h6>
        </div>
        <div class="in_clock">
        <span id="hour">00</span>
        <hr>
        <span id="minute">00</span>
        <hr>
        <span id="second">00</span>
        </div>
    </div>
    <script>
    
    let hr=document.getElementById("hour");
    let min=document.getElementById("minute");
    let sec=document.getElementById("second");
         
            setInterval(() => {
        let date = new Date();
        let hrs = date.getHours();

        let mins = date.getMinutes();
        let secs =date.getSeconds() ;
       



        hr.innerHTML=hrs<10?`0 ${hrs}`:hrs;
        min.innerHTML=mins<10 ?`0 ${mins}`: mins ;
        sec.innerHTML=secs<10 ? `0${secs}`:secs;

               
            }, 1000);
    </script>
    <div class="aside_content">
    <a id="home" href="main.php" class="the_content">Home</a>
        <a id="files" href="#" class="the_content">Files</a>
        <a id="add" href="#" class="the_content">Add Patient</a>
        <a id="payments" href="#" class="the_content">Payments</a>
        <a id="search" href="#" class="the_content">Search Patient</a>
      
    </div>
</aside>
<script>
    let file=document.getElementById("files");
   file.href="files.php";
   let add=document.getElementById("add");
      add.href="add_patient.php";
      let payments=document.getElementById("payments");
      payments.href="payment.php";
      let search=document.getElementById("search")
      search.href="search.php"; 
          
</script>
</main>
</body>
</html>