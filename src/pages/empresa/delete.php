<?php

require_once '../../../config.php';
require_once '../../actions/empresa.php';
require_once '../partials/header.php';

if(isset($_POST['id']))
    deleteEmpresaAction($conn,
     $_POST['id']);

?>
<div class="container">
	<div class="row">
        <a href="../../../index.php"><h1>Empresa - Deletar</h1></a>
        <a class="btn btn-success text-white" href="../../../index.php">Anterior</a>
    </div>
    <div class="row flex-center">
        <div class="form-div">
            <form class="form" action="../../pages/empresa/delete.php" method="POST">
                <label>Você realmente deseja remover está empresa?</label>
                <input type="hidden" name="id" value="<?=$_GET['id']?>" required/>

                <button class="btn btn-success text-white" type="submit">Sim</button>
            </form>
        </div>
    </div>
</div>
<?php require_once '../partials/footer.php'; ?>


