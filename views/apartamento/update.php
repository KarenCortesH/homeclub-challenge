<?php

use yii\helpers\Html;

$this->title = 'Actualizar Apartamento: ' . $model->nombre;
$this->params['breadcrumbs'][] = ['label' => 'Apartamentos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->nombre, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>

<div class="apartamento-update">
    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
