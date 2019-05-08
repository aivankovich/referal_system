<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\DealerInfo */

$this->title = 'Update Dealer Info: ' . $model->name;
?>
<div class="dealer-info-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
