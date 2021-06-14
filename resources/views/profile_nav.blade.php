<ul>
    <li><a href="{{ route('post.company.profile') }}" class="{{ Request::segment(1) == 'profile-company' ? 'active' : '' }}">
        <i class="fa fa-user-o" aria-hidden="true"></i> 
        <span>{{ __('messages.personal_data') }}</span></a></li>
    <li>
        <a href="{{ route('post.company.jobs') }}" class="{{ Request::segment(1) == 'jobs-company' || Request::segment(2) == 'applies' || Request::segment(2) == 'results' ? 'active' : '' }}">
        <i class="fa fa-file-text-o" aria-hidden="true"></i> 
        <span>{{ __('messages.manage_jobs') }}</span></a></li>
    <li><a href="{{ route('create.jobs') }}" class="{{ Request::segment(1) == 'job' || Request::segment(1) == 'create' ? 'active' : '' }}">
        <i class="fa fa-file-text-o" aria-hidden="true"></i> 
        <span>{{ __('messages.create_new_job') }}</span></a></li>
    {{-- <li><a class="{{ Request::segment(1) == 'requests' ? 'active' : '' }}" href="#">
        <i class="fa fa-briefcase" aria-hidden="true"></i> 
        <span>{{ __('messages.requests_submitted') }}</span></a></li> --}}
    
    <li><a href="{{ route('logout.company') }}">
        <i class="fa fa-sign-out" aria-hidden="true"></i> 
        <span>{{ __('messages.signout') }}</span></a></li>
</ul>