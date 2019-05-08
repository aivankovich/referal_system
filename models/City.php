<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "solutions".
 *
 * @property int $id
 * @property string $name
 * @property string $region
 * @property string $federal
 */
class City extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'city';
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
            'region' => 'Region',
            'federal' => 'Federal',
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
}
