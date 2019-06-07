<?php
// require __DIR__. "../api/private/Reservation.php";
require("../api/private/Reservation.php");

?>

<!-- Formulaire Reservation -->
<form method="post" action="reserver.php" name="formulaire">

    <p> Nom :

        <input name="nom" type="text">

    </p>

    <p> Nombre de personne :

        <input name="nbPers" type="text">

    </p>

    <p> Nombre de jours :

        <input name="dureeSejour" type="text">

    </p>

    <label for="start">Type d'emplacement :</label>
    <?php
    $emplacements = optenirEmplacement();
    echo build_list($emplacements);
    ?>

    <p>
        <label for="start">Start date:</label>
    <!-- <?php
    // $dateDuJour = date("Y-m-d");
    // $anneCourante = date("Y");
    // $valeurAnneMoinsUn = (int)$anneCourante-1;
    // $valeurAnnePlusUn = (int)$anneCourante+1;
    // $anneePreced = str_replace((string)$valeurAnneMoinsUn, $anneCourante, $valeurAnneMoinsUn."-01-01");
    // $anneeSuivante = str_replace((string)$valeurAnnePlusUn, $anneCourante, $valeurAnneMoinsUn."-12-31");
    // echo '<input type="date" id="start" name="trip-start" value="'.$dateDuJour.'"  min="'.$anneePreced.'" max="'.$anneeSuivante.'">'    
    ?> -->
        <input type="date" id="start" name="trip-start" value="2019-06-07"  min="2018-01-01" max="2020-12-31">
    </p>

    <p>
        <input value="valider" type="submit">
    </p>

</form>


<?php

// Function Section
function build_list($array)
{
    $list = '<ul>';
    foreach ($array as $key => $value) {
        foreach ($value as $key => $type) {
            if (is_array($type)) {
                $list .= build_list($type);
            } else {
                $list .= "<li>$type</li>";
            }
        }
    }

    $list .= '</ul>';
    return $list;
}
?>