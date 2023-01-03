<nav class="navbar navbar-expand d-flex flex-column align-item-start p-0" id="sidebar">
    <a href="{{route('dashboard')}}" class=" my-3  text-dark text-decoration-none ">
        <img class="logo mx-auto d-block" src="{{ asset('admin/img/TAX-IT-BD-Logo.png') }}" alt="" width="50" height="45">
    </a>
    <ul class="navbar-nav text-center d-flex flex-column w-100 mb-5 ">
        <hr>
        <li class="nav-item w-100 ">
            <a href="{{route('dashboard')}}" class=" nav-link text-dark pl-4 {{ Request::routeIs('dashboard') ? 'custom_active' : '' }}">
                Dashboard
            </a>
        </li>
        <li class="nav-item mt-1 w-100">
            <a href="{{route('product.add')}}" class="nav-link text-dark pl-4 {{ Request::routeIs('product.add') ? 'custom_active' : '' }}">
                Add product
            </a>
        </li>
        <li class="nav-item mt-1 w-100">
            <a href="{{route('product.list')}}" class="nav-link text-dark pl-4 {{ Request::routeIs('product.list') ? 'custom_active' : '' }}">
                product List
            </a>
        </li>
        <li class="nav-item mt-1 w-100">
            <a href="{{route('user.list')}}" class="nav-link text-dark pl-4 {{ Request::routeIs('user.list') ? 'custom_active' : '' }}">
                user List
            </a>
        </li>

        <hr>
        <li class="nav-item w-100 mb-2">
            <a href="{{route('logout')}}" class="nav-link text-danger pl-4">Logout</a>
        </li>
    </ul>
</nav>
<!-- <div class="b-example-divider" id="sidebar_shade"></div> -->
