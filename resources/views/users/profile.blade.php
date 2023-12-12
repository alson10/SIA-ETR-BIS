@include('users.includes.nav_bar', ['active' => 'assets', 'title' => 'Home page'])
<div class="container" style="margin-top:20px">
    <div class="row">
        <h5 style="margin:50px 0 50px 0">Update Information</h5>
        <div style="padding: 20px;border: 1px solid rgba(0, 0, 0, .05)">
            <div class="row">
                <div class="col-4">
                    <h5 style="margin: 20px 0 20px 0">2x2 Picture: </h5> 
                        <div class="col-lg-12" style="margin-bottom: 10px">
                            <img id="{{ Auth::user()->id }}" style="border-radius: 10px; width: 300px; height: 200px; object-fit: cover;" 
                                src="{{ Auth::user()->avatar }}"
                                data-mdb-img="{{ Auth::user()->avatar }}";  srcset="">
                        </div>
                </div>
                <div class="col-4">
                    <h5 style="margin: 20px 0 20px 0">Front ID: </h5> 
                        <div class="col-lg-12" style="margin-bottom: 10px">
                            <img id="{{ Auth::user()->id }}" style="border-radius: 10px; width: 300px; height: 200px; object-fit: cover;" 
                                src="{{ Auth::user()->front_id }}"
                                data-mdb-img="{{ Auth::user()->front_id }}";  srcset="">
                        </div>
                </div>
                <div class="col-4">
                    <h5 style="margin: 20px 0 20px 0">Back ID: </h5> 
                        <div class="col-lg-12" style="margin-bottom: 10px">
                            <img id="{{ Auth::user()->id }}" style="border-radius: 10px; width: 300px; height: 200px; object-fit: cover;" 
                                src="{{ Auth::user()->back_id }}"
                                data-mdb-img="{{ Auth::user()->back_id }}";  srcset="">
                        </div>
                </div>
            </div>
            {{-- <img src="/storage/assets/users-avatar/{{ asset(Auth::user()->avatar) }}" class="img-fluid" style="max-height: 350px; max-width: 100%;"> --}}
            <h6 style="margin:5px 0 10px 0">Firstname:  {{ Auth::user()->firstname }}</h6>
            <h6 style="margin:5px 0 10px 0">Middlename: {{ Auth::user()->middlename }}</h6>
            <h6 style="margin:5px 0 10px 0">Lastname: {{ Auth::user()->lastname }}</h6>
            <h6 style="margin:5px 0 10px 0">Gender: {{ Auth::user()->gender }}</h6>
            <h6 style="margin:5px 0 10px 0">Email:  {{ Auth::user()->email }}</h6><br>

            <a href="{{route('profile.show',['id' => Auth::user()->id])}}" class="btn btn-success">Update information</a>
            <a href="{{route('changepass')}}" class="btn btn-success" style="background:#6259CA">Modify Credentials</a>
        </div>
    </div>
</div>
@include('users.includes.footer')
