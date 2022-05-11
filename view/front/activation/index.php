<?php

include '../../db.php';


if (isset($_GET['token'])  && $_GET['token'] != '') {
    $sql = 'SELECT email FROM client WHERE token = ? ';
    $statement = $connection->prepare($sql);
    $statement->execute([$_GET['token']]);
    $email = $statement->fetchColumn();

    if ($email) {
        //update statut 
        $sql = "UPDATE client SET statut = 1 , token = NULL WHERE email = ? " ;
        $statement = $connection->prepare($sql);
        $statement->execute([$email]);
        header('Location: ../');

        //redirection to login


    }

}

?>
