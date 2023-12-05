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
@section('title', '404')

@section('content')

    <div class="page__area">
        <div class="breadcrumb__wrapper">
            <div class="container">
                <div class="breadcrumb__wrapper--content">
                    <h1>
                        Page Not Found - 404
                    </h1>
                </div>
            </div>
        </div>




@endsection

