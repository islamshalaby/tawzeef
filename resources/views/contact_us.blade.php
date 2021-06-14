@extends('app')

@section('title' , __('messages.contact_us'))

@section('content')
<div class="page-content bg-white">
    <!-- inner page banner -->
    <div class="dez-bnr-inr overlay-black-middle" style="background-image:url(https://res.cloudinary.com/ddcmwwmwk/image/upload/w_1920,h_766/v1581928924/{{ $data['setting']['contact_image'] }});">
        <div class="container">
            <div class="dez-bnr-inr-entry">
                <h1 class="text-white">{{ __('messages.contact_us') }}</h1>
                <!-- Breadcrumb row -->
                <div class="breadcrumb-row">
                    <ul class="list-inline">
                        <li><a href="/">{{ __('messages.home') }}</a></li>
                        <li>{{ __('messages.contact_us') }}</li>
                    </ul>
                </div>
                <!-- Breadcrumb row END -->
            </div>
        </div>
    </div>
    
    <!-- inner page banner END -->
    <!-- contact area -->
    <div class="section-full content-inner bg-white contact-style-1">
        <div class="container">
            <div class="row">
                <!-- right part start -->
                <div class="col-lg-4 col-md-6 d-lg-flex d-md-flex">
                    <div class="p-a30 border m-b30 contact-area border-1 align-self-stretch radius-sm">
                        <h4 class="m-b10">{{ __('messages.contact_us') }}</h4>
                        {{-- <p>إذا كان لديك أستفسار </p> --}}
                        <ul class="no-margin">
                            <li class="icon-bx-wraper left m-b30">
                                <div class="icon-bx-xs border-1"> <a href="#" class="icon-cell"><i class="ti-location-pin"></i></a> </div>
                                <div class="icon-content">
                                    <h6 class="text-uppercase m-tb0 dez-tilte">{{ __('messages.address') }}:</h6>
                                    <p>{{ App::isLocale('en') ? $data['setting']['address_en'] : $data['setting']['address_ar'] }}</p>
                                </div>
                            </li>
                            <li class="icon-bx-wraper left  m-b30">
                                <div class="icon-bx-xs border-1"> <a href="#" class="icon-cell"><i class="ti-email"></i></a> </div>
                                <div class="icon-content">
                                    <h6 class="text-uppercase m-tb0 dez-tilte">{{ __('messages.email') }}:</h6>
                                    <p>{{ $data['setting']['email'] }}</p>
                                </div>
                            </li>
                            <li class="icon-bx-wraper left">
                                <div class="icon-bx-xs border-1"> <a href="#" class="icon-cell"><i class="ti-mobile"></i></a> </div>
                                <div class="icon-content">
                                    <h6 class="text-uppercase m-tb0 dez-tilte">{{ __('messages.phone_number') }}</h6>
                                    <p>{{ $data['setting']['phone'] }}</p>
                                </div>
                            </li>
                        </ul>
                        <div class="m-t20">
                            <ul class="dez-social-icon dez-social-icon-lg">
                                <li><a href="{{ !empty($data['setting']['facebook']) ? $data['setting']['facebook'] : '#' }}" class="fa fa-facebook bg-primary"></a></li>
                                <li><a href="{{ !empty($data['setting']['twitter']) ? $data['setting']['twitter'] : '#' }}" class="fa fa-twitter bg-primary"></a></li>
                                <li><a href="{{ !empty($data['setting']['instegram']) ? $data['setting']['instegram'] : '#' }}" class="fa fa-instagram bg-primary"></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- right part END -->
                <!-- Left part start -->
                <div class="col-lg-4 col-md-6">
                    <div class="p-a30 m-b30 radius-sm bg-gray clearfix">
                        <h4>{{ __('messages.send_to_us') }}</h4>
                        <div class="dzFormMsg"></div>
                        <form method="post" class="dzForm">
                        @csrf
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input name="name" type="text" class="form-control" placeholder="{{ __('messages.name') }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <div class="input-group"> 
                                            <input name="phone" type="text" class="form-control" required  placeholder="{{ __('messages.phone_number') }}" >
                                        </div>
                                    </div>
                                </div>
                                 <div class="col-lg-12">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <textarea name="message" rows="4" class="form-control" required placeholder="{{ __('messages.message') }}"></textarea>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-lg-12">
                                    <button name="submit" type="submit" value="Submit" class="site-button "> <span>{{ __('messages.send') }}</span> </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- Left part END -->
                <div class="col-lg-4 col-md-12 d-lg-flex m-b30">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d6907.566787478246!2d{{ $data['setting']['longitude'] }}!3d{{ $data['setting']['latitude'] }}!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sar!2seg!4v1608813513699!5m2!1sar!2seg" class="align-self-stretch radius-sm" style="border:0; width:100%; min-height:350px;" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>
    <!-- contact area  END -->
</div>
@endsection