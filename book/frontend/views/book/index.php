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
			<?=Html::a('Свойства', ['book/view', 'id' =>$book->id], ['class' => 'btn btn-primary'])?>
		
		</td>
	</tr>
	<?php } ?>
	 
</table> 