<?php
namespace app\controllers;

use Yii;
use app\models\Reserva;
use app\models\ReservaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

class ReservaController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        $searchModel = new ReservaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

	public function actionCreate()
	{
		$model = new Reserva();
		if ($model->load(Yii::$app->request->post()) && $model->save()) {
			Yii::debug('Reserva guardada correctamente: ' . print_r($model->attributes, true));
			return $this->redirect(['view', 'id' => $model->id]);
		} else {
			Yii::error('Error al guardar la reserva: ' . print_r($model->errors, true));
		}
		return $this->render('create', [
			'model' => $model,
		]);
	}

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    protected function findModel($id)
    {
        if (($model = Reserva::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}


