<?php include './bdd/traitementBdd.php';
if (empty($_SESSION['id']) || !isset($_SESSION['id'])) {
    $_SESSION['id'] = null;
}
if(isset($_POST["validCo"])) {
    if(isset($_POST['login']) && !empty($_POST["login"])) {
    $login = $_POST['login'];
    } else {
        $alert = "Pas de login entrer";
        echo $alert;
        return false;
    }
    if(isset($_POST["pass"]) && !empty($_POST["pass"])) {
    $pass = $_POST['pass'];
    } else {
        $alert = "Pas de pass entrer";
        echo $alert;
        return false;
    }
    $connexion_admin = new TraitementBdd;
    $verif = $connexion_admin->connexionAdmin($login, $pass);
    if($verif != false) {
        $_SESSION['login'] = $login;
        $_SESSION['id'] = 1;
    } else {
        $alert = "Mauvais login ou mot de passe";
        echo $alert;
        return false;
    }
}
if(isset($_POST["valid_etude"])) {
    if(isset($_POST["date_debut_etude"]) && !empty($_POST['date_debut_etude'])) {
        $date_debut = $_POST['date_debut_etude'];
    } else {
        $date_debut = "non défini";
    }
    if(isset($_POST["date_fin_etude"]) && !empty($_POST['date_fin_etude'])) {
        $date_fin = $_POST['date_fin_etude'];
    } else {
        $date_fin = "non défini";
    }
    if(isset($_POST['contenu_etude']) && !empty($_POST['contenu_etude'])) {
        $contenu_etude = $_POST['contenu_etude'];
    } else {
        echo "Veuillez entrer au moins un nom d'étude pour valider cette requète.";
        return false;
    }
    $ajoutEtude = new TraitementBdd;
    $ajoutEtude->ajoutCvIntoBddEtude($contenu_etude, $date_debut, $date_fin);
}
if(isset($_POST['valid_diplome'])) {
    if(isset($_POST['date']) && !empty($_POST["date"])) {
        $date = $_POST['date'];
    } else {
        $alert = "Pas de date de diplome entrée";
        echo $alert;
        return false;
    }
    if(isset($_POST['intitule']) && !empty($_POST{"intitule"})) {
        $diplome = $_POST['intitule'];
    } else {
        $alert = "Veuillez entrer un nom de diplome";
        echo $alert;
        return false;
    }
    $ajoutDiplome = new TraitementBdd;
    $ajoutDiplome->ajoutDiplome($diplome, $date);
}
if(isset($_POST['valid_stage'])) {
    if(isset($_POST["date_debut_stage"]) && !empty($_POST['date_debut_stage'])) {
        $date_debut_stage = $_POST['date_debut_stage'];
    } else {
        $date_debut_stage = "non défini";
    }
    if(isset($_POST["date_fin_stage"]) && !empty($_POST['date_fin_stage'])) {
        $date_fin_stage = $_POST['date_fin_stage'];
    } else {
        $date_fin_stage = "non défini";
    }
    if(isset($_POST['contenu_stage']) && !empty($_POST['contenu_stage'])) {
        $contenu_stage = $_POST['contenu_stage'];
    } else {
        echo "Veuillez entrer au moins un nom d'étude pour valider cette requète.";
        return false;
    }
    $ajoutEtude = new TraitementBdd;
    $ajoutEtude->ajoutCvIntoBddFormation($contenu_stage, $date_debut_stage, $date_fin_stage);
}
if(isset($_POST['valid_travail'])) {
    if(isset($_POST["date_debut_travail"]) && !empty($_POST['date_debut_travail'])) {
        $date_debut_travail = $_POST['date_debut_travail'];
    } else {
        $date_debut_travail = "non défini";
    }
    if(isset($_POST["date_fin_travail"]) && !empty($_POST['date_fin_travail'])) {
        $date_fin_travail = $_POST['date_fin_travail'];
    } else {
        $date_fin_travail = "non défini";
    }
    if(isset($_POST['contenu_travail']) && !empty($_POST['contenu_travail']) && isset($_POST["poste"]) && !empty($_POST["poste"])) {
        $contenu_travail = $_POST["poste"] . " : " . $_POST['contenu_travail'];
    } else {
        echo "Veuillez entrer au moins un nom d'étude pour valider cette requète et un nom de poste.";
        return false;
    }
    $ajoutEtude = new TraitementBdd;
    $ajoutEtude->ajoutCvIntoBddTravail($contenu_travail, $date_debut_travail, $date_fin_travail);
}
if (isset($_POST["deconnexion"])) {
    session_destroy();
    header("Location: admin.php");
}
if (isset($_POST['suppr_etude'])) {
    $id = $_POST['token'];
    $suppr_etude = new TraitementBdd;
    $suppr_etude->supprCvIntoBddEtude($id);
}
if (isset($_POST['suppr_diplome'])) {
    $id = $_POST['token'];
    $suppr_etude = new TraitementBdd;
    $suppr_etude->supprCvIntoBddDiplome($id);
}

if(isset($_POST["remettre_etude"])) {
    $id = $_POST["token"];
    $rem_etude = new traitementBdd;
    $rem_etude->remCvIntoBddEtude($id);
}
if(isset($_POST["remettre_diplome"])) {
    $id = $_POST["token"];
    $rem_etude = new traitementBdd;
    $rem_etude->remCvIntoBddDiplome($id);
}
if (isset($_POST['suppr_formation'])) {
    $id = $_POST['token'];
    $suppr_etude = new TraitementBdd;
    $suppr_etude->supprCvIntoBddFormation($id);
}

if(isset($_POST["remettre_formation"])) {
    $id = $_POST["token"];
    $rem_etude = new traitementBdd;
    $rem_etude->remCvIntoBddFormation($id);
}
if (isset($_POST['suppr_travail'])) {
    $id = $_POST['token'];
    $suppr_etude = new TraitementBdd;
    $suppr_etude->supprCvIntoBddTravail($id);
}

if(isset($_POST["remettre_travail"])) {
    $id = $_POST["token"];
    $rem_etude = new traitementBdd;
    $rem_etude->remCvIntoBddTravail($id);
}
?>