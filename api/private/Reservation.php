<?php

use Luracast\Restler\RestException;

require_once("../database/localData.php");

class Reservation {

    private $bd;

    function __construct()
	{
		$this->bd = new PDO(DNS, USER, MDP);
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