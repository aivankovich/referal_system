<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Отчет по рефери';
?>
<main class="report-manager_page">
    <div class="container">
        <div class="row justify-content-center ">
            <div class="col-lg-11 report-date-cont">
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
                </div>
            </div>
            <div class="col-lg-12 report-diller_list__wrap">
                <ul class="report-diller_list">
                    <li class="report-diller_item report-diller_item__first mobile-hidden">
                        <p class="report-desc report-desc_first_manager">Дата регистрации</p>
                        <p class="report-desc report-desc_first_manager">ID</p>
                        <p class="report-desc report-desc_second_manager">Принятые</p>
                        <p class="report-desc report-desc_fourth_manager">Проданные</p>
                        <p class="report-desc report-desc_third_manager">Зависшие</p>
                        <p class="report-desc report-desc_fifth_manager">Отказные</p>
                    </li>
                    <li class="report-diller_item report-diller_item__all">
                        <p class="report-desc report-desc_first_manager"><span class="desctop-hidden">&nbsp;</span><strong>Всего</strong></p>
                        <p class="report-desc report-desc_first_manager"><span class="desctop-hidden">Всего</span> <span class="dealers__count__total"><?=count($dealers)?></span></p>
                        <p class="report-desc report-desc_second_manager"><span class="desctop-hidden">Принятые</span> <span class="accepted__count__total"><?=$summ_accepted?></span></p>
                        <p class="report-desc report-desc_fourth_manager"><span class="desctop-hidden">Проданные</span> <span class="sold__count__total"><?=$summ_sold?></span></p>
                        <p class="report-desc report-desc_third_manager"><span class="desctop-hidden">Зависшие</span> <span class="hung__count__total"><?=$summ_hung?></span></p>
                        <p class="report-desc report-desc_fifth_manager"><span class="desctop-hidden">Отказные</span> <span class="cancelled__count__total"><?=$summ_canceled?></span></p>
                    </li>
                    <?php foreach ($dealers as $dealer){ ?>
                        <li class="report-diller_item">
                            <p class="report-desc report-desc_first_manager"><span class="desctop-hidden">Дата регистрации</span> <span class="order-date"><?=date('d.m.Y', strtotime($dealer->registration_date))?></span></p>
                            <p class="report-desc report-desc_first_manager"><span class="desctop-hidden">ID</span><a class="search-referi_id" href="<?=\yii\helpers\Url::toRoute(['seller/dealerprofile', 'id' => $dealer->dealer_id])?>"><?=$dealer->dealer_id?></a></p>
                            <p class="report-desc report-desc_second_manager"><span class="desctop-hidden">Принятые</span> <span class="accepted__count"><?=$dealer->accepted_count?></span></p>
                            <p class="report-desc report-desc_fourth_manager"><span class="desctop-hidden">Проданные </span> <span class="sold__count"><?=$dealer->sold_count?></span></p>
                            <p class="report-desc report-desc_third_manager"><span class="desctop-hidden">Завсишие</span> <span class="hung__count"><?=$dealer->hung_count?></span></p>
                            <p class="report-desc report-desc_fifth_manager"><span class="desctop-hidden">Отказные</span> <span class="cancelled__count"><?=$dealer->canceled_count?></span></p>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </div>
</main>