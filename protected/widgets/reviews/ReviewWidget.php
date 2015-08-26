<?php

/**
 * Created by PhpStorm.
 * User: Cranky4
 * Date: 25.08.2015
 * Time: 22:43
 */
class ReviewWidget extends DaWidget
{

    public function run()
    {
        $reviews = UserReview::model()->findAll();
        $this->render("reviews", [
            'reviews' => $reviews,
        ]);
    }
}