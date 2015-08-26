<?php
/**
 * @var $this DefaultController
 * @var Npf[] $npfs
 */
?>


<section>
    <div class="container">
        <div class="btn-group copy" role="group" aria-label="...">
            <button type="button" class="btn btn-choice"> По надежности</button>
            <button type="button" class="btn btn-choice"> По накоплениям</button>
            <button type="button" class="btn btn-choice"> По доходности</button>
        </div>
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                <tr>
                    <td> Название</td>
                    <td> Надежность</td>
                    <td> Накопления</td>
                    <td> Доходность</td>
                    <td></td>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($npfs as $npf): ?>
                    <tr>
                        <td>
                            <div class="brand">
                                <div class="logo">
                                    <?php if ($src = $npf->getLogoPath()): ?>
                                        <?= CHtml::link(CHtml::image('/' . $src, $npf->title), Yii::app()->createUrl('npf/default/view',[
                                            'id' => $npf->primaryKey
                                        ])) ?>
                                    <?php endif; ?>
                                </div>
                                <?= CHtml::link($npf->title, Yii::app()->createUrl('npf/default/view',[
                                    'id' => $npf->primaryKey
                                ])) ?>
                            </div>
                        </td>
                        <td>
                            <?php $this->widget('application.modules.npf.widgets.ReliabilityStarsWidget', [
                                'stars' => $npf->reliability,
                            ]); ?>
                        </td>
                        <td> <?= $npf->getAccumulation() ?></td>
                        <td> <?= $npf->profitability ?>%</td>
                        <td><a href="#" class="btn btn-blue"> Стать клиентом </a></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</section>
<section>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <p class="p-small">
                    Источник: Банк России, Росстат, ПФР, АСВ и открытые интернет ресурсы.
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="fbox copy">
                    <div class="fbox-icon"><i class="fa fa-info-circle color-icon-1"></i></div>
                    <p class="p-general">
                        Администрация сайта просит НПФ, вступивших в систему гарантирования, дополнительно информировать
                        нас для оперативного добавления в рейтинг.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
