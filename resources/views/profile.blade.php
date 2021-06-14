@extends('app')

@section('title' , __('messages.personal_data'))

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
                        <div class="job-bx job-profile">
                            <div class="job-bx-title clearfix">
                                <h5 class="font-weight-700 pull-left text-uppercase">{{ __('messages.personal_data') }}</h5>
                                <a href="/" class="site-button right-arrow button-sm float-right">{{ __('messages.back') }}</a>
                            </div>
                        
                                <div class="row m-b30">
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <label>{{ __('messages.name') }}:</label>
                                            <input type="text" name="name" value="{{ $data['user']['name'] }}" class="form-control" placeholder="{{ __('messages.name') }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <label>{{ __('messages.job_title') }}:</label>
                                            <input type="text" name="job_title" value="{{ $data['user']['job_title'] }}" class="form-control" placeholder="{{ __('messages.job_title') }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <label>{{ __('messages.date_of_birth') }}:</label>
                                            <input type="date" name="birth_date" value="{{ $data['user']['birth_date'] }}"  class="form-control" placeholder="{{ __('messages.date_of_birth') }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <label>{{ __('messages.gender') }}:</label>
                                            <select name="gender" class="bs-select-hidden">
                                                <option {{ $data['user']['gender'] == 1 ? 'selected' : '' }} value="1">{{ __('messages.male') }}</option>
                                                <option {{ $data['user']['gender'] == 2 ? 'selected' : '' }} value="2">{{ __('messages.female') }}</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <label>{{ __('messages.nationality') }}:</label>
                                            <input type="text" name="nationality" value="{{ $data['user']['nationality'] }}" class="form-control" placeholder="{{ __('messages.nationality') }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <label>{{ __('messages.residence_country') }}:</label>
                                            <input type="text" name="residence" value="{{ $data['user']['residence'] }}" class="form-control" placeholder="{{ __('messages.residence_country') }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <label>{{ __('messages.marital_status') }}:</label>
                                            <select name="gender" class="bs-select-hidden">
                                                <option {{ $data['user']['marital_status'] == 1 ? 'selected' : '' }} value="1">{{ __('messages.single') }}</option>
                                                <option {{ $data['user']['marital_status'] == 2 ? 'selected' : '' }} value="2">{{ __('messages.married') }}</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <label>{{ __('messages.expected_salary') }}:</label>
                                            <input type="text" name="salary" value="{{ $data['user']['salary'] }}" class="form-control" placeholder="{{ __('messages.expected_salary') }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <label>{{ __('messages.driveing_license') }}:</label>
                                            <select name="driving_license" class="bs-select-hidden">
                                                <option {{ $data['user']['driving_license'] == 1 ? 'selected' : '' }} value="1">{{ __('messages.valid') }}</option>
                                                <option {{ $data['user']['driving_license'] == 2 ? 'selected' : '' }} value="2">{{ __('messages.not_valid') }}</option>
                                                <option {{ $data['user']['driving_license'] == 3 ? 'selected' : '' }} value="3">{{ __('messages.dont_have_license') }}</option>
                                            </select>
                                        </div>
                                    </div>
                                    {{-- <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                            <label>Description:</label>
                                            <textarea class="form-control">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s.</textarea>
                                        </div>
                                    </div> --}}
                                </div>
                                <div class="job-bx-title clearfix">
                                    <h5 class="font-weight-700 pull-left text-uppercase">{{ __('messages.contact_information') }}</h5>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <label>{{ __('messages.phone_number') }}:</label>
                                            <input type="text" name="phone" value="{{ $data['user']['phone'] }}" class="form-control" placeholder="+1 123 456 7890">
                                            @if (Auth::guard('user')->user()->verified != 1)
                                            <small class="text-muted">{{ __('messages.phone_hasnot_activated') }} <a style="font-weight: bold" href="/activate-phone">{{ __('messages.activate_now') }}</a></small>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <label>{{ __('messages.email') }}:</label>
                                            <input type="email" name="email" value="{{ $data['user']['email'] }}" class="form-control" placeholder="info@example.com">
                                        </div>
                                    </div>
                                    
                                </div>
                                <button type="submit" class="site-button m-b30">{{ __('messages.update') }}</button>
                            
                        </div>    
                    </div>
                
            </div>
        </div>
    </form>
    </div>
    <!-- Browse Jobs END -->
</div>
@endsection