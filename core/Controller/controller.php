<?php
namespace core\Controller;
use app\model\Parametres;
class  Controller {

  public function render($vue,$array=[],$other=[])
  {
    $parametres = new Parametres ;
    $param = $parametres->liste();	
    ob_start();
    require 'app/views/'.$vue.'.php';
    $content = ob_get_clean();
    require 'app/views/templates/default.php';
  }
}
