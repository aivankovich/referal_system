<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "solutions".
 *
 * @property int $id
 * @property string $name
 * @property string $price
 * @property string $tax
 * @property string $reward
 */
class Solutions extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'solutions';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['price', 'tax', 'reward'], 'number'],
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
            'price' => 'Price',
            'tax' => 'Tax',
            'reward' => 'Reward',
        ];
    }

    /**
     * {@inheritdoc}
     * @return SolutionsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new SolutionsQuery(get_called_class());
    }

    public static function findByID($id)
    {
        return static::find()->where(['id'=> $id])->one();
    }
}
