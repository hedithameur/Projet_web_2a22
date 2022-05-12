<?PHP
require_once "C://xampp/htdocs/webprojettest/allfolders/config.php";
require_once 'C://xampp/htdocs/webprojettest/allfolders/model/Mailing.php';

class MailC
{

    public function ajouterMail($mail)
    {
        $sql = 'INSERT INTO mailing (emailuser)
         VALUES (:emailuser)';
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);

            $query->execute([
                'emailuser' => $mail->getemailuser()
            ]);
        } catch (Exception $e) {
            echo 'Erreur: ' . $e->getMessage();
        }
    }



    public function affichermails()
    {
        $sql = "SELECT * FROM mailing";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }
}
