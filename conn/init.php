<?php
  
// constantes com as credenciais de acesso ao banco MySQL
define('FOZE_DB_HOST', 'localhost');
define('FOZE_DB_USER', 'root');
define('FOZE_DB_PASS', '');
define('FOZE_DB_NAME', 'cadastro');

// habilita todas as exibições de erros
ini_set('display_errors', true);
error_reporting(E_ALL);
 
date_default_timezone_set('America/Sao_Paulo');

// inclui o arquivo de funçõees
require_once 'functions/functions.php';