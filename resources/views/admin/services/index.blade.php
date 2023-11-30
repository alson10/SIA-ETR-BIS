@include('admin.includes.nav_bar', ['active' => 'services', 'title' => 'Services Management'])
<div class="container">
    <div class="row justify-content-between align-items-center">
        <div class="col-lg-6">
            <h5>Services Management</h5>
        </div>
        <div class="col-lg-2">
            <a href="{{ route('services.create') }}">
                <button class="btn-add-assets" data-bs-toggle="modal" data-bs-target="#addModal">Create New
                    Serivces</button>
            </a>
        </div>
    </div>
</div>

<br>

<div class="container">
    <div class="row">
        <div class="col-12">
            <table id="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th style="width: 100px">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($services as $service)
                        <tr>
                            <td>{{ $service->service_name }}</td>
                            <td style="display:flex">
                                <a href="{{ route('barangay_positions.edit', $service) }}" class="btn btn-success" >Edit</a>

                                {{-- <form action="{{ route('barangay_positions.destroy', $position) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">Delete</button>
                                </form> --}}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#table').DataTable();
    });
</script>
@include('admin.includes.footer');
