<?php

include '../../db.php';


if (isset($_GET['token'])  && $_GET['token'] != '') {
    $sql = 'SELECT email FROM client WHERE token = ? ';
    $statement = $connection->prepare($sql);
    $statement->execute([$_GET['token']]);
    $email = $statement->fetchColumn();

    if ($email) {
        ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recupérer votre mot de passe</title>
</head>
<body>
    <form method="post">
        <label>Nouveaux mot de passe : </label>
        <input type="password" name="newPassword">
       <!--  <input type="password" name="ConfirmNewPassword"> -->
        <input type="submit" value="Confirme">
    </form>
    
</body>
</html>
<?php

    }
}

?>


<?php
if (isset($_POST['newPassword'])) {
    $hashedPassword = password_hash($_POST['newPassword'], PASSWORD_DEFAULT);
    $sql = "UPDATE client SET password = ? , token = NULL WHERE email = ? " ;
    $statement = $connection->prepare($sql);
    $statement->execute([$_POST['newPassword'], $email]);
    echo 'Mot de passe modifié avec succès' ;

}
?>