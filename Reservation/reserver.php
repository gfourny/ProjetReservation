<?php



function creerFacture($id_reservation = NULL){

    $cle="LaCerisai@44.Collaborateur";
    $ch = curl_init();
    $apikey =$cle;
    $httpheader = ['keyCamping: ' . $apikey];
    $httpheader[] = "Content-Type:application/json";
    if ($id_reservation != NULL){
        $ressource = $id_reservation;
        curl_setopt($ch, CURLOPT_URL, "http://localhost:8080/ProjetReservation/api/private/index.php/Facture");
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $ressource);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $httpheader);
        $reponse = curl_exec($ch);
        curl_close($ch);
        return $reponse;
    } else {
        return NULL;
    }
}

function modifierFacture($id_facture = NULL, $id_reservation = NULL){

    $cle="LaCerisai@44.Collaborateur";
    $ch = curl_init();
    $apikey =$cle;
    $httpheader = ['keyCamping: ' . $apikey];
    $httpheader[] = "Content-Type:application/json";
    if ($id_reservation != NULL){
        $ressource = $id_reservation;
        curl_setopt($ch, CURLOPT_URL, "http://localhost:8080/ProjetReservation/api/private/index.php/Facture/".$id_facture);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PATCH');
        curl_setopt($ch, CURLOPT_POSTFIELDS, $ressource);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $httpheader);
        $reponse = curl_exec($ch);
        curl_close($ch);
        return $reponse;
    } else {
        return NULL;
    }
}

function editerFacture($id_facture = NULL){

    $cle="LaCerisai@44.Collaborateur";
    $ch = curl_init();
    $apikey =$cle;
    $httpheader = ['keyCamping: ' . $apikey];
    $httpheader[] = "Content-Type:application/json";
    if ($id_facture != NULL){
        curl_setopt($ch, CURLOPT_URL, "http://localhost:8080/ProjetReservation/api/private/index.php/Facture/".$id_facture);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $httpheader);
        $reponse = curl_exec($ch);
        curl_close($ch);
        return $reponse;
    } else {
        return NULL;
    }
}


    

