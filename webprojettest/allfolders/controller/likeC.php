<?PHP
require_once "C://xampp/htdocs/webprojettest/allfolders/config.php";

class likeC
{

    public function ajouterlike($idS, $idU)
    {
        $sql = 'INSERT INTO jaime (idNewsArticle,idUsers)
         VALUES (:idNewsArticle,:idUsers)';
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);

            $query->execute([
                'idNewsArticle' => $idS,
                'idUsers' => $idU

            ]);
        } catch (Exception $e) {
            echo 'Erreur: ' . $e->getMessage();
        }
    }



    // function userlikes($idU)
    // {
    //     $sql = "SELECT distinct idNewsArticle FROM jaime where idUsers=:idUsers;";
    //     $db = config::getConnexion();

    //     $req = $db->prepare($sql);
    //     $req->bindValue(':idUsers', $idU);
    //     $req->execute();
    //     $result = $req->fetchAll(PDO::FETCH_OBJ);
    //     return $result;
    // }



    function supprimerlike($idS, $idU)
    {
        $sql = "DELETE FROM jaime WHERE idNewsArticle = :idNewsArticle and idUsers=:idUsers";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':idNewsArticle', $idS);
        $req->bindValue(':idUsers', $idU);
        try {
            $req->execute();
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    function countlike($idS)
    {
        $sql = "SELECT COUNT(*) AS sum FROM jaime WHERE idNewsArticle = :idNewsArticle";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':idNewsArticle', $idS);
        $req->execute();
        $result = $req->fetch(PDO::FETCH_OBJ);
        return $result;
    }
}
