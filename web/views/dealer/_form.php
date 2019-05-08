<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\DealerInfo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="dealer-info-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'dealer_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'surname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'inn')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'snils')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pasport_prefix')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pasport_number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pasport_date')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pasport_organization')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pasport_organizarion_code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'birthday')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'registration_region')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'registration_ciity')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'registration_street')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'registration_house')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'registration_corpus')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'registration_building')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'registration_flat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'living_region')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'living_city')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'living_street')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'living_house')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'living_corpus')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'living_building')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'living_flat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'bank_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'bank_checking_account')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'bank_correction_account')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'bank_name')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
