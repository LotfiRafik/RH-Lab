<?php

namespace app\model;
use app\App;
class Conges extends \core\model\table{

  protected $table = "conge";


  public function genconge($array=[])
  {
    $this->insert($array);
  }
  public function allconge ($array=[]) {
    $this->select($array);
  }

  public function holidays($requYMD,$id = [])
  {
    for($i=0;$i<4;$i++)
    {
      $arguments[$i] = $requYMD;
    }
    if(!empty($id))
    {
          $arguments[4] = $id;
          $statement = 'SELECT matricule,datebegin,datend,type FROM `conge`
                WHERE ( YEAR(`datebegin`) = YEAR(?)
                  AND MONTH(`datebegin`) = MONTH(?)
                  OR
                  YEAR(`datend`) = YEAR(?)
                  AND MONTH(`datend`) = MONTH(?) )
                  AND  ( matricule = ? )
                ORDER BY `datebegin`';
    }
    else
    {
        $statement = 'SELECT matricule,datebegin,datend,type FROM `conge`
                WHERE YEAR(`datebegin`) = YEAR(?)
                  AND MONTH(`datebegin`) = MONTH(?)
                  OR
                  YEAR(`datend`) = YEAR(?)
                  AND MONTH(`datend`) = MONTH(?)
                ORDER BY `datebegin`';
    }
   // get all holiday periods by checking if month appears in datebegin or datend
    $array['result'] = App::getDb()->prepare($statement,$arguments);
     // extra query for  holidays over 2 months, e.g. 31.07.2014 - 10.09.2014
    $arguments[1] = date('Y-m-d', strtotime($requYMD.' - 1 month'));
    $arguments[3] = date('Y-m-d', strtotime($requYMD.' + 1 month'));
    if(!empty($id))
    {
     $statement = 'SELECT matricule,datebegin,datend,type FROM `conge`
                WHERE YEAR(`datebegin`) = YEAR(?)
                  AND MONTH(`datebegin`) = MONTH(?)
                  AND YEAR(`datend`) = YEAR(?)
                  AND MONTH(`datend`) = MONTH(?)
                  AND ( matricule = ? )
                ORDER BY `datebegin`';
    }
    else
    {
         $statement = 'SELECT matricule,datebegin,datend,type FROM `conge`
                WHERE YEAR(`datebegin`) = YEAR(?)
                  AND MONTH(`datebegin`) = MONTH(?)
                  AND
                  YEAR(`datend`) = YEAR(?)
                  AND MONTH(`datend`) = MONTH(?)
                ORDER BY `datebegin`';
    }

    $array['resultXX'] = App::getDb()->prepare($statement,$arguments);


    return $array;
  }

}


 ?>
