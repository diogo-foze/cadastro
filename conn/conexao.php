<?php

/* 
 * difine a configuração 
 * da comunicação com o servidor.
 */
define('FOZE_HOST','localhost');
define('FOZE_USER', 'root');
define('FOZE_PASSWORD','');
define('FOZE_DB_NAME','mensagem');
/*
 * fazer a conecção.
 */
$conn = new mysqli(FOZE_HOST, FOZE_USER, FOZE_PASSWORD, FOZE_DB_NAME);
if($conn->connect_errno){
    echo 'Erro na conexão: '.$conn->connect_errno;
}else{
   // echo 'Conetado com Sucesso';
}

