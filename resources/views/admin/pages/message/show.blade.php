@extends('admin.layouts.app')
@section('title', __('Message') )

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

<div class="grid grid-cols-12 gap-6 mt-5">
    <div class="col-span-12 box px-5 pt-5 mt-5">
        <div class="flex flex-col lg:flex-row border-b border-gray-200 pb-5 ">
            <div class="flex flex-1 px-5 items-center justify-center lg:justify-start">
                <div class="ml-5">
                    <div class="w-24 sm:w-40 truncate sm:whitespace-normal font-medium text-lg"> {{ $message->name }} </div>
                </div>
            </div>
            <div class="flex mt-6 lg:mt-0 items-center lg:items-start flex-1 flex-col justify-center text-gray-600 px-5 border-l border-r border-gray-200 border-t lg:border-t-0 pt-5 lg:pt-0">
                <div class="truncate sm:whitespace-normal flex items-center"> <i data-feather="mail" class="w-4 h-4 mr-2"></i> {{ $message->email }} </div>
                <div class="truncate sm:whitespace-normal flex items-center mt-3"> <i data-feather="phone" class="w-4 h-4 mr-2"></i> {{ $message->phone }} </div>
            </div>
        </div>
    </div>
    <div class="col-span-12 box p-8 mt-5" >
        <h1 class="m-5 font-bold text-lg"> {{ $message->subject }} </h1>
        <div class="box p-5 my-5 ">
            {{ $message->body }}
        </div>
    </div>
</div>
@endsection
