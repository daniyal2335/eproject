<?php
include('../query.php');
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require '../../vendor/autoload.php';
if(isset($_POST['appEmail'])){
//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'daniyalrizwankhan2332@gmail.com';                     //SMTP username
    $mail->Password   = 'nqurxbvkikfvjexf';                               //SMTP password
    $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('daniyalrizwankhan2332@gmail.com', 'Daniyal khan');
    $mail->addAddress($_POST['appointEmail']);     //Add a recipient
    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Thankyou for Appointment';
    $mail->Body    = 'This is our Online Lawyers System';
    

    $mail->send();
    $email=$_POST['appointEmail'];
    $query=$pdo->prepare("update appoint set status = 'approved' where email= :email");
    $query->bindParam('email',$email);
    $query->execute();
   echo '<script>alert("message has been sent");location.assign("../appoint.php");</script>';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
}