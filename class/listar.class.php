<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include 'conn/conexao.php';
$result_mensagens_contatos ="SELECT id, nome, email FROM mensagens_contatos";
$resultado_msg_contatos = $conn->query($result_mensagens_contatos);

if($resultado_msg_contatos->num_rows > 0){
    //Imprimir os dados da consulta no DB
    while($rows = $resultado_msg_contatos->fetch_assoc()){
        echo "ID: ".$rows['id']."<br>" ;
        echo "Nome: ".$rows['nome']."<br>";
        echo "E-mail: ".$rows['email']."<hr>";
    }
}
$conn->close();
