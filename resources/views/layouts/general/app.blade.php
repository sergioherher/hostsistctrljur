<!DOCTYPE html>

<!-- 
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 4 & Angular 7
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
Renew Support: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<html lang="en">

    <!-- begin::Head -->
    <head>
        <meta charset="utf-8" />
        <title>Sistema de Control de Hipotecas | Escritorio</title>
        <meta name="description" content="Latest updates and statistic charts">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!--begin::Fonts -->
        <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
        <script>
            WebFont.load({
                google: {"families":["Poppins:300,400,500,600,700","Roboto:300,400,500,600,700"]},
                active: function() {
                    sessionStorage.fonts = true;
                }
            });
        </script>

        <!--end::Fonts -->

        <!--begin::Page Vendors Styles(used by this page) -->
        <link href="{{ asset('theme/assets/vendors/custom/fullcalendar/fullcalendar.bundle.css')}}" rel="stylesheet" type="text/css" />

        <!--end::Page Vendors Styles -->

        <!--begin:: Global Mandatory Vendors -->
        <link href="{{ asset('theme/assets/vendors/general/perfect-scrollbar/css/perfect-scrollbar.css')}}" rel="stylesheet" type="text/css" />

        <!--end:: Global Mandatory Vendors -->

        <!--begin:: Global Optional Vendors -->
        <link href="{{ asset('theme/assets/vendors/general/tether/dist/css/tether.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('theme/assets/vendors/general/bootstrap-datepicker/dist/css/bootstrap-datepicker3.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('theme/assets/vendors/general/bootstrap-datetime-picker/css/bootstrap-datetimepicker.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('theme/assets/vendors/general/bootstrap-timepicker/css/bootstrap-timepicker.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('theme/assets/vendors/general/bootstrap-daterangepicker/daterangepicker.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('theme/assets/vendors/general/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('theme/assets/vendors/general/bootstrap-select/dist/css/bootstrap-select.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('theme/assets/vendors/general/bootstrap-switch/dist/css/bootstrap3/bootstrap-switch.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('theme/assets/vendors/general/select2/dist/css/select2.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('theme/assets/vendors/general/ion-rangeslider/css/ion.rangeSlider.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('theme/assets/vendors/general/nouislider/distribute/nouislider.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('theme/assets/vendors/general/owl.carousel/dist/assets/owl.carousel.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('theme/assets/vendors/general/owl.carousel/dist/assets/owl.theme.default.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('theme/assets/vendors/general/dropzone/dist/dropzone.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('theme/assets/vendors/general/summernote/dist/summernote.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('theme/assets/vendors/general/bootstrap-markdown/css/bootstrap-markdown.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('theme/assets/vendors/general/animate.css/animate.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('theme/assets/vendors/general/toastr/build/toastr.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('theme/assets/vendors/general/morris.js/morris.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('theme/assets/vendors/general/sweetalert2/dist/sweetalert2.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('theme/assets/vendors/general/socicon/css/socicon.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('theme/assets/vendors/custom/vendors/line-awesome/css/line-awesome.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('theme/assets/vendors/custom/vendors/flaticon/flaticon.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('theme/assets/vendors/custom/vendors/flaticon2/flaticon.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('theme/assets/vendors/custom/vendors/fontawesome5/css/all.min.css')}}" rel="stylesheet" type="text/css" />

        <!--end:: Global Optional Vendors -->

        <!--begin::Global Theme Styles(used by all pages) -->
        <link href="{{ asset('theme/assets/demo/demo7/base/style.bundle.css')}}" rel="stylesheet" type="text/css" />

        <!--end::Global Theme Styles -->

        <!--begin::Layout Skins(used by all pages) -->
        <link href="{{ asset('theme/assets/demo/default/skins/header/base/light.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('theme/assets/demo/default/skins/header/menu/light.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('theme/assets/demo/default/skins/brand/light.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('theme/assets/demo/default/skins/aside/light.css')}}" rel="stylesheet" type="text/css" />

        <!--end::Layout Skins -->
        <link rel="shortcut icon" href="{{ asset('theme/assets/media/logos/favicon.ico')}}" />
    </head>

    <!-- end::Head -->

    <!-- begin::Body -->
    <body class="kt-header--fixed kt-header-mobile--fixed kt-subheader--enabled kt-subheader--transparent kt-aside--enabled kt-aside--fixed kt-aside--minimize kt-page--loading">

        <!-- begin:: Page -->

        <!-- begin:: Header Mobile -->
        <div id="kt_header_mobile" class="kt-header-mobile  kt-header-mobile--fixed ">
            <div class="kt-header-mobile__logo">
                <a href="{{ url('home') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="48px" height="48px" viewBox="0 0 24 24" version="1.1">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <rect id="bound" x="0" y="0" width="24" height="24"/>
                            <path d="M13.6855025,18.7082217 C15.9113859,17.8189707 18.682885,17.2495635 22,17 C22,16.9325178 22,13.1012863 22,5.50630526 L21.9999762,5.50630526 C21.9999762,5.23017604 21.7761292,5.00632908 21.5,5.00632908 C21.4957817,5.00632908 21.4915635,5.00638247 21.4873465,5.00648922 C18.658231,5.07811173 15.8291155,5.74261533 13,7 C13,7.04449645 13,10.79246 13,18.2438906 L12.9999854,18.2438906 C12.9999854,18.520041 13.2238496,18.7439052 13.5,18.7439052 C13.5635398,18.7439052 13.6264972,18.7317946 13.6855025,18.7082217 Z" id="Combined-Shape" fill="#5d78ff"/>
                            <path d="M10.3144829,18.7082217 C8.08859955,17.8189707 5.31710038,17.2495635 1.99998542,17 C1.99998542,16.9325178 1.99998542,13.1012863 1.99998542,5.50630526 L2.00000925,5.50630526 C2.00000925,5.23017604 2.22385621,5.00632908 2.49998542,5.00632908 C2.50420375,5.00632908 2.5084219,5.00638247 2.51263888,5.00648922 C5.34175439,5.07811173 8.17086991,5.74261533 10.9999854,7 C10.9999854,7.04449645 10.9999854,10.79246 10.9999854,18.2438906 L11,18.2438906 C11,18.520041 10.7761358,18.7439052 10.4999854,18.7439052 C10.4364457,18.7439052 10.3734882,18.7317946 10.3144829,18.7082217 Z" id="Path-41-Copy" fill="#5d78ff" opacity="0.3"/>
                        </g>
                    </svg>
                </a>
            </div>
            <div class="kt-header-mobile__toolbar">
                <button class="kt-header-mobile__toolbar-toggler kt-header-mobile__toolbar-toggler--left" id="kt_aside_mobile_toggler"><span></span></button>
                <button class="kt-header-mobile__toolbar-toggler" id="kt_header_mobile_toggler"><span></span></button>
                <button class="kt-header-mobile__toolbar-topbar-toggler" id="kt_header_mobile_topbar_toggler"><i class="flaticon-more"></i></button>
            </div>
        </div>

        <!-- end:: Header Mobile -->
        <div class="kt-grid kt-grid--hor kt-grid--root">
            <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">

                <!-- begin:: Aside -->
                <button class="kt-aside-close " id="kt_aside_close_btn"><i class="la la-close"></i></button>
                <div class="kt-aside  kt-aside--fixed  kt-grid__item kt-grid kt-grid--desktop kt-grid--hor-desktop" id="kt_aside">

                    <!-- begin:: Brand -->
                    <div class="kt-aside__brand kt-grid__item " id="kt_aside_brand">
                        <div class="kt-aside__brand-logo">
                            <a href="index.html">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="48px" height="48px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect id="bound" x="0" y="0" width="24" height="24"/>
                                        <path d="M13.6855025,18.7082217 C15.9113859,17.8189707 18.682885,17.2495635 22,17 C22,16.9325178 22,13.1012863 22,5.50630526 L21.9999762,5.50630526 C21.9999762,5.23017604 21.7761292,5.00632908 21.5,5.00632908 C21.4957817,5.00632908 21.4915635,5.00638247 21.4873465,5.00648922 C18.658231,5.07811173 15.8291155,5.74261533 13,7 C13,7.04449645 13,10.79246 13,18.2438906 L12.9999854,18.2438906 C12.9999854,18.520041 13.2238496,18.7439052 13.5,18.7439052 C13.5635398,18.7439052 13.6264972,18.7317946 13.6855025,18.7082217 Z" id="Combined-Shape" fill="#5d78ff"/>
                                        <path d="M10.3144829,18.7082217 C8.08859955,17.8189707 5.31710038,17.2495635 1.99998542,17 C1.99998542,16.9325178 1.99998542,13.1012863 1.99998542,5.50630526 L2.00000925,5.50630526 C2.00000925,5.23017604 2.22385621,5.00632908 2.49998542,5.00632908 C2.50420375,5.00632908 2.5084219,5.00638247 2.51263888,5.00648922 C5.34175439,5.07811173 8.17086991,5.74261533 10.9999854,7 C10.9999854,7.04449645 10.9999854,10.79246 10.9999854,18.2438906 L11,18.2438906 C11,18.520041 10.7761358,18.7439052 10.4999854,18.7439052 C10.4364457,18.7439052 10.3734882,18.7317946 10.3144829,18.7082217 Z" id="Path-41-Copy" fill="#5d78ff" opacity="0.3"/>
                                    </g>
                                </svg>
                            </a>
                        </div>
                    </div>

                    <!-- end:: Brand -->

                    <!-- begin:: Aside Menu -->
                    <div class="kt-aside-menu-wrapper kt-grid__item kt-grid__item--fluid" id="kt_aside_menu_wrapper">
                        <div id="kt_aside_menu" class="kt-aside-menu  kt-aside-menu--dropdown " data-ktmenu-vertical="1" data-ktmenu-dropdown="1" data-ktmenu-scroll="0">
                            <ul class="kt-menu__nav ">
                                <li class="kt-menu__item  kt-menu__item--submenu kt-menu__item--submenu-fullheight kt-menu__item--open kt-menu__item--here" aria-haspopup="true" data-ktmenu-submenu-toggle="click" data-ktmenu-dropdown-toggle-class="kt-aside-menu-overlay--on"><a href="javascript:;" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-icon flaticon2-protection"></i><span class="kt-menu__link-text">Administrar</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
                                    <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                                        <div class="kt-menu__wrapper">
                                            <ul class="kt-menu__subnav">
                                                <li class="kt-menu__item  kt-menu__item--parent kt-menu__item--submenu-fullheight" aria-haspopup="true"><span class="kt-menu__link"><span class="kt-menu__link-text">Administrar</span></span></li>
                                                <li class="kt-menu__item " aria-haspopup="true">
                                                    <a href="#" class="kt-menu__link ">
                                                        <i class="kt-menu__link-icon la la-user"></i><span class="kt-menu__link-text">Clientes</span>
                                                        <span class="kt-menu__link-badge">
                                                            <span class="kt-badge kt-badge--brand">2</span>
                                                        </span>
                                                    </a>
                                                </li>
                                                <li class="kt-menu__item " aria-haspopup="true"><a href="#" class="kt-menu__link "><i class="kt-menu__link-icon la la-users"></i><span class="kt-menu__link-text">Internos</span><span class="kt-menu__link-badge">
                                                            <span class="kt-badge kt-badge--danger">2</span>
                                                        </span></a></li>
                                                <li class="kt-menu__item " aria-haspopup="true"><a href="#" class="kt-menu__link "><i class="kt-menu__link-icon la la-institution"></i><span class="kt-menu__link-text">Juzgados</span></a></li>
                                                <li class="kt-menu__item " aria-haspopup="true"><a href="#" class="kt-menu__link "><i class="kt-menu__link-icon la la-balance-scale"></i><span class="kt-menu__link-text">Tipos de Juicio</span></a></li>
                                                <li class="kt-menu__item " aria-haspopup="true"><a href="#" class="kt-menu__link "><i class="kt-menu__link-icon la la-tachometer"></i><span class="kt-menu__link-text">Macro Etapas</span></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                                <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="click"><a href="javascript:;" class="kt-menu__link kt-menu__toggle"><i style="font-size: 30px" class="kt-menu__link-icon la la-gavel"></i><span class="kt-menu__link-text">Juicios</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
                                    <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                                        <ul class="kt-menu__subnav">
                                            <li class="kt-menu__item  kt-menu__item--parent" aria-haspopup="true"><span class="kt-menu__link"><span class="kt-menu__link-text">Juicios</span></span></li>
                                            <li class="kt-menu__item " aria-haspopup="true"><a href="#" class="kt-menu__link "><i class="kt-menu__link-icon la la-edit"></i><span class="kt-menu__link-text">Revisar / Editar</span></a></li>
                                            <li class="kt-menu__item " aria-haspopup="true"><a href="#" class="kt-menu__link "><i class="kt-menu__link-icon la la-plus"></i><span class="kt-menu__link-text">Cargar</span></a></li>
                                        </ul>
                                    </div>
                                </li>                                
                                <li class="kt-menu__item  kt-menu__item--submenu kt-menu__item--bottom-2" aria-haspopup="true" data-ktmenu-submenu-toggle="click"><a href="javascript:;" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-icon flaticon2-gear"></i><span class="kt-menu__link-text">Settings</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
                                    <div class="kt-menu__submenu kt-menu__submenu--up"><span class="kt-menu__arrow"></span>
                                        <ul class="kt-menu__subnav">
                                            <li class="kt-menu__item  kt-menu__item--parent kt-menu__item--bottom-2" aria-haspopup="true"><span class="kt-menu__link"><span class="kt-menu__link-text">Settings</span></span></li>
                                            <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="#" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-bullet kt-menu__link-bullet--line"><span></span></i><span class="kt-menu__link-text">Profile</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
                                                <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                                                    <ul class="kt-menu__subnav">
                                                        <li class="kt-menu__item " aria-haspopup="true"><a href="#" class="kt-menu__link "><i class="kt-menu__link-icon flaticon-computer"></i><span class="kt-menu__link-text">Pending</span><span class="kt-menu__link-badge"><span class="kt-badge kt-badge--brand">7</span></span></a></li>
                                                        <li class="kt-menu__item " aria-haspopup="true"><a href="#" class="kt-menu__link "><i class="kt-menu__link-icon flaticon-signs-2"></i><span class="kt-menu__link-text">Urgent</span><span class="kt-menu__link-badge"><span class="kt-badge kt-badge--danger">6</span></span></a></li>
                                                        <li class="kt-menu__item " aria-haspopup="true"><a href="#" class="kt-menu__link "><i class="kt-menu__link-icon flaticon-clipboard"></i><span class="kt-menu__link-text">Done</span><span class="kt-menu__link-badge"><span class="kt-badge kt-badge--success">2</span></span></a></li>
                                                        <li class="kt-menu__item " aria-haspopup="true"><a href="#" class="kt-menu__link "><i class="kt-menu__link-icon flaticon-multimedia-2"></i><span class="kt-menu__link-text">Archive</span><span class="kt-menu__link-badge"><span class="kt-badge kt-badge--info kt-badge--inline">245</span></span></a></li>
                                                    </ul>
                                                </div>
                                            </li>
                                            <li class="kt-menu__item " aria-haspopup="true"><a href="#" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--line"><span></span></i><span class="kt-menu__link-text">Accounts</span></a></li>
                                            <li class="kt-menu__item " aria-haspopup="true"><a href="#" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--line"><span></span></i><span class="kt-menu__link-text">Help</span></a></li>
                                            <li class="kt-menu__item " aria-haspopup="true"><a href="#" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--line"><span></span></i><span class="kt-menu__link-text">Notifications</span></a></li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="kt-menu__item  kt-menu__item--submenu kt-menu__item--bottom-1" aria-haspopup="true" data-ktmenu-submenu-toggle="click"><a href="javascript:;" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-icon flaticon2-hourglass-1"></i><span class="kt-menu__link-text">Help</span><span class="kt-menu__link-badge"><span class="kt-badge kt-badge--brand kt-badge--rounded">2</span></span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
                                    <div class="kt-menu__submenu kt-menu__submenu--up"><span class="kt-menu__arrow"></span>
                                        <ul class="kt-menu__subnav">
                                            <li class="kt-menu__item  kt-menu__item--parent kt-menu__item--bottom-1" aria-haspopup="true"><span class="kt-menu__link"><span class="kt-menu__link-text">Help</span><span class="kt-menu__link-badge"><span class="kt-badge kt-badge--brand kt-badge--rounded">2</span></span></span></li>
                                            <li class="kt-menu__item " aria-haspopup="true"><a href="#" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Support</span></a></li>
                                            <li class="kt-menu__item " aria-haspopup="true"><a href="#" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Blog</span></a></li>
                                            <li class="kt-menu__item " aria-haspopup="true"><a href="#" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Documentation</span></a></li>
                                            <li class="kt-menu__item " aria-haspopup="true"><a href="#" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Pricing</span></a></li>
                                            <li class="kt-menu__item " aria-haspopup="true"><a href="#" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Terms</span></a></li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <!-- end:: Aside Menu -->
                </div>
                <div class="kt-aside-menu-overlay"></div>

                <!-- end:: Aside -->
                <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper" id="kt_wrapper">

                    <!-- begin:: Header -->
                    <div id="kt_header" class="kt-header kt-grid kt-grid--ver  kt-header--fixed ">

                        <!-- begin: Header Menu -->
                        <button class="kt-header-menu-wrapper-close" id="kt_header_menu_mobile_close_btn"><i class="la la-close"></i></button>
                        <div class="kt-header-menu-wrapper kt-grid__item kt-grid__item--fluid" id="kt_header_menu_wrapper">
                            <div id="kt_header_menu" class="kt-header-menu kt-header-menu-mobile  kt-header-menu--layout- ">
                                <ul class="kt-menu__nav ">
                                    <li class="kt-menu__item  kt-menu__item--active " aria-haspopup="true"><a href="{{ url('home') }}" class="kt-menu__link "><i class="kt-menu__link-icon flaticon2-protection"></i><span class="kt-menu__link-text">Inicio</span></a></li>
                                    <li class="kt-menu__item" aria-haspopup="true"><a href="{{ url('juicio/create') }}" class="kt-menu__link "><i class="kt-menu__link-icon la la-plus"></i><span class="kt-menu__link-text">Cargar Juicio</span></a></li>
                                    <li class="kt-menu__item" aria-haspopup="true"><a href="{{ url('juicio/edit') }}" class="kt-menu__link "><i class="kt-menu__link-icon la la-edit"></i><span class="kt-menu__link-text">Revisar / Editar</span></a></li>
                                </ul>
                            </div>
                        </div>

                        <!-- end: Header Menu -->

                        <!-- begin:: Header Topbar -->
                        <div class="kt-header__topbar">

                            <!--begin: Search -->
                            <div class="kt-header__topbar-item kt-header__topbar-item--search">
                                <div class="kt-header__topbar-wrapper">
                                    <div class="kt-quick-search" id="kt_quick_search_default">
                                        <form method="get" class="kt-quick-search__form">
                                            <div class="input-group">
                                                <div class="input-group-prepend"><span class="input-group-text"><i class="flaticon2-search-1"></i></span></div>
                                                <input type="text" class="form-control kt-quick-search__input" placeholder="Search...">
                                                <div class="input-group-append"><span class="input-group-text"><i class="la la-close kt-quick-search__close"></i></span></div>
                                            </div>
                                        </form>
                                        <div id="kt_quick_search_toggle" data-toggle="dropdown" data-offset="10px, 0px"></div>
                                        <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-lg">
                                            <div class="kt-quick-search__wrapper kt-scroll" data-scroll="true" data-height="300" data-mobile-height="200">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--end: Search -->

                            <!--begin: Notifications -->
                            <div class="kt-header__topbar-item dropdown">
                                <div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="10px,0px">
                                    <span class="kt-header__topbar-icon kt-header__topbar-icon--success"><i class="flaticon2-bell-alarm-symbol"></i></span>
                                    <span class="kt-hidden kt-badge kt-badge--danger"></span>
                                </div>
                                <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-xl">
                                    <form>

                                        <!--begin: Head -->
                                        <div class="kt-head kt-head--skin-light kt-head--fit-x kt-head--fit-b">
                                            <h3 class="kt-head__title">
                                                User Notifications
                                                &nbsp;
                                                <span class="btn btn-label-primary btn-sm btn-bold btn-font-md">23 new</span>
                                            </h3>
                                            <ul class="nav nav-tabs nav-tabs-line nav-tabs-bold nav-tabs-line-3x nav-tabs-line-brand  kt-notification-item-padding-x" role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link active show" data-toggle="tab" href="#topbar_notifications_notifications" role="tab" aria-selected="true">Alerts</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" data-toggle="tab" href="#topbar_notifications_events" role="tab" aria-selected="false">Events</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" data-toggle="tab" href="#topbar_notifications_logs" role="tab" aria-selected="false">Logs</a>
                                                </li>
                                            </ul>
                                        </div>

                                        <!--end: Head -->
                                        <div class="tab-content">
                                            <div class="tab-pane active show" id="topbar_notifications_notifications" role="tabpanel">
                                                <div class="kt-notification kt-margin-t-10 kt-margin-b-10 kt-scroll" data-scroll="true" data-height="300" data-mobile-height="200">
                                                    <a href="#" class="kt-notification__item">
                                                        <div class="kt-notification__item-icon">
                                                            <i class="flaticon2-line-chart kt-font-success"></i>
                                                        </div>
                                                        <div class="kt-notification__item-details">
                                                            <div class="kt-notification__item-title">
                                                                New order has been received
                                                            </div>
                                                            <div class="kt-notification__item-time">
                                                                2 hrs ago
                                                            </div>
                                                        </div>
                                                    </a>
                                                    <a href="#" class="kt-notification__item">
                                                        <div class="kt-notification__item-icon">
                                                            <i class="flaticon2-box-1 kt-font-brand"></i>
                                                        </div>
                                                        <div class="kt-notification__item-details">
                                                            <div class="kt-notification__item-title">
                                                                New customer is registered
                                                            </div>
                                                            <div class="kt-notification__item-time">
                                                                3 hrs ago
                                                            </div>
                                                        </div>
                                                    </a>
                                                    <a href="#" class="kt-notification__item">
                                                        <div class="kt-notification__item-icon">
                                                            <i class="flaticon2-chart2 kt-font-danger"></i>
                                                        </div>
                                                        <div class="kt-notification__item-details">
                                                            <div class="kt-notification__item-title">
                                                                Application has been approved
                                                            </div>
                                                            <div class="kt-notification__item-time">
                                                                3 hrs ago
                                                            </div>
                                                        </div>
                                                    </a>
                                                    <a href="#" class="kt-notification__item">
                                                        <div class="kt-notification__item-icon">
                                                            <i class="flaticon2-image-file kt-font-warning"></i>
                                                        </div>
                                                        <div class="kt-notification__item-details">
                                                            <div class="kt-notification__item-title">
                                                                New file has been uploaded
                                                            </div>
                                                            <div class="kt-notification__item-time">
                                                                5 hrs ago
                                                            </div>
                                                        </div>
                                                    </a>
                                                    <a href="#" class="kt-notification__item">
                                                        <div class="kt-notification__item-icon">
                                                            <i class="flaticon2-bar-chart kt-font-info"></i>
                                                        </div>
                                                        <div class="kt-notification__item-details">
                                                            <div class="kt-notification__item-title">
                                                                New user feedback received
                                                            </div>
                                                            <div class="kt-notification__item-time">
                                                                8 hrs ago
                                                            </div>
                                                        </div>
                                                    </a>
                                                    <a href="#" class="kt-notification__item">
                                                        <div class="kt-notification__item-icon">
                                                            <i class="flaticon2-pie-chart-2 kt-font-success"></i>
                                                        </div>
                                                        <div class="kt-notification__item-details">
                                                            <div class="kt-notification__item-title">
                                                                System reboot has been successfully completed
                                                            </div>
                                                            <div class="kt-notification__item-time">
                                                                12 hrs ago
                                                            </div>
                                                        </div>
                                                    </a>
                                                    <a href="#" class="kt-notification__item">
                                                        <div class="kt-notification__item-icon">
                                                            <i class="flaticon2-favourite kt-font-danger"></i>
                                                        </div>
                                                        <div class="kt-notification__item-details">
                                                            <div class="kt-notification__item-title">
                                                                New order has been placed
                                                            </div>
                                                            <div class="kt-notification__item-time">
                                                                15 hrs ago
                                                            </div>
                                                        </div>
                                                    </a>
                                                    <a href="#" class="kt-notification__item kt-notification__item--read">
                                                        <div class="kt-notification__item-icon">
                                                            <i class="flaticon2-safe kt-font-primary"></i>
                                                        </div>
                                                        <div class="kt-notification__item-details">
                                                            <div class="kt-notification__item-title">
                                                                Company meeting canceled
                                                            </div>
                                                            <div class="kt-notification__item-time">
                                                                19 hrs ago
                                                            </div>
                                                        </div>
                                                    </a>
                                                    <a href="#" class="kt-notification__item">
                                                        <div class="kt-notification__item-icon">
                                                            <i class="flaticon2-psd kt-font-success"></i>
                                                        </div>
                                                        <div class="kt-notification__item-details">
                                                            <div class="kt-notification__item-title">
                                                                New report has been received
                                                            </div>
                                                            <div class="kt-notification__item-time">
                                                                23 hrs ago
                                                            </div>
                                                        </div>
                                                    </a>
                                                    <a href="#" class="kt-notification__item">
                                                        <div class="kt-notification__item-icon">
                                                            <i class="flaticon-download-1 kt-font-danger"></i>
                                                        </div>
                                                        <div class="kt-notification__item-details">
                                                            <div class="kt-notification__item-title">
                                                                Finance report has been generated
                                                            </div>
                                                            <div class="kt-notification__item-time">
                                                                25 hrs ago
                                                            </div>
                                                        </div>
                                                    </a>
                                                    <a href="#" class="kt-notification__item">
                                                        <div class="kt-notification__item-icon">
                                                            <i class="flaticon-security kt-font-warning"></i>
                                                        </div>
                                                        <div class="kt-notification__item-details">
                                                            <div class="kt-notification__item-title">
                                                                New customer comment recieved
                                                            </div>
                                                            <div class="kt-notification__item-time">
                                                                2 days ago
                                                            </div>
                                                        </div>
                                                    </a>
                                                    <a href="#" class="kt-notification__item">
                                                        <div class="kt-notification__item-icon">
                                                            <i class="flaticon2-pie-chart kt-font-success"></i>
                                                        </div>
                                                        <div class="kt-notification__item-details">
                                                            <div class="kt-notification__item-title">
                                                                New customer is registered
                                                            </div>
                                                            <div class="kt-notification__item-time">
                                                                3 days ago
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="tab-pane" id="topbar_notifications_events" role="tabpanel">
                                                <div class="kt-notification kt-margin-t-10 kt-margin-b-10 kt-scroll" data-scroll="true" data-height="300" data-mobile-height="200">
                                                    <a href="#" class="kt-notification__item">
                                                        <div class="kt-notification__item-icon">
                                                            <i class="flaticon2-psd kt-font-success"></i>
                                                        </div>
                                                        <div class="kt-notification__item-details">
                                                            <div class="kt-notification__item-title">
                                                                New report has been received
                                                            </div>
                                                            <div class="kt-notification__item-time">
                                                                23 hrs ago
                                                            </div>
                                                        </div>
                                                    </a>
                                                    <a href="#" class="kt-notification__item">
                                                        <div class="kt-notification__item-icon">
                                                            <i class="flaticon-download-1 kt-font-danger"></i>
                                                        </div>
                                                        <div class="kt-notification__item-details">
                                                            <div class="kt-notification__item-title">
                                                                Finance report has been generated
                                                            </div>
                                                            <div class="kt-notification__item-time">
                                                                25 hrs ago
                                                            </div>
                                                        </div>
                                                    </a>
                                                    <a href="#" class="kt-notification__item">
                                                        <div class="kt-notification__item-icon">
                                                            <i class="flaticon2-line-chart kt-font-success"></i>
                                                        </div>
                                                        <div class="kt-notification__item-details">
                                                            <div class="kt-notification__item-title">
                                                                New order has been received
                                                            </div>
                                                            <div class="kt-notification__item-time">
                                                                2 hrs ago
                                                            </div>
                                                        </div>
                                                    </a>
                                                    <a href="#" class="kt-notification__item">
                                                        <div class="kt-notification__item-icon">
                                                            <i class="flaticon2-box-1 kt-font-brand"></i>
                                                        </div>
                                                        <div class="kt-notification__item-details">
                                                            <div class="kt-notification__item-title">
                                                                New customer is registered
                                                            </div>
                                                            <div class="kt-notification__item-time">
                                                                3 hrs ago
                                                            </div>
                                                        </div>
                                                    </a>
                                                    <a href="#" class="kt-notification__item">
                                                        <div class="kt-notification__item-icon">
                                                            <i class="flaticon2-chart2 kt-font-danger"></i>
                                                        </div>
                                                        <div class="kt-notification__item-details">
                                                            <div class="kt-notification__item-title">
                                                                Application has been approved
                                                            </div>
                                                            <div class="kt-notification__item-time">
                                                                3 hrs ago
                                                            </div>
                                                        </div>
                                                    </a>
                                                    <a href="#" class="kt-notification__item">
                                                        <div class="kt-notification__item-icon">
                                                            <i class="flaticon2-image-file kt-font-warning"></i>
                                                        </div>
                                                        <div class="kt-notification__item-details">
                                                            <div class="kt-notification__item-title">
                                                                New file has been uploaded
                                                            </div>
                                                            <div class="kt-notification__item-time">
                                                                5 hrs ago
                                                            </div>
                                                        </div>
                                                    </a>
                                                    <a href="#" class="kt-notification__item">
                                                        <div class="kt-notification__item-icon">
                                                            <i class="flaticon2-bar-chart kt-font-info"></i>
                                                        </div>
                                                        <div class="kt-notification__item-details">
                                                            <div class="kt-notification__item-title">
                                                                New user feedback received
                                                            </div>
                                                            <div class="kt-notification__item-time">
                                                                8 hrs ago
                                                            </div>
                                                        </div>
                                                    </a>
                                                    <a href="#" class="kt-notification__item">
                                                        <div class="kt-notification__item-icon">
                                                            <i class="flaticon2-pie-chart-2 kt-font-success"></i>
                                                        </div>
                                                        <div class="kt-notification__item-details">
                                                            <div class="kt-notification__item-title">
                                                                System reboot has been successfully completed
                                                            </div>
                                                            <div class="kt-notification__item-time">
                                                                12 hrs ago
                                                            </div>
                                                        </div>
                                                    </a>
                                                    <a href="#" class="kt-notification__item">
                                                        <div class="kt-notification__item-icon">
                                                            <i class="flaticon2-favourite kt-font-brand"></i>
                                                        </div>
                                                        <div class="kt-notification__item-details">
                                                            <div class="kt-notification__item-title">
                                                                New order has been placed
                                                            </div>
                                                            <div class="kt-notification__item-time">
                                                                15 hrs ago
                                                            </div>
                                                        </div>
                                                    </a>
                                                    <a href="#" class="kt-notification__item kt-notification__item--read">
                                                        <div class="kt-notification__item-icon">
                                                            <i class="flaticon2-safe kt-font-primary"></i>
                                                        </div>
                                                        <div class="kt-notification__item-details">
                                                            <div class="kt-notification__item-title">
                                                                Company meeting canceled
                                                            </div>
                                                            <div class="kt-notification__item-time">
                                                                19 hrs ago
                                                            </div>
                                                        </div>
                                                    </a>
                                                    <a href="#" class="kt-notification__item">
                                                        <div class="kt-notification__item-icon">
                                                            <i class="flaticon2-psd kt-font-success"></i>
                                                        </div>
                                                        <div class="kt-notification__item-details">
                                                            <div class="kt-notification__item-title">
                                                                New report has been received
                                                            </div>
                                                            <div class="kt-notification__item-time">
                                                                23 hrs ago
                                                            </div>
                                                        </div>
                                                    </a>
                                                    <a href="#" class="kt-notification__item">
                                                        <div class="kt-notification__item-icon">
                                                            <i class="flaticon-download-1 kt-font-danger"></i>
                                                        </div>
                                                        <div class="kt-notification__item-details">
                                                            <div class="kt-notification__item-title">
                                                                Finance report has been generated
                                                            </div>
                                                            <div class="kt-notification__item-time">
                                                                25 hrs ago
                                                            </div>
                                                        </div>
                                                    </a>
                                                    <a href="#" class="kt-notification__item">
                                                        <div class="kt-notification__item-icon">
                                                            <i class="flaticon-security kt-font-warning"></i>
                                                        </div>
                                                        <div class="kt-notification__item-details">
                                                            <div class="kt-notification__item-title">
                                                                New customer comment recieved
                                                            </div>
                                                            <div class="kt-notification__item-time">
                                                                2 days ago
                                                            </div>
                                                        </div>
                                                    </a>
                                                    <a href="#" class="kt-notification__item">
                                                        <div class="kt-notification__item-icon">
                                                            <i class="flaticon2-pie-chart kt-font-success"></i>
                                                        </div>
                                                        <div class="kt-notification__item-details">
                                                            <div class="kt-notification__item-title">
                                                                New customer is registered
                                                            </div>
                                                            <div class="kt-notification__item-time">
                                                                3 days ago
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="tab-pane" id="topbar_notifications_logs" role="tabpanel">
                                                <div class="kt-grid kt-grid--ver" style="min-height: 200px;">
                                                    <div class="kt-grid kt-grid--hor kt-grid__item kt-grid__item--fluid kt-grid__item--middle">
                                                        <div class="kt-grid__item kt-grid__item--middle kt-align-center">
                                                            All caught up!
                                                            <br>No new notifications.
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <!--end: Notifications -->

                            <!--begin: User bar -->
                            <div class="kt-header__topbar-item kt-header__topbar-item--user">
                                <div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="10px,0px">
                                    <span class="kt-hidden kt-header__topbar-welcome">Hi,</span>
                                    <span class="kt-hidden kt-header__topbar-username">Nick</span>
                                    <img class="kt-hidden" alt="Pic" src="{{ asset('theme/assets/media/users/300_21.jpg')}}" />
                                    <span class="kt-header__topbar-icon"><i class="flaticon2-user-outline-symbol"></i></span>
                                </div>
                                <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-xl">

                                    <!--begin: Head -->
                                    <div class="kt-user-card kt-user-card--skin-light kt-notification-item-padding-x">
                                        <div class="kt-user-card__avatar">
                                            <img class="kt-hidden-" alt="Pic" src="{{ asset('theme/assets/media/users/300_25.jpg')}}" />

                                            <!--use below badge element instead the user avatar to display username's first letter(remove kt-hidden class to display it) -->
                                            <span class="kt-badge kt-badge--username kt-badge--unified-success kt-badge--lg kt-badge--rounded kt-badge--bold kt-hidden">S</span>
                                        </div>
                                        <div class="kt-user-card__name">
                                            Sean Stone
                                        </div>
                                        <div class="kt-user-card__badge">
                                            <span class="btn btn-label-primary btn-sm btn-bold btn-font-md">23 messages</span>
                                        </div>
                                    </div>

                                    <!--end: Head -->

                                    <!--begin: Navigation -->
                                    <div class="kt-notification">
                                        <a href="#" class="kt-notification__item">
                                            <div class="kt-notification__item-icon">
                                                <i class="flaticon2-calendar-3 kt-font-success"></i>
                                            </div>
                                            <div class="kt-notification__item-details">
                                                <div class="kt-notification__item-title kt-font-bold">
                                                    My Profile
                                                </div>
                                                <div class="kt-notification__item-time">
                                                    Account settings and more
                                                </div>
                                            </div>
                                        </a>
                                        <a href="#" class="kt-notification__item">
                                            <div class="kt-notification__item-icon">
                                                <i class="flaticon2-mail kt-font-warning"></i>
                                            </div>
                                            <div class="kt-notification__item-details">
                                                <div class="kt-notification__item-title kt-font-bold">
                                                    My Messages
                                                </div>
                                                <div class="kt-notification__item-time">
                                                    Inbox and tasks
                                                </div>
                                            </div>
                                        </a>
                                        <a href="#" class="kt-notification__item">
                                            <div class="kt-notification__item-icon">
                                                <i class="flaticon2-rocket-1 kt-font-danger"></i>
                                            </div>
                                            <div class="kt-notification__item-details">
                                                <div class="kt-notification__item-title kt-font-bold">
                                                    My Activities
                                                </div>
                                                <div class="kt-notification__item-time">
                                                    Logs and notifications
                                                </div>
                                            </div>
                                        </a>
                                        <a href="#" class="kt-notification__item">
                                            <div class="kt-notification__item-icon">
                                                <i class="flaticon2-hourglass kt-font-brand"></i>
                                            </div>
                                            <div class="kt-notification__item-details">
                                                <div class="kt-notification__item-title kt-font-bold">
                                                    My Tasks
                                                </div>
                                                <div class="kt-notification__item-time">
                                                    latest tasks and projects
                                                </div>
                                            </div>
                                        </a>
                                        <div class="kt-notification__custom">
                                            <a href="custom_user_login-v2.html" target="_blank" class="btn btn-label-brand btn-sm btn-bold">Sign Out</a>
                                        </div>
                                    </div>

                                    <!--end: Navigation -->
                                </div>
                            </div>

                            <!--end: User bar -->
                            
                        </div>

                        <!-- end:: Header Topbar -->
                    </div>

                    <!-- end:: Header -->
                    <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor">

                        <!-- begin:: Subheader -->
                        <div class="kt-subheader   kt-grid__item" id="kt_subheader">
                            <div class="kt-subheader__main">
                                <h3 class="kt-subheader__title">
                                    Escritorio </h3>
                            </div>
                            <div class="kt-subheader__toolbar">
                                
                            </div>
                        </div>

                        <!-- end:: Subheader -->

                        <!-- begin:: Content -->

                        <!-- begin:: Content -->
                        <div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">

                            <!--Begin::Dashboard 7-->

                            @yield('content')

                            <!--End::Dashboard 7-->
                        </div>

                        <!-- end:: Content -->

                        <!-- end:: Content -->
                    </div>

                    <!-- begin:: Footer -->
                    <div class="kt-footer kt-grid__item kt-grid kt-grid--desktop kt-grid--ver-desktop">
                        <div class="kt-footer__copyright">
                            2019&nbsp;&copy;&nbsp;<a href="http://keenthemes.com/metronic" target="_blank" class="kt-link">Keenthemes</a>
                        </div>
                        <div class="kt-footer__menu">
                            <a href="http://keenthemes.com/metronic" target="_blank" class="kt-footer__menu-link kt-link">About</a>
                            <a href="http://keenthemes.com/metronic" target="_blank" class="kt-footer__menu-link kt-link">Team</a>
                            <a href="http://keenthemes.com/metronic" target="_blank" class="kt-footer__menu-link kt-link">Contact</a>
                        </div>
                    </div>

                    <!-- end:: Footer -->
                </div>
            </div>
        </div>

        <!-- end:: Page -->

        <!-- begin::Scrolltop -->
        <div id="kt_scrolltop" class="kt-scrolltop">
            <i class="fa fa-arrow-up"></i>
        </div>

        <!-- end::Scrolltop -->

        <!-- begin::Sticky Toolbar -->
        <ul class="kt-sticky-toolbar" style="margin-top: 30px;">
            <li class="kt-sticky-toolbar__item kt-sticky-toolbar__item--brand" id="kt_demo_panel_toggle" data-toggle="kt-tooltip" title="Ver listado de clientes" data-placement="right">
                <a href="#" class=""><i class="la la-users"></i></a>
            </li>
            <li class="kt-sticky-toolbar__item kt-sticky-toolbar__item--danger" data-toggle="kt-tooltip" title="Listado de Internos" data-placement="left">
                <a href="{{url('interns')}}"><i class="la la-user"></i></a>
            </li>
        </ul>

        <!-- end::Sticky Toolbar -->

        <!-- begin::Demo Panel -->
        <div id="kt_demo_panel" class="kt-demo-panel">
            <div class="kt-demo-panel__head">
                <h3 class="kt-demo-panel__title">
                    Listado de internos

                    <!--<small>5</small>-->
                </h3>
                <a href="#" class="kt-demo-panel__close" id="kt_demo_panel_close"><i class="flaticon2-delete"></i></a>
            </div>
        </div>

        <!-- end::Demo Panel -->

        <!-- begin::Global Config(global config for global JS sciprts) -->
        <script>
            var KTAppOptions = {
                "colors": {
                    "state": {
                        "brand": "#22b9ff",
                        "light": "#ffffff",
                        "dark": "#282a3c",
                        "primary": "#5867dd",
                        "success": "#34bfa3",
                        "info": "#36a3f7",
                        "warning": "#ffb822",
                        "danger": "#fd3995"
                    },
                    "base": {
                        "label": ["#c5cbe3", "#a1a8c3", "#3d4465", "#3e4466"],
                        "shape": ["#f0f3ff", "#d9dffa", "#afb4d4", "#646c9a"]
                    }
                }
            };
        </script>

        <!-- end::Global Config -->

        <!--begin:: Global Mandatory Vendors -->
        <script src="{{ asset('theme/assets/vendors/general/jquery/dist/jquery.js')}}" type="text/javascript"></script>
        <script src="{{ asset('theme/assets/vendors/general/popper.js/dist/umd/popper.js')}}" type="text/javascript"></script>
        <script src="{{ asset('theme/assets/vendors/general/bootstrap/dist/js/bootstrap.min.js')}}" type="text/javascript"></script>
        <script src="{{ asset('theme/assets/vendors/general/js-cookie/src/js.cookie.js')}}" type="text/javascript"></script>
        <script src="{{ asset('theme/assets/vendors/general/moment/min/moment.min.js')}}" type="text/javascript"></script>
        <script src="{{ asset('theme/assets/vendors/general/tooltip.js/dist/umd/tooltip.min.js')}}" type="text/javascript"></script>
        <script src="{{ asset('theme/assets/vendors/general/perfect-scrollbar/dist/perfect-scrollbar.js')}}" type="text/javascript"></script>
        <script src="{{ asset('theme/assets/vendors/general/sticky-js/dist/sticky.min.js')}}" type="text/javascript"></script>
        <script src="{{ asset('theme/assets/vendors/general/wnumb/wNumb.js')}}" type="text/javascript"></script>

        <!--end:: Global Mandatory Vendors -->

        <!--begin:: Global Optional Vendors -->
        <script src="{{ asset('theme/assets/vendors/general/jquery-form/dist/jquery.form.min.js')}}" type="text/javascript"></script>
        <script src="{{ asset('theme/assets/vendors/general/block-ui/jquery.blockUI.js')}}" type="text/javascript"></script>
        <script src="{{ asset('theme/assets/vendors/general/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}" type="text/javascript"></script>
        <script src="{{ asset('theme/assets/vendors/custom/components/vendors/bootstrap-datepicker/init.js')}}" type="text/javascript"></script>
        <script src="{{ asset('theme/assets/vendors/general/bootstrap-datetime-picker/js/bootstrap-datetimepicker.min.js')}}" type="text/javascript"></script>
        <script src="{{ asset('theme/assets/vendors/general/bootstrap-timepicker/js/bootstrap-timepicker.min.js')}}" type="text/javascript"></script>
        <script src="{{ asset('theme/assets/vendors/custom/components/vendors/bootstrap-timepicker/init.js')}}" type="text/javascript"></script>
        <script src="{{ asset('theme/assets/vendors/general/bootstrap-daterangepicker/daterangepicker.js')}}" type="text/javascript"></script>
        <script src="{{ asset('theme/assets/vendors/general/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.js')}}" type="text/javascript"></script>
        <script src="{{ asset('theme/assets/vendors/general/bootstrap-maxlength/src/bootstrap-maxlength.js')}}" type="text/javascript"></script>
        <script src="{{ asset('theme/assets/vendors/custom/vendors/bootstrap-multiselectsplitter/bootstrap-multiselectsplitter.min.js')}}" type="text/javascript"></script>
        <script src="{{ asset('theme/assets/vendors/general/bootstrap-select/dist/js/bootstrap-select.js')}}" type="text/javascript"></script>
        <script src="{{ asset('theme/assets/vendors/general/bootstrap-switch/dist/js/bootstrap-switch.js')}}" type="text/javascript"></script>
        <script src="{{ asset('theme/assets/vendors/custom/components/vendors/bootstrap-switch/init.js')}}" type="text/javascript"></script>
        <script src="{{ asset('theme/assets/vendors/general/select2/dist/js/select2.full.js')}}" type="text/javascript"></script>
        <script src="{{ asset('theme/assets/vendors/general/ion-rangeslider/js/ion.rangeSlider.js')}}" type="text/javascript"></script>
        <script src="{{ asset('theme/assets/vendors/general/typeahead.js/dist/typeahead.bundle.js')}}" type="text/javascript"></script>
        <script src="{{ asset('theme/assets/vendors/general/handlebars/dist/handlebars.js')}}" type="text/javascript"></script>
        <script src="{{ asset('theme/assets/vendors/general/inputmask/dist/jquery.inputmask.bundle.js')}}" type="text/javascript"></script>
        <script src="{{ asset('theme/assets/vendors/general/inputmask/dist/inputmask/inputmask.date.extensions.js')}}" type="text/javascript"></script>
        <script src="{{ asset('theme/assets/vendors/general/inputmask/dist/inputmask/inputmask.numeric.extensions.js')}}" type="text/javascript"></script>
        <script src="{{ asset('theme/assets/vendors/general/nouislider/distribute/nouislider.js')}}" type="text/javascript"></script>
        <script src="{{ asset('theme/assets/vendors/general/owl.carousel/dist/owl.carousel.js')}}" type="text/javascript"></script>
        <script src="{{ asset('theme/assets/vendors/general/autosize/dist/autosize.js')}}" type="text/javascript"></script>
        <script src="{{ asset('theme/assets/vendors/general/clipboard/dist/clipboard.min.js')}}" type="text/javascript"></script>
        <script src="{{ asset('theme/assets/vendors/general/dropzone/dist/dropzone.js')}}" type="text/javascript"></script>
        <script src="{{ asset('theme/assets/vendors/general/summernote/dist/summernote.js')}}" type="text/javascript"></script>
        <script src="{{ asset('theme/assets/vendors/general/markdown/lib/markdown.js')}}" type="text/javascript"></script>
        <script src="{{ asset('theme/assets/vendors/general/bootstrap-markdown/js/bootstrap-markdown.js')}}" type="text/javascript"></script>
        <script src="{{ asset('theme/assets/vendors/custom/components/vendors/bootstrap-markdown/init.js')}}" type="text/javascript"></script>
        <script src="{{ asset('theme/assets/vendors/general/bootstrap-notify/bootstrap-notify.min.js')}}" type="text/javascript"></script>
        <script src="{{ asset('theme/assets/vendors/custom/components/vendors/bootstrap-notify/init.js')}}" type="text/javascript"></script>
        <script src="{{ asset('theme/assets/vendors/general/jquery-validation/dist/jquery.validate.js')}}" type="text/javascript"></script>
        <script src="{{ asset('theme/assets/vendors/general/jquery-validation/dist/additional-methods.js')}}" type="text/javascript"></script>
        <script src="{{ asset('theme/assets/vendors/custom/components/vendors/jquery-validation/init.js')}}" type="text/javascript"></script>
        <script src="{{ asset('theme/assets/vendors/general/toastr/build/toastr.min.js')}}" type="text/javascript"></script>
        <script src="{{ asset('theme/assets/vendors/general/raphael/raphael.js')}}" type="text/javascript"></script>
        <script src="{{ asset('theme/assets/vendors/general/morris.js/morris.js')}}" type="text/javascript"></script>
        <script src="{{ asset('theme/assets/vendors/general/chart.js/dist/Chart.bundle.js')}}" type="text/javascript"></script>
        <script src="{{ asset('theme/assets/vendors/custom/vendors/bootstrap-session-timeout/dist/bootstrap-session-timeout.min.js')}}" type="text/javascript"></script>
        <script src="{{ asset('theme/assets/vendors/custom/vendors/jquery-idletimer/idle-timer.min.js')}}" type="text/javascript"></script>
        <script src="{{ asset('theme/assets/vendors/general/waypoints/lib/jquery.waypoints.js')}}" type="text/javascript"></script>
        <script src="{{ asset('theme/assets/vendors/general/counterup/jquery.counterup.js')}}" type="text/javascript"></script>
        <script src="{{ asset('theme/assets/vendors/general/es6-promise-polyfill/promise.min.js')}}" type="text/javascript"></script>
        <script src="{{ asset('theme/assets/vendors/general/sweetalert2/dist/sweetalert2.min.js')}}" type="text/javascript"></script>
        <script src="{{ asset('theme/assets/vendors/custom/components/vendors/sweetalert2/init.js')}}" type="text/javascript"></script>
        <script src="{{ asset('theme/assets/vendors/general/jquery.repeater/src/lib.js')}}" type="text/javascript"></script>
        <script src="{{ asset('theme/assets/vendors/general/jquery.repeater/src/jquery.input.js')}}" type="text/javascript"></script>
        <script src="{{ asset('theme/assets/vendors/general/jquery.repeater/src/repeater.js')}}" type="text/javascript"></script>
        <script src="{{ asset('theme/assets/vendors/general/dompurify/dist/purify.js')}}" type="text/javascript"></script>

        <!--end:: Global Optional Vendors -->

        <!--begin::Global Theme Bundle(used by all pages) -->
        <script src="{{ asset('theme/assets/demo/demo7/base/scripts.bundle.js')}}" type="text/javascript"></script>

        <!--end::Global Theme Bundle -->

        <!--begin::Page Vendors(used by this page) -->
        <script src="{{ asset('theme/assets/vendors/custom/fullcalendar/fullcalendar.bundle.js')}}" type="text/javascript"></script>

        <!--end::Page Vendors -->

        <!--begin::Page Scripts(used by this page) -->
        <script src="{{ asset('theme/assets/app/custom/general/dashboard.js')}}" type="text/javascript"></script>

        <!--end::Page Scripts -->

        <!--begin::Global App Bundle(used by all pages) -->
        <script src="{{ asset('theme/assets/app/bundle/app.bundle.js')}}" type="text/javascript"></script>

        <!--end::Global App Bundle -->

        <!--begin::Particular files scripts -->
        @yield('scripts')
        
        <!--end::Particular files scripts -->
    </body>

    <!-- end::Body -->
</html>