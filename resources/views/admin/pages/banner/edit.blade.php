@extends('admin.layouts.app')
@section('title', __('Banner') )

@section('content')

@if ($errors->any())
    <div class="rounded-md flex items-center px-5 py-4 mb-2 bg-theme-31 text-theme-6"> <i data-feather="alert-octagon" class="w-6 h-6 mr-2"></i>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="/panel/banner/{{ $banners->id }}" method="POST" enctype="multipart/form-data">
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
                        <label class="form-label">Title</label>
                        <input type="text" name="title" class="form-control" value="{{ $banners->title  ?? old('title') }}"
                            placeholder="">
                        {{-- <small class="form-text text-muted">Please enter your full name</small> --}}
                    </div>

                    <div class="form-group">
                        <label class="form-label">Short description</label>
                        <input type="text" name="subtitle" class="form-control" value="{{ $banners->subtitle ?? old('subtitle') }}">
                        {{-- <small class="form-text text-muted">Please enter your full name</small> --}}
                    </div>

                    <div class="form-group">
                        <label class="form-label">URL</label>
                        <input type="text" name="link" class="form-control" value="{{ $banners->link ?? old('link') }}">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Label</label>
                        <input type="text" name="name" class="form-control" value="{{ $banners->name ?? old('name') }}">
                    </div>

                   
                    <div class="form-group">
                        <div class="fallback">
                            <input type="file" name="photo" accept="image/*" class="form-control"
                                id="profile-image-input" accept="image/*" />
                        </div>
                        <img src="{{ asset('storage/banners/' . $banners->photo) }}" id="profile-imgsrc" class="img-responsive  mt-2" style="height:200px;">

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


<div class="grid grid-cols-12 gap-6 mt-5">
    <div class="intro-y col-span-12 box p-5 ">
        <form action="/panel/banner/{{ $banners->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <strong> {{ __("Created.") }} </strong>
                {{ $banners->created_at }}
            </div>

            <div class="mb-3">
                <label> Titre</label>
                <input type="text" name="title" value="{{ $banners->title }}" class="input w-full border mt-2" >
            </div>

            <div class="mb-3">
                <label> short description </label>
                <input type="text" name="subtitle" value="{{ $banners->subtitle }}" class="input w-full border mt-2" >
            </div>

            <div class="mb-3">
                <label> URL  </label>
                <input type="text" name="link" value="{{ $banners->link }}" class="input w-full border mt-2" >
            </div>
            <div class="mb-3">
                <label> Label  </label>
                <input type="text" name="name" value="{{ $banners->name }}" class="input w-full border mt-2" >
            </div>


            <div class="mb-3">
                <label> color </label>
                <div class="mb-4 ">
                    <select name="color" class="select2 w-full border mt-2">
                        <option value="linear-gradient(to top, rgba(7, 78, 162, 0.8), rgba(255, 255, 255, 0))" {{ $banners->color == "linear-gradient(to top, rgba(7, 78, 162, 0.8), rgba(255, 255, 255, 0))" ? "selected" : "" }}>Primary
                            
                        </option>
                        <option value="linear-gradient(to top, rgba(255, 153, 68, 0.8), rgba(255, 255, 255, 0))"
                        {{ $banners->color == "linear-gradient(to top, rgba(255, 153, 68, 0.8), rgba(255, 255, 255, 0))" ? "selected" : "" }}
                        >
                            Secondary</option>
                        <option value="linear-gradient(to top, rgba(223, 159, 0, 0.8), rgba(255, 255, 255, 0))"
                        {{ $banners->color == "linear-gradient(to top, rgba(223, 159, 0, 0.8), rgba(255, 255, 255, 0))" ? "selected" : "" }}
                        >Third
                        </option>
                        <option value="linear-gradient(to top, rgba(40, 44, 62, 0.8), rgba(255, 255, 255, 0))"
                        {{ $banners->color == "linear-gradient(to top, rgba(40, 44, 62, 0.8), rgba(255, 255, 255, 0))" ? "selected" : "" }}
                        
                        >Forth
                        </option>
                        <select>
                </div>
            </div>

            <div class="mb-3">
                <label> Style Button </label>
                <div class="mb-4 ">
                    <select name="type_btn" class="select2 w-full border mt-2">
                        <option value="PRIMARY" {{ $banners->type_btn == "PRIMARY" ? "selected" : "" }}>Primary</option>
                        <option value="SECONDARY" {{ $banners->type_btn == "SECONDARY" ? "selected" : "" }}>Secondary</option>
                        <select>
                </div>
            </div>

            <div class="mb-3">
                <label> Type Banners </label>
                <div class="mb-4 ">
                    <select name="type_banner" class="select2 w-full border mt-2">
                        <option value="All" {{ $banners->type_banner == "All" ? "selected" : "" }}>alle</option>
                        <option value="Home" {{ $banners->type_banner == "Home" ? "selected" : "" }}>Home</option>
                        <option value="Bildung" {{ $banners->type_banner == "Bildung" ? "selected" : "" }}>Bildung</option>
                        <option value="Erziehung" {{ $banners->type_banner == "Erziehung" ? "selected" : "" }}>Erziehung</option>
                    <select>
                </div>
            </div>

            

            <div class="mb-3">
                
                    <img src="{{ asset('storage/banners/' . $banners->photo) }}" alt="..." class="box mb-3" id="logo" style="max-height: 100px" />
                <label> Banner Image ( JPG / PNG ) </label>
                <input type="file" name="photo" id="inputLogo" class="input w-full border mt-2" accept="image/*">
            </div>

            <div class="mb-3">
                <label> Status </label>
                <input type="checkbox" id="status" name="status" checked>
            </div>
           
            <button type="submit" class="button bg-theme-1 text-white mt-5"> {{ __('Save') }} </button>
        </form>
    </div>
</div>









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


