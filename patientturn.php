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
                <h2>Patient Turn</h2>
            </div>

            <div class="show_record">
                <div class="record_heading">
                    <h4>Name</h4>
                </div>

                <div class="record">
                    <?php
                    include "partials/db_conn.php";

                    $show_record = "SELECT * FROM add_patient";
                    $result = $conn->query($show_record);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<div class='single'>";
                            echo "<h5>" . htmlspecialchars($row["name"]) . "</h5>";

                            echo " <button class='deleteBtn' data-id='" . htmlspecialchars($row["user_id"]) . "' data-name='" . htmlspecialchars($row["name"]) . "' data-fname='" . htmlspecialchars($row["fname"]) . "' data-cnic='" . htmlspecialchars($row["cnic"]) . "' data-phoneno='" . htmlspecialchars($row["phoneno"]) . "' data-gender='" . htmlspecialchars($row["gender"]) . "' data-disease='" . htmlspecialchars($row["disease"]) . "' data-payment='" . htmlspecialchars($row["payment"]) . "'>Done</button>";

                            echo "</div>";
                        }
                    }
                    ?>
                </div>
                <script>
                    $(document).ready(function () {
                        $(document).on('click', '.deleteBtn', function () {
                            var id = $(this).data('id');
                            var name = $(this).data('name');
                            var fname = $(this).data('fname');
                            var cnic = $(this).data('cnic');
                            var phoneno = $(this).data('phoneno');
                            var gender = $(this).data('gender');
                            var disease = $(this).data('disease');
                            var payment = $(this).data('payment');

                            var listItem = $(this).closest('div');
                            $.ajax({
                                url: 'record_completed.php',
                                type: 'POST',
                                data: {
                                    id: id,
                                    name: name,
                                    fname: fname,
                                    cnic: cnic,
                                    phoneno: phoneno,
                                    gender: gender,
                                    disease: disease,
                                    payment: payment
                                },
                                success: function (response) {
                                    if (response == 'success') {
                                        listItem.remove();
                                    } else {
                                        alert('Failed to delete.');
                                    }
                                }
                            });
                        });
                    });
                </script>

                <div id="searchrecord"></div>
            </div>
            <button></button>
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
                <a id="search" href="patientturn.php" class="the_content">Patient Turn</a>
            </div>
        </aside>
        <script>
            let file = document.getElementById("files");
            file.href = "files.php";
            let add = document.getElementById("add");
            add.href = "add_patient.php";
            let payments = document.getElementById("payments");
            payments.href = "payment.php";
          
        </script>
    </main>
</body>

</html>
