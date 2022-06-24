<?php

require 'connexion.php';

$requete = $connexion->prepare('SELECT * FROM produit');
$requete->execute();
$produits = $requete->fetchAll(PDO::FETCH_ASSOC);

// var_dump($produits);

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
     
  <?php foreach ($produits as $produit) : ?>

<p><?php echo $produit['id_produit']; ?> - <?php echo $produit['nom_produit']; ?> - <?php echo $produit['quantite_produit']; ?></p>

 <?php endforeach; ?>



</body>
</html>