<?php

use Luracast\Restler\RestException;

require_once("../database/localData.php");

class Emplacement
{

    private $bd;

    function __construct()
    {
        $this->bd = new PDO(DNS, USER, MDP);
    }

    /**
     * Obtention d'un ou des emplacements disponibles dans le camping.
     */
    function get($id = NULL)
    {
        $id = htmlentities($id);
        // On vérifie si il y a un id d'emplacmement passé en paramètre
        if ($id != NULL) {

            //Préparation de la requête
            $req = "SELECT * FROM Emplacement WHERE id_emplacement 
            NOT IN (SELECT id_emplacement FROM Reservation) 
            AND id_emplacement=?";
            $prep = $this->bd->prepare($req);
            $prep->bindParam(1, $id);
            $prep->execute();

            // Si aucun emplacement n'est donné avec un id passé en paramètre
            if (empty($emplacement = $prep->fetchObject()) && $id != NULL) {
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
            $emplacement->id_emplacement = intval($emplacement->id_emplacement);
            $retour = $emplacement;
        // Si aucun id n'est passé en paramètre, retour de tous les emplacement disponnible
        } else {
            $req = "SELECT * FROM Emplacement
            WHERE id_emplacement 
            NOT IN (SELECT id_emplacement FROM Reservation) ORDER BY `id_emplacement` ASC";
            $resultat = $this->bd->query($req);
            $emplace = new Emplacement();
            while ($emplacement = $resultat->fetchObject()) {
                $emplacement->id_emplacement = intval($emplacement->id_emplacement);
                $retour[] = $emplacement;
            }
        }
        return $retour;
    }
}
