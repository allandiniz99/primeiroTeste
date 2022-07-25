<?php

require_once '../../../config.php';
require_once '../../actions/empresa.php';
require_once '../partials/header.php';

if (
    isset($_POST["razaoSocial"]) && 
    isset($_POST["cnpj"]) && 
    isset($_POST["telefone"]) && 
    isset($_POST["email"]) && 
    isset($_POST["endereco"])
) {
    createEmpresaAction(
        $conn, 
        $_POST["razaoSocial"], 
        $_POST["cnpj"], 
        $_POST["telefone"], 
        $_POST["email"], 
        $_POST["endereco"]
    );
}

?>
<div class="container">
	<div class="row">
        <a href="../../../index.php"><h1>Empresa - Criar</h1></a>
        <a class="btn btn-success text-white" href="../../../index.php">Anterior</a>
    </div>
    <div class="row flex-center">
        <div class="form-div">
            <form class="form" action="../../pages/empresa/create.php" method="POST">
                <label>Razão Social</label>
                <input type="text" name="razaoSocial" required/><br/>
                <label>CNPJ</label>
                <input type="text" name="cnpj" required/><br/>
                <label>Telefone</label>
                <input type="text" name="telefone" required/><br/>
                <label>E-mail</label>
                <input type="email" name="email" required/><br/>
                <label>Endereço</label>
                <input type="text" name="endereco" required/><br/>
               
                <button class="btn btn-success text-white" type="submit">Salvar</button>
            </form>
        </div>
</div>
</div>
<?php require_once '../partials/footer.php'; ?>
