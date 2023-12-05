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

    @if (session()->has('message'))
        <div class="rounded-md flex items-center px-5 py-4 mb-2 bg-theme-18 text-theme-9"> <i data-feather="alert-triangle"
                class="w-6 h-6 mr-2"></i> {{ session()->get('message') }} </div>
    @endif
    <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            Tags
        </h2>
        <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
            <a href="{{ route('admin.tag.create') }}" class="button text-white bg-theme-1 shadow-md mr-2">
                {{ __('Add') }} </a>
        </div>
    </div>


    <!-- JQuery DataTable Css -->
    <div class="intro-y datatable-wrapper box p-5 mt-5">
        <table class="table table-report table-report--bordered display datatable w-full">
            <thead>
                <tr class="bg-gray-100 rounded">
                    <th class="order-b-2 whitespace-no-wrap">#</th>
                    <th class="order-b-2 whitespace-no-wrap">Title</th>
                    <th class="order-b-2 whitespace-no-wrap">Post Num</th>
                    <th class="order-b-2 whitespace-no-wrap text-right">Action</td>
                </tr>
            </thead>
            <tbody>

                @foreach ($tags as $key => $tag)
                    <tr class="hover:bg-gray-200">
                        <td>{{ $key + 1 }}</td>

          
                        <td class="border-b">{{ $tag->name }}</td>
                        <td class="border-b">{{ $tag->posts->count() }}</td>


                        <td class="text-right border-b">

                            <div class="flex sm:justify-end items-center">
                                <a class="flex items-center mr-3"
                                    href="{{ route('admin.tag.edit', $tag->id) }}"> <i
                                        data-feather="check-square" class="w-4 h-4 mr-1"></i> Edit </a>
                                <a class="flex items-center text-theme-6" href="javascript:;" data-toggle="modal"
                                    data-target="#delete-confirmation-modal-{{ $tag->id }}"> <i
                                        data-feather="trash-2" class="w-4 h-4 mr-1"></i> Delete </a>

                                <div class="modal" id="delete-confirmation-modal-{{ $tag->id }}">
                                    <form action="{{ route('admin.tag.destroy', $tag->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <div class="modal__content" style="position: absolute;left: 0;top: 30%;right: 0;">
                                            <div class="p-5 text-center">
                                                <i data-feather="x-circle" class="w-16 h-16 text-theme-6 mx-auto mt-3"></i>
                                                <div class="text-3xl mt-5">Are you sure?</div>
                                                <div class="text-gray-600 mt-2">Do you really want to delete these records?
                                                    This process cannot be undone.</div>
                                            </div>
                                            <div class="px-5 pb-8 text-center">
                                                <button type="button" data-dismiss="modal"
                                                    class="button w-24 border text-gray-700 mr-1">Cancel</button>
                                                <button type="submit"
                                                    class="button w-24 bg-theme-6 text-white">Delete</button>
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
        function deleteTag(id) {

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
                    document.getElementById('del-tag-' + id).submit();
                    swal(
                        'Deleted!',
                        'Tag has been deleted.',
                        'success'
                    )
                }
            })
        }
    </script>


@endpush
