<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\DealerInfo */

$this->title = 'Create Dealer Info';
$this->params['breadcrumbs'][] = ['label' => 'Dealer Infos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dealer-info-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
