<?php
use yii\bootstrap\ActiveForm;
?>
<h2> Добавление клиента </h2>
<?php $form = ActiveForm::begin(); ?>
<?= $form->field($client, 'first_name') ?>
<?= $form->field($client, 'last_name') ?>
<?= $form->field($client, 'patronymic') ?>
<?= $form->field($client, 'address') ?>
<button class="btn btn-primary" type="submit"> Добавить </button>
<?php ActiveForm::end(); ?>