/* 
 * Script language 
 */
choose_lang();

function change_lang(value) {
    window.location.replace("?lang=" + value);
}
var temp_size = 0;

function choose_lang() {
    if (window.location.search != null && window.location.search != "") {
        var lang = window.location.search.split("=");
        if (lang[1] == 'vi' || lang[1] == 'en') {
            document.getElementById(lang[1]).style.border = "solid black";
        } else {
            var length = lang.length - 1;
            document.getElementById(lang[length]).style.border = "solid black";
        }
    } else {
        document.getElementById("vi").click();
    }
};
/* 
 * Script Range Sliders
 */

var rangeSlider = function () {
    var slider = $('.slide_container'),
        range = $('.range_slider'),
        value = $('.range_slider_value');

    slider.each(function () {

        value.each(function () {
            var value = $(this).prev().attr('value');
            $(this).html(value);
        });

        range.on('input', function () {
            $(this).next(value).html(this.value);
            document.body.style.fontSize = this.value + 'px';
            // get element
            var title_names = document.getElementsByClassName('custom_size');
            setFontSize(title_names, this.value);
        });
    });
};

rangeSlider();

/*
 * dropdown menu
 */
dropdown();
function dropdown() {
    var toggler = jQuery('.dropdown');
    var vSection = jQuery('.dropdown-content');
    toggler.on('click', function () {
        var element = jQuery(this);
        vSection.removeClass('show');
        element.find(".dropdown-content").addClass('show');
    });

};

function setFontSize(title_names, value) {
    var status_sum = 1;
    for (let i = 0; i < title_names.length; i++) {
        //get fontsize
        var name_sizeFont = window.getComputedStyle(title_names[i], null).getPropertyValue('font-size');
        if (temp_size > parseFloat(value)) {
            var sum_name = (parseFloat(name_sizeFont) - 1);
            temp_size = parseFloat(value);
            status_sum = 2;
        } else if (temp_size < parseFloat(value)) {
            var sum_name = (parseFloat(name_sizeFont) + 1);
            temp_size = parseFloat(value);
            status_sum = 1;
        }
        if (temp_size == parseFloat(value) && status_sum == 1) {
            var sum_name = (parseFloat(name_sizeFont) + 1);
        }
        if (temp_size == parseFloat(value) && status_sum == 2) {
            var sum_name = (parseFloat(name_sizeFont) - 1);
        }
        title_names[i].style.fontSize = sum_name + 'px';
    }

};
showMenu();
function showMenu() {
    "use strict";

    var list = jQuery('.showMenu a');
    var vContent = jQuery('.tokyo_tm_all_wrap');
    var vSection = jQuery('.tokyo_tm_section, .showMenu');
    list.on('click', function () {
        var element = jQuery(this);
        var myHref = element.attr('href');
        if (!element.hasClass('active')) {
            list.removeClass('active');
            vSection.removeClass('active');
            vContent.find(myHref).addClass('active').animate({ scrollTop: 0 });
        }
    });
};

/*
 *  Doughnut for feedback
 */
var ctx = document.getElementById('barChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ["50+", "60+", "70+", "Another"],
      datasets: [{
        label: "Bar chart (people)",
        backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9"],
        data: [478,5267,734,784]
      }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});


var ctx1 = document.getElementById('pieChart').getContext('2d');
var myChart = new Chart(ctx1, {
    type: 'pie',
    data: {
        labels: ["Technology", "Social network", "Smartphone", "Computer"],
      datasets: [{
        label: "Pie chart (people)",
        backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9"],
        data: [2478,5267,734,784]
      }]
    }
});