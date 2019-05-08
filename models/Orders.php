<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "orders".
 *
 * @property int $id
 * @property string $date
 * @property string $solution
 * @property string $dealer_id
 * @property string $city
 * @property string $comment
 * @property string $manager_id
 * @property string $to_work_date
 * @property string $restart_date
 * @property string $sold_date
 * @property string $status
 * @property string $reward
 * @property string $company
 * @property string $company_inn
 * @property string $name
 * @property string $surname
 * @property string $phone
 * @property string $email
 * @property string $person_type
 * @property string $street
 * @property string $house
 * @property string $flat
 * @property bool $approved
 */
class Orders extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'orders';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['date', 'to_work_date', 'restart_date', 'sold_date'], 'safe'],
            [['solution', 'dealer_id', 'city', 'comment', 'manager_id', 'status', 'reward', 'company', 'company_inn', 'phone', 'person_type', 'street', 'house', 'flat'], 'string', 'max' => 255],
            [['name', 'surname', 'email'], 'string', 'max' => 50],
            [['email'], 'email'],
            [['name', 'surname', 'email', 'phone', 'city', 'comment'], 'required'],
            ['status', 'default', 'value' =>'1'],
            ['date', 'default', 'value' => date('Y-m-d')],
            ['to_work_date', 'default', 'value' => null],
            ['restart_date', 'default', 'value' => null],
            ['solution', 'default', 'value' => '4'],
            ['company', 'default', 'value' => 'Не указано'],
            ['company_inn', 'default', 'value' => 'Не указано'],
            ['comment', 'default', 'value' => 'нет'],
            ['approved', 'default', 'value' => false],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Идентификатор',
            'date' => 'Дата',
            'solution' => 'Решение',
            'dealer_id' => 'Идентификатор рефери',
            'city' => 'Город',
            'comment' => 'Комментарий',
            'manager_id' => 'Идентификатор Менеджера',
            'to_work_date' => 'Дата В работу',
            'restart_date' => 'Дата рестарта',
            'sold_date' => 'Дата продажи',
            'status' => 'Статус',
            'reward' => 'Вознаграждение',
            'company' => 'Компания',
            'company_inn' => 'ИНН компании',
            'name' => 'Имя',
            'surname' => 'Фамилия',
            'phone' => 'Телефон',
            'email' => 'e-mail',
            'person_type' => 'Тип лица',
            'street' => 'Улица',
            'house' => 'Дом',
            'flat' => 'Квартира',
            'approved' => 'Подтверждено',
        ];
    }

    /**
     * {@inheritdoc}
     * @return OrdersQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new OrdersQuery(get_called_class());
    }

}
