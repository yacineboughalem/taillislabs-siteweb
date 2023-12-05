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
@section('title', __('taillis.softwareDevT1'))


@section('styles')

@endsection


@section('content')

    <section class="breadcrumb__wrapper">
        <img src="/assets/images/shap01.svg" class="shap01" />
        {{-- <img src="/assets/images/shaps/shap--left-01.svg" class="shap--left-01-s2" /> --}}
        <div class="container">
            <div class="breadcrumb__wrapper--content2">
                <h1>
                    {{ __('taillis.softwareDevT1') }}
                </h1>
            </div>

            <div class="media__center">
                <img cl src="/assets/images/services/logiciel/dev-log-02.svg" alt=""
                    class="width-60-100 p-top-80 wow animate__animated animate__zoomInUp" data-wow-duration="1.5s"
                    data-wow-delay=".2">
            </div>
        </div>
    </section>

    <section class="block__center c-section section--medium">
        <img src="/assets/images/shaps/shap_plus.svg" class="shap--plus" alt="" />
        <img src="/assets/images/shaps/shap--left-01.svg" class="shap--left-01" />

        <div class="container">

            <div class="heading__primary p-bottom-80">
                <h2 class="wow" data-splitting="">
                    <span class="color"> {{ __('taillis.softwareDevT2') }}</span>
                </h2>
            </div>

            <div class="content">
                <p class="p__white">
                    {{ __('taillis.softwareDevP1') }}
                </p>
            </div>
            <div class="media__center">
                <img src="/assets/images/services/logiciel/dev-log-01.svg" alt=""
                    class="p-top-80 p-bottom-80 width-60-100 wow animate__animated animate__fadeInRight"
                    data-wow-duration="1.5s" data-wow-delay=".2">
            </div>
            <div class="content">
                <p class="p__white">
                    {{ __('taillis.softwareDevP2') }}
                </p>
                <p class="p__white">
                    {{ __('taillis.softwareDevP3') }}
                </p>
            </div>

        </div>
    </section>

    <section class="block__grid section--medium  bg-03">
        <div class="container">
            <div class="heading__primary p-bottom-80">
                <h2 class="wow" data-splitting="">
                    {{ __('taillis.softwareDevStepTitle') }}
                </h2>
            </div>

            <div class="row-2-10 wow animate__animated animate__fadeInLeftBig" data-wow-duration="1.5s" data-wow-delay=".2">
                <div class="steps__area--img">
                    <img src="/assets/images/services/logiciel/log-step-01.svg" alt="" />
                </div>

                <div class="steps__area--content">
                    <div class="steps__area--content--head">
                        <img src="/assets/images/services/step-num1.svg" alt="" />
                        <h3>{{ __('taillis.softwareDevStep1T') }}</h3>
                    </div>
                    <div class="steps__area--content--short">
                        <p>{{ __('taillis.softwareDevStep1P') }}</p>
                    </div>
                </div>
            </div>


            <div class="row-2-10  wow animate__animated animate__fadeInRightBig" data-wow-duration="1.5s"
                data-wow-delay=".2"">
                <div class="steps__area--img">
                    <img src="/assets/images/services/logiciel/log-step-02.svg" alt="" />
                </div>
                <div class="steps__area--content">
                    <div class="steps__area--content--head">
                        <img src="/assets/images/services/step-num2.svg" alt="" />
                        <h3>{{ __('taillis.softwareDevStep2T') }}</h3>
                    </div>
                    <div class="steps__area--content--short">
                        <p>{{ __('taillis.softwareDevStep2P') }}</p>
                    </div>
                </div>
            </div>

            <div class="row-2-10  wow animate__animated animate__fadeInLeftBig" data-wow-duration="1.5s"
                data-wow-delay=".2"">
                <div class="steps__area--img">
                    <img src="/assets/images/services/logiciel/log-step-03.svg" alt="" />
                </div>
                <div class="steps__area--content">
                    <div class="steps__area--content--head">
                        <img src="/assets/images/services/step-num3.svg" alt="" />
                        <h3>{{ __('taillis.softwareDevStep3T') }}</h3>
                    </div>
                    <div class="steps__area--content--short">
                        <p>
                            {{ __('taillis.softwareDevStep3P') }}

                        </p>
                    </div>
                </div>
            </div>

            <div class="row-2-10  wow animate__animated animate__fadeInRightBig" data-wow-duration="1.5s"
                data-wow-delay=".2"">
                <div class="steps__area--img">
                    <img src="/assets/images/services/logiciel/log-step-04.svg" alt="" />
                </div>
                <div class="steps__area--content">
                    <div class="steps__area--content--head">
                        <img src="/assets/images/services/step-num4.svg" alt="" />
                        <h3>{{ __('taillis.softwareDevStep4T') }}</h3>
                    </div>
                    <div class="steps__area--content--short">
                        <p>{{ __('taillis.softwareDevStep4P') }}</p>
                    </div>
                </div>
            </div>

            <div class="row-2-10  wow animate__animated animate__fadeInLeftBig" data-wow-duration="1.5s"
                data-wow-delay=".2"">
                <div class="steps__area--img">
                    <img src="/assets/images/services/logiciel/log-step-05.svg" alt="" />
                </div>
                <div class="steps__area--content">
                    <div class="steps__area--content--head">
                        <img src="/assets/images/services/step-num5.svg" alt="" />
                        <h3>{{ __('taillis.softwareDevStep5T') }}</h3>
                    </div>
                    <div class="steps__area--content--short">
                        <p>
                            {{ __('taillis.softwareDevStep5P') }}
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
