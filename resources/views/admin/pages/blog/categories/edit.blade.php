
@extends('admin.layouts.app')
@section('title', __('edit Category'))

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


    <form action="{{ route('admin.collection.update', $category->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Edit</h5>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label class="form-label">Parent</label>
                            <select class="form-control" data-trigger name="parent_id" id="choices-single-default">
                                <option value="0" >Parent</option>
                                @foreach ($categories as $cat)
                                <option value="{{ $cat->id }}" @if( (old('parent_id') ?? $category->parent_id ) == $cat->id ) selected @endif > {{ $cat->name }} </option>
                                @endforeach
                            </select>
                            
                        </div>
                        <div class="form-group">
                            <label class="form-label">Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Enter full name" value="{{ old('name') ?? $category->name }}">
                        </div>
                       

                      
                        <div class="form-group">
                            <div class="fallback">
                                <input type="file" name="image" accept="image/*" class="form-control" id="profile-image-input"
                                    accept="image/*" />
                            </div>
                            <img src="{{asset('/storage/app/public/categoriePost/'.$category->image)}}" id="profile-imgsrc" class="img-responsive  mt-2" style="height:200px;">

                        </div>

                      

                        <div class="form-group">
                            <div class="form-check form-switch custom-switch-v1 mb-2">
                                <input type="checkbox" name="status" class="form-check-input input-light-primary" id="customswitchlightv1-1" value="ENABLE" checked>
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



    <script src="/admin/js/plugins/tinymce/tinymce.min.js"></script>
    <script src="/admin/js/plugins/choices.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var genericExamples = document.querySelectorAll('[data-trigger]');
            for (i = 0; i < genericExamples.length; ++i) {
                var element = genericExamples[i];
                new Choices(element, {
                    placeholderValue: 'This is a placeholder set in the config',
                    searchPlaceholderValue: 'This is a search placeholder'
                });
            }
        });

        tinymce.init({
            height: '400',
            selector: '#pc-tinymce',
            content_style: 'body { font-family: "Inter", sans-serif; }',
            menubar: false,
            toolbar: [
                'styleselect fontselect fontsizeselect',
                'undo redo | cut copy paste | bold italic | link image | alignleft aligncenter alignright alignjustify',
                'bullist numlist | outdent indent | blockquote subscript superscript | advlist | autolink | lists charmap | print preview |  code'
            ],
            plugins: 'advlist autolink link image lists charmap print preview code'
        });
    </script>
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
    {{-- <script src="/admin/js/plugins/dropzone-amd-module.min.js"></script>
  <script src="/admin/js/dropzone.js"></script> --}}



@endsection





