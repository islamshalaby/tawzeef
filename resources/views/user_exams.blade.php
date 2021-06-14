@extends('app')

@section('title' , __('messages.tests_results') . $data['usr']['name'])

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
                                <h5 class="font-weight-700 pull-left text-uppercase">{{ __('messages.tests_results') . $data['usr']['name'] }}</h5>
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
                                        <th>{{ __('messages.test_result') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(count($data['exams']) > 0)
                                        @foreach ($data['exams'] as $exam)
                                        <tr>
                                            <td class="job-name">
                                                {{ App::isLocale('en') ? $exam->category->title_en : $exam->category->title_ar }}
                                            </td>
                                            <td class="application text-primary"><a href="#">{{ $exam->percentage }} %</a></td>
                                            
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