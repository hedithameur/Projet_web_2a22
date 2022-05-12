<?php

include_once 'MailC.php';
$nvmC = new MailC();
$listemails = $nvmC->affichermails();

require_once 'C://xampp/htdocs/webprojettest/allfolders/controller/ajouterArticle.php';
//require_once 'C://xampp/htdocs/webprojettest/allfolders/model/Articles.php';
$articleC = new articleC();
$listearticle = $articleC->lastArticle();


require_once '../lib/phpmailer/PHPMailerAutoLoad.php';


foreach ($listemails as $row) {

	//create an instance of PHPMailer
	$mail = new PHPMailer();
	//set a host
	$mail->Host = "smtp.gmail.com";
	//enable SMTP
	//$mail->isSMTP();
	$mail->IsSMTP();
	$mail->Host = "smtp.gmail.com";

	//$mail->SMTPDebug = 2;
	//set authentification to true
	$mail->SMTPAuth = true;
	//set login details for Gmail account
	$mail->Username = "virupediaproject@gmail.com";
	$mail->Password = "123456789*-";

	//set type of protection
	$mail->SMTPSecure = "TLS"; //or we can use TLS
	//set a port
	$mail->Port = 587; // or 587 if TLS
	//set a subject
	$mail->Subject = "New Article";
	//set HTML to true
	$mail->isHTML(true);

	foreach ($listearticle as $article) {

		//set a body
		/*$body =
			"		<html lang='en'>"
			. "<head>"
			. "   <meta charset='UTF-8'>"
			. "   <meta name='viewport' content='width=device-width, initial-scale=1.0'>"
			. "  <title>Document</title>"
			. "</head>"
			. "<body>"
			//'<h1> Hi , Dear client this is a new artical  ! check it at Virupedia  wwww.virupedia.com </h1>' .
			//"<h2> Title: ' . $article['titre'] . '</h2>'" .
			//	" <img width='100' src='localhost/webprojettest/allfolders/views/front/images/'" . $article['urlImage'] . ";>";
			//"<img width='250' src=' https://images.theconversation.com/files/312917/original/file-20200130-41527-zvrus2.png?ixlib=rb-1.1.0&rect=0%2C5%2C3982%2C2239&q=45&auto=format&w=496&fit=clip';>"
			. "<div class='card bg-light ' style='width: 18rem;'>"
			. "<img class='card-img-top' src='https://images.theconversation.com/files/312917/original/file-20200130-41527-zvrus2.png?ixlib=rb-1.1.0&rect=0%2C5%2C3982%2C2239&q=45&auto=format&w=496&fit=clip' alt='Card image cap'>"
			. "<div class='card-body'>"
			. "<h5 class='card-title'>Card title</h5>"
			. "<p class='card-text'>Some quick example text to build on the card title and make up the bulk of the card's content.</p>"
			. "<a href='https://localhost/webprojettest/allfolders/views/front/blogs-details.php?idNewsArticle=7' class='btn btn-primary'>Go somewhere</a>"
			. "</div>"
			. "</div>"
			. "</body>"
			. "<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css' integrity='sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm' crossorigin='anonymous'>"

			. "</html>";*/
		//$body = require "mail.html";
		$body = file_get_contents("mail1.php");
	}








	$mail->Body = $body;
	//set who is sending an email
	$mail->setFrom('virupediaproject@gmail.com', 'Virupedia');
	//set where we are sending email (recipients)


	//$mail->addAddress('informatiquetutorials0@gmail.com');


	$mail->addAddress($row['emailuser']);




	//send an email
	if ($mail->send()) {
		echo 'mail sent';
	} else {
		echo $mail->ErrorInfo;
	}
}
