<?php

$dbServer = 'combats';
$login='root';
$pass='';
if ( strstr($_SERVER['HTTP_HOST'], '51.178.86.117' ) ) {
    $dbServer = 'leonce';
    $login = 'leonce';
    $pass = 'z3nwbHdJy';
}

try
{
    $db = new PDO('mysql:host=localhost:3306;dbname='.$dbServer.';charset=utf8', $login, $pass);$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
}
catch( Exception $e )
{
    die( 'Erreur : ' . $e->getMessage());
}