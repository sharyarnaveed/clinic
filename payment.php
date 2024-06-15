<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/payments.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400&display=swap" rel="stylesheet">
    <title>Payments</title>
</head>
<body>
    


<main>
<section class="add_patient">
    <div class="logo">
    <h2>Payments</h2>
  
</div>
<div class="search_div">
    <label for="">Date:</label>
    <input type="search" name="" id="" placeholder="Date">
    
    <input type="submit" name="" id="" style="background-color: black; color: white; width: 14%; height: 60%; " value="Search">
</div>

<div class="show_record">
    <div class="record_heading">
    <h4>Month</h4>
    <h4>Total</h4>
    </div>
    <div class="record">
<div class="single">
 <h5>Month:</h5>
 <h5>Amount:</h5>
<button id="show" href="" type="submit" >Show</button>

</div>
    </div>
    <script>
        let show_detail=document.getElementById("show");
show_detail.addEventListener('click',function (event) {
    // event.preventDefault();
    let p=new Promise((resolve, reject) => {
   
        window.location.href="payment_detail.php"
            resolve("done");
  
           
       
        
        
    }).then((value)=>{
        console.log(value)
    }).catch((err)=>{
console.log( Error)
window.location.href="payment_detail.php"
    })
    
})
        
    </script>
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