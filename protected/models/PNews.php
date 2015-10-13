<?php

    /**
     * Created by PhpStorm.
     * User: Cranky4
     * Date: 12.10.2015
     * Time: 20:35
     */
    class PNews extends News
    {

        public function behaviors()
        {
            $behaviors = array(
                'ImagePreviewBehavior' => array(
                    'class'         => 'ImagePreviewBehavior',
                    'imageProperty' => 'image',
                    'formats'       => array(
                        '_list' => array(
                            'width'  => 358,
                            'height' => 115,
                        ),
                    ),
                ),
            );

            return $behaviors;
        }

        /**
         * @param string $prefix
         *
         * @return bool
         */
        public function getImage($prefix = "_list")
        {
            if ($this->photo) {
                return $this->getImagePreview($prefix);
            }

            return false;
        }

    }