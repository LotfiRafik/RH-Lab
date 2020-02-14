<?php
namespace app\controller;

use app\model\Evaluation;
use app\model\Parametres;
use app\model\Employe;
use app\App ;




Class Evacontroleur extends \core\Controller\controller{

	public function telecharger()
	{
		ob_start();
		if(!isset($_GET['id']))
		{
				header('location:?p=error');
		}
		App::verification($_GET['id'],'employe');
		$tab['id'] = $_GET['id'];				//ne pas oublie de sécuriser l'id !!
		$employe = new employe();
		$info = $employe->listec($tab);	//id nom prenom post date info tableau d'objet ! dans ce cas un seul objet
		$param = new parametres();
		$setting = $param->liste();
		$logopath = $setting[0]->logo;
		$raison = $setting[0]->raisonsocial;
		$spec = $setting[0]->specialite;

		$filepath = 'public/Evaluation/'.$tab['id'].'/'.$_GET['f'];  //verifier si le fichier exel de cet employé exist ou non
		if(!file_exists($filepath))			//Si le fichier n'exist p
		{
			$filepath ='public/Evaluation/modele.xlsx';							//modele par default
		}
		require 'app/controller/PHPExcel.php';
		$objPHPExcel = \PHPExcel_IOFactory::load($filepath);
		$sheet = $objPHPExcel->getSheet(0);
		$objDrawing = new \PHPExcel_Worksheet_Drawing();
		$objDrawing->setPath($logopath);
		$objDrawing->setCoordinates('B2');
		$objDrawing->setWidth(300);
		$objDrawing->setHeight(100);
		$obj = $objPHPExcel->getActiveSheet()->getDrawingCollection();
   		foreach ($obj as $key => $drawing)
   		{
       		$obj->offsetUnset($key);
   		}
   		$objDrawing->setWorksheet($objPHPExcel->getActiveSheet());
		$sheet->setCellValue('B6', $spec);
		$sheet->setCellValue('B5', $raison);
		$sheet->setCellValue('B11', 'NON & PRENOM DU COLLABORETEUR : ' .$info[0]->nom. '   '  .$info[0]->prenom);
		$sheet->setCellValue('H12', $info[0]->embauche);
		$sheet->setCellValue('E16', $info[0]->poste);
		$objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
		$objWriter->save($filepath);		//on sauvgarde en cas ou le gestionnaire a fait des modif sur les param

		$filename = 'Evaluation de ' .$info[0]->nom.'-'.$info[0]->prenom.'-'.$_GET['f'];
		ob_get_clean();
		header('Content-Description: File Transfer');
		header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
		header('Content-Transfer-Encoding: binary');
	   	header('Content-Disposition: attachment; filename="'.$filename.'"'); //Nom du fichier
		readfile($filepath);
	}


	public function afficher_total()
	{
		$evaluation = new evaluation();
		$tableau = $evaluation->afficher_total();
		$this->render('evaluation',$tableau);
	}


	public function afficher_evaluation()
	{
		if(!isset($_GET['id']))
		{
				header('location:?p=error');
		}
		App::verification($_GET['id'],'employe');
		$evaluation = new Evaluation();
		$array['matricule'] = $_GET['id'];
		$last_date = $evaluation->afficher_date($array);
		$objectifs = array();
		$filepath = 'public/Evaluation/'.$_GET['id'].'/'.$_GET['f'];
			//lire les cellules d'objectifs!
			require 'app/controller/PHPExcel.php';
			$objReader = \PHPExcel_IOFactory::createReader('Excel2007');
			$objReader->setReadDataOnly(false);
			$objPHPExcel = $objReader->load($filepath);
			$sheet = $objPHPExcel->getSheet(0);
			if(file_exists($filepath) AND ($last_date.'.xlsx' == $_GET['f']))			//Si le fichier exist  -> //ouvrir exel et ramener les objectifs
			{
				//lire les cellules d'objectifs!
				$objPHPExcel = \PHPExcel_IOFactory::load($filepath);
				$sheet = $objPHPExcel->getSheet(0);

				$objectifs['k13'] = $sheet->getCell( 'K13' )->getFormattedValue();
				$objectifs['k14'] = $sheet->getCell( 'K14' )->getFormattedValue();
				$objectifs['k15'] = $sheet->getCell( 'K15' )->getFormattedValue();
				$objectifs['e69'] = $sheet->getCell( 'E69' )->getFormattedValue();
			    $objectifs['e68'] = $sheet->getCell( 'E68' )->getFormattedValue();
				for ($i=3; $i < 9 ; $i++)
				{
				   $objectifs['c7'.$i] = $sheet->getCell( 'C7'.$i )->getFormattedValue();			//objectifs
				   $objectifs['h7'.$i] = $sheet->getCell( 'H7'.$i )->getFormattedValue();			//Evaluation
	     		   $objectifs['i7'.$i] = $sheet->getCell('I7'.$i)->getFormattedValue();				//Commentaires et remarques
				}
				for ($i=2; $i < 8 ; $i++)
				{
				   $objectifs['c8'.$i] = $sheet->getCell( 'C8'.$i )->getFormattedValue();			//objectifs
				   $objectifs['h8'.$i] = $sheet->getCell( 'H8'.$i )->getFormattedValue();			//Evaluation
	     		   $objectifs['i8'.$i] = $sheet->getCell('I8'.$i)->getFormattedValue();				//Commentaires et remarques
				}
				for ($i=1; $i < 7 ; $i++)
				{
				   $objectifs['c9'.$i] = $sheet->getCell( 'C9'.$i )->getFormattedValue();			//objectifs
				   $objectifs['h9'.$i] = $sheet->getCell( 'H9'.$i )->getFormattedValue();			//Evaluation
	     		   $objectifs['i9'.$i] = $sheet->getCell('I9'.$i)->getFormattedValue();				//Commentaires et remarques
				}
				$objectifs['b100'] = $sheet->getCell( 'B100' )->getFormattedValue();
				$objectifs['h100'] = $sheet->getCell( 'H100' )->getFormattedValue();


		}
		else
		{
			header('location:?p=error');
		}
		$employe = new Employe();
		$t['id'] = $_GET['id'];
		$t = $employe->listec($t);
		$this->render('formevaluation',$objectifs,$t);
	}


	public function modifier()
	{
		if(!isset($_GET['id']))
		{
				header('location:?p=error');
		}
		App::verification($_GET['id'],'employe');
		$evaluation = new Evaluation();
		$array['matricule'] = $_GET['id'];
		$last_date = $evaluation->afficher_date($array);
		if($last_date.'.xlsx' == $_GET['f'])
		{
			if(!empty($_POST))
			{
				App::htmlspecialchars();
				$filepath = 'public/Evaluation/'.$_GET['id'].'/'.$_GET['f'];  //verifier si le fichier exel de cet employé exist ou non
				if(!file_exists($filepath))
				{
					header('location:?p=error');
				}
				require 'app/controller/PHPExcel.php';
				$objPHPExcel = \PHPExcel_IOFactory::load($filepath);
				$sheet = $objPHPExcel->getSheet(0);
				//Modification des objectifs !-----------------------------------------
				$sheet->setCellValue('K13', $_POST['k13']) ;
				$sheet->setCellValue('K14', $_POST['k14']) ;
				$sheet->setCellValue('K15', $_POST['k15']) ;
				$sheet->setCellValue('E69', $_POST['e69']) ;
				$sheet->setCellValue('E68', $_POST['e68']) ;
				for ($i=3; $i < 9 ; $i++)
				{
					$sheet->setCellValue('C7'.$i, $_POST['c7'.$i]) ;
					$sheet->setCellValue('H7'.$i, $_POST['h7'.$i]);
					$sheet->setCellValue('I7'.$i, $_POST['i7'.$i]);
				}
				for ($i=2; $i < 8 ; $i++)
				{
					$sheet->setCellValue('C8'.$i, $_POST['c8'.$i]) ;
					$sheet->setCellValue('H8'.$i, $_POST['h8'.$i]);
					$sheet->setCellValue('I8'.$i, $_POST['i8'.$i]);
				}
				for ($i=1; $i < 7 ; $i++)
				{
					$sheet->setCellValue('C9'.$i, $_POST['c9'.$i]) ;
					$sheet->setCellValue('H9'.$i, $_POST['h9'.$i]);
					$sheet->setCellValue('I9'.$i, $_POST['i9'.$i]);
				}
				$sheet->setCellValue('H100', $_POST['h100']);
				$sheet->setCellValue('B100', $_POST['b100']);

				$objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
				$filepath = 'public/Evaluation/'.$_GET['id'].'/'.$_GET['f'];
				$objWriter->save($filepath);		//on sauvgarde
				$tab['next_eva'] =  $_POST['k15'];
				if($_POST['enregistrer'] == 'Enregistrer Et Valider')
				{
					$tab['date_evaluation'] = NULL;
				}
				$evaluation->modifier($tab,$_GET['id']);
			}
		}
		$location = '?p=eva&id='.$_GET['id'];
		header('location:'.$location);
	}


	public function creer()
	{
		if(!isset($_GET['id']))
		{
				header('location:?p=error');
		}
		App::verification($_GET['id'],'employe');
		if(!empty($_POST))			//Si l'utilisateur a rempli les informations
		{
			App::htmlspecialchars();
			$tab['id'] = $_GET['id'];				//ne pas oublie de sécuriser l'id !!
			$employe = new employe();
			$info = $employe->listec($tab);	//id nom prenom post date info tableau d'objet ! dans ce cas un seul objet
			$param = new parametres();
			$setting = $param->liste();
			$logopath = $setting[0]->logo;
			$raison = $setting[0]->raisonsocial;
			$spec = $setting[0]->specialite;
			//---------------------
			$filepath ='public/Evaluation/modele.xlsx';
			require 'app/controller/PHPExcel.php';
			$objPHPExcel = \PHPExcel_IOFactory::load($filepath);
			$sheet = $objPHPExcel->getSheet(0);
			$objDrawing = new \PHPExcel_Worksheet_Drawing();
			$objDrawing->setPath($logopath);
			$objDrawing->setCoordinates('B2');
			$objDrawing->setWidth(300);
			$objDrawing->setHeight(100);
	   		$objDrawing->setWorksheet($objPHPExcel->getActiveSheet());
			$sheet->setCellValue('B6', $spec);
			$sheet->setCellValue('B5', $raison);
			$sheet->setCellValue('B11', 'NON & PRENOM DU COLLABORETEUR : ' .$info[0]->nom. '   '  .$info[0]->prenom);
			$sheet->setCellValue('H12', $info[0]->embauche);
			$sheet->setCellValue('E16', $info[0]->poste);
			$sheet->setCellValue('K13', $_POST['k13']) ;
			$sheet->setCellValue('K14', $_POST['k14']) ;
			$sheet->setCellValue('K15', $_POST['k15']) ;
			$sheet->setCellValue('E69', $_POST['e69']) ;
			$sheet->setCellValue('E68', $_POST['e68']) ;
			for ($i=3; $i < 9 ; $i++)
			{
				$sheet->setCellValue('C7'.$i, $_POST['c7'.$i]) ;
				$sheet->setCellValue('H7'.$i, $_POST['h7'.$i]);
				$sheet->setCellValue('I7'.$i, $_POST['i7'.$i]);
			}
			for ($i=2; $i < 8 ; $i++)
			{
				$sheet->setCellValue('C8'.$i, $_POST['c8'.$i]) ;
				$sheet->setCellValue('H8'.$i, $_POST['h8'.$i]);
				$sheet->setCellValue('I8'.$i, $_POST['i8'.$i]);
			}
			for ($i=1; $i < 7 ; $i++)
			{
				$sheet->setCellValue('C9'.$i, $_POST['c9'.$i]) ;
				$sheet->setCellValue('H9'.$i, $_POST['h9'.$i]);
				$sheet->setCellValue('I9'.$i, $_POST['i9'.$i]);
			}
			$sheet->setCellValue('H100', $_POST['h100']);
			$sheet->setCellValue('B100', $_POST['b100']);
			$objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
			$evaluation = new evaluation();
			$array['date_evaluation'] =	date("Y-m-d");
			$array['next_eva'] =  $_POST['k15'];
			$evaluation->modifier($array,$_GET['id']);		//modifier la derniere date d'evaluation
			$dossier = @opendir('public/Evaluation/'.$_GET['id']);
			if(!$dossier)										//Si le dossier n'exist pas
			{
				mkdir ('public/Evaluation/'.$_GET['id'] ,0777 ,true);
			}
			$filepath = 'public/Evaluation/'.$_GET['id'].'/'.date('Y-m-d').'.xlsx';
			$objWriter->save($filepath);
			$location = '?p=eva&id='.$_GET['id'];
			header('location:'.$location);
		}
		else
		{
			$evaluation = new evaluation();
			$array['matricule'] = $_GET['id'];
			$date = $evaluation->afficher_date($array);
			if($date != 0)
			{
				//echo ' ALERT : Veuillez Valider La Fiche d\'évaluation précédente avant de creer une nouvelle fiche ' ;
			}
			else
			{
				$employe = new Employe();
				$t['id'] = $_GET['id'];
				$tb = $employe->listec($t);
				$this->render('nouvelleeva',$tb);
			}
		}
	}

	public function delete()
	{
		if(!isset($_GET['id']))
		{
				header('location:?p=error');
		}
		App::verification($_GET['id'],'employe');
		$filepath = 'public/Evaluation/'.$_GET['id'].'/'.$_GET['f'];
		if(file_exists($filepath))			//Si le fichier exist
		{
			if($dossier = @opendir('public/Evaluation/'.$_GET['id']))
			{
				$evaluation = new Evaluation();
				$array['matricule'] = $_GET['id'];
				$last_date = $evaluation->afficher_date($array);
				if($last_date.'.xlsx' == $_GET['f'])
				{
					unlink($filepath);
					$tab['date_evaluation'] = NULL;
					$evaluation->modifier($tab,$_GET['id']);
				}
			}
		}
		$location = '?p=eva&id='.$_GET['id'];
		header('location:'.$location);
	}

	public function charger()
	 {
		 if(!isset($_GET['id']))
		 {
				 header('location:?p=error');
		 }
		 App::verification($_GET['id'],'employe');
	 	$evaluation = new evaluation();
		$array['matricule'] = $_GET['id'];
		$date = $evaluation->afficher_date($array);
		if($date != 0)
		{
			echo ' ALERT : Veuillez Valider La Fiche d\'évaluation précédente avant de creer une nouvelle fiche ' ;
			die();
		}
		else
		{
			if (isset($_FILES['fichier']) AND $_FILES['fichier']['error']== 0)
	 		{
				$infosfichier = pathinfo($_FILES['fichier']['name']);
				$extension = $infosfichier['extension'];
				if ($extension === 'xlsx')	// Testons si l'extension est autorisée
				{
					$dossier = @opendir('public/Evaluation/'.$_GET['id']);
					if(!$dossier)										//Si le dossier n'exist pas
					{
						mkdir ('public/Evaluation/'.$_GET['id'] ,0777 ,true);
					}
			 		$dest = 'public/Evaluation/'.$_GET['id'].'/'.date("Y-m-d").'.xlsx';
			 		move_uploaded_file($_FILES['fichier']['tmp_name'],$dest);
			 		$evaluation = new evaluation();
					$tab['date_evaluation'] =	date("Y-m-d");
					require 'app/controller/PHPExcel.php';
					$objReader = \PHPExcel_IOFactory::createReader('Excel2007');
					$objReader->setReadDataOnly(false);
					$objPHPExcel = $objReader->load($dest);
					$sheet = $objPHPExcel->getSheet(0);
				    $tab['next_eva'] = $sheet->getCell( 'K15' )->getFormattedValue();
					$evaluation->modifier($tab,$_GET['id']);
			 	}
	 		}
		}
		$location = '?p=eva&id='.$_GET['id'];
		header('location:'.$location);
	 }

	 public function historique()
	 {
		if(!isset($_GET['id']))
		{
				header('location:?p=error');
		}
		App::verification($_GET['id'],'employe');
	 	$evaluation = new Evaluation();
		$array['matricule'] = $_GET['id'];
		$last_date = $evaluation->afficher_date($array);
		$array['last_date'] = $last_date;
		$employe = new Employe();
		$tab['id'] = $_GET['id'];
		$tab = $employe->listec($tab);
		$this->render('historique-evaluation',$array,$tab);
	}
}
