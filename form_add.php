<?php
session_start();
require 'init.php';
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <title>Foze - Cadastrar Mensagens</title>
    </head>
    <body>
        <div class="container theme-showcase" role="main"> 
            <div class="page-header">
                <h1>Cadastrar Mensagem</h1>
            </div>
            <?php
            if (!empty($_SESSION['erro'])) {
                
                ?>
                <div class="alert alert-danger alert-dismissable" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <?php 
                    echo $_SESSION['erro'];
                    unset($_SESSION['erro']);
                    ?>
                </div>
            <?php }
            ?>
            <form class="form-horizontal" action="add_msg_contato.php" method="POST">

                <div class="form-group">
                    <label for="nome" class="col-sm-2 control-label" >Nome: </label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="nome" id="nome" placeholder="Inserir nome completo"> 
                    </div>
                </div>

                <div class="form-group">
                    <label for="email" class="col-sm-2 control-label">Email: </label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" name="email" id="email" placeholder="Seu melhor e-mail">
                    </div>
                </div>

                <div class="form-group">
                    <label for="assunto" class="col-sm-2 control-label">Assunto: </label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="assunto" id="assunto" placeholder="Assunto da mensagem">
                    </div>
                </div>

                <div class="form-group">
                    <label for="mensagem" class="col-sm-2 control-label">Mensagem: </label>
                    <div class="col-sm-10">
                        <textarea name="mensagem" class="form-control" id="mensagem" rows="10" cols="50"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-12">
                        <!--a href="index.php"><input type="button" class="btn btn-warning" value="Cancelar"></a-->
                        
                        <input type="submit" class="btn btn-success" value="Cadastrar">
                    </div>
                </div>
            </form>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>