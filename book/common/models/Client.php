<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "Client".
 *
 * @property integer $id
 * @property string $address
 * @property string $first_name
 * @property string $last_name
 * @property string $patronymic
 * @property integer $status
 *
 * @property IssuingBooks[] $issuingBooks
 */
class Client extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Client';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['address', 'first_name', 'last_name', 'patronymic'], 'required','message'=>'Поле обязательно для заполнения'],
            [['first_name', 'last_name', 'patronymic'], 'string'],
            [['status'], 'integer'],
            [['address'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'address' => 'Адрес',
            'first_name' => 'Фамилия',
            'last_name' => 'Имя',
            'patronymic' => 'Отчество',
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIssuing_books()
    {
        return $this->hasMany(Issuing_books::className(), ['id_client' => 'id']);
    }
}
