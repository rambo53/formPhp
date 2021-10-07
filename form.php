<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        
        <style>
            fieldset{
                width: 20vw;
                margin-bottom: 5vh;
            }
            label,select{
                width: 10vw;
                display: inline-block;
            }
            .exo5{
                display: flex;
                justify-content:space-between;
            }
            
        </style>
        
    </head>
    <body>
        
        <!-- EXO 1 et 2 --> 
        
        <form action="valideForm.php" method="POST">
            <fieldset>
                <legend>Adresse client</legend>  
             
                <label for="nom">Nom : </label><input type="text" name="nom" id="nom"><br>
                <label for="prenom">Prenom : </label><input type="text" name="prenom" id="prenom"><br>
                <label for="adresse">Adresse : </label><input type="text" name="adresse" id="adresse"><br>
                <label for="cp">CP : </label><input type="number" name="cp" id="cp"><br>
                <label for="ville">Ville : </label><input type="text" name="ville" id="ville"><br><br>
                
                <input type="submit" name="envoi" value="envoyer formulaire"><br>
                
                </fieldset>
        </form>
        
        <!-- EXO 3 --> 
        
        <form action="valideFormMail.php" method="POST">
            <fieldset>
                <legend>S'abonner</legend>  
             
                <label for="mail">E-Mail : </label><input type="email" name="mail" id="mail"><br>   
                
                <input type="submit" name="abonne" value="valider"><br>
                
                </fieldset>
        </form>
        
        <!-- EXO 4 --> 
        
        <form action="index.php" method="POST">
            <fieldset>
                <legend>Calcul des taxes</legend>  
             
                <label for="prixht">Prix HT : </label><input type="number" name="prixht" 
                
                    <?php
                        if (isset($_POST['prixht'])) {
                            echo ' value="' . $_POST['prixht'] . '"';
                        }
                     ?>
                                                             
                    id="prixht">€<br>
                
                <label for="txtva">Taux de TVA : </label><input type="number"  step="0.01" name="txtva"
                                                                
                    <?php
                        if (isset($_POST['txtva'])) {
                            echo ' value="' . $_POST['txtva'] . '"';
                        }
                     ?>
                    id="txtva">%<br> 
                
                <input type="submit" name="calculer" value="calculer"><br>
                
                <?php
                    if(isset($_POST['calculer'])){
    
                        $prixht = filter_input(INPUT_POST, 'prixht', FILTER_VALIDATE_FLOAT);
                            
                        $txtva = filter_input(INPUT_POST, 'txtva', FILTER_VALIDATE_FLOAT);
                           

                        $montantTtc= str_replace('.' ,' € ' ,$prixht*(1+($txtva/100)));
                        $montantTva=str_replace('.' ,' € ' ,$prixht*(1+($txtva/100))-$prixht);
                        
                        echo'<label for="montanttva">Montant de la TVA : </label><input type="text" value="'.$montantTva.'"><br> 
                            <label for="montantttc">Montant TTC : </label><input type="text" value="'.$montantTtc.'"><br>';

                    }
        
                ?>
                
                </fieldset>
        </form>
        
        <!-- EXO 5 --> 
        
        
        <fieldset class="exo5">
                <legend>Vous souhaitez...</legend>  
                    <form action="acheter.php" method="GET">
                        <input type="submit" name="acheter" value="Acheter">
                    </form>
                    <form action="vendre.php" method="GET">
                        <input type="submit" name="vendre" value="Vendre">
                    </form>
                    <form action="louer.php" method="GET">
                        <input type="submit" name="louer" value="Louer">
                    </form>
            </fieldset>
       
        <!-- EXO 6 --> 
        
        <form action="index.php" method="GET">
            <fieldset>
                <legend>Choix du mois</legend>  
                
                <label for="mois">Mois : </label>
                    <select name="mois" id="mois">
                        <?php

                            $tabMois=[1=>'Janvier',
                                        2=>'Février',
                                        3=>'Mars',
                                        4=>'Avril',
                                        5=>'Mai',
                                        6=>'Juin',
                                        7=>'Juillet',
                                        8=>'Aout',
                                        9=>'Septembre',
                                        10=>'Octobre',
                                        11=>'Novembre',
                                        12=>'Decembre'];

                                    foreach ($tabMois as $key => $value) {
                                        echo '<option value="'.$key.'">'.$value.'</option>';
                                    }
                        ?>             
                    </select><br> 
                
                <label for="mail">Année : </label><input type="number" min="1970" max="2037" name="annee" id="annee"><br>
                
                <input type="submit" name="abonne" value="valider"><br>
                
                </fieldset>
        </form>   
                    
            <?php
                echo '<table><tr><th colspan="7">';
                switch ($_GET['mois']) {
                   case 1: echo 'Janvier';
                       break;
                   case 2: echo 'Février';
                       break;
                   case 3: echo 'Mars';
                       break;
                   case 4: echo 'Avril';
                       break;
                   case 5: echo 'Mai';
                       break;
                   case 6: echo 'Juin';
                       break;
                   case 7: echo 'Juillet';
                       break;
                   case 8: echo 'Août';
                       break;
                   case 9: echo 'Septembre';
                       break;
                   case 10: echo 'Octobre';
                       break;
                   case 11: echo 'Novembre';
                       break;
                   case 12: echo 'Décembre';
                       break;
                }
                echo ' ' . $_GET['annee']. '</th></tr><tr><th>L</th><th>M</th><th>M</th><th>J</th><th>V</th><th>S</th><th>D</th></tr><tr>';
                $donnees = mktime(0, 0, 0, $_GET['mois'], 1);
                for ($i = 1; $i <date('N', $donnees); $i++) {
                   echo '<td></td>';
                }
                for ($i = 1; $i <= date('t'); $i++) {
                   echo '<td>' . $i . '</td>';
                   if (date('N', $donnees) == 7) {
                       echo '</tr><tr>';
                   }
                   $donnees += 60 * 60 * 24;
                }
                for ($i = date('N', $donnees); $i <= 7; $i++) {
                   echo '<td></td>';
                }
                echo '</tr></table>';
            ?>
    </body>
</html>
