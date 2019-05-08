<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dealer_info".
 *
 * @property int $id
 * @property string $dealer_id
 * @property string $name
 * @property string $surname
 * @property string $phone
 * @property string $email
 * @property string $inn
 * @property string $snils
 * @property string $pasport_number
 * @property string $pasport_date
 * @property string $pasport_organization
 * @property string $pasport_organizarion_code
 * @property string $birthday
 * @property string $registration_region
 * @property string $registration_ciity
 * @property string $registration_street
 * @property string $registration_house
 * @property string $registration_corpus
 * @property string $registration_building
 * @property string $registration_flat
 * @property string $living_region
 * @property string $living_city
 * @property string $living_street
 * @property string $living_house
 * @property string $living_corpus
 * @property string $living_building
 * @property string $living_flat
 * @property string $bank_id
 * @property string $bank_checking_account
 * @property string $bank_correction_account
 * @property string $bank_name
 * @property string $sold_count
 * @property string $hung_count
 * @property string $canceled_count
 * @property string $registration_date
 */
class DealerInfo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'dealer_info';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['dealer_id', 'surname', 'phone', 'inn', 'snils', 'pasport_number', 'pasport_date', 'pasport_organization', 'pasport_organizarion_code', 'birthday', 'registration_region', 'registration_ciity', 'registration_street', 'registration_house', 'registration_corpus', 'registration_building', 'registration_flat', 'living_region', 'living_city', 'living_street', 'living_house', 'living_corpus', 'living_building', 'living_flat', 'bank_id', 'bank_checking_account', 'bank_correction_account', 'bank_name'], 'string', 'max' => 255],
            [['name', 'email'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Идентификатор пользователя',
            'dealer_id' => 'Идентификатор рефери',
            'name' => 'Имя',
            'surname' => 'Фамилия',
            'phone' => 'Телефон',
            'email' => 'e-mail',
            'inn' => 'ИНН',
            'snils' => 'СНИЛС',
            'pasport_number' => 'Номер паспорта',
            'pasport_date' => 'Дата выдачи паспорта',
            'pasport_organization' => 'Организация, выдавшая паспорт',
            'pasport_organizarion_code' => 'Код подразделения',
            'birthday' => 'Дата рождения',
            'registration_region' => 'Регион регистрации',
            'registration_ciity' => 'Город регистрации',
            'registration_street' => 'Улица',
            'registration_house' => 'Дом',
            'registration_corpus' => 'Корпус',
            'registration_building' => 'Строение',
            'registration_flat' => 'Квартира',
            'living_region' => 'Регион проживания',
            'living_city' => 'Город проживания',
            'living_street' => 'Улица',
            'living_house' => 'Дом',
            'living_corpus' => 'Корпус',
            'living_building' => 'Строение',
            'living_flat' => 'Квартира',
            'bank_id' => 'БИК',
            'bank_checking_account' => 'Рассчетный счет',
            'bank_correction_account' => 'Коррекционный счет',
            'bank_name' => 'Название банка',
            'sold_count' => 'Проданных заявок',
            'hung_count' => 'Зависших заявок',
            'canceled_count' => 'Отмененных заявок',
            'registration_date' => 'Дата регистрации',
        ];
    }

    /**
     * {@inheritdoc}
     * @return DealerInfoQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new DealerInfoQuery(get_called_class());
    }
}
