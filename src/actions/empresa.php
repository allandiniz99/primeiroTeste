<?php

require_once '../../database/empresa.php';

function findEmpresaAction($conn, $id) {
	return findEmpresaDb($conn, $id);
}

function readEmpresaAction($conn) {
	return readEmpresaDb($conn);
}

function createEmpresaAction($conn, $razaoSocial, $cnpj, $telefone, $email, $endereco) {
	$createEmpresaDb = createEmpresaDb($conn, $razaoSocial, $cnpj, $telefone, $email, $endereco);
	$message = $createEmpresaDb == 1 ? 'success-create' : 'error-create';
	return header("Location: ./read.php?message=$message");
}

function updateEmpresaAction($conn, $id, $razaoSocial, $cnpj, $telefone, $email, $endereco) {
	$updateEmpresaDb = updateEmpresaDb($conn, $id, $razaoSocial, $cnpj, $telefone, $email, $endereco);
	$message = $updateEmpresaDb == 1 ? 'success-update' : 'error-update';
	return header("Location: ./read.php?message=$message");
}

function deleteEmpresaAction($conn, $id) {
	$deleteEmpresaDb = deleteEmpresaDb($conn, $id);
	$message = $deleteEmpresaDb == 1 ? 'success-remove' : 'error-remove';
	return header("Location: ./read.php?message=$message");
}
