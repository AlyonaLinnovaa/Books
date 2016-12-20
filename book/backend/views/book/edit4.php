<?php
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper
?>
<h2> Добавление фактической даты </h2>
<?php $form = ActiveForm::begin(); ?>
<?= $form->field($issuing_books, 'the_actual_date_of_return')->widget(\yii\jui\DatePicker::classname(),['language' => 'ru','dateFormat' => 'yyyy-MM-dd',])?>
<button class="btn btn-primary" type="submit"> Добавить </button>
<?php ActiveForm::end(); ?>
