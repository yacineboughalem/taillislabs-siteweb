@extends('admin.layouts.app')
@section('title', __('Banners'))

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
                        <a href="{{ route('admin.banner.create') }}" class="btn btn-primary">
                            <i class="ti ti-plus f-18"></i> Add Banner
                        </a>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover" id="pc-dt-simple">
                            <thead>
                                <tr>
                                    <th class="text-start">Actions</th>
                                    <th>Title</th>
                                    <th>SubTitle</th>
                                    <th>link</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($banners as $banner)
                                    <tr>
                                        <td class="text-start">
                                            <ul class="list-inline me-auto mb-0">
                                                <li class="list-inline-item align-bottom" data-bs-toggle="tooltip"
                                                    title="Edit">
                                                    <a href="{{ route('admin.banner.edit', $banner->id) }}"
                                                        class="avtar avtar-xs btn-link-success btn-pc-default">
                                                        <i class="ti ti-edit-circle f-18"></i>
                                                    </a>
                                                </li>
                                                <li class="list-inline-item align-bottom" data-bs-toggle="tooltip"
                                                    title="Delete">
                                                    {{-- <form id="delete_from_{{ $banner->id }}" method="POST"
                                                        action="{{ route('admin.banner.destroy', $banner->id) }}">
                                                        @csrf @method('DELETE')
                                                        <a href="javascript:void(0);" data-id="{{ $banner->id }}"
                                                            class="_delete_data avtar avtar-xs btn-link-danger btn-pc-default">
                                                            <i class="ti ti-trash f-18"></i>
                                                        </a>
                                                    </form> --}}

                                                    <form id="delete_from_{{ $banner->id }}" method="POST"
                                                        action="{{ route('admin.banner.destroy', $banner) }}">
                                                        @csrf @method('DELETE')
                                                            <a href="javascript:void(0);" data-id="{{ $banner->id }}"
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
                                                    <img src="{{ asset('storage/banners/' . $banner->photo) }}"
                                                        alt="user-image" class="wid-100 rounded">
                                                </div>
                                                <div class="col">
                                                    <h6 class="mb-1">{{ $banner->title }}</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>{{ $banner->subtitle }} </td>
                                        <td>
                                            {{ $banner->link }}
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
