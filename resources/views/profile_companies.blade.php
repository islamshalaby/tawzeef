@extends('app')

@section('title' , __('messages.personal_data'))

@section('content')
<div class="content-block">
    <!-- Browse Jobs -->
    <div class="section-full bg-white browse-job p-t50 p-b20">
        <form action="{{ route('post.company.profile') }}" method="POST" enctype="multipart/form-data">
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
                            <div class="job-bx-title clearfix">
                                <h5 class="font-weight-700 pull-left text-uppercase">{{ __('messages.personal_data') }}</h5>
                                <a href="/" class="site-button right-arrow button-sm float-right">{{ __('messages.back') }}</a>
                            </div>
                        
                                <div class="row m-b30">
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <label>{{ __('messages.name_en') }}:</label>
                                            <input type="text" name="name_en" value="{{ $data['user']['name_en'] }}" class="form-control" placeholder="{{ __('messages.name_en') }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <label>{{ __('messages.name_ar') }}:</label>
                                            <input type="text" name="name_ar" value="{{ $data['user']['name_ar'] }}" class="form-control" placeholder="{{ __('messages.name_ar') }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <label>{{ __('messages.description_en') }}:</label>
                                            <textarea name="description_en" class="form-control" placeholder="{{ __('messages.description_en') }}">{{ $data['user']['description_en'] }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <label>{{ __('messages.description_ar') }}:</label>
                                            <textarea name="description_ar" class="form-control" placeholder="{{ __('messages.description_ar') }}">{{ $data['user']['description_ar'] }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <label>{{ __('messages.category') }}:</label>
                                            <select name="category_id" class="bs-select-hidden">
                                                @foreach ($data['cats'] as $cat)
                                                <option {{ $data['user']['category_id'] == $cat->id ? 'selected' : '' }} value="{{ $cat->id }}">{{ App::isLocale('en') ? $cat->title_en : $cat->title_ar }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <label>{{ __('messages.country') }}:</label>
                                            <select name="country_id" class="bs-select-hidden">
                                                @foreach ($data['countries'] as $country)
                                                <option {{ $data['user']['country_id'] == $country->id ? 'selected' : '' }} value="{{ $country->id }}">{{ App::isLocale('en') ? $country->name_en : $country->name_en }}</option>
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
                                <div class="job-bx-title clearfix">
                                    <h5 class="font-weight-700 pull-left text-uppercase">{{ __('messages.contact_information') }}</h5>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <label>{{ __('messages.phone_number') }}:</label>
                                            <input type="text" name="phone" value="{{ $data['user']['phone'] }}" class="form-control" placeholder="+1 123 456 7890">
                                            {{--  @if (Auth::guard('user')->user()->verified != 1)
                                            <small class="text-muted">{{ __('messages.phone_hasnot_activated') }} <a style="font-weight: bold" href="/activate-phone">{{ __('messages.activate_now') }}</a></small>
                                            @endif  --}}
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <label>{{ __('messages.email') }}:</label>
                                            <input type="email" name="email" value="{{ $data['user']['email'] }}" class="form-control" placeholder="info@example.com">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <label>{{ __('messages.address_en') }}:</label>
                                            <input type="text" name="address_en" value="{{ $data['user']['address_en'] }}" class="form-control" placeholder="{{ __('messages.address_en') }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <label>{{ __('messages.address_ar') }}:</label>
                                            <input type="text" name="address_ar" value="{{ $data['user']['address_ar'] }}" class="form-control" placeholder="{{ __('messages.address_ar') }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <label>{{ __('messages.website') }}:</label>
                                            <input type="text" name="website" value="{{ $data['user']['website'] }}" class="form-control" placeholder="{{ __('messages.website') }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <label>{{ __('messages.facebook') }}:</label>
                                            <input type="text" name="facebook" value="{{ $data['user']['facebook'] }}" class="form-control" placeholder="{{ __('messages.facebook') }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <label>{{ __('messages.twitter') }}:</label>
                                            <input type="text" name="twitter" value="{{ $data['user']['twitter'] }}" class="form-control" placeholder="{{ __('messages.twitter') }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <label>{{ __('messages.linkedin') }}:</label>
                                            <input type="text" name="linkedin" value="{{ $data['user']['linkedin'] }}" class="form-control" placeholder="{{ __('messages.linkedin') }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <label>{{ __('messages.youtube') }}:</label>
                                            <input type="text" name="youtube" value="{{ $data['user']['youtube'] }}" class="form-control" placeholder="{{ __('messages.youtube') }}">
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