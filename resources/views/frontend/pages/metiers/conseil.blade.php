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
@section('title', __('taillis.serviceConsultingTitle'))

@section('styles')

@endsection


@section('content')


    <section class="breadcrumb__wrapper">
        <img src="/assets/images/shap01.svg" class="shap01" />
        {{-- <img src="/assets/images/shaps/shap--left-01.svg" class="shap--left-01-s2" /> --}}
        <div class="container">
            <div class="breadcrumb__wrapper--content2">
                <h1>
                    {{ __('taillis.serviceConsultingTitle') }}
                </h1>
            </div>

            <div class="media__center">
                <img src="/assets/images/digital-development-consulting.svg" alt=""
                    class="width-100-100 p-top-80 wow animate__animated animate__zoomInUp" data-wow-duration="1.5s"
                    data-wow-delay=".2">
            </div>
        </div>
    </section>


    <section class="block__center c-section p-top-80">
        <img src="/assets/images/shaps/shap_plus.svg" class="shap--plus" alt="" />
        <img src="/assets/images/shaps/shap--left-01.svg" class="shap--left-01" />

        <div class="container">

            <div class="heading__primary p-bottom-80">
                <h2 class="wow" data-splitting="">
                    <span> {{ __('taillis.digitalTransformationT1') }} </span><br />
                    <span class="color">{{ __('taillis.digitalTransformationT2') }}</span>
                </h2>
            </div>

            <div class="content">
                <p class="p__white">
                    {{ __('taillis.digitalTransformationP1') }}
                </p>
                <p class="p__white">
                    {{ __('taillis.digitalTransformationP2') }}
                </p>
                <p class="p__white">
                    {{ __('taillis.digitalTransformationP3') }}
                </p>
            </div>
            <div class="media__center">
                <img src="/assets/images/digital03.svg" alt=""
                    class="width-100-100 p-top-80 wow animate__animated animate__zoomInUp" data-wow-duration="1.5s"
                    data-wow-delay=".2">
            </div>

        </div>
    </section>


    <section class="block__grid section--medium  bg-03">
        <div class="container">
            <div class="heading__primary p-bottom-80">
                <h2 class="wow" data-splitting="">
                    {{ __('taillis.digitalTransformationStepTitle') }}
                </h2>
            </div>

            <div class="row-2-10 wow animate__animated animate__fadeInLeftBig" data-wow-duration="1.5s" data-wow-delay=".2">
                <div class="steps__area--img">
                    <img src="/assets/images/services/step01.svg" alt="" />
                </div>

                <div class="steps__area--content">
                    <div class="steps__area--content--head">
                        <img src="/assets/images/services/step-num1.svg" alt="" />
                        <h3>{{ __('taillis.digitalTransformationStep1T') }}</h3>
                    </div>
                    <div class="steps__area--content--short">
                        <p>{{ __('taillis.digitalTransformationStep1P') }}</p>
                    </div>
                </div>
            </div>


            <div class="row-2-10  wow animate__animated animate__fadeInRightBig" data-wow-duration="1.5s"
                data-wow-delay=".2"">
                <div class="steps__area--img">
                    <img src="/assets/images/services/step02.svg" alt="" />
                </div>
                <div class="steps__area--content">
                    <div class="steps__area--content--head">
                        <img src="/assets/images/services/step-num2.svg" alt="" />
                        <h3>{{ __('taillis.digitalTransformationStep2T') }}</h3>
                    </div>
                    <div class="steps__area--content--short">
                        <p>{{ __('taillis.digitalTransformationStep2P') }}</p>
                    </div>
                </div>
            </div>

            <div class="row-2-10  wow animate__animated animate__fadeInLeftBig" data-wow-duration="1.5s"
                data-wow-delay=".2"">
                <div class="steps__area--img">
                    <img src="/assets/images/services/step03.svg" alt="" />
                </div>
                <div class="steps__area--content">
                    <div class="steps__area--content--head">
                        <img src="/assets/images/services/step-num3.svg" alt="" />
                        <h3>{{ __('taillis.digitalTransformationStep3T') }}</h3>
                    </div>
                    <div class="steps__area--content--short">
                        <p>
                            {{ __('taillis.digitalTransformationStep3P1') }}<br />
                            {{ __('taillis.digitalTransformationStep3P2') }}<br />
                            {{ __('taillis.digitalTransformationStep3P3') }}

                        </p>
                    </div>
                </div>
            </div>

            <div class="row-2-10  wow animate__animated animate__fadeInRightBig" data-wow-duration="1.5s"
                data-wow-delay=".2"">
                <div class="steps__area--img">
                    <img src="/assets/images/services/step04.svg" alt="" />
                </div>
                <div class="steps__area--content">
                    <div class="steps__area--content--head">
                        <img src="/assets/images/services/step-num4.svg" alt="" />
                        <h3>{{ __('taillis.digitalTransformationStep4T') }}</h3>
                    </div>
                    <div class="steps__area--content--short">
                        <p>{{ __('taillis.digitalTransformationStep4P') }}</p>
                    </div>
                </div>
            </div>

            <div class="row-2-10  wow animate__animated animate__fadeInLeftBig" data-wow-duration="1.5s"
                data-wow-delay=".2"">
                <div class="steps__area--img">
                    <img src="/assets/images/services/step05.svg" alt="" />
                </div>
                <div class="steps__area--content">
                    <div class="steps__area--content--head">
                        <img src="/assets/images/services/step-num5.svg" alt="" />
                        <h3>{{ __('taillis.digitalTransformationStep5T') }}</h3>
                    </div>
                    <div class="steps__area--content--short">
                        <p>
                            {{ __('taillis.digitalTransformationStep5P') }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>




    @include('frontend/components/verticals')
    @include('frontend/components/clients')
    @include('frontend/components/contact')

@endsection
