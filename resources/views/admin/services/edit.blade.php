@include('admin.includes.nav_bar', ['active' => 'services', 'title' => 'Services Management'])
<div class="container">
    <div class="row justify-content-between align-items-center">
        <div class="col-lg-6">
            <h5>Update Services</h5>
        </div>
        {{-- <div class="col-lg-2">
            <a href="">
                <button class="btn-add-assets" data-bs-toggle="modal" data-bs-target="#addModal">Create Post</button>
            </a>
        </div> --}}
    </div>
</div>
<br>
<div class="container">
    <div class="row">
        <div class="col-12">


            @if ($errors->any())
                <div>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('services.update',[
                'service'=>$service
            ]) }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="service_name" id="name" value="{{ old('service_name',$service->services_name) }}" required>
                </div>
                <button class="btn btn-success" type="submit">Add Services</button>
            </form>
        </div>
    </div>
</div>

@include('admin.includes.footer');
