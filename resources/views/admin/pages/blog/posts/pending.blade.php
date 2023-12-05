@extends('admin.layouts.app')
@section('title', __('admins'))

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
<div class="intro-y flex flex-col sm:flex-row items-center mt-8">
    <h2 class="text-lg font-medium mr-auto">
        Posts
    </h2>
    <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
        <a href="{{route('admin.post.create')}}" class="button text-white bg-theme-1 shadow-md mr-2"> {{ __("Add") }} </a>
    </div>
</div>





<div class="intro-y datatable-wrapper box p-5 mt-5">
    <table class="table table-report table-report--bordered display datatable w-full">
        <thead>
            <tr class="bg-gray-100 rounded">
                <th class="order-b-2 whitespace-no-wrap">#</th>
                <th class="order-b-2 whitespace-no-wrap text-left">Image</th>
                <th class="order-b-2 whitespace-no-wrap">Title</th>
                <th class="order-b-2 whitespace-no-wrap">visibility</th>
                <th class="order-b-2 whitespace-no-wrap">Is Approved</th>
                <th class="order-b-2 whitespace-no-wrap">Status</th>
                <th class="order-b-2 whitespace-no-wrap">Created At</th>
                <th class="order-b-2 whitespace-no-wrap text-right">Action</td>
            </tr>
        </thead>
        <tbody>
            @foreach( $posts as $key => $post )
            <tr class="hover:bg-gray-200">
                    <td>{{$post->id}}</td>

                    <td class="border-b ">
                        <div class="flex sm:justify-start">
                            @if(Storage::disk('public')->exists('posts/'.$post->image))
                            <div class="intro-x w-10 h-10 image-fit">
                                <img alt="" class="rounded-full" src="{{asset('/storage/app/public/posts/'.$post->image)}}" alt="{{$post->title}}" >
                            </div>
                            @else 
                            <div class="intro-x w-10 h-10 image-fit">
                                <img alt="" class="rounded-full" src="/notfound.jpg">
                            </div>
                            @endif
                        </div>
                    </td>
                    {{-- <td><img src="{{asset('/storage/app/public/depliants/'.$image[0])}}" width="40px" height="40px"></td> --}}
                    <td class="border-b">{{$post->title}}</td>

                    <td class="border-b">{{$post->view_count}}</td>
                    
                 
                    
                    
                    <td class="border-b">
                        <a href="{{route('admin.post.approve',$post->id)}}"  class="py-1 px-2 rounded-full text-xs  text-white cursor-pointer {{$post->is_approved == true ? 'bg-theme-9' : 'bg-theme-6'}}">{{$post->is_approved == true ? 'Approved' : 'Pending '}}</a>
                    </td>       
                    <td class="border-b">
                        <a href="{{url('panel/post/enable/'.$post->id)}}" class="py-1 px-2 rounded-full text-xs  text-white cursor-pointer {{$post->status == true ? 'bg-theme-9' : 'bg-theme-6'}}">{{$post->status == true ? 'Published' : 'Pending'}}</a>
                    </td>
                          
                    <td class="border-b">{{$post->created_at}}</td>
                          
    
                    <td class="text-right border-b">

                        <div class="flex sm:justify-end items-center">

                            @if($post->is_approved == false)
                            <button type="button" class="btn btn-success waves-effect" onclick="approvePost({{ $post->id }})">
                                <i class="material-icons">done</i>
                            </button>
                            <form method="post" action="{{ route('admin.post.approve',$post->id) }}" id="approval-form-{{ $post->id }}" style="display: none">
                                @csrf
                                @method('PUT')
                            </form>
                            @endif
                            <a class="flex items-center mr-3" href="{{route('admin.post.edit',$post->id)}}"> <i data-feather="check-square" class="w-4 h-4 mr-1"></i> Edit </a>
                            <a class="flex items-center text-theme-6" href="javascript:;" data-toggle="modal" data-target="#delete-confirmation-modal-{{ $post->id }}"> <i data-feather="trash-2" class="w-4 h-4 mr-1"></i> Delete </a>

                            <div class="modal" id="delete-confirmation-modal-{{ $post->id }}">
                                <form action="{{route('admin.post.destroy',$post->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                <div class="modal__content" style="position: absolute;left: 0;top: 30%;right: 0;">
                                    <div class="p-5 text-center">
                                        <i data-feather="x-circle" class="w-16 h-16 text-theme-6 mx-auto mt-3"></i> 
                                        <div class="text-3xl mt-5">Are you sure?</div>
                                        <div class="text-gray-600 mt-2">Do you really want to delete these records? This process cannot be undone.</div>
                                    </div>
                                    <div class="px-5 pb-8 text-center">
                                        <button type="button" data-dismiss="modal" class="button w-24 border text-gray-700 mr-1">Cancel</button>
                                        <button type="submit" class="button w-24 bg-theme-6 text-white">Delete</button>
                                    </div>
                                </div>
                                </form>
                            </div>
                        </div>

                    </td>

                </tr>
            @endforeach
        </tbody>
    </table>
</div>









    @endsection



    @push('scripts')
    
        <script>
            function deletedepliant(id){
                
                swal({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.value) {
                        document.getElementById('del-depliant-'+id).submit();
                        swal(
                        'Deleted!',
                        'depliant has been deleted.',
                        'success'
                        )
                    }
                })
            }
        </script>
    
    
    @endpush