@extends('frontend.layouts.app')


@section('metatags')
    <meta itemprop="image" content="https://taillislabs.com/logo2.png" />
    <meta property="og:image" itemprop="image/*" content="https://taillislabs.com/logo2.png" />
    <meta property="og:image:width" content="256" />
    <meta property="og:image:height" content="256" />
    <meta property="og:site_name" content="Taillis Labs" />
@endsection
@section('title', __('taillis.serviceWebMobileTitle'))

@section('styles')

@endsection


@section('content')


    <section class="breadcrumb__wrapper p-bottom-80">
        <img src="/assets/images/shap01.svg" class="shap01" />
        {{-- <img src="/assets/images/shaps/shap--left-01.svg" class="shap--left-01-s2" /> --}}
        <div class="container">
            <div class="breadcrumb__wrapper--content2">
                <h1>
                    {{ __('taillis.serviceWebMobileTitle') }}
                </h1>
            </div>

            <div class="block__grid">
                <div class="wrapper">
                    <div class="media">
                        <img src="/assets/images/services/web-mobile/dev-web-mobile-01.svg" alt=""
                            class="  animate__animated animate__zoomInUp" data-wow-duration="1.5s" data-wow-delay=".2">
                    </div>

                    <div class="content">
                        <p class="p__white text-left">
                            {{ __('taillis.webMobileDevP1') }}
                        </p>
                        <p class="p__white text-left">
                            {{ __('taillis.webMobileDevP2') }}
                        </p>

                        <p class="p__white text-left">
                            {{ __('taillis.webMobileDevP3') }}
                        </p>
                    </div>
                </div>

                <div class="wrapper">
                    <div class="content">
                        <div class="grp  animate__animated animate__fadeInLeft" data-wow-duration="1.5s"
                            data-wow-delay=".2">
                            <h3>{{ __('taillis.webMobileDevT1') }}</h3>
                            <p class="p__white">
                                {{ __('taillis.webMobileDevT1P1') }} </p>
                        </div>
                        <div class="grp  animate__animated animate__fadeInLeft" data-wow-duration="1.5s"
                            data-wow-delay=".2">
                            <h3>{{ __('taillis.webMobileDevT2') }}</h3>
                            <p class="p__white">
                                {{ __('taillis.webMobileDevT2P2') }}</p>
                        </div>
                    </div>
                    <div class="media">
                        <img src="/assets/images/services/web-mobile/dev-web-mobile-02.svg" alt=""
                            class="  animate__animated animate__zoomInUp" data-wow-duration="1.5s" data-wow-delay=".2">
                    </div>
                </div>
            </div>


        </div>
    </section>


 


    <div class="p-top-80  bg-03">
        <div class="container">
            <div class="heading__primary">
                <h2 class="title animate__animated animate__zoomInUp"> {{ __('taillis.webMobileDevShowCaseTitle') }}</h2>
            </div>
        </div>
    </div>

    <div class="showcases__area--section bg-03" horz-scroll="horz-scroll">

        <article class="showcases__area--section--item"
            style="background-image: url('/assets/images/showcases/boaa.svg');">
            <img src="/assets/images/showcases/boa/slide-item-boa.png" alt="" />
            <div class="showcases__area--section--item--content">
                <h3>BOA BANK</h3>
                <p>{{ __('taillis.webMobileDevShowCaseBoa') }}</p>
            </div>
        </article>
        <article class="showcases__area--section--item"
            style="background-image: url('/assets/images/showcases/auto.svg');">
            <img src="/assets/images/showcases/autoplus/slide-item-autoplus.png" alt="" />
            <div class="showcases__area--section--item--content">
                <h3>Autoplus</h3>
                <p>{{ __('taillis.webMobileDevShowCaseAutoplus') }}</p>
            </div>
        </article>
        <article class="showcases__area--section--item"
            style="background-image: url('/assets/images/showcases/tersea.svg');">
            <img src="/assets/images/showcases/tersea/slide-item-tersea.png" alt="" />
            <div class="showcases__area--section--item--content">
                <h3>Tersea</h3>
                <p>{{ __('taillis.webMobileDevShowCaseTersea') }}</p>
            </div>
        </article>
        <article class="showcases__area--section--item"
            style="background-image: url('/assets/images/showcases/share.svg');">
            <img src="/assets/images/showcases/sharegro/slide-item-sharegro.png" alt="" />
            <div class="showcases__area--section--item--content">
                <h3>ShareGRO</h3>
                <p>
                    {{ __('taillis.webMobileDevShowCaseShareGRO') }}
                </p>
            </div>
        </article>
        <article class="showcases__area--section--item"
            style="background-image: url('/assets/images/showcases/payclub.svg');">
            <img src="/assets/images/showcases/payclub/slide-item-payclub.png" alt="" />
            <div class="showcases__area--section--item--content">
                <h3>PayClub</h3>
                <p>{{ __('taillis.webMobileDevShowCasePayclub') }}</p>
            </div>
        </article>
        <article class="showcases__area--section--item"
            style="background-image: url('/assets/images/showcases/leo.svg');">
            <img src="/assets/images/showcases/ledgerleopard/slide-item-ledgerleopard.png" alt="" />
            <div class="showcases__area--section--item--content">
                <h3>Ledger Leopard</h3>
                <p>{{ __('taillis.webMobileDevShowCaseLedgerLeopard') }}</p>
            </div>
        </article>
    </div>








    @include('frontend/components/verticals')
    @include('frontend/components/clients')
    @include('frontend/components/contact')



@endsection


@section('scripts')


    <script>
        (function HorizontalScrolling() {
            function wheelHandler(element, event) {
                const toLeft = event.deltaY < 0 && element.scrollLeft > 0
                const toRight = event.deltaY > 0 && element.scrollLeft < element.scrollWidth - element.clientWidth

                if (toLeft || toRight) {
                    event.preventDefault()
                    event.stopPropagation()

                    element.scrollBy({
                        left: event.deltaY
                    })
                }
            }

            const targets = document.querySelectorAll('[horz-scroll]')

            targets.forEach(element => element.addEventListener('wheel', event => wheelHandler(element, event)))
        })()
    </script>

@endsection
