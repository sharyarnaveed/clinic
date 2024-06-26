<?php
include "partials/db_conn.php";

if (isset($_POST["id"])) {
    $user_id = $_POST["id"];
    $patient_name = $_POST["name"];
    $patient_father = $_POST["fname"];
    $pcnic = $_POST["cnic"];
    $phone_number = $_POST["phoneno"];
    $gender = $_POST["gender"];
    $disease = $_POST["disease"];
    $payment = $_POST["payment"];


    
    // Insert patient data into patient_record table
    $insert_patient_data_into_add_record = "INSERT INTO `patient_record` (`name`,`fname`,`cnic`,`phoneno`,`gender`,`disease`,`payment`) VALUES ('$patient_name','$patient_father','$pcnic','$phone_number','$gender','$disease','$payment') ";

    if ($conn->query($insert_patient_data_into_add_record)) {
        // Delete record from add_patient table
        $sql = "DELETE FROM add_patient WHERE user_id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $user_id);
        if ($stmt->execute()) {
            echo 'success';
        } else {
            echo 'error';
        }
        $stmt->close();
    } else {
        echo 'error';
    }
}

$conn->close();
?>
