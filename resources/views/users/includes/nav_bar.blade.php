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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/assets.css">
    <link rel="stylesheet" href="/css/post.css">
    <link rel="stylesheet" href="/css/data_table.css">
    <link rel="stylesheet" href="/css/user_home.css">
    <link rel="stylesheet" href="/css/notif.css">
    <link rel="stylesheet" href="/css/newsfeed.css">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="/js/jquery.js"></script>
    <script src="/js/data_table.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body>
    <div id="loader">
        <img src="/assets/load.gif" alt="" srcset="">
    </div>
    <nav class="navbar navbar-expand-md bg-dark" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <h5>Alitaya System's</h5>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-center" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item {{ $active == 'home' ? 'active' : '' }}">
                        <a class="nav-link" aria-current="page" href="/">Home</a>
                    </li>
                    <li class="nav-item {{ $active == 'news' ? 'active' : '' }}">
                        <a class="nav-link" href="/news">News</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ $active == 'announcement' ? 'active' : '' }}"
                            href="/annoucement">Annoucement</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ $active == 'activities' ? 'active' : '' }}"
                            href="/activities">Activities</a>
                    </li>

                    @auth
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('profile') }}">Profile</a>
                        </li>
                        @if (Auth::user()->type != 1)
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('myrequest') }}">My request</a>
                            </li>
                        @endif

                    @endauth
                </ul>
            </div>
            <div>
                @if (Auth::check())
                    <a id="notif_click" style="height: 30px;margin-right:15px" type="button"
                        class="position-relative btn btn-sm btn-outline-secondary" data-bs-toggle="offcanvas"
                        data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
                        <i class="fa-regular fa-bell"></i>
                        <span
                            id="notif_count"class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">

                        </span>
                    </a>
                    <a href="/chatify" style="height: 30px;margin-right:20px" type="button"
                        class="position-relative btn btn-sm btn-outline-secondary">
                        <i class="fa-regular fa-message"></i>
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                            {{ Chatify::countAllUnseenMessages() }}+
                        </span>
                    </a>

                    @if (Auth::user()->type != 1)
                        @if (Auth::user()->id_status == 0)
                            <button class="btn btn-sm btn-outline-secondary make-request-btn" type="button" onclick="showSweetAlert()">Make Request</button>
                        
                            <script>
                                function showSweetAlert() {
                                    Swal.fire({
                                        title: 'ID Processing',
                                        text: 'ID need to be validated to make a request.',
                                        icon: 'info',
                                        confirmButtonText: 'OK'
                                    });
                                }
                            </script>
                        @elseif (Auth::user()->id_status == 1)
                            <button class="btn btn-sm btn-outline-secondary make-request-btn" type="button"
                                data-bs-toggle="modal" data-bs-target="#exampleModal">Make Request</button>
                        @elseif (Auth::user()->id_status == 2)
                            <button class="btn btn-sm btn-outline-secondary make-request-btn" type="button" onclick="showSweetAlert()">Make Request</button>
                        
                            <script>
                                function showSweetAlert() {
                                    Swal.fire({
                                        title: 'Invalid ID',
                                        text: 'The ID is not valid. Please submit another ID.',
                                        icon: 'info',
                                        confirmButtonText: 'OK'
                                    });
                                }
                            </script>
                        @endif
                    @endif
                

                    <a style="height: 30px;margin-right:15px" id="logout" role="button"
                        class="position-relative btn btn-sm btn-outline-secondary">
                        <i class="fa-solid fa-right-from-bracket"></i>

                    </a>
                @else
                    <a href="/login"><button class="btn btn-sm btn-outline-secondary" type="button">Login</button></a>
                    <a href="/register"><button class="btn btn-sm btn-outline-secondary"
                            type="button">Register</button></a>
                @endif
            </div>
        </div>
    </nav>
