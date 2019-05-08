<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\DealerInfo */

$this->title = 'Update Dealer Info: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Dealer Infos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="dealer-info-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
