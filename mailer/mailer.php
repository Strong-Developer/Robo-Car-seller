<?php

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'vendor/autoload.php';



function sendEmail()
{

// Instantiation and passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host = $_POST['sender_host'];                    // Set the SMTP server to send through
        $mail->SMTPAuth = true;                                   // Enable SMTP authentication
        $mail->Username = $_POST['sender_username'];                     // SMTP username
        $mail->Password = $_POST['sender_password'];                               // SMTP password
        $mail->SMTPSecure = $_POST['encryption'];         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also
        // accepted
        $mail->Port = intval($_POST['port']);                                    // TCP port to connect to

        //Recipients
        $mail->setFrom('from@example.com', 'Mailer');
        $mail->addAddress($_POST['receiver'], 'Joe User');     // Add a recipient
        $mail->addAddress('ellen@example.com');               // Name is optional
        $mail->addReplyTo('info@example.com', 'Information');
        $mail->addCC('cc@example.com');
        $mail->addBCC('bcc@example.com');

        // Attachments

        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = $_POST['subject'];
        $mail->Body = $_POST['body'];
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        echo 'Sent to '.$_POST['receiver'] ;
    } catch (Exception $e) {
       echo $mail->ErrorInfo;
    }

}

if(isset($_POST['send_email'])){

    $number = $_POST['count'] ;

    for( $i= 0 ;$i < $number ; $i++){
        sendEmail();


    }

}

?>


<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>
<body>

<div class="container">


    <div class="row pt-5">

        <div class="offset-md-3 col-md-6 my-5">

            <form action="" method="post">

                <h1 class="text-center">Email Sender</h1>
                <div class="form-group my-5">

                    <label>Enter Sender SMTP Host Address</label>
                    <input type="text" name="sender_host" class="form-control" required>
                </div>
                <div class="form-group my-5">

                    <label>Enter Sender SMTP Port</label>
                    <input type="text" name="port" class="form-control" required>
                </div>
                <div class="form-group my-5">

                    <label>Enter  Encryption type ( SSL / TLS or other )</label>
                    <input type="text" name="encryption" class="form-control" required>
                </div>
                <div class="form-group">

                    <label>Enter Sender email Username</label>
                    <input type="text" name="sender_username" class="form-control" required>
                </div>
                <div class="form-group">

                    <label>Enter Sender email password</label>
                    <input type="text" name="sender_password" class="form-control" required>
                </div>
                <div class="form-group">

                    <label>Enter Receiver Email Address</label>
                    <input type="text" name="receiver" class="form-control" required>
                </div>
                <div class="form-group">

                    <label>Enter Subject</label>
                    <input type="text" name="subject" class="form-control" required>
                </div>
                <div class="form-group">

                    <label>Enter Body</label>
                    <textarea name="body" class="form-control" required></textarea>
                </div>
                <div class="form-group">

                    <label>Number of emails to go </label>
                    <input type="number" name="count" min="1" max="1000" class="form-control" required>
                </div>
                <div class="form-group">

                    <input type="hidden" name="send_email" value="1">

                    <button type="submit"  class="form-control btn-primary btn-lg btn-block">
                        SEND
                    </button>

                </div>


            </form>

        </div>

    </div>
</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
