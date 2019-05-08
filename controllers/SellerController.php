<?php

namespace app\controllers;

use app\models\DealerInfo;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\User;
use app\models\Orders;
use app\models\Solutions;
use app\models\OrderStatus;
use app\models\SignupForm;
use app\models\PasswordResetRequestForm;
use app\models\ResetPasswordForm;
use yii\web\NotFoundHttpException;

class SellerController extends Controller
{
    /**
     * {@inheritdoc}
     */

    public $layout = 'seller';

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
                            'purpose',
                            'accepting',
                            'selling',
                            'hunging',
                            'cancelling',
                            'approve',
                            'abort',
                            'export',
                            'delete',
                            'dealers',
                            'dealerprofile',
                            'profile',
                        ],
                        'roles' => ['seller'],
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

    public function actionNew()
    {
        $orders  = Orders::find()->where(['status' => '1'])->orderBy(['id' => SORT_DESC])->all();
        $managers = User::findByRole('manager');
        return $this->render('new', ['orders' => $orders, 'managers' => $managers]);
    }

    public function actionAccepted()
    {
        $orders  = Orders::find()->where(['status' => '5'])->orderBy(['id' => SORT_DESC])->all();
        $order_status  = OrderStatus::find()->all();
        $solutions = Solutions::find()->all();
        $managers = User::findByRole('manager');
        return $this->render('accepted', ['orders' => $orders, 'order_status' => $order_status, 'solutions' => $solutions, 'managers' => $managers]);
    }

    public function actionHung()
    {
        $orders  = Orders::find()->where(['status' => '2'])->orderBy(['id' => SORT_DESC])->all();
        $managers = User::findByRole('manager');
        return $this->render('hung', ['orders' => $orders, 'managers' => $managers]);
    }

    public function actionSold()
    {
        $orders  = Orders::find()->where(['status' => '4'])->orderBy(['id' => SORT_DESC])->all();
        $managers = User::findByRole('manager');
        return $this->render('sold', ['orders' => $orders, 'managers' => $managers]);
    }

    public function actionCanceled()
    {
        $orders  = Orders::find()->where(['status' => '3'])->orderBy(['id' => SORT_DESC])->all();
        $managers = User::findByRole('manager');
        return $this->render('canceled', ['orders' => $orders, 'managers' => $managers]);
    }

    public function actionDealers(){

        $dealers = DealerInfo::find()->all();

        foreach ($dealers as $dealer){

            $dealer_id = $dealer['dealer_id'];

            $sold_count = Orders::find()->where(['dealer_id' => $dealer_id])->andWhere(['status' => '4'])->count();
            $accepted_count = Orders::find()->where(['dealer_id' => $dealer_id])->andWhere(['status' => '5'])->count();
            $hung_count = Orders::find()->where(['dealer_id' => $dealer_id])->andWhere(['status' => '2'])->count();
            $canceled_count = Orders::find()->where(['dealer_id' => $dealer_id])->andWhere(['status' => '3'])->count();

            \Yii::$app->db->createCommand("UPDATE `dealer_info` SET `sold_count` = '$sold_count', `hung_count` = '$hung_count', `accepted_count` = '$accepted_count', `canceled_count` = '$canceled_count' WHERE `dealer_id` = $dealer_id")
                ->bindValue(':id', $dealer->dealer_id)
                ->execute();
        }

        $summ = Orders::find()->where('status != :status', ['status'=>6])->count();
        $summ_accepted = Orders::find()->Where(['status' => '5'])->count();
        $summ_sold = Orders::find()->Where(['status' => '4'])->count();
        $summ_hung = Orders::find()->Where(['status' => '2'])->count();
        $summ_canceled = Orders::find()->Where(['status' => '3'])->count();

        $dealers = DealerInfo::find()->all();

        return $this->render('dealers', [
            'dealers' => $dealers,
            'summ' => $summ,
            'summ_accepted' => $summ_accepted,
            'summ_sold' => $summ_sold,
            'summ_hung' => $summ_hung,
            'summ_canceled' => $summ_canceled,
        ]);
    }

    public function actionApprove($id){

        $approve_date = date('Y-m-d');

        \Yii::$app->db->createCommand("UPDATE `orders` SET `approved` = TRUE, `sold_date` = '$approve_date' WHERE id = $id")
            ->bindValue(':id', $id)
            ->execute();
    }

    public function actionAbort($id){

        \Yii::$app->db->createCommand("UPDATE `orders` SET `approved` = FALSE, `sold_date` = null WHERE id = $id")
            ->bindValue(':id', $id)
            ->execute();
    }

    public function actionDelete($id){

        \Yii::$app->db->createCommand("UPDATE `orders` SET `status` = 6 WHERE id = $id")
            ->bindValue(':id', $id)
            ->execute();
    }

    public function actionPurpose($id, $manager_id){

        $date = date('Y-m-d');

        \Yii::$app->db->createCommand("UPDATE `orders` SET `manager_id` = '$manager_id', `to_work_date` = '$date', `status` = '5' WHERE id = $id")
            ->bindValue(':id', $id)
            ->execute();
    }

    public function actionAccepting($id, $manager_id, $to_work_date){

        $to_work_date = date('Y-m-d', strtotime($to_work_date));

        \Yii::$app->db->createCommand("UPDATE `orders` SET `manager_id` = '$manager_id', `to_work_date` = '$to_work_date' WHERE id = $id")
            ->bindValue(':id', $id)
            ->execute();
    }

    public function actionHunging($id, $manager_id, $to_work_date, $restart_date, $status){

        $to_work_date = date('Y-m-d', strtotime($to_work_date));
        $restart_date = date('Y-m-d', strtotime($restart_date));

        \Yii::$app->db->createCommand("UPDATE `orders` SET `manager_id` = '$manager_id', `to_work_date` = '$to_work_date', `restart_date` = '$restart_date', `status` = '$status'  WHERE id = $id")
            ->bindValue(':id', $id)
            ->execute();
    }


    public function actionSelling($id, $manager_id, $to_work_date, $restart_date, $status){

        $to_work_date = date('Y-m-d', strtotime($to_work_date));
        $restart_date = date('Y-m-d', strtotime($restart_date));

        \Yii::$app->db->createCommand("UPDATE `orders` SET `manager_id` = '$manager_id', `to_work_date` = '$to_work_date', `restart_date` = '$restart_date', `status` = '$status'  WHERE id = $id")
            ->bindValue(':id', $id)
            ->execute();
    }

    public function actionCancelling($id, $manager_id, $to_work_date, $restart_date, $status){

        $to_work_date = date('Y-m-d', strtotime($to_work_date));
        $restart_date = date('Y-m-d', strtotime($restart_date));

        \Yii::$app->db->createCommand("UPDATE `orders` SET `manager_id` = '$manager_id', `to_work_date` = '$to_work_date', `restart_date` = '$restart_date', `status` = '$status'  WHERE id = $id")
            ->bindValue(':id', $id)
            ->execute();
    }

    public function actionExport(){

        $data = \Yii::$app->request->get('id');

        $id = explode(',', $data);

//        print_r($id);

        $file = \Yii::createObject([
            'class' => 'codemix\excelexport\ExcelFile',
            'sheets' => [
                'Orders' => [
                    'class' => 'codemix\excelexport\ActiveExcelSheet',
                    'query' => Orders::find()->andFilterWhere(['in', 'id', $id]),
//                    'attributes' => [
//                        'dealer_id',
//                        'name',
//                        'surname',
//                        'price',
//                        'company',
//                        'solution',
//                        'sold_date'
//                    ],
                ]
            ]
        ]);

        $file->send('orders.xlsx');
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
