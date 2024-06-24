<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

$this->title = $model->nombre;
$this->params['breadcrumbs'][] = ['label' => 'Apartamentos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="apartamento-view">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actualizar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '¿Estas seguro de que quieres eliminar este apartamento?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'nombre',
            'direccion',
            'tipo_apartamento',
			'ciudad',
            // Otros atributos del modelo aquí
        ],
    ]) ?>
</div>
