<?php
/**
 * Created by PhpStorm.
 * User: Cranky4
 * Date: 26.08.2015
 * Time: 7:16
 *
 * @var Npf $model
 */
?>


<section>
    <div class="container">
        <div class="btn-group copy" role="group" aria-label="...">
            <?= CHtml::link('Вернуться к рейтингам', Yii::app()->createUrl('npf/default/index'), [
                'class' => 'btn btn-choice'
            ]) ?>
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
                <tr>
                    <td>
                        <div class="brand">
                            <div class="logo">
                                <?php if ($src = $model->getLogoPath()): ?>
                                    <?= CHtml::image('/' . $src, $model->title) ?>
                                <?php endif; ?>
                            </div>
                            <?= $model->title; ?>
                        </div>
                    </td>
                    <td>
                        <?php $this->widget('application.modules.npf.widgets.ReliabilityStarsWidget', [
                            'stars' => $model->reliability,
                        ]); ?>
                    </td>
                    <td> <?= $model->getAccumulation() ?></td>
                    <td> <?= $model->profitability ?>%</td>
                    <td><a href="#" class="btn btn-blue"> Стать клиентом </a></td>
                </tr>
                <tr>
                    <td colspan="4">
                        <?= $model->description; ?>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</section>
