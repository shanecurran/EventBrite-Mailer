<?php
function sendEmail($filename, $to, $smtp_host, $smtp_user, $smtp_pass) {
    // Create the Transport
    $transport = Swift_SmtpTransport::newInstance($smtp_host, 25)->setUsername($smtp_user)->setPassword($smtp_pass);


    // Create the Mailer using your created Transport
    $mailer = Swift_Mailer::newInstance($transport);

    // Create a message
    $message = Swift_Message::newInstance("CoderDojo Events")->setFrom(
        "bot@hwf.io"
    )->setTo(
        $to
    )->setBody("I've attached a JSON file with CoderDojo events from EventBrite :)

    Live long and prosper!

    HWFBot")
      ->attach(Swift_Attachment::fromPath($filename));

    // Send the message
    $result = $mailer->send($message);

    if ($result) { 
        echo "Email Sent";
    }
    else
    {
        echo "There was an error sending the emal";
    }
}