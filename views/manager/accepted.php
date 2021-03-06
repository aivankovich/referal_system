<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Принятые заявки';
?>
<main class="new-manager_page accepted-manager_page">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="table-container">
                    <div class="table-container_top">
                        <h1 class="page-title"><?=$this->title?></h1>
                        <div class="table-container_right d-flex flex-row">
                            <form class="date-wrap" id="search_orders">
                                <svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg" style="left: 90px!important;">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M1.13027 13.8678V11.5468H3.37395V13.8678H1.13027ZM1.13027 10.4036V8.08258H3.37395V10.4036H1.13027ZM4.50422 13.8678V11.5468H6.74789V13.8678H4.50422ZM4.50422 10.4036V8.08258H6.74789V10.4036H4.50422ZM1.13027 6.93939V4.61838H3.37395V6.93939H1.13027ZM7.87816 13.8678V11.5468H10.1218V13.8678H7.87816ZM7.87816 10.4036V8.08258H10.1218V10.4036H7.87816ZM4.50422 6.93939V4.61838H6.74789V6.93939H4.50422ZM11.2521 13.8678V11.5468H13.4958V13.8678H11.2521ZM11.2521 10.4036V8.08258H13.4958V10.4036H11.2521ZM7.87816 6.93939V4.61838H10.1218V6.93939H7.87816ZM14.6261 13.8678V11.5468H16.8697V13.8678H14.6261ZM14.6261 10.4036V8.08258H16.8697V10.4036H14.6261ZM11.2521 6.93939V4.61838H13.4958V6.93939H11.2521ZM14.6261 6.93939V4.61838H16.8697V6.93939H14.6261ZM18 2.31468C18 1.6738 17.4939 1.15417 16.8697 1.15417H14.0525V2.31468H10.6785V1.15417H7.30459V2.31468H3.93065V1.15417H1.13027C0.506092 1.15417 0 1.6738 0 2.31468V13.8678C0 14.5087 0.506092 15.011 1.13027 15.011H16.8697C17.4939 15.011 18 14.5087 18 13.8678V2.31468ZM6.74789 0.0109863H4.50422V1.74309H6.74789V0.0109863ZM13.4958 0.0109863H11.2521V1.74309H13.4958V0.0109863Z" fill="#B1B1B1"/>
                                </svg>
                                <input name="from" id="search-date_from" type="text" value="<?=date('d.m.Y')?>" class="hidden-date">
                                -
                                <svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg" style="left: 225px!important;">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M1.13027 13.8678V11.5468H3.37395V13.8678H1.13027ZM1.13027 10.4036V8.08258H3.37395V10.4036H1.13027ZM4.50422 13.8678V11.5468H6.74789V13.8678H4.50422ZM4.50422 10.4036V8.08258H6.74789V10.4036H4.50422ZM1.13027 6.93939V4.61838H3.37395V6.93939H1.13027ZM7.87816 13.8678V11.5468H10.1218V13.8678H7.87816ZM7.87816 10.4036V8.08258H10.1218V10.4036H7.87816ZM4.50422 6.93939V4.61838H6.74789V6.93939H4.50422ZM11.2521 13.8678V11.5468H13.4958V13.8678H11.2521ZM11.2521 10.4036V8.08258H13.4958V10.4036H11.2521ZM7.87816 6.93939V4.61838H10.1218V6.93939H7.87816ZM14.6261 13.8678V11.5468H16.8697V13.8678H14.6261ZM14.6261 10.4036V8.08258H16.8697V10.4036H14.6261ZM11.2521 6.93939V4.61838H13.4958V6.93939H11.2521ZM14.6261 6.93939V4.61838H16.8697V6.93939H14.6261ZM18 2.31468C18 1.6738 17.4939 1.15417 16.8697 1.15417H14.0525V2.31468H10.6785V1.15417H7.30459V2.31468H3.93065V1.15417H1.13027C0.506092 1.15417 0 1.6738 0 2.31468V13.8678C0 14.5087 0.506092 15.011 1.13027 15.011H16.8697C17.4939 15.011 18 14.5087 18 13.8678V2.31468ZM6.74789 0.0109863H4.50422V1.74309H6.74789V0.0109863ZM13.4958 0.0109863H11.2521V1.74309H13.4958V0.0109863Z" fill="#B1B1B1"/>
                                </svg>
                                <input name="to" id="search-date_to" type="text" value="<?=date('d.m.Y')?>" class="hidden-date">
                                <input type="text" id="search" class="input-custom offset-left-20" name="search" autofocus="" placeholder="Поиск..." aria-required="true" aria-invalid="true">
                            </form>
                            <p class="counter-slides offset-top-10 offset-left-60">
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
                                <p class="legend-item_desc">Выбрать статус </p>
                            </li>
                        </ul>
                        <div class="table-slider">
                            <?php foreach ($orders as $order) { ?>
                            <form method="post" class="table-slider_item manager-accepted-order-item_form">
                                <ul class="table-inner_list">
                                    <li class="inner-item search-order_id">
                                        <p class="inner-desc">
                                            <span class="desctop-hidden">№</span>
                                            <input class="hidden" hidden name="id" value="<?= $order->id ?>">
                                            <?= $order->id ?>
                                        </p>
                                    </li>
                                    <li class="inner-item order-date">
                                        <p class="inner-desc">
                                            <span class="desctop-hidden">Дата</span>
                                            <?= ($order->date ? date("d.m.Y", strtotime($order->date)) : '') ?>
                                        </p>
                                    </li>
                                    <li class="inner-item search-solution">
                                        <span class="desctop-hidden">Решение</span>
                                        <div class="table-select_wrap mdi mdi-chevron-down">
                                            <select name="solution" class="table-select_model">
                                                <?php foreach ($solutions as $solution) { ?>
                                                    <option <?= ($order->solution == $solution->id ? 'selected' : '') ?>
                                                            value="<?= $solution->id ?>"><?= $solution->name ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </li>
                                    <li class="inner-item search-referi_id">
                                        <span class="desctop-hidden">ID рефери</span>
                                        <a href="<?= \yii\helpers\Url::toRoute(['manager/dealerprofile', 'id' => $order->dealer_id]) ?>">
                                            <p class="inner-desc blue-underline"><?= $order->dealer_id ?></p></a>
                                    </li>
                                    <li class="inner-item">
                                        <span class="desctop-hidden">Город</span>
                                        <select data-show-subtext="true" data-live-search="true" name="city" class="selectpicker">
                                            <?php
                                            foreach ($city as $item){
                                            ?>
                                                <option <?=($order->city == $item->name ? 'selected' : '')?> value="<?= $item->name ?>"><?= $item->name ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </li>
                                    <li class="inner-item search-company">
                                        <p class="inner-desc">
                                            <span class="desctop-hidden">Компания/ИНН</span>
                                            <input type="text" name="company" class="table-input order-comment" value="<?=$order->company?>">
                                            <input type="text" name="company_inn" class="table-input order-comment" value="<?=$order->company_inn?>">
                                        </p>
                                    </li>
                                    <li class="inner-item search-surname">
                                        <p class="inner-desc">
                                            <span class="desctop-hidden">ФИО</span>
                                            <input type="text" name="surname" class="table-input order-comment" value="<?=$order->surname?>">
                                            <input type="text" name="name" class="table-input order-comment" value="<?=$order->name?>">
                                    </li>
                                    <li class="inner-item full-width search-phone">
                                        <p class="inner-desc">
                                            <span class="desctop-hidden">Телефон</span>
                                            <input type="text" name="phone" class="table-input order-comment phone-mask" value="<?=$order->phone?>">
                                        </p>
                                    </li>
                                    <li class="inner-item full-width search-email">
                                        <p class="inner-desc">
                                            <span class="desctop-hidden">E-mail</span>
                                            <input type="text" name="email" class="table-input order-comment email-mask-fix" value="<?=$order->email?>">
                                        </p>
                                    </li>
                                    <li class="inner-item full-width">
                                        <span class="desctop-hidden">Комментарий</span>
                                        <textarea style="resize: none;" name="comment" class="table-input order-comment"><?=$order->comment?></textarea>
                                    </li>
                                    <li class="inner-item full-width">
                                        <div class="table-select_wrap mdi mdi-chevron-down">
                                            <select name="status" class="table-select_status status_blue ">
                                                <option value="5">Принятая</option>
                                                <option value="2">Зависшая</option>
                                                <option value="3">Отказ</option>
                                                <option value="4">Проданная</option>
                                            </select>
                                        </div>
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