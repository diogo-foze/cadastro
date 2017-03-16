<?php
session_start();
require_once 'conn/init.php';
$titulo = 'Foze - Mensagens de Contatos';
$h1 = 'Listar Mensagens de Contato';
// abre a conexão
$PDO = db_connect();

// SQL para selecionar os registros
$sql_msg = "SELECT id, nome, email, assunto FROM mensagens_contatos ORDER BY id ASC";

// seleciona os registros
$resultado_msg = $PDO->prepare($sql_msg);
$resultado_msg->execute();

require 'commun/head.php';
if (!empty($_SESSION['sucesso'])) {
    ?>
    <div class="alert alert-success alert-dismissable" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <?php
        echo $_SESSION['sucesso'];
        unset($_SESSION['sucesso']);
        ?>

    </div>
<?php }
?>
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
<div class="right">
    <p><a href="form_add.php"><button type="button" class="btn btn-sm btn-success">Cadastrar</button></a></p>
</div>

<div class="row">
    <div class="col-md-12">
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>E-mail</th>
                    <th>Assunto</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php
                //Para obter os dados pode ser utilizado um while percorrendo assim cada linha retornada do banco de dados:
                while ($msg_contatos = $resultado_msg->fetch(PDO::FETCH_ASSOC)):
                    ?>
                    <tr>
                        <td><?php echo $msg_contatos['id']; ?></td>
                        <td><?php echo $msg_contatos['nome']; ?></td>
                        <td><?php echo $msg_contatos['email']; ?></td>
                        <td><?php echo $msg_contatos['assunto']; ?></td>
                        <td>
                            <a href="form_view_msg_contato.php?id=<?php echo $msg_contatos['id']; ?>">
                                <span class="glyphicon glyphicon-eye-open text-primary" aria-hidden="true"></span>
                            </a>
                            <a href="form_edit_msg_contato.php?id=<?php echo $msg_contatos['id']; ?>">
                                <span class="glyphicon glyphicon-pencil text-warning" aria-hidden="true"></span>
                            </a>
                            <a href="apagar.php?id=<?php echo $msg_contatos['id']; ?>">
                                <span class="glyphicon glyphicon-remove text-danger" aria-hidden="true"></span>
                            </a>
                        </td>

                    </tr>    
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</div>

<?php
require 'commun/footer.php';
?>
