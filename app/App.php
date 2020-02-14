<?php
namespace app;
use core\DataBase\database;
Class App{


	public static function getDb()
	{
		$db = new DataBase("rh");
		return $db;
	}
	public static function notFound()
	{
		header("HTTP/1.0 404 notFound");
		header("Location:index.php?p=404");
	}

	public static function verification($id,$table)
		{
			if(isset($id))
			{
					$id = intval($id);
					if(0 < $id)
					$statement = 'SELECT id from ' .$table. '  WHERE id=?';
					$arguments[0] = $id;
					if(self::getDb()->prepare($statement,$arguments))
					{
						return true;
					}
			}
			header('location:?p=error');
		}

		public static function htmlspecialchars()
		{
			foreach ($_POST as $key => $value)
			{
				$_POST[$key] = htmlspecialchars($_POST[$key]);
			}
		}

		public static function manuel(){
			$filepath ="public/Manuel d'utilisation.pdf";
			if(file_exists($filepath))
			{
				ob_start();
				header('Content-Description: File Transfer');
				header('Content-Type: application/pdf');
				header('Content-Disposition: inline; filename="Manuel d\'utilisation.pdf"'); //Nom du fichier
				ob_clean();
				readfile($filepath);
			}
			else
			{
				header('location:?p=error');
			}
		}
}
