<?php

/**
 * Created by PhpStorm.
 * User: Cranky4
 * Date: 28.08.2015
 * Time: 21:24
 */
Yii::import('ygin.modules.feedback.models.Feedback');

class PFeedBack extends Feedback
{

    public function attributeLabels()
    {
        return CMap::mergeArray(parent::attributeLabels(), array(
            'fio' => 'Фио'
        ));
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        return array(
            array('fio, phone', 'required'),
//            array('mail', 'email', 'message' => 'Введен некорректный e-mail адрес'),
//            array('verifyCode', 'DaCaptchaValidator', 'caseSensitive' => true),
            array('fio, phone, mail', 'length', 'max' => 255),
            array(
                'phone',
                'match',
                'pattern' => '/(\d){6,10}/s',
                'message' => 'Введите телефон в 10-значном формате (9121122333)'
            ),
            array(
                'id_npf',
                'safe'
            ),
        );
    }

}