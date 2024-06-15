<?php
include "partials/db_conn.php";

if (isset($_POST['cnic'])) {
    $input = $_POST['cnic'];

//     // Sanitize input to prevent SQL injection
    $input = $conn->real_escape_string($input);

    if (empty($input)) {
//         // If the input is empty, retrieve all records
        $search = "SELECT * FROM patient_record";
    } else {
//         // Using prepared statements to avoid SQL injection

        $search = "SELECT * FROM patient_record WHERE cnic LIKE CONCAT(?, '%')";
    }

    if ($stmt = $conn->prepare($search)) {
        if (!empty($input)) {
            $stmt->bind_param("s", $input);
        }
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<div class='single'>";
                echo "<h5>" . htmlspecialchars($row["name"]) . "</h5>";
                echo "<h5>" . htmlspecialchars($row["cnic"]) . "</h5>";
                echo "<input type='submit' value='Show'>";
                echo "<input type='submit' value='Delete'>";
                echo "</div>";
            }
        } else {
            echo "<p>No records found</p>";
        }
        $stmt->close();
    } else {
        echo "<p>Error in query preparation</p>";
    }
}
?>
