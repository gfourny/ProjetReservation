<?php

require_once("cle.php");


function creerFacture($id_reservation = NULL)
{
    $ch = curl_init();
    $apikey = $cle;
    $httpheader = ['keyCamping: ' . $apikey];
    $httpheader[] = "Content-Type:application/json";
    $ressource =
    "{ 
        'id_reservation': $id_reservation
    }";
    curl_setopt($ch, CURLOPT_URL, "http://localhost:8080/ProjetReservation/api/private/index.php/Facture");
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $ressource);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $httpheader);
    $reponse = curl_exec($ch);
    curl_close($ch);
    return $reponse;
}

function modifierFacture($id_facture = NULL, $id_reservation = NULL)
{
    $ch = curl_init();
    $apikey = $cle;
    $httpheader = ['keyCamping: ' . $apikey];
    $httpheader[] = "Content-Type:application/json";
    $ressource =
    "{ 
        'id_reservation': $id_reservation
    }";
    curl_setopt($ch, CURLOPT_URL, "http://localhost:8080/ProjetReservation/api/private/index.php/Facture/" . $id_facture);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PATCH');
    curl_setopt($ch, CURLOPT_POSTFIELDS, $ressource);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $httpheader);
    $reponse = curl_exec($ch);
    curl_close($ch);
    return $reponse;
}

function editerFacture($id_facture = NULL)
{
    $ch = curl_init();
    $apikey = $cle;
    $httpheader = ['keyCamping: ' . $apikey];
    if ($id_facture != NULL) {
        curl_setopt($ch, CURLOPT_URL, "http://localhost:8080/ProjetReservation/api/private/index.php/Facture/" . $id_facture);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $httpheader);
        $reponse = curl_exec($ch);
        curl_close($ch);
        return $reponse;
    } else {
        return NULL;
    }
}

function ajouterReservation($date_arrivee = NULL, $date_fin = NULL, $nb_personne = NULL, $id_emplacement = NULL, $id_prestation = NULL, $nom_personne = NULL)
{
    $ch = curl_init();
    $apikey = $cle;
    $httpheader = ['keyCamping: ' . $apikey];
    $httpheader[] = "Content-Type:application/json";
    $ressource =
    "{ 
        'date_arrivee': $date_arrivee,
        'date_fin': $date_fin,
        'nb_personne': $nb_personne,
        'id_emplacement': $id_emplacement,
        'id_prestation': $id_prestation,
        'non_personne': $nom_personne
    }";

    curl_setopt($ch, CURLOPT_URL, "http://localhost:8080/ProjetReservation/api/private/index.php/Reservation");
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $ressource);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $httpheader);
    $reponse = curl_exec($ch);
    curl_close($ch);
    return $reponse;
}

function modifierReservation($date_arrivee = NULL, $date_fin = NULL, $nb_personne = NULL, $id_emplacement = NULL, $id_prestation = NULL, $nom_personne = NULL, $id_reservation = NULL)
{
    $ch = curl_init();
    $apikey = $cle;
    $httpheader = ['keyCamping: ' . $apikey];
    $httpheader[] = "Content-Type:application/json";
    $ressource =
    "{ 
        'date_arrivee': $date_arrivee,
        'date_fin': $date_fin,
        'nb_personne': $nb_personne,
        'id_emplacement': $id_emplacement,
        'id_prestation': $id_prestation,
        'non_personne': $nom_personne
    }";

    curl_setopt($ch, CURLOPT_URL, "http://localhost:8080/ProjetReservation/api/private/index.php/Reservation/" . $id_reservation);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PATCH');
    curl_setopt($ch, CURLOPT_POSTFIELDS, $ressource);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $httpheader);
    $reponse = curl_exec($ch);
    curl_close($ch);
    return $reponse;
}

function supprimerReservation($id_reservation = NULL)
{
    $ch = curl_init();
    $apikey = $cle;
    $httpheader = ['keyCamping: ' . $apikey];
    curl_setopt($ch, CURLOPT_URL, "http://localhost:8080/ProjetReservation/api/private/index.php/Reservation/" . $id_reservation);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
    curl_setopt($ch, CURLOPT_HTTPHEADER, $httpheader);
    $reponse = curl_exec($ch);
    curl_close($ch);
    return $reponse;
}

function obtenirReservation($id_reservation = NULL)
{
    $ch = curl_init();
    $apikey = $cle;
    $httpheader = ['keyCamping: ' . $apikey];
    if ($id_reservation != NULL) {
        curl_setopt($ch, CURLOPT_URL, "http://localhost:8080/ProjetReservation/api/private/index.php/Reservation/" . $id_reservation);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $httpheader);
        $reponse = curl_exec($ch);
        curl_close($ch);
        return $reponse;
    } else {
        curl_setopt($ch, CURLOPT_URL, "http://localhost:8080/ProjetReservation/api/private/index.php/Reservation/");
        curl_setopt($ch, CURLOPT_HTTPHEADER, $httpheader);
        $reponse = curl_exec($ch);
        curl_close($ch);
        return $reponse;
    }
}

function obtenirEmplacement($id_emplacement = NULL)
{
    $ch = curl_init();
    $apikey = $cle;
    $httpheader = ['keyCamping: ' . $apikey];
    if ($id_emplacement != NULL) {
        curl_setopt($ch, CURLOPT_URL, "http://localhost:8080/ProjetReservation/api/private/index.php/Reservation/" . $id_emplacement);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $httpheader);
        $reponse = curl_exec($ch);
        curl_close($ch);
        return $reponse;
    } else {
        curl_setopt($ch, CURLOPT_URL, "http://localhost:8080/ProjetReservation/api/private/index.php/Reservation/");
        curl_setopt($ch, CURLOPT_HTTPHEADER, $httpheader);
        $reponse = curl_exec($ch);
        curl_close($ch);
        return $reponse;
    }
}
