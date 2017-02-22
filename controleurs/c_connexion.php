<?php
if(!isset($_REQUEST['action'])){
	$_REQUEST['action'] = 'demandeConnexion';
}
$action = $_REQUEST['action'];

switch($action){
	case 'demandeConnexion':{
		include("vues/v_connexion.php");
		break;
	}
	case 'valideConnexion':{
		//Cheek si l'user est connecter sinon on lui affiche le sommaire
		if(!estConnecte()){
			// On cheek si la variable $_REQUEST de connexion à été envoyer, sinon on afficher la vue connexion
			if(isset($_REQUEST['login'])){
				$login = $_REQUEST['login'];
				$mdp = $_REQUEST['mdp'];
				$visiteur = $pdo->getInfosVisiteur($login,$mdp);

				if(!is_array( $visiteur)){
					ajouterErreur("Login ou mot de passe incorrect");
					include("vues/v_erreurs.php");
					include("vues/v_connexion.php");
				}
				else{
					$id = $visiteur['id'];
					$nom =  $visiteur['nom'];
					$prenom = $visiteur['prenom'];
					connecter($id,$nom,$prenom);
					include("vues/v_sommaire.php");
				}
			}else{
				include("vues/v_connexion.php");
			}

		}else{
			include("vues/v_sommaire.php");
		}
		break;
	}
	default :{
		include("vues/v_connexion.php");
		break;
	}
}
?>
