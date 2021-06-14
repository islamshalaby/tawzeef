<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="keywords" content="" />
	<meta name="author" content="" />
	<meta name="robots" content="" />
		<meta name="description" content="JobBoard - HTML Template" />
	<meta property="og:title" content="JobBoard - HTML Template" />
	<meta property="og:description" content="JobBoard - HTML Template" />
	<meta property="og:image" content="JobBoard - HTML Template" />
	<meta name="format-detection" content="telephone=no">
	
	<!-- FAVICONS ICON -->
	<link rel="icon" href="/web/images/favicon.ico" type="image/x-icon" />
	<link rel="shortcut icon" type="image/x-icon" href="/web/images/favicon.png" />
	
	<!-- PAGE TITLE HERE -->
	<title>{{ __('messages.create_account') }}</title>
	
	<!-- MOBILE SPECIFIC -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<!--[if lt IE 9]>
	<script src="/web/js/html5shiv.min.js"></script>
	<script src="/web/js/respond.min.js"></script>
	<![endif]-->
	@if(App::isLocale('ar'))
	<!-- STYLESHEETS -->
	<link rel="stylesheet" type="text/css" href="/web/css/plugins.css">
	<link rel="stylesheet" type="text/css" href="/web/css/style.css">
	<link rel="stylesheet" type="text/css" href="/web/css/templete.css">
	<link rel="stylesheet" type="text/css" href="/web/css/rtl.css">
	<link class="skin" rel="stylesheet" type="text/css" href="/web/css/skin/skin-1.css">
	@else
	<link rel="stylesheet" type="text/css" href="/web/en/css/plugins.css">
	<link rel="stylesheet" type="text/css" href="/web/en/css/style.css">
	<link rel="stylesheet" type="text/css" href="/web/en/css/templete.css">
	<link class="skin" rel="stylesheet" type="text/css" href="/web/en/css/skin/skin-1.css">
	@endif
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/intl-tel-input@17.0.3/build/css/intlTelInput.css">
	

</head>
<body id="bg">
<div class="page-wraper">
<div id="loading-area"></div>
    <!-- Content -->
    <div class="browse-job login-style3">
        <!-- Coming Soon -->
        <div class="bg-img-fix" style="background-image:url(/web/images/slide2.png); height: 100vh;">
            <div class="row">
				<div class="col-xl-4 col-lg-5 col-md-6 col-sm-12 bg-white z-index2 relative p-a0 content-scroll skew-section left-bottom">
					<div class="login-form style-2">
						
						<div class="logo-header text-center p-tb30">
							<a href="/"><img src="https://res.cloudinary.com/ddcmwwmwk/image/upload/v1581928924/{{ $data['setting']['logo'] }}" alt=""/></a>
						</div>
						<div id="show-errors" class="dez-separator-outer col-sm-12 m-b5">
							<a style="display:none" class="site-button back-btn outline gray" data-toggle="tab" href="#registration-form">رجوع</a>
						</div>
						<div class="clearfix"></div>
						<div class="tab-content nav p-b30 tab">
							<div id="login" class="tab-pane active ">
								<form class=" dez-form p-b30" method="POST" action="{{ route('login.company') }}">
                                    @csrf
									<h3 class="form-title m-t0">{{ __('messages.sign_in_company') }}</h3>
									<div class="dez-separator-outer m-b5">
										<div class="dez-separator bg-primary style-liner"></div>
									</div>
									<p>{{ __('messages.enter_email_pass') }}</p>
									<div class="form-group">
										<input name="email" required="" class="form-control" placeholder="{{ __('messages.email') }}" type="text"/>
									</div>
									<div class="form-group">
										<input name="password" required="" class="form-control " placeholder="{{ __('messages.password') }}" type="password"/>
									</div>
									<div class="form-group text-left">
										<button style="margin-bottom: 20px" type="submit" class="site-button dz-xs-flex m-r5">{{ __('messages.sign_in') }}</button>
										<span class="custom-control custom-checkbox">
											<input type="checkbox" class="custom-control-input" id="check1" name="example1">
											<label class="custom-control-label" for="check1">{{ __('messages.remember') }}</label>
										</span>
										<a data-toggle="tab" href="#forgot-password" class="forget-pass m-l5"><i class="fa fa-unlock-alt"></i>{{ __('messages.forget_pass') }}</a>
									</div>
									
									
									 
								</form>
								
								{{--  <div class="text-center bottom"> 
									<a data-toggle="tab" href="#registration-form" class="site-button button-md btn-block text-white">{{ __('messages.create_account') }}</a> 
								</div>  --}}
							</div>
							<div id="forgot-password" class="tab-pane fade">
								<form class="dez-form">
									<h3 class="form-title m-t0">{{ __('messages.forget_pass') }}</h3>
									<div class="dez-separator-outer m-b5">
										<div class="dez-separator bg-primary style-liner"></div>
									</div>
									<p>{{ __('messages.enter_email_to_restore_pass') }} </p>
									<div class="form-group">
										<input name="dzName" required="" class="form-control" placeholder="{{ __('messages.email') }}" type="text"/>
									</div>
									<div class="form-group clearfix text-left"> 
										<a class="site-button outline gray" data-toggle="tab" href="#login">{{ __('messages.back') }}</a>
										<button class="site-button pull-right">{{ __('messages.sign_up') }}</button>
									</div>
								</form>
							</div>
							<div id="verify-phone" class="tab-pane fade">
								<form id="verify-phone-form" method="POST" action="{{ route('verify.phone.user') }}" class="dez-form">
									<h3 class="form-title m-t0">{{ __('messages.verify_phone') }}</h3>
									<h5><span class="countdownSpan">40</span></h5>
									
									{{-- <a type="button" class="resendCode" style="display: none" href="#">إعادة إرسال كود التفعيل</a>  --}}
									<div class="dez-separator-outer m-b5">
										<div class="dez-separator bg-primary style-liner"></div>
									</div>
									
									<p>{{ __('messages.enter_code') }} </p>
									{{ csrf_field() }}
                    				<input type="hidden" name="_method" value="PUT">
									<input id="userId" type="hidden" name="user_id" />
									<input id="verifiedInput" type="hidden" name="verified" />
									<div class="form-group">
										<input id="verify-code" required="" class="form-control" placeholder="{{ __('messages.verfication_code') }}" type="text"/>
									</div>
									<div class="form-group clearfix text-left"> 
										<a class="site-button outline gray" data-toggle="tab" href="#login">{{ __('messages.back') }}</a>
										<button type="button" onclick="codeVerify()" class="site-button pull-right">{{ __('messages.verify_phone') }}</button>
									</div>
								</form>
							</div>
							<div id="registration-form" class="tab-pane fade">
								<form id="main-form" class="dez-fom " method="POST" action="">
                                    @csrf
									<h3 class="form-title m-t0">{{ __('messages.create_account') }}</h3>
									
									{{-- <p>Enter your personal details below: </p> --}}
									<div class="form-group">
                                        <input name="name" required="" class="form-control" placeholder="{{ __('messages.name') }}" type="text"/>
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
									</div>
									<div style="direction: ltr;" class="form-group">
                                        <input id="phoneNumber" name="phone" required="" class="form-control" placeholder="{{ __('messages.phone_number') }}" type="text"/>
										{{--  <p id="output">Please enter a valid number below</p>  --}}
										<span style="display: none" id="valid-msg" class="hide">✓ Valid</span>
										<span style="display: none" id="error-msg" class="hide">Invalid number</span>
										@error('phone')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
									</div>
									<div class="form-group">
                                        <input name="email" required="" class="form-control" placeholder="{{ __('messages.email') }}" type="email"/>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
									</div>
									
									<div class="form-group">
                                        <input name="password" required="" class="form-control" placeholder="{{ __('messages.password') }}" type="password"/>
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
									</div>
									{{-- <div class="form-group">
										<input name="password_confirmation" required="" class="form-control" placeholder="أعد كتابة كلمة المرور" type="password"/>
                                    </div> --}}
                                    <div class="form-group">
                                        <label>{{ __('messages.field') }}</label>
                                        <select required name="category_id">
                                            <option disabled selected>{{ __('messages.select') }}</option>
                                            @if(isset($data['categories']) && count($data['categories']) > 0)
                                            @foreach ($data['categories'] as $category)
                                            <option value="{{ $category->id }}">{{ App::isLocal('en') ? $category->title_en : $category->title_ar }}</option>
                                            @endforeach
                                            @endif
                                        </select>
									</div>
									<div id="recaptcha" data-callback="recaptchaCallback"></div>
									<div class="m-b30">
										{{-- <span class="custom-control custom-checkbox float-left m-r5">
											<input type="checkbox" class="custom-control-input" id="check2" name="example1">
											<label class="custom-control-label" for="check2">I agree to the</label>
										</span> --}}
										{{-- <label><a href="#">Terms of Service </a>& <a href="#">Privacy Policy</a></label> --}}
									</div>
									<div class="form-group clearfix text-left">
										<a style="float:left" class="site-button outline gray pull-left" data-toggle="tab" href="#login">{{ __('messages.back') }}</a>
										<a id="register-submit" type="button" href="#verify-phone" data-toggle="tab" class="site-button pull-right">{{ __('messages.sign_up') }}</a>
										<a id="verify-link" style="display:none" href="#registration-form" data-toggle="tab"></a>
									</div>
								</form>
							</div>
						</div>
					{{-- <div class="bottom-footer clearfix m-t10 m-b20 row text-center">
						<div class="col-lg-12 text-center">
							<span>  Copyright 2020  by <i class="fa fa-heart m-lr5 text-red heart"></i>
							<a href="javascript:void(0);">Usmart </a> </span> 
						</div>
					</div>	 --}}
					</div>
				</div>
			</div>
		</div>
        <!-- Full Blog Page Contant -->
    </div>
    <!-- Content END-->
</div>
<!-- JAVASCRIPT FILES ========================================= -->
<script src="/web/js/jquery.min.js"></script><!-- JQUERY.MIN JS -->
<script src="/web/plugins/bootstrap/js/popper.min.js"></script><!-- BOOTSTRAP.MIN JS -->
<script src="/web/plugins/bootstrap/js/bootstrap.min.js"></script><!-- BOOTSTRAP.MIN JS -->
<script src="/web/plugins/bootstrap-select/bootstrap-select.min.js"></script><!-- FORM JS -->
<script src="/web/plugins/bootstrap-touchspin/jquery.bootstrap-touchspin.js"></script><!-- FORM JS -->
<script src="/web/plugins/magnific-popup/magnific-popup.js"></script><!-- MAGNIFIC POPUP JS -->
<script src="/web/plugins/counter/waypoints-min.js"></script><!-- WAYPOINTS JS -->
<script src="/web/plugins/counter/counterup.min.js"></script><!-- COUNTERUP JS -->
<script src="/web/plugins/imagesloaded/imagesloaded.js"></script><!-- IMAGESLOADED -->
<script src="/web/plugins/masonry/masonry-3.1.4.js"></script><!-- MASONRY -->
<script src="/web/plugins/masonry/masonry.filter.js"></script><!-- MASONRY -->
<script src="/web/plugins/owl-carousel/owl.carousel.js"></script><!-- OWL SLIDER -->
<script src="/web/js/custom.js"></script><!-- CUSTOM FUCTIONS  -->
<script src="/web/js/dz.carousel.js"></script><!-- SORTCODE FUCTIONS  -->
<script src="/web/js/dz.ajax.js"></script><!-- CONTACT JS  -->
<script src="/web/plugins/scroll/scrollbar.min.js"></script><!-- PARTICLES  -->
<script >
jQuery(document).ready(function(){
	jQuery('.winHeight').css('height', $(window).height());
 });
</script>
<script src="https://cdn.jsdelivr.net/npm/intl-tel-input@17.0.3/build/js/intlTelInput.js"></script>

<script>
    var telInput = document.querySelector("#phoneNumber"),
    errorMsg = $("#error-msg"),
	validMsg = $("#valid-msg");
	  
	  {{--  window.intlTelInput(telInput, {
		hiddenInput: "full_phone",
		utilsScript: "https://cdn.jsdelivr.net/npm/intl-tel-input@17.0.3/build/js/utils.js?1603274336113" // just for formatting/placeholders etc
	  });  --}}
	  var iti = window.intlTelInput(telInput, {
		initialCountry: "auto",
		nationalMode: true,
		geoIpLookup: function(callback) {
		  $.get('https://ipinfo.io', function() {}, "jsonp").always(function(resp) {
			var countryCode = (resp && resp.country) ? resp.country : "us";
			callback(countryCode);
		  });
		},
		utilsScript: "https://cdn.jsdelivr.net/npm/intl-tel-input@17.0.3/build/js/utils.js?1603274336113" // just for formatting/placeholders etc
	  });
	  
	  var output = document.querySelector("#output")
	  var handleChange = function() {
		var text = (iti.isValidNumber()) ? "International: " + iti.getNumber() : "Please enter a number below";
		var textNode = document.createTextNode(text);
		
		$("#phoneNumber").attr("value", iti.getNumber())
		$("#phoneNumber").val(iti.getNumber())
		
	  };
	  
	  // listen to "keyup", but also "change" to update when the user selects a country
	  telInput.addEventListener('change', handleChange);
	  telInput.addEventListener('keyup', handleChange);
    // initialise plugin
    {{--  telInput.intlTelInput({
        initialCountry: "auto",
        geoIpLookup: function(callback) {
        $.get('https://ipinfo.io', function() {}, "jsonp").always(function(resp) {
        var countryCode = (resp && resp.country) ? resp.country : "";
        callback(countryCode);
        });
    },
    utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.min.js"
    });

    var reset = function() {
    telInput.removeClass("error");
    errorMsg.addClass("hide");
    validMsg.addClass("hide");
    };

    // on blur: validate
    telInput.blur(function() {
    reset();
    if ($.trim(telInput.val())) {
        if (telInput.intlTelInput("isValidNumber")) {
        validMsg.removeClass("hide");
        } else {
        telInput.addClass("error");
        errorMsg.removeClass("hide");
        }
    }
    });

    // on keyup / change flag: reset
    telInput.on("keyup change", reset);  --}}
</script>
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
{{-- var facebookProvider = new firebase.auth.FacebookAuthProvider();
var googleProvider = new firebase.auth.GoogleAuthProvider();
var facebookCallbackLink = '/login/facebook/callback';
var googleCallbackLink = '/login/google/callback';
async function socialSignin(provider) {
   var socialProvider = null;
   if (provider == "facebook") {
	  socialProvider = facebookProvider;
	  console.log(facebookCallbackLink)
	  $("#social-login-form").attr('action', facebookCallbackLink)
	  
   } else if (provider == "google") {
      socialProvider = googleProvider;
	  
	  $("#social-login-form").attr('action', googleCallbackLink)
   } else {
      return;
   }
firebase.auth().signInWithPopup(socialProvider).then(function(result) {
      result.user.getIdToken().then(function(result) {
		 document.getElementById('social-login-tokenId').value = result;
		 console.log('OSOOSOSSO')
		 console.log($('form#social-login-form').attr('action'))
         $('#social-login-form').submit();
      });
   }).catch(function(error) {
	   console.log(error)
      // do error handling
      console.log(error);
   });
}
</script> --}}
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
		$(this).hide()
		phoneAuth()
	  })

	$("#register-submit").on("click", function() {
		var xhr = $.ajax({
			type: 'post',
			url: "{{ route('register.user') }}",
			data: $('form#main-form').serialize(),
			success: function (data) {
				if (data.success == 1) {
					phoneAuth()
					$("#userId").attr("value", data.id)
					
					// Schedule the update to happen once every second
					setInterval(doUpdate, 1000);
				}else {
					$('#verify-link').click()
					console.log(data.errors)
					
					if (data.errors.email) {
						$("#show-errors").prepend(`
						<div class="alert alert-danger" role="alert">
							${data.errors.email}
						</div>
						`)
					}

					if (data.errors.phone) {
						$("#show-errors").prepend(`
						<div class="alert alert-danger" role="alert">
							${data.errors.phone}
						</div>
						`)
					}

					if (data.errors.password) {
						$("#show-errors").prepend(`
						<div class="alert alert-danger" role="alert">
							${data.errors.password}
						</div>
						`)
					}

					if (data.errors.category_id) {
						$("#show-errors").prepend(`
						<div class="alert alert-danger" role="alert">
							${data.errors.category_id}
						</div>
						`)
					}
					
					if (!data.errors.category_id && !data.errors.password && !data.errors.phone && !data.errors.email) {
						$("#show-errors").prepend(`
						<div class="alert alert-danger" role="alert">
							Recaptcha is required
						</div>
						`)
					}

					$(".back-btn").show()
					$(".back-btn").on('click', function () {
						$("#show-errors .alert").hide()
						$(this).hide()
					})
				}
				
			}
		});
		
	})
	function phoneAuth() {
		var phone = $("#phoneNumber").attr("value")
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
</body>
</html>