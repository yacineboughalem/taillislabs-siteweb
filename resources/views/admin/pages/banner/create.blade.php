@extends('admin.layouts.app')
@section('title', __('Admins'))

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


<form action="{{ url('panel/banner') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h5>Add</h5>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label class="form-label">Title</label>
                        <input type="text" name="title" class="form-control" value="{{ old('title') }}"
                            placeholder="">
                        {{-- <small class="form-text text-muted">Please enter your full name</small> --}}
                    </div>

                    <div class="form-group">
                        <label class="form-label">Short description</label>
                        <input type="text" name="subtitle" class="form-control" value="{{ old('subtitle') }}">
                        {{-- <small class="form-text text-muted">Please enter your full name</small> --}}
                    </div>

                    <div class="form-group">
                        <label class="form-label">URL</label>
                        <input type="text" name="link" class="form-control" value="{{ old('link') }}">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Label</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                    </div>

                   
                    <div class="form-group">
                        <div class="fallback">
                            <input type="file" name="photo" accept="image/*" class="form-control"
                                id="profile-image-input" accept="image/*" />
                        </div>
                        <img src="" id="profile-imgsrc" class="img-responsive  mt-2" style="height:200px;">

                    </div>

                    <div class="form-group">
                        <div class="form-check form-switch custom-switch-v1 mb-2">
                            <input type="checkbox" name="status" class="form-check-input input-light-primary"
                                id="customswitchlightv1-1" value="ENABLE" checked>
                            <label class="form-check-label" for="customswitchlightv1-1">Active</label>
                        </div>
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


@section('javascript')
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
