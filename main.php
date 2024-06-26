
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/the_main_.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400&display=swap" rel="stylesheet">
    <title>Clinic Management</title>
</head>
<body>
    <main class="main_page">
<section class="content" >
<div class="content_main">
    <h2>Your Clinic</h2>
    <div class="image_main">
    <img src="images/logo-removebg-preview.png" alt="">
    </div>
</div>

<div class="options_content">
<a href="files.php"  class="content_features_options">  <div>
    <div class="the_inner_img">
        
    </div>
  <div class="text_inner">
        <h3>Files</h3>
        </div>
   </div>
   </a>
   <a href="add_patient.php"  class="content_features_options">  <div>
    <div class="the_inner_img">
       
    </div>
  <div class="text_inner">
        <h3>Add Patient</h3>
        </div>
   </div>
   </a>
   <a href="payment.php"  class="content_features_options">  <div>
    <div class="the_inner_img">
        
    </div>
  <div class="text_inner">
        <h3>Payments</h3>
        </div>
   </div>
   </a>
   <a href="patientturn.php"  class="content_features_options">  <div>
    <div class="the_inner_img">
        
    </div>
  <div  class="text_inner">
        <h3>Patient Turn</h3>
        </div>
   </div>
   </a>
</div>
</section>
<!-- for loading images -->
<script>


let contain = document.querySelectorAll(".the_inner_img");

function loading_images(loc,index1) {
  let image = document.createElement("img");
  image.src = loc;

  let pro = new Promise((resolve, reject) => {
    image.onload = () => {
        contain[index1].appendChild(image)
      resolve("done");
    }
  
    image.onerror = () => {
      reject(new Error("Error loading image"));
    }
  }).then((value) => {
    console.log('success ' + value);
  }).catch((err) => {
    console.error(err);
  });
 
}

let image_array = [
  'images/3767084-removebg-preview.png',
  'images/3359081.png',
  'images/png-clipart-computer-icons-money-bag-bank-cash-angle-hand-thumbnail-removebg-preview.png',
  'images/images__3_-removebg-preview.png'
];

for (let index = 0; index < image_array.length; index++) {
  const element = image_array[index];

  loading_images(element,index);
}


</script>
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
    <!-- clock  -->
    <script>
    
    let hr=document.getElementById("hour");
    let min=document.getElementById("minute");
    let sec=document.getElementById("second");
         
            setInterval(() => {
        let date = new Date();
        let hrs = date.getHours();

        let mins = date.getMinutes();
        let secs =date.getSeconds() ;


        hr.innerHTML=hrs<10?`0${hrs}`:hrs;
        min.innerHTML=mins<10 ?`0${mins}`: mins ;
        sec.innerHTML=secs<10 ? `0${secs}`:secs;

               
            }, 1000);
    </script>
    <div class="aside_content">
        <a id="files" href="files.php" class="the_content">Files</a>
        <a id="add" href="add_patient.php" class="the_content">Add Patient</a>
        <a id="payments" href="payment.php" class="the_content">Payments</a>
        <a id="search" href="#" class="the_content">Patient Turn</a>
      <input type="submit" style="height: 50px; font-size: 18px; " id="sign_out" value="Sign out" >
    </div>
</aside>
<!-- change  -->
<script>
    let file=document.getElementById("files");
   file.href="files.php";
   let add=document.getElementById("add");
      add.href="add_patient.php";
      let payments=document.getElementById("payments");
      payments.href="payment.php";
      let search=document.getElementById("search")
      search.href="patientturn.php"; 
          
</script>
    </main>
  
</body>
</html>