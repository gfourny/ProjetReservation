<?php
use Luracast\Restler\iAuthenticate;

class SimpleAuth implements iAuthenticate
{
    const KEY_CAMPING = 'LaCerisai@44.Collaborateur';

    function __isAllowed()
    {
        return isset($_GET['keyCamping']) && $_GET['keyCamping'] == SimpleAuth::KEY_CAMPING ? TRUE : FALSE;
    }

    public function __getWWWAuthenticateString()
    {
        return 'Query name="keyCamping"';
    }

    function key()
    {
        return SimpleAuth::KEY_CAMPING;
    }
}