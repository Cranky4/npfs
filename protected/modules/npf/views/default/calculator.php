<?php
    /**
     * Created by PhpStorm.
     * User: Cranky4
     * Date: 28.08.2015
     * Time: 21:55
     *
     * @var Menu $menu
     */

    Yii::app()->clientScript->registerScriptFile(Yii::app()->assetManager->publish(Yii::getPathOfAlias('application.modules.npf.assets').'/calculator.js'),
      CClientScript::POS_END);

?>


<?php if ($menu && $menu->content): ?>
    <section>
        <div class="container">
            <?= $menu->content ?>
        </div>
    </section>
<?php endif; ?>

<section class="color-background-1">
    <div class="container">
        <h2 class="text-center"> Пенсионный калькулятор </h2>

        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="copy calculator">
                    <form class="form-horizontal " role="form">
                        <div class="form-group">
                            <label for="calcSex" class="col-sm-8 control-label"> Ваш пол </label>

                            <div class="col-sm-4">
                                <select id="calcSex" class="form-control calc-input-sex">
                                    <option value="1"> Мужской</option>
                                    <option value="2"> Женский</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="calcAge" class="col-sm-8 control-label"> Ваш возраст </label>

                            <div class="col-sm-4">
                                <div class="input-group">
                                    <input type="number" value="30" class="form-control  calc-input-age" id="calcAge"
                                           placeholder="Возраст" min="18" max="100">
                                    <span class="input-group-addon"> <i class="fa fa-calendar-o"></i> </span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="calcIncome" class="col-sm-8 control-label"> Ваша заработная плата </label>

                            <div class="col-sm-4">
                                <div class="input-group">
                                    <input type="number" value="10000" class="form-control calc-input-income" id="calcIncome"
                                           placeholder="Зарплата" step="1000">
                                    <span class="input-group-addon"> <i class="fa fa-rub"></i> </span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="calcSumP" class="col-sm-8 control-label"> Сумма пенсионных накоплений </label>

                            <div class="col-sm-4">
                                <div class="input-group">
                                    <input type="number" value="0" class="form-control calc-input-sumP" id="calcSumP"
                                           placeholder="Накопления" step="1000">
                                    <span class="input-group-addon"> <i class="fa fa-rub"></i> </span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="calcProfitability" class="col-sm-8 control-label"> Доходность фонда </label>

                            <div class="col-sm-4">
                                <div class="input-group">
                                    <input id="calcProfitability" type="number" value="8"
                                           class="form-control calc-input-profitability" placeholder="00">
                                    <span class="input-group-addon"> % </span>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="table">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <td class="hidden-xs"></td>
                                <td> НПФ</td>
                                <td> ПФР</td>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td class="title-small hidden-xs">
                                    Доходность:
                                </td>
                                <td class="title-big">
                                    <span id="rateHolder">10</span> %
                                </td>
                                <td class="title-small">
                                    5 %
                                </td>
                            </tr>
                            <tr>
                                <td class="title-small hidden-xs">
                                    Размер пенсии:
                                </td>
                                <td class="title-big">
                                    <span id="pensionPaymentHolderNPF">27,300</span> ₽
                                </td>
                                <td class="title-small">
                                    <span id="pensionPaymentHolderPFR">12,300</span> ₽
                                </td>
                            </tr>
                            <tr>
                                <td class="title-small hidden-xs">
                                    Накопления:
                                </td>
                                <td class="title-big">
                                    <span id="pensionSumHolderNPF">4,556,141</span> ₽
                                </td>
                                <td class="title-small">
                                    <span id="pensionSumHolderPFR">1,251,768</span> ₽
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="b-box center-block">
                <a class="btn btn-blue btn-lg center-block" href="rating.html"> Рейтинги НПФ </a>
            </div>
        </div>
    </div>
</section>
<section class="color-background-1">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div
                  style="padding: 10px; border-bottom: 1px dotted #6699cc; border-top: 1px dotted #6699cc; margin-bottom: 20px;">
                    <p class="p-small">
                        Доход от размещения пенсионных резервов и инвестирования пенсионных накоплений может как
                        уменьшаться, так и увеличиваться в зависимости от рыночных условий и состояния фондовых рынков.
                        Результаты инвестирования в прошлом не определяют доходов в будущем. Государство не гарантирует
                        доходности размещения пенсионных резервов и инвестирования пенсионных накоплений. Расчеты
                        размера будущей пенсии или ее части несут справочный характер, не могут определять размер дохода
                        в будущем и считаться офертой в соответствии с законодательством РФ.

                    <p/>

                    <p class="p-small">
                        Перед заключением пенсионного договора или переводом пенсионных накоплений в Фонд просим Вас
                        внимательно ознакомиться с Уставом Фонда, Пенсионными и Страховыми правилами.
                    </p>
                </div>
            </div>
        </div>
        <!--

        -->
    </div>
</section>
