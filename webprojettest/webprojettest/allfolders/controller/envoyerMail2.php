<?php


include_once 'MailC.php';
$nvmC = new MailC();
$listemails = $nvmC->affichermails();

require_once '../lib/phpmailer/PHPMailerAutoLoad.php';

$mail = new PHPMailer();
$mail->Host = "smtp.gmail.com";
$mail->IsSMTP();
$mail->Host = "smtp.gmail.com";

//$mail->SMTPDebug = 2;
$mail->SMTPAuth = true;
$mail->Username = "hedithameur1919@gmail.com";
$mail->Password = "123456789";

$mail->SMTPSecure = "ssl";
$mail->Port = 465;
$mail->Subject = "New Article";
$mail->isHTML(true);


include_once 'ajouterArticle.php';
$articleC = new articleC();
$result = $articleC->lastArticle();
$body = file_get_contents('mailBody.php');
$variables = array(
    0 => array(),
    1 => array(),
);

$i = 0;
foreach ($result as $s) {
    $variables[$i]['titre'] = $s->titre;
    $variables[$i]['urlImage'] = $s->urlImage;
    $variables[$i]['idNewsArticle'] = $s->idNewsArticle;
    $i++;
}


$i = 0;

foreach ($variables as $v) {
    foreach ($v as $key => $value) {
        $body = str_replace('{{ ' . $key . $i . ' }}', $value, $body);
    }
    $i++;
}
//print_r($body);
//$mail->ClearAddresses();


$mail->setFrom('hedithameur1919@gmail.com', 'Virupedia');
foreach ($listemails as $nv) {
    $finalMailBody = $body;
    $finalMailBody = str_replace('{{ idVisiteurx }}', $nv['idmail'], $finalMailBody);
    $mail->Body = $finalMailBody;
    $mail->addAddress($nv['emailuser']);
    if ($mail->send()) {
        header('location: ../views/back/envoyerMail.php?mailsent=1');
    } else {
        echo $mail->ErrorInfo;
    }
    $mail->ClearAddresses();
}
