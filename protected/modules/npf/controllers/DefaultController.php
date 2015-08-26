<?php

class DefaultController extends Controller
{
    public $urlAlias = 'ratings';

    public function actionIndex()
    {
        $npfs = Npf::model()->findAll();

        $this->render('index', [
            'npfs' => $npfs,
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
}