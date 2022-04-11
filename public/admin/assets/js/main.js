$.noConflict();

jQuery(document).ready(function ($) {

    "use strict";

    [].slice.call(document.querySelectorAll('select.cs-select')).forEach(function (el) {
        new SelectFx(el);
    });

    jQuery('.selectpicker').selectpicker;




    $('.search-trigger').on('click', function (event) {
        event.preventDefault();
        event.stopPropagation();
        $('.search-trigger').parent('.header-left').addClass('open');
    });

    $('.search-close').on('click', function (event) {
        event.preventDefault();
        event.stopPropagation();
        $('.search-trigger').parent('.header-left').removeClass('open');
    });

    $('.equal-height').matchHeight({
        property: 'max-height'
    });

    // var chartsheight = $('.flotRealtime2').height();
    // $('.traffic-chart').css('height', chartsheight-122);


    // Counter Number
    $('.count').each(function () {
        $(this).prop('Counter', 0).animate({
            Counter: $(this).text()
        }, {
            duration: 3000,
            easing: 'swing',
            step: function (now) {
                $(this).text(Math.ceil(now));
            }
        });
    });




    // Menu Trigger
    $('#menuToggle').on('click', function (event) {
        var windowWidth = $(window).width();
        if (windowWidth < 1010) {
            $('body').removeClass('open');
            if (windowWidth < 760) {
                $('#left-panel').slideToggle();
            } else {
                $('#left-panel').toggleClass('open-menu');
            }
        } else {
            $('body').toggleClass('open');
            $('#left-panel').removeClass('open-menu');
        }

    });


    $(".menu-item-has-children.dropdown").each(function () {
        $(this).on('click', function () {
            var $temp_text = $(this).children('.dropdown-toggle').html();
            $(this).children('.sub-menu').prepend('<li class="subtitle">' + $temp_text + '</li>');
        });
    });


    // Load Resize 
    $(window).on("load resize", function (event) {
        var windowWidth = $(window).width();
        if (windowWidth < 1010) {
            $('body').addClass('small-device');
        } else {
            $('body').removeClass('small-device');
        }

    });

    $("#newVisaOption").each(function () {
        $(this).on('click', function () {
            $('.visa-type').append(`
							<option value="0">Select Visa Type</option>
							<option value="1">Citizen</option>
							<option value="2">Permanent Resident</option>
							<option value="3">Temporary resident</option>
							<option value="4">Dependent visa</option>
							<option value="5">Holiday visa</option>
							<option value="6">Student visa A</option>
							<option value="7">Student visa B</option>
							<option value="8">Student visa C</option>
							<option value="9">Student visa D</option>
						`);
        });
    });
    $("#oldlVisaOption").each(function () {
        $(this).on('click', function () {
            $('.visa-type').append(`
							<option value="0">Select Visa Type</option>
							<option value="1">Citizen</option>
							<option value="6">Student Visa</option>
							<option value="10">PR visa</option>
							<option value="11">Work Holiday Visa</option>
							<option value="12">Protection visa</option>
							<option value="13">TR (Post Study Work)</option>
							<option value="14">Temporary Resident Visa</option>
							<option value="16">Work Visa</option>
						`);
        });
    });
});
