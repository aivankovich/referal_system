<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Регистрация';
?>
<main class="registration-page">
    <div class="container">
        <h1 class="page-title">Регистрация</h1>
        <div class="row justify-content-center">
            <?php $form = ActiveForm::begin([
                'id' => 'form-signup',
                'layout' => 'horizontal',
                'options' => [
                    'class' => 'registartion-form',
                ],
                'fieldConfig' => [
                    'template' => '{input}{error}',
                    'errorOptions' => [
                        'class' => 'valid',
                    ]
                ],
            ]); ?>
            <div class="select-cont">
                <select style="border: 1px solid #f3f7fb;" data-show-subtext="true" data-live-search="true" name="SignupForm[city]" class="selectpicker">
                    <?php
                    foreach ($cities as $city){
                        ?>
                        <option value="<?= $city->name ?>"><?= $city->name ?></option>
                        <?php
                    }
                    ?>
                </select>
                <!--                    <select name="reg-city" class="select-custom city-select" required>-->
                <!--                        <option value="Санкт-Петербург">Санкт-Петербург</option>-->
                <!--                        <option value="Москва">Москва</option>-->
                <!--                    </select>-->
                <!--                    <div class="mdi mdi-chevron-down"></div>-->
            </div>
            <div class="input-wrap">
                <?= $form->field($model, 'surname')->textInput(['class' => 'input-custom full-width', 'placeholder' => 'Фамилия',  'value' => $name]) ?>
                <?= $form->field($model, 'name')->textInput(['class' => 'input-custom full-width', 'placeholder' => 'Имя и отчество', 'value' => $name]) ?>
            </div>
            <?= $form->field($model, 'phone')->textInput(['class' => 'input-custom full-width phone-mask', 'placeholder' => 'Телефон', 'value' => $phone]) ?>
            <?= $form->field($model, 'email')->textInput(['class' => 'input-custom full-width email-mask', 'placeholder' => 'Ваш e-mail', 'value' => $email]) ?>
            <?= $form->field($model, 'password')->passwordInput(['class' => 'input-custom', 'placeholder' => 'Пароль'])?>
            <div style="text-align: center;">
            <?= $form->field($model, 'reCaptcha')->widget(
                \himiklab\yii2\recaptcha\ReCaptcha::className(),
                ['siteKey' => '6LdQvpcUAAAAAIKC0cEzaM0WdOLi74SpikiBi5fh']
            ) ?>
            </div>
            <p class="confirm">Нажимая на кнопку, вы соглашаетесь с условиями <a href="/docs/oferta.pdf" target="_blank">оферты</a>&nbsp;и даете согласие на обработку персональных данных</p>
            <?= Html::submitButton('Регистрация', ['class' => 'button-custom seleted-btn', 'name' => 'signup-button']) ?>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</main>

