@extends('app')

@section('title' , __('messages.resume'))

@section('content')
    <div class="page-content">
        <!-- inner page banner -->
        <div class="overlay-black-dark profile-edit p-t50 p-b20" style="background-image:url(images/banner/bnr1.jpg);">
            <div class="container">
                <div class="row">
					<div class="col-lg-8 col-md-7 candidate-info">
						<div class="candidate-detail">
							{{-- <div class="canditate-des text-center">
								<a href="javascript:void(0);">
									<img alt="" src="images/team/pic1.jpg">
								</a>
								<div class="upload-link" title="update" data-toggle="tooltip" data-placement="right">
									<input type="file" class="update-flie">
									<i class="fa fa-camera"></i>
								</div>
							</div> --}}
							<div style="width:70%" class="text-white browse-job text-left">
								<h4 class="m-b0">{{ $data['user']['name'] }}
									{{-- <a class="m-l15 font-16 text-white" data-toggle="modal" data-target="#profilename" href="#"><i class="fa fa-pencil"></i></a> --}}
								</h4>
								<p class="m-b15">{{ $data['user']['job_title'] }}</p>
								<ul class="clearfix">
									{{-- <li><i class="ti-location-pin"></i> Sacramento, California</li> --}}
									<li><i class="ti-mobile"></i> {{ $data['user']['phone'] }}</li>
									{{-- <li><i class="ti-briefcase"></i> Fresher</li> --}}
									<li><i class="ti-email"></i> {{ $data['user']['email'] }}</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
            </div>
			<!-- Modal -->
			<div class="modal fade browse-job modal-bx-info editor" id="profilename" tabindex="-1" role="dialog" aria-labelledby="ProfilenameModalLongTitle" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="ProfilenameModalLongTitle">Basic Details</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<form>
								<div class="row">
									<div class="col-lg-12 col-md-12">
										<div class="form-group">
											<label>Your Name</label>
											<input type="email" class="form-control" placeholder="Enter Your Name">
										</div>
									</div>
									<div class="col-lg-12 col-md-12">
										<div class="form-group">
											<div class="row">
												<div class="col-lg-6 col-md-6 col-sm-6 col-6">
													<div class="custom-control custom-radio">
														<input type="radio" class="custom-control-input" id="fresher" name="example1">
														<label class="custom-control-label" for="fresher">Fresher</label>
													</div>
												</div>
												<div class="col-lg-6 col-md-6 col-sm-6 col-6">
													<div class="custom-control custom-radio">
														<input type="radio" class="custom-control-input" id="experienced" name="example1">
														<label class="custom-control-label" for="experienced">Experienced</label>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="col-lg-6 col-md-6">
										<div class="form-group">
											<label>Select Your Country</label>
											<select>
												<option>India</option>
												<option>Australia</option>
												<option>Bahrain</option>
												<option>China</option>
												<option>Dubai</option>
												<option>France</option>
												<option>Germany</option>
												<option>Hong Kong</option>
												<option>Kuwait</option>
											</select>
										</div>
									</div>
									<div class="col-lg-6 col-md-6">
										<div class="form-group">
											<label>Select Your Country</label>
											<input type="text" class="form-control" placeholder="Select Your Country">
										</div>
									</div>
									<div class="col-lg-12 col-md-12">
										<div class="form-group">
											<label>Select Your City</label>
											<input type="text" class="form-control" placeholder="Select Your City">
										</div>
									</div>
									<div class="col-lg-12 col-md-12">
										<div class="form-group">
											<label>Telephone Number</label>
											<div class="row">
												<div class="col-lg-4 col-md-4 col-sm-4 col-4">
													<input type="text" class="form-control" placeholder="Country Code">
												</div>
												<div class="col-lg-4 col-md-4 col-sm-4 col-4">
													<input type="text" class="form-control" placeholder="Area Code">
												</div>
												<div class="col-lg-4 col-md-4 col-sm-4 col-4">
													<input type="text" class="form-control" placeholder="Phone Number">
												</div>
											</div>
										</div>
									</div>
									<div class="col-lg-12 col-md-12">
										<div class="form-group">
											<label>Email Address</label>
											<h6 class="m-a0 font-14">info@example.com</h6>
											<a href="#">Change Email Address</a>
										</div>		
									</div>		
								</div>
							</form>
						</div>
						<div class="modal-footer">
							<button type="button" class="site-button" data-dismiss="modal">Cancel</button>
							<button type="button" class="site-button">Save</button>
						</div>
					</div>
				</div>
			</div>
			<!-- Modal End -->
        </div>
        <!-- inner page banner END -->
		<!-- contact area -->
        <div class="content-block">
			<!-- Browse Jobs -->
			<div class="section-full browse-job content-inner-2">
				<div class="container">
					<div class="row">
						<div class="col-xl-3 col-lg-4 col-md-4 col-sm-12 m-b30">
							<div class="sticky-top bg-white">
								<div class="candidate-info onepage">
									<ul>
										<li><a class="scroll-bar nav-link" href="#resume_headline_bx">
											<span>{{ __('messages.job_title') }}</span></a></li>
										<li><a class="scroll-bar nav-link" href="#profile_summary_bx"> 
											<span>{{ __('messages.brief') }}</span></a></li>
										<li><a class="scroll-bar nav-link" href="#accomplishments_bx">
												<span>{{ __('messages.skills') }}</span></a></li>	
										<li><a class="scroll-bar nav-link" href="#it_skills_bx">
											<span>{{ __('messages.degrees&courses') }}</span></a></li>
											<li><a class="scroll-bar nav-link" href="#it_skills_bx2">
												<span>{{ __('messages.experiences') }}</span></a></li>												
									</ul>
								</div>
							</div>
						</div>
						<div class="col-xl-9 col-lg-8 col-md-8 col-sm-12">
							<div id="resume_headline_bx" class="job-bx bg-white m-b30">
								<div class="d-flex">
									<h5 class="m-b15">{{ __('messages.job_title') }}</h5>
									<a href="javascript:void(0);" data-toggle="modal" data-target="#resumeheadline" class="site-button add-btn button-sm"><i class="fa fa-pencil m-r5"></i> {{ __('messages.edit') }}</a>
								</div>
								<p class="m-b0">
									{{ ($data['user']['job_title'] != null )?  $data['user']['job_title']. " " . $data['user']['experience_years']. __('messages.what_your_job') : __('messages.years_of_experience') }}
								</p>
								<!-- Modal -->
								<div class="modal fade modal-bx-info editor" id="resumeheadline" tabindex="-1" role="dialog" aria-labelledby="ResumeheadlineModalLongTitle" aria-hidden="true">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<h5 class="modal-title" id="ResumeheadlineModalLongTitle">{{ __('messages.job_title') }}</h5>
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
											</div>
											<div class="modal-body">
												{{-- <p>It is the first thing recruiters notice in your profile. Write concisely what makes you unique and right person for the job you are looking for.</p> --}}
												<form method="post" action="/job_title" >
													@csrf
													<div class="row">
														<div class="col-lg-12 col-md-12">
															<div class="form-group">
																<input required name="job_title" value="{{$data['user']['job_title']}}" class="form-control" placeholder="{{ __('messages.job_title') }}" type="text">
																<br>
																<input required type="number" name="experience_years" class="form-control" placeholder="{{ __('messages.experience_years_number') }}" value="{{$data['user']['experience_years']}}"  >
															</div>
														</div>
													</div>
													<div class="modal-footer">
														<button type="button" class="site-button" data-dismiss="modal">{{ __('messages.cancel') }}</button>
														<button type="submit" class="site-button">{{ __('messages.save') }}</button>
													</div>
												</form>
											</div>

										</div>
									</div>
								</div>
								<!-- Modal End -->
							</div>
							<div id="profile_summary_bx" class="job-bx bg-white m-b30">
								<div class="d-flex">
									<h5 class="m-b15">{{ __('messages.brief') }}</h5>
									<a href="javascript:void(0);" data-toggle="modal" data-target="#profilesummary" class="site-button add-btn button-sm"><i class="fa fa-pencil m-r5"></i> {{ __('messages.edit') }}</a>
								</div>
								<p class="m-b0">{{ ($data['user']['summary'] != null )?  $data['user']['summary'] : __('messages.press_edit')  }}</p>
								<!-- Modal -->
								<div class="modal fade modal-bx-info editor" id="profilesummary" tabindex="-1" role="dialog" aria-labelledby="ProfilesummaryModalLongTitle" aria-hidden="true">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<h5 class="modal-title" id="ProfilesummaryModalLongTitle">{{ __('messages.brief') }}</h5>
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
											</div>
											<div class="modal-body">
												{{-- <p>Your Profile Summary should mention the highlights of your career and education, what your professional interests are, and what kind of a career you are looking for. Write a meaningful summary of more than 50 characters.</p> --}}
												<form method="post" action="/summary"  >
													@csrf
													<div class="row">
														<div class="col-lg-12 col-md-12">
															<div class="form-group">
																{{-- <label>Details of Project</label> --}}
															<textarea required name="summary" class="form-control" placeholder="{{ __('messages.brief') }}">{{$data['user']['summary']}}</textarea>
															</div>
														</div>
													</div>
													<div class="modal-footer">
														<button type="button" class="site-button" data-dismiss="modal">{{ __('messages.cancel') }}</button>
														<button type="submit" class="site-button">{{ __('messages.save') }}</button>
													</div>
												</form>
											</div>

										</div>
									</div>
								</div>
								<!-- Modal End -->
							</div>
							<div id="accomplishments_bx" class="job-bx bg-white m-b30">
								<div class="d-flex">
								<h5 class="m-b10">{{ __('messages.skills') }}</h5>
								<a href="javascript:void(0);" data-toggle="modal" data-target="#add-skills" class="site-button add-btn button-sm"><i class="fa fa-pencil m-r5"></i> {{ __('messages.add') }}</a>
								</div>
								@if(count($data['skills']) > 0 )
								@foreach ($data['skills'] as $skill)
								<div class="list-row">
									<div class="list-line">
										<div class="d-flex">
											<h6 class="font-14 m-b5">{{$skill['title']}}</h6>
											<a href="javascript:void(0);" data-toggle="modal" data-target="#accomplishments{{$skill['id']}}" class="site-button add-btn button-sm"><i class="fa fa-pencil m-r5"></i> {{ __('messages.edit') }}</a>
										</div>
										<p class="m-b0"> {{ __('messages.level') }} : {{$skill['level']}} </p>
										<!-- Modal -->
										<div class="modal fade modal-bx-info editor" id="accomplishments{{$skill['id']}}" tabindex="-1" role="dialog"  aria-labelledby="AccomplishmentsModalLongTitle" aria-hidden="true">
											<div class="modal-dialog" role="document">
												<div class="modal-content">
													<div class="modal-header">
														<h5 class="modal-title" id="AccomplishmentsModalLongTitle">{{ __('messages.edit') }}</h5>
														<button type="button" class="close" data-dismiss="modal" aria-label="Close">
															<span aria-hidden="true">&times;</span>
														</button>
													</div>
													<div class="modal-body">
														<form action="/edit-skills" method="POST" >
															@csrf
															<input type="hidden" name="skill_id" value="{{$skill['id']}}" >
															<div class="row">
																<div class="col-lg-12 col-md-12">
																	<div class="form-group">
																		<label>{{ __('messages.skill_name') }}</label>
																		<input required type="text" name="title" class="form-control" value="{{$skill['title']}}" placeholder="{{ __('messages.skill_name') }}">
																	</div>
																</div>
															</div>
															<div class="row">
																<div class="col-lg-12 col-md-12">
																	<div class="form-group">
																		<label>{{ __('messages.level') }}</label>
																		<input required type="text" name="level" value="{{$skill['level']}}" class="form-control" placeholder="{{ __('messages.level') }}">
																	</div>
																</div>
															</div>
															<div class="modal-footer">
																<button type="button" class="site-button" data-dismiss="modal">{{ __('messages.cancel') }}</button>
																<button type="submit" class="site-button">{{ __('messages.save') }}</button>
															</div>
														</form>
													</div>

												</div>
											</div>
										</div>
										<!-- Modal End -->
									</div>
								</div>
								@endforeach
								@else
									{{ __('messages.can_add_skill') }}
								@endif
																																				<!-- Modal -->
										<div class="modal fade modal-bx-info editor" id="add-skills" tabindex="-1" role="dialog"  aria-labelledby="AccomplishmentsModalLongTitle" aria-hidden="true">
											<div class="modal-dialog" role="document">
												<div class="modal-content">
													<div class="modal-header">
														<h5 class="modal-title" id="AccomplishmentsModalLongTitle">{{ __('messages.add_skill') }}</h5>
														<button type="button" class="close" data-dismiss="modal" aria-label="Close">
															<span aria-hidden="true">&times;</span>
														</button>
													</div>
													<div class="modal-body">
														<form action="/add-skills" method="POST"  >
															@csrf
															<div class="row">
																<div class="col-lg-12 col-md-12">
																	<div class="form-group">
																		<label>{{ __('messages.skill_name') }}</label>
																		<input required type="text" class="form-control" name="title" placeholder="{{ __('messages.skill_name') }}">
																	</div>
																</div>

																<div class="col-lg-12 col-md-12">
																	<div class="form-group">
																		<label>{{ __('messages.level') }}</label>
																		<input required type="text" class="form-control" name="level" placeholder="{{ __('messages.level') }}">
																	</div>
																</div>

															</div>
															<div class="modal-footer">
																<button type="button" class="site-button" data-dismiss="modal">{{ __('messages.cancel') }}</button>
																<button type="submit" class="site-button">{{ __('messages.save') }}</button>
															</div>
														</form>
													</div>
												</div>
											</div>
										</div>
										<!-- Modal End -->

							</div>
							<div id="it_skills_bx" class="job-bx table-job-bx bg-white m-b30">
								<div class="d-flex">
									<h5 class="m-b15">{{ __('messages.degrees&courses') }}</h5>
									<a href="javascript:void(0);" data-toggle="modal" data-target="#addcourse" class="site-button add-btn button-sm"><i class="fa fa-pencil m-r5"></i> {{ __('messages.add') }}</a>
								</div>
								{{-- <p>Mention your employment details including your current and previous company work experience</p> --}}
								@if(count($data['courses']) > 0 )
								<table>
									<thead>
										<tr>
											<th>{{ __('messages.course_name') }}</th>
											<th>{{ __('messages.university_name') }}</th>
											<th>{{ __('messages.period') }}</th>
											<th>{{ __('messages.year') }}</th>
											<th></th>
										</tr>
									</thead>
									<tbody>
										@foreach ($data['courses'] as $course)
										<tr>
											<td>{{$course->name}}</td>
											<td>{{$course->center}}</td>
											<td>{{$course->period}}</td>
											<td>{{$course->year}}</td>
											<td><a class="m-l15 font-14" data-toggle="modal" data-target="#editcourse{{$course->id}}" href="#"><i class="fa fa-pencil"></i></a></td>
										</tr>
										@endforeach
									</tbody>
								</table>

								@foreach ($data['courses'] as $course)
								<div class="modal fade modal-bx-info editor" id="editcourse{{$course->id}}" tabindex="-1" role="dialog"  aria-labelledby="AccomplishmentsModalLongTitle" aria-hidden="true">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<h5 class="modal-title" id="AccomplishmentsModalLongTitle">{{ __('messages.edit_course') }}</h5>
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
											</div>
											<div class="modal-body">
												<form action="/edit-course" method="POST"  >
													@csrf
													<input type="hidden" name="course_id" value="{{$course->id}}"  >
													<div class="row">
														<div class="col-lg-12 col-md-12">
															<div class="form-group">
																<label>{{ __('messages.course_name') }}</label>
																<input required type="text" value="{{$course->name}}" class="form-control" name="name" placeholder="{{ __('messages.course_name') }}">
															</div>
														</div>
														<div class="col-lg-12 col-md-12">
															<div class="form-group">
																<label>{{ __('messages.university_name') }}</label>
																<input required type="text" value="{{$course->center}}" class="form-control" name="center" placeholder="{{ __('messages.university_name') }}">
															</div>
														</div>
														<div class="col-lg-12 col-md-12">
															<div class="form-group">
																<label>{{ __('messages.period') }}</label>
																<input required type="text" value="{{$course->period}}" class="form-control" name="period" placeholder="{{ __('messages.period') }}">
															</div>
														</div>

														<div class="col-lg-12 col-md-12">
															<div class="form-group">
																<label>{{ __('messages.year') }}</label>
																<input required type="text" value="{{$course->year}}" class="form-control" name="year" placeholder="{{ __('messages.year') }}">
															</div>
														</div>
														

													</div>
													<div class="modal-footer">
														<button type="button" class="site-button" data-dismiss="modal">{{ __('messages.cancel') }}</button>
														<button type="submit" class="site-button">{{ __('messages.save') }}</button>
													</div>
												</form>
											</div>
										</div>
									</div>
								</div>
								<!-- Modal End -->
								@endforeach
								@else
								{{ __('messages.can_add_courses') }}
								@endif
								<div class="modal fade modal-bx-info editor" id="addcourse" tabindex="-1" role="dialog"  aria-labelledby="AccomplishmentsModalLongTitle" aria-hidden="true">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<h5 class="modal-title" id="AccomplishmentsModalLongTitle">{{ __('messages.add_course') }}</h5>
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
											</div>
											<div class="modal-body">
												<form action="/add-course" method="POST"  >
													@csrf
													<div class="row">
														<div class="col-lg-12 col-md-12">
															<div class="form-group">
																<label>{{ __('messages.course_name') }}</label>
																<input required type="text" class="form-control" name="name" placeholder="{{ __('messages.course_name') }}">
															</div>
														</div>
														<div class="col-lg-12 col-md-12">
															<div class="form-group">
																<label>{{ __('messages.university_name') }}</label>
																<input required type="text" class="form-control" name="center" placeholder="{{ __('messages.university_name') }}">
															</div>
														</div>
														<div class="col-lg-12 col-md-12">
															<div class="form-group">
																<label>{{ __('messages.period') }}</label>
																<input required type="text" class="form-control" name="period" placeholder="{{ __('messages.period') }}">
															</div>
														</div>

														<div class="col-lg-12 col-md-12">
															<div class="form-group">
																<label>{{ __('messages.year') }}</label>
																<input required type="text" class="form-control" name="year" placeholder="{{ __('messages.year') }}">
															</div>
														</div>
														

													</div>
													<div class="modal-footer">
														<button type="button" class="site-button" data-dismiss="modal">{{ __('messages.cancel') }}</button>
														<button type="submit" class="site-button">{{ __('messages.save') }}</button>
													</div>
												</form>
											</div>
										</div>
									</div>
								</div>
								<!-- Modal End -->

							</div>




							<div id="it_skills_bx2" class="job-bx table-job-bx bg-white m-b30">
								<div class="d-flex">
									<h5 class="m-b15">{{ __('messages.experiences') }}</h5>
									<a href="javascript:void(0);" data-toggle="modal" data-target="#addexperience" class="site-button add-btn button-sm"><i class="fa fa-pencil m-r5"></i> {{ __('messages.add') }}</a>
								</div>
								{{-- <p>Mention your employment details including your current and previous company work experience</p> --}}
								@if(count($data['experiences']) > 0 )
								<table>
									<thead>
										<tr>
											<th>{{ __('messages.job_title') }}</th>
											<th>{{ __('messages.company') }}</th>
											<th>{{ __('messages.start_date') }}</th>
											<th>{{ __('messages.end_date') }}</th>
											<th></th>
										</tr>
									</thead>
									<tbody>
										@foreach ($data['experiences'] as $item)
										<tr>
											<td>{{$item->job_title}}</td>
											<td>{{$item->company_name}}</td>
											<td>{{$item->start_date}}</td>
											<td>{{$item->end_date}}</td>
											<td><a class="m-l15 font-14" data-toggle="modal" data-target="#editexperience{{$item->id}}" href="#"><i class="fa fa-pencil"></i></a></td>
										</tr>
										@endforeach
									</tbody>
								</table>

								@foreach ($data['experiences'] as $item)
								<div class="modal fade modal-bx-info editor" id="editexperience{{$item->id}}" tabindex="-1" role="dialog"  aria-labelledby="AccomplishmentsModalLongTitle" aria-hidden="true">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<h5 class="modal-title" id="AccomplishmentsModalLongTitle">تعديل شهاده او كورس</h5>
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
											</div>
											<div class="modal-body">
												<form action="/edit-experience" method="POST"  >
													@csrf
													<input type="hidden" name="experience_id" value="{{$item->id}}"  >
													<div class="row">
														<div class="col-lg-12 col-md-12">
															<div class="form-group">
																<label>{{ __('messages.job_title') }}</label>
																<input required type="text" value="{{$item->job_title}}" class="form-control" name="job_title" placeholder="{{ __('messages.job_title') }}">
															</div>
														</div>	
													</div>													
														<div class="row">
															<div class="col-lg-12 col-md-12">
																<div class="form-group">
																	<label>{{ __('messages.company') }}</label>
																	<input required type="text" value="{{$item->company_name}}" class="form-control" name="company_name" placeholder="{{ __('messages.company') }}">
																</div>
															</div>
														</div>														
															<div class="row">
																<div class="col-lg-12 col-md-12">
																	<div class="form-group">
																		<label>{{ __('messages.start_date') }}</label>
																		<input required type="date" value="{{$item->start_date}}" class="form-control" name="start_date" placeholder="{{ __('messages.start_date') }}">
																	</div>
																</div>
															</div>
																													
																<div class="row">
																	<div class="col-lg-12 col-md-12">
																		<div class="form-group">
																			<label>{{ __('messages.end_date') }}</label>
																			<input required type="date" value="{{$item->end_date}}" class="form-control" name="end_date" placeholder="{{ __('messages.end_date') }}">
																		</div>
																	</div>
																</div>														
																	<div class="row">
																		<div class="col-lg-12 col-md-12">
																			<div class="form-group">
																				<label>{{ __('messages.salary') }}</label>
																				<input required type="text" value="{{$item->salary}}" class="form-control" name="salary" placeholder="{{ __('messages.salary') }}">
																			</div>
																		</div>														
										
													</div>
													<div class="modal-footer">
														<button type="button" class="site-button" data-dismiss="modal">{{ __('messages.cancel') }}</button>
														<button type="submit" class="site-button">{{ __('messages.save') }}</button>
													</div>
												</form>
											</div>
										</div>
									</div>
								</div>
								<!-- Modal End -->
								@endforeach
								@else
									{{ __('messages.can_add_experiences') }}
								@endif
								<div class="modal fade modal-bx-info editor" id="addexperience" tabindex="-1" role="dialog"  aria-labelledby="AccomplishmentsModalLongTitle" aria-hidden="true">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<h5 class="modal-title" id="AccomplishmentsModalLongTitle">{{ __('messages.add_experience') }}</h5>
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
											</div>
											

											<div class="modal-body">
												<form action="/add-experience" method="POST"  >
													@csrf
													<div class="row">
														<div class="col-lg-12 col-md-12">
															<div class="form-group">
																<label>{{ __('messages.job_title') }}</label>
																<input required type="text" value="" class="form-control" name="job_title" placeholder="{{ __('messages.job_title') }}">
															</div>
														</div>
													</div>														
														<div class="row">
															<div class="col-lg-12 col-md-12">
																<div class="form-group">
																	<label>{{ __('messages.company') }}</label>
																	<input required type="text" value="" class="form-control" name="company_name" placeholder="{{ __('messages.company') }}">
																</div>
															</div>	
														</div>														
															<div class="row">
																<div class="col-lg-12 col-md-12">
																	<div class="form-group">
																		<label>{{ __('messages.start_date') }}</label>
																		<input required type="date" value="" class="form-control" name="start_date" placeholder="{{ __('messages.start_date') }}">
																	</div>
																</div>	
															</div>													
																<div class="row">
																	<div class="col-lg-12 col-md-12">
																		<div class="form-group">
																			<label>{{ __('messages.end_date') }}</label>
																			<input required type="date" value="" class="form-control" name="end_date" placeholder="{{ __('messages.end_date') }}">
																		</div>
																	</div>
																</div>														
																	<div class="row">
																		<div class="col-lg-12 col-md-12">
																			<div class="form-group">
																				<label>{{ __('messages.salary') }}</label>
																				<input required type="text" value="" class="form-control" name="salary" placeholder="{{ __('messages.salary') }}">
																			</div>
																		</div>

										
													</div>
													<div class="modal-footer">
														<button type="button" class="site-button" data-dismiss="modal">{{ __('messages.cancel') }}</button>
														<button type="submit" class="site-button">{{ __('messages.save') }}</button>
													</div>
												</form>
											</div>


										</div>
									</div>
								</div>
								<!-- Modal End -->

							</div>





						</div>
					</div>
				</div>
			</div>
            <!-- Browse Jobs END -->
		</div>
		<div class="modal fade lead-form-modal" id="car-details" tabindex="-1" role="dialog" >
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<div class="modal-body row m-a0 clearfix">
						<div class="col-lg-6 col-md-6 overlay-primary-dark d-flex p-a0" style="background-image: url(images/background/bg3.jpg);  background-position:center; background-size:cover;">
							<div class="form-info text-white align-self-center">
								<h3 class="m-b15">Login To You Now</h3>
								<p class="m-b15">Lorem Ipsum is simply dummy text of the printing and typesetting industry has been the industry.</p>
								<ul class="list-inline m-a0">
									<li><a href="javascript:void(0);" class="m-r10 text-white"><i class="fa fa-facebook"></i></a></li>
									<li><a href="javascript:void(0);" class="m-r10 text-white"><i class="fa fa-google-plus"></i></a></li>
									<li><a href="javascript:void(0);" class="m-r10 text-white"><i class="fa fa-linkedin"></i></a></li>
									<li><a href="javascript:void(0);" class="m-r10 text-white"><i class="fa fa-instagram"></i></a></li>
									<li><a href="javascript:void(0);" class="m-r10 text-white"><i class="fa fa-twitter"></i></a></li>
								</ul>
							</div>
						</div>
						<div class="col-lg-6 col-md-6 p-a0">
							<div class="lead-form browse-job text-left">
								<form>
									<h3 class="m-t0">Personal Details</h3>
									<div class="form-group">
										<input type="text" value="" class="form-control" placeholder="E-Mail Address"/>
									</div>	
									<div class="form-group">
										<input type="password" value="" class="form-control" placeholder="Password"/>
									</div>
									<div class="clearfix">
										<button type="button" class="btn-primary site-button btn-block">Submit </button>
									</div>
								</form>
							</div>
						</div>
					</div>	
				</div>
			</div>
		</div>
    </div>
    <!-- Content END-->
	<!-- Modal Box -->
	<div class="modal fade lead-form-modal" id="car-details" tabindex="-1" role="dialog" >
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<div class="modal-body row m-a0 clearfix">
					<div class="col-lg-6 col-md-6 overlay-primary-dark d-flex p-a0" style="background-image: url(images/background/bg3.jpg);  background-position:center; background-size:cover;">
						<div class="form-info text-white align-self-center">
							<h3 class="m-b15">Login To You Now</h3>
							<p class="m-b15">Lorem Ipsum is simply dummy text of the printing and typesetting industry has been the industry.</p>
							<ul class="list-inline m-a0">
								<li><a href="#" class="m-r10 text-white"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#" class="m-r10 text-white"><i class="fa fa-google-plus"></i></a></li>
								<li><a href="#" class="m-r10 text-white"><i class="fa fa-linkedin"></i></a></li>
								<li><a href="#" class="m-r10 text-white"><i class="fa fa-instagram"></i></a></li>
								<li><a href="#" class="m-r10 text-white"><i class="fa fa-twitter"></i></a></li>
							</ul>
						</div>
					</div>
					<div class="col-lg-6 col-md-6 p-a0">
						<div class="lead-form browse-job text-left">
							<form>
								<h3 class="m-t0">Personal Details</h3>
								<div class="form-group">
									<input value="" class="form-control" placeholder="Name"/>
								</div>	
								<div class="form-group">
									<input value="" class="form-control" placeholder="Mobile Number"/>
								</div>
								<div class="clearfix">
									<button type="button" class="btn-primary site-button btn-block">Submit </button>
								</div>
							</form>
						</div>
					</div>
				</div>	
			</div>
		</div>
	</div>
	<!-- Modal Box End -->
@endsection