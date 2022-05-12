<?php
        require_once '../../Controller/CategorieC.php';

        $categorieC = new catagorieC()

        $categories = $categorieC -> affichercategorie();

        if(isset($_POST['categorie']) && isset($_POST(['search'])))
        {
            $list = $categorieC->afficherproduit($_POST['categorie'])
        }

?>

<div class="form-container">
    <form action="" method="POST">
        <div class="row">
            <div class="col-25">
                <label> Search: </label>
    </div>
    
<div class="col-75">
    <select name="categorie" id="categorie" >
        

<?php
        foreach($categories as $categorie )
        {
?>

<option value="<?= $categorie['idC'] ?>"
        <?php
            if(isset($POST['search']) && $categorie['idC'] == $_POST['categorie'])
            {
                ?> selected 
                <?php
            }
        ?>

        >
        <?= $categorie['nom'] ?>
</option>

<?php
        }
?>       

    </select>
    </div>
    </div>
    
    <br>
    <div class="row">
        <innput type="submit" value="search" name="search">
    </div>   
    </form>
</div>    
    
    

<?php 
    if(isset($_POST['search']))
    { ?>
        <section class="container">
            <h2> MUSIC </h2>
            <div class="shop-items">
                <?php
                    foreach($list as $produit){
                        ?>
            <div class="shop-item-marque"> <?= $produit['marque'] ?>  </strong>
            <div class="shop-item-modele"> <?= $produit['modele'] ?>  </strong>
    <!--        <img src="../../asset/images/<?= $produit['image'] ?>" class="shop-items-image">  -->
            <div class="shop-item-details">
                <span class="shop-item-price"><?= $produit['prix_pr']  ?> DT. </span>
            </div>    
            </div> 
            <?php
            }
            ?>
        </div> 
        </section>
        <?php
            }
        ?>           

    }