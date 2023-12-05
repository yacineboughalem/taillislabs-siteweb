@extends('admin.layouts.app')
@section('title', __('Posts'))

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


    <div class="row">
        <!-- [ sample-page ] start -->
        <div class="col-sm-12">
            <div class="card table-card">
                <div class="card-body">
                    <div class="text-end p-4 pb-0">
                        <a href="{{ route('admin.post.create') }}" class="btn btn-primary">
                            <i class="ti ti-plus f-18"></i> Add Post
                        </a>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover" id="pc-dt-simple">
                            <thead>
                                <tr>
                                    <th class="text-start">Actions</th>
                                    <th>Name</th>
                                    <th>Category</th>
                                    <th>Is Approved</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($posts as $key => $post)
                                    <tr>
                                        <td class="text-start">
                                            <ul class="list-inline me-auto mb-0">
                                                <li class="list-inline-item align-bottom" data-bs-toggle="tooltip"
                                                    title="Edit">
                                                    <a href="{{ route('admin.post.edit', $post) }}"
                                                        class="avtar avtar-xs btn-link-success btn-pc-default">
                                                        <i class="ti ti-edit-circle f-18"></i>
                                                    </a>
                                                </li>
                                                <li class="list-inline-item align-bottom" data-bs-toggle="tooltip"
                                                    title="Delete">
                                                    <form id="delete_from_{{ $post->id }}" method="POST"
                                                        action="{{ route('admin.post.destroy', $post) }}">
                                                        @csrf @method('DELETE')
                                                        <a href="javascript:void(0);" data-id="{{ $post->id }}"
                                                            class="_delete_data avtar avtar-xs btn-link-danger btn-pc-default">
                                                            <i class="ti ti-trash f-18"></i>
                                                        </a>
                                                    </form>
                                                </li>
                                            </ul>
                                        </td>

                                        <td>
                                            <div class="row align-center">
                                                <div class="col-auto pe-0">
                                                    <img src="{{ asset('storage/posts/' . $post->image) }}" alt="user-image"
                                                        class="wid-40 rounded">
                                                </div>
                                                <div class="col">
                                                    <h6 class="mb-1">{{ $post->title }}</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            @foreach ($post->collections as $key => $category)
                                            {{ $category->name }} /
                                        @endforeach
                                        </td>
                                        <td class="border-b">
                                            <a href="{{ route('admin.post.approve', $post->id) }}"
                                                class="py-1 px-2 rounded-full text-xs  cursor-pointer {{ $post->is_approved == true ? 'bg-theme-9' : 'bg-theme-6' }}">{{ $post->is_approved == true ? 'Approved' : 'Pending ' }}</a>
                                        </td>
                                        <td class="border-b">
                                            <a href="{{ route('admin.post.enable', $post->id) }}"
                                                class="py-1 px-2 rounded-full text-xs  cursor-pointer {{ $post->status == true ? 'bg-theme-9' : 'bg-theme-6' }}">{{ $post->status == true ? 'Published' : 'Pending' }}</a>
                                        </td>

                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- <button type="submit" class="btn btn-success btn-flat" onclick="deleteRow(event)"><i class="far fa-check-circle"></i> Save Changes</button> --}}

@endsection

@section('javascript')

    <script src="/admin/js/plugins/sweetalert2.all.min.js"></script>
    <script src="/admin/js/plugins/ac-alert.js"></script>

    <script src="/admin/js/plugins/simple-datatables.js"></script>
    <script>
        const dataTable = new simpleDatatables.DataTable('#pc-dt-simple', {
            sortable: false,
            perPage: 10
        });
    </script>

@endsection
