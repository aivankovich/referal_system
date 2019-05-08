<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Восстановление пароля';
$this->params['breadcrumbs'][] = $this->title;
?>
<main class="avtorizstion-page">
    <div class="container">
        <h1 class="page-title"><?= Html::encode($this->title) ?></h1>
        <div class="row  justify-content-center">
            <?php $form = ActiveForm::begin([
                'id' => 'request-password-reset-form',
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
                ]]); ?>

            <?= $form->field($model, 'email')->textInput(['autofocus' => true, 'class' => 'login-input input-custom ', 'placeholder' => 'Ваш e-mail']) ?>

            <?= Html::submitButton('Отправить', ['class' => 'button-custom seleted-btn']) ?>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</main>