<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Dealer Infos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dealer-info-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>

    <p>
        <?= Html::a('Create Dealer Info', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'dealer_id',
            'name',
            'surname',
            'phone',
            //'email:email',
            //'inn',
            //'snils',
            //'pasport_prefix',
            //'pasport_number',
            //'pasport_date',
            //'pasport_organization',
            //'pasport_organizarion_code',
            //'birthday',
            //'registration_region',
            //'registration_ciity',
            //'registration_street',
            //'registration_house',
            //'registration_corpus',
            //'registration_building',
            //'registration_flat',
            //'living_region',
            //'living_city',
            //'living_street',
            //'living_house',
            //'living_corpus',
            //'living_building',
            //'living_flat',
            //'bank_id',
            //'bank_checking_account',
            //'bank_correction_account',
            //'bank_name',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
