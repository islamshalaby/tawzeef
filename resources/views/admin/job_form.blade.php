@extends('admin.app')

@section('title' , 'Admin Panel Add New Category')

@section('content')
    <div class="col-lg-12 col-12 layout-spacing">
        <div class="statbox widget box box-shadow">
            <div class="widget-header">
                <div class="row">
                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                        <h4>{{ __('messages.add_new_job') }}</h4>
                 </div>
        </div>
        <form action="" method="post" enctype="multipart/form-data" >
            @csrf
            <div class="custom-file-container" data-upload-id="myFirstImage">
                <label>{{ __('messages.upload') }} ({{ __('messages.single_image') }}) <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image">x</a></label>
                <label class="custom-file-container__custom-file" >
                    <input type="file" required name="image" class="custom-file-container__custom-file__custom-file-input" accept="image/*">
                    <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
                    <span class="custom-file-container__custom-file__custom-file-control"></span>
                </label>
                <div class="custom-file-container__image-preview"></div>
            </div>

            <div class="form-group mb-4">
                <label for="title_ar">{{ __('messages.title_ar') }}</label>
                <input required type="text" name="title_ar" class="form-control" id="title_ar" placeholder="{{ __('messages.title_ar') }}" value="" >
            </div>
            <div class="form-group mb-4">
                <label for="title_en">{{ __('messages.title_en') }}</label>
                <input required type="text" name="title_en" class="form-control" id="title_en" placeholder="{{ __('messages.title_en') }}" value="" >
            </div>

            <div class="form-group mb-4">
                <label for="experience_from">{{ __('messages.experience_from') }}</label>
                <input required type="number" name="experience_from" class="form-control" id="experience_from" placeholder="{{ __('messages.experience_from') }}" value="" >
            </div>

            <div class="form-group mb-4">
                <label for="experience_to">{{ __('messages.experience_to') }}</label>
                <input required type="number" name="experience_to" class="form-control" id="experience_to" placeholder="{{ __('messages.experience_to') }}" value="" >
            </div>

            <div class="form-group mb-4">
                <label for="age_from">{{ __('messages.age_from') }}</label>
                <input required type="number" name="age_from" class="form-control" id="age_from" placeholder="{{ __('messages.age_from') }}" value="" >
            </div>

            <div class="form-group mb-4">
                <label for="age_to">{{ __('messages.age_to') }}</label>
                <input required type="number" name="age_to" class="form-control" id="age_to" placeholder="{{ __('messages.age_to') }}" value="" >
            </div>

            <div class="form-group mb-4">
                <label for="salary_from">{{ __('messages.salary_from') }}</label>
                <input  type="text" name="salary_from" class="form-control" id="salary_from" placeholder="{{ __('messages.salary_from') }}" value="" >
            </div>

            <div class="form-group mb-4">
                <label for="salary_to">{{ __('messages.salary_to') }}</label>
                <input  type="text" name="salary_to" class="form-control" id="salary_to" placeholder="{{ __('messages.salary_to') }}" value="" >
            </div>

            <div class="form-group mb-4">
                <label for="gender">{{ __('messages.gender') }}</label>
                <select required class="form-control"  name="gender" >
                    <option selected disabled >{{ __('messages.select') }}</option>
                    <option value="1" >{{ __('messages.male') }}</option>
                    <option value="2" >{{ __('messages.female') }}</option>
                    <option value="3" >{{ __('messages.booth') }}</option>
                </select>
            </div>
            
            <div class="form-group mb-4">
                <label for="decription_ar">{{ __('messages.description_ar') }}</label>
                <textarea id="editor-ck-ar" required class="form-control" name="decription_ar" ></textarea>
            </div>

            <div class="form-group mb-4">
                <label for="decription_en">{{ __('messages.description_en') }}</label>
                <textarea id="editor-ck-en" required class="form-control" name="decription_en" ></textarea>
            </div>


            <div class="form-group mb-4">
                <label for="short_description_ar">{{ __('messages.short_description_ar') }}</label>
                <textarea required maxlength="100" class="form-control" name="short_description_ar" ></textarea>
            </div>

            <div class="form-group mb-4">
                <label for="short_description_en">{{ __('messages.short_description_en') }}</label>
                <textarea required maxlength="100" class="form-control" name="short_description_en" ></textarea>
            </div>
            
            <div class="form-group mb-4">
                <label for="english	">{{ __('messages.english') }}</label>
                <input  type="text" name="english" class="form-control" id="english" placeholder="{{ __('messages.english') }}" value="" >
            </div>

            <div class="form-group mb-4">
                <label for="category">{{ __('messages.category') }}</label>
                {{-- <input required type="text" name="category_id" class="form-control" id="website" placeholder="{{ __('messages.website') }}" value="" > --}}
                <select required class="form-control" name="category_id" >
                    <option selected disabled value="">{{ __('messages.select') }}</option>
                    @foreach ($data['categories'] as $category)
                        <option value="{{ $category->id }}">{{ $category->title_ar }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group mb-4">
                <label for="job_type">{{ __('messages.job_type') }}</label>
                {{-- <input required type="text" name="category_id" class="form-control" id="website" placeholder="{{ __('messages.website') }}" value="" > --}}
                <select required class="form-control" name="job_type" >
                    <option selected disabled value="">{{ __('messages.select') }}</option>
                    @foreach ($data['job_types'] as $job_type)
                        <option value="{{ $job_type->id }}">{{ $job_type->title_ar }}</option>
                    @endforeach
                </select>
            </div>


            <div class="form-group mb-4">
                <label for="qualification">{{ __('messages.qualification') }}</label>
                {{-- <input required type="text" name="category_id" class="form-control" id="website" placeholder="{{ __('messages.website') }}" value="" > --}}
                <select required class="form-control" name="qualification_id" >
                    <option selected disabled value="">{{ __('messages.select') }}</option>
                    @foreach ($data['qualifications'] as $qualification)
                        <option value="{{ $qualification->id }}">{{ $qualification->title_ar }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group mb-4">
                <label for="company_id">{{ __('messages.company') }}</label>
                {{-- <input required type="text" name="category_id" class="form-control" id="website" placeholder="{{ __('messages.website') }}" value="" > --}}
                <select required class="form-control" name="company_id" >
                    <option selected disabled value="">{{ __('messages.select') }}</option>
                    @foreach ($data['companies'] as $company)
                        <option value="{{ $company->id }}">{{ $company->name_ar }}</option>
                    @endforeach
                </select>
            </div>

            <input type="submit" value="{{ __('messages.submit') }}" class="btn btn-primary">
        </form>
    </div>
@endsection