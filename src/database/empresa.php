<?php

function findEmpresaDb($conn, $id) {
    $id = mysqli_real_escape_string($conn, $id);
	$empresa;

	$sql = "SELECT * FROM empresa  WHERE id = ?";
	$stmt = mysqli_stmt_init($conn);

	if(!mysqli_stmt_prepare($stmt, $sql))
		exit('SQL error');

	mysqli_stmt_bind_param($stmt, 'i', $id);
	mysqli_stmt_execute($stmt);
	
	$empresa = mysqli_fetch_assoc(mysqli_stmt_get_result($stmt));

	mysqli_close($conn);
	return $empresa;
}

function createEmpresaDb($conn, $razaoSocial, $cnpj, $telefone, $email, $endereco) {
	$razaoSocial = mysqli_real_escape_string($conn, $razaoSocial);
	$cnpj = mysqli_real_escape_string($conn, $cnpj);
	$telefone = mysqli_real_escape_string($conn, $telefone);
	$email = mysqli_real_escape_string($conn, $email);
	$endereco = mysqli_real_escape_string($conn, $endereco);

	if($razaoSocial && $cnpj && $telefone && $email && $endereco) {
		$sql = "INSERT INTO empresa (razaoSocial, cnpj, telefone, email, endereco) VALUES (?, ?, ?, ?, ?)";
		$stmt = mysqli_stmt_init($conn);

		if(!mysqli_stmt_prepare($stmt, $sql)) 
			exit('SQL error');
		
		mysqli_stmt_bind_param($stmt, 'sssss', $razaoSocial, $cnpj, $telefone, $email, $endereco);
		mysqli_stmt_execute($stmt);
		mysqli_close($conn);
		return true;
	}
}

function readEmpresaDb($conn) {
    $empresa = [];

	$sql = "SELECT * FROM empresa";
	$result = mysqli_query($conn, $sql);

	$result_check = mysqli_num_rows($result);
	
	if($result_check > 0)
		$empresa = mysqli_fetch_all($result, MYSQLI_ASSOC);

	mysqli_close($conn);
	return $empresa;
}

function updateEmpresaDb($conn, $id, $razaoSocial, $cnpj, $telefone, $email, $endereco ) {
    if($id && $razaoSocial && $cnpj && $telefone && $email &&$endereco) {
		$sql = "UPDATE empresa SET razaoSocial = ?, cnpj = ?, telefone = ?, email = ? , endereco = ? WHERE id = ?";
		$stmt = mysqli_stmt_init($conn);

		if(!mysqli_stmt_prepare($stmt, $sql))
			exit('SQL error');

		mysqli_stmt_bind_param($stmt, 'sssssi', $razaoSocial, $cnpj, $telefone, $email, $endereco, $id);
		mysqli_stmt_execute($stmt);
		mysqli_close($conn);
		return true;
	}
}

function deleteEmpresaDb($conn, $id) {
    $id = mysqli_real_escape_string($conn, $id);

	if($id) {
		$sql = "DELETE FROM empresa WHERE id = ?";
		$stmt = mysqli_stmt_init($conn);

		if(!mysqli_stmt_prepare($stmt, $sql))
			exit('SQL error');

		mysqli_stmt_bind_param($stmt, 'i', $id);
		mysqli_stmt_execute($stmt);
		return true;
	}
}
