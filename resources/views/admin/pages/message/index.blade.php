@extends('admin.layouts.app')
@section('title', __('Messages') )

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

@if(session()->has('message'))
    <div class="rounded-md flex items-center px-5 py-4 mb-2 bg-theme-18 text-theme-9"> <i data-feather="alert-triangle" class="w-6 h-6 mr-2"></i> {{ session()->get('message') }} </div>
@endif

<div class="row">
  <!-- [ sample-page ] start -->
  <div class="col-sm-12">
      <div class="card table-card">
          <div class="card-body">
              
              <div class="table-responsive">
                  <table class="table table-hover" id="pc-dt-simple">
                      <thead>
                          <tr>
                              <th>Infos</th>
                              <th>Subject</th>
                              <th>Date</th>
                          </tr>
                      </thead>
                      <tbody>
                        @foreach ($messages as $message)
                              <tr>
                                  <td>
                                    {{$message->name}} <br>
                                    {{$message->email}} <br>
                                    {{$message->phone}}
                                  </td>
                                  <td>{{$message->subject}} </td>
                                  <td>{{$message->reason}} </td>
                                  <td>{{$message->created_at}} </td>

                              </tr>
                          @endforeach

                      </tbody>
                  </table>
              </div>
          </div>
      </div>
  </div>
</div>

@endsection
