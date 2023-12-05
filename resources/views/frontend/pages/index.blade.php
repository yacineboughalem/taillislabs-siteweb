@extends('frontend.layouts.app')

@section('title', 'Bitcoin DeFi')

@section('metatags')
<meta name="description"
content="Deep Lake is a blockchain API platform which provides the tools for developers to easily plug into Layer 1 Bitcoin and utilize native BTC in smart contracts." />
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
