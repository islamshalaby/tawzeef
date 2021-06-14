@extends('admin.app')

@section('title' , 'Admin Panel All Ads')

@section('content')
    <div id="tableSimple" class="col-lg-12 col-12 layout-spacing">
        <div class="statbox widget box box-shadow">
            <div class="widget-header">
            <div class="row">
                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                    <h4>{{ __('messages.show_categories') }}</h4>
                </div>
            </div>
        </div>
        <div class="widget-content widget-content-area">
            <div class="table-responsive"> 
                <table id="html5-extension" class="table table-hover non-hover" style="width:100%">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>{{ __('messages.job_title') }}</th>
                            <th>{{ __('messages.company_name_ar') }}</th>
                            <th>{{ __('messages.requests') }}</th>
                            @if(Auth::user()->update_data) 
                                <th class="text-center">{{ __('messages.edit') }}</th>                          
                            @endif
                            @if(Auth::user()->delete_data) 
                                <th class="text-center">{{ __('messages.delete') }}</th>                          
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        @foreach ($data['jobs'] as $job)
                            <tr>
                                <td><?=$i;?></td>
                                <td>{{ $job->title_ar }}</td>
                                <td><a href="/admin-panel/companies/edit/{{  $job->company->id  }}" >{{ $job->company->name_ar }}</a></td>
                                <td><a target="_blank" style="color: blue" href="/admin-panel/jobs/{{  $job->id  }}/requests" > {{ __('messages.requests') }} </a></td>
                                @if(Auth::user()->update_data) 
                                    <td class="text-center blue-color" ><a href="/admin-panel/jobs/edit/{{ $job->id }}" ><i class="far fa-edit"></i></a></td>
                                @endif
                                @if(Auth::user()->delete_data) 
                                    <td class="text-center blue-color" ><a onclick="return confirm('Are you sure you want to delete this item?');" href="/admin-panel/jobs/delete/{{ $job->id }}" ><i class="far fa-trash-alt"></i></a></td>
                                @endif                                
                                <?php $i++; ?>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        
    </div>  

@endsection