<?php
    /**
     * Created by PhpStorm.
     * User: Cranky4
     * Date: 29.08.2015
     * Time: 7:17
     *
     * @var Request $model
     */

    Yii::app()->clientScript->registerCssFile(Yii::app()->assetManager->publish(Yii::getPathOfAlias('ygin.assets.bootstrap').'/css/datepicker.css'));
    Yii::app()->clientScript->registerScriptFile(Yii::app()->assetManager->publish(Yii::getPathOfAlias('ygin.assets.bootstrap').'/js/bootstrap-datepicker.js'),
      CClientScript::POS_END);
    Yii::app()->clientScript->registerScript('bootstrap-datepicker.init', '
        $(function(){
            $(".datepicker").datepicker({
                format: "dd.mm.yyyy"
            });
        });
    ');

    if (Yii::app()->user->hasFlash('request-status')) {
        $this->widget('AlertWidget', array(
          'title'   => 'Статус заявки',
          'message' => Yii::app()->user->getFlash('request-status'),
        ));
    }
?>

<?
    /**
     * @var $form CActiveForm
     */
    $form = $this->beginWidget('CActiveForm', array(
      'id'                     => 'requestForm',
      'enableAjaxValidation'   => true,
      'enableClientValidation' => true,
      'clientOptions'          => array(
        'validateOnSubmit' => true,
        'validateOnChange' => true,
      ),
      'errorMessageCssClass'   => 'label label-danger',
    ));
?>

<section id="anketa">
    <div class="container">
        <h2 class="text-center"> Анкета для заявки на НПФ </h2>
    </div>
</section>
<section>
    <div class="container">
        <div class="row">
            <div class="col-md-12 center-block">
                <div
                  style="padding: 10px; border-bottom: 1px dotted #6699cc; border-top: 1px dotted #6699cc; margin-bottom: 20px;">
                    <p style="padding: 0; margin: 0;">
                        Если Вы уже определились с выбором НПФ, то для ускорения процедуры составления договора
                        внимательно и без ошибок заполните все поля.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
<section>
    <div class="container">

        <div class="row">
            <div class="col-md-6">
                <div class="form-head">
                    <div class="box-head">
                        <div> Общие сведения</div>
                    </div>
                </div>

                <?= $form->labelEx($model, 'surname', array(
                  'class' => 'form-title',
                )) ?>
                <div class="input-field">
                    <?= $form->textField($model, 'surname', array(
                      'class' => 'form-control',
                    )) ?>
                    <?= $form->error($model, 'surname') ?>
                </div>

                <?= $form->labelEx($model, 'name', array(
                  'class' => 'form-title',
                )) ?>
                <div class="input-field">
                    <?= $form->textField($model, 'name', array(
                      'class' => 'form-control',
                    )) ?>
                    <?= $form->error($model, 'name') ?>
                </div>

                <?= $form->labelEx($model, 'patronymic', array(
                  'class' => 'form-title',
                )) ?>
                <div class="input-field">
                    <?= $form->textField($model, 'patronymic', array(
                      'class' => 'form-control',
                    )) ?>
                    <?= $form->error($model, 'patronymic') ?>
                </div>

            </div>
            <div class="col-md-6">
                <div class="form-head ">
                    <div class="box-head">
                        <div> Общие сведения</div>
                    </div>
                    <div class="checkbox">
                        <?= $form->checkBox($model, 'iChangeMyData', array()) ?>
                        <?= $form->labelEx($model, 'iChangeMyData', array()) ?>
                    </div>
                </div>


                <?= $form->labelEx($model, 'old_surname', array(
                  'class' => 'form-title',
                )) ?>
                <div class="input-field">
                    <?= $form->textField($model, 'old_surname', array(
                      'class' => 'form-control',
                    )) ?>
                    <?= $form->error($model, 'old_surname') ?>
                </div>

                <?= $form->labelEx($model, 'old_name', array(
                  'class' => 'form-title',
                )) ?>
                <div class="input-field">
                    <?= $form->textField($model, 'old_name', array(
                      'class' => 'form-control',
                    )) ?>
                    <?= $form->error($model, 'old_name') ?>
                </div>

                <?= $form->labelEx($model, 'old_patronymic', array(
                  'class' => 'form-title',
                )) ?>
                <div class="input-field">
                    <?= $form->textField($model, 'old_patronymic', array(
                      'class' => 'form-control',
                    )) ?>
                    <?= $form->error($model, 'old_patronymic') ?>
                </div>

            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <?= $form->labelEx($model, 'bdate', array(
                  'class' => 'form-title',
                )) ?>
                <div class="input-field">
                    <?= $form->textField($model, 'bdate', array(
                      'class' => 'form-control datepicker',
                    )) ?>
                    <?= $form->error($model, 'bdate') ?>
                </div>


                <?= $form->labelEx($model, 'sex', array(
                  'class' => 'form-title',
                )) ?>
                <div class="input-field">
                    <?= $form->dropDownList($model, 'sex', array(
                      '1' => 'Мужской',
                      '2' => 'Женский',
                    ), array(
                      'class' => 'form-control',
                    )) ?>
                    <?= $form->error($model, 'sex') ?>
                </div>

                <?= $form->labelEx($model, 'citizenship', array(
                  'class' => 'form-title',
                )) ?>
                <div class="input-field">
                    <?= $form->textField($model, 'citizenship', array(
                      'class' => 'form-control',
                    )) ?>
                    <?= $form->error($model, 'citizenship') ?>
                </div>

                <?= $form->labelEx($model, 'SNILS_number', array(
                  'class' => 'form-title',
                )) ?>
                <div class="input-field">
                    <?= $form->textField($model, 'SNILS_number', array(
                      'class' => 'form-control',
                    )) ?>
                    <?= $form->error($model, 'SNILS_number') ?>
                </div>

                <?= $form->labelEx($model, 'place_of_birth', array(
                  'class' => 'form-title',
                )) ?>
                <div class="input-field">
                    <?= $form->textField($model, 'place_of_birth', array(
                      'class' => 'form-control',
                    )) ?>
                    <?= $form->error($model, 'place_of_birth') ?>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="copy">

                    <div class="box-head">
                        <div> Паспортные данные</div>
                    </div>

                    <?= $form->labelEx($model, 'passport_serial', array(
                      'class' => 'form-title',
                    )) ?>
                    <div class="input-field">
                        <?= $form->textField($model, 'passport_serial', array(
                          'class' => 'form-control',
                        )) ?>
                        <?= $form->error($model, 'passport_serial') ?>
                    </div>

                    <?= $form->labelEx($model, 'passport_number', array(
                      'class' => 'form-title',
                    )) ?>
                    <div class="input-field">
                        <?= $form->textField($model, 'passport_number', array(
                          'class' => 'form-control',
                        )) ?>
                        <?= $form->error($model, 'passport_number') ?>
                    </div>

                    <?= $form->labelEx($model, 'passport_code_division', array(
                      'class' => 'form-title',
                    )) ?>
                    <div class="input-field">
                        <?= $form->textField($model, 'passport_code_division', array(
                          'class' => 'form-control',
                        )) ?>
                        <?= $form->error($model, 'passport_code_division') ?>
                    </div>

                    <?= $form->labelEx($model, 'passport_date', array(
                      'class' => 'form-title',
                    )) ?>
                    <div class="input-field">
                        <?= $form->textField($model, 'passport_date', array(
                          'class' => 'form-control datepicker',
                        )) ?>
                        <?= $form->error($model, 'passport_date') ?>
                    </div>

                    <?= $form->labelEx($model, 'passport_issued_by', array(
                      'class' => 'form-title',
                    )) ?>
                    <div class="input-field">
                        <?= $form->textField($model, 'passport_issued_by', array(
                          'class' => 'form-control',
                        )) ?>
                        <?= $form->error($model, 'passport_issued_by') ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="copy">
                    <div class="form-head">
                        <div class="box-head">
                            <div> Адрес регистрации</div>
                        </div>
                    </div>

                    <?= $form->labelEx($model, 'address_index', array(
                      'class' => 'form-title',
                    )) ?>
                    <div class="input-field">
                        <?= $form->textField($model, 'address_index', array(
                          'class' => 'form-control',
                        )) ?>
                        <?= $form->error($model, 'address_index') ?>
                    </div>

                    <?= $form->labelEx($model, 'address_subject', array(
                      'class' => 'form-title',
                    )) ?>
                    <div class="input-field">
                        <?= $form->textField($model, 'address_subject', array(
                          'class' => 'form-control',
                        )) ?>
                        <?= $form->error($model, 'address_subject') ?>
                    </div>

                    <?= $form->labelEx($model, 'address_raion', array(
                      'class' => 'form-title',
                    )) ?>
                    <div class="input-field">
                        <?= $form->textField($model, 'address_raion', array(
                          'class' => 'form-control',
                        )) ?>
                        <?= $form->error($model, 'address_raion') ?>
                    </div>

                    <?= $form->labelEx($model, 'address_city', array(
                      'class' => 'form-title',
                    )) ?>
                    <div class="input-field">
                        <?= $form->textField($model, 'address_city', array(
                          'class' => 'form-control',
                        )) ?>
                        <?= $form->error($model, 'address_city') ?>
                    </div>

                    <?= $form->labelEx($model, 'address_street', array(
                      'class' => 'form-title',
                    )) ?>
                    <div class="input-field">
                        <?= $form->textField($model, 'address_street', array(
                          'class' => 'form-control',
                        )) ?>
                        <?= $form->error($model, 'address_street') ?>
                    </div>

                    <?= $form->labelEx($model, 'address_house', array(
                      'class' => 'form-title',
                    )) ?>
                    <div class="input-field">
                        <?= $form->textField($model, 'address_house', array(
                          'class' => 'form-control',
                        )) ?>
                        <?= $form->error($model, 'address_house') ?>
                    </div>

                    <?= $form->labelEx($model, 'address_housing', array(
                      'class' => 'form-title',
                    )) ?>
                    <div class="input-field">
                        <?= $form->textField($model, 'address_housing', array(
                          'class' => 'form-control',
                        )) ?>
                        <?= $form->error($model, 'address_housing') ?>
                    </div>

                    <?= $form->labelEx($model, 'address_apartment', array(
                      'class' => 'form-title',
                    )) ?>
                    <div class="input-field">
                        <?= $form->textField($model, 'address_apartment', array(
                          'class' => 'form-control',
                        )) ?>
                        <?= $form->error($model, 'address_apartment') ?>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="copy">
                    <div class="form-head">
                        <div class="box-head">
                            <div> Адрес фактического проживания</div>
                        </div>
                        <div class="checkbox">
                            <?= $form->checkBox($model, 'matches_with_register_address') ?>
                            <?= $form->labelEx($model, 'matches_with_register_address') ?>
                        </div>
                    </div>
                    <?= $form->labelEx($model, 'fact_index', array(
                      'class' => 'form-title',
                    )) ?>
                    <div class="input-field">
                        <?= $form->textField($model, 'fact_index', array(
                          'class' => 'form-control',
                        )) ?>
                        <?= $form->error($model, 'fact_index') ?>
                    </div>

                    <?= $form->labelEx($model, 'fact_subject', array(
                      'class' => 'form-title',
                    )) ?>
                    <div class="input-field">
                        <?= $form->textField($model, 'fact_subject', array(
                          'class' => 'form-control',
                        )) ?>
                        <?= $form->error($model, 'fact_subject') ?>
                    </div>

                    <?= $form->labelEx($model, 'fact_raion', array(
                      'class' => 'form-title',
                    )) ?>
                    <div class="input-field">
                        <?= $form->textField($model, 'fact_raion', array(
                          'class' => 'form-control',
                        )) ?>
                        <?= $form->error($model, 'fact_raion') ?>
                    </div>

                    <?= $form->labelEx($model, 'fact_city', array(
                      'class' => 'form-title',
                    )) ?>
                    <div class="input-field">
                        <?= $form->textField($model, 'fact_city', array(
                          'class' => 'form-control',
                        )) ?>
                        <?= $form->error($model, 'fact_city') ?>
                    </div>

                    <?= $form->labelEx($model, 'fact_street', array(
                      'class' => 'form-title',
                    )) ?>
                    <div class="input-field">
                        <?= $form->textField($model, 'fact_street', array(
                          'class' => 'form-control',
                        )) ?>
                        <?= $form->error($model, 'fact_street') ?>
                    </div>

                    <?= $form->labelEx($model, 'fact_house', array(
                      'class' => 'form-title',
                    )) ?>
                    <div class="input-field">
                        <?= $form->textField($model, 'fact_house', array(
                          'class' => 'form-control',
                        )) ?>
                        <?= $form->error($model, 'fact_house') ?>
                    </div>

                    <?= $form->labelEx($model, 'fact_housing', array(
                      'class' => 'form-title',
                    )) ?>
                    <div class="input-field">
                        <?= $form->textField($model, 'fact_housing', array(
                          'class' => 'form-control',
                        )) ?>
                        <?= $form->error($model, 'fact_housing') ?>
                    </div>

                    <?= $form->labelEx($model, 'fact_apartment', array(
                      'class' => 'form-title',
                    )) ?>
                    <div class="input-field">
                        <?= $form->textField($model, 'fact_apartment', array(
                          'class' => 'form-control',
                        )) ?>
                        <?= $form->error($model, 'fact_apartment') ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="copy">
                    <div class="box-head">
                        <div> Контактные данные</div>
                    </div>
                    <?= $form->labelEx($model, 'home_phone', array(
                      'class' => 'form-title',
                    )) ?>
                    <div class="input-field">
                        <?= $form->textField($model, 'home_phone', array(
                          'class' => 'form-control',
                        )) ?>
                        <?= $form->error($model, 'home_phone') ?>
                    </div>

                    <?= $form->labelEx($model, 'phone', array(
                      'class' => 'form-title',
                    )) ?>
                    <div class="input-field">
                        <?= $form->textField($model, 'phone', array(
                          'class' => 'form-control',
                        )) ?>
                        <?= $form->error($model, 'phone') ?>
                    </div>

                    <?= $form->labelEx($model, 'email', array(
                      'class' => 'form-title',
                    )) ?>
                    <div class="input-field">
                        <?= $form->textField($model, 'email', array(
                          'class' => 'form-control',
                        )) ?>
                        <?= $form->error($model, 'email') ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="checkbox color-background-2" style="padding: 20px; margin-top:10px;">
                    <?= $form->checkBox($model, 'personal_data_agreement', array()) ?>
                    <label for="Request_personal_data_agreement" class="hand">Согласен(а) на обработку предоставленных
                        мною персональных данных в соответствии со ст. 9 Федерального закона от 27.07.2006 г. No152-ФЗ
                        «О персональных данных»</label>

                    <?= $form->error($model, 'personal_data_agreement') ?>
                </div>

                <div class="b-box center-block" style="margin-top:20px;">
                    <button type="submit" class="btn btn-blue btn-lg"> Оставить заявку</button>
                </div>

            </div>
        </div>
    </div>
</section>


<?php $this->endWidget(); ?>
