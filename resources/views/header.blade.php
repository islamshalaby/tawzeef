<header class="site-header mo-left header fullwidth">
    <!-- main header -->
    <div class="sticky-header main-bar-wraper navbar-expand-lg">
        <div class="main-bar clearfix">
            <div class="container clearfix">
                <!-- website logo -->
                <div class="logo-header mostion">
                    <a href="/"><img src="https://res.cloudinary.com/ddcmwwmwk/image/upload/h_50/v1581928924/{{ $data['setting']['logo'] }}" class="logo" alt=""></a>
                </div>
                <!-- nav toggle button -->
                <!-- nav toggle button -->
                <button class="navbar-toggler collapsed navicon justify-content-end" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
                <!-- extra nav -->
                
                <div class="extra-nav">
                    <div class="extra-cell">
                        @if(!isset(Auth::guard('user')->user()->id) && !isset(Auth::guard('company')->user()->id))
                        <a href="/register" class="site-button"><i class="fa fa-user"></i> {{ __('messages.sign_in') }}</a>
                        <a href="/register-companies" class="site-button"><i class="fa fa-user"></i> {{ __('messages.sign_in_company') }}</a>
                        @elseif(isset(Auth::guard('company')->user()->id))
                        <a href="{{ route('logout.company') }}" class="site-button"><i class="fa fa-sign-out"></i> {{ __('messages.signout') }} </a>
                        <a href="{{ route('company.profile') }}" class="site-button"><i class="fa fa-user-o"></i> {{ __('messages.control_panel') }} </a>
                        @else
                        <a href="{{ route('logout.user') }}" class="site-button"><i class="fa fa-sign-out"></i> {{ __('messages.signout') }} </a>
                        <a href="{{ route('user.profile') }}" class="site-button"><i class="fa fa-user-o"></i> {{ __('messages.myprofile') }} </a>
                        @endif
                        @if(App::isLocale('ar'))
                        <a href="/setlocale/en" class="site-button"> English</a>
                        @else
                        <a href="/setlocale/ar" class="site-button"> العربية</a>
                        @endif
                    </div>
                </div>
                
                <!-- main nav -->
                <div class="header-nav navbar-collapse collapse justify-content-start" id="navbarNavDropdown">
                    <ul class="nav navbar-nav">
                        <li class="{{ Request::segment(1) == '' ? 'active' : '' }}">
                            <a href="/">{{ __('messages.home') }}</a>
                        </li>
                        <li class="{{ Request::segment(1) == 'jobs' ? 'active' : '' }}">
                            <a href="/jobs">{{ __('messages.jobs') }}</a>
                        </li>
                        <li class="{{ Request::segment(1) == 'categories' ? 'active' : '' }}">
                            <a href="/categories">{{ __('messages.categories') }}</a>
                        </li>
                        @if(isset(Auth::guard('user')->user()->id))
                        <li class="{{ Request::segment(2) == 'resume' ? 'active' : '' }}">
                            <a href="/profile/resume">{{ __('messages.create_resume') }}</a>
                        </li>
                        @endif
                    </ul>			
                </div>
            </div>
        </div>
    </div>
    <!-- main header END -->
</header>