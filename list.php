<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
	<link href="css/global.css" rel="stylesheet" media="screen">
	<script src="js/bootstrap.min.js"></script>
	<script src="js/bootstrap-select.min.js" type="text/javascript"></script>
</head>
<body>
<h1>Список сообщений</h1>
<a class="btn btn-info" href="addMessage.html">Добавить собщение</a>
<table id="tablesorter-demo" class="table table-striped">
	<thead>
	<tr>
		<th>Имя</th>
		<th>Email</th>
		<th>Сообщение</th>
		<th>Дата</th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($obgList as $item) { ?>
		<tr>
			<td><?php echo $item->getName(); ?></td>
			<td><?php echo $item->getEmail(); ?></td>
			<td><?php echo $item->getMessage(); ?></td>
			<td><?php echo $item->getDate(); ?></td>
		</tr>
	<?php } ?>
	</tbody>
</table>
</body>
</html>