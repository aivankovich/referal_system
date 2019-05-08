<?php
namespace app\widgets;

use Yii;
use app\models\Orders;

class ManagerMenuCounter extends \yii\bootstrap\Widget
{

    public function run()
    {
        Yii::$app->params['new_count'] = Orders::find()->where(['status' => '1'])->count();
        Yii::$app->params['hung_count']  = Orders::find()->where(['status' => '2'])->andWhere(['manager_id' => Yii::$app->user->getId()])->count();
        Yii::$app->params['canceled_count']  = Orders::find()->where(['status' => '3'])->andWhere(['manager_id' => Yii::$app->user->getId()])->count();
        Yii::$app->params['sold_count']  = Orders::find()->where(['status' => '4'])->andWhere(['manager_id' => Yii::$app->user->getId()])->count();
        Yii::$app->params['accepted_count']  = Orders::find()->where(['status' => '5'])->andWhere(['manager_id' => Yii::$app->user->getId()])->count();

        return true;
    }
}
