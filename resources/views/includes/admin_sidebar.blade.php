<div class="sidebar" data-color="blue" id="navigate">
    <!--
      Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
  -->
    <div class="logo">
        <a href="http://www.creative-tim.com" class="simple-text logo-mini">
            Admin
        </a>
        <a href="http://www.creative-tim.com" class="simple-text logo-normal">
            Dashboard
        </a>
    </div>
    <div class="sidebar-wrapper" id="sidebar-wrapper">
        <ul class="nav">
            <li class="active ">
                <a href="/admin">
                    <i class="now-ui-icons design_app"></i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li>
                <a href="{{route('products.index')}}">
                    <i class="now-ui-icons education_atom"></i>
                    <p>View products</p>
                </a>
            </li>
            <li>
                <a href="{{route('products.create')}}">
                    <i class="now-ui-icons education_atom"></i>
                    <p>Add product</p>
                </a>
            </li>
            <li>
                <a href="{{route('categories.index')}}">
                    <i class="now-ui-icons location_map-big"></i>
                    <p>Categories</p>
                </a>
            </li>
            <li>
                <a href="{{route('profile.index')}}">
                    <i class="now-ui-icons users_single-02"></i>
                    <p>User Profile</p>
                </a>
            </li>
            <li>
{{--                logout --}}
                <a class="dropdown-item" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                    <i class="now-ui-icons text_caps-small"></i>
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>

                {{--                logout--}}
            </li>
        </ul>
    </div>
</div>
