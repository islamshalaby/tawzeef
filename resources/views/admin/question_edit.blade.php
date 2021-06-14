@extends('admin.app')

@section('title' , 'Admin Panel Add New Category')

@section('content')
    <div class="col-lg-12 col-12 layout-spacing">
        <div class="statbox widget box box-shadow">
            <div class="widget-header">
                <div class="row">
                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                        <h4>{{ __('messages.edit_question') }}</h4>
                 </div>
        </div>
        <form action="" method="post" enctype="multipart/form-data" >
            @csrf  
            <input type="hidden" name="category_id" value="{{$data['category_id']}}" >        
            <div class="form-group mb-4">
                <label for="question_en">{{ __('messages.question_en') }}</label>
                <input required type="text" name="question_en" class="form-control" id="question_en" placeholder="{{ __('messages.question_en') }}" value="{{$data['question']['question_en']}}" >
            </div>
            <div class="form-group mb-4">
                <label for="question_ar">{{ __('messages.question_ar') }}</label>
                <input required type="text" name="question_ar" class="form-control" id="question_ar" placeholder="{{ __('messages.question_ar') }}" value="{{$data['question']['question_ar']}}" >
            </div>
            <div class="form-group mb-4">
                <label for="first_answer_en">{{ __('messages.first_answer_en') }}</label>
                <input required type="text" name="first_answer_en" class="form-control" id="first_answer_en" placeholder="{{ __('messages.first_answer_en') }}" value="{{$data['question']['first_answer_en']}}" >
            </div>
            <div class="form-group mb-4">
                <label for="first_answer_ar">{{ __('messages.first_answer_ar') }}</label>
                <input required type="text" name="first_answer_ar" class="form-control" id="first_answer_ar" placeholder="{{ __('messages.first_answer_ar') }}" value="{{$data['question']['first_answer_ar']}}" >
            </div>
            <div class="form-group mb-4">
                <label for="second_answer_en">{{ __('messages.second_answer_en') }}</label>
                <input required type="text" name="second_answer_en" class="form-control" id="second_answer_en" placeholder="{{ __('messages.second_answer_en') }}" value="{{$data['question']['second_answer_en']}}" >
            </div>
            <div class="form-group mb-4">
                <label for="second_answer_ar">{{ __('messages.second_answer_ar') }}</label>
                <input required type="text" name="second_answer_ar" class="form-control" id="second_answer_ar" placeholder="{{ __('messages.second_answer_ar') }}" value="{{$data['question']['second_answer_ar']}}" >
            </div>

            <div class="form-group mb-4">
                <label for="third_answer_en">{{ __('messages.third_answer_en') }}</label>
                <input  type="text" name="third_answer_en" class="form-control" id="third_answer_en" placeholder="{{ __('messages.third_answer_en') }}" value="{{$data['question']['third_answer_en']}}" >
            </div>
            <div class="form-group mb-4">
                <label for="third_answer_ar">{{ __('messages.third_answer_ar') }}</label>
                <input  type="text" name="third_answer_ar" class="form-control" id="third_answer_ar" placeholder="{{ __('messages.third_answer_ar') }}" value="{{$data['question']['third_answer_ar']}}" >
            </div>
            <div class="form-group mb-4">
                <label for="fourth_answer_en">{{ __('messages.fourth_answer_en') }}</label>
                <input  type="text" name="fourth_answer_en" class="form-control" id="fourth_answer_en" placeholder="{{ __('messages.fourth_answer_en') }}" value="{{$data['question']['fourth_answer_en']}}" >
            </div>
            <div class="form-group mb-4">
                <label for="fourth_answer_ar">{{ __('messages.fourth_answer_ar') }}</label>
                <input  type="text" name="fourth_answer_ar" class="form-control" id="fourth_answer_ar" placeholder="{{ __('messages.fourth_answer_ar') }}" value="{{$data['question']['fourth_answer_ar']}}" >
            </div>
            
            {{-- <div class="form-group mb-4">
                <label for="correct_answer">{{ __('messages.correct_answer') }}</label>
                <input  type="text" name="fourth_answer_ar" class="form-control" id="fourth_answer_ar" placeholder="{{ __('messages.fourth_answer_ar') }}" value="" >
            </div> --}}

            <div class="row">
                <div class="col-12">
                    <label> {{ __('messages.correct_answer') }}</label>
                </div>
                
                <div class="col-md-3">
                     <div>
                        <label class="new-control new-checkbox new-checkbox-text checkbox-primary">
                          <input {{($data['question']['true_answer'] == 1 )? "checked" : "" }} name="true_answer" value="1" type="radio" class="new-control-input">
                          <span class="new-control-indicator"></span><span class="new-chk-content">{{ __('messages.first_answer') }}</span>
                        </label>
                    </div>     
                </div>            
                <div class="col-md-3">
                     <div>
                        <label class="new-control new-checkbox new-checkbox-text checkbox-primary">
                          <input {{($data['question']['true_answer'] == 2 )? "checked" : "" }} name="true_answer" value="2" type="radio" class="new-control-input">
                          <span class="new-control-indicator"></span><span class="new-chk-content">{{ __('messages.second_answer') }}</span>
                        </label>
                    </div>     
                </div> 
                <div class="col-md-3">
                     <div>
                        <label class="new-control new-checkbox new-checkbox-text checkbox-primary">
                          <input {{($data['question']['true_answer'] == 3 )? "checked" : "" }} name="true_answer" value="3" type="radio" class="new-control-input">
                          <span class="new-control-indicator"></span><span class="new-chk-content">{{ __('messages.third_answer') }}</span>
                        </label>
                    </div>     
                </div> 

                <div class="col-md-3">
                    <div>
                       <label class="new-control new-checkbox new-checkbox-text checkbox-primary">
                         <input {{($data['question']['true_answer'] == 4 )? "checked" : "" }} name="true_answer" value="4" type="radio" class="new-control-input">
                         <span class="new-control-indicator"></span><span class="new-chk-content">{{ __('messages.fourth_answer') }}</span>
                       </label>
                   </div>     
               </div> 
                
             </div>

            <input type="submit" value="{{ __('messages.submit') }}" class="btn btn-primary">
        </form>
    </div>
@endsection