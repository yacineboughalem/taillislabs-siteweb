@extends('admin.layouts.app')
@section('title', __('Add Post'))

@section('content')

@if ($errors->any())
<div class="alert alert-danger d-flex align-items-center" role="alert">
    <svg class="bi flex-shrink-0 me-2" width="24" height="24">
        <use xlink:href="#custom-notification-outline"></use>
    </svg>
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

@if (session()->has('message'))
<div class="alert alert-success d-flex align-items-center" role="alert">
    <svg class="bi flex-shrink-0 me-2" width="24" height="24">
        <use xlink:href="#custom-notification-outline"></use>
    </svg>
    <div>{{ session()->get('message') }}</div>
</div>
@endif

<form action="{{ route('admin.post.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h5>Add</h5>
                </div>
                <div class="card-body">
                    {{-- <div class="form-group">
                        <label class="form-label" for="exampleSelect2">Multiple select</label>
                        <select multiple="" name="categories[]" class="form-select" id="exampleSelect2">
                            @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ old('categories') ? (in_array($category->id, old('categories')) ? 'selected' : null) : null }}>
                                {{ $category->name }} </option>
                        @endforeach
                        </select>
                      </div> --}}

                      <div class="form-group">
                        <label class="form-label">Categories</label>
                        <select class="form-control" data-trigger name="collections[]" id="choices-single-default" multiple>
                            @foreach ($collections as $category)
                                <option value="{{ $category->id }}"
                                {{ old('categories') ? (in_array($category->id, old('categories')) ? 'selected' : null) : null }}>
                                {{ $category->name }} </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Title</label>
                        <input type="text" name="title" class="form-control" value="{{ old('title') }}"
                            placeholder="">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Short</label>
                        <textarea name="short" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Body</label>
                        <textarea id="pc-tinymce" name="body" class="tox-target textarea"></textarea>
                    </div>
                   
                    <div class="form-group">
                        <div class="fallback">
                            <input type="file" name="image" accept="image/*" class="form-control"
                                id="profile-image-input" accept="image/*" />
                        </div>
                        <img src="" id="profile-imgsrc" class="img-responsive  mt-2" style="height:200px;">

                    </div>

                    <div class="form-group">
                        <div class="form-check form-switch custom-switch-v1 mb-2">
                            <input type="checkbox" name="status" class="form-check-input input-light-primary"
                                id="customswitchlightv1-1" checked>
                            <label class="form-check-label" for="customswitchlightv1-1">Active</label>
                        </div>
                    </div>

                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h5>Meta - SEO</h5>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label class="form-label">Meta Title</label>
                        <input type="text" class="form-control"  name="meta_title" value="{{ old('meta_title') }}">
                        {{-- <small class="form-text text-muted">Please enter your full name</small> --}}
                    </div>
                  
                    <div class="form-group">
                        <label class="form-label">Meta keywords</label>
                        <input type="text" class="form-control"  name="meta_keywords" value="{{ old('meta_keywords') }}">
                        {{-- <small class="form-text text-muted">Please enter your full name</small> --}}
                    </div>
                    <div class="form-group">
                        <label class="form-label">Meta Description</label>
                        <textarea class="form-control" name="meta_description">{{ old('meta_description') }}</textarea>
                        {{-- <small class="form-text text-muted">Please enter your full name</small> --}}
                    </div>
                </div>
            </div>

       
        </div>
    </div>
    <div id="sticky-action" class="card sticky-action">
        <div class="card-header">
            <div class="row align-items-center">
                <div class="col-sm-6">
                </div>
                <div class="col-sm-6 text-sm-end mt-3 mt-sm-0">
                    <button type="reset" class="btn btn-light-secondary">Cancel</button>
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
            </div>
        </div>
    </div>
</form>


@endsection

@section('css')
<link href="https://cdnjs.cloudflare.com/ajax/libs/prism/1.22.0/themes/prism.min.css" rel="stylesheet" />
@endsection

@section('javascript')
<script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.22.0/prism.min.js"></script>
    
<script>
    $(function() {
        function showImage(fileInput, imgID) {
            if (fileInput.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $(imgID).attr('src', e.target.result);
                    $(imgID).attr('alt', fileInput.files[0].name);
                }
                reader.readAsDataURL(fileInput.files[0]);
            }
        }
        $('#profile-image-btn').on('click', function() {
            $('#profile-image-input').click();
        });
        $('#profile-image-input').on('change', function() {
            showImage(this, '#profile-imgsrc');

            var img = document.getElementById('profile-imgsrc');
            img.style.display = 'block';

        });
    })
</script>

@endsection
