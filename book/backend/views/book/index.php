<?php Use \yii\helpers\Html; ?>
<table class="table">
	<tr>
		<th class="active">№ </th> 
		<th class="success">Наименование </th> 
		<th class="warning">Автор</th> 
		<th class="danger">Издательство</th> 
		<th class="info">Действия</th> 
	</tr>
	
	<?php foreach($books as $book){ ?>
	<tr>
		<td class="active"> <?= $book->id ?> </td>
		<td class="success"> <?= htmlspecialchars($book->name) ?> </td>
		<td class="warning"><?= htmlspecialchars($book->author) ?> </td>
		<td class="danger"><?= htmlspecialchars($book->publishing_house) ?> </td>
		
		<td class="info">
			<?=Html::a('Статус выдачи', ['book/view', 'id' =>$book->id], ['class' => 'btn btn-primary'])?>
			<?=Html::a('Редактировать', ['book/edit', 'id' =>$book->id], ['class' => 'btn btn-primary'])?>
			<?php if($book->getIssuing_books()->count()==0) {
			echo Html::a('<span class="glyphicon glyphicon-remove"></span>Удалить', ['book/delete', 'id' => $book ->id],['class'=>'btn btn-primary']);
			}?>
		
		</td>
	</tr>
	<?php } ?>
	 <tr>
	<td colspan"4"></td>
	<td><?= Html::a('<span class="glyphicon glyphicon-plus"></span> Добавить', ['book/add', 'id'],['class' => 'btn btn-primary'])?>
	</td>
	
</table> 