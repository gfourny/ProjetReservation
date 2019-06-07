<?php

use Luracast\Restler\RestException;

require_once("../database/localData.php");

class Facture {

    private $bd;
    static $CHAMPS = array('id_reservation');

    function __construct()
	{
		$this->bd = new PDO(DNS, USER, MDP);
    }

    function get($id){

        $id = htmlentities($id);
        // On vérifie si il y a un id d'emplacmement passé en paramètre
        if ($id != NULL) {

            //Préparation de la requête
            $req = "select * from Facture where id_facture=?";
            $prep = $this->bd->prepare($req);
            $prep->bindParam(1, $id);
            $prep->execute();

            // Si aucune facture n'est donnée avec un id passé en paramètre
            if (empty($facture = $prep->fetchObject()) && $id != NULL) {
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
            $facture->id_facture = intval($facture->id_facture);
            $retour = $facture;
        // Si aucun id n'est passé en paramètre, retour de tous les emplacement disponnible
        } else {
            $req = "select * from Facture";
            $resultat = $this->bd->query($req);
            $facture = new Facture();
            while ($facture = $resultat->fetchObject()) {
                $facture->id_facture = intval($facture->id_facture);
                $retour[] = $facture;
            }
        }
        return $retour;
    }
    
    // Edition d'une facture
    /**
	 * @access protected
	 */
    function post($request_data = NULL){

        $facture = $this->_validation($request_data);
		$req = "INSERT INTO Facture (id_reservation) VALUES (?)";
		$prep = $this->bd->prepare($req);
		$id_reservation = $facture["id_reservation"];
		$prep->bindParam(1, $id_reservation);
        $prep->execute();
		return $this->get($this->bd->lastInsertId());
    }

    // Modification d'une facture
    /**
	 * @access protected
	 */
    function patch($id, $request_data = NULL){

        $id = htmlentities($id);
        $facture = $this->_rempli($id, $request_data);
		$req = "update Facture set id_reservation=? where id_facture=?";
		$id_reservation = $facture["id_reservation"];
		$id_facture = $facture["id_facture"];
		$prep = $this->bd->prepare($req);
		$prep->bindParam(1, $id_reservation);
		$prep->bindParam(2, $id);
		$prep->execute();
		return $this->get($id);
    }

    private function _validation($data)
	{
		//  $facture = array();
		foreach (Facture::$CHAMPS as $champ) {
			//on commence par valider les données reçues
			if (!isset($data[$champ])) {
				throw new RestException(400, "$champ field missing");
			}
		}
		// on construit un $tabfacture par rapport aux données reçues
		foreach (facture::$CHAMPS as $champ) {
            echo $champ;
			$tabFacture[$champ] = htmlentities($data[$champ]);
		}
		return $tabFacture;
    }
    

	private function _rempli($id, $data)
	{
		$facture = $this->get($id);
		// on transforme l'objet reservation en tableau
		$tabFacture = get_object_vars($facture);
		//  $reservation = array();
		foreach (facture::$CHAMPS as $champ) {
			//on commence rempli le reste du tableau par les champs reçus
			if (isset($data[$champ])) {
				$tabFacture[$champ] = htmlentities($data[$champ]);
			}
		}
		return $tabFacture;
	}
}
?>