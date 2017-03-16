<?php
session_start();
require_once 'init.php';

// pega os dados do formuário
$nome = isset($_POST['nome']) ? $_POST['nome'] : null;
$email = isset($_POST['email']) ? $_POST['email'] : null;
$assunto = isset($_POST['assunto']) ? $_POST['assunto'] : null;
$mensagem = isset($_POST['mensagem']) ? $_POST['mensagem'] : null;
$id = isset($_POST['id']) ? $_POST['id'] : null;

// validação para evitar dados vazios
if (empty($nome) || empty($email) || empty($assunto) || empty($mensagem)) {
    //echo "<a href='form_edit_msg_contato.php?id=" . $_POST['id'] . "'<button type='button' class='btn btn-warning col-xs-12 box cursos'>Volte e preencha todos os campos.</button></a>";
    $_SESSION['erro'] = "Preencha os Campos!";
    
    header('Location: form_edit_msg_contato.php?id='.$_POST[id]);
    exit;
}

// insere no banco
$PDO = db_connect();
$sql_msg_contatos = "UPDATE mensagens_contatos SET nome = :nome , email = :email , assunto = :assunto, mensagem = :mensagem WHERE id = :id";
$insert_msg_contato = $PDO->prepare($sql_msg_contatos);
$insert_msg_contato->bindParam(':nome', $nome);
$insert_msg_contato->bindParam(':email', $email);
$insert_msg_contato->bindParam(':assunto', $assunto);
$insert_msg_contato->bindParam(':mensagem', $mensagem);
$insert_msg_contato->bindParam(':id', $id, PDO::PARAM_INT);

if ($insert_msg_contato->execute()) {
    $_SESSION['sucesso'] = "Mensagem <strong>Editado</strong> com Sucesso!";
    header('Location: index.php');
} else {
    $_SESSION['erro'] = "Erro ao Editar a Mensagem!";
}