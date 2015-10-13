<?php

    /**
     * @var News $model
     */
    $this->registerCssFile('news.css');

    $bg = "";
    if ($photo = $model->image) {
        $bg = "background-image: url(/".$photo->getFilePath().");background-size: cover;";
    }
?>

<section class="color-primary-0" style="min-height: 350px; <?= $bg ?>">
    <div class="container">
        <div class="col-md-12">
            <div style="padding-top: 10%; padding-bottom: 10%;">
                <h1 class="text-white text-center" style="margin: 0px;">
                    <?= $model->title ?>
                </h1>
            </div>
        </div>
    </div>
</section>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h3></h3>
        </div>
    </div>
</div>
<article>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="copy article-full">
                    <div class="article-content">
                        <h4><?= $model->title ?></h4>

                        <?= $model->content ?>

                        <div class="article-share">
                            <div class="box-head">
                                <div> Рассказать друзьям</div>
                            </div>
                            <?php $this->widget(
                                'ygin.widgets.likeAndShare.LikeAndShareWidget',
                                array("title" => $model->title)
                            ); ?>
                        </div>

                        <div class="back" style="margin-top: 20px;">
                            <a href="<?= Yii::app()->createUrl('news/news/index') ?>" class="btn btn-primary">Назад</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</article>
