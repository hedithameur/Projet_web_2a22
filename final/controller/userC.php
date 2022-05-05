<?PHP
include "../config.php";

class UtilisateurC
{

    function ajouterUtilisateur($Utilisateur)
    {
        $sql = "INSERT INTO users (nameUsers, lastnameUsers , address, Login , Cin ,Password) 
			VALUES (:nameUsers,:lastnameUsers,:address, :Login, :Cin , :Password)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);

            $query->execute([
                'nameUsers' => $Utilisateur->getNom(),
                'lastnameUsers' => $Utilisateur->getPrenom(),
                'address' => $Utilisateur->getAdress(),
                'Login' => $Utilisateur->getLogin(),
                'Cin' => $Utilisateur->getCin(),
                'Password' => $Utilisateur->getPassword()
            ]);
        } catch (Exception $e) {
            echo 'Erreur: ' . $e->getMessage();
        }
    }


    function afficherUtilisateurs()
    {

        $sql = "SELECT * FROM users";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }
}
