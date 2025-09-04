<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';


include "connection.php";

if($row=mysqli_fetch_array(mysqli_query($conn,"SELECT * from tbl_participants ORDER BY id desc LIMIT 1"))){


$names = $row['name'];
$id = $row['participant_id'];


}


$htmlStr = "<html>
<head>
    <style>
        body { font-family: Arial, sans-serif; }
        .header { background: #f1f1f1; padding: 10px; text-align: center; }
        .content { margin: 20px; }
        .footer { background: #f1f1f1; padding: 10px; text-align: center; }
    </style>
</head>
<body>
    <div class='header'>
        <h1>Welcome $names!</h1>
    </div>
    <div class='content'>
        
        <p>Thank you For Participating. Here are your details:</p>
        <p><strong>User Name:</strong> $names</p>
        <p><strong>Registration ID:</strong> $id</p>
        <p><strong>Event Name:</strong> $eventname</p>
        <p>Please keep this information secure and do not share it with anyone.</p>
    </div>
    <div class='footer'>
        Regards,<br>
        Inferno Team
    </div>
</body>
</html>";
	




$ya = $_SESSION['email'];



$mail = new PHPMailer(true);
$mail->isSMTP(); // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com'; // Specify SMTP server
$mail->SMTPAuth = true; // Enable SMTP authentication
$mail->Username = 'inferno.sdjic.2024@gmail.com'; // SMTP username
$mail->Password = 'mpaa adyy rucj azjp'; // SMTP password
$mail->SMTPSecure = 'ssl'; // Enable encryption, 'ssl' also accepted
$mail->Port = 465; // TCP port to connect to
$mail->setFrom('inferno.sdjic.2024@gmail.com');
$mail->addAddress($ya);
$mail->isHTML(true);
$mail->Subject = "Registration";
$mail->Body = $htmlStr;
$mail->send();

    echo"<script>
	window.history.go(event_details.php);</script>";


?>