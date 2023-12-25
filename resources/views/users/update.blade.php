@include('users.includes.nav_bar', ['active' => 'assets', 'title' => 'Home page'])
<div class="container" style="margin-top:20px">
    @foreach ($users as $user)
    <div class="row">
        <h5 style="margin:50px 0 50px 0">Update Information</h5>
        <form action="{{ route('profile.update', ['id' => $user->id]) }}" method="post">
            @csrf
            <div class="row">
                <div class="col-6">
                    <div class="mb-3">
                        <label for="firstname" class="form-label">Firstname</label>
                        <input required="text" value="{{ old('firstname', $user->firstname) }}" name="firstname"
                            class="form-control" id="firstname">
                        @error('firstname')
                            <div class="form-text">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="mb-3">
                        <label for="middlename" class="form-label">Middlename(optional)</label>
                        <input type="text" value="{{ old('middlename', $user->middlename) }}"
                            name="middlename" class="form-control" id="middlename">
                    </div>
                </div>
                <div class="col-6">
                    <div class="mb-3">
                        <label for="lastname" class="form-label">Lastname</label>
                        <input required type="text" value="{{ old('lastname', $user->lastname) }}"
                            name="lastname" class="form-control" id="lastname">
                        @error('lastname')
                            <div class="form-text" style="">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="mb-3">
                        <label for="gender" class="form-label">Gender</label>
                        <select required class="form-select" name="gender" aria-label="Default select example">
                            <option value="">Select gender</option>
                            <option {{ old('gender', $user->gender) == 'Male' ? 'selected' : '' }}
                                value="Male">
                                Male
                            </option>
                            <option {{ old('gender', $user->gender) == 'Female' ? 'selected' : '' }}
                                value="Female">Female
                            </option>
                        </select>
                        @error('gender')
                            <div class="form-text">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="mb-3">
                        <label for="birthdate" class="form-label">Birthdate:</label>
                        <input required type="date" value="{{ old('birthdate', $user->birthdate) }}"
                            name="birthdate" class="form-control" id="birthdate">
                        @error('birthdate')
                            <div class="form-text">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email:</label>
                        <input required type="email" value="{{ old('email', $user->email) }}" name="email"
                            class="form-control" id="email">
                        @error('email')
                            <div class="form-text">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <h5 style="margin: 20px 0 20px 0">2x2 Picture: </h5> 
                            <div class="col-lg-12" style="margin-bottom: 10px">
                                <img id="{{ $user->id }}" style="border-radius: 10px; width: 300px; height: 200px; object-fit: cover;" 
                                    src="{{ $user->avatar }}"
                                    data-mdb-img="{{ $user->avatar }}";  srcset="">
                            </div>
                           
                            <input type="file" name="avatar"  accept="image/*" alt ="{{ $user->avatar }}" class="form-control" id="avatar">
                            @error('avatar')
                                <div class="form-text">{{ $message }}</div>
                            @enderror
                    </div>
                    <div class="col-4">
                        <h5 style="margin: 20px 0 20px 0">Front ID: </h5> 
                            <div class="col-lg-12" style="margin-bottom: 10px">
                                <img id="{{ $user->id }}" style="border-radius: 10px; width: 300px; height: 200px; object-fit: cover;" 
                                    src="{{ $user->front_id }}"
                                    data-mdb-img="{{ $user->front_id }}";  srcset="">
                            </div>
                            <input type="file" name="front_id"  accept="image/*" class="form-control" id="front_id">

                            @error('front_id')
                                <div class="form-text">{{ $message }}</div>
                            @enderror
                    </div>
                    <div class="col-4">
                        <h5 style="margin: 20px 0 20px 0">Back ID: </h5> 
                            <div class="col-lg-12" style="margin-bottom: 10px">
                                <img id="{{ $user->id }}" style="border-radius: 10px; width: 300px; height: 200px; object-fit: cover;" 
                                    src="{{ $user->back_id }}"
                                    data-mdb-img="{{ $user->back_id }}";  srcset="">
                            </div>
                            <input  type="file" name="back_id" accept="image/*" class="form-control" id="back_id">
                            @error('back_id')
                                <div class="form-text">{{ $message }}</div>
                            @enderror
                    </div>
                </div> 
               
                @endforeach
                <div class="row mt-3">
                    <div class="col-md-3">
                        <button class="btn btn-success" style="">Save information</button>
                    </div>
                </div>

        </form>
    </div>
</div>
@include('users.includes.footer')
