<?php Use \yii\helpers\Html; ?>
<table class="table">
	<tr>
		<th class="success">№ </th> 
		<th class="success">Фамилия клиента</th> 
		<th class="danger">Наименование книги</th> 
		<th class="info">Дата выдачи</th>
		<th class="warning">Дата возврата</th> 
		<th class="success">Фактическая дата возврата</th>
		<th class="info">Действия</th> 
		<th class="info">Действия</th> 
	</tr>
	
	<?php foreach($issuing_books as $issuing_books){ ?>
	<tr>
		<td class="success"><?= $issuing_books->id ?> </td>
		<td class="success"> <?= htmlspecialchars($issuing_books->getIdClient()->one()->first_name) ?> </td>
		<td class="danger"> <?= htmlspecialchars($issuing_books->getIdBook()->one()->name) ?> </td>
		<td class="info"><?= (new \DateTime($issuing_books->date_issuing))->format('d.m.Y') ?></td>
		<td class="warning"> <?= htmlspecialchars($issuing_books->return_date) ?> </td>
		<td class="success"> <?= htmlspecialchars($issuing_books->the_actual_date_of_return) ?> </td>
		
		<td class="info">
			<?=Html::a('Внести изменения', ['book/edit3', 'id' =>$issuing_books->id], ['class' => 'btn btn-primary'])?></td>
			<td class="info">
			<?=Html::a('Добавить фактическую дату возврата', ['book/edit4', 'id' =>$issuing_books->id], ['class' => 'btn btn-primary'])?>
		</td>
	</tr>
	<?php } ?>
	<tr>
	<td colspan"4"></td>
	<td><?= Html::a('<span class="glyphicon glyphicon-plus"></span> Добавить', ['book/add3', 'id'] ,['class' => 'btn btn-primary'])?>
	</td>
	
</table>
		