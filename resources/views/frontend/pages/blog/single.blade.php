@extends('frontend.layouts.app')

@section('metatags')
    <meta name="description"
        content="{{ $post->meta_description !== null ? $post->meta_description : htmlspecialchars(trim(substr(strip_tags($post->description), 0, 150))) }}" />
    <meta name="keywords" content="{{ $post->meta_keywords !== null ? $post->meta_keywords : 'Space, Casablanca' }}" />
    <meta name="copyright" content="taillislabs.com">
    <meta name="url" content="{{ route('showBlog', [$post->slug]) }}">
    <meta name="identifier-URL" content="{{ route('showBlog', [$post->slug]) }}">

    <meta itemprop="image" content="{{ asset('/storage/app/public/posts/' . $post->image) }}" />
    <meta property="og:image" itemprop="image/*" content="{{ asset('/storage/app/public/posts/' . $post->image) }}" />
    <meta property="og:image:width" content="256" />
    <meta property="og:image:height" content="256" />
    <meta property="og:site_name" content="taillislabs.com" />

@endsection
@section('title', $post->meta_title !== null ? $post->meta_title : $post->title)


@section('content')


    <div class="breadcrumb__wrapper">
        <div class="container">
            <div class="breadcrumb__wrapper--content">
                <h1>
                    {{ $post->title }}
                </h1>
                <p class="short">{{ $post->short }}</p>
            </div>
        </div>
    </div>


    <section class="news__area section--small page__area">
        <div class="container">
            <div class="news__area--single">
                <div class="news__area--head ">
                    @if ($post->image && Storage::disk('public')->exists('posts/' . $post->image))
                        <img src="{{ asset('/storage/posts/' . $post->image) }}" class="" alt="" />
                    @endif
                    <div class="row">
                        <div class="category">
                            @foreach ($post->collections as $category)
                                <a style="text-decoration: none" href="{{ route('postByCategory', $category->slug) }}"
                                    class="icon-link mr-3">
                                    {{ $category->name }}
                                </a>
                            @endforeach
                        </div>
                        <div class="date">{{ $post->created_at->toFormattedDateString() }}</div>

                    </div>
                </div>

                <div class="news__area--body">
                    {{-- <h3 class="news__area--body--title">
                        {{ $post->title }}
                    </h3> --}}


                    <div class="p__main p-top-20 p-bottom-20">
                        {!! $post->body !!}
                    </div>


                </div>

                @if (isset($post->previous) || isset($post->next))
                    <div class="news__area--nextPrev">
                        @if (isset($post->previous))
                            <div class="item">
                                <a class="a" href="{{ route('showBlog', [$post->previous->slug]) }}">
                                    <span class="ri-arrow-left-line ri-lg"></span>
                                    <p>
                                        {{ $post->previous->title }}
                                    </p>

                                </a>
                            </div>
                        @endif
                        @if (isset($post->next))
                            <div class="item">
                                <a class="a " href="{{ route('showBlog', [$post->next->slug]) }}">
                                    <span class="ri-arrow-right-line ri-lg"></span>
                                    <p>
                                        {{ $post->next->title }}

                                    </p>
                                </a>

                            </div>
                        @endif
                    </div>
                @else
                @endif
            </div>
        </div>
    </section>



@endsection



@section('styles')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/prism/1.22.0/themes/prism.min.css" rel="stylesheet" />
    {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/prism/1.22.0/plugins/unescaped-markup/prism-unescaped-markup.min.css" rel="stylesheet" /> --}}

@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.22.0/prism.min.js"></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.22.0/plugins/unescaped-markup/prism-unescaped-markup.min.js"></script> --}}
@endsection
