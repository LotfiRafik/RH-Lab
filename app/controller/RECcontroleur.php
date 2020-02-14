<?php
namespace app\controller;
use app\model\Candidat;
use app\App ;

class RECcontroleur extends \core\Controller\controller{


	public function recrutement()
	{
		$candidat = new Candidat();
		$liste = $candidat->liste();
		$this->render('recrutement',$liste);
	}

	public function addcandidat()
	{
		if (!empty($_POST))
		{
			App::htmlspecialchars();

			$candidat = new Candidat();
			$candidat->ajouter($_POST);
			header('Location:?p=recrutement');
		}
		$this->render('fichecandidat');

	}

	public function upcandidat()
	{
		if(!isset($_GET['id']))
		{
				header('location:?p=error');
		}
		App::verification($_GET['id'],'candidat');
		$candidat = new Candidat();
		if (!empty($_POST))
		{
			App::htmlspecialchars();

			$candidat->modifier($_POST,$_GET['id']);
			header('Location:?p=upcandidat&id='.$_GET['id'].'');
		}
		else
		{
			$array['id'] = $_GET['id'];
	 		$data = $candidat->listec($array);
		}
		$this->render('fichecandidat',$data);

	}

	public function supprimer()
	{
		if(!isset($_GET['id']))
		{
			header('location:?p=error');
		}
		App::verification($_GET['id'],'candidat');
		$candidat = new Candidat();
		$candidat->supprimer($_GET['id']);
		header('location:?p=recrutement');

	}
}
