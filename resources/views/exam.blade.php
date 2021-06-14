@extends('app')

@section('title' , __('messages.exam') . $data['category']['title_ar'])

@section('content')
<div class="content-block">
    <!-- Browse Jobs -->
    <div class="section-full browse-job content-inner-2">
        <div class="container">
            <div class="job-bx bg-white">
                @if ($data['exam'])
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 text-center">
                            <h3 class="text-center"> {{ __('messages.tested_before') }}</h3>
                            <h4 class="text-primary text-center">{{ $data['exam']['percentage'] }} %</h4>
                            {{-- <a href="index.html" class="site-button">Back To Home</a> --}}
                        </div>
                    </div>
                    
                @else
                <div class="row">
                    <div class="col-lg-8">
                        <form class="job-alert-bx">
                            <div class="row">
                                
                                    @if (isset($data['exams']) && count($data['exams']) > 0)
                                    @php
                                        $i = 1
                                    @endphp
                                    @foreach ($data['exams'] as $exam)
                                    <div class="col-lg-12">
                                        <div style="{{ $i != 1 ? 'display : none' : '' }}" class="form-group">
                                            <label>{{ App::isLocale('en') ?  $exam['question_en'] : $exam['question_ar'] }}</label>
                                            <div class="row">
                                                <div style="margin: 20px 0;" class="custom-control col-lg-6 custom-radio">
                                                    <input data-question="{{ $exam->id }}" type="radio" class="custom-control-input" id="job-alert-check1{{ $exam['id'] }}" name="answer{{ $i }}" value="{{ App::isLocale('en') ? $exam['first_answer_en'] : $exam['first_answer_ar'] }}">
                                                    <label class="custom-control-label" for="job-alert-check1{{ $exam['id'] }}">{{ App::isLocale('en') ?  $exam['first_answer_en'] : $exam['first_answer_ar'] }} </label>
                                                </div>
                                                <div style="margin: 20px 0;" class="custom-control col-lg-6 custom-radio">
                                                    <input data-question="{{ $exam->id }}" type="radio" class="custom-control-input" id="job-alert-check2{{ $exam['id'] }}" name="answer{{ $i }}" value="{{ App::isLocale('en') ? $exam['second_answer_en'] : $exam['second_answer_ar'] }}">
                                                    <label class="custom-control-label" for="job-alert-check2{{ $exam['id'] }}">{{ App::isLocale('en') ? $exam['second_answer_en'] : $exam['second_answer_ar'] }} </label>
                                                </div>
                                                <div style="margin: 20px 0;" class="custom-control col-lg-6 custom-radio">
                                                    <input data-question="{{ $exam->id }}" type="radio" class="custom-control-input" id="job-alert-check3{{ $exam['id'] }}" name="answer{{ $i }}" value="{{ App::isLocale('en') ?  $exam['third_answer_en'] : $exam['third_answer_ar'] }}">
                                                    <label class="custom-control-label" for="job-alert-check3{{ $exam['id'] }}">{{ App::isLocale('en') ? $exam['third_answer_en'] : $exam['third_answer_ar'] }} </label>
                                                </div>
                                                <div style="margin: 20px 0;" class="custom-control col-lg-6 custom-radio">
                                                    <input data-question="{{ $exam->id }}" type="radio" class="custom-control-input" id="job-alert-check4{{ $exam['id'] }}" name="answer{{ $i }}" value="{{ App::isLocale('en') ? $exam['fourth_answer_en'] : $exam['fourth_answer_ar'] }}">
                                                    <label class="custom-control-label" for="job-alert-check4{{ $exam['id'] }}">{{ App::isLocale('en') ?  $exam['fourth_answer_en'] : $exam['fourth_answer_ar'] }} </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 text-center">
                                                <a href="#" class="site-button">{{ __('messages.next') }}</a>
                                            </div>
                                        </div>
                                    </div>
                                    @php
                                    $i ++
                                    @endphp
                                    @endforeach
                                    <div style="display: none" class="col-lg-12 finalResult col-md-12 col-sm-12 text-center">
                                        <h3 class="text-center"> {{ __('messages.you_have_got') }}</h3>
                                        <h4 class="text-primary text-center"></h4>
                                        {{-- <a href="index.html" class="site-button">Back To Home</a> --}}
                                    </div>
                                    {{-- <div class="col-lg-12 text-center">
                                        <button class="site-button">Create Job Alert</button>
                                    </div> --}}
                                    @endif
                                
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-4 bg-gray">
                        <div class="p-a25">
                            <h6>{{ __('messages.exam') }} {{ App::isLocale('en') ?  $data['category']['title_en'] : $data['category']['title_ar'] }}</h6>
                            <ul class="list-check primary">
                                @if (isset($data['exams']) && count($data['exams']) > 0)
                                @for ($i = 0; $i < count($data['exams']); $i ++)
                                <li id="level{{ $data['exams'][$i]['id'] }}">{{ $i + 1 }}/{{ count($data['exams']) }}</li>
                                @endfor
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>	
    </div>
    <!-- Browse Jobs END -->
</div>
@endsection
@push('scripts')
<script>
    window.onbeforeunload = function() {
        return "you can not refresh the page";
    }
    $('a.site-button').on("click", function () {
        console.log($(this).parent('.text-center').prev('.row').find('input:checked'))
        var question = $(this).parent('.text-center').prev('.row').find('input:checked').data('question'),
            data = {
                _token: "{{ csrf_token() }}",
                examId : question,
                answer : $(this).parent('.text-center').prev('.row').find('input:checked').attr('value'),
                category_id : "{{ $data['category']['id'] }}"
            },
            ele = $(this).parent('.text-center').prev('.row').find('input:checked')
        
        $.ajax({
            type: 'post',
            url: "/exam/answer",
            data: data,
            success: function (data) {
                $("#level" + question).addClass('strick')
                ele.parent('.custom-control').parent('.row').parent('.form-group').fadeOut()
                
                ele.parent('.custom-control').parent('.row').parent('.form-group').parent('.col-lg-12').next('.col-lg-12').find('.form-group').delay(400).fadeIn()
                if (data && data.completed == 1) {
                    $(".finalResult").delay(400).fadeIn()
                    $(".finalResult h4").text(`${Math.round((data.percentage + Number.EPSILON) * 100) / 100} %`)
                }
            }
        });
    })
    
</script>
@endpush