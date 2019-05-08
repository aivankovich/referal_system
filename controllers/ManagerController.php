<?php

namespace app\controllers;

use app\models\City;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\Orders;
use app\models\OrderStatus;
use app\models\Solutions;
use app\models\User;
use app\models\DealerInfo;
use yii\web\HttpException;
use yii\web\NotFoundHttpException;

class ManagerController extends Controller
{
    /**
     * {@inheritdoc}
     */

    public $layout = 'manager';
    public $managers;

    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => [
                            'accepted',
                            'canceled',
                            'hung',
                            'new',
                            'report',
                            'sold',
                            'counter',
                            'accept',
                            'selling',
                            'restarting',
                            'dealerprofile',
                            'profile',
                        ],
                        'roles' => ['manager', 'seller'],
                    ],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */

    public function actionReport()
    {
        $orders  = Orders::find()->where(['status' => '4'])->andWhere(['manager_id' => Yii::$app->user->getId()])->all();
        return $this->render('report', ['orders' => $orders]);
    }

    public function actionNew()
    {

        $orders  = Orders::find()->orderBy(['id' => SORT_DESC])->all();

        foreach ($orders as $order){

            if($order->restart_date != null) {
                $restart_date = date('Y-m-d', strtotime($order->restart_date));

                if ($restart_date <= date('Y-m-d')) {
                    \Yii::$app->db->createCommand("UPDATE `orders` SET `status` = 1, `restart_date` = null WHERE id = $order->id")
                        ->bindValue(':id', $order->id)
                        ->execute();
                }

            }
        }

        $new_orders  = Orders::find()->where(['status' => '1'])->orderBy(['id' => SORT_DESC])->all();

        return $this->render('new', ['orders' => $new_orders]);
    }

    public function actionAccepted()
    {
        $city = City::find()->orderBy('name')->all();
        $orders  = Orders::find()->where(['status' => '5'])->andWhere(['manager_id' => Yii::$app->user->getId()])->orderBy(['id' => SORT_DESC])->all();
        $order_status  = OrderStatus::find()->all();
        $solutions = Solutions::find()->all();
        return $this->render('accepted', ['orders' => $orders, 'city' => $city, 'order_status' => $order_status, 'solutions' => $solutions]);
    }

    public function actionHung()
    {

        $city = City::find()->orderBy('name')->all();
        $solutions = Solutions::find()->all();

        $orders  = Orders::find()->where(['status' => '2'])->andWhere(['manager_id' => Yii::$app->user->getId()])->orderBy(['id' => SORT_DESC])->all();
        return $this->render('hung', ['orders' => $orders, 'city' => $city, 'solutions' => $solutions]);
    }

    public function actionSold()
    {
        $orders  = Orders::find()->where(['status' => '4'])->andWhere(['manager_id' => Yii::$app->user->getId()])->orderBy(['id' => SORT_DESC])->all();
        return $this->render('sold', ['orders' => $orders]);
    }

    public function actionCanceled()
    {
        $orders  = Orders::find()->where(['status' => '3'])->andWhere(['manager_id' => Yii::$app->user->getId()])->orderBy(['id' => SORT_DESC])->all();
        return $this->render('canceled', ['orders' => $orders]);
    }

    public function actionAccept($id){

        $user_id = Yii::$app->user->getId();

        $date = date('Y-m-d');

        \Yii::$app->db->createCommand("UPDATE `orders` SET `status` = 5, `manager_id` = $user_id, `to_work_date` = '$date'  WHERE id=$id")
            ->bindValue(':id', $id)
            ->execute();
    }

    public function actionSelling($id, $status, $comment, $solution, $city, $company, $company_inn, $name, $surname, $email, $phone){
        if ($solution == 4){
            return false;
        }else{
            \Yii::$app->db->createCommand("UPDATE `orders` SET `status` = $status, `solution` = '$solution', `email` = '$email', `phone` = '$phone', `comment` = '$comment', `city` = '$city', `company` = '$company', `company_inn` = '$company_inn', `name` = '$name', `surname` = '$surname' WHERE id = $id")
                ->bindValue(':id', $id)
                ->execute();
            return true;
        }
    }


    public function actionRestarting($id, $restart_date, $comment, $solution, $city, $company, $company_inn, $name, $surname, $email, $phone){

        $restart_date = date('Y-m-d', strtotime($restart_date));

        \Yii::$app->db->createCommand("UPDATE `orders` SET `restart_date` = '$restart_date', `email` = '$email', `phone` = '$phone', `solution` = '$solution', `comment` = '$comment', `city` = '$city', `company` = '$company', `company_inn` = '$company_inn', `name` = '$name', `surname` = '$surname' WHERE id = $id")
            ->bindValue(':id', $id)
            ->execute();
    }


    public function actionDealerprofile($id)
    {
        $model = DealerInfo::findOne($id);

        if ($model){
            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['dealerprofile', 'id' => $id]);
            }

            return $this->render('profile_dealer', [
                'model' => $model,
                'dealer_id' => $id
            ]);
        }else{
            throw new HttpException(404 ,'User not found');
        }


    }

    public function actionSearch ($status){

        $orders  = Orders::find()->where(['status' => $status])->andWhere(['manager_id' => Yii::$app->user->getId()])->all();

        return $orders;
    }

    public function actionProfile($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['profile', 'id' => $id]);
        }

        return $this->render('profile', [
            'model' => $model,
        ]);
    }


    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

}
