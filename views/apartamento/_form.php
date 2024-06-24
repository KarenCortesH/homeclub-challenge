<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<?php $form = ActiveForm::begin(); ?>

<?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'direccion')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'tipo_apartamento')->textInput() ?>

<?= $form->field($model, 'ciudad')->textInput() ?>

<div class="form-group">
    <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
</div>

<?php ActiveForm::end(); ?>
