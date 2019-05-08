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
    <filedset class="col-lg-4 offset-lg-2">
        <legend class="page-subtitle">Контактная информация</legend>
        <div class="input-wrap">
            <?= $form->field($model, 'surname')->textInput(['class' => 'input-custom', 'placeholder' => 'Фамилия']) ?>
            <?= $form->field($model, 'name')->textInput(['class' => 'input-custom', 'placeholder' => 'Имя и отчество']) ?>
        </div>
        <?= $form->field($model, 'phone')->textInput(['class' => 'input-custom phone-mask', 'placeholder' => 'Телефон']) ?>
        <?= $form->field($model, 'email')->textInput(['class' => 'input-custom', 'placeholder' => 'E-mail']) ?>
        <div class="input-wrap">
            <div class="tooltip-wrap">
                <?= $form->field($model, 'inn')->textInput(['class' => 'input-custom inn-mask-private', 'placeholder' => 'ИНН' ]) ?>
                <button type="button" class="tooltip-btn" data-toggle="tooltip" data-placement="bottom" title="Документ, содержащий цифровой шифр, присваивающийся всем плательщикам налогов">?</button>
            </div>
            <?= $form->field($model, 'snils')->textInput(['class' => 'input-custom snils-mask', 'placeholder' => 'СНИЛС']) ?>
        </div>
    </filedset>
    <fieldset class="col-lg-4 ">
        <legend class="page-subtitle">Паспорт</legend>
        <div class="input-wrap">
            <?= $form->field($model, 'pasport_number')->textInput(['class' => 'input-custom', 'placeholder' => 'Серия и номер', 'pattern' => '^[ 0-9]+$']) ?>
            <div class="date-wrap">
                <?= $form->field($model, 'pasport_date')->textInput(['class' => 'hidden-date_year', 'placeholder' => 'Дата выдачи']) ?>
                <svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M1.13027 13.8678V11.5468H3.37395V13.8678H1.13027ZM1.13027 10.4036V8.08258H3.37395V10.4036H1.13027ZM4.50422 13.8678V11.5468H6.74789V13.8678H4.50422ZM4.50422 10.4036V8.08258H6.74789V10.4036H4.50422ZM1.13027 6.93939V4.61838H3.37395V6.93939H1.13027ZM7.87816 13.8678V11.5468H10.1218V13.8678H7.87816ZM7.87816 10.4036V8.08258H10.1218V10.4036H7.87816ZM4.50422 6.93939V4.61838H6.74789V6.93939H4.50422ZM11.2521 13.8678V11.5468H13.4958V13.8678H11.2521ZM11.2521 10.4036V8.08258H13.4958V10.4036H11.2521ZM7.87816 6.93939V4.61838H10.1218V6.93939H7.87816ZM14.6261 13.8678V11.5468H16.8697V13.8678H14.6261ZM14.6261 10.4036V8.08258H16.8697V10.4036H14.6261ZM11.2521 6.93939V4.61838H13.4958V6.93939H11.2521ZM14.6261 6.93939V4.61838H16.8697V6.93939H14.6261ZM18 2.31468C18 1.6738 17.4939 1.15417 16.8697 1.15417H14.0525V2.31468H10.6785V1.15417H7.30459V2.31468H3.93065V1.15417H1.13027C0.506092 1.15417 0 1.6738 0 2.31468V13.8678C0 14.5087 0.506092 15.011 1.13027 15.011H16.8697C17.4939 15.011 18 14.5087 18 13.8678V2.31468ZM6.74789 0.0109863H4.50422V1.74309H6.74789V0.0109863ZM13.4958 0.0109863H11.2521V1.74309H13.4958V0.0109863Z" fill="#B1B1B1"/>
                </svg>
            </div>

        </div>
        <?= $form->field($model, 'pasport_organization')->textInput(['class' => 'input-custom', 'placeholder' => 'Кем выдан']) ?>
        <div class="input-wrap">
            <?= $form->field($model, 'pasport_organizarion_code')->textInput(['class' => 'input-custom', 'placeholder' => 'Код подразделения']) ?>
            <div class="date-wrap">
                <?= $form->field($model, 'birthday')->textInput(['class' => 'hidden-date_year', 'placeholder' => 'Дата рождения']) ?>
                <svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M1.13027 13.8678V11.5468H3.37395V13.8678H1.13027ZM1.13027 10.4036V8.08258H3.37395V10.4036H1.13027ZM4.50422 13.8678V11.5468H6.74789V13.8678H4.50422ZM4.50422 10.4036V8.08258H6.74789V10.4036H4.50422ZM1.13027 6.93939V4.61838H3.37395V6.93939H1.13027ZM7.87816 13.8678V11.5468H10.1218V13.8678H7.87816ZM7.87816 10.4036V8.08258H10.1218V10.4036H7.87816ZM4.50422 6.93939V4.61838H6.74789V6.93939H4.50422ZM11.2521 13.8678V11.5468H13.4958V13.8678H11.2521ZM11.2521 10.4036V8.08258H13.4958V10.4036H11.2521ZM7.87816 6.93939V4.61838H10.1218V6.93939H7.87816ZM14.6261 13.8678V11.5468H16.8697V13.8678H14.6261ZM14.6261 10.4036V8.08258H16.8697V10.4036H14.6261ZM11.2521 6.93939V4.61838H13.4958V6.93939H11.2521ZM14.6261 6.93939V4.61838H16.8697V6.93939H14.6261ZM18 2.31468C18 1.6738 17.4939 1.15417 16.8697 1.15417H14.0525V2.31468H10.6785V1.15417H7.30459V2.31468H3.93065V1.15417H1.13027C0.506092 1.15417 0 1.6738 0 2.31468V13.8678C0 14.5087 0.506092 15.011 1.13027 15.011H16.8697C17.4939 15.011 18 14.5087 18 13.8678V2.31468ZM6.74789 0.0109863H4.50422V1.74309H6.74789V0.0109863ZM13.4958 0.0109863H11.2521V1.74309H13.4958V0.0109863Z" fill="#B1B1B1"/>
                </svg>
            </div>

        </div>
    </fieldset>
    <fieldset class="col-lg-4 offset-lg-2">
        <legend class="page-subtitle">Адрес регистрации</legend>
        <div class="select-cont">
            <?= $form->field($model, 'registration_region')->textInput(['class' => 'input-custom', 'placeholder' => 'Регион']) ?>
        </div>
        <div class="select-cont">
            <select style="border: 1px solid #f3f7fb;" data-show-subtext="true" data-live-search="true" name="DealerInfo[registration_ciity]" class="selectpicker">
                <?php
                foreach ($city as $item){
                    ?>
                    <option <?=($model->registration_ciity == $item->name ? 'selected' : '')?> value="<?= $item->name ?>"><?= $item->name ?></option>
                    <?php
                }
                ?>
            </select>
        </div>
        <div class="select-cont">
            <?= $form->field($model, 'registration_street')->textInput(['class' => 'input-custom', 'placeholder' => 'Улица']) ?>
        </div>
        <div class="input-wrap input_nowrap">
            <?= $form->field($model, 'registration_house')->textInput(['class' => 'input-custom', 'placeholder' => 'Дом']) ?>
            <?= $form->field($model, 'registration_building')->textInput(['class' => 'input-custom', 'placeholder' => 'Строение']) ?>
        </div>
        <div class="input-wrap input_nowrap">
            <?= $form->field($model, 'registration_corpus')->textInput(['class' => 'input-custom', 'placeholder' => 'Корпус']) ?>
            <?= $form->field($model, 'registration_flat')->textInput(['class' => 'input-custom', 'placeholder' => 'Квартира']) ?>
        </div>
    </fieldset>
    <fieldset class="col-lg-4">
        <legend class="page-subtitle">Адрес проживания</legend>
        <div class="select-cont">
            <?= $form->field($model, 'living_region')->textInput(['class' => 'input-custom', 'placeholder' => 'Регион']) ?>
        </div>
        <div class="select-cont">
            <select style="border: 1px solid #f3f7fb;" data-show-subtext="true" data-live-search="true" name="DealerInfo[living_city]" class="selectpicker">
                <?php
                foreach ($city as $item){
                    ?>
                    <option <?=($model->living_city == $item->name ? 'selected' : '')?> value="<?= $item->name ?>"><?= $item->name ?></option>
                    <?php
                }
                ?>
            </select>
        </div>
        <div class="select-cont">
            <?= $form->field($model, 'living_street')->textInput(['class' => 'input-custom', 'placeholder' => 'Улица']) ?>
        </div>
        <div class="input-wrap input_nowrap">
            <?= $form->field($model, 'living_house')->textInput(['class' => 'input-custom', 'placeholder' => 'Дом']) ?>
            <?= $form->field($model, 'living_building')->textInput(['class' => 'input-custom', 'placeholder' => 'Строение']) ?>
        </div>
        <div class="input-wrap input_nowrap">
            <?= $form->field($model, 'living_corpus')->textInput(['class' => 'input-custom', 'placeholder' => 'Корпус']) ?>
            <?= $form->field($model, 'living_flat')->textInput(['class' => 'input-custom', 'placeholder' => 'Квартира']) ?>
        </div>
    </fieldset>
    <div class="col-lg-10 offset-lg-2">
        <legend class="page-subtitle">Банковские реквизиты</legend>
        <p class="page-desc">Обратите внимание, что вознаграждение будет перечислено только в&nbsp;том случае, если вы&nbsp;укажете данные своей банковской карты</p>
    </div>
    <fieldset class="col-lg-4 offset-lg-2">
        <?= $form->field($model, 'bank_id')->textInput(['class' => 'input-custom', 'placeholder' => 'БИК']) ?>
        <p class="small-label">Укажите БИК именно того отделения банка, в&nbsp;котором у&nbsp;вас открыт р/с и&nbsp;выдана банковская карта</p>
        <?= $form->field($model, 'bank_name')->textInput(['class' => 'input-custom', 'placeholder' => 'Банк']) ?>

    </fieldset>
    <fieldset class="col-lg-4">
        <?= $form->field($model, 'bank_checking_account')->textInput(['class' => 'input-custom', 'placeholder' => 'Расч. счет']) ?>
        <p class="small-label">Уточнить в&nbsp;Банке, который выпустил Вашу банковскую карту</p>
        <?= $form->field($model, 'bank_correction_account')->textInput(['class' => 'input-custom', 'placeholder' => 'Кор. счет']) ?>
    </fieldset>
    <div class="underline-div col-lg-8 offset-lg-2"></div>
    <?= Html::submitButton('Обновить профиль', ['class' => 'button-custom seleted-btn']) ?>
<?php ActiveForm::end(); ?>
