@extends('admin.layouts.app')
@section('title', __('Admin'))

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
                        <a href="{{ route('admin.admin.create') }}" class="btn btn-primary">
                            <i class="ti ti-plus f-18"></i> Add Admin
                        </a>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover" id="pc-dt-simple">
                            <thead>
                                <tr>
                                    <th class="text-start">Actions</th>
                                    <th>Is Admin</th>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($admins as $admin)
                                    <tr>
                                        <td class="text-start">
                                            <ul class="list-inline me-auto mb-0">
                                                <li class="list-inline-item align-bottom" data-bs-toggle="tooltip"
                                                    title="Edit">
                                                    <a href="{{ route('admin.admin.edit', $admin) }}"
                                                        class="avtar avtar-xs btn-link-success btn-pc-default">
                                                        <i class="ti ti-edit-circle f-18"></i>
                                                    </a>
                                                </li>

                                                <li class="list-inline-item align-bottom" data-bs-toggle="tooltip"
                                                    title="Delete">
                                                    @if (Auth::user()->id !== $admin->id)
                                                    <form id="delete_from_{{ $admin->id }}" method="POST"
                                                        action="{{ route('admin.admin.destroy', $admin) }}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <a href="javascript:void(0);"
                                                            class="_delete_data avtar avtar-xs btn-link-danger btn-pc-default"
                                                            data-id="{{ $admin->id }}">
                                                            <i class="ti ti-trash f-18"></i>
                                                        </a>
                                                    </form>
                                                @endif
                                                </li>

                                            </ul>
                                        </td>

                                        <td>
                                            @if ($admin->is_super)
                                                <div class="font-medium whitespace-no-wrap"> <i data-feather="gitlab"></i>
                                                </div>
                                            @endif
                                        </td>

                                        <td>
                                            <div class="row align-center">
                                                <div class="col-auto pe-0">
                                                    @if ($admin->image)
                                                        <img src="{{ $admin->image->pathThumbnail }}" height="50" />
                                                    @endif
                                                </div>
                                                <div class="col">
                                                    <h6 class="mb-1">{{ $admin->name }}</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>{{ $admin->email }}</td>
                                        <td>{{ $admin->phone }}</td>

                                        <td><span
                                                class="py-1 px-2 rounded-full text-xs text-white cursor-pointer {{ $admin->is_active == true ? 'bg-green-400' : 'bg-red-500' }}">
                                                {{ $admin->is_active ? 'Active' : 'Non active' }} </span></td>


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



@section('javascript')

   

    {{-- <script>
         function deleteAdmin(adminId) {
        Swal.fire({
            title: 'Are you sure?',
            text: 'You won\'t be able to revert this!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                // Trigger form submission
                document.getElementById('deleteForm_' + adminId).submit();
            }
        });
    }
    </script> --}}

    

@endsection
