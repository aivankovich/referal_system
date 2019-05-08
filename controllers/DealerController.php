<?php

namespace app\controllers;

use app\models\City;
use app\models\Orders;
use Yii;
use app\models\DealerInfo;
use app\models\Solutions;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * DealerController implements the CRUD actions for DealerInfo model.
 */
class DealerController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public $layout = 'dealer';

    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['order', 'profile', 'report', 'reporttable' ],
                        'roles' => ['dealer'],
                    ],
                ],
            ],
        ];
    }

    /**
     * Lists all DealerInfo models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => DealerInfo::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single DealerInfo model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new DealerInfo model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new DealerInfo();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing DealerInfo model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
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

    /**
     * Deletes an existing DealerInfo model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the DealerInfo model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return DealerInfo the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = DealerInfo::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionOrder()
    {
        $model = new \app\models\Orders();

        $city = City::find()->orderBy('name')->all();

        $solutions  = Solutions::find()->orderBy('name')->all();

        if ($model->load(Yii::$app->request->post())) {
            if ($model->validate()) {
                if ($model->load(Yii::$app->request->post()) && $model->save()) {
                    return $this->redirect(['order']);
                }
            }
        }

        return $this->render('order', [
            'model' => $model, 'solutions' => $solutions, 'city' => $city
        ]);
    }

    public function actionProfile($id)
    {

        $city = City::find()->orderBy('name')->all();

        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['profile', 'id' => $id]);
        }

        return $this->render('profile', [
            'model' => $model,'city'=> $city,
        ]);
    }

}
