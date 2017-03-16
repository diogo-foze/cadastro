<?php

session_start();
require_once 'init.php';

//Recuperar o id da URL
$id = isset($_GET['id']) ? (int) $_GET['id'] : null;

// Valida a varialvel da URL
if (empty($id)) {
    echo "ID não informado";
    exit;
}

//Remover o contato do banco de dados
$PDO = db_connect();
$sql_msg_contatos = "DELETE FROM mensagens_contatos WHERE id = :id";
$delete_msg_contato = $PDO->prepare($sql_msg_contatos);
$delete_msg_contato->bindParam(':id', $id, PDO::PARAM_INT);

if ($delete_msg_contato->execute()) {
    $_SESSION['sucesso'] = "Mensagem de contato <strong>excluido</strong> com sucesso!";
    header('Location: index.php');
} else {
    $_SESSION['erro'] = "Menssagem <strong>não foi excluido</strong> com sucesso!";
    header('Location: index.php');
}