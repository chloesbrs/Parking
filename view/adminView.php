<!--- JONATHAN ---->
<!--
<table>
    <tr>
        <th>Nom / Prenom </th>
        <th>Action</th>
    </tr>
    
    <?php
    foreach($r as $k => $v)
        {
            echo "
                <tr>
                    <td>".$v['nom']."  ".$v['prenom']."</td>
                    <td><a href='index.php?p=adminController&id=".$v['id_u']."'>Supprimer</a> / 
                    <a href='index.php?p=adminController&id_p=".$v['id_u']."'>Définir Place </a> 
                    </td>
                </tr>";
        }
    ?>
</table>

- FIN JONATHAN -
=======
-->

<div class="container">

 <div class="row">
     <div class="col-xs-12 col-md-12 text-middle">
             <h1><u>Demande de places</u></h1>
             <table class="text-middle tableAdmin">
                <th class="text-middle col-xs-3 col-md-3">Utilisateur</th>
                <th class="text-middle col-xs-3 col-md-3">Numéro de place</th>
                <th class="text-middle col-xs-3 col-md-3">Date</th>
                <th class="text-middle col-xs-3 col-md-3">Etat</th>
                
    <?php
                 while($reponse = $req->fetch()){
               ?>
                <tr>
                   <td class="col-xs-3 col-md-3"><?=$reponse['nom']." ".$reponse['prenom'] ;?></td>
                    <td class="col-xs-3 col-md-3"><?=$reponse['nom_p'];?></td>
                    <td class="col-xs-3 col-md-3"><?=$reponse['date_deb'];?></td>
                    <td class="col-xs-3 col-md-3"><b><a href="<?=BASE_URL;?>/accepter/<?= $reponse['id_p'];?>">Accepter</a> / <a href="<?=BASE_URL;?>/refuser/<?= $reponse['id_p'];?>">Refuser</a></b></td>
                    
                </tr>
        <?php };?>
            </table>
     </div>
 </div>
 
  <h1 class="text-middle"><u>Liste des utilisateurs</u></h1>
   <div class="row">
   <div class="text-middle  col-xs-12 col-md-12">
    <table class="text-middle tableAdmin">
        <th class="text-middle col-xs-3 col-md-4">Nom / Prenom </th>
        <th class="text-middle col-xs-3 col-md-4">Email </th>
        <th class="text-middle col-xs-3 col-md-4">  Action </th>
        <?php
        foreach($r as $k => $v)
            {
        ?>
                    <tr>
                        <td class='col-xs-4 col-md-4'>
                            <?= $v['nom']."  ".$v['prenom'];?>
                        </td>
                        <td class='col-xs-4 col-md-4'>
                            <?= $v['mail'];?>
                        </td>
                        <td class='col-xs-4 col-md-4'>
                            <a href="<?=BASE_URL;?>/adminController/<?=$v['id_u'];?>">Supprimer</a>
<!--
                            / 
                            <a href="<?=BASE_URL;?>/adminController/<?=$v['id_u'];?>">Bannir</a>
-->
                        </td>
                    </tr>
        <?php
            }
        ?>
    </table>
    </div>
    </div>
    <div class="row">
        
        <div class="col-xs-12 col-md-12">
            <h1 class="text-middle"><u>Liste des places utilisées</u></h1>
            
        <table class="text-middle tableAdmin">
            <th class="text-middle col-xs-4 col-md-4">Utilisateur </th>
            <th class="text-middle col-xs-4 col-md-4">Numéro de place </th>
            <th class="text-middle col-xs-4 col-md-4">Action</th>
            <?php
                while($reponse = $usedPlace->fetch())
                {
            ?>
                    <tr>
                       <td class='col-xs-4 col-md-4'>
                            <?= $reponse['nom']." ".$reponse['prenom'];?>
                      </td>
                      <td class='col-xs-4 col-md-4'>
                            <?= $reponse['nom_p'];?>
                      </td>
                      <td class='col-xs-4 col-md-4'>
                            <a href="<?=BASE_URL;?>/deleteUsedPlace/<?= $reponse['id_p'];?>">Supprimer</a>
                      </td>
                    </tr>

               <?php } ?>

            </table>
        </div>
        
    </div>
    
    <div class="row">
        
        <div class="col-xs-12 col-md-12">
            <h1 class="text-middle"><u>Ajouter une place</u></h1>
            <form action="" method="post" class="text-middle">
                <label for="nom">Nom de la place: </label>
                <input type="text" name="nom_p">
                <input type="submit" name="submit_place">
            </form>
        </div>
        
    </div>
</div>
