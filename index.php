<?php
/*
 *  Script for pulling all EventBrite CoderDojo events from the API and saving them as a JSON file, then sending it as an email
 *  @author Shane Curran
 */

// Set your API key here
$api_key = "YOUR-API-KEY";

// Set your SMTP details here
$smtp_host = "host";
$smtp_user = "username";
$smtp_pass = "password;"

// Set up an array with all the email recipients here
$emails = array(
        "john@doe.com",
        "foo@bar.com"
);

// Set the array of keywords you wish to search for
$keywords = array(
    "php",
    "node.js"
);

// Include libraries and stuff
require_once "lib/swift_required.php";
require_once "lib/functions.inc.php";

// Run a loop and generate a string acceptable by EventBrite based on the array of keywords
foreach ($keywords as $key => $value) {
    $keyword_string = $value . "%20OR%20";
}

// Remove the last characters from the string
$keyword_string = substr($keyword_string, 0, -8);

// Request the events from EventBrite
 $events = file_get_contents("https://www.eventbrite.com/xml/event_search?app_key=" . $api_key . "&keywords=" . $keyword_string);
 
// Parse the XML into an Object
 $events = new SimpleXMLElement($events);

 // Turn the object into some nice JSON
 $events = json_encode($events);

// Generate a fairly random filename based on the current unix time
 $filename = time() . ".json";

 // Write the JSON to the above filename
 file_put_contents($filename, $events);

// Send an email to all the email addresses specified above with the JSON file attached
 sendEmail($filename, $emails. $smtp_hpst, $smtp_user, $smtp_pass);