@extends('admin.layouts.app')
@section('title', __('Edit'))

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


<form action="{{ route('admin.admin.update',$admin) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h5>Add</h5>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label class="form-label">Name</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name') ?? $admin->name }}"
                            placeholder="">
                    </div>

                    <div class="form-group">
                        <label class="form-label">Email</label>
                        <input type="text" name="email" class="form-control" value="{{ old('email') ?? $admin->email }}">
                    </div>

                    <div class="form-group">
                        <label class="form-label">Phone</label>
                        <input type="text" name="phone" class="form-control" value="{{ old('phone') ?? $admin->phone }}">
                    </div>

                    <div class="form-group">
                        <label class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" value="">
                    </div>

                    <div class="form-group">
                        <div class="form-check form-switch custom-switch-v1 mb-2">
                            <input type="checkbox" name="is_super" class="form-check-input input-light-primary"
                                id="customswitchlightv1-1" {{ $admin->is_super ? 'checked' : null  }}>
                            <label class="form-check-label" for="customswitchlightv1-1">{{ __("is super") }}</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="form-check form-switch custom-switch-v1 mb-2">
                            <input type="checkbox" name="is_active" class="form-check-input input-light-primary"
                                id="customswitchlightv1-1" {{ $admin->is_active ? 'checked' : null  }}>
                            <label class="form-check-label" for="customswitchlightv1-1">{{ __("is active") }}</label>
                        </div>
                    </div>

                   
                    <div class="form-group">
                        <div class="fallback">
                            <input type="file" name="image" accept="image/*" class="form-control"
                                id="profile-image-input" accept="image/*" />
                        </div>
                        @if ($admin->image)
                            <img src="{{ $admin->image->pathThumbnail }}" id="profile-imgsrc" class="img-responsive  mt-2" style="height:200px;" />
                        @endif
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
