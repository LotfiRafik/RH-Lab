


    <link href="public/css/tableaustyle.css" rel="stylesheet">
    <link href="public/css/formulairestyle.css" rel="stylesheet">




<h6 class="titre col-md-10">Nouvelle évaluation</h6>

<h4 style="position:relative;left:430px;"><?=$array[0]->nom?> <?=$array[0]->prenom?></h4>
<div class="row col-md-10" style="margin-left:130px;">

<form method="post" action="?p=Enew&id=<?php echo $_GET['id'] ?>">


<div class="ttable" style="margin-top:50px;">
  <h4 style="border-top-left-radius:15px; border-top-right-radius:15px;background-color:#A7E8A7;padding-bottom:5px;font-size:20px;text-align: center;"> Entretien annuel d'évaluation </h4>
<table class="table table-hover">
<thead class="entet">
</thead>
<tbody>
  <tr>
    <th scope="row">Date de la derniére évaluation</th>
    <td> <input type="date" name="k13" style="border:0;"></td>

  </tr>
  <tr>
    <th scope="row">Date de l'évaluation en cours</th>
    <td> <input type="date" style="border:0;"></td>

  </tr>
  <tr>
    <th scope="row">Date de la prochaine évaluation</th>
    <td> <input type="date" name="k15" style="border:0;"></td>

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
    <td> <textarea type="text" name="e68" class="col-md-12" style="border:0;height:30px;"></textarea></td>
  </tr>
  <tr>
    <td>Résultats</td>
    <td> <textarea type="text" name="e69" class="col-md-12" style="border:0;height:30px;"></textarea></td>
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
    <td> <input type="text"  name="c73" class="col-md-12" style="border:0;"></td>
    <td> <input type="text"  name="h73" class="col-md-3" style="border:0;"></td>
    <td> <textarea type="text" name="i73" class="col-md-12" style="border:0;height:30px;"></textarea></td>

  </tr>
  <tr>
    <th scope="row">2</th>
    <td> <input type="text"  name="c74" class="col-md-12" style="border:0;"></td>
    <td> <input type="text"  name="h74" class="col-md-3" style="border:0;"></td>
    <td> <textarea type="text" name="i74" class="col-md-12" style="border:0;height:30px;"></textarea></td>
  </tr>
  <tr>
    <th scope="row">3</th>
    <td> <input type="text"  name="c75" class="col-md-12" style="border:0;"></td>
    <td> <input type="text"  name="h75" class="col-md-3" style="border:0;"></td>
    <td> <textarea type="text" name="i75" class="col-md-12" style="border:0;height:30px;"></textarea></td>
  </tr>
  <tr>
    <th scope="row">4</th>
    <td> <input type="text"  name="c76" class="col-md-12" style="border:0;"></td>
    <td> <input type="text"  name="h76" class="col-md-3"  style="border:0;"></td>
    <td> <textarea type="text" name="i76" class="col-md-12" style="border:0;height:30px;"></textarea></td>
  </tr>
  <tr>
    <th scope="row">5</th>
    <td> <input type="text" name="c77" class="col-md-12" style="border:0;"></td>
    <td> <input type="text" name="h77" class="col-md-3" style="border:0;"></td>
    <td> <textarea type="text" name="i77" class="col-md-12" style="border:0;height:30px;"></textarea></td>
  </tr>
  <tr>
    <th scope="row">6</th>
    <td> <input type="text" name="c78" class="col-md-12" style="border:0;"></td>
    <td> <input type="text" name="h78" class="col-md-3" style="border:0;"></td>
    <td> <textarea type="text" name="i78" class="col-md-12" style="border:0;height:30px;"></textarea></td>
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
    <td> <input type="text"  name="c82" class="col-md-12" style="border:0;"></td>
    <td> <input type="text"  name="h82" class="col-md-3" style="border:0;"></td>
    <td> <textarea type="text" name="i82" class="col-md-12" style="border:0;height:30px;"></textarea></td>

  </tr>
  <tr>
    <th scope="row">2</th>
    <td> <input type="text" name="c83" class="col-md-12" style="border:0;" ></td>
    <td> <input type="text" name="h83" class="col-md-3" style="border:0;"></td>
    <td> <textarea type="text" name="i83" class="col-md-12" style="border:0;height:30px;"></textarea></td>
  </tr>
  <tr>
    <th scope="row">3</th>
    <td> <input type="text"  name="c84" class="col-md-12" style="border:0;"></td>
    <td> <input type="text"  name="h84" class="col-md-3" style="border:0;"></td>
    <td> <textarea type="text" name="i84" class="col-md-12" style="border:0;height:30px;"></textarea></td>
  </tr>
  <tr>
    <th scope="row">4</th>
    <td> <input type="text"  name="c85" class="col-md-12" style="border:0;"></td>
    <td> <input type="text"  name="h85" class="col-md-3" style="border:0;"></td>
    <td> <textarea type="text" name="i85" class="col-md-12" style="border:0;height:30px;"></textarea></td>
  </tr>
  <tr>
    <th scope="row">5</th>
    <td> <input type="text"  name="c86" class="col-md-12" style="border:0;"></td>
    <td> <input type="text"  name="h86" class="col-md-3" style="border:0;"></td>
    <td> <textarea type="text" name="i86" class="col-md-12" style="border:0;height:30px;"></textarea></td>
  </tr>
  <tr>
    <th scope="row">6</th>
    <td> <input type="text"  name="h87"  class="col-md-12" style="border:0;"></td>
    <td> <input type="text"  name="h87" class="col-md-3" style="border:0;"></td>
    <td> <textarea type="text" name="i87" class="col-md-12" style="border:0;height:30px;"></textarea></td>
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
    <td> <input type="text"  name="c91" class="col-md-12" style="border:0;"></td>
    <td> <input type="text"  name="h91" class="col-md-3" style="border:0;"></td>
    <td> <input type="text"  name="i91" class="col-md-12" style="border:0;"></td>

  </tr>
  <tr>
    <th scope="row">2</th>
     <td> <input type="text"  name="c92" class="col-md-12" style="border:0;"></td>
    <td> <input type="text"  name="h92" class="col-md-3" style="border:0;"></td>
    <td> <input type="text"  name="i92" class="col-md-12" style="border:0;"></td>
  </tr>
  <tr>
    <th scope="row">3</th>
      <td> <input type="text" name="c93" class="col-md-12" style="border:0;"></td>
    <td> <input type="text"  name="h93" class="col-md-3" style="border:0;"></td>
    <td> <input type="text"  name="i93" class="col-md-12" style="border:0;"></td>
  </tr>
  <tr>
    <th scope="row">4</th>
      <td> <input type="text" name="c94" class="col-md-12" style="border:0;"></td>
    <td> <input type="text"  name="h94" class="col-md-3" style="border:0;"></td>
    <td> <input type="text"  name="i94" class="col-md-12" style="border:0;"></td>
  </tr>
  <tr>
    <th scope="row">5</th>
      <td> <input type="text" name="c95" class="col-md-12" style="border:0;"></td>
    <td> <input type="text"  name="h95" class="col-md-3" style="border:0;"></td>
    <td> <input type="text"  name="i95" class="col-md-12" style="border:0;"></td>
  </tr>
  <tr>
    <th scope="row">6</th>
     <td> <input type="text" name="c96" class="col-md-12" style="border:0;"></td>
    <td> <input type="text" name="h96" class="col-md-3" style="border:0;"></td>
    <td> <input type="text" name="i96" class="col-md-12" style="border:0;"></td>
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
    <td> <textarea type="text" name="b100" class="col-md-12" style="border:0;"></textarea></td>
    <td> <textarea type="text" name="h100" class="col-md-12" style="border:0;"></textarea></td>
  </tr>

</tbody>

</table>
</div>


<button type="submit" class="btn btn-info" style="position:relative;left:675px;">Enregistrer</button>
</form>
</div>
<a href='?p=eva&id=<?=$_GET['id']?>'><button type="submit" class="btn btn-default"style="position:relative;left:714px;top:-38px;"><i class="fa fa-arrow-circle-left"></i> Retour</button></a>
