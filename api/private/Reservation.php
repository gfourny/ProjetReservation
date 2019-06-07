<?php

use Luracast\Restler\RestException;

require_once("../database/localData.php");

class Reservation {

    private $bd;
    static $CHAMPS = array('date_arrivee', 'date_fin', 'nb_personne', 'id_emplacement', 'id_prestation');

    function __construct()
	{
		$this->bd = new PDO(DNS, USER, MDP);
    }

    // Obtention des réservations
    /**
     * @access protected
     */
    function get($id = NULL){

        $id = htmlentities($id);
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
        return $retour;
    }
    
    // Reservation d'un emplacement
    /**
	 * @access protected
	 */
    function post($request_data = NULL){

        $reservation = $this->_validation($request_data);
		$req = "INSERT INTO Reservation (date_arrivee, date_fin, nb_personne, id_emplacement, id_prestation) VALUES (?,?,?,?,?)";
		$prep = $this->bd->prepare($req);
		$date_arrivee = $reservation["date_arrivee"];
		$date_fin = $reservation["date_fin"];
        $nb_personne = $reservation["nb_personne"];
        $id_emplacement = $reservation["id_emplacement"];
		$id_prestation = $reservation["id_prestation"];
		$prep->bindParam(1, $date_arrivee);
		$prep->bindParam(2, $date_fin);
        $prep->bindParam(3, $nb_personne);
        $prep->bindParam(4, $id_emplacement);
		$prep->bindParam(5, $id_prestation);
        $prep->execute();
		return $this->get($this->bd->lastInsertId());
    }

    // Modification d'une réservation
    /**
	 * @access protected
	 */
    function patch($id, $request_data = NULL){

        $id = htmlentities($id);
        $reservation = $this->_rempli($id, $request_data);
		$req = "update Reservation set date_arrivee=?, date_fin=?, nb_personne=?, id_emplacement=?, id_prestation=? where id_reservation=?";
		$date_arrivee = $reservation["date_arrivee"];
		$date_fin = $reservation["date_fin"];
        $nb_personne = $reservation["nb_personne"];
        $id_emplacement = $reservation["id_emplacement"];
		$id_prestation = $reservation["id_prestation"];
		$prep = $this->bd->prepare($req);
		$prep->bindParam(1, $date_arrivee);
		$prep->bindParam(2, $date_fin);
        $prep->bindParam(3, $nb_personne);
        $prep->bindParam(4, $id_emplacement);
		$prep->bindParam(5, $id_prestation);
		$prep->bindParam(6, $id);
		$prep->execute();
		return $this->get($id);
    }

    // Suppression d'une réservation
    /**
	 * @access protected
	 */
    function delete($id){

        $id = htmlentities($id);
        //nous verifions avant si l'individu existe
		$retour = $this->get($id);
		if (!$retour) {
			return FALSE;
		} else {
			try {
				$req = "delete from Reservation where id_reservation=?;";
				$prep = $this->bd->prepare($req);
				$prep->bindParam(1, $id);
				//on exécute la requête sql
				$prep->execute();
			} catch (PDOException $e) {
				return FALSE;
				die();
			}
		}
		return $retour;
    }


    private function _validation($data)
	{
		//  $reservation = array();
		foreach (Reservation::$CHAMPS as $champ) {
			//on commence par valider les données reçues
			if (!isset($data[$champ])) {
				throw new RestException(400, "$champ field missing");
			}
		}
		// on construit un $tabReservation par rapport aux données reçues
		foreach (reservation::$CHAMPS as $champ) {
            echo $champ;
			$tabReservation[$champ] = htmlentities($data[$champ]);
		}
		return $tabReservation;
    }
    

	private function _rempli($id, $data)
	{
		$reservation = $this->get($id);
		// on transforme l'objet reservation en tableau
		$tabReservation = get_object_vars($reservation);
		//  $reservation = array();
		foreach (reservation::$CHAMPS as $champ) {
			//on commence rempli le reste du tableau par les champs reçus
			if (isset($data[$champ])) {
				$tabReservation[$champ] = htmlentities($data[$champ]);
			}
		}
		return $tabReservation;
	}
}
?>