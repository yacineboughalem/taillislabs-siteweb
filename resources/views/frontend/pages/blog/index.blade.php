@extends('frontend.layouts.app')

@section('metatags')
    <meta name="description"
        content="Taillis Labs est une entreprise de conseil en transformation numérique et de création de solutions digitales qui répondent parfaitement à vos problématiques d’entreprise et qui vous aide à faire face à tous les défis qui peuvent apparaître au cours de votre évolution numérique." />
    <meta name="keywords" content="" />
    <meta name="copyright" content="taillislabs.com" />
    <meta name="url" content="/" />
    <meta name="identifier-URL" content="/" />

    <meta itemprop="image" content="/assets/images/meta.jpg" />
    <meta property="og:image" itemprop="image/*" content="/assets/images/meta.jpg" />
    <meta property="og:image:width" content="256" />
    <meta property="og:image:height" content="256" />
    <meta property="og:site_name" content="taillislabs.com" />

@endsection
@section('title', 'Blog')

@section('content')

    <div class="breadcrumb__wrapper">
        <img src="/assets/images/shap01.svg" class="shap01" />
        <div class="container">
            <div class="breadcrumb__wrapper--content">
                <h1>
                    BLOG
                </h1>
                <p class="short">
                    {{ __('taillis.blogT1')}}
                </p>
                <p class="details">{{ __('taillis.blogT2')}}</p>
            </div>
        </div>
    </div>


    <section class="news__area page__area section--small">
        <div class="container">

            @if (count($postss) != 0)
                <div class="blog--grid">
                    @foreach ($postss as $post)
                        <div class="news__area--item">
                            <div class="row">

                                <div class="category">
                                    @foreach ($post->collections as $category)
                                        <a style="text-decoration: none"
                                            href="{{ route('postByCategory', $category->slug) }}" class="icon-link mr-3">
                                            {{ $category->name }}
                                        </a>
                                    @endforeach
                                </div>
                                <div class="date">{{ $post->created_at->toFormattedDateString() }}</div>

                            </div>

                            <a href="{{ route('showBlog', [$post->slug]) }}">
                                <h2>{{ $post->title }}</h2>
                                <p>{{ $post->short }}</p>
                            </a>
                            <a href="{{ route('showBlog', [$post->slug]) }}" class="fronty--btn primary--link">
                                <span>Read More</span>
                                <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 16 16"
                                    height="32" width="32" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z">
                                    </path>
                                </svg>
                            </a>

                        </div>
                    @endforeach
                </div>
            @endif

        </div>
    </section>



@endsection

@section('scripts')

@endsection
