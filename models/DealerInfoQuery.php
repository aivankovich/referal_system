<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[DealerInfo]].
 *
 * @see DealerInfo
 */
class DealerInfoQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return DealerInfo[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return DealerInfo|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
