<?php

    class DefaultController extends Controller
    {
        public function beforeAction($action)
        {
            if ($action->id == 'calculator') {
                $this->urlAlias = 'calculator';
            } else {
                if ($action->id == 'blank') {
                    $this->urlAlias = 'blank';
                } else {
                    $this->urlAlias = 'ratings';
                }
            }

            return parent::beforeAction($action);
        }


        public function actionIndex()
        {
            $cr = new CDbCriteria();
            $cr->order = 'name';

            $npfs = Npf::model()->findAll();

            $menu = Menu::model()->findByPk(Yii::app()->getModule('npf')->ratingPageMenuId);

            $this->render('index', [
              'npfs' => $npfs,
              'menu' => $menu,
            ]);
        }

        public function actionView($id)
        {
            $model = Npf::model()->findByPk($id);

            if (null === $model) {
                throw new CHttpException(404);
            }

            $this->render('view', [
              'model' => $model,
            ]);
        }

        public function actionCalculator()
        {
            $menu = Menu::model()->findByPk(Yii::app()->getModule('npf')->calculatorPageMenuId);
            $this->render('calculator',[
                'menu' => $menu,
            ]);
        }

        public function actionBlank()
        {
            $model = new Request();
            $this->performAjaxValidation($model, 'requestForm');

            if ($data = HArray::val($_POST, get_class($model))) {
                $model->attributes = $data;
                if (!$model->save()) {
                    Yii::app()->user->setFlash('request-status',
                      CHtml::errorSummary($model, '<p>Не удалось отправить форму</p>'));
                } else {
                    Yii::app()->user->setFlash('request-status',
                      "Заявка успешно отправлена. Скоро с вами свяжется менеджер. Спасибо!");
                }
            }

            $model->bdate = date('d.m.Y');
            $model->passport_date = date('d.m.Y');
            $this->render('blank', array(
              'model' => $model,
            ));
        }

        public function performAjaxValidation($model, $formId)
        {
            if (isset($_POST['ajax']) && $_POST['ajax'] === $formId) {
                echo CActiveForm::validate($model);
                Yii::app()->end();
            }
        }
    }