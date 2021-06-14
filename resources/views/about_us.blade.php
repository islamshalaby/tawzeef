@extends('app')

@section('title' , __('messages.about_us'))

@section('content')
<div class="content-block">
    <!-- Browse Jobs -->
    <div class="section-full content-inner jobs-category-bx">
        <div class="container">
            <div class="row">
                {!! App::isLocale('en') ? $data['setting']['aboutapp_en'] : $data['setting']['aboutapp_ar'] !!}
            </div>
        </div>
    </div>
    <!-- Browse Jobs END -->
</div>
@endsection