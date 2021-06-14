<footer class="site-footer">
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-xl-5 col-lg-4 col-md-12 col-sm-12">
                    <div class="widget">
                        <img src="https://res.cloudinary.com/ddcmwwmwk/image/upload/v1581928924/{{ $data['setting']['footer_logo'] }}" width="180" class="m-b15" alt=""/>
                        <p class="text-capitalize m-b20">{{ App::isLocale('en') ? $data['setting']['footer_text_en'] : $data['setting']['footer_text'] }}</p>
                        
                        <ul class="list-inline m-a0">
                            <li><a href="{{ $data['setting']['facebook'] }}" class="site-button white facebook circle "><i class="fa fa-facebook"></i></a></li>
                            <li><a href="{{ $data['setting']['instegram'] }}" class="site-button white instagram circle "><i class="fa fa-instagram"></i></a></li>
                            <li><a href="{{ $data['setting']['twitter'] }}" class="site-button white twitter circle "><i class="fa fa-twitter"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-5 col-lg-5 col-md-8 col-sm-8 col-12">
                    <div class="widget border-0">
                        <h5 class="m-b30 text-white">{{ __('messages.categories') }}</h5>
                        <ul class="list-2 list-line">
                            @if(isset($data['cats']) && count($data['cats']) > 0)
                            @foreach ($data['cats'] as $cat)
                            <li><a href="/jobs?category_id={{ $cat->id }}">{{ App::isLocale('en') ? $cat->title_en : $cat->title_ar }}</a></li>
                            @endforeach
                            @endif
                        </ul>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-3 col-md-4 col-sm-4 col-12">
                    <div class="widget border-0">
                        <h5 class="m-b30 text-white">{{ __('messages.main_menu') }} </h5>
                        <ul class="list-2 w10 list-line">
                            
                            <li><a href="/">{{ __('messages.home') }}</a></li>
                            <li><a href="/about-us">{{ __('messages.about_us') }}</a></li>
                            <li><a href="/jobs">{{ __('messages.jobs') }}</a></li>
                            <li><a href="/categories">{{ __('messages.categories') }}</a></li>
                            <li><a href="/contact-us">{{ __('messages.contact_us') }}</a></li>
                            <li><a href="/terms-conditions">{{ __('messages.terms_conditions') }}</a></li>
                            @if(isset(Auth::guard('user')->user()->id))
                            <li><a href="/profile/resume">{{ __('messages.create_resume') }}</a></li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- footer bottom part -->
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <span> {{ __('messages.developed&designed') }}  <i class="fa fa-heart m-lr5 text-red heart"></i>
                    <a target="_blank" href="https://u-smart.co/">{{ __('messages.u_smart') }} </a> </span> 
                </div>
            </div>
        </div>
    </div>
</footer>

