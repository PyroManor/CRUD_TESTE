<?php

require_once '../../database/contato.php';

function findContatoAction($conn, $id) {
	return findContatoDb($conn, $id);
}

function readContatoAction($conn) {
	return readContatoDb($conn);
}

function createContatoAction($conn, $nome, $sobrenome, $telefone1, $tipo_telefone1, $telefone2, $tipo_telefone2, $email) {
	$createContatoDb = createContatoDb($conn, $nome, $sobrenome, $telefone1, $tipo_telefone1, $telefone2, $tipo_telefone2, $email);
	$message = $createContatoDb == 1 ? 'success-create' : 'error-create';
	return header("Location: ./read.php?message=$message");
}

function updateContatoAction($conn, $nome, $sobrenome, $telefone1, $tipo_telefone1, $telefone2, $tipo_telefone2, $email) {
	$updateContatoDb = updateContatoDb($conn, $nome, $sobrenome, $telefone1, $tipo_telefone1, $telefone2, $tipo_telefone2, $email);
	$message = $updateContatoDb == 1 ? 'success-update' : 'error-update';
	return header("Location: ./read.php?message=$message");
}

function deleteContatoAction($conn, $id) {
	$deleteContatoDb = deleteContatoDb($conn, $id);
	$message = $deleteContatoDb == 1 ? 'success-remove' : 'error-remove';
	return header("Location: ./read.php?message=$message");
}
