<?php
/**
 * Created by PhpStorm.
 * User: Cranky4
 * Date: 28.08.2015
 * Time: 21:28
 */
?>

<?php

if (Yii::app()->user->hasFlash('feedback-success')) {
    $this->widget('AlertWidget', array(
        'title' => 'Обратная связь',
        'message' => Yii::app()->user->getFlash('feedback-success'),
    ));
}

//$this->registerCssFile('b-feedback-widget.css');

//$hidden = 'none';
if (Yii::app()->user->hasFlash("feedback-message")) {
    $hidden = 'block';
    //echo '<i>'.Yii::app()->user->getFlash('feedback-message').'</i>';
}

/**
 * @var $form CActiveForm
 */
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'feedbackForm',
    'enableAjaxValidation' => false,
    'enableClientValidation' => true,
    'focus' => array($model, 'fio'),
    'htmlOptions' => array(
        'class' => 'modal form-horizontal',
//        'style' => 'display:' . $hidden . ';',
    ),
    'clientOptions' => array(
        'validateOnSubmit' => true,
        'validateOnChange' => false,
    ),
    'errorMessageCssClass' => 'label label-danger',
    'action' => Yii::app()->createUrl(FeedbackModule::ROUTE_FEEDBACK),
));

?>

<div class="modal-dialog npf-modal">
    <div class="modal-content">
        <div class="modal-header">
            <button class="close" data-dismiss="modal">?</button>
            <h3>Обратная связь</h3>
        </div>
        <div class="modal-body">
            <?php echo Yii::app()->user->getFlash("feedback-message"); ?>
            <fieldset>
                <div class="form-group">
                    <?php echo $form->labelEx($model, 'fio', array('class' => 'control-label col-lg-4')); ?>
                    <div class="col-lg-8">
                        <?php echo $form->textField($model, 'fio',
                            array('class' => 'form-control focused', 'autocomplete' => 'off')); ?>
                        <?php echo $form->error($model, 'fio'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <?php echo $form->labelEx($model, 'phone', array('class' => 'control-label col-lg-4')); ?>
                    <div class="col-lg-8">
                        <?php echo $form->textField($model, 'phone',
                            array('class' => 'form-control', 'autocomplete' => 'off', 'type' => 'tel')); ?>
                        <?php echo $form->error($model, 'phone'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <?php echo $form->labelEx($model, 'mail', array('class' => 'control-label col-lg-4')); ?>
                    <div class="col-lg-8">
                        <?php echo $form->textField($model, 'mail',
                            array('class' => 'form-control', 'autocomplete' => 'off', 'type' => 'email')); ?>
                        <?php echo $form->error($model, 'mail'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <?php echo $form->labelEx($model, 'message', array('class' => 'control-label col-lg-4')); ?>
                    <div class="col-lg-8">
                        <?php echo $form->textArea($model, 'message',
                            array('class' => 'form-control', 'rows' => '8', 'autocomplete' => 'off')); ?>
                        <?php echo $form->error($model, 'message'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <?php echo $form->labelEx($model, 'verifyCode', array('class' => 'control-label col-lg-4')); ?>
                    <div class="col-lg-4">
                        <?php echo $form->textField($model, 'verifyCode', array(
                            'class' => 'form-control',
                            'title' => 'Укажите код с картинки',
                            'autocomplete' => 'off'
                        )); ?>
                    </div>
                    <div class="col-lg-4">
                        <?php $this->widget('CCaptcha', array(
                            'clickableImage' => true,
                            'captchaAction' => FeedbackModule::ROUTE_FEEDBACK_CAPTCHA
                        )); ?>
                        <?php echo $form->error($model, 'verifyCode', array(), true, false); ?>
                    </div>
                </div>
            </fieldset>
        </div>
        <div class="modal-footer">
            <?= $form->hiddenField($model, 'id_npf') ?>
            <?php echo CHtml::submitButton('Отправить', array('class' => 'btn btn-lg btn-primary')); ?>
            <button class="btn" data-dismiss="modal">Отмена</button>
        </div>
        <?php $this->endWidget(); ?>
    </div>
</div>