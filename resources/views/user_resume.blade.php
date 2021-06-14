@extends('app')

@section('title' , $data['usr']['name'])

@section('content')
<div class="overlay-black-dark profile-edit p-t50 p-b20" style="background-image:url(images/banner/bnr1.jpg);">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-7 candidate-info">
                <div class="candidate-detail">
                    <div class="canditate-des text-center">
                        <a href="javascript:void(0);">
                            <img alt="" src="{{ isset($data['usr']['image']) ? 'https://res.cloudinary.com/ddcmwwmwk/image/upload/w_500,h_500/v1581928924/' . $data['usr']['image'] : '/web/images/team/pic1.jpg' }}">
                        </a>
                        {{-- <div class="upload-link" title="" data-toggle="tooltip" data-placement="right" data-original-title="update">
                            <input type="file" class="update-flie">
                            <i class="fa fa-camera"></i>
                        </div> --}}
                    </div>
                    <div class="text-white browse-job text-left">
                        <h4 class="m-b0">{{ $data['usr']['name'] }}
                            
                        </h4>
                        <p class="m-b15">{{ $data['usr']['job_title'] }}</p>
                        <ul class="clearfix">
                            <li><i class="ti-location-pin"></i> {{ $data['usr']['residence'] }}</li>
                            <li><i class="ti-mobile"></i> {{ $data['usr']['phone'] }}</li>
                            <li><i class="fa fa-user-o"></i> {{ $data['usr']['gender'] ? __('messages.male') : __('messages.female') }}</li>
                            <li><i class="ti-email"></i> {{ $data['usr']['email'] }}</li>
                        </ul>
                        {{-- <div class="progress-box m-t10">
                            <div class="progress-info">Profile Strength (Average)<span>70%</span></div>
                            <div class="progress">
                                <div class="progress-bar bg-primary" style="width: 80%" role="progressbar"></div>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>
<div class="content-block">
    <!-- Browse Jobs -->
    <div class="section-full browse-job content-inner-2">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-4 col-md-4 col-sm-12 m-b30">
                    <div class="sticky-top bg-white">
                        <div class="candidate-info onepage">
                            <ul>
                                <li><a class="scroll-bar nav-link" href="#resume_headline_bx">
                                    <span>{{ __('messages.brief') }}</span></a></li>
                                <li><a class="scroll-bar nav-link" href="#key_skills_bx">
                                    <span>{{ __('messages.skills') }}</span></a></li>
                                <li><a class="scroll-bar nav-link" href="#employment_bx">
                                    <span>{{ __('messages.degrees&courses') }}</span></a></li>
                                <li><a class="scroll-bar nav-link" href="#education_bx">
                                    <span>{{ __('messages.experiences') }}</span></a></li>
                                {{-- <li><a class="scroll-bar nav-link" href="#it_skills_bx">
                                    <span>IT Skills</span></a></li>
                                <li><a class="scroll-bar nav-link" href="#projects_bx">
                                    <span>Projects</span></a></li>
                                <li><a class="scroll-bar nav-link" href="#profile_summary_bx"> 
                                    <span>Profile Summary</span></a></li>
                                <li><a class="scroll-bar nav-link" href="#accomplishments_bx">
                                    <span>Accomplishments</span></a></li>
                                <li><a class="scroll-bar nav-link" href="#desired_career_profile_bx">
                                    <span>Desired Career Profile</span></a></li>
                                <li><a class="scroll-bar nav-link" href="#personal_details_bx">
                                    <span>Personal Details</span></a></li>
                                <li><a class="scroll-bar nav-link" href="#attach_resume_bx">
                                    <span>Attach Resume</span></a></li>											 --}}
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-9 col-lg-8 col-md-8 col-sm-12">
                    <div id="resume_headline_bx" class="job-bx bg-white m-b30">
                        <div class="d-flex">
                            <h5 class="m-b15">{{ __('messages.brief') }}</h5>
                        </div>
                        <p class="m-b0">{{ $data['usr']['summary'] }}</p>
                       
                    </div>
                    <div id="key_skills_bx" class="job-bx bg-white m-b30">
                        <div class="d-flex">
                            <h5 class="m-b15">{{ __('messages.skills') }}</h5>
                            
                        </div>
                        <div class="job-time mr-auto">
                            @if(count($data['skills']) > 0)
                            @foreach ($data['skills'] as $skill)
                            <a href="javascript:void(0);"><span>{{ $skill->title }}</span></a>
                            @endforeach
                            @endif
                        </div>
                        
                    </div>
                    <div id="employment_bx" class="job-bx table-job-bx bg-white m-b30">
                        <div class="d-flex">
                            <h5 class="m-b15">{{ __('messages.degrees&courses') }}</h5>
                            
                        </div>
                        {{-- <p>Mention your employment details including your current and previous company work experience</p> --}}
                        <table>
                            <thead>
                                <tr>
                                    <th>{{ __('messages.course_name') }}</th>
                                    <th>{{ __('messages.period') }}</th>
                                    <th>{{ __('messages.year') }}</th>
                                    <th>{{ __('messages.university_name') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($data['courses']) > 0)
                                @foreach ($data['courses'] as $course)
                                <tr>
                                    <td>{{ $course->name }}</td>
                                    <td>{{ $course->period }}</td>
                                    <td>{{ $course->year }}</td>
                                    <td>{{ $course->center }}</td>
                                    
                                </tr>
                                @endforeach
                                @endif
                            </tbody>
                        </table>
                        
                    </div>
                    <div id="education_bx" class="job-bx bg-white m-b30 ">
                        <div class="d-flex">
                            <h5 class="m-b15">{{ __('messages.experiences') }}</h5>
                        </div>
                        @if (count($data['experiences']) > 0)
                        @foreach ($data['experiences'] as $exp)
                        <h6 class="font-14 m-b0">{{ $exp->job_title }} / <i>{{ $exp->company_name }}</i></h6>
                        {{-- <p class="m-b0"><i></i></p> --}}
                        
                        <p class="m-b0">{{ date('m/Y', strtotime($exp->start_date)) }} - {{ date('m/Y', strtotime($exp->end_date)) }}</p>
                        <p class="m-b0"><b>{{ __('messages.salary') }} :</b> {{ $exp->salary }} {{ __('messages.r_s') }}</p>
                        {{-- <p class="m-b0">Junior Software Developer</p> --}}
                        @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Browse Jobs END -->
</div>
@endsection