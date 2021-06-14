@extends('app')

@section('title' , __('messages.edit_job'))

@section('content')
<div class="content-block">
    <!-- Browse Jobs -->
    <div class="section-full bg-white browse-job p-t50 p-b20">
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
                                            <h4 class="m-b5"><a href="javascript:void(0);">{{ App::isLocale('en') ? $data['user']['name_en'] : $data['user']['name_ar'] }}</a></h4>
                                            {{-- <p class="m-b0"><a href="javascript:void(0);">Web developer</a></p> --}}
                                        </div>
                                    </div>
                                </div>
                                @include('profile_nav')
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-9 col-lg-8 m-b30">
                        <div class="job-bx job-profile">
                            <form action="{{ route('post.edit.jobs', $data['job']['id']) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="job-bx-title clearfix">
                                    <h5 class="font-weight-700 pull-left text-uppercase">{{ __('messages.edit_job') }}</h5>
                                    <a href="{{ route('post.company.jobs') }}" class="site-button right-arrow button-sm float-right">{{ __('messages.back') }}</a>
                                </div>
                        
                                <div class="row m-b30">
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <label for="">{{ __('messages.current_image') }}</label><br>
                                            <img src="https://res.cloudinary.com/ddcmwwmwk/image/upload/w_100,q_100/v1581928924/{{ $data['job']['image'] }}"  />
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <label>{{ __('messages.image') }}:</label>
                                            <input type="file" name="image" class="form-control" placeholder="{{ __('messages.title_en') }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <label>{{ __('messages.title_en') }}:</label>
                                            <input type="text" name="title_en" value="{{ $data['job']['title_en'] }}" class="form-control" placeholder="{{ __('messages.title_en') }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <label>{{ __('messages.title_ar') }}:</label>
                                            <input type="text" name="title_ar" value="{{ $data['job']['title_ar'] }}" class="form-control" placeholder="{{ __('messages.title_ar') }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <label>{{ __('messages.experience_from') }}:</label>
                                            <input type="text" name="experience_from" value="{{ $data['job']['experience_from'] }}" class="form-control" placeholder="{{ __('messages.experience_from') }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <label>{{ __('messages.experience_to') }}:</label>
                                            <input type="text" name="experience_to" value="{{ $data['job']['experience_to'] }}" class="form-control" placeholder="{{ __('messages.experience_to') }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <label>{{ __('messages.age_from') }}:</label>
                                            <input type="text" name="age_from" value="{{ $data['job']['age_from'] }}" class="form-control" placeholder="{{ __('messages.age_from') }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <label>{{ __('messages.age_to') }}:</label>
                                            <input type="text" name="age_to" value="{{ $data['job']['age_to'] }}" class="form-control" placeholder="{{ __('messages.age_to') }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <label>{{ __('messages.salary_from') }}:</label>
                                            <input type="text" name="salary_from" value="{{ $data['job']['salary_from'] }}" class="form-control" placeholder="{{ __('messages.salary_from') }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <label>{{ __('messages.salary_to') }}:</label>
                                            <input type="text" name="salary_to" value="{{ $data['job']['salary_to'] }}" class="form-control" placeholder="{{ __('messages.salary_to') }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <label>{{ __('messages.gender') }}:</label>
                                            <select name="gender" class="bs-select-hidden">
                                                <option selected disabled >{{ __('messages.select') }}</option>
                                                <option {{ ($data['job']['gender'] == 1) ? "selected" : "" }} value="1" >{{ __('messages.male') }}</option>
                                                <option {{ ($data['job']['gender'] == 2) ? "selected" : "" }} value="2" >{{ __('messages.female') }}</option>
                                                <option {{ ($data['job']['gender'] == 3) ? "selected" : "" }} value="3" >{{ __('messages.booth') }}</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <label>{{ __('messages.english') }}:</label>
                                            <input type="text" name="english" value="{{ $data['job']['english'] }}" class="form-control" placeholder="{{ __('messages.english') }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <label>{{ __('messages.description_en') }}:</label>
                                            <textarea  id="editor-ck-en" name="decription_en" class="form-control" placeholder="{{ __('messages.description_en') }}">{{ $data['job']['decription_en'] }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <label>{{ __('messages.description_ar') }}:</label>
                                            <textarea id="editor-ck-ar" name="decription_ar" class="form-control" placeholder="{{ __('messages.description_ar') }}">{{ $data['job']['decription_ar'] }}</textarea>
                                        </div>
                                    </div>
                                    
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <label>{{ __('messages.category') }}:</label>
                                            <select name="category_id" class="bs-select-hidden">
                                                <option disabled value="">{{ __('messages.select') }}</option>
                                                @foreach ($data['cats'] as $cat)
                                                <option {{ $data['user']['category_id'] == $cat->id ? 'selected' : '' }} value="{{ $cat->id }}">{{ App::isLocale('en') ? $cat->title_en : $cat->title_ar }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <label>{{ __('messages.job_type') }}:</label>
                                            <select name="job_type" class="bs-select-hidden">
                                                <option disabled value="">{{ __('messages.select') }}</option>
                                                @foreach ($data['job_types'] as $job_type)
                                                    <option {{ ($job_type->id == $data['job']['job_type']) ? "selected" : "" }} value="{{ $job_type->id }}">{{ $job_type->title_ar }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <label>{{ __('messages.qualification') }}:</label>
                                            <select name="qualification_id" class="bs-select-hidden">
                                                <option disabled value="">{{ __('messages.select') }}</option>
                                                @foreach ($data['qualifications'] as $qualification)
                                                    <option {{ ($qualification->id == $data['job']['qualification_id']) ? "selected" : "" }} value="{{ $qualification->id }}">{{ $qualification->title_ar }}</option>
                                                @endforeach
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
                                <button type="submit" class="site-button m-b30">{{ __('messages.update') }}</button>
                            </form>
                        </div>    
                    </div>
                
            </div>
        </div>
    
    </div>
    <!-- Browse Jobs END -->
</div>
@endsection