<?php
require base_path(). '/vendor/autoload.php'; 

function sendOtpEmail($username, $address, $otp){
    $email=new \SendGrid\Mail\Mail();
    $email->setFrom("no-reply@industryal.com", "Industryal - OTP");
    $email->setSubject("Your Industryal OTP");
    $email->addTo($address, $username);
    $email->addContent("text/plain", "OTP: ");
    
    $email->addContent("text/html", "<strong>Your OTP: ".$otp."</strong>");

    $sendgrid=new \SendGrid(getenv('SENDGRID_API_KEY'));
    try{
        $response=$sendgrid->send($email);
    }
    catch (Exception $e){
        //DO NOTHING
    }
}

function sendAttachment($username, $address, $filepath, $subject, $doctype){
    $email=new \SendGrid\Mail\Mail();
    $email->setFrom("no-reply@industryal.com", "Industryal - Attachments");
    $email->setSubject("Your ".$subject);
    $email->addTo($address, $username);
    $email->addContent("text/html", "Your Industryal ".$subject);
    $file_encoded = base64_encode(file_get_contents($filepath));
    $email->addAttachment($file_encoded, "application/pdf", date("d/m/Y").$doctype, "attachment");

    $sendgrid = new \SendGrid(getenv('SENDGRID_API_KEY'));
    try{
        $response=$sendgrid->send($email);
    }
    catch(Exception $e){
        //DO NOTHING
    }
}