<?php
use PHPMailer\PHPMailer\PHPMailer;
if(isset($_POST['firstname']) && isset($_POST['email'])){
    $name = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    require_once "PHPMailer/PHPMailer.php";
    require_once "PHPMailer/SMTP.php";
    require_once "PHPMailer/Exception.php"

    $mail = new PHPMailer();


    //smtp settings

    $mail->isSMTP();
    $mail->Host = "smtp.gmail.com";
    $mail->SMTPAuth = true;
    $mail->Username = "potdardivya98@gmail.com";
    $mail->Password = 'haresh12527';
    $mail->Port = 465;
    $mail->SMTPSecure = 'ssl';

    //email settings

    $mail->isHTML(true);
    $mail->setForm($email, $name);
    $mail->addAddress("potdardivya98@gmail.com");
    $mail->lastname = ("$email ($lastname)");
    $mail->message = $message;


    if($mail->send()){
        $status = "success";
        $response = "Email is sent!";
    }

    else{
        $status = "failed";
        $response = "Something is wrong: <br>" . $mail->ErrorInfo;

    }

    exit(json_encode(array("status" => $status, "response" => $response)));
}
?>