<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "book".
 *
 * @property integer $id
 * @property string $name
 * @property string $author
 * @property string $publishing_house
 * @property integer $status
 *
 * @property IssuingBooks[] $issuingBooks
 */
class Book extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'book';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
		[
		['name','author','publishing_house','status'], 'required','message'=>'Поле обязательно для заполнения'],
            [['name', 'author'], 'string'],
            [['status'], 'integer'],
            [['publishing_house'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Наименование',
            'author' => 'Автор',
            'publishing_house' => 'Издательство',
            'status' => 'В наличие',
			'id_client' => 'id Клиента'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
	  
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIssuing_books()
    {
        return $this->hasMany(Issuing_books::className(), ['id_book' => 'id']);
    }
}
