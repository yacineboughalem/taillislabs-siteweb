@extends('frontend.layouts.app')

@section('metatags')
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="copyright" content="Yacine Boughalem">
    <meta name="url" content="/about-us">
    <meta name="identifier-URL" content="/about-us">

    <meta itemprop="image" content="/assets/images/logo.svg" />
    <meta property="og:image" itemprop="image/*" content="/assets/images/logo.svg" />
    <meta property="og:image:width" content="256" />
    <meta property="og:image:height" content="256" />
    <meta property="og:site_name" content="Edusynergy" />

@endsection
@section('title', 'Über uns')

@section('content')

    <div class="labs--breadcrumb--area" style="background-image: linear-gradient(to right,
        rgba(52, 59, 116, 0.52) , rgba(224, 159, 0, .52)),url('/assets/images/bunte--img--7.jpg');">
        <div class="container">
            <div class="labs--breadcrumb--area--content m-top-50">
                <h1 class="p-top-10 wow animated bounceInLeft" data-wow-duration="1.5s" data-wow-delay=".1s">
                    Blog
                </h1>
            </div>
        </div>
          <img src="./assets/images/logo--shape.svg" class="shape--logo--01 wow animated bounceInRight"
            data-wow-duration="1.5s" data-wow-delay=".1s" />
    </div>
    @if(count($posts) !=0 )
    <section class="labs--blog--area section--40 ">
        <div class="container">

            <div>
                {{ $posts->count() }} Result for {{ $query }}
                </div>
            <div class="row  justify-content-center p-top-60">
                @if($posts->count() > 0)
                @foreach ($posts as $post)
                <div class="col-md-6">
                    <article class="blog-card">
                        <div class="blog-card__background">
                            <div class="card__background--wrapper">
                                <div class="card__background--main"
                                    style="background-image: url('{{asset('/storage/app/public/posts/'.$post->image)}}');">
                                    <div class="card__background--layer"></div>
                                </div>
                            </div>
                        </div>
                        <div class="blog-card__head">
                            <span class="date__box">
                                <span class="date__day">{{ $post->created_at->toFormattedDateString() }}</span>
                            </span>
                        </div>
                        <div class="blog-card__info">
                            <h5>{{ substr(strip_tags($post->title),0, 100) }}</h5>
                            <p>
                              @foreach($post->categories as $category)
                                <a style="text-decoration: none" href="{{ url('category',$category->slug) }}"  class="icon-link mr-3">{{ $category->name }}</a>
                              @endforeach
                            </p>
                            <p> {!! substr(strip_tags($post->description),0, 300) !!}</p>
                            <a href="{{route('showBlog',[$post->id,$post->slug])}}" class="btn btn--with-icon"><i class="btn-icon fa fa-long-arrow-right"></i>Erfahre mehr!</a>
                        </div>
                    </article>
                </div>
                @endforeach
                @endif
            </div>
        </div>

    </section>
    @else
    <section class="blog--area section p-top-20 p-bottom-40">
      <div class="container">
        <div class="row">
          <p>No Post :(</p>
        </div>
      </div>
    </section>
    @endif


    <div class="grad-bar"></div>
    @include('frontend/partials/subscribe')

@endsection

@section('scripts')

@endsection
