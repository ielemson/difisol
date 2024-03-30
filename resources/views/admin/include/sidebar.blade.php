@php
    $setting = \App\Models\Setting::find(1);
@endphp

<div class="app-sidebar colored">
    <div class="sidebar-header">
        <a class="header-brand" href="{{ route('dashboard') }}">
            <div class="logo-img">
                <img height="30" src="{{asset('assets/images/settings')}}/{{$setting->website_logo}}" class="header-brand-img" title="FMAP">
            </div>
        </a>
        <div class="sidebar-action"><i class="ik ik-arrow-left-circle"></i></div>
        <button id="sidebarClose" class="nav-close"><i class="ik ik-x"></i></button>
    </div>

    @php
        $segment1 = request()->segment(1);
        $segment2 = request()->segment(2);
    @endphp

    <div class="sidebar-content">
        <div class="nav-container">
            <nav id="main-menu-navigation" class="navigation-main">
                <div class="nav-item {{ $segment1 == 'dashboard' ? 'active' : '' }}">
                    <a href="{{ route('dashboard') }}"><i
                            class="ik ik-bar-chart-2"></i><span>{{ __('Dashboard') }}</span></a>
                </div>


                @hasrole('funnab')
                {{-- News Route Starts Here::::::::::::::::::::::::::: --}}
                <div class="nav-lavel">{{ __('NEWS') }} </div>
                <div class="nav-item {{ $segment1 == 'news' ? 'active open' : '' }} has-sub">
                    <a href="#"><i class="ik ik-file-text"></i><span>{{ __('News') }}</span></a>
                    <div class="submenu-content">
                        <!-- only those have manage_user permission will get access -->
                        <a href="{{ route('funnab.news.create') }}"
                            class="menu-item {{ $segment1 == 'news' && $segment2 == 'create' ? 'active' : '' }}">{{ __('Create News') }}</a>
                        <a href="{{ route('funnab.news.list') }}"
                            class="menu-item {{ $segment1 == 'news' && $segment2 == 'create' ? 'active' : '' }}">{{ __('News List') }}</a>

                    </div>
                </div>
                {{-- News Route Ends Here::::::::::::::::::::::::::: --}}

                <div class="nav-item {{ $segment1 == 'gallery' ? 'active open' : '' }} has-sub">
                    <a href="#"><i class="ik ik-settings"></i><span>{{ __('Gallery') }}</span></a>
                    <div class="submenu-content">
                        <!-- only those have manage_user permission will get access -->
                        <a href="{{ route('funnab.gallery.index') }}"
                            class="menu-item {{ $segment1 == 'partner' && $segment2 == 'list' ? 'active' : '' }}">{{ __('List Gallery') }}
                        </a>
                        <a href="{{ route('funnab.gallery.create') }}"
                            class="menu-item {{ $segment1 == 'service' && $segment2 == 'create' ? 'active' : '' }}">{{ __('Create Gallery') }}
                        </a>
                    </div>
                </div>
                @endhasrole 


                @hasrole('alhikmah')
                {{-- News Route Starts Here::::::::::::::::::::::::::: --}}
                <div class="nav-lavel">{{ __('NEWS') }} </div>
                <div class="nav-item {{ $segment1 == 'news' ? 'active open' : '' }} has-sub">
                    <a href="#"><i class="ik ik-file-text"></i><span>{{ __('News') }}</span></a>
                    <div class="submenu-content">
                        <!-- only those have manage_user permission will get access -->
                        <a href="{{ route('alhikmah.news.create') }}"
                            class="menu-item {{ $segment1 == 'news' && $segment2 == 'create' ? 'active' : '' }}">{{ __('Create News') }}</a>
                        <a href="{{ route('alhikmah.news.list') }}"
                            class="menu-item {{ $segment1 == 'news' && $segment2 == 'create' ? 'active' : '' }}">{{ __('News List') }}</a>

                    </div>
                </div>
                {{-- News Route Ends Here::::::::::::::::::::::::::: --}}

                <div class="nav-item {{ $segment1 == 'gallery' ? 'active open' : '' }} has-sub">
                    <a href="#"><i class="ik ik-settings"></i><span>{{ __('Gallery') }}</span></a>
                    <div class="submenu-content">
                        <!-- only those have manage_user permission will get access -->
                        <a href="{{ route('alhikmah.gallery.index') }}"
                            class="menu-item {{ $segment1 == 'partner' && $segment2 == 'list' ? 'active' : '' }}">{{ __('List Gallery') }}
                        </a>
                        <a href="{{ route('alhikmah.gallery.create') }}"
                            class="menu-item {{ $segment1 == 'gallery' && $segment2 == 'create' ? 'active' : '' }}">{{ __('Create Gallery') }}
                        </a>
                    </div>
                </div>
                @endhasrole 

                @hasrole('Super Admin')
                    <div class="nav-lavel">{{ __('Layouts') }} </div>
                        <div
                        class="nav-item {{ $segment1 == 'users' || $segment1 == 'roles' || $segment1 == 'permission' || $segment1 == 'user' ? 'active open' : '' }} has-sub">
                        <a href="#"><i class="ik ik-user"></i><span>{{ __('Adminstrator') }}</span></a>
                        <div class="submenu-content">
                            <!-- only those have manage_user permission will get access -->

                            <a href="{{ url('users') }}"
                                class="menu-item {{ $segment1 == 'users' ? 'active' : '' }}">{{ __('Users') }}</a>
                            <a href="{{ url('user/create') }}"
                                class="menu-item {{ $segment1 == 'user' && $segment2 == 'create' ? 'active' : '' }}">{{ __('Add User') }}</a>

                            <!-- only those have manage_role permission will get access -->

                            <a href="{{ url('roles') }}"
                                class="menu-item {{ $segment1 == 'roles' ? 'active' : '' }}">{{ __('Roles') }}</a>

                            <!-- only those have manage_permission permission will get access -->

                            <a href="{{ url('permission') }}"
                                class="menu-item {{ $segment1 == 'permission' ? 'active' : '' }}">{{ __('Permission') }}</a>

                        </div>
                    </div>
                    {{-- Create Slider --}}
                    <div class="nav-lavel">{{ __('Slider') }} </div>
                    <div class="nav-item {{ $segment1 == 'slider' ? 'active open' : '' }} has-sub">
                        <a href="#"><i class="ik ik-file-text"></i><span>{{ __('Slider Menu') }}</span></a>
                        <div class="submenu-content">
                            <!-- only those have manage_user permission will get access -->
                            <a href="{{ route('slider.create') }}"
                                class="menu-item {{ $segment1 == 'slider' && $segment2 == 'create' ? 'active' : '' }}">{{ __('Create Slider') }}</a>
                            <a href="{{ route('slider.list') }}"
                                class="menu-item {{ $segment1 == 'slider' && $segment2 == 'all' ? 'active' : '' }}">{{ __('Slider List') }}</a>


                        </div>
                    </div>

                    {{-- News Route Starts Here::::::::::::::::::::::::::: --}}
                    <div class="nav-lavel">{{ __('NEWS') }} </div>
                    <div class="nav-item {{ $segment1 == 'news' ? 'active open' : '' }} has-sub">
                        <a href="#"><i class="ik ik-file-text"></i><span>{{ __('News') }}</span></a>
                        <div class="submenu-content">
                            <!-- only those have manage_user permission will get access -->
                            <a href="{{ route('news.create') }}"
                                class="menu-item {{ $segment1 == 'news' && $segment2 == 'create' ? 'active' : '' }}">{{ __('Create News') }}</a>
                            <a href="{{ route('news.list') }}"
                                class="menu-item {{ $segment1 == 'news' && $segment2 == 'create' ? 'active' : '' }}">{{ __('News List') }}</a>
                            <a href="{{ route('news.category') }}"
                                class="menu-item {{ $segment1 == 'news' && $segment2 == 'create' ? 'active' : '' }}">{{ __('News Categories') }}</a>


                        </div>
                    </div>
                    {{-- News Route Ends Here::::::::::::::::::::::::::: --}}

                    {{-- Setting Menu Starts --}}
                    <div class="nav-lavel">{{ __('General Setting') }} </div>
                    <div class="nav-item {{ $segment1 == 'setting' ? 'active open' : '' }} has-sub">
                        <a href="#"><i class="ik ik-file-text"></i><span>{{ __('Setting') }}</span></a>
                        <div class="submenu-content">
                            <!-- only those have manage_user permission will get access -->
                            <a href="{{ route('website-setting.edit') }}"
                                class="menu-item {{ $segment1 == 'setting' && $segment2 == 'website-setting' ? 'active' : '' }}">{{ __('Website Settings') }}
                            </a>
                        </div>
                    </div>

                    <div class="nav-item {{ $segment1 == 'service' ? 'active open' : '' }} has-sub">
                        <a href="#"><i class="ik ik-settings"></i><span>{{ __('Partners') }}</span></a>
                        <div class="submenu-content">
                            <!-- only those have manage_user permission will get access -->
                            <a href="{{ url('partner/list') }}"
                                class="menu-item {{ $segment1 == 'partner' && $segment2 == 'list' ? 'active' : '' }}">{{ __('List Partners') }}
                            </a>
                            <a href="{{ url('/partner/create') }}"
                                class="menu-item {{ $segment1 == 'service' && $segment2 == 'create' ? 'active' : '' }}">{{ __('Add Partner') }}
                            </a>
                        </div>
                    </div>
                    <div class="nav-item {{ $segment1 == 'gallery' ? 'active open' : '' }} has-sub">
                        <a href="#"><i class="ik ik-settings"></i><span>{{ __('Gallery') }}</span></a>
                        <div class="submenu-content">
                            <!-- only those have manage_user permission will get access -->
                            <a href="{{ route('gallery.index') }}"
                                class="menu-item {{ $segment1 == 'partner' && $segment2 == 'list' ? 'active' : '' }}">{{ __('List Gallery') }}
                            </a>
                            <a href="{{ route('gallery.create') }}"
                                class="menu-item {{ $segment1 == 'service' && $segment2 == 'create' ? 'active' : '' }}">{{ __('Create Gallery') }}
                            </a>
                        </div>
                    </div>
                    <div class="nav-item {{ $segment1 == 'media' ? 'active open' : '' }} has-sub">
                        <a href="#"><i class="ik ik-settings"></i><span>{{ __('Media') }}</span></a>
                        <div class="submenu-content">
                            <!-- only those have manage_user permission will get access -->
                            <a href="{{ route('media.index') }}"
                                class="menu-item {{ $segment1 == 'media' && $segment2 == 'index' ? 'active' : '' }}">{{ __('List Media') }}
                            </a>
                            <a href="{{ route('media.create') }}"
                                class="menu-item {{ $segment1 == 'service' && $segment2 == 'create' ? 'active' : '' }}">{{ __('Create Media') }}
                            </a>
                        </div>
                    </div>

                    {{-- Setting Menu Ends --}}
                @endhasrole 
          
        </div>
    </div>
</div>
