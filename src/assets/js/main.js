"use strict";


$(document).ready(function () {
  $('body').autoPadding({
    source: $('.js-header'),
  });



  // Language changer

  $('.langen').on("click", function () {
    document.documentElement.lang = 'en'
  });

  $('.langru').on("click", function () {
    document.documentElement.lang = 'ru'
  });

  // END Language Changer




  // Burger Menu

  let burger = document.getElementById('burger'),
    nav = document.getElementById('main-nav');

  burger.addEventListener('click', function (e) {
    this.classList.toggle('is-open');
    nav.classList.toggle('is-open');
    document.body.classList.toggle('is-menu-open');
  });

  $("#main-nav").on("click", "a", function (event) {
    event.preventDefault();
    burger.classList.toggle('is-open');
    nav.classList.toggle('is-open');
    document.body.classList.toggle('is-menu-open');
  });

  // End Burger Menu




  // Slow Links
  $(".nav, #cover, #footernav").on("click", "a", function (event) {
    event.preventDefault();
    var id = $(this).attr('href'),
      top = $(id).offset().top;
    $('body,html').animate({ scrollTop: top }, 1500);
  });
  // End // Slow Links



  // Form Validation
  (function () {
    window.addEventListener('load', function () {
      // Fetch all the forms we want to apply custom Bootstrap validation styles to
      var forms = document.getElementsByClassName('needs-validation');
      // Loop over them and prevent submission
      var validation = Array.prototype.filter.call(forms, function (form) {
        form.addEventListener('submit', function (event) {
          if (form.checkValidity() === false) {
            event.preventDefault();
            event.stopPropagation();
          }
          form.classList.add('was-validated');
        }, false);
      });
    }, false);
  })();
  // End Form Validation



  //removeIf(production)
  console.log("document ready");
  //endRemoveIf(production)
});
