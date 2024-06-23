<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin PTNBH UNTAN</title>

    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="description" content="">
    <meta name="author" content="Xiaoying Riley at 3rd Wave Media">
    <link rel="shortcut icon" href="{{ asset('images/logo-untan.jpg') }}">

    <!-- FontAwesome JS-->
    <script defer src="{{ asset('/template-admin/assets/plugins/fontawesome/js/all.min.js') }}"></script>

    <!-- App CSS -->
    <link id="theme-style" rel="stylesheet" href="{{ asset('/template-admin/assets/css/portal.css') }}">
    {{-- cdn summer note editor --}}

    {{-- <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="{{ asset('template-admin/assets/js/jquery.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
    <link rel="stylesheet" href="{{ asset('template-admin/assets/css/dataTables.dataTables.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body class="app">
    <header class="app-header fixed-top">
        <div class="app-header-inner">
            <div class="container-fluid py-2">
                <div class="app-header-content">
                    <div class="row justify-content-between align-items-center">

                        <div class="col-auto">
                            <a id="sidepanel-toggler" class="sidepanel-toggler d-inline-block d-xl-none" href="#">
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                    viewBox="0 0 30 30" role="img">
                                    <title>Menu</title>
                                    <path stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10"
                                        stroke-width="2" d="M4 7h22M4 15h22M4 23h22"></path>
                                </svg>
                            </a>
                        </div><!--//col-->

                        <div class="app-utilities col-auto">
                            <div class="app-utility-item app-user-dropdown dropdown">
                                <a class="d-flex align-items-center user-info dropdown-toggle" id="user-dropdown-toggle"
                                    data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">
                                    <div class="me-2 text-end">
                                        <div class="user-name">{{ auth()->user()->name }}</div>
                                        <div class="user-roles">
                                            ({{ auth()->user()->roles()->pluck('name')->implode(', ') }})</div>
                                    </div>
                                    @if (auth()->user()->foto && file_exists(public_path('images/profile/' . auth()->user()->foto)))
                                        <img src="{{ asset('images/profile/' . auth()->user()->foto) }}"
                                            alt="user profile" class="user-image">
                                    @else
                                        <img src="{{ asset('images/profile/blank.jpg') }}" alt="user profile"
                                            class="user-image">
                                    @endif
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="user-dropdown-toggle">
                                    <li><a class="dropdown-item" href="{{ route('account.index') }}">Account</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li>
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <button type="submit" class="dropdown-item">Logout</button>
                                        </form>
                                    </li>
                                </ul>
                            </div><!--//app-user-dropdown-->
                        </div><!--//app-utilities-->
                        <style>
                            .user-info {
                                cursor: pointer;
                                text-decoration: none;
                            }

                            .user-info:hover,
                            .user-info:focus {
                                text-decoration: none;
                            }

                            .user-name {
                                font-weight: bold;
                                font-size: 1rem;
                            }

                            .user-roles {
                                font-size: 0.875rem;
                                color: #6c757d;
                            }

                            .user-image {
                                width: 40px;
                                height: 40px;
                                border-radius: 50%;
                            }

                            .dropdown-menu {
                                min-width: 150px;
                            }

                            .dropdown-item {
                                display: flex;
                                align-items: center;
                                justify-content: center;
                            }
                        </style>
                    </div><!--//row-->
                </div><!--//app-header-content-->
            </div><!--//container-fluid-->
        </div><!--//app-header-inner-->
        <div id="app-sidepanel" class="app-sidepanel sidepanel-hidden">
            <div id="sidepanel-drop" class="sidepanel-drop"></div>
            <div class="sidepanel-inner d-flex flex-column">
                <a href="#" id="sidepanel-close" class="sidepanel-close d-xl-none">&times;</a>
                <div class="app-branding">
                    <a class="app-logo" href="index.html"><img class="logo-icon me-2"
                            src="{{ asset('images/logo-untan.jpg') }}" alt="logo"><span class="logo-text">PTNBH
                            UNTAN</span></a>

                </div><!--//app-branding-->
                <nav id="app-nav-main" class="app-nav app-nav-main flex-grow-1">
                    <ul class="app-menu list-unstyled accordion" id="menu-accordion">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('dashboard.index') }}">
                                <span class="nav-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-house" viewBox="0 0 16 16">
                                        <path
                                            d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L2 8.207V13.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V8.207l.646.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293zM13 7.207V13.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V7.207l5-5z" />
                                    </svg>
                                </span>
                                <span class="nav-link-text">Dashboard</span>
                            </a><!--//nav-link-->
                        </li><!--//nav-item-->
                        @can('manage roles')
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('roles.index') }}">
                                    <span class="nav-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-person-badge" viewBox="0 0 16 16">
                                            <path
                                                d="M6.5 2a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1zM11 8a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
                                            <path
                                                d="M4.5 0A2.5 2.5 0 0 0 2 2.5V14a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2.5A2.5 2.5 0 0 0 11.5 0zM3 2.5A1.5 1.5 0 0 1 4.5 1h7A1.5 1.5 0 0 1 13 2.5v10.795a4.2 4.2 0 0 0-.776-.492C11.392 12.387 10.063 12 8 12s-3.392.387-4.224.803a4.2 4.2 0 0 0-.776.492z" />
                                        </svg>
                                    </span>
                                    <span class="nav-link-text">Master Role</span>
                                </a><!--//nav-link-->
                            </li><!--//nav-item-->
                        @endcan
                        @can('manage users')
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('users.index') }}">
                                    <span class="nav-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-person-add" viewBox="0 0 16 16">
                                            <path
                                                d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0m-2-6a3 3 0 1 1-6 0 3 3 0 0 1 6 0M8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4" />
                                            <path
                                                d="M8.256 14a4.5 4.5 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10q.39 0 .74.025c.226-.341.496-.65.804-.918Q8.844 9.002 8 9c-5 0-6 3-6 4s1 1 1 1z" />
                                        </svg>
                                    </span>
                                    <span class="nav-link-text">Master User</span>
                                </a><!--//nav-link-->
                            </li><!--//nav-item-->
                        @endcan
                        @canany(['manage home', 'manage tentang', 'manage organisasi', 'manage faq', 'manage footer'])
                            <li class="nav-item has-submenu">
                                <a class="nav-link submenu-toggle" href="#" data-bs-toggle="collapse"
                                    data-bs-target="#submenu-page" aria-expanded="false" aria-controls="submenu-page">
                                    <span class="nav-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-grid-1x2" viewBox="0 0 16 16">
                                            <path
                                                d="M6 1H1v14h5zm9 0h-5v5h5zm0 9v5h-5v-5zM0 1a1 1 0 0 1 1-1h5a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1zm9 0a1 1 0 0 1 1-1h5a1 1 0 0 1 1 1v5a1 1 0 0 1-1 1h-5a1 1 0 0 1-1-1zm1 8a1 1 0 0 0-1 1v5a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1v-5a1 1 0 0 0-1-1z" />
                                        </svg>
                                    </span>
                                    <span class="nav-link-text">Page Website</span>
                                    <span class="submenu-arrow">
                                        <svg width="1em" height="1em" viewBox="0 0 16 16"
                                            class="bi bi-chevron-down" fill="currentColor"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" />
                                        </svg>
                                    </span><!--//submenu-arrow-->
                                </a><!--//nav-link-->
                                <div id="submenu-page" class="collapse submenu submenu-page"
                                    data-bs-parent="#menu-accordion">
                                    <ul class="submenu-list list-unstyled">
                                        @can('manage home')
                                            <li class="submenu-item"><a class="submenu-link"
                                                    href="{{ route('home.index') }}">Home</a>
                                            </li>
                                        @endcan
                                        @can('manage tentang')
                                            <li class="submenu-item"><a class="submenu-link"
                                                    href="{{ route('tentang.index') }}">Tentang</a>
                                            </li>
                                        @endcan
                                        @can('manage organisasi')
                                            <li class="submenu-item"><a class="submenu-link"
                                                    href="{{ route('organisasi.index') }}">Organisasi</a>
                                            </li>
                                        @endcan
                                        @can('manage faq')
                                            <li class="submenu-item"><a class="submenu-link"
                                                    href="{{ route('faq.index') }}">Faq</a>
                                            </li>
                                        @endcan
                                        @can('manage footer')
                                            <li class="submenu-item"><a class="submenu-link"
                                                    href="{{ route('footer.index') }}">Footer</a>
                                            </li>
                                        @endcan
                                    </ul>
                                </div>
                            </li><!--//nav-item-->
                        @endcanany

                        @canany(['manage fakultas', 'manage unit bisnis'])
                            <li class="nav-item has-submenu">
                                <a class="nav-link submenu-toggle" href="#" data-bs-toggle="collapse"
                                    data-bs-target="#submenu-lembaga" aria-expanded="false"
                                    aria-controls="submenu-lembaga">
                                    <span class="nav-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-buildings" viewBox="0 0 16 16">
                                            <path
                                                d="M14.763.075A.5.5 0 0 1 15 .5v15a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5V14h-1v1.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V10a.5.5 0 0 1 .342-.474L6 7.64V4.5a.5.5 0 0 1 .276-.447l8-4a.5.5 0 0 1 .487.022M6 8.694 1 10.36V15h5zM7 15h2v-1.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 .5.5V15h2V1.309l-7 3.5z" />
                                            <path
                                                d="M2 11h1v1H2zm2 0h1v1H4zm-2 2h1v1H2zm2 0h1v1H4zm4-4h1v1H8zm2 0h1v1h-1zm-2 2h1v1H8zm2 0h1v1h-1zm2-2h1v1h-1zm0 2h1v1h-1zM8 7h1v1H8zm2 0h1v1h-1zm2 0h1v1h-1zM8 5h1v1H8zm2 0h1v1h-1zm2 0h1v1h-1zm0-2h1v1h-1z" />
                                        </svg>
                                    </span>
                                    <span class="nav-link-text">Lembaga</span>
                                    <span class="submenu-arrow">
                                        <svg width="1em" height="1em" viewBox="0 0 16 16"
                                            class="bi bi-chevron-down" fill="currentColor"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" />
                                        </svg>
                                    </span><!--//submenu-arrow-->
                                </a><!--//nav-link-->
                                <div id="submenu-lembaga" class="collapse submenu submenu-lembaga"
                                    data-bs-parent="#menu-accordion">
                                    <ul class="submenu-list list-unstyled">
                                        @can('manage album')
                                            <li class="submenu-item"><a class="submenu-link"
                                                    href="{{ route('fakultas.index') }}">Fakultas</a>
                                            </li>
                                        @endcan
                                        @can('manage galeri')
                                            <li class="submenu-item"><a class="submenu-link"
                                                    href="{{ route('unit-bisnis.index') }}">Unit Bisnis</a>
                                            </li>
                                        @endcan
                                    </ul>
                                </div>
                            </li><!--//nav-item-->
                        @endcanany

                        @can('manage berita')
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('berita.index') }}">
                                    <span class="nav-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-newspaper" viewBox="0 0 16 16">
                                            <path
                                                d="M0 2.5A1.5 1.5 0 0 1 1.5 1h11A1.5 1.5 0 0 1 14 2.5v10.528c0 .3-.05.654-.238.972h.738a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 1 1 0v9a1.5 1.5 0 0 1-1.5 1.5H1.497A1.497 1.497 0 0 1 0 13.5zM12 14c.37 0 .654-.211.853-.441.092-.106.147-.279.147-.531V2.5a.5.5 0 0 0-.5-.5h-11a.5.5 0 0 0-.5.5v11c0 .278.223.5.497.5z" />
                                            <path
                                                d="M2 3h10v2H2zm0 3h4v3H2zm0 4h4v1H2zm0 2h4v1H2zm5-6h2v1H7zm3 0h2v1h-2zM7 8h2v1H7zm3 0h2v1h-2zm-3 2h2v1H7zm3 0h2v1h-2zm-3 2h2v1H7zm3 0h2v1h-2z" />
                                        </svg>
                                    </span>
                                    <span class="nav-link-text">Berita</span>
                                </a><!--//nav-link-->
                            </li><!--//nav-item-->
                        @endcan
                        @can('manage pengumuman')
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('pengumuman.index') }}">
                                    <span class="nav-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-speaker" viewBox="0 0 16 16">
                                            <path
                                                d="M12 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM4 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z" />
                                            <path
                                                d="M8 4.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5M8 6a2 2 0 1 0 0-4 2 2 0 0 0 0 4m0 3a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3m-3.5 1.5a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0" />
                                        </svg>
                                    </span>
                                    <span class="nav-link-text">Pengumuman</span>
                                </a><!--//nav-link-->
                            </li><!--//nav-item-->
                        @endcan
                        @can('manage agenda')
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('agenda.index') }}">
                                    <span class="nav-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-calendar2-event" viewBox="0 0 16 16">
                                            <path
                                                d="M11 7.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5z" />
                                            <path
                                                d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5M2 2a1 1 0 0 0-1 1v11a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1z" />
                                            <path
                                                d="M2.5 4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H3a.5.5 0 0 1-.5-.5z" />
                                        </svg>
                                    </span>
                                    <span class="nav-link-text">Agenda</span>
                                </a><!--//nav-link-->
                            </li><!--//nav-item-->
                        @endcan
                        @canany(['manage album', 'manage galeri'])
                            <li class="nav-item has-submenu">
                                <a class="nav-link submenu-toggle" href="#" data-bs-toggle="collapse"
                                    data-bs-target="#submenu-album" aria-expanded="false" aria-controls="submenu-1">
                                    <span class="nav-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-camera" viewBox="0 0 16 16">
                                            <path
                                                d="M15 12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V6a1 1 0 0 1 1-1h1.172a3 3 0 0 0 2.12-.879l.83-.828A1 1 0 0 1 6.827 3h2.344a1 1 0 0 1 .707.293l.828.828A3 3 0 0 0 12.828 5H14a1 1 0 0 1 1 1zM2 4a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2h-1.172a2 2 0 0 1-1.414-.586l-.828-.828A2 2 0 0 0 9.172 2H6.828a2 2 0 0 0-1.414.586l-.828.828A2 2 0 0 1 3.172 4z" />
                                            <path
                                                d="M8 11a2.5 2.5 0 1 1 0-5 2.5 2.5 0 0 1 0 5m0 1a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7M3 6.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0" />
                                        </svg>
                                    </span>
                                    <span class="nav-link-text">Galeri</span>
                                    <span class="submenu-arrow">
                                        <svg width="1em" height="1em" viewBox="0 0 16 16"
                                            class="bi bi-chevron-down" fill="currentColor"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" />
                                        </svg>
                                    </span><!--//submenu-arrow-->
                                </a><!--//nav-link-->
                                <div id="submenu-album" class="collapse submenu submenu-album"
                                    data-bs-parent="#menu-accordion">
                                    <ul class="submenu-list list-unstyled">
                                        @can('manage album')
                                            <li class="submenu-item"><a class="submenu-link"
                                                    href="{{ route('album.index') }}">Album</a>
                                            </li>
                                        @endcan
                                        @can('manage galeri')
                                            <li class="submenu-item"><a class="submenu-link"
                                                    href="{{ route('galeri.index') }}">Galeri Foto</a>
                                            </li>
                                        @endcan
                                    </ul>
                                </div>
                            </li><!--//nav-item-->
                        @endcanany
                        @can('manage video')
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('video.index') }}">
                                    <span class="nav-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-camera-video" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd"
                                                d="M0 5a2 2 0 0 1 2-2h7.5a2 2 0 0 1 1.983 1.738l3.11-1.382A1 1 0 0 1 16 4.269v7.462a1 1 0 0 1-1.406.913l-3.111-1.382A2 2 0 0 1 9.5 13H2a2 2 0 0 1-2-2zm11.5 5.175 3.5 1.556V4.269l-3.5 1.556zM2 4a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1h7.5a1 1 0 0 0 1-1V5a1 1 0 0 0-1-1z" />
                                        </svg>
                                    </span>
                                    <span class="nav-link-text">Video</span>
                                </a><!--//nav-link-->
                            </li><!--//nav-item-->
                        @endcan
                        @can('manage unduh')
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('unduh.index') }}">
                                    <span class="nav-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-file-earmark-arrow-down"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M8.5 6.5a.5.5 0 0 0-1 0v3.793L6.354 9.146a.5.5 0 1 0-.708.708l2 2a.5.5 0 0 0 .708 0l2-2a.5.5 0 0 0-.708-.708L8.5 10.293z" />
                                            <path
                                                d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2M9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5z" />
                                        </svg>
                                    </span>
                                    <span class="nav-link-text">Unduhan</span>
                                </a><!--//nav-link-->
                            </li><!--//nav-item-->
                        @endcan
                    </ul><!--//app-menu-->
                </nav><!--//app-nav-->
            </div><!--//sidepanel-inner-->
        </div><!--//app-sidepanel-->
    </header><!--//app-header-->

    @yield('content')



    <!-- Javascript -->
    <script src="{{ asset('template-admin/assets/plugins/popper.min.js') }}"></script>
    <script src="{{ asset('template-admin/assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
    {{-- <script src="{{ asset('template-admin/assets/js/jquery.min.js') }}"></script> --}}
    <script src="{{ asset('template-admin/assets/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('template-admin/assets/js/datatables.min.js') }}"></script>

    <!-- Page Specific JS -->
    <script src="{{ asset('template-admin/assets/js/app.js') }}"></script>

</body>

</html>
