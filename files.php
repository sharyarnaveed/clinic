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
            </div>
            <div class="show_record">
                <div class="record_heading">
                    <h4>Name</h4>
                    <h4>CNIC</h4>
                </div>
                <div class="record">
                    <!-- Display patient records -->
                    <?php
                    include "partials/db_conn.php";

                    $show_record = "SELECT * FROM patient_record";
                    $result = $conn->query($show_record);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<div class='single'>";
                            echo "<h5>" . htmlspecialchars($row["name"]) . "</h5>";
                            echo "<h5>" . htmlspecialchars($row["cnic"]) . "</h5>";
                            echo "<button class='generate-doc' data-id='" . htmlspecialchars($row["patient_id"]) . "'>Generate Doc</button>";
                            echo "</div>";
                        }
                    }
                    ?>
                </div>
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
            <div class="aside_content">
                <a id="home" href="main.php" class="the_content">Home</a>
                <a id="files" href="#" class="the_content">Files</a>
                <a id="add" href="#" class="the_content">Add Patient</a>
                <a id="payments" href="#" class="the_content">Payments</a>
                <a id="search" href="patientturn.php" class="the_content">Patient Turn</a>
            </div>
        </aside>
    </main>
    <script>
        $(document).ready(function () {
            // AJAX request to generate and download document
            $(document).on('click', '.generate-doc', function () {
                var id = $(this).data('id');

                $.ajax({
                    url: 'download_doc.php',
                    type: 'POST',
                    data: { id: id },
                    success: function (response) {
                        if (response.trim() === 'success') {
                            alert('Document generated and downloaded successfully.');
                        } else {
                            console.log('Failed to generate document: ' );
                        }
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        alert('AJAX error: ' + textStatus + ' - ' + errorThrown);
                    }
                });
            });
        });
    </script>
</body>
</html>
