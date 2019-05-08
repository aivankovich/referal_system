<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Профиль';
?>

<main class="profile-diller_page">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="report-date-cont">
                    <h1 class="page-title"><?=$this->title?></h1>
                    <div class="date-wrap">
                        <p class="date-id">
                            <span class="date-id_title">Ваш ID&nbsp;</span>
                            <span class="date-id_number"><?=Yii::$app->user->getId()?></span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <?= $this->render('_profile', [
            'model' => $model, 'city' => $city
        ]) ?>
    </div>
</main>