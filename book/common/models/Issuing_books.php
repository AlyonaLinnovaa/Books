<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "issuing_books".
 *
 * @property integer $id
 * @property integer $id_client
 * @property integer $id_book
 * @property string $date_issuing
 * @property string $return_date
 * @property string $the_actual_date_of_return
 *
 * @property Client $idClient
 * @property Book $idBook
 */
class Issuing_books extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'issuing_books';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
		[
		[ 'id_client','id_book','date_issuing' ,'return_date'], 'required','message'=>'Поле обязательно для заполнения'],
		    [['id_client', 'id_book', 'date_issuing', 'return_date'], 'required'],
            [['id_client', 'id_book'], 'integer'],
            [['date_issuing', 'return_date', 'the_actual_date_of_return'], 'safe'],
            [['id_client'], 'exist', 'skipOnError' => true, 'targetClass' => Client::className(), 'targetAttribute' => ['id_client' => 'id']],
            [['id_book'], 'exist', 'skipOnError' => true, 'targetClass' => Book::className(), 'targetAttribute' => ['id_book' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_client' => 'Номер клиента',
            'id_book' => 'Номер книги',
            'date_issuing' => 'Дата выдачи',
            'return_date' => 'Дата возврата',
            'the_actual_date_of_return' => 'Фактическая дата возврата',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdClient()
    {
        return $this->hasOne(Client::className(), ['id' => 'id_client']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdBook()
    {
        return $this->hasOne(Book::className(), ['id' => 'id_book']);
    }
}
