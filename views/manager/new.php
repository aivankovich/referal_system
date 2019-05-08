<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use app\components\StringTools;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Новые заявки';

?>
<main class="new-manager_page">
    <div class="container arrows-fix">
        <div class="row">
            <div class="col-12">
                <div class="table-container">
                    <div class="table-container_top">
                        <h1 class="page-title"><?=$this->title?></h1>
                        <div class="table-container_right">
                            <p class="counter-slides">
                                <span class="counter-slides_left">1</span>&nbsp;/
                                <span class="counter-slides_right">3</span>
                            </p>
                        </div>
                    </div>
                    <div class="table-container_information">
                        <ul class="legend-list">
                            <li class="legend-item">
                                <p class="legend-item_desc">№</p>
                            </li>
                            <li class="legend-item">
                                <p class="legend-item_desc">Дата</p>
                            </li>
                            <li class="legend-item">
                                <p class="legend-item_desc">Решение</p>
                            </li>
                            <li class="legend-item">
                                <p class="legend-item_desc">ID рефери</p>
                            </li>
                            <li class="legend-item">
                                <p class="legend-item_desc">Город</p>
                            </li>
                            <li class="legend-item">
                                <p class="legend-item_desc">Компания/ИНН</p>
                            </li>
                            <li class="legend-item">
                                <p class="legend-item_desc">ФИО</p>
                            </li>
                            <li class="legend-item">
                                <p class="legend-item_desc">Телефон</p>
                            </li>
                            <li class="legend-item">
                                <p class="legend-item_desc">E-mail</p>
                            </li>
                            <li class="legend-item">
                                <p class="legend-item_desc">Комментарий</p>
                            </li>
                            <li class="legend-item">
                                <p class="legend-item_desc">Принять</p>
                            </li>
                        </ul>
                        <div class="table-slider">
                            <?php foreach ($orders as $order) { ?>
                                <form method="post" class="table-slider_item manager-new-order-item_form">
                                    <ul class="table-inner_list">
                                        <li class="inner-item">
                                            <p class="inner-desc">
                                                <span class="desctop-hidden">№</span>
                                                <?=$order->id?></p>
                                        </li>
                                        <li class="inner-item">
                                            <p class="inner-desc">
                                                <span class="desctop-hidden">Дата </span>
                                                <?=($order->date ? date("d.m.Y", strtotime($order->date)) : '')?></p>
                                        </li>
                                        <li class="inner-item search-solution">
                                            <p class="inner-desc">
                                                <span class="desctop-hidden">Решение</span>
                                                <?=StringTools::getSolutionName($order->solution)?></p>
                                        </li>
                                        <li class="inner-item">
                                            <span class="desctop-hidden">ID рефери</span>
                                            <a href="<?=\yii\helpers\Url::toRoute(['manager/dealerprofile', 'id' => $order->dealer_id])?>"> <p class="inner-desc blue-underline"><?=$order->dealer_id?></p></a>
                                        </li>
                                        <li class="inner-item">
                                            <p class="inner-desc">
                                                <span class="desctop-hidden">Город</span>
                                                <?=$order->city?></p>
                                        </li>
                                        <li class="inner-item full-width">
                                            <p class="inner-desc ">
                                                <span class="desctop-hidden">Компания/ИНН</span>
                                                <?=$order->company?>/<?=$order->company_inn?></p>
                                        </li>
                                        <li class="inner-item full-width">
                                            <p class="inner-desc">
                                                <span class="desctop-hidden">ФИО</span>
                                                <?=$order->surname?> <?=$order->name?></p>
                                        </li>
                                        <li class="inner-item full-width">
                                            <p class="inner-desc">
                                                <span class="desctop-hidden">Телефон</span>
                                                <?=$order->phone?></p>
                                        </li>
                                        <li class="inner-item full-width">
                                            <p class="inner-desc">
                                                <span class="desctop-hidden">E-mail</span>
                                                <?=$order->email?></p>
                                        </li>
                                        <li class="inner-item full-width">
                                            <p class="inner-desc">
                                                <span class="desctop-hidden">Комментарий</span>
                                                <?=$order->comment?></p>
                                        </li>
                                        <li class="inner-item full-width">
                                            <button data-id="<?=$order->id?>" type="button" class="table-button order_accept_button">В&nbsp;работу</button>
                                        </li>
                                    </ul>
                                </form>
                            <?php } ?>
                            <button class="show-more-btn button-custom desctop-hidden">Смотреть ещё + <span></span></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>