@extends('app')

@section('title' , __('messages.home'))

@section('content')
<!-- Content -->
<div class="page-content">
    <!-- Section Banner -->
    <div class="dez-bnr-inr dez-bnr-inr-md" style="background-image:url(https://res.cloudinary.com/ddcmwwmwk/image/upload/w_2000,h_1125/v1581928924/{{ $data['setting']['home_image'] }});">
        <div class="container">
            <div class="dez-bnr-inr-entry align-m">
                <div class="find-job-bx">
                    <a href="/jobs"  class="site-button button-sm">{{ App::isLocale('en') ? $data['setting']['text_one_en'] : $data['setting']['text_one'] }} </a>
                    <h2  style="color: #FFF">{{ App::isLocale('en') ? $data['setting']['text_two_en'] : $data['setting']['text_two'] }} <br/> <span style="color: #FFF" class="text-primary">{{ App::isLocale('en') ? $data['setting']['text_three_en'] : $data['setting']['text_three'] }}</span></h2>
                    <form method="GET" action="/jobs" class="dezPlaceAni">
                        <div class="row">
                            <div class="col-lg-4 col-md-6">
                                <div class="form-group">
                                    <label>{{ __('messages.enter_job') }}</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="job_name" placeholder="">
                                        <div class="input-group-append">
                                          <span class="input-group-text"><i class="fa fa-search"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{--  <div class="col-lg-3 col-md-6">
                                <div class="form-group">
                                    <label>City, State or ZIP</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="">
                                        <div class="input-group-append">
                                          <span class="input-group-text"><i class="fa fa-map-marker"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>  --}}
                            <div class="col-lg-4 col-md-6">
                                <div class="form-group">
                                    <select name="category_id">
                                        <option disabled selected>{{ __('messages.choose_category') }}</option>
                                        @if(isset($data['cats']) && count($data['cats']) > 0)
                                            @foreach ($data['cats'] as $cat)
                                            <option value="{{ $cat->id }}">{{ App::isLocale('en') ? $cat->title_en : $cat->title_ar }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <button type="submit" href="#" class="site-button btn-block">{{ __('messages.search_for_jobs') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @if(isset(Auth::guard('user')->user()->id))
    <!-- Section Banner END -->
    <div class="job-bx bg-white">
        <div class="job-bx-title clearfix">
            <h2 class="text-uppercase">{{ __('messages.suggested_jobs') }}
            <a href="/jobs" style="font-size: 16px" class="float-right text-primary">{{ __('messages.Show_more') }}</a></h2>
        </div>
        {{--  <div class="row">  --}}
            <ul class="post-job-bx browse-job-grid post-resume row">
                @if(isset($data['suggested_jobs']) && count($data['suggested_jobs']) > 0)
                    @foreach ($data['suggested_jobs'] as $suggested)
                <li class="col-lg-3 col-md-3">
                    <div class="post-bx">
                        <div class="d-flex m-b20">
                            <div class="job-post-info">
                                <h5 class="m-b0"><a href="/jobs/{{ $suggested->id }}">{{ App::isLocale('en') ? $suggested->title_en : $suggested->title_ar }}</a></h5>
                                <p class="m-b5 font-13">
                                    <a href="/jobs/{{ $suggested->id }}" class="text-primary">{{ __('messages.category') }} </a>
                                    {{ App::isLocale('en') ? $suggested->category->title_en : $suggested->category->title_ar }}</p>
                                <ul>
                                    <li><i class="fa fa-map-marker"></i>{{ $suggested->company->address }}</li>
                                    <li><i class="fa fa-money"></i> {{ $suggested->salary_from }} {{ __('messages.r_s') }} - {{ $suggested->salary_to }} {{ __('messages.r_s') }}</li>
                                </ul>
                            </div>
                        </div>
                        <div class="job-time m-t15 m-b10">
                            <a href="/jobs/{{ $suggested->id }}"><span>{{ $suggested->created_at->diffForHumans() }}</span></a>
                            {{--  <a href="javascript:void(0);"><span>Angular</span></a>
                            <a href="javascript:void(0);"><span>Bootstrap</span></a>  --}}
                        </div>
                        {{--  <a href="files/pdf-sample.pdf" target="blank" class="job-links">
                            <i class="fa fa-download"></i>
                        </a>  --}}
                    </div>
                </li>
                    @endforeach
                @endif
            </ul>
            
        {{--  </div>    --}}
    </div> 
    @endif
    <!-- About Us -->
    <div class="section-full job-categories content-inner-2 bg-white">
        <div class="container">
            <div class="section-head d-flex head-counter clearfix">
                <div class="mr-auto">
                    <h2 class="m-b5">{{ __('messages.explore_through_cats') }}</h2>
                    {{-- <h6 class="fw3">20+ Catetories work wating for you</h6> --}}
                </div>
                <div class="head-counter-bx">
                    <h2 class="m-b5 counter">{{ $data['jobs_count'] }}</h2>
                    <h6 class="fw3">{{ __('messages.available_jobs') }}</h6>
                </div>
                <div class="head-counter-bx">
                    <h2 class="m-b5 counter">{{ $data['companies_count'] }}</h2>
                    <h6 class="fw3">{{ __('messages.companies') }}</h6>
                </div>
                <div class="head-counter-bx">
                    <h2 class="m-b5 counter">{{ $data['users_count'] }}</h2>
                    <h6 class="fw3">{{ __('messages.loking_for_jobs') }}</h6>
                </div>
            </div>
            <div class="row sp20">
                @foreach ($data['categories'] as $category)
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <a href="/jobs?category_id={{ $category->id }}" class="dez-tilte">
                        <div class="icon-bx-wraper">
                            <div class="icon-content">
                                
                                <div class="icon-md text-primary m-b20">
                                    <img src="https://res.cloudinary.com/ddcmwwmwk/image/upload/w_200/v1581928924/{{ $category->image }}" />
                                </div>
                                <a href="/jobs?category_id={{ $category->id }}" class="dez-tilte">{{ App::isLocale('en') ? $category->title_en : $category->title_ar }}</a>
                                {{-- <p class="m-a0">198 Open Positions</p> --}}
                                <div class="rotate-icon"><i class="ti-location-pin"></i></div> 
                                
                            </div>
                        </div>
                    </a>				
                </div>
                @endforeach
                
                
                <div class="col-lg-12 text-center m-t30">
                    <a href="/categories" class="site-button radius-xl">{{ __('messages.all_cats') }}</a>
                </div>
            </div>
        </div>
    </div>
    <!-- About Us END -->
    <!-- Call To Action -->
    {{-- <div class="section-full content-inner bg-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 section-head text-center">
                    <h2 class="m-b5">Featured Cities</h2>
                    <h6 class="fw4 m-b0">20+ Featured Cities Added Jobs</h6>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-sm-6 col-md-6 m-b30">
                    <a href="javascript:void(0);">
                        <div class="city-bx align-items-end  d-flex" style="background-image:url(web/images/city/pic1.jpg)">
                            <div class="city-info">
                                <h5>Iraq</h5>
                                <span>765 Jobs</span>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-sm-6 col-md-6 m-b30">
                    <a href="javascript:void(0);">
                        <div class="city-bx align-items-end  d-flex" style="background-image:url(web/images/city/pic2.jpg)">
                            <div class="city-info">
                                <h5>Argentina</h5>
                                <span>352 Jobs</span>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-sm-6 col-md-6 m-b30">
                    <a href="javascript:void(0);">
                        <div class="city-bx align-items-end  d-flex" style="background-image:url(web/images/city/pic3.jpg)">
                            <div class="city-info">
                                <h5>Indonesia</h5>
                                <span>893 Jobs</span>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-sm-6 col-md-6 m-b30">
                    <a href="javascript:void(0);">
                        <div class="city-bx align-items-end  d-flex" style="background-image:url(web/images/city/pic4.jpg)">
                            <div class="city-info">
                                <h5>Gambia</h5>
                                <span>502 Jobs</span>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-sm-6 col-md-6 m-b30">
                    <a href="javascript:void(0);">
                        <div class="city-bx align-items-end  d-flex" style="background-image:url(web/images/city/pic5.jpg)">
                            <div class="city-info">
                                <h5>India</h5>
                                <span>765 Jobs</span>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-sm-6 col-md-6 m-b30">
                    <a href="javascript:void(0);">
                        <div class="city-bx align-items-end  d-flex" style="background-image:url(web/images/city/pic6.jpg)">
                            <div class="city-info">
                                <h5>Thailand</h5>
                                <span>352 Jobs</span>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-sm-6 col-md-6 m-b30">
                    <a href="javascript:void(0);">
                        <div class="city-bx align-items-end  d-flex" style="background-image:url(web/images/city/pic7.jpg)">
                            <div class="city-info">
                                <h5>Banjul</h5>
                                <span>893 Jobs</span>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-sm-6 col-md-6 m-b30">
                    <a href="javascript:void(0);">
                        <div class="city-bx align-items-end  d-flex" style="background-image:url(web/images/city/pic8.jpg)">
                            <div class="city-info">
                                <h5>Spain</h5>
                                <span>502 Jobs</span>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div> --}}
    @if(!isset($data['recent_jobs']) || count($data['recent_jobs']) == 0)
    @php
    $data['recent_jobs'] = $data['all_recent_jobs']
    @endphp
    
    @endif
    <!-- Call To Action END -->
    <!-- Our Job -->
    <div class="section-full bg-white content-inner-2">
        <div class="container">
            <div class="d-flex job-title-bx section-head">
                <div class="mr-auto">
                    <h2 class="m-b5">{{ __('messages.recent_jobs') }}</h2>
                    <h6 class="fw4 m-b0">{{ count($data['recent_jobs']) }}+ {{ __('messages.jobs_added_recently') }}</h6>
                </div>
                <div class="align-self-end">
                    <a href="/jobs" class="site-button button-sm">{{ __('messages.show_all_jobs') }} <i class="fa fa-long-arrow-right"></i></a>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-9">
                    <ul class="post-job-bx browse-job">
                        @if(isset($data['recent_jobs']) && count($data['recent_jobs']) > 0)
                        @foreach ($data['recent_jobs'] as $job)
                        <li>
                            <div class="post-bx">
                                <div class="d-flex m-b30">
                                    <div class="job-post-company">
                                        <span><img alt="" src="https://res.cloudinary.com/ddcmwwmwk/image/upload/w_200,h_200/v1581928924/{{ $job->image }}"/></span>
                                    </div>
                                    <div class="job-post-info">
                                        <h4><a href="/jobs/{{ $job->id }}">{{ App::isLocale('en') ? $job->title_en : $job->title_ar }}</a></h4>
                                        <ul>
                                            <li><i class="fa fa-map-marker"></i> {{ $job->company->address }}</li>
                                            <li><i class="fa fa-bookmark-o"></i> {{ App::isLocale('en') ? $job->type->title_en : $job->type->title_ar }}</li>
                                            <li><i class="fa fa-clock-o"></i> {{ $job->created_at->diffForHumans() }}</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <div class="job-time mr-auto">
                                        <a href="/jobs/{{ $job->id }}"><span>{{ App::isLocale('en') ?  $job->type->title_en : $job->type->title_ar }}</span></a>
                                    </div>
                                    <div class="salary-bx">
                                        <span>{{ $job->salary_from }} {{ __('messages.r_s') }} - {{ $job->salary_to }} {{ __('messages.r_s') }}</span>
                                    </div>
                                </div>
                                {{-- <label class="like-btn">
                                      <input type="checkbox">
                                      <span class="checkmark"></span>
                                </label> --}}
                            </div>
                        </li>
                        @endforeach
                        
                        @endif
                        
                    </ul>
                    {{-- <div class="m-t30">
                        <div class="d-flex">
                            <a class="site-button button-sm mr-auto" href="javascript:void(0);"><i class="ti-arrow-left"></i> Prev</a>
                            <a class="site-button button-sm" href="javascript:void(0);">Next <i class="ti-arrow-right"></i></a>
                        </div>
                    </div> --}}
                </div>
                <div class="col-xl-3 col-lg-4 col-md-5">
                    @if(isset($data['website_ads']) && count($data['website_ads']) > 0)
                    @foreach ($data['website_ads'] as $website_ad)
                    <div style="margin-bottom : 20px" class="sticky-top">
                        <a target="_blank" href="{{ $website_ad->content }}">
                            <div style="background-image: url(https://res.cloudinary.com/ddcmwwmwk/image/upload/v1581928924/{{ $website_ad->image }});
                                background-size: cover;
                                position: relative;
                                border-radius: 4px;
                                {{--  box-shadow: 0 0 10px 0 rgba(0,24,128,0.1);  --}}
                                padding: 30px 20px;
                                z-index: 1;min-height : 300px" class="quote-bx">
                                    {{--  <div class="quote-info">
                                        <h4>Make a Difference with Your Online Resume!</h4>
                                        <p>Your resume in minutes with JobBoard resume assistant is ready!</p>
                                        <a href="#" class="site-button">Create an Account</a>
                                    </div>  --}}
                                </div>
                        </a>       
                        
                    </div>
                    @endforeach
                    
                    @endif
                </div>
            </div>
        </div>
    </div>
    <!-- Our Job END -->	
    <!-- Call To Action -->
    {{-- <div class="section-full p-tb70 overlay-black-dark text-white text-center bg-img-fix" style="background-image: url(web/images/background/bg4.jpg);">
        <div class="container">
            <div class="section-head text-center text-white">
                <h2 class="m-b5">Testimonials</h2>
                <h5 class="fw4">Few words from candidates</h5>
            </div>
            <div class="blog-carousel-center owl-carousel owl-none">
                <div class="item">
                    <div class="testimonial-5">
                        <div class="testimonial-text">
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry.</p>
                        </div>
                        <div class="testimonial-detail clearfix">
                            <div class="testimonial-pic radius shadow">
                                <img src="/web/images/testimonials/pic1.jpg" width="100" height="100" alt="">
                            </div>
                            <strong class="testimonial-name">David Matin</strong> 
                            <span class="testimonial-position">Student</span> 
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="testimonial-5">
                        <div class="testimonial-text">
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry.</p>
                        </div>
                        <div class="testimonial-detail clearfix">
                            <div class="testimonial-pic radius shadow">
                                <img src="/web/images/testimonials/pic2.jpg" width="100" height="100" alt="">
                            </div>
                            <strong class="testimonial-name">David Matin</strong> 
                            <span class="testimonial-position">Student</span> 
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="testimonial-5">
                        <div class="testimonial-text">
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry.</p>
                        </div>
                        <div class="testimonial-detail clearfix">
                            <div class="testimonial-pic radius shadow">
                                <img src="/web/images/testimonials/pic3.jpg" width="100" height="100" alt="">
                            </div>
                            <strong class="testimonial-name">David Matin</strong> 
                            <span class="testimonial-position">Student</span> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- Call To Action END -->
    <!-- Our Latest Blog -->
    {{-- <div class="section-full content-inner-2 overlay-white-middle" style="background-image:url(web/images/lines.png); background-position:bottom; background-repeat:no-repeat; background-size: 100%;">
        <div class="container">
            <div class="section-head text-black text-center">
                <h2 class="m-b0">Membership Plans</h2>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy.</p>
            </div>
            <!-- Pricing table-1 Columns 3 with gap -->
            <div class="section-content box-sort-in button-example m-t80">
                <div class="pricingtable-row">
                    <div class="row max-w1000 m-auto">
                        <div class="col-sm-12 col-md-4 col-lg-4 p-lr0">
                            <div class="pricingtable-wrapper style2 bg-white">
                                <div class="pricingtable-inner">
                                    <div class="pricingtable-price"> 
                                        <h4 class="font-weight-300 m-t10 m-b0">Basic</h4>
                                        <div class="pricingtable-bx"> $  <span>29</span> /  Per Installation </div>
                                    </div>
                                    <p>Lorem ipsum dolor sit amet adipiscing elit sed do eiusmod tempors labore et dolore magna siad enim aliqua</p>
                                    <div class="m-t20"> 
                                        <a href="register.html" class="site-button radius-xl"><span class="p-lr30">Sign Up</span></a> 
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-4 col-lg-4 p-lr0">
                            <div class="pricingtable-wrapper style2 bg-primary text-white active">
                                <div class="pricingtable-inner">
                                    <div class="pricingtable-price"> 
                                        <h4 class="font-weight-300 m-t10 m-b0">Professional</h4>
                                        <div class="pricingtable-bx"> $ <span>29</span> /  Per Installation </div>
                                    </div>
                                    <p>Lorem ipsum dolor sit amet adipiscing elit sed do eiusmod tempors labore et dolore magna siad enim aliqua</p>
                                    <div class="m-t20"> 
                                        <a href="register.html" class="site-button white radius-xl"><span class="text-primary p-lr30">Sign Up</span></a> 
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-4 col-lg-4 p-lr0">
                            <div class="pricingtable-wrapper style2 bg-white">
                                <div class="pricingtable-inner">
                                    <div class="pricingtable-price"> 
                                        <h4 class="font-weight-300 m-t10 m-b0">Extended</h4>
                                        <div class="pricingtable-bx"> $  <span>29</span> /  Per Installation </div>
                                    </div>
                                    <p>Lorem ipsum dolor sit amet adipiscing elit sed do eiusmod tempors labore et dolore magna siad enim aliqua</p>
                                    <div class="m-t20"> 
                                        <a href="register.html" class="site-button radius-xl"><span class="p-lr30">Sign Up</span></a> 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- Our Latest Blog -->
</div>
<!-- Content END-->
<!-- Modal Box -->

<!-- Modal Box End -->
@endsection