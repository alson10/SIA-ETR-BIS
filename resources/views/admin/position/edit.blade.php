@include('admin.includes.nav_bar', ['active' => 'position', 'title' => 'Positions Management'])
<div class="container">
    <div class="row justify-content-between align-items-center">
        <div class="col-lg-6">
            <h5>Positions Management</h5>
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

            <form action="{{ route('barangay_positions.update', $barangayPosition) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" id="name"
                        value="{{ old('name', $barangayPosition->name) }}" required>
                </div>

                <button class="btn btn-success" type="submit">Update Position</button>
            </form>
        </div>
    </div>
</div>

@include('admin.includes.footer');
