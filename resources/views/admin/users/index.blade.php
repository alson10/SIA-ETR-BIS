@include('admin.includes.nav_bar', ['active' => 'users', 'title' => 'Users Management'])
<div class="container">
    <div class="row justify-content-between align-items-center">
        <div class="col-lg-6">

            <h5>User Management</h5>
            @if (session('message'))
                <h6 style="margin-top: 20px;color:green">{{ session('message') }}</h6>
            @endif
        </div>
    </div>
</div>
<br>
<div class="container">
    <table id="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Gender</th>
                <th>Status</th>
                <th style="text-align: center">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->firstname }} {{ $user->middlehame }} {{ $user->lastname }}</td>     
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->gender }} </td>
                    <td>
                        {{ 
                            $user->id_status == 0 ? 'Pending' : 
                            ($user->id_status == 1 ? 'Valid ID' : 'Invalid ID') 
                        }}
                    </td>
                    
                    <td>
                        <center>
                            <div class="dropdown">
                                <a href="" class=""
                                    style="color:white;background-color:forestgreen;padding:8px 15px;border-radius:10px;font-size:15px"
                                    role="button" data-bs-toggle="dropdown" aria-expanded="false"><i
                                        class="fa-solid fa-gear"></i></a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="{{route('users.show',['id' => $user->id])}}">View</a></li>
                                    <li><a class="dropdown-item" href="{{route('users.toggle',['id' => $user->id, 'id_status' => 1])}}">Accept ID</a></li>
                                    <li><a class="dropdown-item" href="{{route('users.toggle',['id' => $user->id, 'id_status' => 2])}}">Decline ID</a></li>
                                </ul>
                            </div>
                        </center>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
</div>
<script>
    $(document).ready(function() {
        $('#table').DataTable();
    });
</script>
@include('admin.includes.footer');
