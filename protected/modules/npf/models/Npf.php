<?php

    /**
     * Модель для таблицы "pr_npf".
     *
     * The followings are the available columns in table 'pr_npf':
     * @property integer $id_npf
     * @property integer $logo
     * @property string $title
     * @property integer $reliability
     * @property integer $accumulation
     * @property integer $profitability
     * @property string $date_create
     * @property string $date_update
     * @property string $description
     *
     * The followings are the available model relations:
     * @property File $logoFile
     */
    class Npf extends DaActiveRecord
    {

        const ID_OBJECT = 'project-npf';

        protected $idObject = self::ID_OBJECT;

        /**
         * Returns the static model of the specified AR class.
         *
         * @param string $className active record class name.
         *
         * @return Npf the static model class
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
            return 'pr_npf';
        }

        /**
         * @return array validation rules for model attributes.
         */
        public function rules()
        {
            return array(
              array('title', 'required'),
              array('logo, reliability, accumulation', 'numerical', 'integerOnly' => true),
              array('title, profitability', 'length', 'max' => 255),
              array('date_create, date_update', 'length', 'max' => 10),
              array('description', 'safe'),
            );
        }

        /**
         * @return array relational rules.
         */
        public function relations()
        {
            return array(
              'logoFile' => array(self::BELONGS_TO, 'File', 'logo'),
            );
        }

        /**
         * @return array customized attribute labels (name=>label)
         */
        public function attributeLabels()
        {
            return array(
              'id_npf'        => 'ID',
              'logo'          => 'Лого',
              'title'         => 'Название',
              'reliability'   => 'Надежность',
              'accumulation'  => 'Накопление',
              'profitability' => 'Доходность',
              'date_create'   => 'Дата создания',
              'date_update'   => 'Дата изменения',
              'description'   => 'Описание',
            );
        }


        public function getLogoPath()
        {
            if ($this->logo) {
                return $this->logoFile->getFilePath();
            }

            return false;
        }

        public function beforeSave()
        {
            if ($this->isNewRecord) {
                $this->date_create = time();
            }
            $this->date_update = time();

            return parent::beforeSave();
        }

        public function getAccumulation()
        {
            return number_format($this->accumulation, 0, ",", ",")." ₽";
        }


        /**
         * @return array
         */
        public static function getList()
        {
            if ($models = self::model()->findAll()) {
                return CHtml::listData($models, 'id_npf', 'title');
            }

            return array();
        }
    }