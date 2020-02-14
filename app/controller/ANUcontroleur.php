<?php

namespace app\controller ;
use app\model\Employe;
use app\App ;

class ANUcontroleur extends \core\Controller\controller {


  public function afficher_annuaire()
  {
    $employe = new Employe ();
    $liste = $employe->liste();
    $this->render('annuaire',$liste);
  }


  public function anu()
  	{
  		ob_start();
  		$employe = new employe();
  		$infos = $employe->liste();
  		//---------------------
  		$filepath ='public/annuaire.xlsx';
  		$tmp ='public/tmp.xlsx';
  		require 'app/controller/PHPExcel.php';
  		$objPHPExcel = \PHPExcel_IOFactory::load($filepath);
  		$sheet = $objPHPExcel->getSheet(0);

  		//----------------------------------------
  	 	//ECRITURE des informations suivantes  Nom, Pr�nom, Poste, Adresse mail, Num�ro de t�l�phone, Projet
  	 	$i=3;
  		foreach ($infos as $info)
     		{
     			$sheet->setCellValue('A'.$i, $info->nom);
     			$sheet->setCellValue('B'.$i, $info->prenom);
     			$sheet->setCellValue('C'.$i, $info->poste);
     			$sheet->setCellValue('D'.$i, $info->email);
     			$sheet->setCellValue('F'.$i, $info->telephone);
     			$sheet->setCellValue('H'.$i, $info->projet);
     			$i++;
     		}
     		$objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
  		$objWriter->save($tmp);
  		ob_get_clean();
  		header('Content-Description: File Transfer');
  		header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
  		header('Content-Transfer-Encoding: binary');
  	   	header('Content-Disposition: attachment; filename="Annuaire du personnel.xlsx"'); //Nom du fichier
  		readfile($tmp);
  		unlink($tmp);

  	}

    public function filtre()
    {
      $employe = new Employe ();
      $liste = $employe->liste_filtrer($_POST['id']);
      echo json_encode($liste);



    }




}
