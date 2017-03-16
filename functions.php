<?php  
/**
 * Conecta com o MySQL usando PDO
 */
function db_connect()
{
    $PDO = new PDO('mysql:host=' . FOZE_DB_HOST . ';dbname=' . FOZE_DB_NAME . ';charset=utf8', FOZE_DB_USER, FOZE_DB_PASS);
  
    return $PDO;
}