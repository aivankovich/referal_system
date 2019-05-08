<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Orders */
/* @var $form ActiveForm */
?>
<div class="dealer-new">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'date') ?>
        <?= $form->field($model, 'to_work_date') ?>
        <?= $form->field($model, 'restart_date') ?>
        <?= $form->field($model, 'solution') ?>
        <?= $form->field($model, 'dealer_id') ?>
        <?= $form->field($model, 'city') ?>
        <?= $form->field($model, 'comment') ?>
        <?= $form->field($model, 'manager_id') ?>
        <?= $form->field($model, 'status') ?>
        <?= $form->field($model, 'reward') ?>
        <?= $form->field($model, 'company') ?>
        <?= $form->field($model, 'phone') ?>
        <?= $form->field($model, 'person_type') ?>
        <?= $form->field($model, 'street') ?>
        <?= $form->field($model, 'house') ?>
        <?= $form->field($model, 'flat') ?>
        <?= $form->field($model, 'name') ?>
        <?= $form->field($model, 'email') ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- dealer-new -->
