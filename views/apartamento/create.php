<?php

use yii\helpers\Html;

$this->title = 'Crear Apartamento';
$this->params['breadcrumbs'][] = ['label' => 'Apartamentos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="apartamento-create">
    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
