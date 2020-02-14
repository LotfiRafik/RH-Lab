<?php
namespace app\model;
use app\App;
class Salaire extends \core\model\table {
	protected $table = "salaire";

	//Recupuration d'un tableau d'objet  ; $array[matricule]
	public function listec($array=[])
	{
		$data = $this->select($array);
		return $data;  //$data === l'historique de salaire de l'employé qui a l'id = matricule;
	}

	 //Ajouter un nouveau salaire  $array[matricule , date , salaire]
	public function ajouter($array=[])
	{
		$this->insert($array);
	}

}
