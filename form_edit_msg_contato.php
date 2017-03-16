<?php
session_start();
require 'init.php';
$titulo = 'Foze - Editar Mensagem';
$h1 = 'Editar Mensagem';
//Recuperar o id da URL
$id = isset($_GET['id']) ? (int) $_GET['id'] : null;

// Valida a varialvel da URL
if (empty($id)) {
    echo "ID para alteração não definido";
    exit;
}

$PDO = db_connect();
$sql_msg_contato = "SELECT id, nome, email, assunto, mensagem FROM mensagens_contatos WHERE id='$id'";
$result_msg_contato = $PDO->prepare($sql_msg_contato);
$result_msg_contato->bindParam(':id', $id, PDO::PARAM_INT);

$result_msg_contato->execute();

$resultado_msg_contato = $result_msg_contato->fetch(PDO::FETCH_ASSOC);
if (!is_array($resultado_msg_contato)) {
    echo 'Nenhum contato encontrado';
    exit;
}
require 'head.php';
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
<form class="form-horizontal" action="editar_msg_contato.php" method = "POST">

    <div class="form-group">
        <label for="nome" class="col-sm-2 control-label">Nome: </label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="nome" id="nome" value="<?php echo $resultado_msg_contato['nome']; ?>">
        </div>
    </div>

    <div class="form-group">
        <label for="email" class="col-sm-2 control-label">Email: </label>
        <div class="col-sm-10">
            <input type="email" class="form-control" name="email" id="email" value="<?php echo $resultado_msg_contato['email']; ?>">
        </div>
    </div>

    <div class="form-group">
        <label for="assunto" class="col-sm-2 control-label">Assunto: </label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="assunto" id="assunto" value="<?php echo $resultado_msg_contato['assunto']; ?>">
        </div>
    </div>

    <div class="form-group">
        <label for="mensagem" class="col-sm-2 control-label">Mensagem: </label>
        <div class="col-sm-10">
            <textarea name="mensagem" class="form-control" id="mensagem" rows="10" cols = "50"><?php echo $resultado_msg_contato['mensagem']; ?></textarea>
        </div>
    </div>

    <!--div class="checkbox">
        <label>
            <input type="checkbox"> Retornar me
        </label>
    </div-->
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-12">
            <a href="index.php"><input type="button" class="btn btn-warning" value="Cancelar"></a>

            <input type="hidden" name="id" value="<?php echo $resultado_msg_contato['id']; ?>">
            <input type="submit" class="btn btn-danger" value="Alterar">
        </div>             
    </div>
</form>
<?php
require 'footer.php';
?>