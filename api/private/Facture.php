<?php

use Luracast\Restler\RestException;

require_once("localData.php");

class Facture {

    private $bd;

    function __construct()
	{
		$this->bd = new PDO(DNS, USER, MDP);
    }
    
    // Edition d'une facture
    /**
	 * @access protected
	 */
    function post($request_data = NULL){

    }

    // Modification d'une facture
    /**
	 * @access protected
	 */
    function patch($id, $request_data = NULL){

    }
}
?>