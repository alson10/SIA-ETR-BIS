@include('admin.includes.nav_bar', ['active' => 'blotters', 'title' => 'Blotters Management'])
<style>
    .value{
        font-weight: 600;
        font-size: 18px;
    }
</style>
<div class="container">
    <div class="row justify-content-between align-items-center">
        <div class="col-lg-6">
            <h5>Blotter Details</h5>
            @if (session('message'))
                <h6 style="margin-top: 20px;color:green">{{ session('message') }}</h6>
            @endif
        </div>
        <div class="col-lg-2">
            <a href="{{ route('blotter.create') }}">
            </a>
        </div>
    </div>
</div>
<br>
<div class="container">
    <div class="row">
        <div class="col-12">
            <div style="padding:20px;border-radius:20px;border:1px solid rgba(0,0,0,.05)">
                <div class="row">
                    <div class="col-6">
                        <h6 style="margin:0 0 5px 0;">Complainant Name:</h6>
                        <h6 class="value">{{ $blotter->complainant_name }}</h6>
                    </div>
                    <div class="col-6">
                        <h6 style="margin:0 0 5px;">Respondent Name:</h6>
                        <h6 class="value">{{ $blotter->complainant_name }}</h6>
                    </div>
                    <div class="col-6">
                        <h6 style="margin:15px 0 5px;">Complainant Name:</h6>
                        <h6 class="value">{{ $blotter->respondent_name }}</h6>
                    </div>
                    <div class="col-6">
                        <h6 style="margin:15px 0 5px;">Victims:</h6>
                        <pre class="value">{!! $blotter->victims !!}</pre>
                    </div>
                    <div class="col-6">
                        <h6 style="margin:15px 0 5px;">Location:</h6>
                        <h6 class="value">{{ $blotter->location }}</h6>
                    </div>
                    <div class="col-6">
                        <h6 style="margin:15px 0 5px;">Date:</h6>
                        <h6 class="value">{{ $blotter->date }}</h6>
                    </div>
                    <div class="col-6">
                        <h6 style="margin:15px 0 5px;">Type:</h6>
                        <h6 class="value">{{ $blotter->type }}</h6>
                    </div>
                    <div class="col-6">
                        <h6 style="margin:15px 0 5px;">About:</h6>
                        <h6 class="value">{{ $blotter->about }}</h6>
                    </div>
                    <div class="col-6">
                        <h6 style="margin:15px 0 5px;">Status:</h6>
                        <h6 class="value"> @switch($blotter->status)
                                @case(1)
                                    Active
                                @break

                                @case(2)
                                    Settled
                                @break

                                @default
                            @endswitch
                        </h6>
                    </div>
                    <div class="col-6">
                        @if ($blotter->status == 2)
                            <h6 style="margin:15px 0 5px;">Date settled:</h6>
                            <h6 class="value">{{ $blotter->updated_at }}</h6>
                        @endif
                    </div>
                   
                </div>










            </div>
        </div>
    </div>
</div>
@include('admin.includes.footer');
