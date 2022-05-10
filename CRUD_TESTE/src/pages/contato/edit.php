<?php

require_once '../../../config.php';
require_once '../../actions/contato.php';
require_once '../partials/header.php';

if (isset($_POST["id"], $_POST["nome"]) && isset($_POST["sobrenome"]) && isset($_POST["telefone1"]) && isset($_POST["tipo_telefone1"]) && isset($_POST["telefone2"]) && isset($_POST["tipo_telefone2"]) && isset($_POST["email"]))
    updateContatoAction($conn, $_POST["id"], $_POST["nome"], $_POST["sobrenome"], $_POST["telefone1"], $_POST["tipo_telefone1"], $_POST["telefone2"], $_POST["tipo_telefone2"], $_POST["email"]);

$contato = findContatoAction($conn, $_GET['id']);

?>
<div class="container">
	<div class="row">
        <a href="../../../index.php"><h1>Editar Contato:</h1></a>
        <a class="btn btn-success text-white" href="../../../index.php">Próxima Página</a>
    </div>
    <div class="row flex-center">
        <div class="form-div">
            <form class="form" action="../../pages/contato/edit.php" method="POST">
                <label>Nome</label>
                <input type="text" name="nome" required/>
                <label>Sobrenome</label>
                <input type="text" name="sobrenome" required/>
                <label>Telefone 1</label>
                <input type="text" name="telefone1" required/>
                <label>Tipo Telefone 1</label>
                <input type="text" name="tipo_telefone1" required/>
                <label>Telefone 2</label>
                <input type="text" name="telefone2" required/>
                <label>Tipo Telefone 2</label>
                <input type="text" name="tipo_telefone2" required/>
                <label>E-mail</label>
                <input type="email" name="email" required/>

                <button class="btn btn-success text-white" type="submit">Salvar</button>
            </form>
        </div>
    </div>
</div>
<?php require_once '../partials/footer.php'; ?>

