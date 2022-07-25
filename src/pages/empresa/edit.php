<?php

require_once '../../../config.php';
require_once '../../actions/empresa.php';
require_once '../partials/header.php';

if (isset($_POST["id"], $_POST["razaoSocial"]) &&
    isset($_POST["cnpj"]) &&
    isset($_POST["telefone"]) &&
    isset($_POST["email"]) && 
    isset($_POST["endereco"])

) {
     updateEmpresaAction(
        $conn,
        $_POST["id"],
        $_POST["razaoSocial"],
        $_POST["cnpj"],
        $_POST["telefone"],
        $_POST["email"],
        $_POST["endereco"]
    );
}

$empresa = findEmpresaAction(
    $conn, 
    $_GET['id']);

?>
<div class="container">
	<div class="row">
        <a href="../../../index.php"><h1>Empresa - Editar</h1></a>
        <a class="btn btn-success text-white" href="../../../index.php">Anterior</a>
    </div>
    <div class="row flex-center">
        <div class="form-div">
                <form class="form" action="../../pages/empresa/edit.php" method="POST">
                <input type="hidden" name="id" value="<?=$empresa['id']?>" required/>
                <label>Razão Social</label>
                <input type="text" name="razaoSocial" value="<?=htmlspecialchars($empresa['razaoSocial'])?>" required/>
                <label>CNPJ</label>
                <input type="text" name="cnpj" value="<?=htmlspecialchars($empresa['cnpj'])?>" required/>
                <label>Telefone</label>
                <input type="text" name="telefone" value="<?=htmlspecialchars($empresa['telefone'])?>" required/>
                <label>E-mail</label>
                <input type="email" name="email" value="<?=htmlspecialchars($empresa['email'])?>" required/>
                <label>Endereço</label>
                <input type="text" name="endereco" value="<?=htmlspecialchars($empresa['endereco'])?>" required/>

                <button class="btn btn-success text-white" type="submit">Salvar</button>
            </form>
        </div>
    </div>
</div>
<?php require_once '../partials/footer.php'; ?>

