<!DOCTYPE html>
<html lang="{{ app()->getlocale() }}" dir="{{ app()->getlocale() == 'en' ? 'ltr' : 'rtl' }}">

<head>
    <meta charset="utf-8" />
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="icon" href="{{ asset('assets/images/') }}" />

    <!-- Add these lines to include Select2 CSS and JS -->
    <link rel="stylesheet" href="{{ asset('node_modules/select2/dist/css/select2.min.css') }}">
    <script src="{{ asset('node_modules/select2/dist/js/select2.min.js') }}"></script>


    <!-- Bootstrap Css -->
    <!-- Include the Select2 CSS file -->

    <link href="{{ asset('assets/select2.min.css') }}" rel="stylesheet" />


    {{-- <link href="{{ asset('assets/css/bootstrap-rtl.min.css') }}" id="bootstrap-style" rel="stylesheet"
    type="text/css" /> --}}
    <link href="{{ asset('assets/css/style.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/libs/boxicons/css/boxicons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/libs/mdi/css/materialdesignicons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/libs/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/icons-1.10.3/font/bootstrap-icons.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/print.css') }}" media="print">

    <!-- App Css-->
    @if (app()->getLocale() == 'ar')
        <link href="{{ asset('assets/css/bootstrap-rtl.min.css') }}" id="bootstrap-style" rel="stylesheet"
            type="text/css" />
        <link href="{{ asset('assets/css/app-rtl.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />
    @else
        <link href="{{ asset('assets/css/bootstrap-ltr.min.css') }}" id="bootstrap-style"
            rel="stylesheet"type="text/css" />
        <link href="{{ asset('assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />
    @endif
    <script src="{{ asset('assets/js/jquery.js') }}"></script>


</head>

<body data-sidebar="dark" data-layout-mode="dark" id="page_body">
    <script>
        if (localStorage.getItem('mythemecolormode') == 'dark') {
            document.getElementById('page_body').setAttribute('data-layout-mode', 'dark');

        } else {
            document.getElementById('page_body').setAttribute('data-layout-mode', 'light');
        }
    </script>
    <!-- <body data-layout="horizontal" data-topbar="dark"> -->

    <!-- Begin page -->
    <div id="layout-wrapper">

        <header id="page-topbar">
            <div class="navbar-header">
                <div class="d-flex">
                    <!-- LOGO -->
                    {{-- <div class="navbar-brand-box">
                        <a href="{{ route('/') }}" class="logo logo-dark">
                            <span class="logo-sm">
                                <img src="{{ asset('assets/images/logo10.svg') }}" alt="" height="22" />
                            </span>
                            <span class="logo-lg">
                                <img src="{{ asset('assets/images/logo10.svg') }}" alt="" height="17" />
                            </span>
                        </a>

                        <a href="{{ route('/') }}" class="logo logo-light ">
                            <span class="logo-sm">
                                <img src="{{ asset('assets/images/logo10.svg') }}" alt="" height="22" />
                            </span>
                            <span class="logo-lg mt-5">
                                <img src="{{ asset('assets/images/logo10.svg') }}" alt="" height="50" />
                            </span>
                        </a>
                    </div> --}}

                    {{-- new ---------------------------- --}}
                    <div class="navbar-brand-box p-0">
                        <a href="{{ route('/') }}" class="logo logo-dark">
                            <span class="logo-sm">
                                <img src="{{ asset('assets/images/logohere') }}" alt="" height="50" />
                            </span>
                            <span class="logo-lg">
                                <img src="{{ asset('assets/images/sidelogo') }}" alt="" height="50" />
                            </span>
                        </a>

                        <a href="{{ route('/') }}" class="logo logo-light ">
                            <span class="logo-sm">
                                <img src="{{ asset('assets/images/logohere') }}" alt="" height="50" />
                            </span>
                            <span class="logo-lg mt-5">
                                <img src="{{ asset('assets/images/sidelogo') }}" alt="" height="50" />
                            </span>
                        </a>
                    </div>

                    <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect"
                        id="vertical-menu-btn">
                        <i class="fa fa-fw fa-bars"></i>
                    </button>
                    <!-- App Search-->
                    {{-- <form class="app-search d-none d-lg-block">
                        <div class="position-relative">

                            <input type="text" class="form-control" placeholder="Search..." />
                            <span class="bx bx-search-alt"></span>
                        </div>
                    </form> --}}
                    <!--for langouch-->
                    <div></div>
                    {{-- <div class="dropdown d-inline-block">
                        <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                            <span class="d-none d-xl-inline-block ms-1" key="t-henry">Language</span>
                            <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                        </button> --}}
                    {{-- <div class="dropdown-menu dropdown-menu-end">
                                <ul>
                                    @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                        ss
                                    @endforeach
                                </ul>
                            </div> --}}
                    {{-- </div> --}}
                </div>

                <div class="d-flex">
                    <div class="dropdown d-inline-block d-lg-none ms-2">
                        <button type="button" class="btn header-item noti-icon waves-effect"
                            id="page-header-search-dropdown" data-bs-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                            <i class="mdi mdi-magnify"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                            aria-labelledby="page-header-search-dropdown">
                            <form class="p-3">
                                <div class="form-group m-0">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Search ..."
                                            aria-label="Recipient's username" />
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="submit">
                                                <i class="mdi mdi-magnify"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>


                    <div class="dropdown d-none d-lg-inline-block ms-1">
                        <div class="mt-4 text-primary" id="digital-clock" dir="ltr"></div>
                    </div>
                    <div class="dropdown d-inline-block">

                        <button type="button" class="btn header-item waves-effect" data-bs-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <span class="mdi mdi-theme-light-dark font-size-24"></span>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end">
                            <!-- item-->
                            <label class="form-check-label w-100" for="darkradio">

                                <div class="dropdown-item language">
                                    <input class="form-check-input " type="radio" name="darklightswitch"
                                        id="darkradio" value="dark">
                                    @lang('settings.dark')
                                </div>
                            </label>
                            <label class="form-check-label w-100" for="lightradio">

                                <div class="dropdown-item  language">
                                    <input class="form-check-input " type="radio" name="darklightswitch"
                                        id="lightradio" value="light">
                                    @lang('settings.light')
                                </div>
                            </label>
                        </div>
                    </div>
                    <div class="dropdown d-none d-lg-inline-block ms-1">
                        <button type="button" class="btn header-item noti-icon waves-effect"
                            data-bs-toggle="fullscreen">
                            <i class="bx bx-fullscreen"></i>
                        </button>
                    </div>
                    {{-- Notification --}}
                    {{-- <div class="dropdown d-none d-lg-inline-block ms-1">
                        <button class="btn header-item noti-icon waves-effect">
                            <a href="{{ route('notifications') }}">
                                @if (Auth::user()->unreadNotifications->count() > 0)
                                    <i class="bi bi-bell-fill"></i>
                                @else
                                    <i class="bi bi-bell"></i>
                                @endif
                            </a>
                        </button>
                    </div> --}}



                    <div class="dropdown d-inline-block">
                        {{-- <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="rounded-circle header-profile-user"
                                src="{{ asset('storage/profiles/' . Auth::user()->profile) }}" alt="Header Avatar" />
                            <span class="d-none d-xl-inline-block ms-1"
                                key="t-henry">{{ Auth::user()->name }}</span>
                            <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                        </button> --}}
                        <div class="dropdown-menu dropdown-menu-end">
                            <!-- item-->
                            {{-- <a class="dropdown-item" href="#"><i
                                    class="bx bx-user font-size-16 align-middle me-1"></i>
                                <span key="t-profile">P rofile</span></a>
                            <a class="dropdown-item d-block" href="#"><span
                                    class="badge bg-success float-end">11</span><i
                                    class="bx bx-wrench font-size-16 align-middle me-1"></i>
                                <span key="t-settings">Settings</span></a> --}}
                            <div class="dropdown-item d-block text-center">
                                <form action="{{ route('logout') }}" method="POST" class="w-100">
                                    @csrf
                                    <button type="submit"
                                        class="btn btn-link btn-sm p-0 m-0 font-size-16">@lang('settings.logout')</button>
                                </form>
                            </div>
                            {{-- <div class="dropdown-divider"></div> --}}
                        </div>
                    </div>
                    <div class="dropdown d-inline-block">
                        <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="d-none d-xl-inline-block ms-1" key="t-henry">@lang('settings.lang')</span>
                            <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end" style="">
                            <!-- item-->
                            <a class="dropdown-item" href="{{ route('set-language', 'en') }}"><span
                                    key="t-profile">@lang('settings.en')</span></a>
                            <a class="dropdown-item" href="{{ route('set-language', 'ku') }}"><span
                                    key="t-profile">@lang('settings.ku')</span></a>
                            <a class="dropdown-item" href="{{ route('set-language', 'ar') }}"><span
                                    key="t-profile">@lang('settings.ar')</span></a>
                        </div>
                    </div>
                </div>
                <div class="dropdown d-inline-block">
                </div>
            </div>
    </div>
    </header>

    <!-- ========== Left Sidebar Start ========== -->
    <div class="vertical-menu">
        <div data-simplebar class="h-100">
            <!--- Sidemenu -->
            <div id="sidebar-menu">
                <!-- Left Menu Start -->
                <ul class="metismenu list-unstyled" id="side-menu">

                    <li class="menu-title" key="t-menu">@lang('settings.navigation')</li>
                    <li>
                        <a href="javascript: void(0);" class="waves-effect">
                            <i class="bi bi-gear"></i>
                            <span key="t-tables">@lang('settings.settings')</span>
                        </a>
                        <ul class="sub-menu mm-collapse" aria-expanded="false">
                            <li><a href="{{ route('/') }}" key="t-basic-tables">@lang('settings.home')</a></li>
                    </li>
                </ul>
            </div>
            <!-- Sidebar -->
        </div>
    </div>
    <!-- Left Sidebar End -->

    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <div class="page-title-right">
                                @isset($navlinks)

                                    <ol class="breadcrumb m-0">

                                        @foreach ($navlinks as $item)
                                            <li class="breadcrumb-item">
                                                <a href="{{ $item['link'] }}">{{ $item['title'] }}</a>
                                            </li>
                                        @endforeach
                                        <li class="breadcrumb-item active">@yield('title')</li>
                                    </ol>
                                @endisset

                            </div>
                        </div>
                    </div>
                </div>
                <!-- end page title -->
                @include('layouts.alerts')
                @yield('content')
                <!-- end row -->
            </div>
            <!-- container-fluid -->
        </div>

    </div>
    </div>
    {{-- ----- footer --- --}}
    <footer>
    </footer>
    <div class="rightbar-overlay"></div>
    @include('layouts.scripts')
    <script>
        $('input[type=radio][name=darklightswitch]').change(function() {
            if (this.value == 'dark') {
                document.getElementById('page_body').setAttribute('data-layout-mode', 'dark');
                localStorage.setItem('mythemecolormode', 'dark'); //set

                $('body').addClass('dark-mode');

                $('#select2').addClass('dark-mode')
                $('#select2').addClass('select2-container--dark')
            } else if (this.value == 'light') {
                $('body').removeClass('dark-mode');
                $('#select2').removeClass('dark-mode')
                $('#select2').removeClass('select2-container--dark')
                document.getElementById('page_body').setAttribute('data-layout-mode', 'light');
                localStorage.setItem('mythemecolormode', 'light'); //set

            }
        });
    </script>

    @stack('scripts')
</body>

</html>
