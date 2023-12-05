@extends('frontend.layouts.app')

@section('title', 'Software artistry at its finest')

@section('metatags')
<meta name="description"
content="Taillis Labs est une entreprise de conseil en transformation numérique et de création de solutions digitales qui répondent parfaitement à vos problématiques d’entreprise et qui vous aide à faire face à tous les défis qui peuvent apparaître au cours de votre évolution numérique." />
<meta name="keywords"
content="" />
<meta name="copyright" content="deeplake.finance" />
<meta name="url" content="deeplake.finance" />
<meta name="identifier-URL" content="deeplake.finance" />

<meta itemprop="image" content="/assets/images/meta.jpg" />
<meta property="og:image" itemprop="image/*" content="/assets/images/meta.jpg" />
<meta property="og:image:width" content="256" />
<meta property="og:image:height" content="256" />
<meta property="og:site_name" content="deeplake.finance" />


@endsection

@section('content')

@include('frontend/components/hero')
    @include('frontend/components/services')
    @include('frontend/components/showcases')
    @include('frontend/components/clients')
    @include('frontend/components/counter')
    @include('frontend/components/contact')
    
    {{-- @include('frontend/components/clients') --}}
    
    
    {{-- @include('frontend/components/counter') --}}
    
    {{-- @include('frontend/components/contact') --}}
@endsection

@section('scripts')

@endsection
