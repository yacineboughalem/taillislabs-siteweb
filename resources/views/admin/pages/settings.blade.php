@extends('admin.layouts.app')
@section('title', __('Settings') )

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

    <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    
                    <div class="card-body">
                        
                        <div class="form-group">
                            <label class="form-label">Name</label>
                            <input type="text" name="name" class="form-control" value="{{ old('name') ?? @$data->name }}">
                        </div>

                      

                        <div class="form-group">
                            <label class="form-label">Address</label>
                            <textarea class="form-control" name="address">{{ old('address') ?? @$data->address }}</textarea>
                        </div>

                        <div class="form-group">
                            <label class="form-label">footer</label>
                            <textarea class="form-control" name="footer">{{ old('footer') ?? @$data->footer }}</textarea>
                        </div>

                        <div class="form-group">
                            <label class="form-label">head_script</label>
                            <textarea class="form-control" name="head_script">{{ old('head_script') ?? @$data->head_script }}</textarea>
                        </div>

                        <div class="form-group">
                            <label class="form-label">body_script</label>
                            <textarea class="form-control" name="body_script">{{ old('body_script') ?? @$data->body_script }}</textarea>
                        </div>


                        <div class="form-group">
                            <div class="fallback">
                                <input type="file" name="logo" accept="image/*" class="form-control" id="profile-image-input"
                                    accept="image/*" />
                            </div>
                            @if( @$data->logo )
                            <img src="{{$data->logo}}"  class="img-responsive  mt-2" style="height:200px;">
                            @endif
                            <img src="" id="profile-imgsrc" class="img-responsive  mt-2" style="height:200px;">


                        </div>

                        


                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h5>Infos</h5>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label class="form-label">whatsapp</label>
                            <input type="text" name="whatsapp" class="form-control" value="{{ old('whatsapp') ?? @$data->whatsapp }}">
                        </div>
                        <div class="form-group">
                            <label class="form-label">phone_first</label>
                            <input type="text" name="phone_first" class="form-control" value="{{ old('phone_first') ?? @$data->phone_first }}">
                        </div>
                        <div class="form-group">
                            <label class="form-label">phone_second</label>
                            <input type="text" name="phone_second" class="form-control" value="{{ old('phone_second') ?? @$data->phone_second }}">
                        </div>
                        <div class="form-group">
                            <label class="form-label">email</label>
                            <input type="email" name="emails" class="form-control" value="{{ old('emails') ?? @$data->emails }}">
                        </div>

                        <div class="form-group">
                            <label class="form-label">facebook</label>
                            <input type="text" name="facebook" class="form-control" value="{{ old('facebook') ?? @$data->facebook }}">
                        </div>
                        <div class="form-group">
                            <label class="form-label">instagram</label>
                            <input type="text" name="instagram" class="form-control" value="{{ old('instagram') ?? @$data->instagram }}">
                        </div>
                        <div class="form-group">
                            <label class="form-label">linkedin</label>
                            <input type="text" name="linkedin" class="form-control" value="{{ old('linkedin') ?? @$data->linkedin }}">
                        </div>
                        <div class="form-group">
                            <label class="form-label">youtube</label>
                            <input type="text" name="youtube" class="form-control" value="{{ old('youtube') ?? @$data->youtube }}">
                        </div>
                        <div class="form-group">
                            <label class="form-label">twitter</label>
                            <input type="text" name="twitter" class="form-control" value="{{ old('twitter') ?? @$data->twitter }}">
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