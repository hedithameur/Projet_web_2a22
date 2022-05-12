<?php
require '../db.php';

$message="";
$messagee="";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post">
        <input type="email" name="email" >
        <button type="submit">Send me a token</button>
    </form>
    
</body>
</html>


<?php
                            //Oublier mot de passe 
                            if (isset($_POST['email'])) {
                               $token = uniqid(); //genere code token 
                               $url = "http://localhost:8081/projetvf/view/front/token?token=$token";
                               $subject = 'Mot de passe oublié';
                                $message = "Bonjour , voici votre lien pour la réinitialisation du mot de passe : $url";
                                $headers = 'Content-Type: text/plain; charset="utf-8"' . "";
                                $headers = "From:safa.racheh@esprit.tn";
                                if (mail($_POST['email'], $subject, $message, $headers)) {
                                    $sql = "UPDATE client SET token = ? WHERE email = ? " ;
                                    $statement = $connection->prepare($sql);
                                    $statement->execute([$token, $_POST['email']]);
                                    echo "Mail envoyer ";

                                }else{
                                    echo 'Une erreur';
                                }


                            }
                            ?>

