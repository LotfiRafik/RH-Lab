<?php

namespace app\controller;
use app\model\Conges;
use app\model\Employe;
use app\controller\GADcontroleur;
use app\App ;

class CONGcontroleur extends \core\Controller\controller
{
  public function insconge()
  {
    $i=0;
    $tablnom=[];
    $tablprenom=[];


    if (!empty($_POST))
    {


      $str=$_POST['nomemploye'];
      $id=filter_var($str, FILTER_SANITIZE_NUMBER_INT);//on prend le nom et on extrait le id (partie entiere)
      $emp = new Employe;//
      $array['id'] = $id;
      $donne = $emp->listec($array);

      $nbjour=$donne[0]->nbjour;
      $datedebut=$_POST['datebegin'];
      $datefin=$_POST['datend'];

      $datetime1 = date_create($datedebut);
      $datetime2 = date_create($datefin);
      $intervalle = date_diff($datetime2,$datetime1)->days;

       if ($intervalle <= $nbjour and $nbjour!=0)
       {//on doit modifier dans la table les nombre de jour

         $emp = new Employe ;
         $array['nbjour'] = $nbjour-$intervalle;


         $emp->modifier($array,$id);

          $nvconge=new Conges();
          unset($_POST['nomemploye']);
          $_POST['matricule'] = $id;
          $nvconge->genconge($_POST);

          /*---GENRER TITRE DE CONGES-----*/
          $date['debut']=$datedebut;
          $date['fin']=$datefin;
          $date['id']=$id;
          $date['nbjour']=$intervalle;
         $controleur= new GADcontroleur();
      	$controleur->export_word('Titre de conges',$date);
        $error['nom']=$donne[0]->nom;
        $error['prenom']=$donne[0]->prenom;

        echo json_encode($error);
       }
       else
       {
         $error['o'] = 'o';
          echo json_encode($error);

       }


     }


  }


  //Planning Congés//-------------------------------------
  public function calender()
  {

    header('Content-type: text/html; charset=utf-8');
    setlocale(LC_TIME, 'de_DE.UTF8');

    /* employeS */
    $i=0;
    $tablnom=[];
    $employes = new Employe();
    $result = $employes->liste();
    foreach ($result as $data)
    {
      $tablnom[$i]=''.$data->id.'  '.$data->nom.' '.$data->prenom.'';
      $i++;
    }

    if(isset($_GET['id']) and  !empty($_GET['id']))
    {
      App::verification($_GET['id'],'employe');
      $array['id'] = $_GET['id'];
      $result = $employes->listec($array);
    }
    else
    {
      $result = $employes->liste();
    }
    $noms = array();
    $tArray = array();
    $allDays = array();
    /* DATE PREPARATIONS */
    // http://php.net/manual/en/function.date.php
    $today = date('Y-m-d');

    $requYMD = $today; // makes it first of month
    $startpage = true;
    if(isset($_GET['m']))
      {
      $requYMD = preg_replace("/[^0-9\-]/i", '', $_GET['m']).'-01';
      $startpage = false;
    }
    // block hack, required yyyy-mm-dd
    if(strlen($requYMD)!=10)
      {
      exit();
    }

    // get current month
    $curMonthTS = strtotime($requYMD); // add 4 hours
    $monthNr = date('n', $curMonthTS); // numeric representation of current month, without leading zeros
    // http://stackoverflow.com/questions/13346395/php-array-containing-all-dates-of-the-current-month
    // number of days in the given month
    $num_of_days = date('t', $curMonthTS);
    $x_year = date('Y', $curMonthTS);
    $x_month = date('m', $curMonthTS);
    for($i=1; $i<=$num_of_days; $i++)
    {
      $dates[]= $x_year."-".$x_month."-".str_pad($i,2,'0', STR_PAD_LEFT);
    }


    // fill Arrays with data
    if($result != false)
    {
      foreach($result as $row)
      {
        $id = $row->id;
        $noms[$id] = $row->nom.' '.$row->prenom;
        $tArray[$id] = '';
        // create all days in month as array entries
        $d = 1; // id starts with 1, we dont have an id==0
        while($d <= $num_of_days)
        {
          $allDays[$id][$d] = '';
          $d++;
        }
      }
    }

   //conge->HOLISAYD;
    $conge=new Conges();
    if(isset($_GET['id']))
    {
      $array = $conge->holidays($requYMD,$_GET['id']);
    }
    else
    {
      $array = $conge->holidays($requYMD);
    }
    $result = $array['result'];
    $resultXX = $array['resultXX'];

    if($result != false)
    {
      foreach($result as $row)
      {
        // first entry without leading comma
        if($tArray[$row->matricule]=='') {
          $tArray[$row->matricule] .= $row->datebegin.','.$row->datend.','.$row->type;
        }
        else {
          $tArray[$row->matricule] .= ','.$row->datebegin.','.$row->datend.','.$row->type;
        }
      }
    }

    if($resultXX != false)
    {
      foreach($resultXX as $row)
      {
        // set holiday to full month setting first to end of month
        $tArray[$row->matricule] = $requYMD.','.substr($requYMD,0,8).$num_of_days;
      }
    }

    /* OUTPUT function */
    $mois = "";
        switch (strftime('%B', $curMonthTS)) {
          case 'January':
            $mois = "Janvier " .strftime('%Y', $curMonthTS);
            break;
          case 'February':
            $mois = "Fevrier " .strftime('%Y', $curMonthTS);
            break;
          case 'April':
            $mois = "Avril " .strftime('%Y', $curMonthTS);
            break;
          case 'May':
            $mois = "Mai " .strftime('%Y', $curMonthTS);
            break;
          case 'June':
            $mois = "Juin " .strftime('%Y', $curMonthTS);
            break;
          case 'August':
            $mois = "Aout  " .strftime('%Y', $curMonthTS);
            break;
          case 'July':
            $mois = "Juillet  " .strftime('%Y', $curMonthTS);
            break;
          case 'March':
            $mois = "Mars  " .strftime('%Y', $curMonthTS);
            break;
          case 'March':
            $mois = "Mars  " .strftime('%Y', $curMonthTS);
            break;
          case 'September':
            $mois = "Septembre  " .strftime('%Y', $curMonthTS);
            break;
          case 'November':
            $mois = "Novembre  " .strftime('%Y', $curMonthTS);
            break;
          case 'October':
            $mois = "Octobre  " .strftime('%Y', $curMonthTS);
            break;
          case 'December':
            $mois = "Decembere  " .strftime('%Y', $curMonthTS);
            break;
         }

      $output = '

    <table id="table_de" class="table table-bordered bordered table-hover" style="background:#FFFFFF;">
    <tr>
      <th style="text-align:left !important;background:#5BC0DE !important;">
      '.$mois.'
      </th>
    ';

      // all number days of current month
      foreach($dates as $day) {
        // set id for today to color the column, but only if showing this month
        $cssToday = '';
        if($day == $today && substr($today,5,2)==$monthNr) {
          $cssToday = ' class="today" ';
        }
        // format 2013-10-01 to 01 and remove if necessary the 0 by ltrim
        $output .= '<th'.$cssToday.'>'.ltrim( substr($day,8,2) , '0').'</th>'; // alternative: output $day and let JS convert the day to weekday
      }
    $output .= '


    <tr class="weekdays"style="background-color:#5BC0DE;"><td  style="background-color:#5BC0DE;"></td>';
      $wdaysMonth = array();
      // week days
      $i = 1;
      foreach($dates as $day) {
        // echo '<td>'.date('D', strtotime($day)).'</td>';
        $weekdayName = strftime('%a', strtotime($day));
        $wkendcss = '';
        $todayWDcss = '';
        //if($weekdayName=='Sa' || $weekdayName=='So'){
        if($day == $today) {
          $todayWDcss = 'class="activeday"';
        }
        else if($weekdayName=='So'){
          $wkendcss = 'class="wkend"';
        }
        // write day date in array field
        $wdaysMonth[$i++] = strftime('%A %e. %B %Y', strtotime($day));
        switch ($weekdayName) {
          case 'Sat':
            $weekdayName = "Sam";
            break;
          case 'Fri':
            $weekdayName = "Ven";
            break;
          case 'Sun':
            $weekdayName = "Dim";
            break;
          case 'Mon':
            $weekdayName = "Lun";
            break;
          case 'Tue':
            $weekdayName = "Mar";
            break;
          case 'Wed':
            $weekdayName = "Mer";
            break;
          case 'Thu':
            $weekdayName = "Jeu";
            break;
        }

        $output .= '<td '.$todayWDcss.$wkendcss.'>'.$weekdayName.'</td>';
      }

    $hasData = true;
    $output .= '
    </tr>
    ';
      // go over all employes and display holidays

      //foreach($employeIDs[$countryCode] as $id)

    foreach ($noms as $id => $nom)
    {
            if(isset($tArray[$id]))
            {
          // 2 items in a row belong together: datebegin, datend
          $employeHolidays = explode(',',$tArray[$id]);

          $output .= '<tr> <td><p> '.$nom.'</p></td>';

          // start and end date is one loop
          $loops = count($employeHolidays);

          $i = 0;
          $entiremonthFree = false;
        }
        else
        {
          $employeHolidays[0] = '';
        }
        if(!($employeHolidays[0] == ''))
        {
        while($i < $loops) {
          /* write holiday days into month for employe */
          // compare month, e.g. if 09-25 to 10-01 or 05-20 to 05-25
          $datebegin_year = substr($employeHolidays[$i],0,4);
          $datebegin_month = substr($employeHolidays[$i],5,2);
          $datebegin_day = substr($employeHolidays[$i],8,2);
          $datend_year = substr($employeHolidays[$i+1],0,4);
          $datend_month = substr($employeHolidays[$i+1],5,2);
          $datend_day = substr($employeHolidays[$i+1],8,2);

          $day_start = 1;
          $day_end = $num_of_days; // 31;

          // end month outside current month, e.g. 2013-10* to 2013-11
          if( ($datebegin_year == $datend_year && $monthNr < $datend_month) )
          {
            // last of months
            $day_end = $num_of_days;
            // extra check for period that goes over 2 months, e.g. 31.07.2014 - 13.09.2014
            // our month to be filled is not the start or the end month but between
            if($datend_month-$datebegin_month>1 && $monthNr!=$datend_month && $monthNr!=$datebegin_month)
            {
              // remember that next $month is free completely
              $entiremonthFree = true;
              $output .= '###';
            }
          }
          // end month outside current month, e.g. 2013-12* to 2014-01
          else if( ($datebegin_year < $datend_year && $monthNr > $datend_month) )
                  {
            // last of months
            $day_end = $num_of_days;
          }
          else
                  {
            // set end date of given month, remove leading zero
            $day_end = ltrim( substr($employeHolidays[$i+1],8,2), '0');
          }

          // start month outside current month, e.g. 2013-10 to 2013-11*
          if( ($datebegin_year == $datend_year && $monthNr > $datebegin_month) )
                  {
            // first of month
            $day_start = 1;
          }
          // start month outside current month, e.g. 2013-12 to 2014-01*
          else if( ($datebegin_year < $datend_year && $monthNr < $datebegin_month) )
                  {
            // first of months
            $day_start = 1;
          }
          else
                  {
            // date of start month, remove leading zero
            $day_start = ltrim( substr($employeHolidays[$i],8,2), '0');
            //echo $day_start;
          }

          if($entiremonthFree) {
            $day_end = $num_of_days;
            $day_start = 1;
          }

          // write holidays into array
          while($day_start<=$day_end)
                  {
            $allDays[$id][$day_start] = 'x'.$employeHolidays[$i+2];
            $day_start++;
          }

          // jump to next data items
          $i+=3;
          $hasData = true;
        }
        }
        $k = 0;
        //COLORER LES CASES DE CONGE
        foreach($allDays[$id] as $day)
              {
          $k++;
          switch ($day) {
            case 'xm':
            $output .= '<td  style="background : #8B80DD;"></td>';
              break;
              case 'xp':
              $output .= '<td style="background:#72F46B;"></td>';
                break;
                case 'xs':
                $output .= '<td style="background:#FD6F7C;"></td>';
                  break;

            default:
                $output .= '<td></td>';
              break;
          }

        }
        $output .= '</tr>
        ';
      }

      $output .= '</table>';

     $calender[0] = $output;
     $array[0] = $requYMD;
     $array["listnom"] = $tablnom;
     $this->render('calender',$array ,$calender);
  }
}


 ?>
