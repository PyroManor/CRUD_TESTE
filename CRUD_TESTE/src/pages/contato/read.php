<?php

require_once '../../../config.php';
require_once '../../../src/actions/contato.php';
require_once '../../../src/modules/messages.php';
require_once '../partials/header.php';

$contato = readContatoAction($conn);

?>
<div class="container">
	<div class="row">
		<a href="../../../"><h1>Listar Contatos: </h1></a>
		<a class="btn btn-success text-white" href="./create.php">Próxima página</a>
	</div>
	<div class="row flex-center">
		<?php if(isset($_POST['message'])) echo(printMessage($_POST['message'])); ?>
	</div>

	<table class="table-contato">
		<tr>
			<th>Nome</th>
			<th>Sobrenome</th>
			<th>Telefone 1</th>
			<th>Tipo Telefone 1</th>
			<th>Telefone 2</th>
			<th>Tipo Telefone 2</th>
			<th>Email</th>
		</tr>
		<?php foreach($contato as $row): ?>
		<tr>
			<td class="contato-nome"><?=htmlspecialchars($row['nome'])?></td>
			<td class="contato-sobrenome"><?=htmlspecialchars($row['sobrenome'])?></td>
			<td class="contato-telefone1"><?=htmlspecialchars($row['telefone1'])?></td>
			<td class="contato-tipo_telefone1"><?=htmlspecialchars($row['tipo_telefone1'])?></td>
			<td class="contato-telefone2"><?=htmlspecialchars($row['telefone2'])?></td>
			<td class="contato-tipo_telefone2"><?=htmlspecialchars($row['tipo_telefone2'])?></td>
			<td class="contato-email"><?=htmlspecialchars($row['email'])?></td>
			<td>
				<a class="btn btn-primary text-white" href="./edit.php?id=<?=$row['id']?>">Editar</a>
			</td>
			<td>
				<a class="btn btn-danger text-white" href="./delete.php?id=<?=$row['id']?>">Deletar</a>
			</td>
		</tr>
		<?php endforeach; ?>
	</table>
</div>
<?php require_once '../partials/footer.php'; ?>

