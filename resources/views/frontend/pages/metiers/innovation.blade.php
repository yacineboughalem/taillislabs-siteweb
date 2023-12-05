@extends('frontend.layouts.app')


@section('metatags')

    <meta name="description"
    content="Taillis Labs est une entreprise de conseil en transformation numérique et de création de solutions digitales qui répondent parfaitement à vos problématiques d’entreprise et qui vous aide à faire face à tous les défis qui peuvent apparaître au cours de votre évolution numérique." />
    <meta name="keywords" content="" />
    <meta name="copyright" content="taillislabs.com" />
    <meta name="url" content="taillislabs.com" />
    <meta name="identifier-URL" content="taillislabs.com" />

    <meta itemprop="image" content="https://taillislabs.com/logo2.png" />
    <meta property="og:image" itemprop="image/*" content="https://taillislabs.com/logo2.png" />
    <meta property="og:image:width" content="256" />
    <meta property="og:image:height" content="256" />
    <meta property="og:site_name" content="Taillis Labs" />
@endsection
@section('title', __('taillis.serviceInnovationTitle'))


@section('styles')

@endsection


@section('content')


    <section class="breadcrumb__wrapper">
        <img src="/assets/images/shap01.svg" class="shap01" />
        {{-- <img src="/assets/images/shaps/shap--left-01.svg" class="shap--left-01-s2" /> --}}
        <div class="container">
            <div class="breadcrumb__wrapper--content2">
                <h1>
                    {{ __('taillis.serviceInnovationTitle') }}
                </h1>
            </div>

            <div class="media__center">
                <img src="/assets/images/services/innovation/innovation01.svg" alt=""
                    class="width-60-100 p-top-20 wow animate__animated animate__zoomInUp" data-wow-duration="1.5s" data-wow-delay=".2">
            </div>
        </div>
    </section>


    <section class="block__center c-section p-top-120">
        <img src="/assets/images/shaps/shap_plus.svg" class="shap--plus" alt="" />
        <img src="/assets/images/shaps/shap--left-01.svg" class="shap--left-01" />

        <div class="container">

            <div class="heading__primary p-bottom-80">
                <h2 class="wow" data-splitting="">
                    <span class="color"> {{ __('taillis.innovationT2') }}</span>
                </h2>
            </div>

            <div class="content">
                <p class="p__white">
                    {{ __('taillis.innovationP1') }}
                </p>
                <p class="p__white">
                    {{ __('taillis.innovationP2') }}
                </p>
            </div>
            <div class="media__center">
                <img src="/assets/images/services/innovation/innovation02.svg" alt=""
                    class="width-60-100 p-top-80 wow animate__animated animate__zoomInUp" data-wow-duration="1.5s" data-wow-delay=".2">
            </div>

        </div>
    </section>



    <div class="section__cards section--medium bg-03">
        <div class="container">

            <div class="heading__primary p-bottom-80">
                <h2 class="wow" data-splitting="">
                    <span class="color"> {{ __('taillis.innovationStepTitle') }}</span>
                </h2>
            </div>
            <div class="row  p-bottom-80 wow animate__animated animate__fadeInLeftBig" data-wow-duration="1.5s" data-wow-delay=".2">
                <div class="section__cards--item">
                    <img src="/assets/images/services/innovation/i-1.svg" alt="" />
                    <div class="section__cards--item--content">
                        <h3>{{ __('taillis.innovationStep1T') }}</h3>
                        <p>{{ __('taillis.innovationStep1P') }}</p>
                    </div>
                </div>

                <div class="section__cards--item">
                    <img src="/assets/images/services/innovation/i-2.svg" alt="" />
                    <div class="section__cards--item--content">
                        <h3>{{ __('taillis.innovationStep2T') }}</h3>
                        <p>{{ __('taillis.innovationStep2P') }}</p>
                    </div>
                </div>

                <div class="section__cards--item">
                    <img src="/assets/images/services/innovation/i-3.svg" alt="" />
                    <div class="section__cards--item--content">
                        <h3>{{ __('taillis.innovationStep3T') }}</h3>
                        <p>{{ __('taillis.innovationStep3P') }}</p>
                    </div>
                </div>
            </div>
            <div class="m-top-100"></div>

            <div class="heading__primary p-bottom-80">
                <h2 class="wow" data-splitting="">
                    {{ __('taillis.innovationHisT1') }}<br />
                            {{ __('taillis.innovationHisT2') }}
                </h2>
            </div>
                    
            <div class="row--1">

                <div class="item  wow animate__animated animate__fadeInLeftBig" data-wow-duration="1.5s" data-wow-delay=".2">
                    <h3> {{ __('taillis.innovationHis1T') }}</h3>
                    <ul>
                        <li>{{ __('taillis.innovationHis1P1') }}</li>
                        <li>{{ __('taillis.innovationHis1P2') }}</li>
                        <li>{{ __('taillis.innovationHis1P3') }}</li>
                    </ul>
                </div>

                <div class="item  wow animate__animated animate__fadeInLeftBig" data-wow-duration="1.5s" data-wow-delay=".2">
                    <h3>{{ __('taillis.innovationHis2T') }}</h3>
                      
                <ul>
                    <li>{{ __('taillis.innovationHis2P1') }}</li>
                    <li>{{ __('taillis.innovationHis2P2') }}</li>
                    <li>{{ __('taillis.innovationHis2P3') }}</li>
                    <li>{{ __('taillis.innovationHis2P4') }}</li>
                    <li>{{ __('taillis.innovationHis2P5') }}</li>
                </ul>
                </div>

                <div class="item  wow animate__animated animate__fadeInLeftBig" data-wow-duration="1.5s" data-wow-delay=".2">
                    <h3>{{ __('taillis.innovationHis3T') }}</h3>
                    <ul>
                        <li>{{ __('taillis.innovationHis3P1') }}</li>
                        <li>{{ __('taillis.innovationHis3P2') }}</li>
                        <li>{{ __('taillis.innovationHis3P3') }}</li>
                        <li>{{ __('taillis.innovationHis3P4') }}</li>
                        <li>{{ __('taillis.innovationHis3P5') }}</li>
                        <li>{{ __('taillis.innovationHis3P6') }}</li>
                        <li>{{ __('taillis.innovationHis3P7') }}</li>
                    </ul>
                </div>

                

              

                
                
              
                 
                </div>
            </div>

        </div>
    </div>



    @include('frontend/components/verticals')
    @include('frontend/components/clients')
    @include('frontend/components/contact')
@endsection
