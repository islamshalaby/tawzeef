@extends('app')

@section('title' , __('messages.terms_conditions'))

@section('content')
<div class="content-block">
    <!-- Browse Jobs -->
    <div class="section-full content-inner jobs-category-bx">
        <div class="container">
            <div class="row">
                {!! App::isLocale('en') ? $data['setting']['termsandconditions_en'] : $data['setting']['termsandconditions_ar'] !!}
            </div>
        </div>
    </div>
    <!-- Browse Jobs END -->
</div>
@endsection