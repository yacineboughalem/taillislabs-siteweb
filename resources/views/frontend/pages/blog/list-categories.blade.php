@if (count($categoriePosts) != 0)

    <div class="categories--area">
        <h3 class="m-bottom-20">Catégories</h3>
        @foreach ($categoriePosts as $cat)
            <a href="{{ url('category', $cat->slug) }}" class="categories--area--item {{ (request()->is('category/'.$cat->slug)) ? 'active' : '' }}" >
                <div class="categories--area--item--left">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20.589" height="23.762" viewBox="0 0 20.589 23.762"><path d="M4120.113,1092.886l-.007,8.8-7.625,4.394-7.616-4.406.007-8.8,7.624-4.394Zm2.67-1.539L4112.5,1085.4l-10.295,5.932-.01,11.881,10.285,5.949,10.294-5.932Z" transform="translate(-4102.194 -1085.398)" fill="#FF9944"/></svg>
                    <span>{{ $cat->name }}
                        <small>({{$cat->posts->count()}})</small>
                    </span>
                </div>
                <div class="categories--area--item--right">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="feather feather-chevron-right">
                        <polyline points="9 18 15 12 9 6"></polyline>
                    </svg>
                </div>
            </a>
        @endforeach
    </div>
@endif
