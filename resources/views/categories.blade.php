@extends('app')

@section('title' , __('messages.categories'))

@section('content')
<div class="content-block">
    <!-- Browse Jobs -->
    <div class="section-full content-inner jobs-category-bx">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 m-b30">
                    <div class="section-full job-categories content-inner-2">
                        <div class="container">
                            
                            <div class="row sp20">
                                @foreach ($data['categories'] as $category)
                                <div class="col-lg-3 col-md-6 col-sm-6">
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
                                </div>
                                @endforeach
                                
                            </div>
                        </div>
                    </div>   
                </div>
                
            </div>
        </div>
    </div>
    <!-- Browse Jobs END -->
</div>
@endsection