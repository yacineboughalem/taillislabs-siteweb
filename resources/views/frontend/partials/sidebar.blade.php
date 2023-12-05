<nav class="sidebar  has-scrollbar" data-mobile-menu>

    <div class="sidebar--header">
        <img src="/assets/images/logo.svg" alt="" class="logo">

        <span class="menu-close-btn" data-mobile-menu-close-btn>
            <i class="ri-close-line"></i>
        </span>
    </div>


    <ul class="menu">

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


</nav>
