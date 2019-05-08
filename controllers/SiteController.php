<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\helpers\Url;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\City;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\User;
use app\models\SignupForm;
use app\models\PasswordResetRequestForm;
use app\models\ResetPasswordForm;
use app\models\DealerInfo;
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */

    public $layout = 'main';

    public function beforeAction($action)
    {
        if(Yii::$app->user->can('admin')){
            $this->layout = 'admin';
        }elseif (Yii::$app->user->can('seller')){
            $this->layout = 'seller';
        }elseif (Yii::$app->user->can('manager')){
            $this->layout = 'manager';
        }elseif (Yii::$app->user->can('dealer')){
            $this->layout = 'dealer';
        }

        return parent::beforeAction($action);
    }


    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
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
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionPolitics()
    {
        return $this->render('politics');
    }

    public function actionSignup()
    {
        $city = City::find()->orderBy('name')->all();

        $model = new SignupForm();

        if (isset($_GET['name'])) {
            $name = $_GET['name'];
        }else {
            $name = '';
        }
        if (isset($_GET['surname'])) {
            $surname = $_GET['surname'];
        }else {
            $surname = '';
        }
        if (isset($_GET['phone'])) {
            $phone = $_GET['phone'];
        }else {
            $phone = '';
        }
        if (isset($_GET['email'])) {
            $email = $_GET['email'];
        }else {
            $email = '';
        }

        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
//                    if (strpos($user->email, 'incarnet.ru')){
//                        $userRole = Yii::$app->authManager->getRole('manager');
//                    }else{
                        $userRole = Yii::$app->authManager->getRole('dealer');
//                    }
                    Yii::$app->authManager->assign($userRole, $user->id);

                    $connection = Yii::$app->db;
                    $connection->createCommand()
                        ->insert('dealer_info', [
                            'dealer_id' => $user->id,
                            'living_city' => $user->city,
                            'phone' => $user->phone,
                            'email' => $user->email,
                            'name' => $user->name,
                            'surname' => $user->surname,
                            'registration_date' => date('Y-m-d')
                        ])->execute();

                    $model = new DealerInfo();
                    $model->dealer_id = $user->id;
                    $model->living_city = $user->city;
                    $model->phone = $user->phone;
                    $model->email = $user->email;
                    $model->name = $user->name;
                    $model->surname = $user->surname;
                    $model->insert();

                    return $this->goHome();
                }
            }
        }

        return $this->render('signup', [
            'model' => $model,
            'name' => $name,
            'surname' => $surname,
            'phone' => $phone,
            'email' => $email,
            'cities' => $city
        ]);
    }

    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');
                return $this->redirect(Url::toRoute(['site/login']));
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for email provided.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password was saved.');
            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
            ]);
      }

    public function actionRoles() {
        $userRole = Yii::$app->authManager->getRole('dealer');
        Yii::$app->authManager->assign($userRole, 6);
    }

}
