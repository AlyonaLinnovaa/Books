<?php Use \yii\helpers\Html; ?>
<table class="table">
	<tr>
		<th class="success">№ </th> 
		<th class="danger">Фамилия</th> 
		<th class="info">Имя</th> 
		<th class="success">Отчество</th> 
		<th class="warning">Адрес </th> 
		<th class="success">Действия</th> 
	</tr>
	
	<?php foreach($client as $client){ ?>
	<tr>
		<td class="success"> <?= $client->id ?> </td>
		<th class="danger"> <?= htmlspecialchars($client->first_name) ?> </td>
		<td class="info"> <?= htmlspecialchars($client->last_name) ?> </td>
		<td class="success"><?= htmlspecialchars($client->address) ?> </td>
		<td class="warning"> <?= htmlspecialchars($client->patronymic) ?> </td>
		
		<td class="success">
			<?=Html::a('Редактировать', ['book/edit2', 'id' =>$client->id], ['class' => 'btn btn-primary'])?>
			<?php
				if($client->getIssuing_books()->count()==0) {
					echo Html::a('Удалить', ['book/delete2', 'id' => $client ->id],['class'=>'btn btn-primary']);
			}?>
		</td>
	</tr>
	 <?php } ?>
	 <tr>
	 <td colspan"4"></td>
	 <td><?= Html::a('<span class="glyphicon glyphicon-plus"></span> Добавить', ['book/add2', 'id'], ['class' => 'btn btn-primary'])?>
	 </td>
	 
</table>

	