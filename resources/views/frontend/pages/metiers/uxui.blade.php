@extends('frontend.layouts.app')


@section('metatags')
    <meta itemprop="image" content="https://taillislabs.com/logo2.png" />
    <meta property="og:image" itemprop="image/*" content="https://taillislabs.com/logo2.png" />
    <meta property="og:image:width" content="256" />
    <meta property="og:image:height" content="256" />
    <meta property="og:site_name" content="Taillis Labs" />
@endsection
@section('title', __('taillis.serviceUxuiTitle'))

@section('styles')

@endsection


@section('content')
    <section class="breadcrumb__wrapper">
        <img src="/assets/images/shap01.svg" class="shap01" />
        {{-- <img src="/assets/images/shaps/shap--left-01.svg" class="shap--left-01-s2" /> --}}
        <div class="container">
            <div class="breadcrumb__wrapper--content2">
                <h1>
                    {{ __('taillis.serviceUxuiTitle') }}
                </h1>
            </div>

            <div class="media__center">
                <img src="/assets/images/uxui01.svg" alt="" class="width-60-100 p-top-30 wow animate__animated animate__zoomInUp"
                    data-wow-duration="1.5s" data-wow-delay=".2">
            </div>
        </div>
    </section>


    <section class="block__center section--large p-top-80">
        <img src="/assets/images/shaps/shap_plus.svg" class="shap--plus" alt="" />
        <img src="/assets/images/shaps/shap--left-01.svg" class="shap--left-01" />

        <div class="container">
            <div class="content">
                <p class="p__white">
                    {{ __('taillis.uxuiP1') }}
                </p>
                <p class="p__white">
                    {{ __('taillis.uxuiP2') }}
                </p>
            </div>
            <div class="media__center">
                <img src="/assets/images/uxui02.svg" alt="" class="width-50-100 p-top-80 wow animate__animated animate__zoomInUp"
                data-wow-duration="1.5s" data-wow-delay=".2">
            </div>
            <div class="grid--2-responsive ">
                <div class="grp wow animate__animated animate__fadeInLeft" data-wow-duration="1.5s"
                    data-wow-delay=".2">
                    <h3>{{ __('taillis.uxuiDT1') }}</h3>
                    <p class="p__white ">
                        {{ __('taillis.uxuiDP1') }} </p>
                </div>
                <div class="grp wow animate__animated animate__fadeInLeft" data-wow-duration="1.5s"
                    data-wow-delay=".2">
                    <h3>{{ __('taillis.uxuiDT2') }}</h3>
                    <p class="p__white ">
                        {{ __('taillis.uxuiDP2') }} </p>
                </div>
            </div>

        </div>
    </section>


    <section class="block__grid section--medium  bg-03">
        <div class="container">
            <div class="heading__primary p-bottom-80">
                <h2 class="wow" data-splitting="">
                    {{ __('taillis.uxuiStepTitle') }}
                </h2>
            </div>

            <div class="row-2-10 wow animate__animated animate__fadeInLeftBig" data-wow-duration="1.5s" data-wow-delay=".2">
                <div class="steps__area--img">
                    <img src="/assets/images/services/uxuidesign/uxuidesign-1.svg" alt="" />
                </div>

                <div class="steps__area--content">
                    <div class="steps__area--content--head">
                        <img src="/assets/images/services/step-num1.svg" alt="" />
                        <h3>{{ __('taillis.uxuiStep1T') }}</h3>
                    </div>
                    <div class="steps__area--content--short">
                        <p>{{ __('taillis.uxuiStep1P') }}</p>
                    </div>
                </div>
            </div>


            <div class="row-2-10  wow animate__animated animate__fadeInRightBig" data-wow-duration="1.5s" data-wow-delay=".2"">
                <div class="steps__area--img">
                    <img src="/assets/images/services/uxuidesign/uxuidesign-3.svg" alt="" />
                </div>
                <div class="steps__area--content">
                    <div class="steps__area--content--head">
                        <img src="/assets/images/services/step-num2.svg" alt="" />
                        <h3>{{ __('taillis.uxuiStep2T') }}</h3>
                    </div>
                    <div class="steps__area--content--short">
                        <p>{{ __('taillis.uxuiStep2P') }}</p>
                    </div>
                </div>
            </div>

            <div class="row-2-10  wow animate__animated animate__fadeInLeftBig" data-wow-duration="1.5s" data-wow-delay=".2"">
                <div class="steps__area--img">
                    <img src="/assets/images/services/uxuidesign/uxuidesign-4.svg" alt="" />
                </div>
                <div class="steps__area--content">
                    <div class="steps__area--content--head">
                        <img src="/assets/images/services/step-num3.svg" alt="" />
                        <h3>{{ __('taillis.uxuiStep3T') }}</h3>
                    </div>
                    <div class="steps__area--content--short">
                        <p>
                            {{ __('taillis.uxuiStep3P') }}
                        </p>
                    </div>
                </div>
            </div>

            <div class="row-2-10  wow animate__animated animate__fadeInRightBig" data-wow-duration="1.5s" data-wow-delay=".2"">
                <div class="steps__area--img">
                    <img src="/assets/images/services/uxuidesign/uxuidesign-7.svg" alt="" />
                </div>
                <div class="steps__area--content">
                    <div class="steps__area--content--head">
                        <img src="/assets/images/services/step-num4.svg" alt="" />
                        <h3>{{ __('taillis.uxuiStep4T') }}</h3>
                    </div>
                    <div class="steps__area--content--short">
                        <p>{{ __('taillis.uxuiStep4P') }}</p>
                    </div>
                </div>
            </div>

            <div class="row-2-10  wow animate__animated animate__fadeInLeftBig" data-wow-duration="1.5s" data-wow-delay=".2"">
                <div class="steps__area--img">
                    <img src="/assets/images/services/uxuidesign/uxuidesign-5.svg" alt="" />
                </div>
                <div class="steps__area--content">
                    <div class="steps__area--content--head">
                        <img src="/assets/images/services/step-num5.svg" alt="" />
                        <h3>{{ __('taillis.uxuiStep5T') }}</h3>
                    </div>
                    <div class="steps__area--content--short">
                        <p>
                            {{ __('taillis.uxuiStep5P') }}
                        </p>
                    </div>
                </div>
            </div>

            <div class="row-2-10  wow animate__animated animate__fadeInLeftBig" data-wow-duration="1.5s" data-wow-delay=".2"">
                <div class="steps__area--img">
                    <img src="/assets/images/services/uxuidesign/uxuidesign-6.svg" alt="" />
                    
                </div>
                <div class="steps__area--content">
                    <div class="steps__area--content--head">
                        <img src="/assets/images/services/step-num6.svg" alt="" />
                        <h3>{{ __('taillis.uxuiStep6T') }}</h3>
                    </div>
                    <div class="steps__area--content--short">
                        <p>
                            {{ __('taillis.uxuiStep6P') }}
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
