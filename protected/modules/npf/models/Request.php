<?php

    /**
     * Модель для таблицы "pr_request".
     *
     * The followings are the available columns in table 'pr_request':
     * @property integer $id_request
     * @property string $surname
     * @property string $name
     * @property string $patronymic
     * @property integer $iChangeMyData
     * @property string $old_surname
     * @property string $old_name
     * @property string $old_patronymic
     * @property integer $bdate
     * @property integer $sex
     * @property string $place_of_birth
     * @property string $citizenship
     * @property string $SNILS_number
     * @property string $passport_serial
     * @property string $passport_number
     * @property string $passport_code_division
     * @property string $passport_date
     * @property string $passport_issued_by
     * @property string $address_index
     * @property string $address_subject
     * @property string $address_raion
     * @property string $address_city
     * @property string $address_street
     * @property string $address_house
     * @property string $address_housing
     * @property string $address_apartment
     * @property integer $matches_with_register_address
     * @property string $fact_index
     * @property string $fact_subject
     * @property string $fact_raion
     * @property string $fact_city
     * @property string $fact_street
     * @property string $fact_house
     * @property string $fact_housing
     * @property string $fact_apartment
     * @property string $home_phone
     * @property string $phone
     * @property string $email
     * @property integer $personal_data_agreement
     */
    class Request extends DaActiveRecord
    {

        const ID_OBJECT = 'project-zayavka';

        protected $idObject = self::ID_OBJECT;

        /**
         * Returns the static model of the specified AR class.
         *
         * @param string $className active record class name.
         *
         * @return Request the static model class
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
            return 'pr_request';
        }

        /**
         * @return array validation rules for model attributes.
         */
        public function rules()
        {
            return array(
              array(
                'surname, name, patronymic, bdate, sex, place_of_birth, citizenship, SNILS_number,
                passport_serial, passport_number, passport_code_division, passport_date, passport_issued_by,
                address_index, address_subject, address_city, address_street, address_house, address_apartment, phone, email,
                personal_data_agreement',
                'required',
              ),
              array(
                'iChangeMyData, sex, matches_with_register_address, personal_data_agreement, passport_serial, passport_number',
                'numerical',
                'integerOnly' => true,
              ),
              array(
                'surname, name, patronymic, old_surname, old_name, old_patronymic, place_of_birth, citizenship,
                SNILS_number, passport_serial, passport_number,
                passport_code_division, passport_date, passport_issued_by, address_index, address_subject, address_raion,
                 address_city, address_street, address_house, address_housing, address_apartment,
                 fact_index, fact_subject, fact_raion, fact_city, fact_street, fact_house, fact_housing, fact_apartment,
                  home_phone, phone, email',
                'length',
                'max' => 255,
              ),
              array(
                'iChangeMyData',
                'addRequiredFields',
                'checked' => true,
                'fields'  => array(
                  'old_surname',
                  'old_name',
                  'old_patronymic',
                ),
              ),
              array(
                'matches_with_register_address',
                'addRequiredFields',
                'checked' => false,
                'fields'  => array(
                  'fact_index',
                  'fact_subject',
                  'fact_raion',
                  'fact_city',
                  'fact_street',
                  'fact_house',
                  'fact_housing',
                  'fact_apartment',
                ),
              ),
              array(
                'SNILS_number',
                'match',
                'pattern' => '/^(\d){3,3}\-(\d){3,3}\-(\d){3,3}\s(\d){2,2}$/s',
                'message' => 'Введите номер в формате 123-456-789 00',
              ),
              array(
                'passport_serial',
                'length',
                'min'     => 4,
                'max'     => 4,
                'message' => 'Серия паспорта в формате XXXX',
              ),
              array(
                'passport_number',
                'length',
                'min'     => 6,
                'max'     => 6,
                'message' => 'Номер паспорта в формате XXXXXX',
              ),
              array(
                'email',
                'email',
              ),
              array(
                'home_phone ,phone',
                'match',
                'pattern' => '/^(\d){6,10}$/s',
                'message' => 'Введите телефон в 10-значном формате (9121122333)',
              ),
            );
        }

        public function addRequiredFields($attr, $params)
        {
            if ($params['checked']) {
                if ($this->$attr) {
                    foreach ($params['fields'] as $field) {
                        if (!$this->$field) {
                            $this->addError($field, "Нужно заполнить \"{$this->getAttributeLabel($field)}\"");
                        }
                    }
                }
            } else {
                if (!$this->$attr) {
                    foreach ($params['fields'] as $field) {
                        if (!$this->$field) {
                            $this->addError($field, "Нужно заполнить \"{$this->getAttributeLabel($field)}\"");
                        }
                    }
                }
            }
        }

        /**
         * @return array relational rules.
         */
        public function relations()
        {
            return array();
        }

        /**
         * @return array customized attribute labels (name=>label)
         */
        public function attributeLabels()
        {
            return array(
              'id_request'                    => 'ID',
              'surname'                       => 'Фамилия',
              'name'                          => 'Имя',
              'patronymic'                    => 'Отчество',
              'iChangeMyData'                 => 'Я менял(а) свои данные',
              'old_surname'                   => 'Фамилия при рождении',
              'old_name'                      => 'Имя при рождении',
              'old_patronymic'                => 'Отчество при рождении',
              'bdate'                         => 'Дата рождения',
              'sex'                           => 'Пол',
              'place_of_birth'                => 'Место рождения (указанное в СНИЛС)',
              'citizenship'                   => 'Гражданство',
              'SNILS_number'                  => 'Номер страхового свидетельства обязательного пенсионного страхования',
              'passport_serial'               => 'Серия',
              'passport_number'               => 'Номер',
              'passport_code_division'        => 'Код подразделения',
              'passport_date'                 => 'Дата выдачи',
              'passport_issued_by'            => 'Кем выдан',
              'address_index'                 => 'Индекс',
              'address_subject'               => 'Субъект РФ',
              'address_raion'                 => 'Район',
              'address_city'                  => 'Населенный пункт',
              'address_street'                => 'Улица',
              'address_house'                 => 'Дом',
              'address_housing'               => 'Корпус',
              'address_apartment'             => 'Квартира',
              'matches_with_register_address' => 'Совпадает с адресом регистрации',
              'fact_index'                    => 'Индекс',
              'fact_subject'                  => 'Субъект РФ',
              'fact_raion'                    => 'Район',
              'fact_city'                     => 'Населенный пункт',
              'fact_street'                   => 'Улица',
              'fact_house'                    => 'Дом',
              'fact_housing'                  => 'Корпус',
              'fact_apartment'                => 'Квартира',
              'home_phone'                    => 'Домашний телефон',
              'phone'                         => 'Мобильный телефон',
              'email'                         => 'E-mail',
              'personal_data_agreement'       => 'Согласен(а) на обработку персональных данных ',
            );
        }

    }