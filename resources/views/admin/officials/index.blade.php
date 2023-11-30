@include('admin.includes.nav_bar', ['active' => 'official', 'title' => 'Officials Management'])
<div class="container">
    <div class="row justify-content-between align-items-center">
        <div class="col-lg-6">

            <h5>Officials Management</h5>
            @if (session('message'))
                <h6 style="margin-top: 20px;color:green">{{ session('message') }}</h6>
            @endif
        </div>
        <div class="col-lg-2">
            <a href="{{route('officials.create')}}">
                <button class="btn-add-assets" data-bs-toggle="modal" data-bs-target="#addModal">Add new officials</button>
            </a>
        </div>
    </div>
</div>
<br>
<div class="container">
    <table id="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Position</th>
                <th>Term start</th>
                <th>Term end</th>
                <th>Status</th>
                <th style="text-align: center">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($officials as $official)
                <tr>
                    <td>{{ $official->firstname }} {{ $official->middlehame }} {{ $official->lastname }}</td>
                    <td>{{ $official->relation->name }}</td>
                    <td>{{ $official->term_start }} </td>
                    <td>{{ $official->term_end }} </td>
                    <td>{{ $official->status == 0 ? 'Inactice' : 'Active' }}</td>
                    <td>
                        <center>
                            <div class="dropdown">
                                <a href="" class=""
                                    style="color:white;background-color:forestgreen;padding:8px 15px;border-radius:10px;font-size:15px"
                                    role="button" data-bs-toggle="dropdown" aria-expanded="false"><i
                                        class="fa-solid fa-gear"></i></a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item"
                                            href="{{ route('officials.edit', [
                                                'id' => $official->id,
                                            ]) }}">Edit</a>
                                    </li>
                                    <li><a class="dropdown-item" href="{{route('officials.toggle',[
                                        'id'=>$official->id,
                                    ])}}">{{ $official->status== 1 ? "Set to inactive" :  "Set to actice"}}</a></li>
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
