@extends('app')

@section('title' , __('messages.jobs'))

@section('content')

    <div class="dez-bnr-inr overlay-black-middle" style="background-image:url(https://res.cloudinary.com/ddcmwwmwk/image/upload/w_1920,h_766/v1581928924/{{ $data['setting']['jobs_image'] }});">
        <div class="container">
            <div class="dez-bnr-inr-entry">
                <h1 class="text-white">{{ __('messages.jobs') }}</h1>
                <!-- Breadcrumb row -->
                <div class="breadcrumb-row">
                    <ul class="list-inline">
                        <li><a href="#">{{ __('messages.home') }}</a></li>
                        <li>{{ __('messages.jobs') }}</li>
                    </ul>
                </div>
                <!-- Breadcrumb row END -->
            </div>
        </div>
    </div>
    <!-- inner page banner END -->
    <!-- Filters Search -->
    <div class="section-full browse-job-find">
        <div class="container">
            <div class="find-job-bx">
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
    <!-- Filters Search END -->
    <!-- contact area -->
    <div class="content-block">
        <!-- Browse Jobs -->
        <div style="margin : 20px 0" class="section-full browse-job p-b50">
            <div class="container">
                <div class="row">
                    <div class="col-xl-9 col-lg-8 col-md-7">
                        <div class="job-bx-title clearfix">
                            <h5 class="font-weight-700 pull-left text-uppercase">{{ $data['jobs_count'] }} {{ __('messages.jobs') }}</h5>
                            @if(isset($data['category']))
                            <a href="#" class="site-button right-arrow button-sm float-right">{{ $data['category'] }}</a>
                            @endif
                            @if(isset($data['company']))
                                <a href="#" class="site-button right-arrow button-sm float-right">{{ $data['company'] }}</a>
                            @endif
                            <!--<div class="float-right">-->
                            <!--    <span class="select-title">رتب حسب الأحدث</span>-->
                            <!--    <select>-->
                            <!--        <option>آخر شهر</option>-->
                            <!--        <option>آخر شهرين</option>-->
                            <!--        <option>آخر أسبوع</option>-->
                            <!--        <option>آخر 3 أيام</option>-->
                            <!--    </select>-->
                            <!--</div>-->
                        </div>
                        <ul class="post-job-bx">
                            @if(isset($data['jobs']) && count($data['jobs']) > 0)
                                @foreach ($data['jobs'] as $job)
                            <li>
                                <div class="post-bx">
                                    
                                    <div class="d-flex m-b30">
                                        <div class="job-post-company">
                                            <a href="/jobs/{{ $job->id }}"><span>
                                                <img alt="" src="https://res.cloudinary.com/ddcmwwmwk/image/upload/w_200,h_200/v1581928924/{{ $job->image }}"/>
                                            </span></a>
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
                                            <a href="#"><span>{{ App::isLocale('en') ? $job->type->title_en : $job->type->title_ar }}</span></a>
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
                        {{$data['jobs']->links()}}
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-5">
                        @if(isset($data['website_ads']) && count($data['website_ads']) > 0)
                        @foreach ($data['website_ads'] as $website_ad)
                        <div  style="margin-bottom: 20px" class="sticky-top">
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
        <!-- Browse Jobs END -->
    </div>
@endsection