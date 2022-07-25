<?php

function findFuncionarioDb($conn, $id) {
    $id = mysqli_real_escape_string($conn, $id);
	$funcionario;

	$sql = "SELECT * FROM funcionario  WHERE id = ?";
	$stmt = mysqli_stmt_init($conn);

	if(!mysqli_stmt_prepare($stmt, $sql))
		exit('SQL error');

	mysqli_stmt_bind_param($stmt, 'i', $id);
	mysqli_stmt_execute($stmt);
	
	$funcionario = mysqli_fetch_assoc(mysqli_stmt_get_result($stmt));
	return $funcionario;
}

function createFuncionarioDb($conn, $nomeCompleto, $email, $dataNascimento, $empresaId) {
	$nomeCompleto = mysqli_real_escape_string($conn, $nomeCompleto);
	$email= mysqli_real_escape_string($conn, $email);
	$dataNascimento = mysqli_real_escape_string($conn, $dataNascimento);
	$empresaId = mysqli_real_escape_string($conn, $empresaId);
	

	if($nomeCompleto && $email && $dataNascimento && $empresaId) {
		$sql = "INSERT INTO funcionario (nomeCompleto, email, dataNascimento, empresaId) VALUES (?, ?, ?, ?)";
		$stmt = mysqli_stmt_init($conn);

		if(!mysqli_stmt_prepare($stmt, $sql)) 
			exit('SQL error');
		
		mysqli_stmt_bind_param($stmt, 'ssss', $nomeCompleto, $email, $dataNascimento, $empresaId);
		mysqli_stmt_execute($stmt);
		mysqli_close($conn);
		return true;
	}
}

function readFuncionarioDb($conn) {
    $funcionario = [];

	$sql = "SELECT f.*, e.razaoSocial FROM funcionario AS f LEFT JOIN empresa AS e ON e.id = f.empresaId";
	$result = mysqli_query($conn, $sql);

	$result_check = mysqli_num_rows($result);
	
	if($result_check > 0)
		$funcionario = mysqli_fetch_all($result, MYSQLI_ASSOC);

	mysqli_close($conn);
	return $funcionario;
}

function updateFuncionarioDb($conn, $id, $nomeCompleto, $email, $dataNascimento, $empresaId) {
    if($id && $nomeCompleto && $email && $dataNascimento && $empresaId ) {
		$sql = "UPDATE funcionario SET nomeCompleto = ?, email = ?, dataNascimento = ?, empresaId = ? WHERE id = ?";
		$stmt = mysqli_stmt_init($conn);

		if(!mysqli_stmt_prepare($stmt, $sql))
			exit('SQL error');

		mysqli_stmt_bind_param($stmt, 'ssssi', $nomeCompleto, $email, $dataNascimento, $empresaId, $id);
		mysqli_stmt_execute($stmt);
		mysqli_close($conn);
		return true;
	}
}

function deleteFuncionarioDb($conn, $id) {
    $id = mysqli_real_escape_string($conn, $id);

	if($id) {
		$sql = "DELETE FROM funcionario WHERE id = ?";
		$stmt = mysqli_stmt_init($conn);

		if(!mysqli_stmt_prepare($stmt, $sql))
			exit('SQL error');

		mysqli_stmt_bind_param($stmt, 'i', $id);
		mysqli_stmt_execute($stmt);
		return true;
	}
}
