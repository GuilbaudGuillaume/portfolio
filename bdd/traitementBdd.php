<?php
require("connexion.php");
class TraitementBdd extends ConnexionBdd
{
    function connexionAdmin ($pseudo, $MDP) {
        $MDP = sha1($MDP);
        $bdd = $this->getbdd();
        $recuId = "SELECT COUNT(login) FROM admin WHERE login = :pseudo AND password = :pass";
        $recupId = $bdd->prepare($recuId);
        $recupId->execute(array(
            ":pseudo" => $pseudo,
            ":pass" => $MDP));
        if($recupId->fetch()) {
            return $pseudo;
        } else {
            echo "Login ou mot de passe non trouver dans la base de donnée";
            return false;
        }
    }
    function ajoutCvIntoBddEtude ($contentEtude, $dateDebut, $dateFin) {
        $bdd = $this->getbdd();
        $content = htmlspecialchars($contentEtude);
        $ajoutCV = "INSERT INTO CV(CV_content_etude, date_debut, date_fin, CV_TITRE) VALUES (:content, :dateDebut, :dateFin, 'Etude')";
        $ajout_CV = $bdd->prepare($ajoutCV);
        $ajout_CV->execute(array(
            "content" => $content,
            "dateDebut" => $dateDebut,
            "dateFin" => $dateFin));
    }
    function ajoutCvIntoBddFormation ($contentFormation, $date_debut, $date_fin) {
        $bdd = $this->getbdd();
        $content = htmlspecialchars($contentFormation);
        $ajoutCV = "INSERT INTO CV(CV_content_formation, date_debut, date_fin, CV_TITRE) VALUES (:content, :date_debut, :date_fin, 'Formation(s) et stage(s)')";
        $ajout_CV = $bdd->prepare($ajoutCV);
        $ajout_CV->execute(array(
            "content" => $content,
            "date_debut" => $date_debut,
            "date_fin" => $date_fin));  
    }
    function ajoutCvIntoBddTravail ($contentTravail, $dateDebut, $dateFin) {
        $bdd = $this->getbdd();
        $content = htmlspecialchars($contentTravail);
        $ajoutCV = "INSERT INTO CV(CV_content_travail, date_debut, date_fin, CV_TITRE) VALUES (:content, :dateDebut, :dateFin, 'experience professionnel')";
        $ajout_CV = $bdd->prepare($ajoutCV);
        $ajout_CV->execute(array(
            "content" => $content,
            "dateDebut" => $dateDebut,
            "dateFin" => $dateFin));  
    }
    function ajoutDiplome($date, $intituleDiplome) {
        $bdd = $this->getbdd();
        $ajoutDiplome = "INSERT INTO CV(diplome, date_debut, CV_TITRE) VALUES (:intituleDiplome, :dateDebut, 'diplome')";
        $ajout_diplome = $bdd->prepare($ajoutDiplome);
        $ajout_diplome->execute(array(
            "intituleDiplome" => $intituleDiplome,
            "dateDebut" => $date));
    }
    function supprCvIntoBddTravail ($id) {
        $bdd = $this->getbdd();
        $supprCV = "UPDATE CV SET activate = 0 WHERE id = :id";
        $suppr_CV = $bdd->prepare($supprCV);
        $suppr_CV->execute(array(
            "id" => $id));  
    }
    function supprCvIntoBddFormation ($id) {
        $bdd = $this->getbdd();
        $supprCV = "UPDATE CV SET activate = 0 WHERE id = :id";
        $suppr_CV = $bdd->prepare($supprCV);
        $suppr_CV->execute(array(
            "id" => $id));  
    }
    function supprCvIntoBddEtude ($id) {
        $bdd = $this->getbdd();
        $supprCV = "UPDATE CV SET activate = 0 WHERE id = :id";
        $suppr_CV = $bdd->prepare($supprCV);
        $suppr_CV->execute(array(
            ":id" => $id));  
    }
    function remCvIntoBddEtude ($id) {
        $bdd = $this->getbdd();
        $remCV = "UPDATE CV SET activate = 1 WHERE id = :id";
        $rem_CV = $bdd->prepare($remCV);
        $rem_CV->execute(array(
            ":id" => $id));  
    }
    function supprCvIntoBddDiplome ($id) {
        $bdd = $this->getbdd();
        $supprCV = "UPDATE CV SET activate = 0 WHERE id = :id";
        $suppr_CV = $bdd->prepare($supprCV);
        $suppr_CV->execute(array(
            ":id" => $id));  
    }
    function remCvIntoBddDiplome ($id) {
        $bdd = $this->getbdd();
        $remCV = "UPDATE CV SET activate = 1 WHERE id = :id";
        $rem_CV = $bdd->prepare($remCV);
        $rem_CV->execute(array(
            ":id" => $id));  
    }
    function remCvIntoBddFormation ($id) {
        $bdd = $this->getbdd();
        $remCV = "UPDATE CV SET activate = 1 WHERE id = :id";
        $rem_CV = $bdd->prepare($remCV);
        $rem_CV->execute(array(
            ":id" => $id));  
    }
    function remCvIntoBddTravail ($id) {
        $bdd = $this->getbdd();
        $remCV = "UPDATE CV SET activate = 1 WHERE id = :id";
        $rem_CV = $bdd->prepare($remCV);
        $rem_CV->execute(array(
            ":id" => $id));  
    }
    function recupCvIntoBdd() {
        $bdd = $this->getbdd();
        $reqRecupCv = "SELECT * FROM CV ORDER BY date_debut ASC";
        $req_Recup_CV = $bdd->prepare($reqRecupCv);
        $req_Recup_CV->execute();
        $cvRecup = $req_Recup_CV->fetchAll();
        return $cvRecup;
    }
}
?>