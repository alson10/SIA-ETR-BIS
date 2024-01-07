@include('admin.includes.nav_bar', ['active' => 'dashboard', 'title' => 'Dashboard'])
<style>
    .d-card {
        padding: 20px;
        box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;
        color: black; /* Add this line to set text color to black */
    }

    .d-card h6 {
        font-weight: 600;
        margin-bottom: 10px;
        color: black; /* Add this line to set text color to black */
    }

    .d-card h1 {
        font-weight: 600;
        color: black; /* Add this line to set text color to black */
    }

    .col-md-3 {
        margin-bottom: 15px;
    }
</style>
<div class="container">
    <div class="row justify-content-between align-items-center">
        <div class="col-lg-6">
            <h5>Dashboard</h5>

        </div>

    </div>
</div>
<br>
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <a href="{{ route('users.index')}}">
                <div class="d-card">
                    <h6>Residents:</h6>
                    <h1>{{ $users }}</h1>
                </div>
            </a>
        </div>
        <div class="col-md-3">
            <a href="{{ route('request') }}">
                <div class="d-card">
                    <h6>Pending Request:</h6>
                    <h1>{{ $pendingRequests }}</h1>
                </div>
            </a>
        </div>
        <div class="col-md-3">
            <a href="{{ route('request') }}">
                <div class="d-card">
                    <h6>Completed Requests:</h6>
                    <h1>{{ $completedRequests }}</h1>
                </div>
            </a>
        </div>
        <div class="col-md-3">
            <a href="{{ route('officials.index')}}">
                <div class="d-card">
                    <h6>Officials:</h6>
                    <h1>{{ $officials }}</h1>
                </div>
            </a>
        </div>
        <div class="col-md-3">
            <a href="{{ route('newsfeed') }}">
                <div class="d-card">
                    <h6>News:</h6>
                    <h1>{{ $news }}</h1>
                </div>
            </a>
        </div>
        <div class="col-md-3">
            <a href="{{ route('post')}}">
                <div class="d-card">
                    <h6>Post:</h6>
                    <h1>{{ $feeds }}</h1>
                </div>
            </a>
        </div>
        <div class="col-md-3">
            <a href="{{ route('blotter.index') }}">
                <div class="d-card">
                    <h6>Active blotters:</h6>
                    <h1>{{ $activeBlotters }}</h1>
                </div>
            </a>
        </div>
        <div class="col-md-3">
            <a href="{{ route('blotter.index') }}">
                <div class="d-card">
                    <h6>Settled blotters:</h6>
                    <h1>{{ $settledBlotters }}</h1>
                </div>
            </a>
        </div>
    </div>
</div>
</div>
@include('admin.includes.footer');
