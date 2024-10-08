<footer class="footer">
  <div class="container-fluid d-flex justify-content-between">
    <nav class="pull-left">
      <ul class="nav">
        <li class="nav-item">
          <a class="nav-link" href="http://jmexpeditions.com">
            JMexpeditions
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#"> Help </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#"> Licenses </a>
        </li>
      </ul>
    </nav>
    <div class="copyright">
      2024, Hecho por
      <a href="http://jmexpeditions.com">JMexpeditions</a>
    </div>
    <!-- <div>
      Distributed by
      <a target="_blank" href="https://themewagon.com/">ThemeWagon</a>.
    </div> -->
  </div>
</footer>
</div>

<!-- Custom template | don't include it in your project! -->
<div class="custom-template">
  <div class="title">Settings</div>
  <div class="custom-content">
    <div class="switcher">
      <div class="switch-block">
        <h4>Logo Header</h4>
        <div class="btnSwitch">
          <button type="button" class="selected changeLogoHeaderColor" data-color="dark"></button>
          <button type="button" class="changeLogoHeaderColor" data-color="blue"></button>
          <button type="button" class="changeLogoHeaderColor" data-color="purple"></button>
          <button type="button" class="changeLogoHeaderColor" data-color="light-blue"></button>
          <button type="button" class="changeLogoHeaderColor" data-color="green"></button>
          <button type="button" class="changeLogoHeaderColor" data-color="orange"></button>
          <button type="button" class="changeLogoHeaderColor" data-color="red"></button>
          <button type="button" class="changeLogoHeaderColor" data-color="white"></button>
          <br />
          <button type="button" class="changeLogoHeaderColor" data-color="dark2"></button>
          <button type="button" class="changeLogoHeaderColor" data-color="blue2"></button>
          <button type="button" class="changeLogoHeaderColor" data-color="purple2"></button>
          <button type="button" class="changeLogoHeaderColor" data-color="light-blue2"></button>
          <button type="button" class="changeLogoHeaderColor" data-color="green2"></button>
          <button type="button" class="changeLogoHeaderColor" data-color="orange2"></button>
          <button type="button" class="changeLogoHeaderColor" data-color="red2"></button>
        </div>
      </div>
      <div class="switch-block">
        <h4>Navbar Header</h4>
        <div class="btnSwitch">
          <button type="button" class="changeTopBarColor" data-color="dark"></button>
          <button type="button" class="changeTopBarColor" data-color="blue"></button>
          <button type="button" class="changeTopBarColor" data-color="purple"></button>
          <button type="button" class="changeTopBarColor" data-color="light-blue"></button>
          <button type="button" class="changeTopBarColor" data-color="green"></button>
          <button type="button" class="changeTopBarColor" data-color="orange"></button>
          <button type="button" class="changeTopBarColor" data-color="red"></button>
          <button type="button" class="selected changeTopBarColor" data-color="white"></button>
          <br />
          <button type="button" class="changeTopBarColor" data-color="dark2"></button>
          <button type="button" class="changeTopBarColor" data-color="blue2"></button>
          <button type="button" class="changeTopBarColor" data-color="purple2"></button>
          <button type="button" class="changeTopBarColor" data-color="light-blue2"></button>
          <button type="button" class="changeTopBarColor" data-color="green2"></button>
          <button type="button" class="changeTopBarColor" data-color="orange2"></button>
          <button type="button" class="changeTopBarColor" data-color="red2"></button>
        </div>
      </div>
      <div class="switch-block">
        <h4>Sidebar</h4>
        <div class="btnSwitch">
          <button type="button" class="changeSideBarColor" data-color="white"></button>
          <button type="button" class="selected changeSideBarColor" data-color="dark"></button>
          <button type="button" class="changeSideBarColor" data-color="dark2"></button>
        </div>
      </div>
    </div>
  </div>
  <!-- <div class="custom-toggle">
    <i class="icon-settings"></i>
  </div> -->
</div>
<!-- End Custom template -->
</div>
<!--   Core JS Files   -->
<!-- jQuery -->

<!-- Popper.js -->
<script src="<?php echo $URL; ?>assets/js/core/popper.min.js"></script>
<!-- Bootstrap -->
<script src="<?php echo $URL; ?>assets/js/core/bootstrap.min.js"></script>
<!-- jQuery Scrollbar -->
<script src="<?php echo $URL; ?>assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>
<!-- Chart JS -->
<script src="<?php echo $URL; ?>assets/js/plugin/chart.js/chart.min.js"></script>
<!-- jQuery Sparkline -->
<script src="<?php echo $URL; ?>assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script>
<!-- Chart Circle -->
<script src="<?php echo $URL; ?>assets/js/plugin/chart-circle/circles.min.js"></script>
<!-- Datatables -->
<script src="<?php echo $URL; ?>assets/js/plugin/datatables/datatables.min.js"></script>
<!-- Bootstrap Notify -->
<script src="<?php echo $URL; ?>assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>
<!-- jQuery Vector Maps -->
<script src="<?php echo $URL; ?>assets/js/plugin/jsvectormap/jsvectormap.min.js"></script>
<script src="<?php echo $URL; ?>assets/js/plugin/jsvectormap/world.js"></script>
<!-- Sweet Alert -->
<script src="<?php echo $URL; ?>assets/js/plugin/sweetalert/sweetalert.min.js"></script>
<!-- Kaiadmin JS -->
<script src="<?php echo $URL; ?>assets/js/kaiadmin.min.js"></script>
<!-- Kaiadmin DEMO methods, don't include it in your project! -->
<script src="<?php echo $URL; ?>assets/js/setting-demo.js"></script>
<!-- <script src="<?php echo $URL; ?>assets/js/demo.js"></script> -->


<!-- <script src="<?php echo $URL; ?>dist/js/main.min.js" defer></script> -->
<script>
  $("#lineChart").sparkline([102, 109, 120, 99, 110, 105, 115], {
    type: "line",
    height: "70",
    width: "100%",
    lineWidth: "2",
    lineColor: "#177dff",
    fillColor: "rgba(23, 125, 255, 0.14)",
  });

  $("#lineChart2").sparkline([99, 125, 122, 105, 110, 124, 115], {
    type: "line",
    height: "70",
    width: "100%",
    lineWidth: "2",
    lineColor: "#f3545d",
    fillColor: "rgba(243, 84, 93, .14)",
  });

  $("#lineChart3").sparkline([105, 103, 123, 100, 95, 105, 115], {
    type: "line",
    height: "70",
    width: "100%",
    lineWidth: "2",
    lineColor: "#ffa534",
    fillColor: "rgba(255, 165, 52, .14)",
  });
</script>
<script>
  $(document).ready(function() {
    $('.image-popup').magnificPopup({
      type: 'image',
      gallery: {
        enabled: true, // Habilita la galería para mostrar las flechas
        navigateByImgClick: true, // Permite navegar haciendo clic en la imagen
        preload: [0, 1] // Preload anterior y siguiente imagenes
      },
      zoom: {
        enabled: true, // Habilita el zoom
        duration: 300, // Duración de la animación de zoom
        opener: function(element) {
          return element.find('img');
        }
      },
      image: {
        titleSrc: function(item) {
          return item.el.attr('title'); // Si deseas agregar títulos, se pueden agregar aquí
        }
      },
      mainClass: 'mfp-fade', // Efecto de fade al abrir
      removalDelay: 300, // Delay antes de cerrar el popup para efectos
      closeOnContentClick: true, // Cierra el popup haciendo clic fuera del contenido
      closeBtnInside: true, // Muestra el botón de cerrar dentro del popup
      closeOnBgClick: true, // Permite cerrar el popup al hacer clic en el fondo
      fixedContentPos: true, // Evita que el contenido se mueva al abrir el popup
      fixedBgPos: true // Evita que el fondo se mueva
    });
  });
</script>
</body>

</html>