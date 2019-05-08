<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;

$this->title = $name;
?>
<main class="error-page container">
    <div class="row justify-content-center">
        <div class="col-12">
            <img src="<?=Yii::getAlias('@web')?>/front/dist/uploads/404.svg" alt="">
            <p class="error-desc">Регистрируйся на портале и становись участником новой реферальной программы Incarnet.</p>
            <a href="/" class="button-custom">На главную</a>
        </div>
    </div>
</main>