<?php
namespace app\model;
use app\App;

Class Evaluation extends \core\model\table{

	protected $table = 'evaluation';

	public function afficher_total()
	{
		$statement = 'SELECT  e.nom , e.prenom , e.id , e.poste , ev.next_eva
				FROM employe e
				LEFT JOIN evaluation ev
				ON e.id = ev.matricule';
		$data = App::getDb()->query($statement);
		return $data;
	}

	public function afficher_date($array)
	{
		$data = $this->select($array);
		if(!empty($data))
		{
		return ($data[0]->date_evaluation);
		}										//return  date evaluation de la table evaluation where matricule = get id
		return 0;
	}

	public function modifier($array,$id)
	{
		//si c la premiere fois qu'on ajoute un fichier xlsx
		$tab['matricule'] = $id;
		if($this->select($tab) == false)
		{
			$tab['date_evaluation'] = $array['date_evaluation'];
			$tab['next_eva'] = $array['next_eva'];
			$this->insert($tab);
		}
		//sinon update date
		else
		{
		 	$sql_parts=[];
        	$arguments=[];
	        $i = 0;
	        foreach($array as $k=>$v)
	        {
	            $sql_parts[$i]= $k.'=?';
	            $arguments[$i]=$v;
	            $i++;
	        }
	        $arguments[$i]=$id;
	        $a = implode(",",$sql_parts);
	        $statement = 'UPDATE evaluation SET ' .$a. ' WHERE matricule=?';
	        App::getDb()->prepare($statement,$arguments);
		}
	}

	public function supprimer($array)
	{
		$this->delete($array);
	}


}
