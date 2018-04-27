@if(!Auth::guest())
<nav class="navbar navbar-default navbar-fixed-top ">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/home') }}">
                    <img src="/storage/meta/favicon-32x32.png" alt="" style="display:inline">
                    HBBC <span class="badge badge-primary"><small>admin</small></span>
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                   <li><a href="/feedbacks/">Messages<span class="badge">30</span></a></li>
                   <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            Ministry <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu" role="menu">  
                            <li><a href="/ministries/">Ministry</a></li>
                            <li><a href="/positions/">Positions</a></li>
                            <li><a href="/leaders">Leaders</a></li>
                        </ul>
                    </li>
                    <li>
                            <a href="/slides/">Slides</a>
                    </li>
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (!Auth::guest())
                                         <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">  
                                <li><a href="{{ route('register') }}">Register as New</a></li>
                                <li>
                                    <a href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                              
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
@endif