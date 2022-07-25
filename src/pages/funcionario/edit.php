<?php

require_once '../../../config.php';
require_once '../../actions/funcionario.php';
require_once '../partials/header.php';

if (isset($_POST["id"], $_POST["nomeCompleto"]) &&
    isset($_POST["empresaId"]) &&
    isset($_POST["email"]) && 
    isset($_POST["dataNascimento"])
) {
     updateFuncionarioAction(
        $conn,
        $_POST['id'],
        $_POST["nomeCompleto"],
        $_POST["empresaId"],
        $_POST["email"],
        $_POST["dataNascimento"]
        
    );
}

$funcionario = findFuncionarioAction(
    $conn, 
    $_GET['id'] ?? $_POST['id']
);

?>
<div class="container">
	<div class="row">
        <a href="../../../index.php"><h1>Funcionário - Editar</h1></a>
        <a class="btn btn-success text-white" href="../../../index.php">Anterior</a>
    </div>
    <div class="row flex-center">
        <div class="form-div">
                <form class="form" action="../../pages/funcionario/edit.php" method="POST">
                <input type="hidden" name="id" value="<?=$funcionario['id']?>" required/>
                <label>Nome Completo</label>
                <input type="text" name="nomeCompleto" value="<?=htmlspecialchars($funcionario['nomeCompleto'])?>" required/>
                <label>Empresa</label>
                <?= montaSelect($conn, $funcionario["empresaId"]); ?>
                <label>E-mail</label>
                <input type="email" name="email" value="<?=htmlspecialchars($funcionario['email'])?>" required/>
                <label>Data de Nascimento</label>
                <input type="text" name="dataNascimento" value="<?=htmlspecialchars($funcionario['dataNascimento'])?>" required/>
                
                <button class="btn btn-success text-white" type="submit">Salvar</button>
            </form>
        </div>
    </div>
</div>
<?php require_once '../partials/footer.php'; ?>

