@include('admin.includes.nav_bar', ['active' => 'users', 'title' => 'Users Management'])
<div class="container">
    <div class="row justify-content-between align-items-center">
        <div class="col-lg-6">
          
            @if (session('message'))
                <h6 style="margin-top: 20px;color:green">{{ session('message') }}</h6>
            @endif
        </div>
    </div>
</div>
<br>
@foreach ($users as $user)
<div class="container" style="margin-top:20px">
    <div class="row">
        <div class="col-4">
            <h5 style="margin: 20px 0 20px 0">2x2 Picture: </h5> 
                <div class="col-lg-12" style="margin-bottom: 10px">
                    <img id="{{ $user->id }}" style="border-radius: 10px; width: 300px;" 
                        src="{{ $user->avatar }}"
                        data-mdb-img="{{ $user->avatar }}";  srcset="">
                </div>
        </div>
        <div class="col-4">
            <h5 style="margin: 20px 0 20px 0">Front ID: </h5> 
                <div class="col-lg-12" style="margin-bottom: 10px">
                    <img id="{{ $user->id }}" style="border-radius: 10px; width: 300px;" 
                        src="{{ $user->front_id }}"
                        data-mdb-img="{{ $user->front_id }}";  srcset="">
                </div>
        </div>
        <div class="col-4">
            <h5 style="margin: 20px 0 20px 0">Back ID: </h5> 
                <div class="col-lg-12" style="margin-bottom: 10px">
                    <img id="{{ $user->id }}" style="border-radius: 10px; width: 300px;" 
                        src="{{ $user->back_id }}"
                        data-mdb-img="{{ $user->back_id }}";  srcset="">
                </div>
        </div>
    </div>
            <h6 style="margin:5px 0 10px 0">Firstname:  {{ $user->firstname }}</h6>
            <h6 style="margin:5px 0 10px 0">Middlename: {{ $user->middlename }}</h6>
            <h6 style="margin:5px 0 10px 0">Lastname: {{ $user->lastname }}</h6>
            <h6 style="margin:5px 0 10px 0">Gender: {{ $user->gender }}</h6>
            <h6 style="margin:5px 0 10px 0">Email:  {{ $user->email }}</h6><br>
            <a href="{{route('profile.show',['id' => $user->id])}}" class="btn btn-success">Update information</a>
            <a href="{{route('changepass')}}" class="btn btn-success" style="background:#6259CA">Modify Credentials</a>
        </div>
    </div>
</div>
    
@endforeach
<script>
    $(document).ready(function() {
        $('#table').DataTable();
    });
</script>
@include('admin.includes.footer');
