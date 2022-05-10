<?php

function findContatoDb($conn, $id) {
    $id = mysqli_real_escape_string($conn, $id);
	$contato;

	$sql = "SELECT * FROM contato  WHERE id = ?";
	$stmt = mysqli_stmt_init($conn);

	if(!mysqli_stmt_prepare($stmt, $sql))
		exit('SQL error');

	mysqli_stmt_bind_param($stmt, 'i', $id);
	mysqli_stmt_execute($stmt);
	
	$contato = mysqli_fetch_assoc(mysqli_stmt_get_result($stmt));

	mysqli_close($conn);
	return $contato;
}

function createContatoDb($conn, $nome, $sobrenome, $telefone1, $tipo_telefone1, $telefone2, $tipo_telefone2, $email) {
	$nome = mysqli_real_escape_string($conn, $nome);
	$sobrenome = mysqli_real_escape_string($conn,  $sobrenome);
	$telefone1 = mysqli_real_escape_string($conn,  $telefone1);
	$tipo_telefone1 = mysqli_real_escape_string($conn,  $tipo_telefone1);
	$telefone2 = mysqli_real_escape_string($conn,  $telefone2);
	$tipo_telefone2 = mysqli_real_escape_string($conn,  $tipo_telefone2);
	$email = mysqli_real_escape_string($conn,  $email);

	if($nome && $sobrenome && $telefone1 && $tipo_telefone1 && $telefone2 && $tipo_telefone2 && $email) {
		$sql = "INSERT INTO contato (nome, sobrenome, telefone1, tipo_telefone1, telefone2, tipo_telefone2, email) VALUES (?, ?, ?, ?, ?, ?, ?)";
		$stmt = mysqli_stmt_init($conn);

		if(!mysqli_stmt_prepare($stmt, $sql)) 
			exit('SQL error');
		
		mysqli_stmt_bind_param($stmt, 'sssssss', $nome, $sobrenome, $telefone1, $tipo_telefone1, $telefone2, $tipo_telefone2, $email);
		mysqli_stmt_execute($stmt);
		mysqli_close($conn);
		return true;
	}
}

function readContatoDb($conn) {
    $contato = [];

	$sql = "SELECT * FROM contato";
	$result = mysqli_query($conn, $sql);

	$result_check = mysqli_num_rows($result);
	
	if($result_check > 0)
		$contato = mysqli_fetch_all($result, MYSQLI_ASSOC);

	mysqli_close($conn);
	return $contato;
}

function updateContatoDb($conn, $id, $nome, $sobrenome, $telefone1, $tipo_telefone1, $telefone2, $tipo_telefone2, $email) {
    if($id && $nome && $sobrenome && $telefone1 && $tipo_telefone1 && $telefone2 && $tipo_telefone2 && $email) {
		$sql = "UPDATE contato SET nome = ?, sobrenome = ?, telefone1 = ?, tipo_telefone1 = ?, telefone2 = ?, tipo_telefone2 = ?, email = ? WHERE id = ?";
		$stmt = mysqli_stmt_init($conn);

		if(!mysqli_stmt_prepare($stmt, $sql))
			exit('SQL error');

		mysqli_stmt_bind_param($stmt, 'sssi', $nome, $sobrenome, $telefone1, $tipo_telefone1, $telefone2, $tipo_telefone2, $email, $id);
		mysqli_stmt_execute($stmt);
		mysqli_close($conn);
		return true;
	}
}

function deleteContatoDb($conn, $id) {
    $id = mysqli_real_escape_string($conn, $id);

	if($id) {
		$sql = "DELETE FROM contato WHERE id = ?";
		$stmt = mysqli_stmt_init($conn);

		if(!mysqli_stmt_prepare($stmt, $sql))
			exit('SQL error');

		mysqli_stmt_bind_param($stmt, 'i', $id);
		mysqli_stmt_execute($stmt);
		return true;
	}
}
