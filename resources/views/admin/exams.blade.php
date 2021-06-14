@extends('admin.app')

@section('title' , 'Admin Panel All Ads')

@section('content')
    <div id="tableSimple" class="col-lg-12 col-12 layout-spacing">
        <div class="statbox widget box box-shadow">
            <div class="widget-header">
            <div class="row">
                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                    <a style="color: blue; text-decoration: underline; font-size : 20px" href="/admin-panel/categories/{{$data['category']->id}}/exams/addnew" > {{ __('messages.add_new_question') }} </a>
                    <h4>{{ __('messages.show_questions') }}</h4>
                </div>
            </div>
        </div>
        <div class="widget-content widget-content-area">
            <div class="table-responsive"> 
                <table id="html5-extension" class="table table-hover non-hover" style="width:100%">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>{{ __('messages.question') }}</th>
                            @if(Auth::user()->update_data) 
                                <th class="text-center">{{ __('messages.edit') }}</th>
                            @endif
                            @if(Auth::user()->delete_data) 
                                <th class="text-center" >{{ __('messages.delete') }}</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        @foreach ($data['questions'] as $question)
                            <tr>
                                <td><?=$i;?></td>
                                <td>{{$question->question_en}}</td>
                                @if(Auth::user()->update_data) 
                            <td class="text-center blue-color" ><a href="/admin-panel/categories/{{$data['category']->id}}/exams/edit/{{ $question->id }}" ><i class="far fa-edit"></i></a></td>
                                @endif
                                @if(Auth::user()->delete_data) 
                                    <td class="text-center blue-color" ><a onclick="return confirm('Are you sure you want to delete this item?');" href="/admin-panel/categories/{{$data['category']->id}}/exams/delete/{{ $question->id }}" ><i class="far fa-trash-alt"></i></a></td>                                
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