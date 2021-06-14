@extends('app')

@section('title' , __('messages.job_details'))

@section('content')
<div class="dez-bnr-inr overlay-black-middle" style="background-image:url(https://res.cloudinary.com/ddcmwwmwk/image/upload/w_1920,h_766/v1581928924/{{ $data['setting']['job_image'] }});">
    <div class="container">
        <div class="dez-bnr-inr-entry">
            <h1 class="text-white">{{ App::isLocale('en') ? $data['job']['title_en'] : $data['job']['title_ar'] }}</h1>
            <!-- Breadcrumb row -->
            <div class="breadcrumb-row">
                <ul class="list-inline">
                    <li><a href="/">{{ __('messages.home') }}</a></li>
                    <li>{{ App::isLocale('en') ? $data['job']['title_en'] : $data['job']['title_ar'] }}</li>
                </ul>
            </div>
            <!-- Breadcrumb row END -->
        </div>
    </div>
</div>
<!-- inner page banner END -->

<!-- contact area -->
<div class="content-block">
    
    <!-- Job Detail -->
    <div class="section-full content-inner-1">
        <div class="container">
            @if (session('success'))
            <div class="alert alert-success">
                <i class="fe fe-check mr-2"></i> {!! session('success') !!}
            </div>
            @endif
            <div class="row">
                <div class="col-lg-4">
                    <div class="sticky-top">
                        <div class="row">
                            <div class="col-lg-12 col-md-6">
                                <div class="m-b30">
                                    <img src="https://res.cloudinary.com/ddcmwwmwk/image/upload/w_200,h_200/v1581928924/{{ $data['job']['image'] }}" alt="">
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-6">
                                <div class="widget bg-white p-lr20 p-t20  widget_getintuch radius-sm">
                                    <h4 class="text-black font-weight-700 p-t10 m-b15">{{ __('messages.job_details') }}</h4>
                                    <ul>
                                        <li><i class="ti-money"></i><strong class="font-weight-700 text-black">{{ __('messages.salary') }}</strong> {{ $data['job']['salary_from'] }} - {{ $data['job']['salary_to'] }} ريال سعودى </li>
                                        <li><i class="ti-shield"></i><strong class="font-weight-700 text-black">{{ __('messages.years_of_experience') }}</strong>{{ $data['job']['experience_from'] }} - {{ $data['job']['experience_to'] }} سنوات</li>
                                        <li><i class="ti-shield"></i><strong class="font-weight-700 text-black">{{ __('messages.job_type') }}</strong>{{ App::isLocale('en') ? $data['job']->type->title_en : $data['job']->type->title_ar }}</li>
                                        <li><i class="fa fa-user"></i><strong class="font-weight-700 text-black">{{ __('messages.age') }}</strong>{{ !empty($data['job']['age_from']) ? $data['job']['age_from'] . " - " . $data['job']['age_to'] . __('messages.not_required') : __('messages.years_old') }}</li>
                                        <li><i class="fa fa-user"></i><strong class="font-weight-700 text-black">{{ __('messages.gender') }}</strong>
                                        @if($data['job']['gender'] == 1)
                                        {{ __('messages.male_only') }}
                                        @elseif($data['job']['gender'] == 2)
                                        {{ __('messages.female_only') }}
                                        @else
                                        {{ __('messages.not_required') }}
                                        @endif
                                        </li>
                                        <li><i class="ti-shield"></i><strong class="font-weight-700 text-black">{{ __('messages.required_qualification') }}</strong>{{ $data['job']->qualification->title_ar }}</li>
                                        <li><i class="ti-shield"></i><strong class="font-weight-700 text-black">{{ __('messages.english_language') }}</strong>{{ !empty($data['job']['english']) ? $data['job']['english'] : __('messages.not_required') }}</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="job-info-box">
                        <h3 class="m-t0 m-b10 font-weight-700 title-head">
                            <a href="javascript:void(0);" class="text-secondry m-r30">{{ App::isLocale('en') ? $data['job']['title_en'] : $data['job']['title_ar'] }}</a>
                        </h3>
                        <ul class="job-info">
                            <li><strong>{{ __('messages.category') }}</strong> {{ App::isLocale('en') ? $data['job']->category->title_en : $data['job']->category->title_ar }}</li>
                            <li><strong>{{ __('messages.date') }}:</strong> {{ $data['job']['created_at']->format('Y-m-d') }}</li>
                            <li><i class="ti-location-pin text-black m-r5"></i> {{ $data['job']->company->address }} </li>
                        </ul>
                        <p class="p-t20">
                            {!! App::isLocale('en') ? $data['job']['decription_en'] : $data['job']['decription_ar'] !!}
                        </p>
                        
                        @if (!isset(Auth::guard('company')->user()->id))
                            @if(isset(Auth::guard('user')->user()->id))
                            @if(in_array($data['job']['id'], $data['requests'])) 
                            <div class="alert alert-info" role="alert">
                                {{ __('messages.applied_before') }}
                            </div>
                            @elseif(Auth::guard('user')->user()->verified != 1)
                            <div class="alert alert-info" role="alert">
                                {{ __('messages.activate_to_apply') }}
                            </div>
                            @elseif(!$data['exam'])
                            <div class="alert alert-info" role="alert">
                                {{ __('messages.must_pass_exam') }}
                            </div>
                            <a href="/exams/{{ $data['job']['category_id'] }}" class="site-button">{{ __('messages.choose_now') }}</a>
                            @else
                                <form id="applyjob" action="{{ route('jobs.apply') }}" method="POST">
                                    @csrf
                                    <input type="hidden" value="{{ $data['job']['id'] }}" name="job_id" />
                                    <button id="applybutton" type="submit" class="site-button">{{ __('messages.apply_job') }}</button>
                                </form>
                            @endif
                            
                            @else
                            <a href="/register" class="site-button">{{ __('messages.apply_job') }}</a>
                            @endif
                        @endif
                        

                        {{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                            Launch demo modal
                          </button> --}}
                          
                          <style>

                            .modal-backdrop{
                                z-index: 99;
                            }

                          </style>

                          <!-- Modal -->
                          <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  ...
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                  <button type="button" class="btn btn-primary">Save changes</button>
                                </div>
                              </div>
                            </div>
                          </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Job Detail -->
    <!-- Our Jobs -->
    <div class="section-full content-inner">
        <div class="container">
            <div class="row">
                @if(isset($data['jobs_related']) && count($data['jobs_related']) > 0)
                @foreach ($data['jobs_related'] as $related)
                <div class="col-xl-3 col-lg-6 col-md-6">
                    <div class="m-b30 blog-grid">
                        <div class="dez-post-media dez-img-effect "> <a href="/jobs/{{ $related->id }}"><img src="https://res.cloudinary.com/ddcmwwmwk/image/upload/w_700,h_500/v1581928924/{{ $related->image }}" alt=""></a> </div>
                        <div class="dez-info p-a20 border-1">
                            <div class="dez-post-title ">
                                <h5 class="post-title"><a href="/jobs/{{ $related->id }}">{{ App::isLocale('en') ? $related->title_en : $related->title_ar }}</a></h5>
                            </div>
                            <div class="dez-post-meta ">
                                <ul>
                                    <li class="post-date"> <i class="ti-location-pin"></i> {{ $related->company->address }} </li>
                                    <li class="post-author"><i class="ti-user"></i><a href="#">{{ App::isLocale('en') ? $related->company->name_en : $related->company->name_ar }}</a> </li>
                                </ul>
                            </div>
                            <div class="dez-post-text">
                                 <p>{{ App::isLocale('en') ? $related->short_description_en : $related->short_description_ar }}</p>
                            </div>
                           <div class="dez-post-readmore"> 
                                <a href="/jobs/{{ $related->id }}" title="READ MORE" rel="bookmark" class="site-button-link"><span class="fw6">{{ __('messages.Show_more') }}</span></a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                
                @endif
            </div>
        </div>
    </div>
    
    <!-- Our Jobs END -->
</div>

@endsection

