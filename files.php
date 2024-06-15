<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/files.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400&display=swap" rel="stylesheet">
    <title>Files</title>
</head>
<body>
    <main>
        <section class="add_patient">
            <div class="logo">
                <h2>Files</h2>
            </div>
            <div class="search_div">
                <label for="cnicsearch">CNIC:</label>
                <input type="search" id="cnicsearch" placeholder="CNIC">
                <label for="searchname">Name:</label>
                <input type="text" id="searchname" placeholder="Name">
                <input type="submit" style="background-color: black; color: white; width: 14%; height: 60%;" value="Search">
            </div>
            <div class="show_record">
                <div class="record_heading">
                    <h4>Name</h4>
                    <h4>CNIC</h4>
                </div>
                <script>
                    $(document).ready(function() {
                        $('#searchname').keyup(function() {
                            var query = $(this).val();
                            if (query != "") {
                                $.ajax({
                                    url: "searcrecord.php",
                                    method: "POST",
                                    data: { query: query },
                                    success: function(data) {
                                        $(".record").hide();
                                        $("#searchrecord").html(data).show();
                                    }
                                });
                            } else {
                                $(".record").show();
                                $("#searchrecord").hide();
                            }
                        });

                        $('#cnicsearch').keyup(function() {
                            var cnic = $(this).val();
                            if (cnic != "") {
                                $.ajax({
                                    url: "searchbycnic.php",
                                    method: "POST",
                                    data: { cnic: cnic },
                                    success: function(data) {
                                        $(".record").hide();
                                        $("#searchrecord").html(data).show();
                                    }
                                });
                            } else {
                                $(".record").show();
                                $("#searchrecord").hide();
                            }
                        });
                    });
                </script>

                <div class="record">
                    <?php
                    include "partials/db_conn.php";

                    $show_record = "SELECT * FROM patient_record";
                    $result = $conn->query($show_record);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<div class='single'>";
                            echo "<h5>".$row["name"]."</h5>";
                            echo "<h5>".$row["cnic"]."</h5>";
                            echo "<input type='submit' value='Show' >";
                            echo "<input type='submit' value='Delete'>";
                            echo "</div>";
                        }
                    }
                    ?>
                </div>
                <div id="searchrecord"></div>
            </div>
        </section>
        <aside class="options">
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
                let hr = document.getElementById("hour");
                let min = document.getElementById("minute");
                let sec = document.getElementById("second");

                setInterval(() => {
                    let date = new Date();
                    let hrs = date.getHours();
                    let mins = date.getMinutes();
                    let secs = date.getSeconds();

                    hr.innerHTML = hrs < 10 ? `0${hrs}` : hrs;
                    min.innerHTML = mins < 10 ? `0${mins}` : mins;
                    sec.innerHTML = secs < 10 ? `0${secs}` : secs;
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
            let file = document.getElementById("files");
            file.href = "files.php";
            let add = document.getElementById("add");
            add.href = "add_patient.php";
            let payments = document.getElementById("payments");
            payments.href = "payment.php";
            let search = document.getElementById("search");
            search.href = "search.php";
        </script>
    </main>
</body>
</html>
