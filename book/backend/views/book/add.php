<?php
use yii\bootstrap\ActiveForm; 
?>
<h1> Добавление книги </h1>
<?php $form = ActiveForm::begin(); ?>
<?= $form->field($book, 'name') ?>
<?= $form->field($book, 'author') ?>
<?= $form->field($book, 'publishing_house') ?>
<?=$form->field($book, 'status')->checkBox()?>
<button class="btn btn-primary" type="submit"> Добавить </button>
<?php ActiveForm::end(); ?>