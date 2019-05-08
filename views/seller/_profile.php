<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\DealerInfo */
/* @var $form yii\widgets\ActiveForm */
?>

<?php $form = ActiveForm::begin([
    'options' => [
        'class' => 'row profile-diller_form',
    ],
    'fieldConfig' => [
        'template' => '{input}{error}',
        'errorOptions' => [
            'class' => 'valid',
        ]
    ],
]); ?>
    <filedset class="col-lg-6 offset-lg-3">
        <legend class="page-subtitle">Профиль</legend>
        <?= $form->field($model, 'surname')->textInput(['class' => 'input-custom', 'placeholder' => 'Фамилия']) ?>
        <?= $form->field($model, 'name')->textInput(['class' => 'input-custom', 'placeholder' => 'Имя и отчество']) ?>
        <?= $form->field($model, 'phone')->textInput(['class' => 'input-custom phone-mask', 'placeholder' => 'Телефон']) ?>
        <?= $form->field($model, 'email')->textInput(['class' => 'input-custom', 'placeholder' => 'E-mail']) ?>
        <?= $form->field($model, 'password')->textInput(['autofocus' => true, 'class' => 'login-input input-custom ', 'placeholder' => 'Введите новый пароль']) ?>
    </filedset>

    <div class="underline-div col-lg-8 offset-lg-2"></div>
    <?= Html::submitButton('Обновить профиль', ['class' => 'button-custom seleted-btn']) ?>
<?php ActiveForm::end(); ?>
