@include('users.includes.nav_bar', ['active' => 'assets', 'title' => 'Home page'])
<div class="container" style="margin-top:20px">
    <div class="row">
        <h5 style="margin:50px 0 50px 0">Update Information</h5>
        <div style="padding: 20px;border: 1px solid rgba(0, 0, 0, .05)">
            <h6>Firstname: </h6>
            <h6 style="margin:5px 0 10px 0">{{ Auth::user()->firstname }}</h6>
            <h6>Middlename:</h6>
            <h6 style="margin:5px 0 10px 0">{{ Auth::user()->middlename }}</h6>
            <h6>Lastname:</h6>
            <h6 style="margin:5px 0 10px 0"> {{ Auth::user()->lastname }}</h6>
            <h6>Gender: </h6>
            <h6 style="margin:5px 0 10px 0">{{ Auth::user()->gender }}</h6>
            <h6>Email: </h6>
            <h6 style="margin:5px 0 10px 0">{{ Auth::user()->email }}</h6><br>
            <a href="{{route('profile.show')}}" class="btn btn-success">Update information</a>
            <a href="{{route('changepass')}}" class="btn btn-success" style="background:#6259CA">Modify Credentials</a>
        </div>
    </div>
</div>
@include('users.includes.footer')
