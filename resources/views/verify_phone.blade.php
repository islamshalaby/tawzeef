@extends('app')

@section('title' , __('messages.verify_phone'))

@section('content')
<div class="content-block">
    <!-- Browse Jobs -->
    <div class="section-full content-inner jobs-category-bx">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 m-b30">
                    <div class="section-full job-categories content-inner-2">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12" >
                                    <form id="verify-phone-form" method="POST" action="{{ route('verify.phone.user') }}" class="dez-form">
                                        <h3 class="form-title m-t0">{{ __('messages.verify_phone') }}</h3>
                                        <div class="dez-separator-outer m-b5">
                                            <div class="dez-separator bg-primary style-liner"></div>
                                        </div>
                                        {{-- <h5><span class="countdownSpan">40</span></h5> --}}
                                        <div id="recaptcha" data-callback="recaptchaCallback"></div>
                                        <a type="button" class="resendCode" href="#"> {{ __('messages.send_verification_code') }}</a> 
                                        
                                        <div class="dez-separator-outer m-b5">
                                            <div class="dez-separator bg-primary style-liner"></div>
                                        </div>
                                        <div style="display: none" class="verifyInput">
                                            <p>{{ __('messages.enter_code') }} </p>
                                            {{ csrf_field() }}
                                            <input type="hidden" name="_method" value="PUT">
                                            <input id="userId" type="hidden" name="user_id" value="{{ Auth::guard('user')->user()->id }}" />
                                            <input id="verifiedInput" type="hidden" name="verified" />
                                            <div class="form-group">
                                                <input id="verify-code" required="" class="form-control" placeholder="{{ __('messages.verfication_code') }}" type="text"/>
                                            </div>
                                            <div class="form-group clearfix text-left"> 
                                                <a class="site-button outline gray" data-toggle="tab" href="#login">{{ __('messages.back') }}</a>
                                                <button type="button" onclick="codeVerify()" class="site-button pull-right">{{ __('messages.verify_phone') }}</button>
                                            </div>
                                        </div>
                                        
                                    </form>
                                </div>
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
@push('scripts')
<script src="https://www.gstatic.com/firebasejs/7.14.0/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/7.14.0/firebase-auth.js"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
    // Initialize Firebase
    var config = {
       
        apiKey: "AIzaSyAL1YEKRh61iJiafV2XgRSmMMMuSc2O9Nc",
        authDomain: "tawzeef-59b3e.firebaseapp.com",
        projectId: "tawzeef-59b3e",
        storageBucket: "tawzeef-59b3e.appspot.com",
        messagingSenderId: "404680079540",
        appId: "1:404680079540:web:3315beff26aee779ffffe1"
    };
    firebase.initializeApp(config);
</script>
<script>
    window.onload=function() {
        render()
    }
    function render() {
        window.recaptchaverifier=new firebase.auth.RecaptchaVerifier('recaptcha')
        recaptchaverifier.render()
    }

    var doUpdate = function() {
        $('.countdownSpan').each(function() {
            var count = parseInt($(this).html());
            if (count !== 0) {
            $(this).html(count - 1);
            }else {
            clearInterval(doUpdate)
            $(".resendCode").show()
            }
            console.log(count)
            
        });
        };

        $(".resendCode").on("click", function() {
            clearInterval(doUpdate)
            $(".verifyInput").slideDown()
            phoneAuth()
        })

    
    function phoneAuth() {
        var phone = "{{ Auth::guard('user')->user()->phone }}"
        console.log(window.recaptchaverifier)
        console.log(phone)
        firebase.auth().signInWithPhoneNumber(phone, window.recaptchaverifier).then(function (confirmationResult) {
            console.log(confirmationResult)
            window.confirmationResult=confirmationResult
            coderesult=confirmationResult
                console.log(coderesult) 
            
            
        }).catch(function (error) {
            alert(error.message)
        })
    }

    function codeVerify() {
        var code=document.getElementById('verify-code').value
        coderesult.confirm(code).then(function (result) {
            
            var user = result.user
            if (user) {
                $("#verifiedInput").attr("value", 1)
                $("#verify-phone-form").submit()
            }else {
                $("#verifiedInput").attr("value", 0)
            }
            {{--  console.log(user)  --}}
        }).catch(function (error) {
            if (error.message) {
                $("#verifiedInput").attr("value", 0)
            }
            
        })
    }
</script>
@endpush