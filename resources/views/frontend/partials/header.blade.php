<div class="overlay" data-overlay></div>
<header class="header__area">
    <div class="container">

        <div class="row">
            <div class="header__area--logo">
                <a href="{{ route('home') }}">
                    <img src="/assets/images/logots.svg" alt="">
                </a>
            </div>

            <ul class="header__area--menu">

                <li class="menu--item ">
                    <a href="{{route("home")}}" class="link simple {{ Request::is('/') ? 'active' : '' }}">{{ __('taillis.Home')}}</a>
                </li>

                <li class="menu--item ">
                    <a href="{{route("services")}}" class="link simple {{ Request::is('services*') ? 'active' : '' }}">{{ __('taillis.Whatwedo')}}</a>
                </li>

                <li class="menu--item ">
                    <a href="{{route("blog")}}" class="link simple {{ Request::is('blog*') ? 'active' : '' }}">{{ __('taillis.Blog')}}</a>
                </li>

                <li class="menu--item ">
                    <a href="{{route("contact")}}" class="link simple {{ Request::is('') ? 'active' : '' }}">{{ __('taillis.Contact')}}</a>
                </li>
              

            </ul>

            <div class="header__area--actions">
               
                <div class="lang ">
                    <a class="lang--item" href="/locale/en" @if (app()->getLocale() == 'en') style="opacity: 1" @endif style="opacity: .5">
                        <img src="/assets/images/en.png" alt="en"  />
                    </a>
                    <a class="lang--item" href="/locale/fr" @if (app()->getLocale() == 'fr') style="opacity: 1" @endif style="opacity: .5">
                        <img src="/assets/images/fr.png" alt="fr"  />
                    </a>
                </div>

                <button class="drawer--btn --mobile" data-mobile-menu-open-btn>
                    <svg xmlns="http://www.w3.org/2000/svg" width="27.048" height="12" viewBox="0 0 27.048 12">
                        <g transform="translate(-3.5 -16)">
                            <path d="M4.5,18H29.548" transform="translate(0 -1)" fill="none" stroke="#ffffff"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                            <path d="M4.5,27H29.548" transform="translate(0)" fill="none" stroke="#ffffff"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                        </g>
                    </svg>
                </button>
            </div>

        </div>

    </div>
</header>

@include('frontend/partials/sidebar')



<header class="ts-header d-none haeder-default light-logo-version header-transparent taillis-header-sticky">
    <div class="header-wrapper">
        <div class="container plr--100 plr_lg--30 plr_md--30 plr_sm--10">
            <div class="row align-items-center">
                <div class="col-lg-3 col-xl-3 col-md-6 col-sm-6 col-8 header-left">
                    <div class="logo">
                        <a href="/">
                            <img class="logo-normal" src="/assets/images/logo-ts.svg" />
                            <img class="logo-sticky" src="/assets/images/logo-s.svg" />
                        </a>
                    </div>
                </div>
                <div class="col-lg-6 col-xl-6 d-none d-lg-block">
                    <div class="mainmenu-wrapepr justify-content-center">
                        <nav class="mainmenu-nav d-none d-lg-block">
                            <ul class="mainmenu">
                                <li>
                                    <a href="/">{{ __('taillis.Home')}}</a>
                                    <img class="svg--icon" src="/assets/images/labs-circle.svg" alt="" />
                                      
                                </li>
                                <li>
                                    <a href="/our-services">{{ __('taillis.Whatwedo')}}</a>
                                    <img class="svg--icon" src="/assets/images/labs-circle.svg" alt="" />
                                </li>
                                <li>
                                    <img class="svg--icon" src="/assets/images/labs-circle.svg" alt="" />
                                    <a href="/blog">{{ __('taillis.Blog')}}</a>
                                </li>
                                <li>
                                    <img class="svg--icon" src="/assets/images/labs-circle.svg" alt="" />
                                    <a href="/contact">{{ __('taillis.Contact')}}</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>

                {{-- @if (App::setLocale('fr')) style="font-weight: bold; color: red; text-decoration: underline" @endif --}}
                <div class="col-lg-3 col-xl-3 col-md-6 col-sm-6 col-4 header-right" >
                    <div class="taillis-header-extra d-flex align-items-center justify-content-end">
                        
                        <div class="ts--lang--area ">
                            <a class="ts--lang--area--item" href="/locale/en" @if (app()->getLocale() == 'en') style="opacity: 1" @endif style="opacity: .5">
                                <img src="/assets/images/en.png" alt="en" />
                            </a>
                            <a class="ts--lang--area--item" href="/locale/fr" @if (app()->getLocale() == 'fr') style="opacity: 1" @endif style="opacity: .5">
                                <img src="/assets/images/fr.png" alt="fr" />
                            </a>
                        </div>
                        
                        <a style="display: none;" class="taillis-button btn-solid btn-extra02-color btn-estimate " href="#"><span
                                class="button-text">Request Estimate</span><span class="button-icon"></span></a>
                        <div
                            class="ts-menubar popup-mobile-manu-color popup-navigation-activation d-block d-lg-none ml_sm--20 ml_md--20">
                            <div>
                                <i></i>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</header>


<div class="popup-mobile-manu d-none">
    <div class="inner">
        <div class="mobileheader">
            <div class="logo">
                <a href="index.html">
                    <img src="/assets/images/logo-s.svg" alt="Logo images">
                </a>
            </div>
            <a class="close-menu" href="#"></a>
        </div>
        <div class="menu-item">
            <ul class="mainmenu-item">
                <li><a href="/">{{ __('taillis.Home')}}</a></li>
              <li><a href="/our-services">{{ __('taillis.Whatwedo')}}</a></li>
              <li><a href="/blog">{{ __('taillis.Blog')}}</a></li>
              <li><a href="/contact">{{ __('taillis.Contact')}}</a></li>
            </ul>
        </div>

    </div>
</div>
