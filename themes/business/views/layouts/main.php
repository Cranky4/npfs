<!DOCTYPE html>
<!--[if lt IE 7]>
<html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>
<html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>
<html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <meta name="viewport" content="width=device-width">
    <meta http-equiv="content-language" content="ru"> <?php // TODO - в будущем генетить автоматом ?>
    <?php
    //Регистрируем файлы скриптов в <head>
    if (YII_DEBUG) {
        Yii::app()->assetManager->publish(YII_PATH . '/web/js/source', false, -1, true);
    }

    Yii::app()->clientScript->registerCoreScript('jquery.project');
    Yii::app()->clientScript->registerCoreScript('bootstrap');
    $bootstrapFont = Yii::getPathOfAlias('application.assets.bootstrap.fonts') . DIRECTORY_SEPARATOR;
    Yii::app()->clientScript->addDependResource('bootstrap.min.css', array(
        $bootstrapFont . 'glyphicons-halflings-regular.eot' => '../fonts/',
        $bootstrapFont . 'glyphicons-halflings-regular.svg' => '../fonts/',
        $bootstrapFont . 'glyphicons-halflings-regular.ttf' => '../fonts/',
        $bootstrapFont . 'glyphicons-halflings-regular.woff' => '../fonts/',
    ));

    Yii::app()->clientScript->registerScriptFile('/themes/business/js/js.js', CClientScript::POS_HEAD);

    Yii::app()->clientScript->registerScript('setScroll', "setAnchor();", CClientScript::POS_READY);
    Yii::app()->clientScript->registerScript('menu.init', "$('.dropdown-toggle').dropdown();",
        CClientScript::POS_READY);

    //    Yii::app()->clientScript->registerCssFile('/themes/business/css/content.css');
    Yii::app()->clientScript->registerCssFile('/themes/business/css/page.css');
    Yii::app()->clientScript->registerCssFile(
        Yii::app()->assetManager->publish(Yii::getPathOfAlias('application.assets.font-awesome') . '/css/font-awesome.css',
            true, -1, YII_DEBUG)
    );
    $faFont = Yii::getPathOfAlias('application.assets.font-awesome.fonts') . DIRECTORY_SEPARATOR;
    Yii::app()->clientScript->addDependResource('font-awesome.css', array(
        $faFont . 'FontAwesome.otf' => '../fonts/',
        $faFont . 'fontawesome-webfont.eot' => '../fonts/',
        $faFont . 'fontawesome-webfont.svg' => '../fonts/',
        $faFont . 'fontawesome-webfont.ttf' => '../fonts/',
        $faFont . 'fontawesome-webfont.woff2' => '../fonts/',
        $faFont . 'fontawesome-webfont.woff' => '../fonts/',
    ));
    ?>
    <title><?php echo CHtml::encode($this->getPageTitle()); ?></title>
</head>
<body>
<header class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="active navbar-brand" href="#">
                <div class="brand-logo"></div>
            </a>
        </div>
        <div class="navbar-collapse collapse">

            <?php
            $this->widget('MenuWidget', array(
                'rootItem' => Yii::app()->menu->all,
                'htmlOptions' => array('class' => 'nav navbar-nav'),
                // корневой ul
                'submenuHtmlOptions' => array('class' => 'dropdown-menu'),
                // все ul кроме корневого
                'activeCssClass' => 'active',
                // активный li
                'activateParents' => 'true',
                // добавлять активность не только для конечного раздела, но и для всех родителей
                //'labelTemplate' => '{label}', // шаблон для подписи
                'labelDropDownTemplate' => '{label} <b class="caret"></b>',
                // шаблон для подписи разделов, которых есть потомки
                //'linkOptions' => array(), // атрибуты для ссылок
                'linkDropDownOptions' => array(
                    'data-target' => '#',
                    'class' => 'dropdown-toggle',
                    'data-toggle' => 'dropdown'
                ),
                // атрибуты для ссылок для разделов, у которых есть потомки
                'linkDropDownOptionsSecondLevel' => array('data-target' => '#', 'data-toggle' => 'dropdown'),
                // атрибуты для ссылок для разделов, у которых есть потомки
                //'itemOptions' => array(), // атрибуты для li
                'itemDropDownOptions' => array('class' => 'dropdown'),
                // атрибуты для li разделов, у которых есть потомки
                'itemDropDownOptionsSecondLevel' => array('class' => 'dropdown-submenu'),
//  'itemDropDownOptionsThirdLevel' => array('class' => ''),
                'maxChildLevel' => 2,
                'encodeLabel' => false,
            ));
            ?>
        </div>
        <!--/.nav-collapse -->
    </div>
</header>

<?php $this->widget('BlockWidget', array("place" => SiteModule::PLACE_TOP)); ?>

<?php if ($imageFile = Yii::app()->menu->getCurrent()->imageFile): ?>
    <section class="color-primary-0">
        <img src="/<?= $imageFile->getFilePath() ?>" alt="" class="img-responsive" style="width: 100%; height: auto;">
    </section>
<?php endif; ?>

<?php $this->widget('BlockWidget', array("place" => SiteModule::PLACE_CONTENT_TOP)); ?>
<?php if ($content): ?>
    <section>
<!--        <h2>--><?//= $this->caption ?><!--</h2>-->

        <div class="container">
            <?= $content; ?>
        </div>
    </section>
<?php endif; ?>
<?php $this->widget('BlockWidget', array("place" => SiteModule::PLACE_BOTTOM)); ?>

<footer class="color-primary-3">
    <div class="container">
        <div class="row">
            <?php $this->widget('BlockWidget', array("place" => SiteModule::PLACE_FOOTER)); ?>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h4><i class="fa fa-copyright"></i> 2015 ОАО «Пенсия Онлайн»</h4>
            </div>
        </div>
    </div>
</footer>

</body>
</html>