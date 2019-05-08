<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "order_status".
 *
 * @property int $id
 * @property string $name
 */
class OrderStatus extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'order_status';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
        ];
    }

    /**
     * {@inheritdoc}
     * @return OrderStatusQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new OrderStatusQuery(get_called_class());
    }
}
