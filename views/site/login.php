<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;

$this->title = 'Вход';
?>
<main class="avtorizstion-page">
    <div class="container">
        <h1 class="page-title">Вход</h1>
        <div class="row  justify-content-center">
            <?php $form = ActiveForm::begin([
                'id' => 'login-form',
                'layout' => 'horizontal',
                'options' => [
                    'class' => 'avtorization-form',
                    'enctype' => 'multipart/form-data'
                ],
                'fieldConfig' => [
                    'template' => '{input}{error}',
                    'errorOptions' => [
                        'class' => 'valid',
                    ]
                ],
            ]); ?>
            <?= $form->field($model, 'username')->textInput(['autofocus' => true, 'class' => 'login-input input-custom ', 'placeholder' => 'Ваш e-mail']) ?>
            <?= $form->field($model, 'password')->passwordInput(['class' => 'password-input input-custom', 'placeholder' => 'Пароль', 'message' => 'OOLOLOLO'])?>
            <?= Html::submitButton('Войти', ['class' => 'button-custom seleted-btn', 'name' => 'login-button']) ?>
                <a href="<?=Url::toRoute(['site/signup'])?>" class="button-custom border-btn">Регистрация</a>
            <?= Html::a('Забыли пароль?', ['site/request-password-reset'], ['class' => 'text-center']) ?>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</main>