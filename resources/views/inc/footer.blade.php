<!-- ============FOOTER============= -->
<footer id="footer"> 
    <div class="footer-content container">
      <div class="footer-adress text-center col-xs-12 col-sm-4 col-md-4">
            <h4>He must increase, but I must decrease. <i> - John 3:30 KJV</i></h4>
            <ul class="footer-menus">
              <li>Home /</li>
              <li>About </li><br />
              <li>Service /</li>
              <li>Gallery /</li>
              <li>Contact</li>
            </ul>
        </div>
        <div class="footer-second col-xs-12 col-sm-4 col-md-4">
          <div class="social-block text-center">
            <div class="social-share">
              <i class="fa fa-2x fa-facebook"></i>
              <i class="fa fa-2x  fa-twitter"></i>
              <i class="fa fa-2x  fa-google-plus"></i>
              <i class="fa fa-2x  fa-instagram"></i>
            </div>
          </div>
           <p class="text-center footer-text1"></p>
            <p class="text-center footer-text1">havenbbc1996@gmail.com</p></div>
        <div class="footer-third col-xs-12 col-sm-4 col-md-4">
          <div class="copyright">
              <span>Copyright 2014 Theme</span><br>
              <span>All Rights Reserved</span>   
              
          @if(Auth::guest())
              <br>
              <span><a href="{{ route('login') }}">Admin Login</a></span>
          @endif
          </div>
        </div>
    </div>
    <div class="move-top-page">
  </div>
</footer>

