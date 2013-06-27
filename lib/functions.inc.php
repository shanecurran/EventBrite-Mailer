<?php
function sendEmail($filename, $to) {
    // Create the Transport
    $transport = Swift_SmtpTransport::newInstance("smtp.sendgrid.net", 25)->setUsername("ShaneCurran")->setPassword("tbscsc12ShopShop1");


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