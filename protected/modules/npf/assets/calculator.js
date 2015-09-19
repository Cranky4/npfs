/**
 * Created by Cranky4 on 30.08.2015.
 */
$(function () {

    $("#calcSex, #calcAge, #calcIncome, #calcProfitability, #calcSumP").on("change", function () {
        calculate();
    });

    function calculate() {
        var sex = $("#calcSex").val();
        var age = $("#calcAge").val();
        var income = $("#calcIncome").val();
        var rate = $("#calcProfitability").val();
        var sumP = $("#calcSumP").val();

        var $sumHolderNPF = $("#pensionSumHolderNPF");
        var $sumHolderPFR = $("#pensionSumHolderPFR")
        var $paymentHolderPFR = $("#pensionPaymentHolderPFR");
        var $paymentHolderNPF = $("#pensionPaymentHolderNPF");
        var $rateHolder = $("#rateHolder");
        var PfrRate = 0.05;

        if (rate) {
            $rateHolder.text(rate);
        }
        rate = rate / 100;

        var womanPensionAge = 55;
        var manPensionAge = 60;
        var womanSexId = 2;
        var manSexId = 1;

        //  лет до пенсии
        if (sex == manSexId) {
            yearBeforePension = manPensionAge - age;
        } else if (sex == womanSexId) {
            yearBeforePension = womanPensionAge - age;
        } else {
            yearBeforePension = 1;
        }

        var allPaysNPF = allPaysPFR  = 0;

        if (sumP) {
            sumPNPF += parseFloat(sumP);
            sumPPFR += parseFloat(sumP);
        }

        for (i = 0; i <= yearBeforePension; i++) {

            if (sumP) {
                allPaysNPF += parseFloat(sumP) * rate;
                allPaysPFR += parseFloat(sumP) * rate;
            }

            allPaysNPF += income * Math.pow((1 + rate), yearBeforePension - i);
            allPaysPFR += income * Math.pow((1 + PfrRate), yearBeforePension - i);
        }
        //console.log('allPays = ' + allPaysNPF);

        allPaysNPF = parseFloat(allPaysNPF).toFixed(0);
        allPaysPFR = parseFloat(allPaysPFR).toFixed(0);

        $sumHolderNPF.text(number_format(allPaysNPF, 0, ".", ","));
        $paymentHolderNPF.text(number_format(allPaysNPF / 228, 0, ".", ","));

        $sumHolderPFR.text(number_format(allPaysPFR, 0, ".", ","));
        $paymentHolderPFR.text(number_format(allPaysPFR / 228, 0, ".", ","));
    }

    calculate();

    function number_format(number, decimals, dec_point, thousands_sep) {	// Format a number with grouped thousands
        //
        // +   original by: Jonas Raoni Soares Silva (http://www.jsfromhell.com)
        // +   improved by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
        // +	 bugfix by: Michael White (http://crestidg.com)

        var i, j, kw, kd, km;

        // input sanitation & defaults
        if (isNaN(decimals = Math.abs(decimals))) {
            decimals = 2;
        }
        if (dec_point == undefined) {
            dec_point = ",";
        }
        if (thousands_sep == undefined) {
            thousands_sep = ".";
        }

        i = parseInt(number = (+number || 0).toFixed(decimals)) + "";

        if ((j = i.length) > 3) {
            j = j % 3;
        } else {
            j = 0;
        }

        km = (j ? i.substr(0, j) + thousands_sep : "");
        kw = i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + thousands_sep);
        //kd = (decimals ? dec_point + Math.abs(number - i).toFixed(decimals).slice(2) : "");
        kd = (decimals ? dec_point + Math.abs(number - i).toFixed(decimals).replace(/-/, 0).slice(2) : "");


        return km + kw + kd;
    }

});