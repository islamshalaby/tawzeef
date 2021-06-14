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
                                <h5 class="font-weight-700 pull-left text-uppercase">{{ __('messages.manage_jobs') }}</h5>
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
                                        {{-- <th class="feature">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" id="check12" class="custom-control-input selectAllCheckBox" name="example1">
                                                <label class="custom-control-label" for="check12"></label>
                                            </div>
                                        </th> --}}
                                        <th>{{ __('messages.job_title') }}</th>
                                        <th>{{ __('messages.applications') }}</th>
                                        <th>{{ __('messages.date') }}</th>
                                        <th>{{ __('messages.action') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(count($data['jobs']) > 0)
                                        @foreach ($data['jobs'] as $job)
                                        <tr>
                                            {{-- <td class="feature">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="check1" name="example1">
                                                    <label class="custom-control-label" for="check1"></label>
                                                </div>
                                            </td> --}}
                                            
                                            <td class="job-name">
                                                <a href="javascript:void(0);">{{ App::isLocale('en') ? $job->title_en : $job->title_ar }}</a>
                                                <ul class="job-post-info">
                                                    <li><i class="fa fa-file-text-o"></i> {{ App::isLocale('en') ? $job->qualification->title_en : $job->qualification->title_ar }}</li>
                                                    <li><i class="fa fa-bookmark-o"></i> {{ App::isLocale('en') ? $job->type->title_en : $job->type->title_ar }}</li>
                                                    <li><i class="fa fa-filter"></i> {{ App::isLocale('en') ? $job->category->title_en : $job->category->title_ar }}</li>
                                                </ul>
                                            </td>
                                            <td class="application text-primary"><a href="{{ route('job.applies', $job->id) }}">({{ $job->requests->count() }}) {{ __('messages.applications') }}</a> </td>
                                            <td class="expired pending">{{ $job['created_at']->format('Y-m-d') }} </td>
                                            <td class="job-links">
                                                <a href="{{ route('edit.jobs', $job->id) }}">
                                                <i class="fa fa-eye"></i></a>
                                                <a href="{{ route('delete.jobs', $job->id) }}"><i class="ti-trash"></i></a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                            {{$data['jobs']->links()}}
                            
                        </div>
                    </div>
                
            </div>
        </div>
    </form>
    </div>
    <!-- Browse Jobs END -->
</div>
@endsection