<?php

require_once '../../database/empresa.php';
require_once '../../database/funcionario.php';

function montaSelect($conn, $selecionadoId) {
	$empresaLista = readEmpresaDb($conn);

	$select = "<select name='empresa'><option>Selecione</option>";

	foreach ($empresaLista as $id => $empresa) {
		$selecionado = "";

		if ($selecionadoId == $empresa["id"])
			$selecionado = "selected";

		$select.= "<option ".$selecionado." value='".$empresa['id']."'>".$empresa['razaoSocial']."</option>";						

	}

	$select.= "</select>";

	return $select;	
}

function findFuncionarioAction($conn, $id) {
	return findFuncionarioDb($conn, $id);
}

function readFuncionarioAction($conn) {
	return readFuncionarioDb($conn);
}

function createFuncionarioAction($conn, $nomeCompleto, $empresaId, $email, $dataNascimento) {
	$createFuncionarioDb = createFuncionarioDb($conn, $nomeCompleto, $email, $dataNasmimento, $empresaId);
	$message = $createFuncionarioDb == 1 ? 'success-create' : 'error-create';
	return header("Location: ./read.php?message=$message");
}

function updateFuncionarioAction($conn, $id, $nomeCompleto, $empresaId, $email, $dataNascimento) {
	$updateFuncionarioDb = updateFuncionarioDb($conn, $id, $nomeCompleto, $email, $dataNascimento, $empresaId);
	$message = $updateFuncionarioDb == 1 ? 'success-update' : 'error-update';
	return header("Location: ./read.php?message=$message");
}

function deleteFuncionarioAction($conn, $id) {
	$deleteFuncionarioDb = deleteFuncionarioDb($conn, $id);
	$message = $deleteFuncionarioDb == 1 ? 'success-remove' : 'error-remove';
	return header("Location: ./read.php?message=$message");
}


