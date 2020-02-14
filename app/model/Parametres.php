<?php

namespace app\model;
use app\App;

class Parametres
{
  protected $table = "parametres";
  public function modifier()
  {
  		  $sql_parts=[];
        $arguments=[];
        $i = 0;
        foreach($_POST as $k=>$v)
        {
            $sql_parts[$i]= $k.'=?';
            $arguments[$i]=$v;
            $i++;
        }
        $a = implode(",",$sql_parts);
        $statement = 'UPDATE parametres SET ' .$a;
        App::getDb()->prepare($statement,$arguments);
	}

	public function liste()
	{
		return (App::getDb()->query('SELECT * FROM parametres'));
	}

  public function getimg()
  {
    return(App::getDb()->query('SELECT imgacueille FROM parametres'));
  }

}
