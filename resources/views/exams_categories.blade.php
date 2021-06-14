@extends('app')

@section('title' , __('messages.tests'))

@section('content')
<div class="content-block">
    <!-- Browse Jobs -->
    <div class="section-full bg-white browse-job p-t50 p-b20">
        <form action="{{ route('post.user.profile') }}" method="POST" enctype="multipart/form-data">
        <div class="container">
            <div class="row">
                
                    @csrf
                    <div class="col-xl-3 col-lg-4 m-b30">
                        <div class="sticky-top">
                            <div class="candidate-info">
                                <div class="candidate-detail text-center">
                                    <div class="canditate-des">
                                        <a href="javascript:void(0);">
                                            <img alt="" src="{{ isset($data['user']['image']) ? 'https://res.cloudinary.com/ddcmwwmwk/image/upload/w_500,h_500/v1581928924/' . $data['user']['image'] : '/web/images/team/pic1.jpg' }}">
                                        </a>
                                        <div class="upload-link" title="update" data-toggle="tooltip" data-placement="left">
                                            <input  type="file" name="image" class="update-flie"/>
                                            <i class="fa fa-camera"></i>
                                        </div>
                                    </div>
                                    <div class="candidate-title">
                                        <div class="">
                                            <h4 class="m-b5"><a href="javascript:void(0);">{{ $data['user']['name'] }}</a></h4>
                                            {{-- <p class="m-b0"><a href="javascript:void(0);">Web developer</a></p> --}}
                                        </div>
                                    </div>
                                </div>
                                <ul>
                                    <li><a href="{{ route('user.profile') }}" class="{{ Request::segment(1) == 'profile' ? 'active' : '' }}">
                                        <i class="fa fa-user-o" aria-hidden="true"></i> 
                                        <span>{{ __('messages.personal_data') }}</span></a></li>
                                    <li>
                                        <a href="/profile/resume" class="{{ Request::segment(2) == 'resume' ? 'active' : '' }}">
                                        <i class="fa fa-file-text-o" aria-hidden="true"></i> 
                                        <span>{{ __('messages.resume') }}</span></a></li>
                                    <li><a href="/exams" class="{{ Request::segment(1) == 'exams' ? 'active' : '' }}">
                                        <i class="fa fa-file-text-o" aria-hidden="true"></i> 
                                        <span>{{ __('messages.tests') }}</span></a></li>
                                    <li><a class="{{ Request::segment(1) == 'requests' ? 'active' : '' }}" href="{{ route('user.requests') }}">
                                        <i class="fa fa-briefcase" aria-hidden="true"></i> 
                                        <span>{{ __('messages.jobs_applied') }}</span></a></li>
                                    
                                    <li><a href="{{ route('logout.user') }}">
                                        <i class="fa fa-sign-out" aria-hidden="true"></i> 
                                        <span>{{ __('messages.signout') }}</span></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-9 col-lg-8 m-b30">
                        <div class="job-bx-title clearfix">
                            <h5 class="font-weight-700 pull-left text-uppercase">{{ count($data['categories']) }} {{ __('messages.tests') }}</h5>
                            {{-- <div class="float-right">
                                <span class="select-title">Sort by freshness</span>
                                <select>
                                    <option>Last 2 Months</option>
                                    <option>Last Months</option>
                                    <option>Last Weeks</option>
                                    <option>Last 3 Days</option>
                                </select>
                            </div> --}}
                        </div>
                        <ul class="post-job-bx browse-job">
                            @if(isset($data['categories']))
                            @foreach ($data['categories'] as $category)
                            <li>
                                <div class="post-bx">
                                    <div class="job-post-info m-a0">
                                        <h4><a href="/exams/{{ $category->id }}">{{ App::isLocale('en') ? $category->title_en : $category->title_ar }}</a></h4>
                                        <ul>
                                            <li><a href="/exams/{{ $category->id }}">{{ __('messages.test_for_category') }} : {{ App::isLocale('en') ? $category->title_en : $category->title_ar }}</a></li>
                                            @if ($category->exam(Auth::guard('user')->user()->id))
                                            <li><i class="fa fa-file-text-o"></i>{{ __('messages.test_result') }} : {{ number_format((float)$category->exam(Auth::guard('user')->user()->id)->percentage, 2, '.', '') }} %</li>
                                            @endif
                                            
                                        </ul>
                                        {{-- <div class="job-time m-t15 m-b10">
                                            <a href="javascript:void(0);"><span>PHP</span></a>
                                            <a href="javascript:void(0);"><span>Angular</span></a>
                                            <a href="javascript:void(0);"><span>Bootstrap</span></a>
                                            <a href="javascript:void(0);"><span>Wordpress</span></a>
                                        </div> --}}
                                        <div class="posted-info clearfix">
                                            <p class="m-tb0 text-primary float-left"><span class="text-black m-r10">{{ __('messages.date') }}:</span> {{ $category->exam(Auth::guard('user')->user()->id) ? $category->exam(Auth::guard('user')->user()->id)->created_at->format('d-m-Y') : $category->created_at->format('d-m-Y') }}</p>
                                            {{-- <a href="jobs-my-resume.html" class="site-button button-sm float-right">Apply Job</a> --}}
                                        </div>
                                    </div>
                                </div>
                            </li>
                            @endforeach
                            @endif
                        </ul>
                        
                    </div>
                
            </div>
        </div>
    </form>
    </div>
    <!-- Browse Jobs END -->
</div>
@endsection