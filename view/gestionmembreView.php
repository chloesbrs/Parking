

    <div class="row text-middle">
        <div class="col-xs-12 col-md-5 text-middle">
            <section>
                <h3><u>Réserver votre place</u></h3>
            </section>
        <h4>
          <form action="#" method="post">
            Date de début:<br>
            <input type="date" name="debut" class="text-middle"><br><br>
            Date de fin:<br>
            <input type="date" name="fin" class="text-middle"><br><br>
            <input type="submit" name="submit">
          </form>
        </h4>
         
        </div>



        <?php
          $req = displayPlaceAttente($_SESSION['id']);
        ?>

        <div class="col-xs-12 col-md-5 text-middle margin-right">
           <div class="user-block">
            <h3><u>Demande de places</u></h3>
            <table class="text-middle">
                <th class="text-middle col-xs-4 col-md-4">Numéro de place</th>
                <th class="text-middle col-xs-4 col-md-4">Date</th>
                <th class="text-middle col-xs-4 col-md-4">Etat</th>
              <?php
                while($rep = $req->fetch())
                {
              ?>
              <tr>
                <td class="col-xs-4 col-md-4"><?php echo $rep['nom_p']; ?></td>
                <td class="col-xs-4 col-md-4"><?php echo $rep['date_deb']; ?></td>
                <td class="col-xs-4 col-md-4"><b>En attente...</b></td>
              </tr>
              <?php
                }
              ?>

            </table>
            <section><h4><b>Place dans la file d'attente:</b> ...</h4></section>
        </div>
        </div>
    </div>


    <?php
      $req1 = displayPlaceValide($_SESSION['id']);
      $req2 = displayPlaceDeny($_SESSION['id']);
    ?>

    <div class="row text-middle">
        <div class="col-xs-12 col-md-5 text-middle">
           <div class="user-block">
            <h3><u>Historique de vos places</u></h3>
               <table class="text-middle">
                <th class="text-middle col-xs-4 col-md-4">Numéro de place</th>
                <th class="text-middle col-xs-4 col-md-4">Date</th>
                <th class="text-middle col-xs-4 col-md-4">Etat</th>
              
                <?php
                  while($rep1 = $req1->fetch())
                  {
                ?>
                <tr>
                <td class="col-xs-4 col-md-4"><?php echo $rep1['nom_p']; ?></td>
                <td class="col-xs-4 col-md-4"><?php echo $rep1['date_deb']; ?></td>
                <td class="col-xs-4 col-md-4 validee"><b>Validée</b></td>
                </tr>
                <?php
                  }
                ?>
              
              
                <?php
                  while($rep2 = $req2->fetch())
                  {
                ?>
                <tr>
                <td class="col-xs-4 col-md-4"><?php echo $rep2['nom_p']; ?></td>
                <td class="col-xs-4 col-md-4"><?php echo $rep2['date_deb']; ?></td>
                <td class="col-xs-4 col-md-4 refusee"><b>Refusée</b></td>
                </tr>
                <?php
                  }
                ?>
              
            </table>
        </div>
       </div>
<!-- ---------------- Informations du compte ------------ -->

           <div class="col-xs-12 col-md-5 text-middle">
               <div class="user-block">
            <h3><u>Vos informations</u></h3>
            <b>Votre email :</b> <?=$info['email'];?><br>
            <b>Votre nom/prénom :</b> <?=$info['nom']." ".$info['prenom'];?><br>
            <u><b>Changer de mot de passe</b></u>
            <br><br>
        </div>
    </div>
    </div>

