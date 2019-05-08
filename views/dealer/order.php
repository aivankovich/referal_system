<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Orders */
/* @var $model app\models\Solutions */
/* @var $form ActiveForm */

$this->title = 'Заявка на подключение';
?>
<main class="new-diller_page">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="report-date-cont">
                    <h1 class="page-title"><?=$this->title?></h1>
                    <div class="date-wrap">
                        <button type="button" class="button-custom new-diller_btn btn1 new-diller-selected">Физ.&nbsp;лица</button>
                        <button type="button" class="button-custom new-diller_btn btn2">Юр.&nbsp;лица</button>
                    </div>
                </div>
            </div>
        </div>
        <?php $form = ActiveForm::begin([
            'options' => [
                'class' => 'row new-diller_form new-diller_form_selected new-diller_form_1',
            ],
            'fieldConfig' => [
                'template' => '{input}{error}',
                'errorOptions' => [
                    'class' => 'valid',
                ]
            ],
        ]); ?>
        <input hidden value="private" name="Orders[person_type]">
        <input hidden value="<?=Yii::$app->user->getId()?>" name="Orders[dealer_id]">
            <fieldset class="col-lg-4 offset-lg-1">
                <legend class="page-subtitle">Контактная информация</legend>
                <div class="input-wrap">
                    <?= $form->field($model, 'surname')->textInput(['class' => 'input-custom full-width', 'placeholder' => 'Фамилия']) ?>
                    <?= $form->field($model, 'name')->textInput(['class' => 'input-custom full-width', 'placeholder' => 'Имя и отчество']) ?>
                </div>
                <?= $form->field($model, 'phone')->textInput(['class' => 'input-custom full-width phone-mask', 'placeholder' => 'Телефон']) ?>
                <?= $form->field($model, 'email')->textInput(['class' => 'input-custom full-width email-mask', 'placeholder' => 'Ваш e-mail']) ?>
                <?= $form->field($model, 'comment')->textInput(['class' => 'input-custom full-width', 'placeholder' => 'Комментарий']) ?>
            </fieldset>
            <fieldset class="col-lg-4">
                <legend class="page-subtitle">   </legend>
                <div  class="select-cont">
                    <select style="border: 1px solid #f3f7fb;" data-show-subtext="true" data-live-search="true" name="Orders[city]" class="selectpicker">
                        <?php
                        foreach ($city as $item){
                            ?>
                            <option value="<?= $item->name ?>"><?= $item->name ?></option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
                <?= $form->field($model, 'street')->textInput(['class' => 'input-custom full-width', 'placeholder' => 'Улица']) ?>
                <div class="input-wrap input_nowrap">
                    <?= $form->field($model, 'house')->textInput(['class' => 'input-custom full-width', 'placeholder' => 'Дом']) ?>
                    <?= $form->field($model, 'flat')->textInput(['class' => 'input-custom full-width', 'placeholder' => 'Квартира']) ?>
                    <?= $form->field($model, 'company')->textInput(['class' => 'input-custom full-width', 'placeholder' => 'Компания', 'hidden' => 'true', 'value' => ' ']) ?>
                    <?= $form->field($model, 'company_inn')->textInput(['class' => 'input-custom full-width', 'placeholder' => 'ИНН', 'hidden' => 'true', 'value' => ' ']) ?>
                </div>
            </fieldset>
            <fieldset class="col-lg-2 radio-form_wrap">
                <legend class="page-subtitle">Выбор решения</legend>
                <div class="lines-div">
                    <?php
                    $i = 1;
                        foreach ($solutions as $solution) {
                    ?>
                            <div class="radio-wrap line-up">
                                <input id="radio<?=$i?>" type="radio" value="<?=$solution->id?>" name="Orders[solution]" class="radio-custom">
                                <label for="radio<?=$i?>" class="radio-label"><?=$solution->name?></label>
                            </div>
                    <?php
                            $i++;
                        }
                    ?>
<!--                    <div class="radio-wrap line-bottom">-->
<!--                        <input id="radio4" checked type="radio" value="" name="Orders[solution]" class="radio-custom">-->
<!--                        <label for="radio4" class="radio-label">Не определился</label>-->
<!--                    </div>-->
                </div>
            </fieldset>
        <?php if (strpos($_SERVER['HTTP_REFERER'], 'order')){ ?>
            <p class="page-desc" style="color: #000;">Ваша заявка принята, спасибо что воспользовались нашим сервисом</p>
        <?php } ?>
            <?= Html::submitButton('Оставить заявку', ['class' => 'button-custom  seleted-btn']) ?>
            <?php ActiveForm::end(); ?>

            <?php $form = ActiveForm::begin([
                'options' => [
                    'class' => 'row new-diller_form new-diller_form_2',
                ],
                'fieldConfig' => [
                    'template' => '{input}{error}',
                    'errorOptions' => [
                        'class' => 'valid',
                    ]
                ],
            ]); ?>
            <input hidden value="company" name="Orders[person_type]">
            <input hidden value="<?=Yii::$app->user->getId()?>" name="Orders[dealer_id]">
            <fieldset class="col-lg-4 offset-lg-1">
                <legend class="page-subtitle">Контактная информация</legend>
                <div class="input-wrap">
                    <?= $form->field($model, 'surname')->textInput(['class' => 'input-custom full-width', 'placeholder' => 'Фамилия']) ?>
                    <?= $form->field($model, 'name')->textInput(['class' => 'input-custom full-width', 'placeholder' => 'Имя и отчество']) ?>
                </div>
                <?= $form->field($model, 'phone')->textInput(['class' => 'input-custom full-width phone-mask', 'placeholder' => 'Телефон']) ?>
                <?= $form->field($model, 'email')->textInput(['class' => 'input-custom full-width email-mask', 'placeholder' => 'Ваш e-mail']) ?>
            <?= $form->field($model, 'comment')->textInput(['class' => 'input-custom full-width', 'placeholder' => 'Комментарий']) ?>
            </fieldset>
            <fieldset class="col-lg-4">
                <legend class="page-subtitle">   </legend>
                <div class="select-cont">
                    <select style="border: 1px solid #f3f7fb;" data-show-subtext="true" data-live-search="true" name="Orders[city]" class="selectpicker">
                        <?php
                        foreach ($city as $item){
                            ?>
                            <option value="<?= $item->name ?>"><?= $item->name ?></option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
                <?= $form->field($model, 'company')->textInput(['class' => 'input-custom full-width', 'placeholder' => 'Наименование организации']) ?>
                <?= $form->field($model, 'company_inn')->textInput(['class' => 'input-custom full-width inn-mask-company', 'placeholder' => 'ИНН организации']) ?>
            </fieldset>
            <fieldset class="col-lg-2 radio-form_wrap">
                <legend class="page-subtitle">Выбор решения</legend>
                <div class="lines-div">
                    <?php
                    $i = 8;
                    foreach ($solutions as $solution) {
                        ?>
                        <div class="radio-wrap line-up">
                            <input id="radio<?=$i?>" type="radio" value="<?=$solution->id?>" name="Orders[solution]" class="radio-custom">
                            <label for="radio<?=$i?>" class="radio-label"><?=$solution->name?></label>
                        </div>
                        <?php
                        $i++;
                    }
                    ?>
<!--                    <div class="radio-wrap line-bottom">-->
<!--                        <input id="radio8" type="radio" value="" name="Orders[solution]" class="radio-custom">-->
<!--                        <label for="radio8" class="radio-label">Не определился</label>-->
<!--                    </div>-->
                </div>
            </fieldset>
        <?php if (strpos($_SERVER['HTTP_REFERER'], 'order')){ ?>
            <p class="page-desc" style="color: #000;">Ваша заявка принята, спасибо что воспользовались нашим сервисом</p>
        <?php } ?>
            <?= Html::submitButton('Оставить заявку', ['class' => 'button-custom  seleted-btn']) ?>
            <?php ActiveForm::end(); ?>
    </div>
</main>