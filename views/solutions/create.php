<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Solutions */

$this->title = 'Create Solutions';
$this->params['breadcrumbs'][] = ['label' => 'Solutions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container">
    <div class="solutions-create">

        <h1><?= Html::encode($this->title) ?></h1>

        <?= $this->render('_form', [
            'model' => $model,
        ]) ?>

    </div>
</div>