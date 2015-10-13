<?php

    /**
     * Created by PhpStorm.
     * User: Cranky4
     * Date: 12.10.2015
     * Time: 20:50
     */
    Yii::import('ygin.modules.news.controllers.NewsController');
    class PNewsController extends NewsController
    {

        /**
         * —писок новостей
         */
        public function actionIndex($idCategory = null)
        {
            $criteria = new CDbCriteria();
//            $criteria->scopes = array('last');

            $newsModule = $this->getModule();
            $category = null;
            $categories = array();
            //≈сли включено отображение категорий
            if ($newsModule->showCategories) {
                if ($idCategory !== null && $category = $this->loadModelOr404('NewsCategory', $idCategory)) {
                    $criteria->compare('t.id_news_category', $idCategory);
                }
                $categories = NewsCategory::model()->findAll(array('order' => 'seq'));
            }
            $criteria->order = "sequence ASC";

            $count = News::model()->count($criteria);

            $pages = new CPagination($count);
            $pages->pageSize = $newsModule->itemsCountPerPage;
            $pages->applyLimit($criteria);

            $news = News::model()->findAll($criteria);

            $this->render(
                '/index',
                array(
                    'news'       => $news,  // список новостей
                    'pages'      => $pages,  // пагинатор
                    'category'   => $category,  // текуща€ категори€
                    'categories' => $categories,  // все категории
                )
            );
        }

    }