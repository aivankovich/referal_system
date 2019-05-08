<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Полезная информация';
?>
<main class="infortmation-diller_page">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <h1 class="page-title">Полезная информация</h1>
            </div>
            <div class="col-lg-10 no-padding-mobile">
                <ul class="inf-diller_list">
                    <li class="inf-diller_item">
                        <p class="desc">Инструкция по&nbsp;заполнению личных данных
                            в&nbsp;Профиле</p>
                        <a href="/docs/profile_guide.pdf" target="_blank">
                            <img src="<?=Yii::getAlias('@web')?>/front/dist/img/download.svg" alt="Загрузить">
                            <p class="desc">скачать</p>
                        </a>
                    </li>
                    <li class="inf-diller_item">
                        <p class="desc">Инструкция по&nbsp;созданию заявки на&nbsp;продажу решений Incarnet</p>
                        <a href="/docs/order_guide.pdf" target="_blank">
                            <img src="<?=Yii::getAlias('@web')?>/front/dist/img/download.svg" alt="Загрузить">
                            <p class="desc">скачать</p>
                        </a>
                    </li>
<!--                    <li class="inf-diller_item">-->
<!--                        <p class="desc">Краткий курс для рефери</p>-->
<!--                        <a href="" target="_blank">-->
<!--                            <img src="--><?//=Yii::getAlias('@web')?><!--/front/dist/img/download.svg" alt="Загрузить">-->
<!--                            <p class="desc">скачать</p>-->
<!--                        </a>-->
<!--                    </li>-->
<!--                    <li class="inf-diller_item">-->
<!--                        <p class="desc">Как зарабатывать с&nbsp;Incarnet</p>-->
<!--                        <a href="" target="_blank">-->
<!--                            <img src="--><?//=Yii::getAlias('@web')?><!--/front/dist/img/download.svg" alt="Загрузить">-->
<!--                            <p class="desc">скачать</p>-->
<!--                        </a>-->
<!--                    </li>-->
                    <li class="inf-diller_item">
                        <p class="desc">Презентация решений Incarnet</p>
                        <a href="/docs/presentation.pdf" target="_blank">
                            <img src="<?=Yii::getAlias('@web')?>/front/dist/img/download.svg" alt="Загрузить">
                            <p class="desc">скачать</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</main>