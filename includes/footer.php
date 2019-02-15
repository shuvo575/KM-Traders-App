<footer class="footer footer-default">
  <div class="container" style="color:white;">
    <div class="copyright">
      &copy;
      <script>
        document.write(new Date().getFullYear())
      </script>, made with <i class="material-icons">favorite</i> by
      <a href="https://www.facebook.com/shuvo575" style="color:white;" target="_blank">Sohag Hasan.</a>
    </div>
  </div>
</footer>
<!--   Core JS Files   -->

<script src="./assets/js/core/popper.min.js" type="text/javascript"></script>
<script src="./assets/js/core/bootstrap-material-design.min.js" type="text/javascript"></script>
<script src="./assets/js/plugins/moment.min.js"></script>
<!--	Plugin for the Datepicker, full documentation here: https://github.com/Eonasdan/bootstrap-datetimepicker -->
<script src="./assets/js/plugins/bootstrap-datetimepicker.js" type="text/javascript"></script>
<!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
<script src="./assets/js/plugins/nouislider.min.js" type="text/javascript"></script>
<!--	Plugin for Sharrre btn -->
<script src="./assets/js/plugins/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="./assets/js/plugins/jquery.sharrre.js" type="text/javascript"></script>
<!-- Control Center for Material Kit: parallax effects, scripts for the example pages etc -->
<script src="./assets/js/material-kit.js?v=2.0.4" type="text/javascript"></script>
<script>
  $(document).ready(function() {
    //init DateTimePickers
    materialKit.initFormExtendedDatetimepickers();

    // Sliders Init
    materialKit.initSliders();
  });


  function scrollToDownload() {
    if ($('.section-download').length != 0) {
      $("html, body").animate({
        scrollTop: $('.section-download').offset().top
      }, 1000);
    }
  }

  $(document).ready( function () {
      $('#myTable').DataTable();
    } );

    $('.datetimepicker').datetimepicker({
  icons: {
      time: "fa fa-clock-o",
      date: "fa fa-calendar",
      up: "fa fa-chevron-up",
      down: "fa fa-chevron-down",
      previous: 'fa fa-chevron-left',
      next: 'fa fa-chevron-right',
      today: 'fa fa-screenshot',
      clear: 'fa fa-trash',
      close: 'fa fa-remove'
  }
});

$('.datetimepicker').data("DateTimePicker").format("dddd, DD MMM YYYY, h:mm a");
</script>
</body>

</html>
