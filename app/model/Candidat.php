<?php

namespace app\model;
use app\App;
class Candidat extends \core\model\table {

protected $table = "candidat";

	public function liste()
	{
		$data = App::getDB()->query('SELECT * FROM '.$this->table);
		return $data;
	}

	public function listec($array=[])
	{
		$data = $this->select($array);
		return $data;
	}

	public function ajouter ($array=[])
	{

		$this->insert($array);
	}

	public function modifier ($array=[],$id)
	{

		$this->update($array,$id);
	}

	public function supprimer($id)
	{
			$array['id'] = $id;
		$this->delete($array);
	}


}
