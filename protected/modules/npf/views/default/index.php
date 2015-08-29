<?php
/**
 * @var $this DefaultController
 * @var Npf[] $npfs
 */
Yii::app()->getClientScript()->registerScript("npf-table.sortable", '
        $(document).ready(function()
        {
            $(".npf-sortable").tablesorter();
            $(".npf-sort").on("click", function() {
                var column = $(this).data("column");
                $(".npf-sortable").tablesorter({sortList: [[ column, 1]]});
            });
            $(".npf-action-feedback").on("click", function() {
                var id_npf = $(this).data("id_npf");
                var name = $(this).data("name");
                var $modal = $(".npf-modal");

                $modal.find("#PFeedBack_id_npf").val(id_npf);
                $modal.find(".modal-name").text(name);
                $modal.modal("show");
                return false;
            });
        }

);
', CClientScript::POS_END);
?>

<section>
    <div class="container">
        <div class="btn-group copy" role="group" aria-label="...">
            <button type="button" class="btn btn-choice npf-sort" data-column="1"> По надежности</button>
            <button type="button" class="btn btn-choice npf-sort" data-column="2"> По накоплениям</button>
            <button type="button" class="btn btn-choice npf-sort" data-column="3"> По доходности</button>
        </div>
        <div class="table-responsive">
            <table class="table table-hover npf-sortable">
                <thead>
                <tr>
                    <th> Название</th>
                    <th> Надежность</th>
                    <th> Накопления</th>
                    <th> Доходность</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($npfs as $npf): ?>
                    <tr>
                        <td>
                            <div class="brand">
                                <div class="logo">
                                    <?php if ($src = $npf->getLogoPath()): ?>
                                        <?= CHtml::link(CHtml::image('/' . $src, $npf->title),
                                            Yii::app()->createUrl('npf/default/view', [
                                                'id' => $npf->primaryKey
                                            ])) ?>
                                    <?php endif; ?>
                                </div>
                                <?= CHtml::link($npf->title, Yii::app()->createUrl('npf/default/view', [
                                    'id' => $npf->primaryKey
                                ])) ?>
                            </div>
                        </td>
                        <td>
                            <div class="invisible"><?= $npf->reliability ?></div>
                            <?php $this->widget('application.modules.npf.widgets.ReliabilityStarsWidget', [
                                'stars' => $npf->reliability,
                            ]); ?>
                        </td>
                        <td> <?= $npf->getAccumulation() ?></td>
                        <td> <?= $npf->profitability ?>%</td>
                        <td>
                            <button class="btn btn-blue npf-action-feedback" data-id_npf="<?= $npf->primaryKey ?>"
                                    data-name="<?= $npf->title ?>">
                                Стать клиентом
                            </button>
                        </td>
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
