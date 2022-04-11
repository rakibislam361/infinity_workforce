  (function ($) {
      $("body").on("click", "#applye-form", function (e) {
          e.preventDefault();
          var data = $(this).attr('data');
          var formModal = $("#exampleModalScrollable");
          formModal.find('form').attr('action', data);
          formModal.modal('show');
      });


      window.onload = function () {
          $(".slider").slick({
              autoplay: true,
              autoplaySpeed: 1500,
              arrows: true,
              prevArrow: '<button type="button" class="slick-prev"></button>',
              nextArrow: '<button type="button" class="slick-next"></button>',
              centerMode: true,
              slidesToShow: 3,
              slidesToScroll: 2,
          });
      };
  })(jQuery);
