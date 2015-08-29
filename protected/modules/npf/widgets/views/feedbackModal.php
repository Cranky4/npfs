<?php
/**
 * Created by PhpStorm.
 * User: Cranky4
 * Date: 28.08.2015
 * Time: 21:28
 *
 * @var Npf $model
 */
?>

<?php

if (Yii::app()->user->hasFlash('feedback-success')) {
    $this->widget('AlertWidget', array(
        'title' => 'Обратная связь',
        'message' => Yii::app()->user->getFlash('feedback-success'),
    ));
}
?>

<div class="modal fade bs-example-modal-lg npf-modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3 class="text-center modal-name"> АО «Европейский ПФ» </h3>
            </div>
            <div class="modal-body">

                <?
                /**
                 * @var $form CActiveForm
                 */
                $form = $this->beginWidget('CActiveForm', array(
                    'id' => 'feedbackForm',
                    'enableAjaxValidation' => true,
                    'enableClientValidation' => true,
                    'focus' => array($model, 'fio'),
                    'clientOptions' => array(
                        'validateOnSubmit' => true,
                        'validateOnChange' => true,
                    ),
                    'errorMessageCssClass' => 'label label-danger',
                    'action' => Yii::app()->createUrl(FeedbackModule::ROUTE_FEEDBACK),
                ));
                ?>
                <div class="m-box center-block">
                    <div class="form-group input-group-lg">
                        <?php echo $form->labelEx($model, 'fio', array('class' => '')); ?>
                        <?php echo $form->textField($model, 'fio',
                            array(
                                'class' => 'form-control focused',
                                'autocomplete' => 'off',
                                'placeholder' => $model->getAttributeLabel('fio')
                            )); ?>
                        <?php echo $form->error($model, 'fio'); ?>
                    </div>
                    <div class="form-group input-group-lg">
                        <?php echo $form->labelEx($model, 'phone', array('class' => '')); ?>
                        <?php echo $form->textField($model, 'phone',
                            array(
                                'class' => 'form-control focused',
                                'autocomplete' => 'off',
                                'placeholder' => $model->getAttributeLabel('phone')
                            )); ?>
                        <?php echo $form->error($model, 'phone'); ?>
                    </div>
                </div>
                <div class="m-box center-block">
                    <?= $form->hiddenField($model, 'id_npf') ?>
                    <button type="submit" class="btn btn-blue btn-block btn-lg"> Отправить</button>
                    <div class="or center-block"> или</div>
                    <a class="btn btn-blue btn-block btn-lg"
                       href="<?= Yii::app()->createUrl('npf/default/blank') ?>" target="_blank">
                        Заполнить анткету </a>

                    <p class="p-secondary">
                        Наш специалист позвонит Вам в ближайшее время после получения заявки
                    </p>
                </div>

                <?php $this->endWidget(); ?>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div><!-- /.modal -->