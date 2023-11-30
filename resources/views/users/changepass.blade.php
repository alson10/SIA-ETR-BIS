@include('users.includes.nav_bar', ['active' => 'assets', 'title' => 'Home page'])
<div class="container" style="margin-top:20px">
    <div class="row">
        <h5 style="margin:50px 0 50px 0">Update Information</h5>
        @if (session('status'))
            <h5 style="margin-bottom:20px">{{ session('status') }}</h5>
        @endif
        <form action="{{ route('password.update') }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-12">
                    <div class="mb-3">
                        <label for="firstname" class="form-label">Current password</label>
                        <input required type="password" value="" name="current_password" class="form-control"
                            id="firstname">
                        <div class="form-text">{{ $errors->updatePassword->first('current_password') }}</div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="mb-3">
                        <label for="middlename" class="form-label">New password</label>
                        <input required type="password" value="" name="password" class="form-control"
                            id="middlename">

                        <div class="form-text" style="">{{ $errors->updatePassword->first('password') }}</div>

                    </div>
                </div>
                <div class="col-12">
                    <div class="mb-3">
                        <label for="lastname" class="form-label">Comfirm password:</label>
                        <input required type="password" value="" name="password_confirmation" class="form-control"
                            id="lastname">

                        <div class="form-text" style="">
                            {{ $errors->updatePassword->first('password_confirmation') }}
                        </div>

                    </div>
                </div>



                <div class="row">
                    <div class="col-md-3">
                        <button class="btn btn-success" style="">Save information</button>
                    </div>
                </div>
        </form>
    </div>
</div>
@include('users.includes.footer')
