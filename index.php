
<?php
session_start();
require 'Autoloader.php';
Autoloader::register();

use app\controller\Authcontroleur;
use app\controller\GADcontroleur;
use app\controller\CONGcontroleur;
use app\controller\Evacontroleur;
use app\controller\Paramcontroleur;
use app\controller\RECcontroleur;
use app\controller\ANUcontroleur;
use app\App;

if(isset($_GET['p']))
  {
    $p  =  $_GET['p'];
  }
else
  {
    require'app/views/acc/ind.html';
    exit(0);
  }
//---------------------------------------------------------------------------//

if(isset($_SESSION['id']))			//En cas ou l'utilisateur modifier URL , et il n'est pas encore conécté
{
  switch ($p)
  {
    case 'home':
    	$Authcontroleur = new Authcontroleur();
    	$Authcontroleur->logged();
      break;
    case 'connexion':
      $Authcontroleur = new Authcontroleur();
      $Authcontroleur->connexion();
      break;
    case 'deconnexion':
    	$Authcontroleur = new Authcontroleur();
     	$Authcontroleur->deconnexion();
      break;

  	//Change password  or identifiant
      case 'upmyuser':
  		$controleur = new Authcontroleur();
   		$controleur->upmyuser();
      break;

      case 'manuel' :
      App::manuel();
      break;

  	//Module Gestion Administrative:
  	//-----------------------------

  	case 'administration':
  		$controleur  =  new GADcontroleur();
  	  $controleur->administration();
  	  break;

  	case 'addemploye':
  		$controleur  =  new GADcontroleur();
  		$controleur->addemploye();
  	  break;

  	case 'upemploye':
  		$controleur  =  new GADcontroleur();
  		$controleur->upemploye();
  	  break;

  	case 'salaire':
  		$controleur  =  new GADcontroleur();
  		$controleur->afficher_salaire();
  	  break;

  	case 'contrat_de_travail':
  		$controleur =  new GADcontroleur;
  		$controleur->export_word('Contrat de travail');
  	  break;

    case 'certificat_de_travail':
  		$controleur =  new GADcontroleur();
  		$controleur->export_word('Certificat de travail');
  	break;

    case 'attestation_de_travail':
      $controleur = new GADcontroleur();
      $controleur->export_word('Attestation de travail');
    break;

    case 'cdtdown':
      $controleur = new GADcontroleur();
      $controleur->cdtdown();
    break;

    //------------Conges-----------------//
  case 'conge':
    $controleur= new CONGcontroleur;
    $controleur->insconge();
    break;
  case 'calender':
    $controleur= new CONGcontroleur;
    $controleur->calender();
    break;

  	//Module Parametres:
  	//-----------------
  	case 'param':

  		$Paramcontroleur = new Paramcontroleur();
  		$Paramcontroleur->upparam();
  	break;
  	case 'adduser':

  		$Paramcontroleur  =  new Paramcontroleur();
  	 	$Paramcontroleur->adduser();

  	break;
  	case 'admincomptes':

  		$Paramcontroleur  =  new Paramcontroleur();
  	 	$Paramcontroleur->admincomptes();

  	break;
  	case 'upuser':

  		$Paramcontroleur  =  new Paramcontroleur();
  	 	$Paramcontroleur->upuser();

  	break;
  	case 'uptheme':

  		$Paramcontroleur = new Paramcontroleur();
  	 	$Paramcontroleur->uptheme();
  	break;

    case 'deleteCompte':
      $Paramcontroleur = new Paramcontroleur();
      $Paramcontroleur->deleteCompte();
    break;


    //Module Evaluation et Objectifs:
    $Evacontroleur = new Evacontroleur();
    //-------------------------------
    case 'Etelecharger':
      $Evacontroleur->telecharger();
      break;
    case 'Echarger':
      $Evacontroleur = new Evacontroleur();
      $Evacontroleur->charger();
      break;
    case 'evaluation':
      $Evacontroleur = new Evacontroleur();
      $Evacontroleur->afficher_total();
      break;
    case 'Eafficher':
      $Evacontroleur = new Evacontroleur();
      $Evacontroleur->afficher_evaluation();
      break;
    case 'Emodifier':
      $Evacontroleur = new Evacontroleur();
      $Evacontroleur->modifier();
      break;
    case 'Edelete':
      $Evacontroleur = new Evacontroleur();
      $Evacontroleur->delete();
      break;
    case 'Echarger':
      $Evacontroleur = new Evacontroleur();
      $Evacontroleur->charger();
      break;
    case 'Enew':
      $Evacontroleur = new Evacontroleur();
      $Evacontroleur->creer();
      break;
    case 'eva':
      $Evacontroleur = new Evacontroleur();
      $Evacontroleur->historique();
      break;

  	// RECRUTEMENTS------------------------
  	case 'recrutement':

  		$controleur  =  new RECcontroleur();
  		$controleur->recrutement();
  	break;

  	case 'addcandidat':

  		$controleur  =  new RECcontroleur();
  		$controleur->addcandidat();
  	break;

  	case 'upcandidat':
  		$controleur = new RECcontroleur();
  		$controleur->upcandidat();
  	break;

    case 'deleteCandidat':

      $controleur  =  new RECcontroleur();
      $controleur->supprimer();
    break;

  	// ANNUAIRE -------------
    case 'annuaire':
  		$controleur  =  new ANUcontroleur();
  		$controleur->afficher_annuaire();
  	break;
    case 'anuxlsx':
      $controleur  =  new ANUcontroleur();
      $controleur->anu();
    break;
    case 'filtre':
      $controleur  =  new ANUcontroleur();
      $controleur->filtre();
    break;

    //-----------------

    default:
      require"app/views/error.html";
  }
}
else
{
  $Authcontroleur = new Authcontroleur();
  $Authcontroleur->connexion();
}
