<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap');
    </style>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/assets.css">
    <link rel="stylesheet" href="/css/post.css">
    <link rel="stylesheet" href="/css/data_table.css">
    <link rel="stylesheet" href="/css/notif.css">
    <link rel="stylesheet" href="/css/newsfeed.css">
    <script src="/js/jquery.js"></script>
    <script src="/js/data_table.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body>
    <div id="loader">
        <img src="/assets/load.gif" alt="" srcset="">
    </div>
    <div class="side-nav-bar">
        <h3><i class="fa-solid fa-city"></i>BIS</h3>
        <ul>
            <li>
                <div class="{{ $active == 'dashboard' ? 'active' : '' }}">
                    <div class="top-curve"></div>
                    <div class="item"
                        style="{{ $active == 'dashboard' ? '' : 'margin:20px 0;background-color: #6259CA;border-radius:10px;margin-right:20px' }}">
                        <a href="{{ route('dashboard') }}">
                            <div><i class="fa-solid fa-chart-pie"></i></div> Dashboard
                        </a>
                    </div>
                    <div class="bottom-curve"></div>
                </div>
            </li>
        </ul>
        <p>Management</p>
        <ul>
            <li>
                <div class="{{ $active == 'official' ? 'active' : '' }}">
                    <div class="top-curve"></div>
                    <div class="item">
                        <a href="{{ route('officials.index') }}">
                            <div><i class="fa-solid fa-users"></i></div> Officials
                        </a>
                    </div>
                    <div class="bottom-curve"></div>
                </div>
            </li>
            <li>
                <div class="{{ $active == 'users' ? 'active' : '' }}">
                    <div class="top-curve"></div>
                    <div class="item">
                        <a href="{{ route('users.index') }}">
                            <div><i class="fa-solid fa-user"></i></div>Users
                        </a>
                    </div>
                    <div class="bottom-curve"></div>
                </div>
            </li>
            <li>
                <div class="{{ $active == 'position' ? 'active' : '' }}">
                    <div class="top-curve"></div>
                    <div class="item">
                        <a href="{{ route('barangay_positions.index') }}">
                            <div><i class="fa-solid fa-newspaper"></i></div>Positions
                        </a>
                    </div>
                    <div class="bottom-curve"></div>
                </div>
            </li>
            <li>
                <div class="{{ $active == 'post' ? 'active' : '' }}">
                    <div class="top-curve"></div>
                    <div class="item">
                        <a href="{{ route('post') }}">
                            <div><i class="fa-solid fa-newspaper"></i></div>News
                        </a>
                    </div>
                    <div class="bottom-curve"></div>
                </div>
            </li>
            <li>
                <div class="{{ $active == 'newsfeed' ? 'active' : '' }}">
                    <div class="top-curve"></div>
                    <div class="item">
                        <a href="{{ route('newsfeed') }}">
                            <div><i class="fa-solid fa-database"></i></div>Newsfeed
                        </a>
                    </div>
                    <div class="bottom-curve"></div>
                </div>
            </li>
            <li>
                <div class="{{ $active == 'requests' ? 'active' : '' }}">
                    <div class="top-curve"></div>
                    <div class="item">
                        <a href="{{ route('request') }}">
                            <div><i class="fa-solid fa-list-check"></i></div>Requests
                        </a>
                    </div>
                    <div class="bottom-curve"></div>
                </div>
            </li>
            <li>
                <div class="{{ $active == 'certificate' ? 'active' : '' }}">
                    <div class="top-curve"></div>
                    <div class="item">
                        <a href="{{route('certificate.index')}}">
                            <div><i class="fa-solid fa-certificate"></i></div>Certificates
                        </a>
                    </div>
                    <div class="bottom-curve"></div>
                </div>
            </li>
            <li>
                <div class="{{ $active == 'services' ? 'active' : '' }}">
                    <div class="top-curve"></div>
                    <div class="item">
                        <a href="{{ route('services.index') }}">
                            <div><i class="fa-solid fa-newspaper"></i></div>Services
                        </a>
                    </div>
                    <div class="bottom-curve"></div>
                </div>
            </li>
            {{-- <li>
                <div class="">
                    <div class="top-curve"></div>
                    <div class="item">
                        <a href="">
                            <div><i class="fa-solid fa-book"></i></div>Records
                        </a>
                    </div>
                    <div class="bottom-curve"></div>
                </div>
            </li> --}}
            <li>
                <div class="{{ $active == 'blotters' ? 'active' : '' }}">
                    <div class="top-curve"></div>
                    <div class="item">
                        <a href="{{ route('blotter.index') }}">
                            <div><i class="fa-solid fa-users-slash"></i></div>Blotter
                        </a>
                    </div>
                    <div class="bottom-curve"></div>
                </div>
            </li>
        </ul>
        {{-- <p>Others</p>
        <ul>
            <li>
                <div class="">
                    <div class="top-curve"></div>
                    <div class="item">
                        <a href="">
                            <div><i class="fa-solid fa-message"></i></div>Messages
                        </a>
                    </div>
                    <div class="bottom-curve"></div>
                </div>
            </li>
            <li>
                <div class="">
                    <div class="top-curve"></div>
                    <div class="item">
                        <a href="">
                            <div><i class="fa-solid fa-gear"></i></div>Settings
                        </a>
                    </div>
                    <div class="bottom-curve"></div>
                </div>
            </li>
            <li>
                <div class="{{ $active == 'assets' ? 'active' : '' }}">
                    <div class="top-curve"></div>
                    <div class="item">
                        <a href="{{ route('assets') }}">
                            <div><i class="fa-solid fa-image"></i></div>Assets
                        </a>
                    </div>
                    <div class="bottom-curve"></div>
                </div>
            </li>
        </ul> --}}
    </div>
    <div class="right-content">
        <div style="">
            <div class="container" style="margin-bottom:30px">
                <div class="row justify-content-center align-items-center">
                    <div class="col-lg-6">
                        <h6>Date Today: {{ now() }}</h6>
                    </div>
                    <div class="col-lg-6" style="display:flex;justify-content:flex-end">
                        <div>
                            <a class="btn btn-sm btn-outline-secondary" style="" target="_blank"
                                href="{{ route('assets') }}"><i class="fa-regular fa-image"></i></a>
                            <a data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight"
                                aria-controls="offcanvasRight" id="notif_click" style="" type="button"
                                class="position-relative btn btn-sm btn-outline-secondary">
                                <i class="fa-regular fa-bell"></i>
                                <span id="notif_count"
                                    class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                </span>
                            </a>
                            <a href="/chatify" style="" type="button"
                                class="position-relative btn btn-sm btn-outline-secondary">
                                <i class="fa-regular fa-message"></i>
                                <span
                                    class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                    {{-- {{ Chatify::countAllUnseenMessages() }}+ --}}
                                </span>
                            </a>

                            <a role="button" id="logout" class="btn btn-sm btn-outline-secondary"
                                style="padding:6px 20px;margin: 0 0 0 20px;background:var(--btnBg);border-radius:10px;color:white">Logout</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
