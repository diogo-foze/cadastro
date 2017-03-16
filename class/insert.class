<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include 'conn/conexao.php';
$nome = "Manuela";
$email = "manumaranata@hotmail.com";
$assunto = "Como comprar o computador";
$mensagem = "Como comprar o computador";

$result_msg_contatos = "INSERT INTO mensagens_contatos (nome, email, assunto, mensagem, created) VALUES('$nome','$email','$assunto','$mensagem', NOW())";
if($conn->query($result_msg_contatos) === TRUE){
    echo 'Inserido com Sucesso';
}else{
    echo 'Erro: '.$resul_msg_contatos. "<br>".$conn;
}
$conn->close();