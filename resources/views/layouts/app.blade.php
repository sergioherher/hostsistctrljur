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
        <title>Metronic | Dashboard</title>
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
                                    <li class="kt-menu__item  kt-menu__item--active " aria-haspopup="true"><a href="index.html" class="kt-menu__link "><span class="kt-menu__link-text">Dashboard</span></a></li>
                                    <li class="kt-menu__item  kt-menu__item--submenu kt-menu__item--rel" data-ktmenu-submenu-toggle="click" aria-haspopup="true"><a href="javascript:;" class="kt-menu__link kt-menu__toggle"><span class="kt-menu__link-text">Pages</span><i class="kt-menu__hor-arrow la la-angle-down"></i></a>
                                        <div class="kt-menu__submenu kt-menu__submenu--classic kt-menu__submenu--left">
                                            <ul class="kt-menu__subnav">
                                                <li class="kt-menu__item " aria-haspopup="true"><a href="javascript:;" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Create New Post</span></a></li>
                                                <li class="kt-menu__item " aria-haspopup="true"><a href="#" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Generate Reports</span><span class="kt-menu__link-badge"><span class="kt-badge kt-badge--success">2</span></span></a></li>
                                                <li class="kt-menu__item  kt-menu__item--submenu" data-ktmenu-submenu-toggle="hover" aria-haspopup="true"><a href="#" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Manage Orders</span><i class="kt-menu__hor-arrow la la-angle-right"></i></a>
                                                    <div class="kt-menu__submenu kt-menu__submenu--classic kt-menu__submenu--right">
                                                        <ul class="kt-menu__subnav">
                                                            <li class="kt-menu__item " aria-haspopup="true"><a href="#" class="kt-menu__link "><span class="kt-menu__link-text">Latest Orders</span></a></li>
                                                            <li class="kt-menu__item " aria-haspopup="true"><a href="#" class="kt-menu__link "><span class="kt-menu__link-text">Pending Orders</span></a></li>
                                                            <li class="kt-menu__item " aria-haspopup="true"><a href="#" class="kt-menu__link "><span class="kt-menu__link-text">Processed Orders</span></a></li>
                                                            <li class="kt-menu__item " aria-haspopup="true"><a href="#" class="kt-menu__link "><span class="kt-menu__link-text">Delivery Reports</span></a></li>
                                                            <li class="kt-menu__item " aria-haspopup="true"><a href="#" class="kt-menu__link "><span class="kt-menu__link-text">Payments</span></a></li>
                                                            <li class="kt-menu__item " aria-haspopup="true"><a href="#" class="kt-menu__link "><span class="kt-menu__link-text">Customers</span></a></li>
                                                        </ul>
                                                    </div>
                                                </li>
                                                <li class="kt-menu__item  kt-menu__item--submenu" data-ktmenu-submenu-toggle="hover" aria-haspopup="true"><a href="#" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Customer Feedbacks</span><i class="kt-menu__hor-arrow la la-angle-right"></i></a>
                                                    <div class="kt-menu__submenu kt-menu__submenu--classic kt-menu__submenu--right">
                                                        <ul class="kt-menu__subnav">
                                                            <li class="kt-menu__item " aria-haspopup="true"><a href="#" class="kt-menu__link "><span class="kt-menu__link-text">Customer Feedbacks</span></a></li>
                                                            <li class="kt-menu__item " aria-haspopup="true"><a href="#" class="kt-menu__link "><span class="kt-menu__link-text">Supplier Feedbacks</span></a></li>
                                                            <li class="kt-menu__item " aria-haspopup="true"><a href="#" class="kt-menu__link "><span class="kt-menu__link-text">Reviewed Feedbacks</span></a></li>
                                                            <li class="kt-menu__item " aria-haspopup="true"><a href="#" class="kt-menu__link "><span class="kt-menu__link-text">Resolved Feedbacks</span></a></li>
                                                            <li class="kt-menu__item " aria-haspopup="true"><a href="#" class="kt-menu__link "><span class="kt-menu__link-text">Feedback Reports</span></a></li>
                                                        </ul>
                                                    </div>
                                                </li>
                                                <li class="kt-menu__item " aria-haspopup="true"><a href="#" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Register Member</span></a></li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="kt-menu__item  kt-menu__item--submenu kt-menu__item--rel" data-ktmenu-submenu-toggle="click" aria-haspopup="true"><a href="javascript:;" class="kt-menu__link kt-menu__toggle"><span class="kt-menu__link-text">Reports</span><i class="kt-menu__hor-arrow la la-angle-down"></i></a>
                                        <div class="kt-menu__submenu  kt-menu__submenu--fixed kt-menu__submenu--left" style="width:1000px">
                                            <div class="kt-menu__subnav">
                                                <ul class="kt-menu__content">
                                                    <li class="kt-menu__item ">
                                                        <h3 class="kt-menu__heading kt-menu__toggle"><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Finance Reports</span><i class="kt-menu__ver-arrow la la-angle-right"></i></h3>
                                                        <ul class="kt-menu__inner">
                                                            <li class="kt-menu__item " aria-haspopup="true"><a href="#" class="kt-menu__link "><i class="kt-menu__link-icon flaticon-map"></i><span class="kt-menu__link-text">Annual Reports</span></a></li>
                                                            <li class="kt-menu__item " aria-haspopup="true"><a href="#" class="kt-menu__link "><i class="kt-menu__link-icon flaticon-user"></i><span class="kt-menu__link-text">HR Reports</span></a></li>
                                                            <li class="kt-menu__item " aria-haspopup="true"><a href="#" class="kt-menu__link "><i class="kt-menu__link-icon flaticon-clipboard"></i><span class="kt-menu__link-text">IPO Reports</span></a></li>
                                                            <li class="kt-menu__item " aria-haspopup="true"><a href="#" class="kt-menu__link "><i class="kt-menu__link-icon flaticon-graphic-1"></i><span class="kt-menu__link-text">Finance Margins</span></a></li>
                                                            <li class="kt-menu__item " aria-haspopup="true"><a href="#" class="kt-menu__link "><i class="kt-menu__link-icon flaticon-graphic-2"></i><span class="kt-menu__link-text">Revenue Reports</span></a></li>
                                                        </ul>
                                                    </li>
                                                    <li class="kt-menu__item ">
                                                        <h3 class="kt-menu__heading kt-menu__toggle"><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Project Reports</span><i class="kt-menu__ver-arrow la la-angle-right"></i></h3>
                                                        <ul class="kt-menu__inner">
                                                            <li class="kt-menu__item " aria-haspopup="true"><a href="#" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--line"><span></span></i><span class="kt-menu__link-text">Coca Cola CRM</span></a></li>
                                                            <li class="kt-menu__item " aria-haspopup="true"><a href="#" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--line"><span></span></i><span class="kt-menu__link-text">Delta Airlines Booking Site</span></a></li>
                                                            <li class="kt-menu__item " aria-haspopup="true"><a href="#" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--line"><span></span></i><span class="kt-menu__link-text">Malibu Accounting</span></a></li>
                                                            <li class="kt-menu__item " aria-haspopup="true"><a href="#" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--line"><span></span></i><span class="kt-menu__link-text">Vineseed Website Rewamp</span></a></li>
                                                            <li class="kt-menu__item " aria-haspopup="true"><a href="#" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--line"><span></span></i><span class="kt-menu__link-text">Zircon Mobile App</span></a></li>
                                                            <li class="kt-menu__item " aria-haspopup="true"><a href="#" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--line"><span></span></i><span class="kt-menu__link-text">Mercury CMS</span></a></li>
                                                        </ul>
                                                    </li>
                                                    <li class="kt-menu__item ">
                                                        <h3 class="kt-menu__heading kt-menu__toggle"><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">HR Reports</span><i class="kt-menu__ver-arrow la la-angle-right"></i></h3>
                                                        <ul class="kt-menu__inner">
                                                            <li class="kt-menu__item " aria-haspopup="true"><a href="#" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Staff Directory</span></a></li>
                                                            <li class="kt-menu__item " aria-haspopup="true"><a href="#" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Client Directory</span></a></li>
                                                            <li class="kt-menu__item " aria-haspopup="true"><a href="#" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Salary Reports</span></a></li>
                                                            <li class="kt-menu__item " aria-haspopup="true"><a href="#" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Staff Payslips</span></a></li>
                                                            <li class="kt-menu__item " aria-haspopup="true"><a href="#" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Corporate Expenses</span></a></li>
                                                            <li class="kt-menu__item " aria-haspopup="true"><a href="#" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Project Expenses</span></a></li>
                                                        </ul>
                                                    </li>
                                                    <li class="kt-menu__item ">
                                                        <h3 class="kt-menu__heading kt-menu__toggle"><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Reporting Apps</span><i class="kt-menu__ver-arrow la la-angle-right"></i></h3>
                                                        <ul class="kt-menu__inner">
                                                            <li class="kt-menu__item " aria-haspopup="true"><a href="#" class="kt-menu__link "><span class="kt-menu__link-text">Report Adjusments</span></a></li>
                                                            <li class="kt-menu__item " aria-haspopup="true"><a href="#" class="kt-menu__link "><span class="kt-menu__link-text">Sources & Mediums</span></a></li>
                                                            <li class="kt-menu__item " aria-haspopup="true"><a href="#" class="kt-menu__link "><span class="kt-menu__link-text">Reporting Settings</span></a></li>
                                                            <li class="kt-menu__item " aria-haspopup="true"><a href="#" class="kt-menu__link "><span class="kt-menu__link-text">Conversions</span></a></li>
                                                            <li class="kt-menu__item " aria-haspopup="true"><a href="#" class="kt-menu__link "><span class="kt-menu__link-text">Report Flows</span></a></li>
                                                            <li class="kt-menu__item " aria-haspopup="true"><a href="#" class="kt-menu__link "><span class="kt-menu__link-text">Audit & Logs</span></a></li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="kt-menu__item  kt-menu__item--submenu kt-menu__item--rel" data-ktmenu-submenu-toggle="click" aria-haspopup="true"><a href="javascript:;" class="kt-menu__link kt-menu__toggle"><span class="kt-menu__link-text">Apps</span><i class="kt-menu__hor-arrow la la-angle-down"></i></a>
                                        <div class="kt-menu__submenu kt-menu__submenu--classic kt-menu__submenu--left">
                                            <ul class="kt-menu__subnav">
                                                <li class="kt-menu__item " aria-haspopup="true"><a href="#" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">eCommerce</span></a></li>
                                                <li class="kt-menu__item  kt-menu__item--submenu" data-ktmenu-submenu-toggle="hover" aria-haspopup="true"><a href="#" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Audience</span><i class="kt-menu__hor-arrow la la-angle-right"></i></a>
                                                    <div class="kt-menu__submenu kt-menu__submenu--classic kt-menu__submenu--right">
                                                        <ul class="kt-menu__subnav">
                                                            <li class="kt-menu__item " aria-haspopup="true"><a href="#" class="kt-menu__link "><i class="kt-menu__link-icon flaticon-users"></i><span class="kt-menu__link-text">Active Users</span></a></li>
                                                            <li class="kt-menu__item " aria-haspopup="true"><a href="#" class="kt-menu__link "><i class="kt-menu__link-icon flaticon-interface-1"></i><span class="kt-menu__link-text">User Explorer</span></a></li>
                                                            <li class="kt-menu__item " aria-haspopup="true"><a href="#" class="kt-menu__link "><i class="kt-menu__link-icon flaticon-lifebuoy"></i><span class="kt-menu__link-text">Users Flows</span></a></li>
                                                            <li class="kt-menu__item " aria-haspopup="true"><a href="#" class="kt-menu__link "><i class="kt-menu__link-icon flaticon-graphic-1"></i><span class="kt-menu__link-text">Market Segments</span></a></li>
                                                            <li class="kt-menu__item " aria-haspopup="true"><a href="#" class="kt-menu__link "><i class="kt-menu__link-icon flaticon-graphic"></i><span class="kt-menu__link-text">User Reports</span></a></li>
                                                        </ul>
                                                    </div>
                                                </li>
                                                <li class="kt-menu__item " aria-haspopup="true"><a href="#" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Marketing</span></a></li>
                                                <li class="kt-menu__item " aria-haspopup="true"><a href="#" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Campaigns</span><span class="kt-menu__link-badge"><span class="kt-badge kt-badge--success">3</span></span></a></li>
                                                <li class="kt-menu__item  kt-menu__item--submenu" data-ktmenu-submenu-toggle="hover" aria-haspopup="true"><a href="#" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Cloud Manager</span><i class="kt-menu__hor-arrow la la-angle-right"></i></a>
                                                    <div class="kt-menu__submenu kt-menu__submenu--classic kt-menu__submenu--right">
                                                        <ul class="kt-menu__subnav">
                                                            <li class="kt-menu__item " aria-haspopup="true"><a href="#" class="kt-menu__link "><i class="kt-menu__link-icon flaticon-add"></i><span class="kt-menu__link-text">File Upload</span><span class="kt-menu__link-badge"><span class="kt-badge kt-badge--danger">3</span></span></a></li>
                                                            <li class="kt-menu__item " aria-haspopup="true"><a href="#" class="kt-menu__link "><i class="kt-menu__link-icon flaticon-signs-1"></i><span class="kt-menu__link-text">File Attributes</span></a></li>
                                                            <li class="kt-menu__item " aria-haspopup="true"><a href="#" class="kt-menu__link "><i class="kt-menu__link-icon flaticon-folder"></i><span class="kt-menu__link-text">Folders</span></a></li>
                                                            <li class="kt-menu__item " aria-haspopup="true"><a href="#" class="kt-menu__link "><i class="kt-menu__link-icon flaticon-cogwheel-2"></i><span class="kt-menu__link-text">System Settings</span></a></li>
                                                        </ul>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
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

                            <!--begin: Quick actions -->
                            <div class="kt-header__topbar-item dropdown">
                                <div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="10px,0px">
                                    <span class="kt-header__topbar-icon kt-header__topbar-icon--warning"><i class="flaticon2-gear"></i></span>
                                </div>
                                <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-xl">
                                    <form>

                                        <!--begin: Head -->
                                        <div class="kt-head kt-head--skin-light">
                                            <h3 class="kt-head__title">
                                                User Quick Actions
                                                <span class="kt-space-15"></span>
                                                <span class="btn btn-success btn-sm btn-bold btn-font-md">23 tasks pending</span>
                                            </h3>
                                        </div>

                                        <!--end: Head -->

                                        <!--begin: Grid Nav -->
                                        <div class="kt-grid-nav kt-grid-nav--skin-light">
                                            <div class="kt-grid-nav__row">
                                                <a href="#" class="kt-grid-nav__item">
                                                    <span class="kt-grid-nav__icon">
                                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon kt-svg-icon--success kt-svg-icon--lg">
                                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                <rect id="bound" x="0" y="0" width="24" height="24" />
                                                                <path d="M4.3618034,10.2763932 L4.8618034,9.2763932 C4.94649941,9.10700119 5.11963097,9 5.30901699,9 L15.190983,9 C15.4671254,9 15.690983,9.22385763 15.690983,9.5 C15.690983,9.57762255 15.6729105,9.65417908 15.6381966,9.7236068 L15.1381966,10.7236068 C15.0535006,10.8929988 14.880369,11 14.690983,11 L4.80901699,11 C4.53287462,11 4.30901699,10.7761424 4.30901699,10.5 C4.30901699,10.4223775 4.32708954,10.3458209 4.3618034,10.2763932 Z M14.6381966,13.7236068 L14.1381966,14.7236068 C14.0535006,14.8929988 13.880369,15 13.690983,15 L4.80901699,15 C4.53287462,15 4.30901699,14.7761424 4.30901699,14.5 C4.30901699,14.4223775 4.32708954,14.3458209 4.3618034,14.2763932 L4.8618034,13.2763932 C4.94649941,13.1070012 5.11963097,13 5.30901699,13 L14.190983,13 C14.4671254,13 14.690983,13.2238576 14.690983,13.5 C14.690983,13.5776225 14.6729105,13.6541791 14.6381966,13.7236068 Z" id="Combined-Shape" fill="#000000" opacity="0.3" />
                                                                <path d="M17.369,7.618 C16.976998,7.08599734 16.4660031,6.69750122 15.836,6.4525 C15.2059968,6.20749878 14.590003,6.085 13.988,6.085 C13.2179962,6.085 12.5180032,6.2249986 11.888,6.505 C11.2579969,6.7850014 10.7155023,7.16999755 10.2605,7.66 C9.80549773,8.15000245 9.45550123,8.72399671 9.2105,9.382 C8.96549878,10.0400033 8.843,10.7539961 8.843,11.524 C8.843,12.3360041 8.96199881,13.0779966 9.2,13.75 C9.43800119,14.4220034 9.7774978,14.9994976 10.2185,15.4825 C10.6595022,15.9655024 11.1879969,16.3399987 11.804,16.606 C12.4200031,16.8720013 13.1129962,17.005 13.883,17.005 C14.681004,17.005 15.3879969,16.8475016 16.004,16.5325 C16.6200031,16.2174984 17.1169981,15.8010026 17.495,15.283 L19.616,16.774 C18.9579967,17.6000041 18.1530048,18.2404977 17.201,18.6955 C16.2489952,19.1505023 15.1360064,19.378 13.862,19.378 C12.6999942,19.378 11.6325049,19.1855019 10.6595,18.8005 C9.68649514,18.4154981 8.8500035,17.8765035 8.15,17.1835 C7.4499965,16.4904965 6.90400196,15.6645048 6.512,14.7055 C6.11999804,13.7464952 5.924,12.6860058 5.924,11.524 C5.924,10.333994 6.13049794,9.25950479 6.5435,8.3005 C6.95650207,7.34149521 7.5234964,6.52600336 8.2445,5.854 C8.96550361,5.18199664 9.8159951,4.66400182 10.796,4.3 C11.7760049,3.93599818 12.8399943,3.754 13.988,3.754 C14.4640024,3.754 14.9609974,3.79949954 15.479,3.8905 C15.9970026,3.98150045 16.4939976,4.12149906 16.97,4.3105 C17.4460024,4.49950095 17.8939979,4.7339986 18.314,5.014 C18.7340021,5.2940014 19.0909985,5.62999804 19.385,6.022 L17.369,7.618 Z" id="C" fill="#000000" />
                                                            </g>
                                                        </svg> </span>
                                                    <span class="kt-grid-nav__title">Accounting</span>
                                                    <span class="kt-grid-nav__desc">eCommerce</span>
                                                </a>
                                                <a href="#" class="kt-grid-nav__item">
                                                    <span class="kt-grid-nav__icon">
                                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon kt-svg-icon--success kt-svg-icon--lg">
                                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                <rect id="bound" x="0" y="0" width="24" height="24" />
                                                                <path d="M14.8571499,13 C14.9499122,12.7223297 15,12.4263059 15,12.1190476 L15,6.88095238 C15,5.28984632 13.6568542,4 12,4 L11.7272727,4 C10.2210416,4 9,5.17258756 9,6.61904762 L10.0909091,6.61904762 C10.0909091,5.75117158 10.823534,5.04761905 11.7272727,5.04761905 L12,5.04761905 C13.0543618,5.04761905 13.9090909,5.86843034 13.9090909,6.88095238 L13.9090909,12.1190476 C13.9090909,12.4383379 13.8240964,12.7385644 13.6746497,13 L10.3253503,13 C10.1759036,12.7385644 10.0909091,12.4383379 10.0909091,12.1190476 L10.0909091,9.5 C10.0909091,9.06606198 10.4572216,8.71428571 10.9090909,8.71428571 C11.3609602,8.71428571 11.7272727,9.06606198 11.7272727,9.5 L11.7272727,11.3333333 L12.8181818,11.3333333 L12.8181818,9.5 C12.8181818,8.48747796 11.9634527,7.66666667 10.9090909,7.66666667 C9.85472911,7.66666667 9,8.48747796 9,9.5 L9,12.1190476 C9,12.4263059 9.0500878,12.7223297 9.14285008,13 L6,13 C5.44771525,13 5,12.5522847 5,12 L5,3 C5,2.44771525 5.44771525,2 6,2 L18,2 C18.5522847,2 19,2.44771525 19,3 L19,12 C19,12.5522847 18.5522847,13 18,13 L14.8571499,13 Z" id="Combined-Shape" fill="#000000" opacity="0.3" />
                                                                <path d="M9,10.3333333 L9,12.1190476 C9,13.7101537 10.3431458,15 12,15 C13.6568542,15 15,13.7101537 15,12.1190476 L15,10.3333333 L20.2072547,6.57253826 C20.4311176,6.4108595 20.7436609,6.46126971 20.9053396,6.68513259 C20.9668779,6.77033951 21,6.87277228 21,6.97787787 L21,17 C21,18.1045695 20.1045695,19 19,19 L5,19 C3.8954305,19 3,18.1045695 3,17 L3,6.97787787 C3,6.70173549 3.22385763,6.47787787 3.5,6.47787787 C3.60510559,6.47787787 3.70753836,6.51099993 3.79274528,6.57253826 L9,10.3333333 Z M10.0909091,11.1212121 L12,12.5 L13.9090909,11.1212121 L13.9090909,12.1190476 C13.9090909,13.1315697 13.0543618,13.952381 12,13.952381 C10.9456382,13.952381 10.0909091,13.1315697 10.0909091,12.1190476 L10.0909091,11.1212121 Z" id="Combined-Shape" fill="#000000" />
                                                            </g>
                                                        </svg> </span>
                                                    <span class="kt-grid-nav__title">Administration</span>
                                                    <span class="kt-grid-nav__desc">Console</span>
                                                </a>
                                            </div>
                                            <div class="kt-grid-nav__row">
                                                <a href="#" class="kt-grid-nav__item">
                                                    <span class="kt-grid-nav__icon">
                                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon kt-svg-icon--success kt-svg-icon--lg">
                                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                <rect id="bound" x="0" y="0" width="24" height="24" />
                                                                <path d="M4,9.67471899 L10.880262,13.6470401 C10.9543486,13.689814 11.0320333,13.7207107 11.1111111,13.740321 L11.1111111,21.4444444 L4.49070127,17.526473 C4.18655139,17.3464765 4,17.0193034 4,16.6658832 L4,9.67471899 Z M20,9.56911707 L20,16.6658832 C20,17.0193034 19.8134486,17.3464765 19.5092987,17.526473 L12.8888889,21.4444444 L12.8888889,13.6728275 C12.9050191,13.6647696 12.9210067,13.6561758 12.9368301,13.6470401 L20,9.56911707 Z" id="Combined-Shape" fill="#000000" />
                                                                <path d="M4.21611835,7.74669402 C4.30015839,7.64056877 4.40623188,7.55087574 4.5299008,7.48500698 L11.5299008,3.75665466 C11.8237589,3.60013944 12.1762411,3.60013944 12.4700992,3.75665466 L19.4700992,7.48500698 C19.5654307,7.53578262 19.6503066,7.60071528 19.7226939,7.67641889 L12.0479413,12.1074394 C11.9974761,12.1365754 11.9509488,12.1699127 11.9085461,12.2067543 C11.8661433,12.1699127 11.819616,12.1365754 11.7691509,12.1074394 L4.21611835,7.74669402 Z" id="Path" fill="#000000" opacity="0.3" />
                                                            </g>
                                                        </svg> </span>
                                                    <span class="kt-grid-nav__title">Projects</span>
                                                    <span class="kt-grid-nav__desc">Pending Tasks</span>
                                                </a>
                                                <a href="#" class="kt-grid-nav__item">
                                                    <span class="kt-grid-nav__icon">
                                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon kt-svg-icon--success kt-svg-icon--lg">
                                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                <polygon id="Shape" points="0 0 24 0 24 24 0 24" />
                                                                <path d="M18,14 C16.3431458,14 15,12.6568542 15,11 C15,9.34314575 16.3431458,8 18,8 C19.6568542,8 21,9.34314575 21,11 C21,12.6568542 19.6568542,14 18,14 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z" id="Combined-Shape" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                                                <path d="M17.6011961,15.0006174 C21.0077043,15.0378534 23.7891749,16.7601418 23.9984937,20.4 C24.0069246,20.5466056 23.9984937,21 23.4559499,21 L19.6,21 C19.6,18.7490654 18.8562935,16.6718327 17.6011961,15.0006174 Z M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z" id="Combined-Shape" fill="#000000" fill-rule="nonzero" />
                                                            </g>
                                                        </svg> </span>
                                                    <span class="kt-grid-nav__title">Customers</span>
                                                    <span class="kt-grid-nav__desc">Latest cases</span>
                                                </a>
                                            </div>
                                        </div>

                                        <!--end: Grid Nav -->
                                    </form>
                                </div>
                            </div>

                            <!--end: Quick actions -->

                            <!--begin: Cart -->
                            <div class="kt-header__topbar-item dropdown">
                                <div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="10px,0px">
                                    <span class="kt-header__topbar-icon kt-header__topbar-icon--brand"><i class="flaticon2-shopping-cart-1"></i></span>
                                </div>
                                <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-xl">
                                    <form>

                                        <!-- begin:: Mycart -->
                                        <div class="kt-mycart">
                                            <div class="kt-mycart__head kt-head" style="background-image: url(./assets/media/misc/bg-1.jpg);">
                                                <div class="kt-mycart__info">
                                                    <span class="kt-mycart__icon"><i class="flaticon2-shopping-cart-1 kt-font-success"></i></span>
                                                    <h3 class="kt-mycart__title">My Cart</h3>
                                                </div>
                                                <div class="kt-mycart__button">
                                                    <button type="button" class="btn btn-success btn-sm" style=" ">2 Items</button>
                                                </div>
                                            </div>
                                            <div class="kt-mycart__body kt-scroll" data-scroll="true" data-height="245" data-mobile-height="200">
                                                <div class="kt-mycart__item">
                                                    <div class="kt-mycart__container">
                                                        <div class="kt-mycart__info">
                                                            <a href="#" class="kt-mycart__title">
                                                                Samsung
                                                            </a>
                                                            <span class="kt-mycart__desc">
                                                                Profile info, Timeline etc
                                                            </span>
                                                            <div class="kt-mycart__action">
                                                                <span class="kt-mycart__price">$ 450</span>
                                                                <span class="kt-mycart__text">for</span>
                                                                <span class="kt-mycart__quantity">7</span>
                                                                <a href="#" class="btn btn-label-success btn-icon">&minus;</a>
                                                                <a href="#" class="btn btn-label-success btn-icon">&plus;</a>
                                                            </div>
                                                        </div>
                                                        <a href="#" class="kt-mycart__pic">
                                                            <img src="{{ asset('theme/assets/media/products/product9.jpg')}}" title="">
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="kt-mycart__item">
                                                    <div class="kt-mycart__container">
                                                        <div class="kt-mycart__info">
                                                            <a href="#" class="kt-mycart__title">
                                                                Panasonic
                                                            </a>
                                                            <span class="kt-mycart__desc">
                                                                For PHoto & Others
                                                            </span>
                                                            <div class="kt-mycart__action">
                                                                <span class="kt-mycart__price">$ 329</span>
                                                                <span class="kt-mycart__text">for</span>
                                                                <span class="kt-mycart__quantity">1</span>
                                                                <a href="#" class="btn btn-label-success btn-icon">&minus;</a>
                                                                <a href="#" class="btn btn-label-success btn-icon">&plus;</a>
                                                            </div>
                                                        </div>
                                                        <a href="#" class="kt-mycart__pic">
                                                            <img src="{{ asset('theme/assets/media/products/product13.jpg')}}" title="">
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="kt-mycart__item">
                                                    <div class="kt-mycart__container">
                                                        <div class="kt-mycart__info">
                                                            <a href="#" class="kt-mycart__title">
                                                                Fujifilm
                                                            </a>
                                                            <span class="kt-mycart__desc">
                                                                Profile info, Timeline etc
                                                            </span>
                                                            <div class="kt-mycart__action">
                                                                <span class="kt-mycart__price">$ 520</span>
                                                                <span class="kt-mycart__text">for</span>
                                                                <span class="kt-mycart__quantity">6</span>
                                                                <a href="#" class="btn btn-label-success btn-icon">&minus;</a>
                                                                <a href="#" class="btn btn-label-success btn-icon">&plus;</a>
                                                            </div>
                                                        </div>
                                                        <a href="#" class="kt-mycart__pic">
                                                            <img src="{{ asset('theme/assets/media/products/product16.jpg')}}" title="">
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="kt-mycart__item">
                                                    <div class="kt-mycart__container">
                                                        <div class="kt-mycart__info">
                                                            <a href="#" class="kt-mycart__title">
                                                                Candy Machine
                                                            </a>
                                                            <span class="kt-mycart__desc">
                                                                For PHoto & Others
                                                            </span>
                                                            <div class="kt-mycart__action">
                                                                <span class="kt-mycart__price">$ 784</span>
                                                                <span class="kt-mycart__text">for</span>
                                                                <span class="kt-mycart__quantity">4</span>
                                                                <a href="#" class="btn btn-label-success btn-icon">&minus;</a>
                                                                <a href="#" class="btn btn-label-success btn-icon">&plus;</a>
                                                            </div>
                                                        </div>
                                                        <a href="#" class="kt-mycart__pic">
                                                            <img src="{{ asset('theme/assets/media/products/product15.jpg')}}" title="" alt="">
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="kt-mycart__footer">
                                                <div class="kt-mycart__section">
                                                    <div class="kt-mycart__subtitel">
                                                        <span>Sub Total</span>
                                                        <span>Taxes</span>
                                                        <span>Total</span>
                                                    </div>
                                                    <div class="kt-mycart__prices">
                                                        <span>$ 840.00</span>
                                                        <span>$ 72.00</span>
                                                        <span class="kt-font-brand">$ 912.00</span>
                                                    </div>
                                                </div>
                                                <div class="kt-mycart__button kt-align-right">
                                                    <button type="button" class="btn btn-primary btn-sm">Place Order</button>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- end:: Mycart -->
                                    </form>
                                </div>
                            </div>

                            <!--end: Cart-->

                            <!--begin: Language bar -->
                            <div class="kt-header__topbar-item kt-header__topbar-item--langs">
                                <div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="10px,0px">
                                    <span class="kt-header__topbar-icon kt-header__topbar-icon--brand">
                                        <img class="" src="{{ asset('theme/assets/media/flags/012-uk.svg') }}" alt="" />
                                    </span>
                                </div>
                                <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim">
                                    <ul class="kt-nav kt-margin-t-10 kt-margin-b-10">
                                        <li class="kt-nav__item kt-nav__item--active">
                                            <a href="#" class="kt-nav__link">
                                                <span class="kt-nav__link-icon"><img src="{{ asset('theme/assets/media/flags/020-flag.svg') }}" alt="" /></span>
                                                <span class="kt-nav__link-text">English</span>
                                            </a>
                                        </li>
                                        <li class="kt-nav__item">
                                            <a href="#" class="kt-nav__link">
                                                <span class="kt-nav__link-icon"><img src="{{ asset('theme/assets/media/flags/016-spain.svg') }}" alt="" /></span>
                                                <span class="kt-nav__link-text">Spanish</span>
                                            </a>
                                        </li>
                                        <li class="kt-nav__item">
                                            <a href="#" class="kt-nav__link">
                                                <span class="kt-nav__link-icon"><img src="{{ asset('theme/assets/media/flags/017-germany.svg') }}" alt="" /></span>
                                                <span class="kt-nav__link-text">German</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <!--end: Language bar -->

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

                            <!--begin: Quick panel toggler -->
                            <div class="kt-header__topbar-item kt-header__topbar-item--quickpanel" data-toggle="kt-tooltip" title="Quick panel" data-placement="top">
                                <div class="kt-header__topbar-wrapper">
                                    <span class="kt-header__topbar-icon" id="kt_quick_panel_toggler_btn"><i class="flaticon2-cube-1"></i></span>
                                </div>
                            </div>

                            <!--end: Quick panel toggler -->
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

        <!-- begin::Quick Panel -->
        <div id="kt_quick_panel" class="kt-quick-panel">
            <a href="#" class="kt-quick-panel__close" id="kt_quick_panel_close_btn"><i class="flaticon2-delete"></i></a>
            <div class="kt-quick-panel__nav">
                <ul class="nav nav-tabs nav-tabs-line nav-tabs-bold nav-tabs-line-3x nav-tabs-line-brand  kt-notification-item-padding-x" role="tablist">
                    <li class="nav-item active">
                        <a class="nav-link active" data-toggle="tab" href="#kt_quick_panel_tab_notifications" role="tab">Notifications</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#kt_quick_panel_tab_logs" role="tab">Audit Logs</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#kt_quick_panel_tab_settings" role="tab">Settings</a>
                    </li>
                </ul>
            </div>
            <div class="kt-quick-panel__content">
                <div class="tab-content">
                    <div class="tab-pane fade show kt-scroll active" id="kt_quick_panel_tab_notifications" role="tabpanel">
                        <div class="kt-notification">
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
                                    <i class="flaticon2-pie-chart kt-font-warning"></i>
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
                    <div class="tab-pane fade kt-scroll" id="kt_quick_panel_tab_logs" role="tabpanel">
                        <div class="kt-notification-v2">
                            <a href="#" class="kt-notification-v2__item">
                                <div class="kt-notification-v2__item-icon">
                                    <i class="flaticon-bell kt-font-brand"></i>
                                </div>
                                <div class="kt-notification-v2__itek-wrapper">
                                    <div class="kt-notification-v2__item-title">
                                        5 new user generated report
                                    </div>
                                    <div class="kt-notification-v2__item-desc">
                                        Reports based on sales
                                    </div>
                                </div>
                            </a>
                            <a href="#" class="kt-notification-v2__item">
                                <div class="kt-notification-v2__item-icon">
                                    <i class="flaticon2-box kt-font-danger"></i>
                                </div>
                                <div class="kt-notification-v2__itek-wrapper">
                                    <div class="kt-notification-v2__item-title">
                                        2 new items submited
                                    </div>
                                    <div class="kt-notification-v2__item-desc">
                                        by Grog John
                                    </div>
                                </div>
                            </a>
                            <a href="#" class="kt-notification-v2__item">
                                <div class="kt-notification-v2__item-icon">
                                    <i class="flaticon-psd kt-font-brand"></i>
                                </div>
                                <div class="kt-notification-v2__itek-wrapper">
                                    <div class="kt-notification-v2__item-title">
                                        79 PSD files generated
                                    </div>
                                    <div class="kt-notification-v2__item-desc">
                                        Reports based on sales
                                    </div>
                                </div>
                            </a>
                            <a href="#" class="kt-notification-v2__item">
                                <div class="kt-notification-v2__item-icon">
                                    <i class="flaticon2-supermarket kt-font-warning"></i>
                                </div>
                                <div class="kt-notification-v2__itek-wrapper">
                                    <div class="kt-notification-v2__item-title">
                                        $2900 worth producucts sold
                                    </div>
                                    <div class="kt-notification-v2__item-desc">
                                        Total 234 items
                                    </div>
                                </div>
                            </a>
                            <a href="#" class="kt-notification-v2__item">
                                <div class="kt-notification-v2__item-icon">
                                    <i class="flaticon-paper-plane-1 kt-font-success"></i>
                                </div>
                                <div class="kt-notification-v2__itek-wrapper">
                                    <div class="kt-notification-v2__item-title">
                                        4.5h-avarage response time
                                    </div>
                                    <div class="kt-notification-v2__item-desc">
                                        Fostest is Barry
                                    </div>
                                </div>
                            </a>
                            <a href="#" class="kt-notification-v2__item">
                                <div class="kt-notification-v2__item-icon">
                                    <i class="flaticon2-information kt-font-danger"></i>
                                </div>
                                <div class="kt-notification-v2__itek-wrapper">
                                    <div class="kt-notification-v2__item-title">
                                        Database server is down
                                    </div>
                                    <div class="kt-notification-v2__item-desc">
                                        10 mins ago
                                    </div>
                                </div>
                            </a>
                            <a href="#" class="kt-notification-v2__item">
                                <div class="kt-notification-v2__item-icon">
                                    <i class="flaticon2-mail-1 kt-font-brand"></i>
                                </div>
                                <div class="kt-notification-v2__itek-wrapper">
                                    <div class="kt-notification-v2__item-title">
                                        System report has been generated
                                    </div>
                                    <div class="kt-notification-v2__item-desc">
                                        Fostest is Barry
                                    </div>
                                </div>
                            </a>
                            <a href="#" class="kt-notification-v2__item">
                                <div class="kt-notification-v2__item-icon">
                                    <i class="flaticon2-hangouts-logo kt-font-warning"></i>
                                </div>
                                <div class="kt-notification-v2__itek-wrapper">
                                    <div class="kt-notification-v2__item-title">
                                        4.5h-avarage response time
                                    </div>
                                    <div class="kt-notification-v2__item-desc">
                                        Fostest is Barry
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="tab-pane kt-quick-panel__content-padding-x fade kt-scroll" id="kt_quick_panel_tab_settings" role="tabpanel">
                        <form class="kt-form">
                            <div class="kt-heading kt-heading--sm kt-heading--space-sm">Customer Care</div>
                            <div class="form-group form-group-xs row">
                                <label class="col-8 col-form-label">Enable Notifications:</label>
                                <div class="col-4 kt-align-right">
                                    <span class="kt-switch kt-switch--success kt-switch--sm">
                                        <label>
                                            <input type="checkbox" checked="checked" name="quick_panel_notifications_1">
                                            <span></span>
                                        </label>
                                    </span>
                                </div>
                            </div>
                            <div class="form-group form-group-xs row">
                                <label class="col-8 col-form-label">Enable Case Tracking:</label>
                                <div class="col-4 kt-align-right">
                                    <span class="kt-switch kt-switch--success kt-switch--sm">
                                        <label>
                                            <input type="checkbox" name="quick_panel_notifications_2">
                                            <span></span>
                                        </label>
                                    </span>
                                </div>
                            </div>
                            <div class="form-group form-group-last form-group-xs row">
                                <label class="col-8 col-form-label">Support Portal:</label>
                                <div class="col-4 kt-align-right">
                                    <span class="kt-switch kt-switch--success kt-switch--sm">
                                        <label>
                                            <input type="checkbox" checked="checked" name="quick_panel_notifications_2">
                                            <span></span>
                                        </label>
                                    </span>
                                </div>
                            </div>
                            <div class="kt-separator kt-separator--space-md kt-separator--border-dashed"></div>
                            <div class="kt-heading kt-heading--sm kt-heading--space-sm">Reports</div>
                            <div class="form-group form-group-xs row">
                                <label class="col-8 col-form-label">Generate Reports:</label>
                                <div class="col-4 kt-align-right">
                                    <span class="kt-switch kt-switch--sm kt-switch--danger">
                                        <label>
                                            <input type="checkbox" checked="checked" name="quick_panel_notifications_3">
                                            <span></span>
                                        </label>
                                    </span>
                                </div>
                            </div>
                            <div class="form-group form-group-xs row">
                                <label class="col-8 col-form-label">Enable Report Export:</label>
                                <div class="col-4 kt-align-right">
                                    <span class="kt-switch kt-switch--sm kt-switch--danger">
                                        <label>
                                            <input type="checkbox" name="quick_panel_notifications_3">
                                            <span></span>
                                        </label>
                                    </span>
                                </div>
                            </div>
                            <div class="form-group form-group-last form-group-xs row">
                                <label class="col-8 col-form-label">Allow Data Collection:</label>
                                <div class="col-4 kt-align-right">
                                    <span class="kt-switch kt-switch--sm kt-switch--danger">
                                        <label>
                                            <input type="checkbox" checked="checked" name="quick_panel_notifications_4">
                                            <span></span>
                                        </label>
                                    </span>
                                </div>
                            </div>
                            <div class="kt-separator kt-separator--space-md kt-separator--border-dashed"></div>
                            <div class="kt-heading kt-heading--sm kt-heading--space-sm">Memebers</div>
                            <div class="form-group form-group-xs row">
                                <label class="col-8 col-form-label">Enable Member singup:</label>
                                <div class="col-4 kt-align-right">
                                    <span class="kt-switch kt-switch--sm kt-switch--brand">
                                        <label>
                                            <input type="checkbox" checked="checked" name="quick_panel_notifications_5">
                                            <span></span>
                                        </label>
                                    </span>
                                </div>
                            </div>
                            <div class="form-group form-group-xs row">
                                <label class="col-8 col-form-label">Allow User Feedbacks:</label>
                                <div class="col-4 kt-align-right">
                                    <span class="kt-switch kt-switch--sm kt-switch--brand">
                                        <label>
                                            <input type="checkbox" name="quick_panel_notifications_5">
                                            <span></span>
                                        </label>
                                    </span>
                                </div>
                            </div>
                            <div class="form-group form-group-last form-group-xs row">
                                <label class="col-8 col-form-label">Enable Customer Portal:</label>
                                <div class="col-4 kt-align-right">
                                    <span class="kt-switch kt-switch--sm kt-switch--brand">
                                        <label>
                                            <input type="checkbox" checked="checked" name="quick_panel_notifications_6">
                                            <span></span>
                                        </label>
                                    </span>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- end::Quick Panel -->

        <!-- begin::Scrolltop -->
        <div id="kt_scrolltop" class="kt-scrolltop">
            <i class="fa fa-arrow-up"></i>
        </div>

        <!-- end::Scrolltop -->

        <!-- begin::Sticky Toolbar -->
        <ul class="kt-sticky-toolbar" style="margin-top: 30px;">
            <li class="kt-sticky-toolbar__item kt-sticky-toolbar__item--success" id="kt_demo_panel_toggle" data-toggle="kt-tooltip" title="Check out more demos" data-placement="right">
                <a href="#" class=""><i class="flaticon2-drop"></i></a>
            </li>
            <li class="kt-sticky-toolbar__item kt-sticky-toolbar__item--brand" data-toggle="kt-tooltip" title="Layout Builder" data-placement="left">
                <a href="https://keenthemes.com/metronic/preview/demo7/builder.html" target="_blank"><i class="flaticon2-gear"></i></a>
            </li>
            <li class="kt-sticky-toolbar__item kt-sticky-toolbar__item--warning" data-toggle="kt-tooltip" title="Documentation" data-placement="left">
                <a href="https://keenthemes.com/metronic/?page=docs" target="_blank"><i class="flaticon2-telegram-logo"></i></a>
            </li>
        </ul>

        <!-- end::Sticky Toolbar -->

        <!-- begin::Demo Panel -->
        <div id="kt_demo_panel" class="kt-demo-panel">
            <div class="kt-demo-panel__head">
                <h3 class="kt-demo-panel__title">
                    Select A Demo

                    <!--<small>5</small>-->
                </h3>
                <a href="#" class="kt-demo-panel__close" id="kt_demo_panel_close"><i class="flaticon2-delete"></i></a>
            </div>
            <div class="kt-demo-panel__body">
                <div class="kt-demo-panel__item ">
                    <div class="kt-demo-panel__item-title">
                        Default
                    </div>
                    <div class="kt-demo-panel__item-preview">
                        <img src="{{ asset('theme/assets/media/demos/Demo-_Default.jpg')}}" alt="" />
                        <div class="kt-demo-panel__item-preview-overlay">
                            <a href="../default/index.html" class="btn btn-brand btn-elevate " target="_blank">Preview</a>
                        </div>
                    </div>
                </div>
                <div class="kt-demo-panel__item ">
                    <div class="kt-demo-panel__item-title">
                        Demo 2
                    </div>
                    <div class="kt-demo-panel__item-preview">
                        <img src="{{ asset('theme/assets/media/demos/Demo-2.jpg')}}" alt="" />
                        <div class="kt-demo-panel__item-preview-overlay">
                            <a href="../demo2/index.html" class="btn btn-brand btn-elevate " target="_blank">Preview</a>
                        </div>
                    </div>
                </div>
                <div class="kt-demo-panel__item ">
                    <div class="kt-demo-panel__item-title">
                        Demo 3
                    </div>
                    <div class="kt-demo-panel__item-preview">
                        <img src="{{ asset('theme/assets/media/demos/Demo-3.jpg')}}" alt="" />
                        <div class="kt-demo-panel__item-preview-overlay">
                            <a href="../demo3/index.html" class="btn btn-brand btn-elevate " target="_blank">Preview</a>
                        </div>
                    </div>
                </div>
                <div class="kt-demo-panel__item ">
                    <div class="kt-demo-panel__item-title">
                        Demo 4
                    </div>
                    <div class="kt-demo-panel__item-preview">
                        <img src="{{ asset('theme/assets/media/demos/Demo-4.jpg')}}" alt="" />
                        <div class="kt-demo-panel__item-preview-overlay">
                            <a href="../demo4/index.html" class="btn btn-brand btn-elevate " target="_blank">Preview</a>
                        </div>
                    </div>
                </div>
                <div class="kt-demo-panel__item ">
                    <div class="kt-demo-panel__item-title">
                        Demo 5
                    </div>
                    <div class="kt-demo-panel__item-preview">
                        <img src="{{ asset('theme/assets/media/demos/Demo-5.jpg')}}" alt="" />
                        <div class="kt-demo-panel__item-preview-overlay">
                            <a href="../demo5/index.html" class="btn btn-brand btn-elevate " target="_blank">Preview</a>
                        </div>
                    </div>
                </div>
                <div class="kt-demo-panel__item ">
                    <div class="kt-demo-panel__item-title">
                        Demo 6
                    </div>
                    <div class="kt-demo-panel__item-preview">
                        <img src="{{ asset('theme/assets/media/demos/Demo-6.jpg')}}" alt="" />
                        <div class="kt-demo-panel__item-preview-overlay">
                            <a href="../demo6/index.html" class="btn btn-brand btn-elevate " target="_blank">Preview</a>
                        </div>
                    </div>
                </div>
                <div class="kt-demo-panel__item kt-demo-panel__item--active">
                    <div class="kt-demo-panel__item-title">
                        Demo 7
                    </div>
                    <div class="kt-demo-panel__item-preview">
                        <img src="{{ asset('theme/assets/media/demos/Demo-7.jpg')}}" alt="" />
                        <div class="kt-demo-panel__item-preview-overlay">
                            <a href="../demo7/index.html" class="btn btn-brand btn-elevate " target="_blank">Preview</a>
                        </div>
                    </div>
                </div>
                <div class="kt-demo-panel__item ">
                    <div class="kt-demo-panel__item-title">
                        Demo 8
                    </div>
                    <div class="kt-demo-panel__item-preview">
                        <img src="{{ asset('theme/assets/media/demos/Demo-8.jpg')}}" alt="" />
                        <div class="kt-demo-panel__item-preview-overlay">
                            <a href="../demo8/index.html" class="btn btn-brand btn-elevate " target="_blank">Preview</a>
                        </div>
                    </div>
                </div>
                <div class="kt-demo-panel__item ">
                    <div class="kt-demo-panel__item-title">
                        Demo 9
                    </div>
                    <div class="kt-demo-panel__item-preview">
                        <img src="{{ asset('theme/assets/media/demos/Demo-9.jpg')}}" alt="" />
                        <div class="kt-demo-panel__item-preview-overlay">
                            <a href="../demo9/index.html" class="btn btn-brand btn-elevate " target="_blank">Preview</a>
                        </div>
                    </div>
                </div>
                <div class="kt-demo-panel__item ">
                    <div class="kt-demo-panel__item-title">
                        Demo 10
                    </div>
                    <div class="kt-demo-panel__item-preview">
                        <img src="{{ asset('theme/assets/media/demos/Demo-10.jpg')}}" alt="" />
                        <div class="kt-demo-panel__item-preview-overlay">
                            <a href="../demo10/index.html" class="btn btn-brand btn-elevate " target="_blank">Preview</a>
                        </div>
                    </div>
                </div>
                <div class="kt-demo-panel__item ">
                    <div class="kt-demo-panel__item-title">
                        Demo 11
                    </div>
                    <div class="kt-demo-panel__item-preview">
                        <img src="{{ asset('theme/assets/media/demos/Demo-11.jpg')}}" alt="" />
                        <div class="kt-demo-panel__item-preview-overlay">
                            <a href="../demo11/index.html" class="btn btn-brand btn-elevate " target="_blank">Preview</a>
                        </div>
                    </div>
                </div>
                <div class="kt-demo-panel__item ">
                    <div class="kt-demo-panel__item-title">
                        Demo 12
                    </div>
                    <div class="kt-demo-panel__item-preview">
                        <img src="{{ asset('theme/assets/media/demos/Demo-12.jpg')}}" alt="" />
                        <div class="kt-demo-panel__item-preview-overlay">
                            <a href="../demo12/index.html" class="btn btn-brand btn-elevate " target="_blank">Preview</a>
                        </div>
                    </div>
                </div>
                <div class="kt-demo-panel__item ">
                    <div class="kt-demo-panel__item-title">
                        Demo 13
                    </div>
                    <div class="kt-demo-panel__item-preview">
                        <img src="{{ asset('theme/assets/media/demos/Demo-13.jpg')}}" alt="" />
                        <div class="kt-demo-panel__item-preview-overlay">
                            <a href="#" class="btn btn-brand btn-elevate disabled">Coming soon</a>
                        </div>
                    </div>
                </div>
                <div class="kt-demo-panel__item ">
                    <div class="kt-demo-panel__item-title">
                        Demo 14
                    </div>
                    <div class="kt-demo-panel__item-preview">
                        <img src="{{ asset('theme/assets/media/demos/Demo-14.jpg')}}" alt="" />
                        <div class="kt-demo-panel__item-preview-overlay">
                            <a href="#" class="btn btn-brand btn-elevate disabled">Coming soon</a>
                        </div>
                    </div>
                </div>
                <a href="" target="_blank" class="kt-demo-panel__purchase btn btn-brand btn-elevate btn-bold btn-upper">
                    Buy Metronic Now!
                </a>
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