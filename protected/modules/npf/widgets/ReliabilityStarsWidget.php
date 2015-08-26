<?php

/**
 * Created by PhpStorm.
 * User: Cranky4
 * Date: 26.08.2015
 * Time: 7:04
 */
class ReliabilityStarsWidget extends DaWidget
{
    public $stars = 0;

    public function run()
    {
        $this->render("stars", [
            'stars' => $this->stars,
        ]);
    }
}