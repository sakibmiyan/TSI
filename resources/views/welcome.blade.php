@include('partials.header')

@include('partials.sidebar')
<div class="dashboard-wrapper">
    <div class="container-fluid dashboard-content">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                @yield('heading')
            </div>
            @yield('content')
        </div>
    </div>
    @include('partials.footer')
