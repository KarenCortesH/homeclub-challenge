<?php

use yii\helpers\Html;
use yii\grid\GridView;

$this->title = 'Apartamentos';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="apartamento-index">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Crear Apartamento', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'nombre',
            'direccion',
			'tipo_apartamento',
			'ciudad',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
