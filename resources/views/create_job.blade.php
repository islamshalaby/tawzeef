@extends('app')

@section('title' , __('messages.create_new_job'))

@section('content')
<div class="content-block">
    <!-- Browse Jobs -->
    <div class="section-full bg-white browse-job p-t50 p-b20">
        <div class="container">
            <div class="row">
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
                            <form action="" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="job-bx-title clearfix">
                                    <h5 class="font-weight-700 pull-left text-uppercase">{{ __('messages.create_new_job') }}</h5>
                                    <a href="{{ route('post.company.jobs') }}" class="site-button right-arrow button-sm float-right">{{ __('messages.back') }}</a>
                                </div>
                        
                                <div class="row m-b30">
                                    <div class="col-lg-6 col-md-6"></div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <label>{{ __('messages.image') }}:</label>
                                            <input type="file" name="image" class="form-control" placeholder="{{ __('messages.title_en') }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <label>{{ __('messages.title_en') }}:</label>
                                            <input type="text" name="title_en" value="" class="form-control" placeholder="{{ __('messages.title_en') }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <label>{{ __('messages.title_ar') }}:</label>
                                            <input type="text" name="title_ar" value="" class="form-control" placeholder="{{ __('messages.title_ar') }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <label>{{ __('messages.experience_from') }}:</label>
                                            <input type="text" name="experience_from" value="" class="form-control" placeholder="{{ __('messages.experience_from') }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <label>{{ __('messages.experience_to') }}:</label>
                                            <input type="text" name="experience_to" value="" class="form-control" placeholder="{{ __('messages.experience_to') }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <label>{{ __('messages.age_from') }}:</label>
                                            <input type="text" name="age_from" value="" class="form-control" placeholder="{{ __('messages.age_from') }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <label>{{ __('messages.age_to') }}:</label>
                                            <input type="text" name="age_to" value="" class="form-control" placeholder="{{ __('messages.age_to') }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <label>{{ __('messages.salary_from') }}:</label>
                                            <input type="text" name="salary_from" value="" class="form-control" placeholder="{{ __('messages.salary_from') }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <label>{{ __('messages.salary_to') }}:</label>
                                            <input type="text" name="salary_to" value="" class="form-control" placeholder="{{ __('messages.salary_to') }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <label>{{ __('messages.gender') }}:</label>
                                            <select name="gender" class="bs-select-hidden">
                                                <option selected disabled >{{ __('messages.select') }}</option>
                                                <option value="1" >{{ __('messages.male') }}</option>
                                                <option value="2" >{{ __('messages.female') }}</option>
                                                <option value="3" >{{ __('messages.booth') }}</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <label>{{ __('messages.english') }}:</label>
                                            <input type="text" name="english" value="" class="form-control" placeholder="{{ __('messages.english') }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <label>{{ __('messages.description_en') }}:</label>
                                            <textarea  id="editor-ck-en" name="decription_en" class="form-control" placeholder="{{ __('messages.description_en') }}"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <label>{{ __('messages.description_ar') }}:</label>
                                            <textarea id="editor-ck-ar" name="decription_ar" class="form-control" placeholder="{{ __('messages.description_ar') }}"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <label>{{ __('messages.short_description_en') }}:</label>
                                            <textarea name="short_description_en" class="form-control" placeholder="{{ __('messages.short_description_en') }}"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <label>{{ __('messages.short_description_ar') }}:</label>
                                            <textarea name="short_description_ar" class="form-control" placeholder="{{ __('messages.short_description_ar') }}"></textarea>
                                        </div>
                                    </div>
                                    
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <label>{{ __('messages.category') }}:</label>
                                            <select name="category_id" class="bs-select-hidden">
                                                <option disabled value="">{{ __('messages.select') }}</option>
                                                @foreach ($data['cats'] as $cat)
                                                <option value="{{ $cat->id }}">{{ App::isLocale('en') ? $cat->title_en : $cat->title_ar }}</option>
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
                                                    <option value="{{ $job_type->id }}">{{ $job_type->title_ar }}</option>
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
                                                    <option value="{{ $qualification->id }}">{{ $qualification->title_ar }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    
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