<?php

namespace core\DataBase;

use pdo;

class dataBase{
	private $db_name;
    private $db_host;
    private $db_user;
    private $db_pass;
    private $pdo;

    public function __construct($db_name,$db_host='localhost',$db_user='root',$db_pass='')
    {
    	$this->db_name=$db_name;
    	$this->db_host=$db_host;
    	$this->db_user=$db_user;
    	$this->db_pass=$db_pass;
    	$this->pdo=$this->getPdo();
    }
    public function getPdo()
    {
    	if(is_null($this->pdo))
    	{
    		$this->pdo=new PDO('mysql:dbname='.$this->db_name.';localhost='.$this->db_host.'',''.$this->db_user.'',''.$this->db_pass.'');
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        }
    	return $this->pdo;
    }

    public function query($statement)
    {
     $query=$this->getPdo()->query($statement);
     $result=$query->fetchAll(PDO::FETCH_OBJ);

     if(!empty($result))
     {
        return $result;
     }
     return false;
    }

    public function prepare($statement,$argument)
    {
    	$query=$this->getPdo()->prepare($statement);
    	$query->execute($argument);
        if(strpos($statement,'UPDATE')!==0   AND strpos ($statement,'INSERT')!==0 AND strpos($statement,'DELETE')!==0)
        {
            $result=$query->fetchAll(PDO::FETCH_OBJ);
             if(!empty($result))
             {
                return $result;
             }
             return false;
        }
    }

	}
