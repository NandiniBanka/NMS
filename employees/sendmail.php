<?php
    
    include "../dbconnect.php";
    include "../config.php";


    // SQL query to get user data
    $sql = "SELECT email_id, first_name, Device_Id FROM users WHERE id = ".$_GET['id']; // Assuming you are sending mail to the user with id = 1
    $result = $db_connect->query($sql);

    if ($result->num_rows > 0) {
        // Fetch user data
        $row = $result->fetch_assoc();
        $to = $row["email_id"];
        $name = $row["first_name"];
        $DeviceId = $row["Device_Id"];

        // Email details
        $subject = "Alert received";
        $message = "Dear $name,\n\nWe have recieved an alert from your device id: $DeviceId.\n\nBest Regards,\nYour Company";
        $headers = "From: your_email@example.com";

        // Send email
        if(mail($to, $subject, $message, $headers)) {
            echo "Email sent successfully to $to";
        } else {
            echo "Failed to send email.";
        }
    } else {
        echo "No user found.";
    }

    $db_connect->close();
