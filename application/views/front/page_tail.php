
  <div class="row apply-know-row">
    <div class="container">
      <div class="col-sm-6 admission-row">
        <h3>KRITIK & SARAN</h3>
        <p>It is a long established fact that a reader will be distracted by the content of a page when looking at its layout.</p>
      </div>
      <div class="col-sm-6 info-row">
        <h3>ABOUT US</h3>
        <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p><a href="index.html#"><i class="fa fa-edit"></i>KIRIM KRITIK & SARAN</a>
      </div>
    </div>
  </div><!-- Footer Section -->
  <div class="row footer-row">
    <div class="container">
      <div class="school-logo">
        <i class="fa fa-graduation-cap"></i>
        <h3>BAITUL JANNAH</h3>
        <h6>PROFESIONAL RELIGIUS</h6>
      </div>
      <div class="col-md-3 - col-sm-6 footer-item">
        <h5>FIND US</h5>
        <script src='https://maps.googleapis.com/maps/api/js?v=3.exp&key= AIzaSyA1kde_BcFaVjvCbM7cyvGGpYgYburwwzQ'></script>
        <div style='overflow:hidden;height:200px;width:200px;'>
          <div id='gmap_canvas' style='height:200px;width:200px;'></div>
          <style>#gmap_canvas img{max-width:none!important;background:none!important}</style>
        </div> 
        <a href='https://www.embedmap.net/'>add google map to my website</a> 
        <script type='text/javascript' src='https://embedmaps.com/google-maps-authorization/script.js?id=1560aedab5485fdfe086f6cf57a0fa307193a64b'></script>
        <script type='text/javascript'>function init_map(){var myOptions = {zoom:15,center:new google.maps.LatLng(-7.961558299999999,112.61085860000003),mapTypeId: google.maps.MapTypeId.ROADMAP};map = new google.maps.Map(document.getElementById('gmap_canvas'), myOptions);marker = new google.maps.Marker({map: map,position: new google.maps.LatLng(-7.961558299999999,112.61085860000003)});infowindow = new google.maps.InfoWindow({content:'<strong>PPM Baitul Jannah</strong><br>Bendungan Nawangan 13A<br> Malang<br>'});google.maps.event.addListener(marker, 'click', function(){infowindow.open(map,marker);});infowindow.open(map,marker);}google.maps.event.addDomListener(window, 'load', init_map);</script>
      </div>
      <div class="col-md-3 col-sm-6 footer-item">
        <h5>CONTACT US</h5>
        <p><i class="fa fa-map-marker"></i>Jalan Bendungan Nawangan 13, Karang Besuki, Sukun, Malang</p>
        <p><i class="fa fa-mobile"></i> +62 857-5597-1755</p>
        <p><i class="fa fa-envelope"></i>admin@ppmbaituljannah.com</p>
      </div>
      <div class="col-md-3 col-sm-6 footer-item">
        <h5>QUICK LINKS</h5>
        <div class="quick-link-box">
          <a href="http://blog.ppmbaituljannah.com"><i class="fa fa-file"></i>BLOG</a>
          <a href="http://ppmbaituljannah.com/page/gallery"><i class="fa fa-picture-o"></i>GALLERY</a>
          <a href="http://ppmbaituljannah.com/page/about"><i class="fa fa-info-circle"></i>ABOUT</a>
          <a href="http://ppmbaituljannah.com/page/contact"><i class="fa fa-phone-square"></i>CONTACT US</a>    
        </div>
      </div>
      <div class="clearfix visible-sm"></div>
      <div class="col-md-3 col-sm-6 footer-item">
        <h5>WAKTU KBM</h5>
        <p><i class="fa fa-clock-o"></i> MON - FRI 5:00 AM - 6:00 AM</p>
        <p><i class="fa fa-clock-o"></i> MON - FRI 7:30 PM - 9:00 PM</p>
        <p><i class="fa fa-clock-o"></i> SAT 8:00 AM - 11:00 AM</p>
      </div>
    </div>
    <div class="footer-social-row">
      <a href="index.html#"><i class="fa fa-facebook"></i></a> <a href="index.html#"><i class="fa fa-twitter"></i></a> <a href="index.html#"><i class="fa fa-google-plus"></i></a> <a href="index.html#"><i class="fa fa-linkedin"></i></a>
    </div>
  </div><!-- Login Modal -->
  <!-- Modal -->
  <div class="modal fade" id="loginModal" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content login-modal">
        <div class="modal-header">
          <button class="close" data-dismiss="modal" type="button">&times;</button>
          <h4 class="modal-title"><i class="fa fa-sign-in"></i>LOGIN</h4>
        </div>
        <div class="modal-body">
          <form method="POST" action="http://akun.ppmbaituljannah.com/user/login">
            <div>
              <label><i class="fa fa-user"></i>USERNAME</label> <input class="form-control" placeholder="Username" type="text" name="user">
            </div>
            <div>
              <label><i class="fa fa-key"></i>PASSWORD</label> <input class="form-control" placeholder="Password" type="password" name="pass">
            </div>
            <button type="submit" class="login-link"><i class="fa fa-sign-in"></i>LOGIN</button>
          </form>
        </div>
      </div>
    </div>
  </div><!-- Scripts -->
  <script src="<?php echo base_url('/') ?>assets/js/jQuery_v3_2_0.min.js">
  </script> 
  <script src="<?php echo base_url('/') ?>assets/js/bootstrap.min.js">
  </script> 
  <script src="<?php echo base_url('/') ?>assets/plugins/owl.carousel.min.js">
  </script> 
  <script src="<?php echo base_url('/') ?>assets/js/js.js">
  </script>
</body>
</html>