<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[OrderStatus]].
 *
 * @see OrderStatus
 */
class OrderStatusQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return OrderStatus[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return OrderStatus|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
