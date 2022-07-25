<?php

require_once '../../../config.php';
require_once '../../../src/actions/empresa.php';
require_once '../../../src/modules/messages.php';
require_once '../partials/header.php';

$empresa = readEmpresaAction($conn);

?>

<div class="container">
	<div class="row">
		<a href="../../../"><h1>Empresa - Lista</h1></a>
		<a class="btn btn-success text-white" href="./create.php">Novo</a>
	</div>
	<div class="row flex-center">
		<?php if(isset($_GET['message'])) echo(printMessage($_GET['message'])); ?>
	</div>

	<table class="table-empresa">
		<thead>
			<tr>
				<th>Razão Social</th>
				<th>CNPJ</th>
				<th>Telefone</th>
				<th>E-mail</th>
				<th>Endereço</th>
			</tr>
		</thead>
		<?php foreach($empresa as $row): ?>
		<tr style="text-align: center;">
			<td class="empresa-razaoSocial"><?=htmlspecialchars($row['razaoSocial'])?></td>
			<td class="empresa-cnpj"><?=htmlspecialchars($row['cnpj'])?></td>
			<td class="empresa-telefone"><?=htmlspecialchars($row['telefone'])?></td>
			<td class="empresa-email"><?=htmlspecialchars($row['email'])?></td>
			<td class="empresa-endereco"><?=htmlspecialchars($row['endereco'])?></td>
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

