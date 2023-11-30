@include('admin.includes.nav_bar', ['active' => 'certificate', 'title' => 'Certificate Management'])
<style>
    label{
        margin-bottom: 5px;
    }
</style>
<div class="container">
    <div class="row">
        <h5 style="margin-bottom: 20px">Certificates Of Indigency/Clearance:</h5>
        <form action="{{route('certificate.indigency')}}" method="post">
            @csrf
            <div class="col-12">
                <div class="mb-3">
                    <label for="">Type Certificates:</label>
                    <select name="type" required id="" required class="form-control">
                        <option value="">Select type of certificates</option>
                        <option value="Barangay Clearance">Barangay Clearance</option>
                        <option value="Certificates Of Indigency">Certificates Of Indigency</option>
                    </select>
                </div>
            </div>

            <div class="col-12">
                <div class="mb-3">
                    <label for="">Recepient:</label>
<textarea name="r" id="" required cols="30" rows="3" class="form-control">
This is to certify that SALYN G. MAXIMO , of legal age, female, widow, Filipino, is a resident of this Barangay is one of the indigents in our barangay.
</textarea>
                </div>
            </div>
            <div class="col-12">
                <div class="mb-3">
                    <label for="">Purpose:</label>
<textarea name="p" required id="" cols="30" rows="3" class="form-control">
This certification is being issued upon the request of the above-named person for whatever legal purpose it may serve her best.</textarea>
                </div>
            </div>
            <div class="col-12">
                <div class="mb-3">
                    <label for="">Given date:</label>
<textarea name="d" id="" required cols="30" rows="3" class="form-control">Issued this 6th day of November 28 at the office of the punong Barangay,Barangay Alitaya, Mangaldan, Pagansinan, Philippines.</textarea>
                </div>
            </div>
            <div class="col-12">
                <button type="submit" style="float: right;margin-top:10px" class="btn btn-success">Generate Certificare</button>
            </div>
        </form>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#table').DataTable();
    });
</script>
@include('admin.includes.footer');

{{-- 
@include('admin.includes.nav_bar', ['active' => 'certificate', 'title' => 'Certificate Management'])
<div class="container">
    <div class="row justify-content-between align-items-center">
        <div class="col-lg-6">

            <h5>Certificates Management</h5>
            @if (session('message'))
                <h6 style="margin-top: 20px;color:green">{{ session('message') }}</h6>
            @endif
        </div>
        <div class="col-lg-2">
            <a href="{{ route('certificate.create') }}">
                <button class="btn-add-assets" data-bs-toggle="modal" data-bs-target="#addModal">Add new certicate</button>
            </a>
        </div>
    </div>
</div>
<br>
<div class="container">
    <div class="row">
        <div class="col">
            <table id="table">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Date Create</th>
                        <th width="100" style="text-align: center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($certificates as $item)
                        <tr>
                            <td>{{ $item->title }}</td>
                            <td>{{ $item->created_at }}</td>
                            <td>
                                <center>
                                    <div class="dropdown">
                                        <a href="" class=""
                                            style="color:white;background:forestgreen;padding:5px 10px;border-radius:10px"
                                            role="button" data-bs-toggle="dropdown" aria-expanded="false"><i
                                                class="fa-solid fa-gear"></i></a>

                                        <ul class="dropdown-menu">

                                            <li><a class="dropdown-item" target="_blank"
                                                    href="{{ route('certificate.printna', [
                                                        'id' => $item->id,
                                                    ]) }}">Print</a>
                                            </li>
                                            <li><a class="dropdown-item"
                                                    href="{{ route('certificate.edit', [
                                                        'id' => $item->id,
                                                    ]) }}">Edit</a>
                                            </li>
                                            <li><a class="dropdown-item" href="#">Delete</a></li>
                                        </ul>
                                    </div>
                                </center>
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
@include('admin.includes.footer'); --}}
