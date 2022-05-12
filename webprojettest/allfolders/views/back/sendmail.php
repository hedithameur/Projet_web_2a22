<?php


//reciptiion
$to = "hedithameur1919@gmail.com";


//subject 
$subject = "This is our Test email";

//Message 
$message = "<h1> Hi there . </h1><p>Thanks for testing!</p>";

//headers

$headers = "FROM: hedithameur1919@gmail.com";

if (mail($to, $subject, $message, $headers)) {
    echo "Mail send Successfuly ";
} else {
    echo "can not send mail ";
}
