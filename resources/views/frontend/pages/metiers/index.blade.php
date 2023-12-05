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
@section('title', __('taillis.servicePageTitle'))

@section('styles')

@endsection


@section('content')

    <div class="breadcrumb__wrapper">
        <img src="/assets/images/shap01.svg" class="shap01" />
        <img src="/assets/images/shaps/shap--left-01.svg" class="shap--left-01-s2" />
        <div class="container">
            <div class="breadcrumb__wrapper--content2">
                <h1>
                    {{ __('taillis.servicePageTitle') }}
                </h1>
                <p class="simple">
                    {{ __('taillis.servicePageShortDesc') }}
                </p>

                <div class="services__area --mobile">
                    <div class="wrapper">
                        <a href="{{route("services.digital")}}"
                            class="services__area--item  transition grow wow zoomIn" data-wow-duration="1.5s"
                            data-wow-delay=".1s">
    
                            <div class="services__area--item--icon">
                                <img src="/assets/images/services/ts-m-01.svg" alt="Taillis">
                            </div>
                            <div class="services__area--item--content">
                                <h4 class="services__area--item--content--title">{{ __('taillis.serviceConsultingTitle') }}</h4>
                            </div>
                        </a>
    
                        <a href="{{route("services.uxui")}}" class="services__area--item  transition grow wow zoomIn"
                            data-wow-duration="1.5s" data-wow-delay=".3s">
                            <div class="services__area--item--icon">
                                <img src="/assets/images/services/ts-m-02.svg" alt="Taillis">
                            </div>
                            <div class="services__area--item--content">
                                <h4 class="services__area--item--content--title">{{ __('taillis.serviceUxuiTitle') }}</h4>
                            </div>
                        </a>
                        <a href="{{route("services.innovation")}}" class="services__area--item  transition grow wow zoomIn"
                            data-wow-duration="1.5s" data-wow-delay=".5">
    
                            <div class="services__area--item--icon">
                                <img src="/assets/images/services/ts-m-03.svg" alt="Taillis">
                            </div>
                            <div class="services__area--item--content">
                                <h4 class="services__area--item--content--title">{{ __('taillis.serviceInnovationTitle') }}</h4>
                            </div>
                        </a>
    
                        <a href="{{route("services.webmobile")}}"
                            class="services__area--item  transition grow wow zoomIn" data-wow-duration="1.5s"
                            data-wow-delay=".7s">
                            <div class="services__area--item--icon">
                                <img src="/assets/images/services/ts-m-04.svg" alt="Taillis">
                            </div>
                            <div class="services__area--item--content">
                                <h4 class="services__area--item--content--title">{{ __('taillis.serviceWebMobileTitle') }}</h4>
                            </div>
                        </a>
    
                        <a href="{{route("services.devsoftware")}}" class="services__area--item  transition grow wow zoomIn"
                            data-wow-duration="1.5s" data-wow-delay=".9s">
                            <div class="services__area--item--icon">
                                <img src="/assets/images/services/ts-m-05.svg" alt="Taillis">
                            </div>
                            <div class="services__area--item--content">
                                <h4 class="services__area--item--content--title">{{ __('taillis.serviceDevSoftTitle') }}</h4>
                            </div>
                        </a>
    
                    </div>
                </div>
            </div>

            <div class="sercives--area--style-2  --web">
                <div class="sercives--area--style-2--item st-1 ">
                    <a href="/our-services/web-and-mobile-development">
                        <div class="st-1-title">
                            <img src="/assets/images/services/ts-1.svg" alt="" />
                            <h3>{{ __('taillis.serviceWebMobileTitle') }}</h3>
                        </div>
                    </a>
                </div>
                <div class="sercives--area--style-2--item st-2 ">
                    <a href="/our-services/digital-transformation-consulting">
                        <div class="st-2-title">
                            <img src="/assets/images/services/ts-2.svg" alt="" />
                            <h3>{{ __('taillis.serviceConsultingTitle') }}</h3>
                        </div>
                    </a>
                </div>
                <div class="sercives--area--style-2--item st-3 ">
                    <a href="/our-services/software-development">
                        <div class="st-3-title">
                            <img src="/assets/images/services/ts-3.svg" alt="" />
                            <h3>{{ __('taillis.serviceDevSoftTitle') }}</h3>
                        </div>
                    </a>
                </div>
                <div class="sercives--area--style-2--item st-4 ">
                    <a href="/our-services/uxui-design">
                        <div class="st-4-title">
                            <img src="/assets/images/services/ts-4.svg" alt="" />
                            <h3>{{ __('taillis.serviceUxuiTitle') }}</h3>
                        </div>
                    </a>
                </div>
                <div class="sercives--area--style-2--item st-5 ">
                    <a href="/our-services/innovation">
                        <div class="st-5-title">
                            <img src="/assets/images/services/ts-5.svg" alt="" />
                            <h3>{{ __('taillis.serviceInnovationTitle') }}</h3>
                        </div>
                    </a>
                </div>
            </div>

           

        </div>
    </div>



    @include('frontend/components/verticals')



    <section class="tabs__area section--medium bg-03">
        <div class="container">
            <div class="heading__primary " data-wow-duration="1.5s" data-wow-delay=".2" data-splitting>
                <h2 class="title wow" data-splitting>{{ __('taillis.theyTrustUsTitle') }}</h2>
                <p class="subtitle-2">{{ __('taillis.theyTrustUsDesc') }}
                </p>
            </div>

            <div class="tabs m-top-60">
                <div class="tab active" onclick="showTab(0)">
                    <span>PEGA HEALTH</span>
                </div>
                <div class="tab" onclick="showTab(1)">
                    <span>LIVIE</span>
                </div>
                <div class="tab" onclick="showTab(2)">
                    <span>AUTOPLUS</span>
                    <div class="progress-border"></div>
                </div>
                <div class="tab" onclick="showTab(3)">
                    <span>BOA BANK</span>
                </div>
                <!-- Add more tabs as needed -->
            </div>


            <div class="tab-content" id="tab1">
                <div class="grid--2-responsive">
                    <div class="tabs__area--left">
                        <h2 class="tabs__area--left--number  animate__animated animate__zoomIn"
                            data-wow-duration="1.5s" data-wow-delay=".2">01</h2>

                        <div class="tabs__area--left--content  animate__animated animate__fadeInLeft"
                            data-wow-duration="1.5s" data-wow-delay=".2">
                            <div class="tabs__area--left--content--title">
                                <h2>PEGA HEALTH</h2>
                            </div>
                            <div class="tabs__area--left--content--short">
                                <p>
                                    {{ __('taillis.theyTrustUsPega') }}
                                </p>
                            </div>
                            <div class="tabs__area--left--content--tags">
                                <div class="tabs__area--left--content--tags--item">
                                    <h6>{{ __('taillis.showCasesKeywordUXUIDesign') }}</h6>
                                </div>
                                <div class="tabs__area--left--content--tags--item">
                                    <h6>{{ __('taillis.showCasesKeywordWebMobileDevelopment') }}
                                    </h6>
                                </div>
                                <div class="tabs__area--left--content--tags--item">
                                    <h6>{{ __('taillis.showCasesKeywordDigital') }}
                                    </h6>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="tabs__area--right  animate__animated animate__fadeInRightBig" data-wow-duration="1.5s"
                        data-wow-delay=".2">
                        <img src="/assets/images/showcases/pega/pega.svg">
                    </div>
                </div>
            </div>
            <div class="tab-content" id="tab2">
                <div class="grid--2-responsive">
                    <div class="tabs__area--left">
                        <h2 class="tabs__area--left--number  animate__animated animate__zoomIn"
                            data-wow-duration="1.5s" data-wow-delay=".2">02</h2>

                        <div class="tabs__area--left--content  animate__animated animate__fadeInLeft"
                            data-wow-duration="1.5s" data-wow-delay=".2">
                            <div class="tabs__area--left--content--title">
                                <h2>LIVIE APP</h2>
                            </div>
                            <div class="tabs__area--left--content--short">
                                <p>
                                    {{ __('taillis.theyTrustUsLivie') }}
                                </p>
                            </div>
                            <div class="tabs__area--left--content--tags">
                                <div class="tabs__area--left--content--tags--item">
                                    <h6>{{ __('taillis.showCasesKeywordUXUIDesign') }}</h6>
                                </div>
                                <div class="tabs__area--left--content--tags--item">
                                    <h6>{{ __('taillis.showCasesKeywordWebMobileDevelopment') }}
                                    </h6>
                                </div>
                                <div class="tabs__area--left--content--tags--item">
                                    <h6>{{ __('taillis.showCasesKeywordDigital') }}
                                    </h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tabs__area--right  animate__animated animate__fadeInRightBig" data-wow-duration="1.5s"
                        data-wow-delay=".2">
                        <img src="/assets/images/showcases/pega/livie.svg">
                    </div>
                </div>
            </div>
            <div class="tab-content" id="tab3">
                <div class="grid--2-responsive">
                    <div class="tabs__area--left">
                        <h2 class="tabs__area--left--number  animate__animated animate__zoomIn"
                            data-wow-duration="1.5s" data-wow-delay=".2">03</h2>

                        <div class="tabs__area--left--content  animate__animated animate__fadeInLeft"
                            data-wow-duration="1.5s" data-wow-delay=".2">
                            <div class="tabs__area--left--content--title">
                                <h2>AUTOPLUS</h2>
                            </div>
                            <div class="tabs__area--left--content--short">
                                <p>
                                    {{ __('taillis.theyTrustUsAutoplus') }}
                                </p>
                            </div>
                            <div class="tabs__area--left--content--tags">
                                <div class="tabs__area--left--content--tags--item">
                                    <h6>{{ __('taillis.showCasesKeywordUXUIDesign') }}</h6>
                                </div>
                                <div class="tabs__area--left--content--tags--item">
                                    <h6>{{ __('taillis.showCasesKeywordWebMobileDevelopment') }}
                                    </h6>
                                </div>
                                <div class="tabs__area--left--content--tags--item">
                                    <h6>{{ __('taillis.showCasesKeywordDigital') }}
                                    </h6>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tabs__area--right  animate__animated animate__fadeInRightBig" data-wow-duration="1.5s"
                        data-wow-delay=".2">
                        <img src="/assets/images/showcases/pega/autoplus.svg">
                    </div>
                </div>
            </div>
            <div class="tab-content" id="tab4">
                <div class="grid--2-responsive">
                    <div class="tabs__area--left">
                        <h2 class="tabs__area--left--number  animate__animated animate__zoomIn"
                            data-wow-duration="1.5s" data-wow-delay=".2">04</h2>

                        <div class="tabs__area--left--content  animate__animated animate__fadeInLeft"
                            data-wow-duration="1.5s" data-wow-delay=".2">
                            <div class="tabs__area--left--content--title">
                                <h2>BOA BANK</h2>
                            </div>
                            <div class="tabs__area--left--content--short">
                                <p>
                                    {{ __('taillis.theyTrustUsBoa') }}
                                </p>
                            </div>
                            <div class="tabs__area--left--content--tags">
                                <div class="tabs__area--left--content--tags--item">
                                    <h6>{{ __('taillis.showCasesKeywordConsulting') }}</h6>
                                </div>
                                <div class="tabs__area--left--content--tags--item">
                                    <h6>{{ __('taillis.showCasesKeywordAssessment') }}
                                    </h6>
                                </div>

                            </div>

                        </div>
                    </div>
                    <div class="tabs__area--right  animate__animated animate__fadeInRightBig" data-wow-duration="1.5s"
                        data-wow-delay=".2">
                        <img src="/assets/images/showcases/pega/boa.svg">
                    </div>
                </div>
            </div>
        </div>
    </section>


    @include('frontend/components/clients')
    @include('frontend/components/contact')


@endsection


@section('scripts')

    <script>
        function showTab(tabIndex) {
            var tabs = document.querySelectorAll('.tab');
            var tabContents = document.querySelectorAll('.tab-content');

            tabs.forEach(function(tab, index) {
                tab.classList.remove('active');
                tabContents[index].style.display = 'none';
            });

            tabs[tabIndex].classList.add('active');
            tabContents[tabIndex].style.display = 'block';
        }

        function autoNavigateTabs() {
            var tabs = document.querySelectorAll('.tab');
            var currentIndex = 0;

            // Show the content of the first tab immediately on page load
            showTab(currentIndex);

            setInterval(function() {
                var currentTab = tabs[currentIndex];

                // Hide all tab content
                var tabContents = document.querySelectorAll('.tab-content');
                tabContents.forEach(function(tabContent) {
                    tabContent.classList.remove('active');
                });

                // Show the next tab content
                showTab(currentIndex);

                // Trigger the width transition for the progress bar
                setTimeout(function() {
                    currentTab.querySelector('.progress-border').style.width = '0';
                    setTimeout(function() {
                        currentTab.querySelector('.progress-border').style.width = '100%';
                    }, 50); // A small delay to allow the transition to start after resetting
                }, 50); // A small delay to allow the transition to reset

                currentIndex = (currentIndex + 1) % tabs.length;
            }, 5000); // Set the interval time in milliseconds (e.g., 3000 for 3 seconds)
        }

        // Run the autoNavigateTabs function when the page loads
        window.onload = function() {
            autoNavigateTabs();
        };
    </script>


@endsection
