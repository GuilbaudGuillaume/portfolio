<?php
include "bdd/traitementBdd.php";
?>
<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Mon CV</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php $cv = new TraitementBdd;
    $cvBdd = $cv->recupCvIntoBdd();
    var_dump($cvBdd);
    //if(isset($cvBdd[0]['']))
    ?>

</body>
</html>