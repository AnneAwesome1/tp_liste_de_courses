<?php

require 'connexion.php';

if (isset($_POST['name']) && isset($_POST['quantite'])) {

     $q = "INSERT INTO `produit` (`id_produit`,`nom_produit`, `quantite_produit`) VALUES (:id_produit, :name, :quantite)";

     $requete = $connexion->prepare($q);

     $requete->bindValue('nom_produit', $_POST['name'], PDO::PARAM_STR);

     $requete->bindValue('quantite_produit', $_POST['produit_quantite'], PDO::PARAM_INT);

     $result = $requete->execute();
}






if (isset($_POST['id_produit_edit'])) { // bouton edit + champd produit + champ quantite 

     // Mise à jour des champ input produit et quantite avec le botton edit.

     $query = "UPDATE `produit` SET nom_produit= :nom_produit, quantite_produit= :quantite_produit WHERE id_produit = :id_produit";

     $requete = $connexion->prepare($query);
     // bindValue = Associe une valeur à un parametre dans une requete
     $requete->bindValue('id_produit', $_POST['id_produit_edit'], PDO::PARAM_INT); //INTEGER

     $requete->bindValue('nom_produit', $_POST['produit_name'], PDO::PARAM_STR); // STRING

     $requete->bindValue('quantite_produit', $_POST['produit_quantite'], PDO::PARAM_INT); // INTEGER

     $result = $requete->execute();
}



if (isset($_POST['id_produit_delete'])) { // si o click sur le bouton delete

     $query = "DELETE FROM produit WHERE id_produit = :id_produit";
     $requete = $connexion->prepare($query);
     $requete->bindValue('id_produit', $_POST['id_produit_delete'], PDO::PARAM_INT);
     $result = $requete->execute();
}



$requete = $connexion->prepare('SELECT * FROM produit');
$requete->execute();
$produits = $requete->fetchAll(PDO::FETCH_ASSOC);


?>

<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Liste de courses</title>
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</head>

<body>
     <div style="margin: 1%;">
          <h3>Liste de courses</h3>
          <form onSubmit='' style="margin: 1%;">
               <div class="row">
                    <div class="col-sm-2">
                         <input type="number" name="quantite" class="form-control">
                    </div>
                    <div class="col-sm-5">
                         <input type="text" name="name" class="form-control">
                    </div>
               </div>
               <input type="hidden" name="produit_add" value="" />
               <button type="submit" class="btn btn-primary" style="margin: 1%;"> Ajouter </button>
          </form>

          <?php foreach ($produits as $produit) : ?>

               <div class="row" style="flex-wrap: nowrap; margin :10px 0px">

                    <form method="POST" action="" class="col-sm-2">
                         <input type="hidden" name="id_produit_delete" value="<?php echo $produit['id_produit']; ?>" />
                         <button type="submit" class="btn btn-danger"> Delete </button>
                    </form> <!-- On doit avoir un formulaire qui envoie l'id du produit a supprimer (avec un input hidden) -->

                    <form method="POST" action="">
                         <div class="row" style="flex-wrap: nowrap;">
                              <div class="col-sm-2">
                                   <input type="hidden" name="id_produit_edit" value="<?php echo $produit['id_produit']; ?>" />
                                   <button type="submit" class="btn btn-warning">Edit</button>
                              </div>

                              <div class="col-sm-3">
                                   <input type="text" name="produit_name" value="<?php echo $produit['nom_produit']; ?>" class="form-control" />
                              </div>

                              <div class="col-sm-3">
                                   <input type="number" name="produit_quantite" value="<?php echo $produit['quantite_produit']; ?>" class="form-control" />
                              </div>
                         </div>
                    </form>

               </div>

          <?php endforeach; ?>

     </div>



</body>

</html>