<div class="sidebar" data-color="orange">
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
                <a href="./notifications.html">
                    <i class="now-ui-icons ui-1_bell-53"></i>
                    <p>Notifications</p>
                </a>
            </li>
            <li>
                <a href="./user.html">
                    <i class="now-ui-icons users_single-02"></i>
                    <p>User Profile</p>
                </a>
            </li>
            <li>
                <a href="./tables.html">
                    <i class="now-ui-icons design_bullet-list-67"></i>
                    <p>Table List</p>
                </a>
            </li>
            <li>
                <a href="./typography.html">
                    <i class="now-ui-icons text_caps-small"></i>
                    <p>Typography</p>
                </a>
            </li>
        </ul>
    </div>
</div>
