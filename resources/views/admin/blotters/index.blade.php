@include('admin.includes.nav_bar', ['active' => 'blotters', 'title' => 'Blotters Management'])
<div class="container">
    <div class="row justify-content-between align-items-center">
        <div class="col-lg-6">
            <h5>Blotter Management</h5>
            @if (session('message'))
                <h6 style="margin-top: 20px;color:green">{{ session('message') }}</h6>
            @endif
        </div>
        <div class="col-lg-2">
            <a href="{{ route('blotter.create') }}">
                <button class="btn-add-assets" data-bs-toggle="modal" data-bs-target="#addModal">Add new Blotter</button>
            </a>
        </div>
    </div>
</div>
<br>
<div class="container">
    <table id="table">
        <thead>
            <tr>
                <th>Complainant Name</th>
                <th>Respondent Name</th>
                <th>Date Happened</th>
                <th>Type</th>
                <th>Status</th>
                <th style="text-align: center">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($blotters as $blotter)
                <tr>
                    <td>{{ $blotter->complainant_name }}</td>
                    <td>{{ $blotter->respondent_name }}</td>
                    <td>{{ $blotter->date }}</td>
                    <td>{{ $blotter->type }}</td>
                    <td>
                        @switch($blotter->status)
                            @case(1)
                                Active
                            @break

                            @case(2)
                                Settled
                            @break

                            @default
                        @endswitch
                    </td>
                    <td>

                        <center>
                            <div class="dropdown">
                                <a href="" class=""
                                    style="color:white;background-color:forestgreen;padding:8px 15px;border-radius:10px;font-size:15px"
                                    role="button" data-bs-toggle="dropdown" aria-expanded="false"><i
                                        class="fa-solid fa-gear"></i></a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item"
                                            href="{{ route('blotter.show', [
                                                'id' => $blotter->id,
                                            ]) }}">View
                                            full details</a>
                                    </li>
                                    @if ($blotter->status == 1)
                                        <li><a class="dropdown-item"
                                                href="{{ route('blotter.edit', [
                                                    'id' => $blotter->id,
                                                ]) }}">Edit</a>
                                        </li>
                                        <li><a class="dropdown-item" onclick='return confirm("Are you sure?")'
                                                href="{{ route('blotter.delete', [
                                                    'id' => $blotter->id,
                                                ]) }}">Delete</a>
                                        </li>
                                        {{-- <li><a class="dropdown-item" href="#">Delete</a></li> --}}
                                        <li><a class="dropdown-item"
                                                href="{{ route('blotter.settled', [
                                                    'id' => $blotter->id,
                                                ]) }}">Set
                                                as settled</a></li>
                                    @endif
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
