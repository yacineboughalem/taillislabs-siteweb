@extends('admin.layouts.app')
@section('title', __('admins'))

@section('content')

    @if ($errors->any())
        <div class="rounded-md flex items-center px-5 py-4 mb-2 bg-theme-31 text-theme-6"> <i data-feather="alert-octagon"
                class="w-6 h-6 mr-2"></i>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 box p-5 ">
            <form method="POST" action="{{ route('admin.tag.update', $tag->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="grid grid-cols-12 gap-6 mt-5">
                    <div class="intro-y col-span-12 box p-5 ">


                        <div class="mb-3">
                            <label> Tag name </label>
                            <input type="text" name="name" value="{{ $tag->name }}" required
                                class="input w-full border mt-2">
                        </div>

                        <button type="submit" class="button bg-theme-1 mt-10 text-white w-full	"> {{ __('Save') }}
                        </button>


                    </div>

                </div>

            </form>
        </div>
    </div>
@endsection






@push('scripts')
    <!-- validation -->
    <script src="{{ asset('backend/plugins/jquery-validation/jquery.validate.js') }}"></script>
    <!-- Custom Js -->
    <script src="{{ asset('backend/js/pages/forms/form-validation.js') }}"></script>


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

@endpush
