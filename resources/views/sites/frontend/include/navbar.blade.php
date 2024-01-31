<div class="navbar-area ledu-area">
    <div class="mobile-responsive-nav">
        <div class="container">
            <div class="mobile-responsive-menu">
                <div class="logo">
                    <a href="{{url('/')}}">
                        <img src="{{asset('assets/images/logos/logo-small.png')}}" class="logo-one" alt="logo" width="50">
                        <img src="{{asset('assets/images/logos/logo-small.png')}}" class="logo-two" alt="logo" width="50">
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="desktop-nav nav-area">
        <div class="container-fluid">
            <nav class="navbar navbar-expand-md navbar-light ">
                <a class="navbar-brand" href="{{url('/')}}">
                    <img src="{{asset('assets/images/logos/logo.png')}}" class="logo-one" alt="Logo" width="75">
                    <img src="{{asset('assets/images/logos/logo-small.png')}}" class="logo-two" alt="Logo" width="75">
                </a>
                
                <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="{{url('/')}}" class="nav-link {{ (request()->is('/')) ? 'active' : '' }}">
                                Home
                            </a>
                           
                        </li>
                        <li class="nav-item">
                            <a href="{{route('about.us')}}" class="nav-link {{ (request()->is('about-us')) ? 'active' : '' }}">
                                About Us
                            </a>
                          
                        </li>
                        
                        <li class="nav-item">
                            <a href="{{route('company.projects')}}" class="nav-link {{ (request()->is('our-projects')) ? 'active' : '' }}">
                                Projects
                            </a>
                          
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link dropdown-toggle">
                                Our Services
                            </a>
                            <ul class="dropdown-menu">
                                @if (count($services) > 0)
                                @foreach ($services as $service)
                               
                                <li class="nav-item">
                                    <a href="{{route('company.service',$service->id)}}" class="nav-link {{ (request()->is('our-service*')) ? 'active' : '' }}">
                                        {{$service->header}}
                                    </a>
                                </li>
                                @endforeach
                            @endif
                            </ul>
                        </li> 
                        
                        {{-- @if (count($magazines) > 0) --}}
                        <li class="nav-item">
                            <a href="{{route('magazine.list')}}" class="nav-link {{ (request()->is('magazines')) ? 'active' : '' }}">
                                Magazine
                            </a>
                          
                        </li>
  
                        {{-- @endif --}}
                        <li class="nav-item">
                            <a href="{{route('front.news.list')}}" class="nav-link {{ (request()->is('news*')) ? 'active' : '' }}">
                             News
                            </a>
                          
                        </li>

                        <li class="nav-item">
                            <a href="{{route('contact.us')}}" class="nav-link {{ (request()->is('contact-us')) ? 'active' : '' }}">
                                Contact Us
                            </a>
                          
                        </li>
                       
                      @auth
                      <li class="nav-item">
                        <a href="#" class="nav-link dropdown-toggle">
                        Account
                        </a>
                        <ul class="dropdown-menu">
                         
                            <li class="nav-item">
                                <a href="{{url('/dashboard')}}" class="nav-link">
                                   Dashboard
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{url('logout')}}" class="nav-link ">
                                   Logout
                                </a>
                            </li>
                           
                        </ul>
                    </li>
                      @endauth 
                        

                    </ul>
                    
                </div>
            </nav>
        </div>
    </div>
    {{-- <div class="side-nav-responsive">
        <div class="container">
            <div class="dot-menu">
                <div class="circle-inner">
                    <div class="circle circle-one"></div>
                    <div class="circle circle-two"></div>
                    <div class="circle circle-three"></div>
                </div>
            </div>
        </div>
    </div> --}}
</div>
