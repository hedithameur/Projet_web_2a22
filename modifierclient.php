<?php
    include_once '../Model/client.php';
    include_once '../Controller/clientC.php';

    $error = "";

    // create client
    $client = null;

    // create an instance of the controller
    $clientC = new clientC();
    if (
        isset($_POST["idclient"]) &&
		isset($_POST["nom"]) &&		
        isset($_POST["prenom"]) &&
		isset($_POST["adresse"]) && 
        isset($_POST["email"]) && 
        isset($_POST["numclient"])
    ) {
        if (
            !empty($_POST["idclient"]) && 
			!empty($_POST['nom']) &&
            !empty($_POST["prenom"]) && 
			!empty($_POST["adresse"]) && 
            !empty($_POST["email"]) && 
            !empty($_POST["numclient"])
        ) {
            $client = new client(
                $_POST['idclient'],
				$_POST['nom'],
                $_POST['prenom'], 
				$_POST['adresse'],
                $_POST['email'],
                $_POST['numclient']
            );
            $clientC->modifierclient($client, $_POST["idclient"]);
            header('Location:afficherListeclients.php');
        }
        else
            $error = "Missing information";
    }    
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Display</title>
</head>
    <body>
        <button><a href="afficherListeclients.php">Retour a la liste des clients</a></button>
        <hr>
        
        <div id="error">
            <?php echo $error; ?>
        </div>
			
		<?php
			if (isset($_POST['IdClient'])){
				$client = $clientC->recupererclient($_POST['IdClient']);
				
		?>
        
        <form action="" method="POST">
            <table border="1" align="center">
                <tr>
                    <td>
                        <label for="idclient">Numéro client:
                        </label>
                    </td>
                    <td><input type="text" name="idclient" id="idclient" value="<?php echo $client['IdClient']; ?>" maxlength="20"></td>
                </tr>
				<tr>
                    <td>
                        <label for="nom">Nom:
                        </label>
                    </td>
                    <td><input type="text" name="nom" id="nom" value="<?php echo $client['Nom']; ?>" maxlength="20"></td>
                </tr>
                <tr>
                    <td>
                        <label for="prenom">Prenom:
                        </label>
                    </td>
                    <td><input type="text" name="prenom" id="prenom" value="<?php echo $client['Prenom']; ?>" maxlength="20"></td>
                </tr>
                <tr>
                    <td>
                        <label for="adresse">Adresse:
                        </label>
                    </td>
                    <td>
                        <input type="text" name="adresse" value="<?php echo $client['Adresse']; ?>" id="adresse">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="email">Adresse mail:
                        </label>
                    </td>
                    <td>
                        <input type="email" name="email" id="email" value="<?php echo $client['Email']; ?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="numero">numero de telephone:
                        </label>
                    </td>
                    <td>
                        <input type="numero" name="numclient" id="numclient" value="<?php echo $client['NumClient']; ?>">
                    </td>
                </tr>              
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" value="Modifier"> 
                    </td>
                    <td>
                        <input type="reset" value="Annuler" >
                    </td>
                </tr>
            </table>
        </form>
		<?php
		}
		?>
    </body>
</html>