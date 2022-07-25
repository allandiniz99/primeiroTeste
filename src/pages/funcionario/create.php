<?php

require_once '../../../config.php';
require_once '../../actions/funcionario.php';
require_once '../partials/header.php';

if (
    isset($_POST["nomeCompleto"]) && 
    isset($_POST["EmpresaId"]) && 
    isset($_POST["email"]) && 
    isset($_POST["dataNascimento"])
){
    createFuncionarioAction(
        $conn, 
        $_POST["nomeCompleto"], 
        $_POST["EmpresaId"], 
        $_POST["email"], 
        $_POST["dataNascimento"]
    );
}

?>
<div class="container">
	<div class="row">
        <a href="../../../index.php"><h1>Funcionário - Criar</h1></a>
        <a class="btn btn-success text-white" href="../../../index.php">Anterior</a>
    </div>
    <div class="row flex-center">
        <div class="form-div">
            <form class="form" action="../../pages/funcionario/create.php" method="POST">
                <label>Nome Completo</label>
                <input type="text" name="nomeCompleto" required/><br/>
                <label>Empresa</label>
                <?= montaSelect($conn, 32) ?> <br>
                <label>E-mail</label>
                <input type="email" name="email" required/><br/>
                <label>Data de Nascimento</label>
                <input type="text" name="dataNascimento" required/><br/>
               
                <button class="btn btn-success text-white" type="submit">Salvar</button>
            </form>
        </div>
    </div>
</div>
<?php require_once '../partials/footer.php'; ?>

