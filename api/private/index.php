<?php
require_once '../../vendor/restler.php';
use Luracast\Restler\Defaults;
Defaults::$smartAutoRouting = false;
$r = new Restler();
$r->addAPIClass('Reservation');
$r->addAPIClass('Facture');
$r->addAuthenticationClass('SimpleAuth');
$r->handle();
?>