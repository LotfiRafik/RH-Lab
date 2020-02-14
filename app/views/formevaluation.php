
    <link href="public/css/tableaustyle.css" rel="stylesheet">
    <link href="public/css/formulairestyle.css" rel="stylesheet">






<?php $objectifs = $array?>

    <h6 class="titre col-md-10">Fiche évaluation </h6>


    <h4 style="position:relative;left:430px;"><?=$other[0]->nom?> <?=$other[0]->prenom?></h4>
    <div class="row col-md-10" style="margin-left:130px;">

    <form method="post" action=<?php echo'?p=Emodifier&id='.$_GET['id'].'&f='.$_GET['f'] ?>>


    <div class="ttable" style="margin-top:50px;">
      <h4 style="border-top-left-radius:15px; border-top-right-radius:15px;background-color:#A7E8A7;padding-bottom:5px;font-size:20px;text-align: center;"> Entretien annuel d'évaluation </h4>
    <table class="table table-hover">
    <thead class="entet">
  </thead>
  <tbody>
    <tr>
      <th scope="row">Date de la derniére évaluation</th>
      <td> <input type="date"  value="<?php echo $objectifs['k13']?>" name="k13" style="border:0;"></td>

    </tr>
    <tr>
      <th scope="row">Date de l'évaluation en cours</th>
      <td> <input type="date" value="<?php echo $objectifs['k14']?>" name="k14" style="border:0;"></td>

    </tr>
    <tr>
      <th scope="row">Date de la prochaine évaluation</th>
      <td> <input type="date" value="<?php echo $objectifs['k15']?>" name="k15" style="border:0;"></td>

    </tr>
  </tbody>

</table>
</div>



<div class="ttable" style="margin-top:50px;">
  <h4 style="border-top-left-radius:15px; border-top-right-radius:15px;background-color:#A7E8A7;padding-bottom:5px;font-size:20px;text-align: center;"> Objects périodes écoulées</h4>

<table class="table table-hover">

<tbody>
  <tr>
    <td> Rappel des objectifs précédents</td>
    <td> <textarea type="text" name="e68" class="col-md-12" style="border:0;height:30px;"><?php echo $objectifs['e68']; ?></textarea></td>
  </tr>
  <tr>
    <td>Résultats</td>
    <td> <textarea type="text" name="e69" class="col-md-12" style="border:0;height:30px;"><?php echo $objectifs['e69'];?></textarea></td>
  </tr>

</tbody>

</table>
</div>


<div class="ttable" style="margin-top:50px;">
  <h4 style="border-top-left-radius:15px; border-top-right-radius:15px;background-color:#A7E8A7;padding-bottom:5px;font-size:20px;text-align: center;"> Objetifs période actuelle</h4>
  <small style="color: green;margin-left:10px;"> *A : Dépassé </small>
  <small style="margin-left:30px;"> *B : Atteint </small>
  <small style="margin-left:30px;"> *C : Partiellement atteint</small>
  <small style="margin-left:30px;"> *D : Non atteint </small>
  <small style="color:red;margin-left:30px;"> *E : Abandonné </small>
<table class="table table-hover">
<thead class="entet">
  <th scope="row"> </th>
  <th scope="row"> Objectifs à court terme (06 mois)</th>
  <th scope="row"> Evaluation de A à E </th>
  <th scope="row"> Commentaires / Remarques </th>
</thead>
<tbody>
  <tr>
    <th scope="row">1</th>
    <td> <input type="text" value="<?php echo $objectifs['c73'] ?>" name="c73" class="col-md-12" style="border:0;"value="Autonomie dans le travail"></td>
    <td> <input type="text" value="<?php echo $objectifs['h73'] ?>" name="h73" class="col-md-3" style="border:0;"></td>
    <td> <textarea type="text" name="i73" class="col-md-12" style="border:0;height:30px;"><?php echo $objectifs['i73'] ?></textarea></td>

  </tr>
  <tr>
    <th scope="row">2</th>
    <td> <input type="text" value="<?php echo $objectifs['c74'] ?>" name="c74" class="col-md-12" style="border:0;"value="Aprentissage des modules Siebel implémentés"></td>
    <td> <input type="text" value="<?php echo $objectifs['h74'] ?>" name="h74" class="col-md-3" style="border:0;"></td>
    <td> <textarea type="text" name="i74" class="col-md-12" style="border:0;height:30px;"><?php echo $objectifs['i74'] ?></textarea></td>
  </tr>
  <tr>
    <th scope="row">3</th>
    <td> <input type="text" value="<?php echo $objectifs['c75'] ?>" name="c75" class="col-md-12" style="border:0;"></td>
    <td> <input type="text" value="<?php echo $objectifs['h75'] ?>" name="h75" class="col-md-3" style="border:0;"></td>
    <td> <textarea type="text" name="i75" class="col-md-12" style="border:0;height:30px;"><?php echo $objectifs['i75'] ?></textarea></td>
  </tr>
  <tr>
    <th scope="row">4</th>
    <td> <input type="text" value="<?php echo $objectifs['c76'] ?>" name="c76" class="col-md-12" style="border:0;"></td>
    <td> <input type="text" value="<?php echo $objectifs['h76'] ?>" name="h76" class="col-md-3"  style="border:0;"></td>
    <td> <textarea type="text" name="i76" class="col-md-12" style="border:0;height:30px;"><?php echo $objectifs['i76'] ?></textarea></td>
  </tr>
  <tr>
    <th scope="row">5</th>
    <td> <input type="text" value="<?php echo $objectifs['c77'] ?>" name="c77" class="col-md-12" style="border:0;"></td>
    <td> <input type="text" value="<?php echo $objectifs['h77'] ?>" name="h77" class="col-md-3" style="border:0;"></td>
    <td> <textarea type="text" name="i77" class="col-md-12" style="border:0;height:30px;"><?php echo $objectifs['i77'] ?></textarea></td>
  </tr>
  <tr>
    <th scope="row">6</th>
    <td> <input type="text" value="<?php echo $objectifs['h78'] ?>" name="c78" class="col-md-12" style="border:0;"></td>
    <td> <input type="text" value="<?php echo $objectifs['h78'] ?>" name="h78" class="col-md-3" style="border:0;"></td>
    <td> <textarea type="text" name="i78" class="col-md-12" style="border:0;height:30px;"><?php echo $objectifs['i78'] ?></textarea></td>
  </tr>

</tbody>

</table>


<table class="table table-hover">
<thead class="entet">
  <th scope="row"> </th>
  <th scope="row"> Objectifs à moyen terme (12 mois)</th>
  <th scope="row"> Evaluation de A à E </th>
  <th scope="row"> Commentaires / Remarques </th>
</thead>
<tbody>
  <tr>
    <th scope="row">1</th>
    <td> <input type="text" value="<?php echo $objectifs['c82'] ?>" name="c82" class="col-md-12" style="border:0;"></td>
    <td> <input type="text" value="<?php echo $objectifs['h82'] ?>" name="h82" class="col-md-3" style="border:0;"></td>
    <td> <textarea type="text" name="i82" class="col-md-12" style="border:0;height:30px;"><?php echo $objectifs['i82'] ?></textarea></td>

  </tr>
  <tr>
    <th scope="row">2</th>
    <td> <input type="text" value="<?php echo $objectifs['c83'] ?>" name="c83" class="col-md-12" style="border:0;" ></td>
    <td> <input type="text" value="<?php echo $objectifs['h83'] ?>" name="h83" class="col-md-3" style="border:0;"></td>
    <td> <textarea type="text" name="i83" class="col-md-12" style="border:0;height:30px;"><?php echo $objectifs['i83'] ?></textarea></td>
  </tr>
  <tr>
    <th scope="row">3</th>
    <td> <input type="text" value="<?php echo $objectifs['c84'] ?>" name="c84" class="col-md-12" style="border:0;"></td>
    <td> <input type="text" value="<?php echo $objectifs['h84'] ?>" name="h84" class="col-md-3" style="border:0;"></td>
    <td> <textarea type="text" name="i84" class="col-md-12" style="border:0;height:30px;"><?php echo $objectifs['i84'] ?></textarea></td>
  </tr>
  <tr>
    <th scope="row">4</th>
    <td> <input type="text" value="<?php echo $objectifs['c85'] ?>" name="c85" class="col-md-12" style="border:0;"></td>
    <td> <input type="text" value="<?php echo $objectifs['h85'] ?>" name="h85" class="col-md-3" style="border:0;"></td>
    <td> <textarea type="text" name="i85" class="col-md-12" style="border:0;height:30px;"><?php echo $objectifs['i85'] ?></textarea></td>
  </tr>
  <tr>
    <th scope="row">5</th>
    <td> <input type="text" value="<?php echo $objectifs['c86'] ?>" name="c86" class="col-md-12" style="border:0;"></td>
    <td> <input type="text" value="<?php echo $objectifs['h86'] ?>" name="h86" class="col-md-3" style="border:0;"></td>
    <td> <textarea type="text" name="i86" class="col-md-12" style="border:0;height:30px;"><?php echo $objectifs['i86'] ?></textarea></td>
  </tr>
  <tr>
    <th scope="row">6</th>
    <td> <input type="text" value="<?php echo $objectifs['h87'] ?>" name="h87"  class="col-md-12" style="border:0;"></td>
    <td> <input type="text" value="<?php echo $objectifs['h87'] ?>" name="h87" class="col-md-3" style="border:0;"></td>
    <td> <textarea type="text" name="i87" class="col-md-12" style="border:0;height:30px;"><?php echo $objectifs['i87'] ?></textarea></td>
  </tr>
</tbody>

</table>


</div>




<div class="ttable" style="margin-top:50px;">
  <h4 style="border-top-left-radius:15px; border-top-right-radius:15px;background-color:#A7E8A7;padding-bottom:5px;font-size:20px;text-align: center;"> Objetifs prochaine période</h4>
  <small style="color: green;margin-left:10px;"> *A : Dépassé </small>
  <small style="margin-left:30px;"> *B : Atteint </small>
  <small style="margin-left:30px;"> *C : Partiellement atteint</small>
  <small style="margin-left:30px;"> *D : Non atteint </small>
  <small style="color: red;margin-left:30px;"> *E : Abandonné </small>
<table class="table table-hover">
<thead class="entet">
  <th scope="row"> </th>
  <th scope="row"> Objectifs à long terme (24 mois)</th>
  <th scope="row"> Evaluation de A à E </th>
  <th scope="row"> Commentaires / Remarques </th>
</thead>
<tbody>
  <tr>
    <th scope="row">1</th>
    <td> <input type="text" value="<?php echo $objectifs['c91'] ?>" name="c91" class="col-md-12" style="border:0;"></td>
    <td> <input type="text" value="<?php echo $objectifs['h91'] ?>" name="h91" class="col-md-3" style="border:0;"></td>
    <td> <input type="text" value="<?php echo $objectifs['i91'] ?>" name="i91" class="col-md-12" style="border:0;"></td>

  </tr>
  <tr>
    <th scope="row">2</th>
     <td> <input type="text" value="<?php echo $objectifs['c92'] ?>" name="c92" class="col-md-12" style="border:0;"></td>
    <td> <input type="text" value="<?php echo $objectifs['h92'] ?>" name="h92" class="col-md-3" style="border:0;"></td>
    <td> <input type="text" value="<?php echo $objectifs['i92'] ?>" name="i92" class="col-md-12" style="border:0;"></td>
  </tr>
  <tr>
    <th scope="row">3</th>
      <td> <input type="text" value="<?php echo $objectifs['c93'] ?>" name="c93" class="col-md-12" style="border:0;"></td>
    <td> <input type="text" value="<?php echo $objectifs['h93'] ?>" name="h93" class="col-md-3" style="border:0;"></td>
    <td> <input type="text" value="<?php echo $objectifs['i93'] ?>" name="i93" class="col-md-12" style="border:0;"></td>
  </tr>
  <tr>
    <th scope="row">4</th>
      <td> <input type="text" value="<?php echo $objectifs['c94'] ?>" name="c94" class="col-md-12" style="border:0;"></td>
    <td> <input type="text" value="<?php echo $objectifs['h94'] ?>" name="h94" class="col-md-3" style="border:0;"></td>
    <td> <input type="text" value="<?php echo $objectifs['i94'] ?>" name="i94" class="col-md-12" style="border:0;"></td>
  </tr>
  <tr>
    <th scope="row">5</th>
      <td> <input type="text" value="<?php echo $objectifs['c95'] ?>" name="c95" class="col-md-12" style="border:0;"></td>
    <td> <input type="text" value="<?php echo $objectifs['h95'] ?>" name="h95" class="col-md-3" style="border:0;"></td>
    <td> <input type="text" value="<?php echo $objectifs['i95'] ?>" name="i95" class="col-md-12" style="border:0;"></td>
  </tr>
  <tr>
    <th scope="row">6</th>
     <td> <input type="text" value="<?php echo $objectifs['c96'] ?>" name="c96" class="col-md-12" style="border:0;"></td>
    <td> <input type="text" value="<?php echo $objectifs['h96'] ?>" name="h96" class="col-md-3" style="border:0;"></td>
    <td> <input type="text" value="<?php echo $objectifs['i96'] ?>" name="i96" class="col-md-12" style="border:0;"></td>
  </tr>

</tbody>

</table>
</div>



<div class="ttable" style="margin-top:50px;">
  <h4 style="border-top-left-radius:15px; border-top-right-radius:15px;background-color:#A7E8A7;padding-bottom:5px;font-size:20px;text-align: center;">Commentaires libres</h4>

<table class="table table-hover">
<thead>
  <tr>
    <th scope="row">Commentaires libres du collaborateur</th>
    <th scope="row">Commentaires libres de l'évaluation</th>
  </tr>

</thead>
<tbody>
  <tr>
    <td> <textarea type="text" name="b100" class="col-md-12" style="border:0;"><?php echo $objectifs['b100'] ?></textarea></td>
    <td> <textarea type="text" name="h100" class="col-md-12" style="border:0;"><?php echo $objectifs['h100'] ?></textarea></td>
  </tr>

</tbody>

</table>
</div>


<button type="submit" name='enregistrer' value='Enregistrer'class="btn btn-info" style="position:relative;left:680px;">Enregistrer</button>
<button type="submit" name='enregistrer' value='Enregistrer Et Valider' class="btn btn-info" style="position:relative;left:380px;;">Enregistrer et valider</button>
</form>

</div>
<a href='?p=eva&id=<?=$_GET['id']?>'><button class="btn btn-default"style="position:relative;left:150px;top:-38px;"><i class="fa fa-arrow-circle-left"></i> Retour</button></a>
