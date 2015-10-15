<?php session_start();
 require('traitement/traitementAdmin.php'); ?>
<!DOCTYPE HTML>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Section Admin</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php if($_SESSION["id"] != 1 || $_SESSION["id"] === null) { ?> 
    <div id="connexion">
        <form name="connexion" method="POST">
            <label for="login">Login</label>
            <input type="text" name="login" id="login" />
            <br/>
            <label for="pass">Mot de passe</label>
            <input type="password" name="pass" id="pass" />
            <br/>
            <input type='submit' name="validCo" id="validCo" value="connexion" />
        </form>
    </div>
    <?php } else { ?>
        <div id='divDeconnexion'>
        <form method="POST" name="deconnexion">
            <input type="submit" name="deconnexion" value="se deconnecter" />
        </form>
    </div>
    <div id='cv_etude'>
        <form name="cv_etude" method="POST">
            <h1>Ajouter une étude</h1>
            <label for="date_debut_etude">Date de début</label>
            <input type='text' name="date_debut_etude" id="date_debut_etude" placeholder="01/01/2000" />
            <br/>
            <label for="date_fin_etude">Date de fin</label>
            <input type="text" name="date_fin_etude" id="date_fin_etude" placeholder="01/01/2000" />
            <br/>
            <label for="contenu_etude">Etude</label>
            <textarea id="contenu_etude" name="contenu_etude"></textarea>
            <br/>
            <input type="submit" name="valid_etude" value="ajouter étude" />
        </form>
    </div>
    <div id="maintenance_etude">
        <h2>Etude Editer</h2> 
        <?php $etude = new TraitementBdd;
        $recupBddEtude = $etude->recupCvIntoBdd(); ?>
        <div class ="miseEnFormeEtudeDate">
            <h3><?php echo 'Date début : '; ?></h3>
            <?php $i= 0; foreach ($recupBddEtude as $key => $value) {
                if($recupBddEtude[$i]['CV_TITRE'] === "Etude") {
                ?><p class="dateDebut"><?php echo $recupBddEtude[$i]['date_debut']; ?></p><?php
                }
                $i++;
            } ?></div>
            <div class ="miseEnFormeEtudeDate">
            <h3><?php echo 'Date fin : '; ?></h3>
            <?php $i=0; foreach ($recupBddEtude as $key => $value) {
                if($recupBddEtude[$i]['CV_TITRE'] === "Etude") {
                ?><p class="dateDebut"><?php echo $recupBddEtude[$i]['date_fin'] ?></p><?php
                }
                $i++;
            }?></div>
            <div class ="miseEnFormeEtude">
            <h3><?php echo "contenu etude : "; ?></h3>
            <?php $i=0; foreach ($recupBddEtude as $key => $value) {
                if($recupBddEtude[$i]['CV_TITRE'] === "Etude") {
                    ?><p class="content_etude"><?php echo $recupBddEtude[$i]['CV_content_etude']; ?></p>
                    <?php if($recupBddEtude[$i]["activate"] === "1") { ?>
                    <form method="POST" name="supp_etude">
                        <input type="hidden" name='token' value="<?php echo $recupBddEtude[$i]['id']; ?>" />
                        <input type='submit' name="suppr_etude" value="supprimer etude"/>
                        <p class="dateFin">Ceci est visible dans votre CV.</p>
                        </form> <?php
                    } else { ?>
                    <form method="POST" name="remet_etude">
                        <input type="hidden" name='token' value="<?php echo $recupBddEtude[$i]['id']; ?>" />
                        <input type='submit' name="remettre_etude" value="remettre etude" />
                        <p class="dateFin">Ceci n'est plus visible dans votre CV.</p>
                    </form>
                     <?php
                    }
                }
                $i++;
            } ?></div>
        </div>
    <div id="cv_diplome">
        <form name="diplome" method="POST">
            <h1>Ajouter un diplome</h1>
            <label for="date">Date d'obtention ou du niveau</label>
            <input type="text" name="date" id="date" placeholder="01/01/2000" />
            <br/>
            <label for="intitule">Nom du diplome</label>
            <input type="text" name="intitule" id="intitule" />
            <br/>
            <input type="submit" id="valid_diplome" name="valid_diplome" value="ajouter diplome"/>
        </form>
    </div>
    <div id="tableauDiplome">

            <?php $i=0; foreach ($recupBddEtude as $key => $value) {
                if($recupBddEtude[$i]["CV_TITRE"] === "diplome") {
                     echo "<p class='diplome'>" . $recupBddEtude[$i]["date_debut"] . " = ";
                     echo $recupBddEtude[$i]["diplome"]; ?></p><?php
                     if($recupBddEtude[$i]["activate"] === "1") { ?>
                     <form method="POST" name="supp_diplome" >
                        <input type="hidden" name="token" value="<?php echo $recupBddEtude[$i]['id']; ?>" />
                        <input type="submit" name="suppr_diplome" value="supprimer diplome" />
                        <p>Ceci est visible dans votre CV.</p>
                    </form><?php
                    } else {
                        ?>
                        <form method='POST' name="remet_diplome">
                            <input type="hidden" name="token" value="<?php echo $recupBddEtude[$i]['id']; ?>" />
                            <input type="submit" name="remettre_diplome" value="remettre diplome" />
                            <p>Ceci n'est plus visible dans votre CV.</p>
                        </form><?php
                    }
                }
                $i++;
            } ?>



    </div>
    <div id="cv_stage">
        <form name="cv_stage" method="POST">
        <h1>Ajouter un stage</h1>
            <label for="date_debut_stage">Date de début</label>
            <input type='text' name="date_debut_stage" id="date_debut_stage" placeholder="01/01/2000" />
            <br/>
            <label for="date_fin_stage">Date de fin</label>
            <input type="text" name="date_fin_stage" id="date_fin_stage" placeholder="01/01/2000" />
            <br/>
            <label for="contenu_stage">Contenu stage</label>
            <textarea name="contenu_stage" id="contenu_stage"></textarea>
            <br/>
            <input type="submit" name="valid_stage" id="valid_stage" value="ajouter stage"/>
        </form>
    </div>

    <div id="tableauStage">
        <?php $i=0; foreach ($recupBddEtude as $key => $value) {
            if($recupBddEtude[$i]["CV_TITRE"] === "Formation(s) et stage(s)") { ?>
                <p class='stage'> <?php echo $recupBddEtude[$i]['date_debut'] . '-' . $recupBddEtude[$i]['date_fin']; ?> </p>
                <?php echo $recupBddEtude[$i]["CV_content_formation"];
                if($recupBddEtude[$i]["activate"] === "1") { ?>
                    <form method="POST" name="supp_formation">
                        <input type="hidden" name="token" value="<?php echo $recupBddEtude[$i]['id']; ?>" />
                        <input type="submit" name="suppr_formation" value="supprimer formation" />
                        <p>Ceci est visible dans votre CV.</p>
                    </form><?php
                    } else {
                        ?>
                        <form method='POST' name="remet_formation">
                            <input type="hidden" name="token" value="<?php echo $recupBddEtude[$i]['id']; ?>" />
                            <input type="submit" name="remettre_formation" value="remettre formation" />
                            <p>Ceci n'est plus visible dans votre CV.</p>
                        </form><?php
                }

            }
            $i++;
        } ?>
    </div>

    <div id="cv_travail">
        <form name="cv_travail" method="POST">
        <h1>Ajouter une expèrience professionnel</h1>
            <label for="date_debut_travail">Date de début</label>
            <input type='text' name="date_debut_travail" id="date_debut_travail" placeholder="01/01/2000" />
            <br/>
            <label for="date_fin_travail">Date de fin</label>
            <input type="text" name="date_fin_travail" id="date_fin_travail" placeholder="01/01/2000" />
            <br/>
            <label for="poste">Nom du poste occupé</label>
            <input type="text" name="poste" id="poste" />
            <br/>
            <label for="contenu_travail">Travail</label>
            <textarea name="contenu_travail" id="contenu_travail"></textarea>
            <br/>
            <input type="submit" name="valid_travail" id="valid_travail" value="ajouter expèrience professionnel"/>
        </form>
    </div>

<div id="tableauTravail">
        <?php $i=0; foreach ($recupBddEtude as $key => $value) {
            if($recupBddEtude[$i]["CV_TITRE"] === "experience professionnel") { ?>
                <p class='travail'> <?php echo $recupBddEtude[$i]['date_debut'] . '-' . $recupBddEtude[$i]['date_fin']; ?> </p>
                <?php echo $recupBddEtude[$i]["CV_content_travail"];
                if($recupBddEtude[$i]["activate"] === "1") { ?>
                    <form method="POST" name="supp_travail">
                        <input type="hidden" name="token" value="<?php echo $recupBddEtude[$i]['id']; ?>" />
                        <input type="submit" name="suppr_travail" value="supprimer travail" />
                        <p>Ceci est visible dans votre CV.</p>
                    </form><?php
                    } else {
                        ?>
                        <form method='POST' name="remet_travail">
                            <input type="hidden" name="token" value="<?php echo $recupBddEtude[$i]['id']; ?>" />
                            <input type="submit" name="remettre_travail" value="remettre travail" />
                            <p>Ceci n'est plus visible dans votre CV.</p>
                        </form><?php
                }

            }
            $i++;
        } 
    }?>
</div>

    </body>
</html>