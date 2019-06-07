<?php

use Luracast\Restler\RestException;

require_once("../database/localData.php");

class Reservation {

    private $bd;

    function __construct()
	{
		$this->bd = new PDO(DNS, USER, MDP);
    }

    // Obtention des réservations
    /**
     * @access protected
     */
    function get($id = NULL){

        if ($id != NULL){
            //Préparation de la requête
            $req = "select * from Reservation where id_reservation=?";
            $prep = $this->bd->prepare($req);
            $prep->bindParam(1, $id);
            $prep->execute();

            if (empty($reservation = $prep->fetchObject()) && $id != NULL){
                $langage = NULL;
                if (isset($_SERVER['HTTP_ACCEPT_LANGUAGE'])) {
                    $langage = strtolower(substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2));
                }
                switch ($langage) {
                    case "fr":
                        $message = "Cet ID n'existe pas";
                        break;
                    case "de":
                        $message = "Diese ID existiert nicht";
                        break;
                    case "es":
                        $message = "Este ID no existe";
                        break;
                    case "it":
                        $message = "Questo ID non esiste";
                        break;
                    default:
                        $message = "This ID doesn't exist";
                }
                throw new RestException(400, $message);
            }
            $reservation->id_reservation = intval($reservation->id_reservation);
            $retour = $reservation;
        } else {
            $req = "select * from Reservation";
            $resultat = $this->bd->query($req);
            $res = new Reservation();
            while ($reservation = $resultat->fetchObject()) {
                $reservation->id_reservation = intval($reservation->id_reservation);
                $retour[] = $reservation;
            }
        }
    }
    
    // Reservation d'un emplacement
    /**
	 * @access protected
	 */
    function post($request_data = NULL){

    }

    // Modification d'une réservation
    /**
	 * @access protected
	 */
    function patch($id, $request_data = NULL){

    }

    // Suppression d'une réservation
    /**
	 * @access protected
	 */
    function delete($id){

    }

}
?>