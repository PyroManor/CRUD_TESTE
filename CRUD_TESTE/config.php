<?php

// Sample file: Never send your credentials to git

// host
$host = 'http://localhost/CRUD_TESTE/';

// db
$db_name = 'crud';
$db_host = 'localhost';
$db_contato = 'root';
$db_pass = '';

try {
  $conn = mysqli_connect($db_host, $db_contato, $db_pass, $db_name);
} catch (\Throwable $th) {
  throw $th;
}
