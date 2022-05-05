<?PHP
include_once "C://xampp/htdocs/webprojettest/allfolders/config.php";
require_once 'C://xampp/htdocs/webprojettest/allfolders/model/Articles.php';

class articleC
{

    public function ajouterArticle($article)
    {
        $sql = "INSERT INTO newsarticle(titre,texte,auteur,source,urlImage,notifCreateur,Datearticle) 
			VALUES (:titre,:texte,:auteur,:source,:urlImage,:notifCreateur,:Datearticle)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);

            $query->execute([
                'titre' => $article->getTitre(),
                'texte' => $article->getTexte(),
                'auteur' => $article->getAuteur(),
                'source' => $article->getSource(),
                'urlImage' => $article->getUrlImage(),
                'notifCreateur' => $article->getNotifCreateur(),
                'Datearticle' => $article->getDatearticle(),

            ]);
        } catch (Exception $e) {
            echo 'Erreur: ' . $e->getMessage();
        }
    }

    public function afficherarticle()
    {

        $sql = "SELECT * FROM newsarticle";
        $db = config::getConnexion();

        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }


    function supprimerarticle($id)
    {
        $sql = "DELETE FROM newsarticle WHERE idNewsArticle = :idNewsArticle";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':idNewsArticle', $id);
        try {
            $req->execute();
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }


    function modifierarticle($article, $id)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE newsarticle SET 
						titre = :titre, 
						texte= :texte,
						auteur = :auteur,
						source = :source,
						urlImage = :urlImage,
                        notifCreateur = :notifCreateur,
                        Datearticle = :Datearticle
					WHERE idNewsArticle = :idNewsArticle'
            );
            $query->execute([
                'titre' => $article->getTitre(),
                'texte' => $article->getTexte(),
                'auteur' => $article->getAuteur(),
                'source' => $article->getSource(),
                'urlImage' => $article->getUrlImage(),
                'notifCreateur' => $article->getNotifCreateur(),
                'Datearticle' => $article->getDatearticle(),
                'idNewsArticle' => $id
            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }


    function recupererarticle($id)
    {
        $sql = "SELECT * from newsarticle where idNewsArticle=$id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();

            $user = $query->fetch();
            return $user;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }


    function sortdate1()
    {
        $sql = "SELECT * from newsarticle order by Datearticle desc";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }
    function sortdate2()
    {
        $sql = "SELECT * from newsarticle order by Datearticle asc";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }


    function sortlikes()
    {
        $sql = "SELECT * from newsarticle order by Datearticle asc";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }










    function updatearticlevue($id)
    {
        $sql = "UPDATE newsarticle SET nbrvue=nbrvue+1 WHERE idNewsArticle = :idNewsArticle";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':idNewsArticle', $id);
        try {
            $req->execute();
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }




    function sortarticlebynbrlikes()
    {
        $sql = "SELECT * from newsarticle order by Datearticle asc";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }


    public function AfficherArticlePaginer($page, $perPage)
    {
        $start = ($page > 1) ? ($page * $perPage) - $perPage : 0;
        $sql = "SELECT * FROM newsarticle LIMIT {$start},{$perPage}";
        $db = config::getConnexion();
        try {
            $liste = $db->prepare($sql);
            $liste->execute();
            $liste = $liste->fetchAll(PDO::FETCH_ASSOC);
            return $liste;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }


    public function calcTotalRows($perPage)
    {
        $sql = "SELECT SQL_CALC_FOUND_ROWS * FROM newsarticle";
        $db = config::getConnexion();
        try {

            $liste = $db->query($sql);
            $total = $db->query("SELECT FOUND_ROWS() as total")->fetch()['total'];
            $pages = ceil($total / $perPage);
            return $pages;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }



    /* function lastArticle()
    {
        $sql = "SELECT * from newsarticle order by Datearticle DESC LIMIT 1";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }*/

    function lastArticle()
    {
        $db = config::getConnexion();
        $sql = "SELECT * from newsarticle order by Datearticle DESC LIMIT 1";
        $req = $db->prepare($sql);
        $req->execute();
        $result = $req->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }




    function recherche($search_value)
    {
        $sql = "SELECT * FROM newsarticle where  idNewsArticle like '$search_value' or  titre like '%$search_value%' or auteur like '%$search_value%' or source like '%$search_value%'or Datearticle like '%$search_value%' ";

        //global $db;
        $db = Config::getConnexion();

        try {
            $result = $db->query($sql);

            return $result;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }
}
