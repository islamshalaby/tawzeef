@extends('admin.app')

@section('title' , 'Admin Panel Add New Category')

@section('content')
    <div class="col-lg-12 col-12 layout-spacing">
        <div class="statbox widget box box-shadow">
            <div class="widget-header">
                <div class="row">
                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                        <h4>{{ __('messages.add_new_company') }}</h4>
                 </div>
        </div>
        <form action="" method="post" enctype="multipart/form-data" >
            @csrf
            <div class="form-group mb-4">
                <label for="">{{ __('messages.current_image') }}</label><br>
                <img src="https://res.cloudinary.com/ddcmwwmwk/image/upload/w_100,q_100/v1581928924/{{ $data['company']['image'] }}"  />
            </div>
            <div class="custom-file-container" data-upload-id="myFirstImage">
                <label>{{ __('messages.upload') }} ({{ __('messages.single_image') }}) <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image">x</a></label>
                <label class="custom-file-container__custom-file" >
                    <input type="file"  name="image" class="custom-file-container__custom-file__custom-file-input" accept="image/*">
                    <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
                    <span class="custom-file-container__custom-file__custom-file-control"></span>
                </label>
                <div class="custom-file-container__image-preview"></div>
            </div>            
            <div class="form-group mb-4">
                <label for="name_ar">{{ __('messages.company_name_ar') }}</label>
                <input required type="text" name="name_ar" class="form-control" id="name_ar" placeholder="{{ __('messages.company_name_ar') }}" value="{{ $data['company']['name_ar'] }}" >
            </div>
            <div class="form-group mb-4">
                <label for="name_en">{{ __('messages.company_name_en') }}</label>
                <input required type="text" name="name_en" class="form-control" id="name_en" placeholder="{{ __('messages.company_name_en') }}" value="{{ $data['company']['name_en'] }}" >
            </div>
            <div class="form-group mb-4">
                <label for="email">{{ __('messages.email') }}</label>
                <input required type="email" name="email" class="form-control" id="email" placeholder="{{ __('messages.email') }}" value="{{ $data['company']['email'] }}" >
            </div>
            <div class="form-group mb-4">
                <label for="password">{{ __('messages.password') }}</label>
                <input required type="password" name="password" class="form-control" id="password" placeholder="{{ __('messages.password') }}" value="" >
            </div>
            <div class="form-group mb-4">
                <label for="website">{{ __('messages.website') }}</label>
                <input required type="text" name="website" class="form-control" id="website" placeholder="{{ __('messages.website') }}" value="{{ $data['company']['website'] }}" >
            </div>
            <div class="form-group mb-4">
                <label for="category">{{ __('messages.category') }}</label>
                {{-- <input required type="text" name="category_id" class="form-control" id="website" placeholder="{{ __('messages.website') }}" value="" > --}}
                <select required class="form-control" name="category_id" >
                    <option selected disabled value="">{{ __('messages.select') }}</option>
                    @foreach ($data['categories'] as $category)
                        <option {{ ($category->id == $data['company']['category_id']) ? "selected" : "" }} value="{{ $category->id }}">{{ $category->title_ar }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group mb-4">
                <label for="country">{{ __('messages.country') }}</label>
                {{-- <input required type="text" name="category_id" class="form-control" id="website" placeholder="{{ __('messages.website') }}" value="" > --}}
                <select required class="form-control" name="country_id" >
                    <option selected disabled value="">{{ __('messages.select') }}</option>
                    @foreach ($data['countries'] as $country)
                        <option {{ ($country->id == $data['company']['country_id']) ? "selected" : "" }}  value="{{ $country->id }}">{{ $country->name_ar }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group mb-4">
                <label for="description_ar">{{ __('messages.description_ar') }}</label>
                <textarea required class="form-control" name="description_ar" id="description_ar">{{ $data['company']['description_ar'] }}</textarea>
            </div>
            <div class="form-group mb-4">
                <label for="description_en">{{ __('messages.description_en') }}</label>
                <textarea required class="form-control" name="description_en" id="description_en">{{ $data['company']['description_en'] }}</textarea>
            </div>
            <div class="form-group mb-4">
                <label for="phone">{{ __('messages.phone') }}</label>
                <input required class="form-control" type="text" name="phone" id="phone" value="{{ $data['company']['phone'] }}" >
            </div>                            
            <div class="form-group mb-4">
                <label for="address">{{ __('messages.address_ar') }}</label>
                <input required class="form-control" type="text" name="address" id="address" value="{{ $data['company']['address'] }}" >
            </div>    
            <div class="form-group mb-4">
                <label for="address_en">{{ __('messages.address_en') }}</label>
                <input required class="form-control" type="text" name="address_en" id="address_en" value="{{ $data['company']['address_en'] }}" >
            </div>                         
            <div class="form-group mb-4">
                <label for="facebook">{{ __('messages.facebook') }}</label>
                <input  class="form-control" type="text" name="facebook" id="facebook" value="{{ $data['company']['facebook'] }}" >
            </div>                            
            <div class="form-group mb-4">
                <label for="twitter">{{ __('messages.twitter') }}</label>
                <input  class="form-control" type="text" name="twitter" id="twitter" value="{{ $data['company']['twitter'] }}" >
            </div>                            
            <div class="form-group mb-4">
                <label for="linkedin">{{ __('messages.linkedin') }}</label>
                <input  class="form-control" type="text" name="linkedin" id="linkedin" value="{{ $data['company']['linkedin'] }}" >
            </div>                            
            <div class="form-group mb-4">
                <label for="youtube">{{ __('messages.youtube') }}</label>
                <input  class="form-control" type="text" name="youtube" id="youtube" value="{{ $data['company']['youtube'] }}" >
            </div>                            



            <input type="submit" value="{{ __('messages.submit') }}" class="btn btn-primary">
        </form>
    </div>
@endsection