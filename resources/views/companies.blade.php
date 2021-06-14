@extends('app')

@section('title' , 'الشركات')

@section('content')
<!-- inner page banner -->
        <div class="dez-bnr-inr overlay-black-middle" style="background-image:url(https://res.cloudinary.com/ddcmwwmwk/image/upload/w_1920,h_766/v1581928924/{{ $data['setting']['companies_image'] }});">
            <div class="container">
                <div class="dez-bnr-inr-entry">
                    <h1 class="text-white">الشركات</h1>
					<!-- Breadcrumb row -->
					<div class="breadcrumb-row">
						<ul class="list-inline">
							<li><a href="#">الرئيسية</a></li>
							<li>الشركات</li>
						</ul>
					</div>
					<!-- Breadcrumb row END -->
                </div>
            </div>
        </div>
        <!-- inner page banner END -->
        <!-- contact area -->
        <div class="content-block">
			<!-- Find Job -->
			<div class="section-full bg-white content-inner">
				<div class="container">
					<div class="site-filters clearfix center  m-b40">
						<ul class="filters" data-toggle="buttons">
							<li data-filter="" class="btn active">
								<input type="radio">
								<a href="#" class="site-button-secondry radius-sm"><span>الكل</span></a> 
                            </li>
                            @if(isset($data['categories']) && count($data['categories']) > 0)
                            @foreach ($data['categories'] as $category)
							<li data-filter="cat{{ $category->id }}" class="btn">
								<input type="radio">
								<a href="#" class="site-button-secondry radius-sm"><span>{{ $category->title_ar }}</span></a> 
                            </li>
                            @endforeach
                            @endif
						</ul>
					</div>
					<ul id="masonry" class="dez-gallery-listing gallery-grid-4 gallery mfp-gallery">
                        @if(isset($data['companies']) && count($data['companies']))
                        @foreach ($data['companies'] as $company)
                        <li class="cat{{ $company->category_id }} card-container col-lg-3 col-md-4 col-sm-4">
							<div class="dez-gallery-box">
								<div class="dez-media overlay-black-light">
									<a href="/jobs?company_id={{ $company->id }}"> <img src="https://res.cloudinary.com/ddcmwwmwk/image/upload/w_480,h_430/v1581928924/{{ $company->image }}"  alt=""> 
									<div class="overlay-icon overlay-logo">
										<img src="https://res.cloudinary.com/ddcmwwmwk/image/upload/w_80,h_37/v1581928924/{{ $company->image }}" alt="">
									</div>
									</a>
								</div>
							</div>
                        </li>
                        @endforeach
                        @endif
					</ul>
				</div>
			</div>
            <!-- Find Job END -->
		</div>
@endsection