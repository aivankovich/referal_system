<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\DealerInfo */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Dealer Infos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="dealer-info-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'dealer_id',
            'name',
            'surname',
            'phone',
            'email:email',
            'inn',
            'snils',
            'pasport_prefix',
            'pasport_number',
            'pasport_date',
            'pasport_organization',
            'pasport_organizarion_code',
            'birthday',
            'registration_region',
            'registration_ciity',
            'registration_street',
            'registration_house',
            'registration_corpus',
            'registration_building',
            'registration_flat',
            'living_region',
            'living_city',
            'living_street',
            'living_house',
            'living_corpus',
            'living_building',
            'living_flat',
            'bank_id',
            'bank_checking_account',
            'bank_correction_account',
            'bank_name',
        ],
    ]) ?>

</div>
