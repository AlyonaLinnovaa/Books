<div class="jumbotron">
  <h1><?= htmlspecialchars($book->name); ?>
  <?= htmlspecialchars($book->author); ?> 
  </h1>
    <ul>

	<? if ($book->status > "0") {
		?><p style="text-align: center"><?echo 'Книга есть в наличие' ;?></p><?
		  } else {
		foreach($book->getIssuing_books()->all() as $issuing_books) { 
		?> <p style="text-align: center"> Книга была выдана:<?;
		?> <?echo htmlspecialchars($issuing_books->date_issuing);
		?> Книгу вернут:<?; 
		?> <?echo htmlspecialchars($issuing_books->return_date);?></p><?
		}
		?>
			 </ul>
	 <?php } ?>
</div>
