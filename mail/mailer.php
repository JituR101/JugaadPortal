<?php

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    require_once "Mail.php";
    
    $email = $_POST['email'];
    $name=$_POST['name'][$index];
    $from = "E-CELL VNIT <contactus@ecellvnit.org>";    //your mail id
    $to = $email;
    $subject = "Test by me";
    $body = 'Hi this is the test mail from the mailer ecell VNIT';
    $host = "ssl://smtp.zoho.in";
    $port = "465";
    $username = "contactus@ecellvnit.org";          //your mail id
    $password = "Fjacksparrow@1";                      //password of this mail id
    $headers = array('MIME-Version' => '1.0rn',
        'Content-Type' => "text/html; charset=ISO-8859-1rn",
        'From' => $from,
        'To' => $to,
        'Subject' => $subject);
    $smtp = Mail::factory('smtp',
        array('host' => $host,
            'port' => $port,
            'auth' => true,
            'username' => $username,
            'password' => $password));
    $mail = $smtp->send($to, $headers, $body);
    if (PEAR::isError($mail)) {
        echo("<p>" . $mail->getMessage() . "</p>");
    } else {
        echo("<p>Message successfully sent!</p>");
    }
    
}
else{
    header('Location: index.html');
}


 ?>
