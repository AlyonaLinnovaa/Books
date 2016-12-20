<?php
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper
?>
<h2> Редактирование выдачи</h2>
<?php $form = ActiveForm::begin(); ?>
<?= $form->field($issuing_books, 'id_book') -> ListBox(ArrayHelper::map($book, 'id', 'name'))?>
<?= $form->field($issuing_books, 'id_client') -> ListBox(ArrayHelper::map($client, 'id', 'first_name'))?>
<?= $form->field($issuing_books, 'date_issuing')->widget(\yii\jui\DatePicker::classname(),['language' => 'ru','dateFormat' => 'yyyy-MM-dd',])?>
<?= $form->field($issuing_books, 'return_date')->widget(\yii\jui\DatePicker::classname(),['language' => 'ru','dateFormat' => 'yyyy-MM-dd',]) ?>
<button class="btn btn-primary" type="submit"> Сохранить </button>
<?php ActiveForm::end(); ?>
