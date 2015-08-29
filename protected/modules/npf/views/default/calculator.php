<?php
/**
 * Created by PhpStorm.
 * User: Cranky4
 * Date: 28.08.2015
 * Time: 21:55
 */

Yii::app()->clientScript->registerScript("caclulator-npf-behaviors", '

$(function(){

    var sex = $("#calcSex").val();
    var age = $("#calcAge").val();
    var income = $("#calcIncome").val();

    var womanPensionAge = 55;
    var manPensionAge = 50;
    var womanSexId = 2;
    var manSexId = 1;

//  лет до пенсии
    if(sex == manSexId) {
        yearBeforePension = manPensionAge - age;
    } else {
        yearBeforePension = womanPensionAge - age;
    }


    //alert(FV(0.4, 32, 17200, 0, 1));
    alert(FV1(17200, 32, 4));

function FV1(PV, n, r) {
    return PV*Math.pow(1+r/100, n);
}

    function FV (rate, nper, pmt, pv, type) {
        if (!type) type = 0;

        var pow = Math.pow(1 + rate, nper);
        var fv = 0;

        if (rate) {
            fv = (pmt * (1 + rate * type) * (1 - pow) / rate) - pv * pow;
        } else {
            fv = -1 * (pv + pmt * nper);
        }

        return fv;
    }
});

');

?>

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
                                    <input type="email" class="form-control  calc-input-age" id="calcAge"
                                           placeholder="Возраст">
                                    <span class="input-group-addon"> <i class="fa fa-calendar-o"></i> </span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="calcIncome" class="col-sm-8 control-label"> Ваша заработная
                                плата </label>

                            <div class="col-sm-4">
                                <div class="input-group">
                                    <input type="text" class="form-control calc-input-income" id="calcIncome"
                                           placeholder="Зарплата">
                                    <span class="input-group-addon"> <i class="fa fa-rub"></i> </span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="calcSumP" class="col-sm-8 control-label"> Сумма пенсионных
                                накоплений </label>

                            <div class="col-sm-4">
                                <div class="input-group">
                                    <input type="text" class="form-control calc-input-sumP" id="calcSumP"
                                           placeholder="Накопления">
                                    <span class="input-group-addon"> <i class="fa fa-rub"></i> </span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="calcProfitability" class="col-sm-8 control-label"> Доходность фонда </label>

                            <div class="col-sm-4">
                                <div class="input-group">
                                    <input id="calcProfitability" type="text"
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
                                    10 %
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
                                    27,300 ₽
                                </td>
                                <td class="title-small">
                                    12,300 ₽
                                </td>
                            </tr>
                            <tr>
                                <td class="title-small hidden-xs">
                                    Накопления:
                                </td>
                                <td class="title-big">
                                    4,556,141 ₽
                                </td>
                                <td class="title-small">
                                    1,251,768 ₽
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
