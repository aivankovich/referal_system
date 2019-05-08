<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/png', 'href' => Yii::getAlias('@web').'/front/dist/favicon/favicon16.png']);
\app\widgets\DealerMenuCounter::widget();
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<?php $this->beginBody() ?>
<body>
<header class="header container">
    <div class="row">
        <div class="col-lg-3 col-6">
            <a href="/">
                <img src="<?=Yii::getAlias('@web')?>/front/dist/img/logo.svg" alt="Incarnet" class="mobile-hidden">
                <img src="<?=Yii::getAlias('@web')?>/front/dist/img/logo_mob.svg" alt="Incarnet" class="desctop-hidden mob-logo">
            </a>
        </div>
        <nav class="nav-menu nav-menu_manager col-lg-9 mobile-hidden">
            <ul class="nav-menu_list nav-menu_list_manager">
                <li class="nav-item">
                    <a href="<?=Url::toRoute(['seller/new'])?>" class="nav-item_link manager-head_counter <?=(Url::to() == Url::toRoute(['seller/new']) ? 'button-custom manager-head_counter_color seleted-btn new-btn' : '')?>">Новые заявки
                        <span class="counter"><?=Yii::$app->params['new_count']?></span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?=Url::toRoute(['seller/accepted'])?>" class="nav-item_link manager-head_counter <?=(Url::to() == Url::toRoute(['seller/accepted']) ? 'button-custom manager-head_counter_color seleted-btn new-btn' : '')?>">Принятые
                        <span class="counter"><?=Yii::$app->params['accepted_count']?></span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?=Url::toRoute(['seller/hung'])?>" class="nav-item_link manager-head_counter <?=(Url::to() == Url::toRoute(['seller/hung']) ? 'button-custom manager-head_counter_color seleted-btn new-btn' : '')?>">Зависшие
                        <span class="counter"><?=Yii::$app->params['hung_count']?></span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?=Url::toRoute(['seller/sold'])?>" class="nav-item_link manager-head_counter <?=(Url::to() == Url::toRoute(['seller/sold']) ? 'button-custom manager-head_counter_color seleted-btn new-btn' : '')?>">Проданные
                        <span class="counter"><?=Yii::$app->params['sold_count']?></span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?=Url::toRoute(['seller/canceled'])?>" class="nav-item_link manager-head_counter <?=(Url::to() == Url::toRoute(['seller/canceled']) ? 'button-custom manager-head_counter_color seleted-btn new-btn' : '')?>">Отказные
                        <span class="counter"><?=Yii::$app->params['canceled_count']?></span>
                    </a>
                </li>
            </ul>
            <ul class="profile-list">
                <li class="profile-item">
                    <a href="<?=Url::toRoute(['seller/profile', 'id' => Yii::$app->user->getId()])?>" class="avt avt_login">Ваш ID/</a>
                    <?= Html::a("Выход", ['site/logout'], ['data' => ['method' => 'post'],'class' => 'avt avt_login']);?>
                </li>
                <li class="profile-item">
                    <a href="<?=Url::toRoute(['seller/profile', 'id' => Yii::$app->user->getId()])?>" class="reg reg_login"><?=Yii::$app->user->getId()?></a>
                </li>
            </ul>
        </nav>
        <button type="button" class="desctop-hidden burger-btn col-6">Меню
            <span class="line1"></span>
            <span class="line2"></span>
            <span class="line3"></span>
        </button>
    </div>
</header>
<div class="mobile-menu desctop-hidden container">
    <div class="row">
        <a href="/" class="col-6">
            <img src="<?=Yii::getAlias('@web')?>/front/dist/img/logo_mob.svg" alt="Incarnet" class="mob-logo">
        </a>
        <button type="button" class="close-menu mdi mdi-close col-6">Закрыть</button>
        <div class="col-7 lined1">
            <div class="lined1-cont">
                <a href="<?=Url::toRoute(['seller/profile', 'id' => Yii::$app->user->getId()])?>">Ваш ID</a>
                <p><a href="<?=Url::toRoute(['seller/profile', 'id' => Yii::$app->user->getId()])?>">1000153881</a></p>
            </div>
        </div>
        <?= Html::a("Выход", ['site/logout'], ['data' => ['method' => 'post'] , 'class' => 'lined2 col-5']);?>
        <a href="<?=Url::toRoute(['seller/new'])?>" class="button-custom col-12 menu-btn_inner <?=(Url::to() == Url::toRoute(['seller/new']) ? 'seleted-btn' : '')?>">Новые заявки
            <span class="counter"><?=Yii::$app->params['new_count']?></span>
        </a>
        <a href="<?=Url::toRoute(['seller/accepted'])?>" class="button-custom col-12 menu-btn_inner <?=(Url::to() == Url::toRoute(['seller/accepted']) ? 'seleted-btn' : '')?>">Принятые
            <span class="counter"><?=Yii::$app->params['accepted_count']?></span>
        </a>
        <a href="<?=Url::toRoute(['seller/hung'])?>" class="button-custom col-12 menu-btn_inner <?=(Url::to() == Url::toRoute(['seller/hung']) ? 'seleted-btn' : '')?>">Зависшие
            <span class="counter"><?=Yii::$app->params['hung_count']?></span>
        </a>
        <a href="<?=Url::toRoute(['seller/sold'])?>" class="button-custom col-12 menu-btn_inner <?=(Url::to() == Url::toRoute(['seller/sold']) ? 'seleted-btn' : '')?>">Проданные
            <span class="counter"><?=Yii::$app->params['sold_count']?></span>
        </a>
        <a href="<?=Url::toRoute(['seller/canceled'])?>" class="button-custom col-12 menu-btn_inner <?=(Url::to() == Url::toRoute(['seller/canceled']) ? 'seleted-btn' : '')?>">Отказные
            <span class="counter"><?=Yii::$app->params['canceled_count']?></span>
        </a>
        <a href="<?=Url::toRoute(['seller/report'])?>" class="button-custom col-12 menu-btn_inner <?=(Url::to() == Url::toRoute(['seller/report']) ? 'seleted-btn' : '')?>">Отчет
        </a>
        <a href="<?=Url::toRoute(['seller/dealers'])?>" class="button-custom col-12 menu-btn_inner <?=(Url::to() == Url::toRoute(['seller/dealers']) ? 'seleted-btn' : '')?>">Рефери
        </a>
        <?= Html::a("Выход", ['site/logout'], ['data' => ['method' => 'post'] , 'class' => 'button-custom col-12 menu-btn_inner']);?>
    </div>
</div>
<?= $content ?>
<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 m-order-10 footer-logo_cont">
                <a href="/">
                    <img src="<?=Yii::getAlias('@web')?>/front/dist/img/logo.svg" alt="Incarnet">
                </a>
                <p class="copyright">&copy;&nbsp;Incarnet <?= date('Y') ?></p>
            </div>
            <div class="col-lg-3 mobile-hidden offset-lg-1">
                <ul class="footer-nav">
                    <li class="footer-nav_item">
                        <a href="<?=Url::toRoute(['site/about'])?>" class="footer-title">Информация</a>
                    </li>
                    <li class="footer-nav_item">
                        <a href="<?=Url::toRoute(['seller/report'])?>" class="footer-title">Отчет</a>
                    </li>
                    <li class="footer-nav_item">
                        <a href="<?=Url::toRoute(['seller/dealers'])?>" class="footer-title">Рефери</a>
                    </li>
                </ul>
            </div>
            <div class="col-lg-3 m-order-0">

            </div>
            <div class="col-lg-2 m-order-1">
                <h4 class="footer-title">Соц.Сети</h4>
                <ul class="social-list">
                    <li class="social-item">
                        <a href="//facebook.com/Incarnet.ru" class="mdi mdi-facebook">

                        </a>
                    </li>
                    <li class="social-item">
                        <a href="//vk.com/incarnet" class="mdi mdi-vk">

                        </a>
                    </li>
                    <li class="social-item">
                        <a href="//youtube.com/channel/UCJFstKmbj4h-2dehX67iUeg?view_as=subscriber" class="mdi mdi-youtube">

                        </a>
                    </li>
                    <li class="social-item">
                        <a href="//instagram.com/incarnet.ru" class="mdi mdi-instagram">

                        </a>
                    </li>
                    <li class="social-item">
                        <a href="//linkedin.com/company/10626028" class="mdi mdi-linkedin">

                        </a>
                    </li>
                </ul>
            </div>

        </div>
</footer>
<div class="modal-overlay"></div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
