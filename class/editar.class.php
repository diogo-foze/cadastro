<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include 'conn/conexao.php';
$id = 6;
$nome = "Douglas";

$result_msg_contato = "UPDATE mensagens_contatos SET nome = '$nome' WHERE id='$id'";
if ($conn->query($result_msg_contato) === TRUE) {
    echo 'Editado com sucesso!';
} else {
    echo 'Erro ao editar ' . $conn->erro;
}
$conn->close();