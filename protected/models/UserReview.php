<?php

/**
 * Модель для таблицы "pr_users_reviews".
 *
 * The followings are the available columns in table 'pr_users_reviews':
 * @property integer $id_users_reviews
 * @property integer $photo
 * @property string $name
 * @property string $city
 * @property string $text
 *
 * The followings are the available model relations:
 * @property File $photoFile
 */
class UserReview extends DaActiveRecord
{

    const ID_OBJECT = 'project-otzyv';

    protected $idObject = self::ID_OBJECT;

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return UserReview the static model class
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'pr_users_reviews';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        return array(
            array('photo, name, text', 'required'),
            array('photo', 'numerical', 'integerOnly' => true),
            array('name, city', 'length', 'max' => 255),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations()
    {
        return array(
            'photoFile' => array(self::BELONGS_TO, 'File', 'photo'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id_users_reviews' => 'ID',
            'photo' => 'Фото',
            'name' => 'Имя',
            'city' => 'Город',
            'text' => 'Текст',
        );
    }

    public function getPhotoPath()
    {
        if ($this->photo) {
            return $this->photoFile->getFilePath();
        }
        return false;
    }

}