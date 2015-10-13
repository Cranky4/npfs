<?php
    /**
     * @var PNews[] $news
     */
    //Подключаем css
    $this->registerCssFile('news.css');
?>

<section class="color-primary-0" style="min-height: 350px;">
    <div class="container">
        <div class="col-md-12">
            <div style="padding-top: 10%; padding-bottom: 10%;">
                <h1 class="text-white text-center" style="margin: 0px;">
                    Всё что можно знать о пенсионном страховании <br>
                    <small class="text-white"> Здесь все, что Вы хотели знать по страхованию пенсионных вкладов.</small>
                </h1>
            </div>
        </div>
    </div>
</section>
<section>
    <div class="container">
        <?php foreach ($news as $i => $item): ?>
            <?= ($i + 1) % 3 == 1 ? '<div class="row">' : '' ?>
            <div class="col-md-4">
                <article class="article-card copy">
                    <div class="img-bg">
                        <?php if ($img = $item->getImage()): ?>
                            <img src="/<?= $img->getFilePath() ?>" class="img-responsive">
                        <?php endif; ?>
                    </div>
                    <div class="card-content">
                        <h4><?= $item->title ?></h4>

                        <p><?= $item->short ?></p>

                        <div class="btn-line">
                            <a href="<?= Yii::app()->createUrl(
                                'news/news/view',
                                array(
                                    'id' => $item->primaryKey,
                                )
                            ) ?>" class="btn btn-red">Читать</a>
                        </div>
                    </div>
                </article>
            </div>
            <?= ($i + 1) % 3 == 0 ? '</div>' : '' ?>
        <?php endforeach; ?>
    </div>
</section>


