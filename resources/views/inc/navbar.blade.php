<div class="header container" id={{$pageName = ''}}>
    <div class="visible-xs visible-sm col-xs-12 col-sm-12 text-center sm-logo">
      <a rel="home" href="/">
        <img src="/storage/img/logo.png" width="200" alt="logo">
      </a>
    </div>
    </div>
      <div class="navbar" role="navigation">
          <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              </button>
          </div>
          <div class="collapse navbar-collapse">
              <ul class="nav navbar-nav">
                  <li @if($pageName == "Home") class="selected" @endif><a href="/">Home</a></li>
                  <li @if($pageName == "About") class="selected" @endif><a href="/about">About</a></li>
                  <li @if($pageName == "Service Times") class="selected" @endif><a href="/services">Service Times</a></li>
                  <li @if($pageName == "Gallery") class="selected" @endif><a href="/galleries">Gallery</a></li>
        <li class= "hidden-xs hidden-sm">
          <a rel="home" href="/"><img class="logo" src="/storage/img/logo.png" width="200" alt="logo"></a>
        </li>
                  <li><a href="/events">Events</a></li>
                  <li><a href="/ministries">Ministries</a></li>
                  <li><a href="donate.html">Donate</a></li>
                  <li @if($pageName == "Contact Us") class="selected" @endif><a href="/contact">Contact</a></li>
              </ul>
          </div>
      </div>