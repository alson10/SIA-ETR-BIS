@include('users.includes.nav_bar', ['active' => 'assets', 'title' => 'Home page'])
<div class="container" style="margin-top:20px">
    <h5 style="margin: 50px 20px    ">Request List</h5>
  

    <div class="row">
        @foreach ($requests as $request)
            <div class="col-lg-4">
                <div class="request-card" 
                @if ($request->id === $request_id)
                style="border:1px solid green"
                @endif
                >
                    <h6 style="margin: 0 0 5px 0">Request:</h6>
                    <h5>{{ $request->service_name }}</h5>
                    <h6 style="margin: 10px 0 5px 0">Purpose:</h6>
                    <h5 style="font-size: 18px"> {{ $request->purpose }}</h5>
                    <h6 style="margin: 10px 0 5px 0">Date requsted:</h6>
                    <h5 style="font-size: 18px">
                        {{ date_format(date_create($request->created_at),'D M d, Y - h:i A') }}
                    </h5>
                    <h6 style="margin: 10px 0 5px 0">Status:</h6>
                    <h5 style="font-size: 18px">

                        @switch(intval($request->status ))
                            @case(0)
                                {{ 'Wating for admin Response' }}
                            @break

                            @case(1)
                                {{ 'Your request is Already processing' }}
                            @break

                            @case(2)
                                {{ 'Your request is Ready to pick up' }}
                            @break

                            @case(3)
                                {{ ' Your Request Completed' }}
                            @break

                            @default
                        @endswitch

                    </h5>
                </div>
            </div>
        @endforeach
    </div>

</div>

@include('users.includes.footer')