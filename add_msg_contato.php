<?php

session_start();
require_once 'conn/init.php';

// pega os dados do formuário.
$nome = isset($_POST['nome']) ? $_POST['nome'] : null;
$email = isset($_POST['email']) ? $_POST['email'] : null;
$assunto = isset($_POST['assunto']) ? $_POST['assunto'] : null;
$mensagem = isset($_POST['mensagem']) ? $_POST['mensagem'] : null;

// validação para evitar dados vazios.
if (empty($nome) || empty($email) || empty($assunto) || empty($mensagem)) {
    // echo "<a href='form_add.php'><button type='button' class='btn btn-warning col-xs-12 box cursos'>Volte e preencha todos os campos.</button></a>";
    $_SESSION['erro'] = "Não Cadastrado <strong>Preencha os Campos!</strong>.";
    header('Location: form_add.php');
    exit;
}

// insere no banco
$PDO = db_connect();
$sql_msg_contatos = "INSERT INTO mensagens_contatos(nome, email, assunto, mensagem) VALUES(:nome, :email, :assunto, :mensagem)";
$insert_msg_contato = $PDO->prepare($sql_msg_contatos);
$insert_msg_contato->bindParam(':nome', $nome);
$insert_msg_contato->bindParam(':email', $email);
$insert_msg_contato->bindParam(':assunto', $assunto);
$insert_msg_contato->bindParam(':mensagem', $mensagem);

if ($insert_msg_contato->execute()) {
    $_SESSION['sucesso'] = "Mensagem <strong>Cadastrado</strong> com Sucesso!";
    header('Location: index.php');
} else {
    $_SESSION['erro'] = "Erro ao Cadastrar!";
    header('Location: form_add.php');
}