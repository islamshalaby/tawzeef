@extends('app')

@section('title' , __('messages.manage_jobs'))

@section('content')
<div class="content-block">
    <!-- Browse Jobs -->
    <div class="section-full bg-white browse-job p-t50 p-b20">
        <form action="{{ route('post.company.profile') }}" method="POST" enctype="multipart/form-data">
        <div class="container">
            <div class="row">
                
                    @csrf
                    <div class="col-xl-3 col-lg-4 m-b30">
                        <div class="sticky-top">
                            <div class="candidate-info">
                                <div class="candidate-detail text-center">
                                    <div class="canditate-des">
                                        <a href="javascript:void(0);">
                                            <img alt="" src="{{ isset($data['user']['image']) ? 'https://res.cloudinary.com/ddcmwwmwk/image/upload/w_500,h_500/v1581928924/' . $data['user']['image'] : '/web/images/team/pic1.jpg' }}">
                                        </a>
                                        <div class="upload-link" title="update" data-toggle="tooltip" data-placement="left">
                                            <input  type="file" name="image" class="update-flie"/>
                                            <i class="fa fa-camera"></i>
                                        </div>
                                    </div>
                                    <div class="candidate-title">
                                        <div class="">
                                            <h4 class="m-b5"><a href="javascript:void(0);">{{ App::isLocale('en') ? $data['user']['name_en'] : $data['user']['name_ar'] }}</a></h4>
                                            {{-- <p class="m-b0"><a href="javascript:void(0);">Web developer</a></p> --}}
                                        </div>
                                    </div>
                                </div>
                                @include('profile_nav')
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-9 col-lg-8 m-b30">
                        <div class="job-bx clearfix">
                            <div class="job-bx-title clearfix">
                                <h5 class="font-weight-700 pull-left text-uppercase">{{ __('messages.applications') }}</h5>
                                {{-- <div class="float-right">
                                    <span class="select-title">Sort by freshness</span>
                                    <select>
                                        <option>All</option>
                                        <option>None</option>
                                        <option>Read</option>
                                        <option>Unread</option>
                                        <option>Starred</option>
                                        <option>Unstarred</option>
                                    </select>
                                </div> --}}
                            </div>
                            <table class="table-job-bx cv-manager company-manage-job">
                                <thead>
                                    <tr>
                                        <th>{{ __('messages.name') }}</th>
                                        <th>{{ __('messages.resume') }}</th>
                                        <th>{{ __('messages.tests') }}</th>
                                        <th>{{ __('messages.status') }}</th>
                                        <th>{{ __('messages.date') }}</th>
                                        <th>{{ __('messages.accept/reject') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(count($data['requests']) > 0)
                                        @foreach ($data['requests'] as $request)
                                        <tr>
                                            <td class="job-name">
                                                {{ $request->user->name }}
                                            </td>
                                            <td class="application text-primary"><a target="_blank" href="{{ route('user.resume.jobs', $request->user->id) }}">{{ __('messages.resume') }}</a></td>
                                            <td class="application text-primary">
                                                <div class="job-time mr-auto">
                                                    @if(count($request->user->exams) > 0)
                                                    @foreach ($request->user->exams as $exam)
                                                    <a href="{{ route('exams.results.jobs', $request->user->id) }}"><span>{{ App::isLocale('en') ? $exam->title_en : $exam->title_ar }}</span></a>
                                                    @endforeach
                                                    @endif
                                                </div>
                                            </td>
                                            <td class="application text-primary">
                                                @if($request->status == 1)
                                                {{ __('messages.applied') }}
                                                @elseif($request->status == 2)
                                                {{ __('messages.accepted') }}
                                                @else
                                                {{ __('messages.rejected') }}
                                                @endif
                                            </td>
                                            <td class="expired pending">{{ $request['created_at']->format('Y-m-d') }} </td>
                                            <td class="job-links">
                                                <a href="{{ route('change.status.jobs', [$request->id, 2]) }}">
                                                <i class="fa fa-thumbs-up"></i></a>
                                                <a href="{{ route('change.status.jobs', [$request->id, 3]) }}"><i style="color: #e53232; border-color : #e53232" class="fa fa-thumbs-down"></i></a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                            
                        </div>
                    </div>
                
            </div>
        </div>
    </form>
    </div>
    <!-- Browse Jobs END -->
</div>
@endsection