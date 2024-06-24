<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\jui\DatePicker;
use app\models\Cliente;
use app\models\Apartamento;

/** @var yii\web\View $this */
/** @var app\models\Reserva $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="reserva-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'cliente_id')->dropDownList(
        ArrayHelper::map(Cliente::find()->all(), 'id', 'nombre'),
        ['prompt' => 'Seleccione un cliente']
    ) ?>

    <?= $form->field($model, 'apartamento_id')->dropDownList(
        ArrayHelper::map(Apartamento::find()->all(), 'id', 'nombre'),
        ['prompt' => 'Seleccione un apartamento']
    ) ?>

    <?= $form->field($model, 'codigo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fecha_inicio')->widget(DatePicker::classname(), [
        'options' => ['placeholder' => 'Seleccione una fecha ...'],
        'dateFormat' => 'yyyy-MM-dd',
        'clientOptions' => [
            'autoclose' => true,
        ]
    ]) ?>

    <?= $form->field($model, 'fecha_fin')->widget(DatePicker::classname(), [
        'options' => ['placeholder' => 'Seleccione una fecha ...'],
        'dateFormat' => 'yyyy-MM-dd',
        'clientOptions' => [
            'autoclose' => true,
        ]
    ]) ?>

    <?= $form->field($model, 'estado')->dropDownList(['Activa' => 'Activa', 'Anulada' => 'Anulada']) ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
