<?php

require_once '../../../config.php';
require_once '../../../src/actions/funcionario.php';
require_once '../../../src/modules/messages.php';
require_once '../partials/header.php';

$funcionario = readFuncionarioAction($conn);

?>

<div class="container">
	<div class="row">
		<a href="../../../"><h1>Funcionário - Lista</h1></a>
		<a class="btn btn-success text-white" href="./create.php">Novo</a>
	</div>
	<div class="row flex-center">
		<?php if(isset($_GET['message'])) echo(printMessage($_GET['message'])); ?>
	</div>

	<table class="table-funcinario">
		<thead>
			<tr>
				<th>Nome Completo</th>
				<th>Empresa</th>
				<th>E-mail</th>
				<th>Data de Nascimento</th>
			</tr>
		</thead>
		<?php foreach($funcionario as $row): ?>
			<tr style="text-align: center;">
				<td class="funcionario-nomeCompleto"><?=htmlspecialchars($row['nomeCompleto'])?></td>
				<td class="funcionario-empresaId"><?=htmlspecialchars($row['razaoSocial'])?></td>
				<td class="funcionario-email"><?=htmlspecialchars($row['email'])?></td>
				<td class="funcionario-dataNascimento"><?=htmlspecialchars($row['dataNascimento'])?></td>
				<td>
					<a class="btn btn-primary text-white" href="./edit.php?id=<?=$row['id']?>">Editar</a>
				</td>
				<td>
					<a class="btn btn-danger text-white" href="./delete.php?id=<?=$row['id']?>">Remover</a>
				</td>
			</tr>
		<?php endforeach; ?>
	</table>
</div>
<?php require_once '../partials/footer.php'; ?>

