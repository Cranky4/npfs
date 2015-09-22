<?php

/**
 * Created by PhpStorm.
 * User: Cranky4
 * Date: 28.08.2015
 * Time: 21:27
 */
class FeedbackModalWidget extends DaWidget
{

    public function run()
    {
        $model = new PFeedBack();

        $this->render('feedbackModal', array(
            'model' => $model,
        ));
    }

}