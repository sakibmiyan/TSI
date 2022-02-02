<div class="dashboard-main-wrapper">
    <!-- ============================================================== -->
    <!-- navbar -->
    <!-- ============================================================== -->
    <div class="dashboard-header">
        <nav class="navbar navbar-expand-lg bg-white fixed-top">
            <a class="navbar-brand" href="/">Tech Shop Inventory Management System</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse " id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto navbar-right-top">
                    <li class="nav-item">
                        <div id="custom-search" class="top-search-bar">
                            <input class="form-control" type="text" placeholder="Search..">
                        </div>
                    </li>
                    <li class="nav-item dropdown nav-user">
                        <a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false"><img
                                src="{{ asset('assets/images/avatar-1.jpg') }}" alt=""
                                class="user-avatar-md rounded-circle"></a>
                        <div class="dropdown-menu dropdown-menu-right nav-user-dropdown"
                            aria-labelledby="navbarDropdownMenuLink2">
                            <div class="nav-user-info">
                                <h5 class="mb-0 text-white nav-user-name">{{ Auth::user()->name }}</h5>
                                <span class="status"></span><span class="ml-2">Available</span>
                            </div>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i
                                    class="fas fa-sign-out-alt me-2"></i>Logout</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
    <!-- ============================================================== -->
    <!-- end navbar -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- left sidebar -->
    <!-- ============================================================== -->
    <div class="nav-left-sidebar sidebar-dark">
        <div class="menu-list">
            <nav class="navbar navbar-expand-lg navbar-light">
                <a class="d-xl-none d-lg-none" href="#">Dashboard</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav flex-column">
                        <li class="nav-divider">
                            Menu
                        </li>
                        @if (Auth::user()->role == 1)
                            <li class="nav-item ">
                                <a class="nav-link " href="{{ route('dashboard') }}"><i
                                        class="fa fa-fw fa-user-circle"></i>Home</a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link " href="{{ route('brand') }}"><i
                                        class="fas fa-bullseye"></i> Brand</a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="{{ route('category') }}"><i
                                        class="fa fa-fw fa-rocket "></i>Category</a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="{{ route('product') }}"><i
                                        class="fas fa-fw fa-chart-pie"></i>Product</a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="{{ route('report') }}"><i
                                        class="fab fa-fw fa-wpforms"></i>Report</a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="{{ route('user') }}"><i
                                        class="fa fa-fw fa-user-circle"></i>Employee</a>
                            </li>
                        @endif

                        <li class="nav-item ">
                            <a class="nav-link" href="{{ route('order') }}"><i
                                    class="fab fa-fw fa-wpforms"></i>Order</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
