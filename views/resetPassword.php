<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Reset password';
$this->params['breadcrumbs'][] = $this->title;
?>
<main class="avtorizstion-page">
    <div class="container">
        <h1 class="page-title"><?= Html::encode($this->title) ?></h1>
        <div class="row  justify-content-center">
            <?php $form = ActiveForm::begin([
                'id' => 'reset-password-form',
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

            <?= $form->field($model, 'password')->textInput(['autofocus' => true, 'class' => 'login-input input-custom ', 'placeholder' => 'Введите новый пароль']) ?>

            <?= Html::submitButton('Отправить', ['class' => 'button-custom seleted-btn']) ?>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</main>